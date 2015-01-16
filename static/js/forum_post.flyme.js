/*
	[Discuz!] (C)2001-2099 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: forum_post.js 33695 2013-08-03 04:39:22Z nemohou $
*/

var forum_post_inited = true;
var postSubmited = false;
var AID = {0:1,1:1};
var UPLOADSTATUS = -1;
var UPLOADFAILED = UPLOADCOMPLETE = AUTOPOST = 0;
var CURRENTATTACH = '0';
var FAILEDATTACHS = '';
var UPLOADWINRECALL = null;
var imgexts = typeof imgexts == 'undefined' ? 'jpg, jpeg, gif, png, bmp' : imgexts;
var ATTACHORIMAGE = '0';
var STATUSMSG = {
	'-1' : '内部服务器错误',
	'0' : '上传成功',
	'1' : '不支持此类扩展名',
	'2' : '服务器限制无法上传那么大的附件',
	'3' : '用户组限制无法上传那么大的附件',
	'4' : '不支持此类扩展名',
	'5' : '文件类型限制无法上传那么大的附件',
	'6' : '今日您已无法上传更多的附件',
	'7' : '请选择图片文件(' + imgexts + ')',
	'8' : '附件文件无法保存',
	'9' : '没有合法的文件被上传',
	'10' : '非法操作',
	'11' : '今日您已无法上传那么大的附件'
};

EXTRAFUNC['validator'] = [];

function checkFocus() {
	var obj = wysiwyg ? editwin : textobj;
	if(!obj.hasfocus) {
		obj.focus();
	}
}

function ctlent(event) {
	if(postSubmited == false && (event.ctrlKey && event.keyCode == 13) || (event.altKey && event.keyCode == 83) && $('postsubmit')) {
		if(in_array($('postsubmit').name, ['topicsubmit', 'replysubmit', 'editsubmit']) && !validate($('postform'))) {
			doane(event);
			return;
		}
		postSubmited = true;
		$('postsubmit').disabled = true;
		$('postform').submit();
	}
	if(event.keyCode == 9) {
		doane(event);
	}
}

function checklength(theform) {
	var message = wysiwyg ? html2bbcode(getEditorContents()) : theform.message.value;
	if(!theform.parseurloff.checked) {
		message = parseurl(message);
	}
	showDialog('当前长度: ' + mb_strlen(message) + ' 字节，' + (postmaxchars != 0 ? '系统限制: ' + postminchars + ' 到 ' + postmaxchars + ' 字节。' : ''), 'notice', '字数检查');
}

if(!tradepost) {
	var tradepost = 0;
}

function validate(theform) {
	var message = wysiwyg ? html2bbcode(getEditorContents()) : theform.message.value;
	if(!theform.parseurloff.checked) {
		message = parseurl(message);
	}
	if(($('postsubmit').name != 'replysubmit' && !($('postsubmit').name == 'editsubmit' && !isfirstpost) && theform.subject.value == "") || !sortid && !special && trim(message) == "") {
		showError('抱歉，您尚未输入标题或内容');
		return false;
	} else if(mb_strlen(theform.subject.value) > 80) {
		showError('您的标题超过 80 个字符的限制');
		return false;
	}
	if(in_array($('postsubmit').name, ['topicsubmit', 'editsubmit'])) {
		if(theform.typeid && (theform.typeid.options && theform.typeid.options[theform.typeid.selectedIndex].value == 0) && typerequired) {
			showError('请选择主题对应的分类');
			return false;
		}
		if(theform.sortid && (theform.sortid.options && theform.sortid.options[theform.sortid.selectedIndex].value == 0) && sortrequired) {
			showError('请选择主题对应的分类信息');
			return false;
		}
	}
	for(i in EXTRAFUNC['validator']) {
		try {
			eval('var v = ' + EXTRAFUNC['validator'][i] + '()');
			if(!v) {
				return false;
			}
		} catch(e) {}
	}

	if(!disablepostctrl && !sortid && !special && ((postminchars != 0 && mb_strlen(message) < postminchars) || (postmaxchars != 0 && mb_strlen(message) > postmaxchars))) {
		showError('您的帖子长度不符合要求。\n\n当前长度: ' + mb_strlen(message) + ' 字节\n系统限制: ' + postminchars + ' 到 ' + postmaxchars + ' 字节');
		return false;
	}
	if(UPLOADSTATUS == 0) {
		if(!confirm('您有等待上传的附件，确认不上传这些附件吗？')) {
			return false;
		}
	} else if(UPLOADSTATUS == 1) {
		showDialog('您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...', 'notice');
		AUTOPOST = 1;
		return false;
	}
    if(isfirstpost && $('adddynamic') != null && $('adddynamic').checked && $('postsave') != null && isNaN(parseInt($('postsave').value)) && ($('readperm') != null && $('readperm').value || $('price') != null && $('price').value)) {
        if(confirm('由于您设置了阅读权限或出售帖，您确认还转播给您的听众看吗？') == false) {
            return false;
        }
    }

	theform.message.value = message;
	if(editorsubmit.name == 'editsubmit') {
		checkpostrule_post(theform);
		return false;
	} else if(in_array(editorsubmit.name, ['topicsubmit','replysubmit'])) {
		if(seccodecheck || secqaacheck) {
			var chk = 1, chkv = '';
			if(secqaacheck) {
				chkv = $('checksecqaaverify_' + theform.secqaahash.value).innerHTML;
				if(chkv.indexOf('loading') != -1) {
					setTimeout(function () { validate(theform); }, 100);
					chk = 0;
				} else if(chkv.indexOf('check_right') == -1) {
					showError('验证问答错误，请重新填写');
					chk = 0;
				}
			}
			if(seccodecheck) {
				chkv = $('checkseccodeverify_' + theform.seccodehash.value).innerHTML;
				if(chkv.indexOf('loading') !== -1) {
					setTimeout(function () { validate(theform); }, 100);
					chk = 0;
				} else if(chkv.indexOf('check_right') === -1) {
					showError('验证码错误，请重新填写');
					chk = 0;
				}
			}
			if(chk) {
				checkpostrule_post(theform);
			}
		} else {
			checkpostrule_post(theform);
		}
		return false;
	}
}

/**
 * 建议反馈提交验证
 * @param theform
 * @returns {boolean}
 */
function validateFeedback_proposal(theform) {
    var message = wysiwyg ? html2bbcode(getEditorContents()) : theform.message.value;
    if(!theform.parseurloff.checked) {
        message = parseurl(message);
    }
    if(($('postsubmit').name != 'replysubmit' && !($('postsubmit').name == 'editsubmit' && !isfirstpost) && theform.subject.value == "") ) {
        showError('抱歉，您尚未输入标题');
        return false;
    } else if(mb_strlenUTF8(theform.subject.value) > 28) {
        showError('您的标题超过 28 个字符的限制');
        return false;
    }

    if(theform.typeid && (theform.typeid.options && theform.typeid.options[theform.typeid.selectedIndex].value == 0)){
        showError('请选择主题对应的分类');
        return false;
    }

    if(UPLOADSTATUS == 0) {
        if(!confirm('您有等待上传的附件，确认不上传这些附件吗？')) {
            return false;
        }
    } else if(UPLOADSTATUS == 1) {
        showDialog('您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...', 'notice');
        AUTOPOST = 1;
        return false;
    }
    if(isfirstpost && $('adddynamic') != null && $('adddynamic').checked && $('postsave') != null && isNaN(parseInt($('postsave').value)) && ($('readperm') != null && $('readperm').value || $('price') != null && $('price').value)) {
        if(confirm('由于您设置了阅读权限或出售帖，您确认还转播给您的听众看吗？') == false) {
            return false;
        }
    }

    if(!vailate('')) return false;
    theform.message.value = message;
    if($('postsubmit').name == 'editsubmit') {
        checkpostrule_post(theform);
        return false;
    } else if(in_array($('postsubmit').name, ['topicsubmit', 'replysubmit'])) {
        if(seccodecheck || secqaacheck) {
            var chk = 1, chkv = '';
            if(secqaacheck) {
                chkv = $('checksecqaaverify_' + theform.secqaahash.value).innerHTML;
                if(chkv.indexOf('loading') != -1) {
                    setTimeout(function () { validateFeedback_proposal(theform); }, 100);
                    chk = 0;
                } else if(chkv.indexOf('check_right') == -1) {
                    showError('验证问答错误，请重新填写');
                    chk = 0;
                }
            }
            if(seccodecheck) {
                chkv = $('checkseccodeverify_' + theform.seccodehash.value).innerHTML;
                if(chkv.indexOf('loading') !== -1) {
                    setTimeout(function () { validateFeedback_proposal(theform); }, 100);
                    chk = 0;
                } else if(chkv.indexOf('check_right') === -1) {
                    showError('验证码错误，请重新填写');
                    chk = 0;
                }
            }
            if(chk) {
                checkpostrule_post(theform);
            }
        } else {
            checkpostrule_post(theform);
        }
        return false;
    }
}

/**
 * 建议反馈提交验证
 * @param theform
 * @returns {boolean}
 */
function validateFeedback_bug(theform) {
    var message = wysiwyg ? html2bbcode(getEditorContents()) : theform.message.value;
    if(!theform.parseurloff.checked) {
        message = parseurl(message);
    }
    if(($('postsubmit').name != 'replysubmit' && !($('postsubmit').name == 'editsubmit' && !isfirstpost) && theform.subject.value == "") ) {
        showError('抱歉，您尚未输入标题');
        return false;
    } else if(mb_strlenUTF8(theform.subject.value) > 28) {
        showError('您的标题超过 28 个字符的限制');
        return false;
    }
    if(theform.typeid && (theform.typeid.options && theform.typeid.options[theform.typeid.selectedIndex].value == 0)){
        showError('请选择主题对应的分类');
        return false;
    }
    if(theform.model&& (theform.model.options && theform.model.options[theform.model.selectedIndex].value == 0)){
        showError('请选择机型');
        return false;
    }
    if(theform.rom_version&& (theform.rom_version.options && theform.rom_version.options[theform.rom_version.selectedIndex].value == 0)){
        showError('请选择ROM版本号');
        return false;
    }
    if(theform.flyme_version&& (theform.flyme_version.options && theform.flyme_version.options[theform.flyme_version.selectedIndex].value == 0)){
        showError('请选择FLYME版本号');
        return false;
    }

    for(i in EXTRAFUNC['validator']) {
        try {
            eval('var v = ' + EXTRAFUNC['validator'][i] + '()');
            if(!v) {
                return false;
            }
        } catch(e) {}
    }


    if(UPLOADSTATUS == 0) {
        if(!confirm('您有等待上传的附件，确认不上传这些附件吗？')) {
            return false;
        }
    } else if(UPLOADSTATUS == 1) {
        showDialog('您有正在上传的附件，请稍候，上传完成后帖子将会自动发表...', 'notice');
        AUTOPOST = 1;
        return false;
    }
    if(isfirstpost && $('adddynamic') != null && $('adddynamic').checked && $('postsave') != null && isNaN(parseInt($('postsave').value)) && ($('readperm') != null && $('readperm').value || $('price') != null && $('price').value)) {
        if(confirm('由于您设置了阅读权限或出售帖，您确认还转播给您的听众看吗？') == false) {
            return false;
        }
    }
    if(!vailate('bug')) return false;
    theform.message.value = message;
    if($('postsubmit').name == 'editsubmit') {
        checkpostrule_post(theform);
        return false;
    } else if(in_array($('postsubmit').name, ['topicsubmit', 'replysubmit'])) {
        if(seccodecheck || secqaacheck) {
            var chk = 1, chkv = '';
            if(secqaacheck) {
                chkv = $('checksecqaaverify_' + theform.secqaahash.value).innerHTML;
                if(chkv.indexOf('loading') != -1) {
                    setTimeout(function () { validateFeedback_bug(theform); }, 100);
                    chk = 0;
                } else if(chkv.indexOf('check_right') == -1) {
                    showError('验证问答错误，请重新填写');
                    chk = 0;
                }
            }
            if(seccodecheck) {
                chkv = $('checkseccodeverify_' + theform.seccodehash.value).innerHTML;
                if(chkv.indexOf('loading') !== -1) {
                    setTimeout(function () { validateFeedback_bug(theform); }, 100);
                    chk = 0;
                } else if(chkv.indexOf('check_right') === -1) {
                    showError('验证码错误，请重新填写');
                    chk = 0;
                }
            }
            if(chk) {
                checkpostrule_post(theform);
            }
        } else {
            checkpostrule_post(theform);
        }
        return false;
    }
}

function checkpostrule_post(theform) {
	if(!seccodecheck && !secqaacheck && !theform.sechash) {
		var x = new Ajax();
		x.get('forum.php?mod=ajax&action=checkpostrule&ac=' + postaction + '&inajax=yes', function(s) {
			if(s) {
				ajaxinnerhtml($('seccheck'), s);
				evalscript(s);
				seccodecheck = true;
			} else {
				postsubmit(theform);
			}
		});
	} else {
		postsubmit(theform);
	}
}

function postsubmit(theform) {
	if($(editorid + '_attachlist')) {
		$('postbox').appendChild($(editorid + '_attachlist'));
		$(editorid + '_attachlist').style.display = 'none';
	}
	if($(editorid + '_imgattachlist')) {
		$('postbox').appendChild($(editorid + '_imgattachlist'));
		$(editorid + '_imgattachlist').style.display = 'none';
	}
	hideMenu();
    if(fid==100001 ||fid==100002){

    }else {
        theform.replysubmit ? theform.replysubmit.disabled = true : (theform.editsubmit ? theform.editsubmit.disabled = true : theform.topicsubmit.disabled = true);
    }
    theform.submit();
}

function relatekw(subject, message) {
	if(isUndefined(subject) || subject == -1) {
		subject = $('subject').value;
		subject = subject.replace(/<\/?[^>]+>|\[\/?.+?\]|"/ig, "");
		subject = subject.replace(/\s{2,}/ig, ' ');
	}
	if(isUndefined(message) || message == -1) {
		message = getEditorContents();
		message = message.replace(/<\/?[^>]+>|\[\/?.+?\]|"/ig, "");
		message = message.replace(/\s{2,}/ig, ' ');
	}
	subject = (BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(subject) : subject);
	message = (BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(message) : message);
	message = message.replace(/&/ig, '', message).substr(0, 500);
	ajaxget('forum.php?mod=relatekw&subjectenc=' + subject + '&messageenc=' + message, 'tagselect');
}

function switchicon(iconid, obj) {
	$('iconid').value = iconid;
	$('icon_img').src = obj.src;
	hideMenu();
}

function clearContent() {
	if(wysiwyg) {
		editdoc.body.innerHTML = BROWSER.firefox ? '<br />' : '';
	} else {
		textobj.value = '';
	}
}

function uploadNextAttach() {
	var str = $('attachframe').contentWindow.document.body.innerHTML;
	if(str == '') return;
	var arr = str.split('|');
	var att = CURRENTATTACH.split('|');
	var sizelimit = '';
	if(arr[4] == 'ban') {
		sizelimit = '(附件类型被禁止)';
	} else if(arr[4] == 'perday') {
		sizelimit = '(不能超过 ' + arr[5] + ' 字节)';
	} else if(arr[4] > 0) {
		sizelimit = '(不能超过 ' + arr[4] + ' 字节)';
	}
	uploadAttach(parseInt(att[0]), arr[0] == 'DISCUZUPLOAD' ? parseInt(arr[1]) : -1, att[1], sizelimit);
}
function uploadFeedNextAttach() {
    var str = $('attachfeedframe').contentWindow.document.body.innerHTML;
    if(str == '') return;
    var arr = str.split('|');
    var att = CURRENTATTACH.split('|');
    var sizelimit = '';
    if(arr[4] == 'ban') {
        sizelimit = '(附件类型被禁止)';
    } else if(arr[4] == 'perday') {
        sizelimit = '(不能超过 ' + arr[5] + ' 字节)';
    } else if(arr[4] > 0) {
        sizelimit = '(不能超过 ' + arr[4] + ' 字节)';
    }
    uploadFeedAttach(parseInt(att[0]), arr[0] == 'DISCUZUPLOAD' ? parseInt(arr[1]) : -1, att[1], sizelimit);
}

function uploadAttach(curId, statusid, prefix, sizelimit) {
	prefix = isUndefined(prefix) ? '' : prefix;
	var nextId = 0;
	for(var i = 0; i < AID[prefix ? 1 : 0] - 1; i++) {
		if($(prefix + 'attachform_' + i)) {
			nextId = i;
			if(curId == 0) {
				break;
			} else {
				if(i > curId) {
					break;
				}
			}
		}
	}
	if(nextId == 0) {
		return;
	}
	CURRENTATTACH = nextId + '|' + prefix;
	if(curId > 0) {
		if(statusid == 0) {
			UPLOADCOMPLETE++;
		} else {
			FAILEDATTACHS += '<br />' + mb_cutstr($(prefix + 'attachnew_' + curId).value.substr($(prefix + 'attachnew_' + curId).value.replace(/\\/g, '/').lastIndexOf('/') + 1), 25) + ': ' + STATUSMSG[statusid] + sizelimit;
			UPLOADFAILED++;
		}
		$(prefix + 'cpdel_' + curId).innerHTML = '<img src="' + IMGDIR + '/check_' + (statusid == 0 ? 'right' : 'error') + '.gif" alt="' + STATUSMSG[statusid] + '" />';
		if(nextId == curId || in_array(statusid, [6, 8])) {
			if(prefix == 'img') {
				updateImageList();
			} else {
				updateAttachList();
			}
			if(UPLOADFAILED > 0) {
				showDialog('附件上传完成！成功 ' + UPLOADCOMPLETE + ' 个，失败 ' + UPLOADFAILED + ' 个:' + FAILEDATTACHS);
				FAILEDATTACHS = '';
			}
			UPLOADSTATUS = 2;
			for(var i = 0; i < AID[prefix ? 1 : 0] - 1; i++) {
				if($(prefix + 'attachform_' + i)) {
					reAddAttach(prefix, i)
				}
			}
			$(prefix + 'uploadbtn').style.display = '';
			$(prefix + 'uploading').style.display = 'none';
			if(AUTOPOST) {
				hideMenu();
				validate($('postform'));
			} else if(UPLOADFAILED == 0 && (prefix == 'img' || prefix == '')) {
				showDialog('附件上传完成！', 'right', null, null, 0, null, null, null, null, 3);
			}
			UPLOADFAILED = UPLOADCOMPLETE = 0;
			CURRENTATTACH = '0';
			FAILEDATTACHS = '';
			return;
		}
	} else {
		$(prefix + 'uploadbtn').style.display = 'none';
		$(prefix + 'uploading').style.display = '';
	}
	$(prefix + 'cpdel_' + nextId).innerHTML = '<img src="' + IMGDIR + '/loading.gif" alt="上传中..." />';
	UPLOADSTATUS = 1;
	$(prefix + 'attachform_' + nextId).submit();
}

function uploadFeedAttach(curId, statusid, prefix, sizelimit) {
    prefix = isUndefined(prefix) ? '' : prefix;
    var nextId = 0;
    for(var i = 0; i < AID[prefix ? 1 : 0] - 1; i++) {
        if($(prefix + 'attachformfeed_' + i)) {
            nextId = i;
            if(curId == 0) {
                break;
            } else {
                if(i > curId) {
                    break;
                }
            }
        }
    }
    if(nextId == 0) {
        return;
    }
    CURRENTATTACH = nextId + '|' + prefix;
    if(curId > 0) {
        if(statusid == 0) {
            UPLOADCOMPLETE++;
        } else {
            FAILEDATTACHS += '<br />' + mb_cutstr($(prefix + 'attachnewfeed_' + curId).value.substr($(prefix + 'attachnewfeed_' + curId).value.replace(/\\/g, '/').lastIndexOf('/') + 1), 25) + ': ' + STATUSMSG[statusid] + sizelimit;
            UPLOADFAILED++;
        }
        $(prefix + 'cpdelfeed_' + curId).innerHTML = '<img src="' + IMGDIR + '/check_' + (statusid == 0 ? 'right' : 'error') + '.gif" alt="' + STATUSMSG[statusid] + '" />';
        if(nextId == curId || in_array(statusid, [6, 8])) {
            if(prefix == 'img') {
                updatefeedbackImageList();
            } else {
                updateAttachList();
            }
            if(UPLOADFAILED > 0) {
                showDialog('附件上传完成！成功 ' + UPLOADCOMPLETE + ' 个，失败 ' + UPLOADFAILED + ' 个:' + FAILEDATTACHS);
                FAILEDATTACHS = '';
            }
            UPLOADSTATUS = 2;
            for(var i = 0; i < AID[prefix ? 1 : 0] - 1; i++) {
                if($(prefix + 'attachformfeed_' + i)) {
                    reAddAttachfeed(prefix, i)
                }
            }
            $(prefix + 'uploadbtnfeed').style.display = '';
            $(prefix + 'uploadingfeed').style.display = 'none';
            if(AUTOPOST) {
                hideMenu();
                validate($('postform'));
            } else if(UPLOADFAILED == 0 && (prefix == 'img' || prefix == '')) {
                showDialog('附件上传完成！', 'right', null, null, 0, null, null, null, null, 3);
            }
            UPLOADFAILED = UPLOADCOMPLETE = 0;
            CURRENTATTACH = '0';
            FAILEDATTACHS = '';
            return;
        }
    } else {
        $(prefix + 'uploadbtnfeed').style.display = 'none';
        $(prefix + 'uploadingfeed').style.display = '';
    }
    $(prefix + 'cpdelfeed_' + nextId).innerHTML = '<img src="' + IMGDIR + '/loading.gif" alt="上传中..." />';
    UPLOADSTATUS = 1;
    $(prefix + 'attachformfeed_' + nextId).submit();
}

function addAttach(prefix) {
	var id = AID[prefix ? 1 : 0];
	var tags, newnode, i;
	prefix = isUndefined(prefix) ? '' : prefix;
	newnode = $(prefix + 'attachbtnhidden').firstChild.cloneNode(true);
	tags = newnode.getElementsByTagName('input');
	for(i = 0;i < tags.length;i++) {
		if(tags[i].name == 'Filedata') {
			tags[i].id = prefix + 'attachnew_' + id;
			tags[i].onchange = function() {insertAttach(prefix, id);};
			tags[i].unselectable = 'on';
		} else if(tags[i].name == 'attachid') {
			tags[i].value = id;
		}
	}
	tags = newnode.getElementsByTagName('form');
	tags[0].name = tags[0].id = prefix + 'attachform_' + id;
	$(prefix + 'attachbtn').appendChild(newnode);
	newnode = $(prefix + 'attachbodyhidden').firstChild.cloneNode(true);
	tags = newnode.getElementsByTagName('input');
	for(i = 0;i < tags.length;i++) {
		if(tags[i].name == prefix + 'localid[]') {
			tags[i].value = id;
		}
	}
	tags = newnode.getElementsByTagName('span');
	for(i = 0;i < tags.length;i++) {
		if(tags[i].id == prefix + 'localfile[]') {
			tags[i].id = prefix + 'localfile_' + id;
		} else if(tags[i].id == prefix + 'cpdel[]') {
			tags[i].id = prefix + 'cpdel_' + id;
		} else if(tags[i].id == prefix + 'localno[]') {
			tags[i].id = prefix + 'localno_' + id;
		} else if(tags[i].id == prefix + 'deschidden[]') {
			tags[i].id = prefix + 'deschidden_' + id;
		}
	}
	AID[prefix ? 1 : 0]++;
	newnode.style.display = 'none';
	$(prefix + 'attachbody').appendChild(newnode);
}
function addAttachFeed(prefix) {
    var id = AID[prefix ? 1 : 0];
    var tags, newnode, i;
    prefix = isUndefined(prefix) ? '' : prefix;
    newnode = $(prefix + 'attachbtnhiddenfeed').firstChild.cloneNode(true);
    tags = newnode.getElementsByTagName('input');
    for(i = 0;i < tags.length;i++) {
        if(tags[i].name == 'Filedata') {
            tags[i].id = prefix + 'attachnewfeed_' + id;
            tags[i].onchange = function() {insertAttachfeed(prefix, id);};
            tags[i].unselectable = 'on';
        } else if(tags[i].name == 'attachid') {
            tags[i].value = id;
        }
    }
    tags = newnode.getElementsByTagName('form');
    tags[0].name = tags[0].id = prefix + 'attachformfeed_' + id;
    $(prefix + 'attachbtnfeed').appendChild(newnode);
    newnode = $(prefix + 'attachbodyhiddenfeed').firstChild.cloneNode(true);
    tags = newnode.getElementsByTagName('input');
    for(i = 0;i < tags.length;i++) {
        if(tags[i].name == prefix + 'localidfeed[]') {
            tags[i].value = id;
        }
    }
    tags = newnode.getElementsByTagName('span');
    for(i = 0;i < tags.length;i++) {
        if(tags[i].id == prefix + 'localfile[]') {
            tags[i].id = prefix + 'localfilefeed_' + id;
        } else if(tags[i].id == prefix + 'cpdel[]') {
            tags[i].id = prefix + 'cpdelfeed_' + id;
        } else if(tags[i].id == prefix + 'localno[]') {
            tags[i].id = prefix + 'localnofeed_' + id;
        } else if(tags[i].id == prefix + 'deschidden[]') {
            tags[i].id = prefix + 'deschiddenfeed_' + id;
        }
    }
    AID[prefix ? 1 : 0]++;
    newnode.style.display = 'none';
    $(prefix + 'attachbodyfeed').appendChild(newnode);
}
function insertAttachfeed(prefix, id) {
    var path = $(prefix + 'attachnewfeed_' + id).value;
    var extpos = path.lastIndexOf('.');
    var ext = extpos == -1 ? '' : path.substr(extpos + 1, path.length).toLowerCase();
    var re = new RegExp("(^|\\s|,)" + ext + "($|\\s|,)", "ig");
    var localfile = $(prefix + 'attachnewfeed_' + id).value.substr($(prefix + 'attachnewfeed_' + id).value.replace(/\\/g, '/').lastIndexOf('/') + 1);
    var filename = mb_cutstr(localfile, 30);

    if(path == '') {
        return;
    }
    if(extensions != '' && (re.exec(extensions) == null || ext == '')) {
        reAddAttachfeed(prefix, id);
        showError('对不起，不支持上传此类扩展名的附件。');
        return;
    }
    if(prefix == 'img' && imgexts.indexOf(ext) == -1) {
        reAddAttachfeed(prefix, id);
        showError('请选择图片文件(' + imgexts + ')');
        return;
    }

    $(prefix + 'cpdelfeed_' + id).innerHTML = '<a href="javascript:;" class="d" onclick="reAddAttachfeed(\'' + prefix + '\', ' + id + ')">删除</a>';
    $(prefix + 'localfilefeed_' + id).innerHTML = '<span>' + filename + '</span>';
    $(prefix + 'attachnewfeed_' + id).style.display = 'none';
    $(prefix + 'deschiddenfeed_' + id).style.display = '';
    $(prefix + 'deschiddenfeed_' + id).title = localfile;
    $(prefix + 'localnofeed_' + id).parentNode.parentNode.style.display = '';
    addAttachFeed(prefix);
    UPLOADSTATUS = 0;
}

function insertAttach(prefix, id) {
	var path = $(prefix + 'attachnew_' + id).value;
	var extpos = path.lastIndexOf('.');
	var ext = extpos == -1 ? '' : path.substr(extpos + 1, path.length).toLowerCase();
	var re = new RegExp("(^|\\s|,)" + ext + "($|\\s|,)", "ig");
	var localfile = $(prefix + 'attachnew_' + id).value.substr($(prefix + 'attachnew_' + id).value.replace(/\\/g, '/').lastIndexOf('/') + 1);
	var filename = mb_cutstr(localfile, 30);

	if(path == '') {
		return;
	}
	if(extensions != '' && (re.exec(extensions) == null || ext == '')) {
		reAddAttach(prefix, id);
		showError('对不起，不支持上传此类扩展名的附件。');
		return;
	}
	if(prefix == 'img' && imgexts.indexOf(ext) == -1) {
		reAddAttach(prefix, id);
		showError('请选择图片文件(' + imgexts + ')');
		return;
	}

	$(prefix + 'cpdel_' + id).innerHTML = '<a href="javascript:;" class="d" onclick="reAddAttach(\'' + prefix + '\', ' + id + ')">删除</a>';
	$(prefix + 'localfile_' + id).innerHTML = '<span>' + filename + '</span>';
	$(prefix + 'attachnew_' + id).style.display = 'none';
	$(prefix + 'deschidden_' + id).style.display = '';
	$(prefix + 'deschidden_' + id).title = localfile;
	$(prefix + 'localno_' + id).parentNode.parentNode.style.display = '';
	addAttach(prefix);
	UPLOADSTATUS = 0;
}

function reAddAttach(prefix, id) {
	$(prefix + 'attachbody').removeChild($(prefix + 'localno_' + id).parentNode.parentNode);
	$(prefix + 'attachbtn').removeChild($(prefix + 'attachnew_' + id).parentNode.parentNode);
	$(prefix + 'attachbody').innerHTML == '' && addAttach(prefix);
	$('localimgpreview_' + id) ? document.body.removeChild($('localimgpreview_' + id)) : null;
    if(jQuery('#'+prefix + 'attachbody').closest("#e_local_bugSubmit").length>0){
        var mobileUpBtn = jQuery("#e_local_bugSubmit"), upBtn4mobile = jQuery("#jImg_btn_upload4mobile");
        var h = mobileUpBtn.height();
        upBtn4mobile.css("height",h);
    }
}

function reAddAttachfeed(prefix, id) {
    $(prefix + 'attachbodyfeed').removeChild($(prefix + 'localnofeed_' + id).parentNode.parentNode);
    $(prefix + 'attachbtnfeed').removeChild($(prefix + 'attachnewfeed_' + id).parentNode.parentNode);
    $(prefix + 'attachbodyfeed').innerHTML == '' && addAttach(prefix);
    $('localimgpreview_' + id) ? document.body.removeChild($('localimgpreviewfeed_' + id)) : null;
    var mobileUpBtn = jQuery("#e_local_bugSubmit"), upBtn4mobile = jQuery("#jImg_btn_upload4mobile");
    var h = mobileUpBtn.height();
    upBtn4mobile.css("height",h);
}

function delAttach(id, type) {
	var ids = {};
	if(typeof id == 'number') {
		ids[id] = id;
	} else {
		ids = id;
	}
	for(id in ids) {
		if($('attach_' + id)) {
			$('attach_' + id).style.display = 'none';
			ATTACHNUM['attach' + (type ? 'un' : '') + 'used']--;
			updateattachnum('attach');
		}
	}
	appendAttachDel(ids);
}

function delImgAttach(id, type) {
	var ids = {};
	if(typeof id == 'number') {
		ids[id] = id;
	} else {
		ids = id;
	}
	for(id in ids) {
		if($('image_td_' + id)) {
			$('image_td_' + id).className = 'imgdeleted';
			$('image_' + id).onclick = null;
			$('image_desc_' + id).disabled = true;
			ATTACHNUM['image' + (type ? 'un' : '') + 'used']--;
			updateattachnum('image');
            var aid = 'attachimg_' + id ;
            if(jQuery(editdoc.body).find("img[aid="+aid+"]").length>0){
                jQuery(editdoc.body).find("img[aid="+aid+"]").remove();
            }
		}
	}
	appendAttachDel(ids);
}

function delFeedbackImgAttach(id, type) {
    var ids = {};
    if(typeof id == 'number') {
        ids[id] = id;
    } else {
        ids = id;
    }
    for(id in ids) {
        if($('image_td_' + id)) {
            $('image_td_' + id).className = 'imgdeleted';
            $('image_' + id).onclick = null;
            $('image_desc_' + id).disabled = true;
            ATTACHNUM['image' + (type ? 'un' : '') + 'used']--;
            updateattachnum('image');
        }
    }
    appendAttachDel(ids);
    setTimeout(function(){
        $('jImg_btn_upload').removeChild($("thumb-imgWrap-"+id));
        if(jQuery('.thumb-imgWrap').length<4){
            jQuery("#btn_upload_tip").hide();
            jQuery("#apache-swf").hide();
        }
    },1000);
}

function appendAttachDel(ids) {
	if(!ids) {
		return;
	}
	var aids = '';
	for(id in ids) {
		aids += '&aids[]=' + id;
	}
	var x = new Ajax();
	x.get('forum.php?mod=ajax&action=deleteattach&inajax=yes&tid=' + (typeof tid == 'undefined' ? 0 : tid) + '&pid=' + (typeof pid == 'undefined' ? 0 : pid) + aids + ($('modthreadkey') ? '&modthreadkey=' + $('modthreadkey').value : ''), function() {});
	if($('delattachop')) {
		$('delattachop').value = 1;
	}
}

function updateAttach(aid) {
	objupdate = $('attachupdate'+aid);
	obj = $('attach' + aid);
	if(!objupdate.innerHTML) {
		obj.style.display = 'none';
		objupdate.innerHTML = '<input type="file" name="attachupdate[paid' + aid + ']"><a href="javascript:;" onclick="updateAttach(' + aid + ')">取消</a>';
	} else {
		obj.style.display = '';
		objupdate.innerHTML = '';
	}
}

function updateattachnum(type) {
	ATTACHNUM[type + 'used'] = ATTACHNUM[type + 'used'] >= 0 ? ATTACHNUM[type + 'used'] : 0;
	ATTACHNUM[type + 'unused'] = ATTACHNUM[type + 'unused'] >= 0 ? ATTACHNUM[type + 'unused'] : 0;
	var num = ATTACHNUM[type + 'used'] + ATTACHNUM[type + 'unused'];
	if(num) {
		if($(editorid + '_' + type)) {
			$(editorid + '_' + type).title = '包含 ' + num + (type == 'image' ? ' 个图片附件' : ' 个附件');
		}
		if($(editorid + '_' + type + 'n')) {
			$(editorid + '_' + type + 'n').style.display = '';
		}
		ATTACHORIMAGE = 1;
	} else {
		if($(editorid + '_' + type)) {
			$(editorid + '_' + type).title = type == 'image' ? '图片' : '附件';
		}
		if($(editorid + '_' + type + 'n')) {
			$(editorid + '_' + type + 'n').style.display = 'none';
		}
	}
}

function swfHandler(action, type) {
	if(action == 2) {
		if(type == 'image') {
			updateImageList();
		} else {
			updateAttachList();
		}
	}
}

function updateAttachList(action, aids) {
	ajaxget('forum.php?mod=ajax&action=attachlist' + (!action ? '&posttime=' + $('posttime').value : (!aids ? '' : '&aids=' + aids)) + (!fid ? '' : '&fid=' + fid), 'attachlist');
	switchAttachbutton('attachlist');$('attach_tblheader').style.display = $('attach_notice').style.display = '';
}

function updateImageList(action, aids) {
	ajaxget('forum.php?mod=ajax&action=imagelist' + (!action ? '&pid=' + pid + '&posttime=' + $('posttime').value : (!aids ? '' : '&aids=' + aids)) + (!fid ? '' : '&fid=' + fid), 'imgattachlist');
	switchImagebutton('imgattachlist');$('imgattach_notice').style.display = '';
}

function updatefeedbackImageList(action,aids){
    jQuery.get('forum.php?mod=ajax&action=fimagelist' + (!action ? '&pid=' + pid + '&posttime=' + $('posttime').value : (!aids ? '' : '&aids=' + aids)) + (!fid ? '' : '&fid=' + fid),'', function(result){
        if(result.length>0){
             jQuery(result).each(function(i,v){
                 if(jQuery('.thumb-imgWrap').length<4){
                    var strHtml='<div class="thumb-imgWrap" id="thumb-imgWrap-'+ v.aid+'">' +
                    '<img title="'+ v.filenametitle+'" src="'+ v.src+'" width="100" height="100" />' +
                    '<div class="thumb-imgRemove" onclick="delFeedbackImgAttach('+ v.aid+',1);return false;" aid="'+ v.aid+'"></div>' +
                    '<input type="hidden" name="attachnew['+ v.aid+'][description]" />'+
                    '</div>';
                    jQuery('#jImg_btn_upload').append(strHtml);
                     if(jQuery('.thumb-imgWrap').length==4){
                         jQuery("#btn_upload_tip").show();
                         jQuery("#apache-swf").show();
                         return false;
                     }
                }
                 else{
                     jQuery("#btn_upload_tip").show();
                     jQuery("#apache-swf").show();
                     return false;
                 }
             });
         }
    },'json');

}

function updateDownImageList(msg) {
	hideMenu('fwin_dialog', 'dialog');
	if(msg == '') {
		showError('抱歉，暂无远程附件');
	} else {
		ajaxget('forum.php?mod=ajax&action=imagelist&pid=' + pid + '&posttime=' + $('posttime').value + (!fid ? '' : '&fid=' + fid), 'imgattachlist', null, null, null, function(){if(wysiwyg) {editdoc.body.innerHTML = msg;switchEditor(0);switchEditor(1)} else {textobj.value = msg;}});
		switchImagebutton('imgattachlist');$('imgattach_notice').style.display = '';
		showDialog('远程附件下载完成!', 'right', null, null, 0, null, null, null, null, 3);
	}
}

function switchButton(btn, type) {
	var btnpre = editorid + '_btn_';
	if(!$(btnpre + btn) || !$(editorid + '_' + btn)) {
		return;
	}
	var tabs = $(editorid + '_' + type + '_ctrl').getElementsByTagName('LI');
	$(btnpre + btn).style.display = '';
	$(editorid + '_' + btn).style.display = '';
	$(btnpre + btn).className = 'current';
	var btni = '';
	for(i = 0;i < tabs.length;i++) {
		if(tabs[i].id.indexOf(btnpre) !== -1) {
			btni = tabs[i].id.substr(btnpre.length);
		}
		if(btni != btn) {
			if(!$(editorid + '_' + btni) || !$(editorid + '_btn_' + btni)) {
				continue;
			}
			$(editorid + '_' + btni).style.display = 'none';
			$(editorid + '_btn_' + btni).className = '';
		}
	}
}

function uploadWindowstart() {
	$('uploadwindowing').style.visibility = 'visible';
}

function uploadWindowload() {
	$('uploadwindowing').style.visibility = 'hidden';
	var str = $('uploadattachframe').contentWindow.document.body.innerHTML;
	if(str == '') return;
	var arr = str.split('|');
	if(arr[0] == 'DISCUZUPLOAD' && arr[2] == 0) {
		UPLOADWINRECALL(arr[3], arr[5], arr[6]);
		hideWindow('upload', 0);
	} else {
		var sizelimit = '';
		if(arr[7] == 'ban') {
			sizelimit = '(附件类型被禁止)';
		} else if(arr[7] == 'perday') {
			sizelimit = '(不能超过 ' + arr[8] + ' 字节)';
		} else if(arr[7] > 0) {
			sizelimit = '(不能超过 ' + arr[7] + ' 字节)';
		}
		showError(STATUSMSG[arr[2]] + sizelimit);
	}
	if($('attachlimitnotice')) {
		ajaxget('forum.php?mod=ajax&action=updateattachlimit&fid=' + fid, 'attachlimitnotice');
	}
}

function uploadWindow(recall, type) {
	var type = isUndefined(type) ? 'image' : type;
	UPLOADWINRECALL = recall;
	showWindow('upload', 'forum.php?mod=misc&action=upload&fid=' + fid + '&type=' + type, 'get', 0, {'zindex':601});
}

function updatetradeattach(aid, url, attachurl) {
	$('tradeaid').value = aid;
	$('tradeattach_image').innerHTML = '<img src="' + attachurl + '/' + url + '" class="spimg" />';
	ATTACHORIMAGE = 1;
}

function updateactivityattach(aid, url, attachurl) {
	$('activityaid').value = aid;
	$('activityattach_image').innerHTML = '<img src="' + attachurl + '/' + url + '" class="spimg" />';
	ATTACHORIMAGE = 1;
}

function updatesortattach(aid, url, attachurl, identifier) {
	$('sortaid_' + identifier).value = aid;
	$('sortattachurl_' + identifier).value = attachurl + '/' + url;
	$('sortattach_image_' + identifier).innerHTML = '<img src="' + attachurl + '/' + url + '" class="spimg" />';
	ATTACHORIMAGE = 1;
}

function switchpollm(swt) {
	t = $('pollchecked').checked && swt ? 2 : 1;
	var v = '';
	for(var i = 0; i < $('postform').elements.length; i++) {
		var e = $('postform').elements[i];
		if(!isUndefined(e.name)) {
			if(e.name.match('^polloption')) {
				if(t == 2 && e.tagName == 'INPUT') {
					v += e.value + '\n';
				} else if(t == 1 && e.tagName == 'TEXTAREA') {
					v += e.value;
				}
			}
		}
	}
	if(t == 1) {
		var a = v.split('\n');
		var pcount = 0;
		for(var i = 0; i < $('postform').elements.length; i++) {
			var e = $('postform').elements[i];
			if(!isUndefined(e.name)) {
				if(e.name.match('^polloption')) {
					pcount++;
					if(e.tagName == 'INPUT') e.value = '';
				}
			}
		}
		for(var i = 0; i < a.length - pcount + 2; i++) {
			addpolloption();
		}
		var ii = 0;
		for(var i = 0; i < $('postform').elements.length; i++) {
			var e = $('postform').elements[i];
			if(!isUndefined(e.name)) {
				if(e.name.match('^polloption') && e.tagName == 'INPUT' && a[ii]) {
					e.value = a[ii++];
				}
			}
		}
	} else if(t == 2) {
		$('postform').polloptions.value = trim(v);

	}
	$('postform').tpolloption.value = t;
	if(swt) {
		display('pollm_c_1');
		display('pollm_c_2');
	}
}

function addpolloption() {
	if(curoptions < maxoptions) {
		var imgid = 'newpoll_'+curnumber;
		var proid = 'pollUploadProgress_'+curnumber;
		var pollstr = $('polloption_hidden').innerHTML.replace('newpoll', imgid);
		pollstr = pollstr.replace('pollUploadProgress', proid);
		$('polloption_new').outerHTML = '<p>' + pollstr + '</p>' + $('polloption_new').outerHTML;
		curoptions++;
		curnumber++;
		addUploadEvent(imgid, proid)

	} else {
		$('polloption_new').outerHTML = '<span>已达到最大投票数'+maxoptions+'</span>';
	}
}

function delpolloption(obj) {
	obj.parentNode.parentNode.removeChild(obj.parentNode);
	curoptions--;
}

function insertsave(pid) {
	var x = new Ajax();
	x.get('forum.php?mod=misc&action=loadsave&inajax=yes&pid=' + pid + '&type=' + wysiwyg, function(str, x) {
		insertText(str, str.length, 0);
	});
}

function userdataoption(op) {
	if(!op) {
		saveUserdata('forum_'+discuz_uid, '');
		display('rstnotice');
	} else {
		loadData();
		checkFocus();
	}
	doane();
}

function attachoption(type, op) {
	if(!op) {
		if(type == 'attach') {
			delAttach(ATTACHUNUSEDAID, 1);
			ATTACHNUM['attachunused'] = 0;
			display('attachnotice_attach');
		} else {
			delImgAttach(IMGUNUSEDAID, 1);
			ATTACHNUM['imageunused'] = 0;
			display('attachnotice_img');
		}
	} else if(op == 1) {
		var obj = $('unusedwin') ? $('unusedwin') : $('unusedlist_' + type);
		list = obj.getElementsByTagName('INPUT'), aids = '',aidsfeedback='';
		for(i = 0;i < list.length;i++) {
            if(list[i].name.match('unused') && list[i].checked) {
                if(list[i].getAttribute('isfeedback')=='1'){
                    aidsfeedback += '|' + list[i].value;
                }else{
                    aids += '|' + list[i].value;
                }
			}
		}

        if(aidsfeedback){
            list = jQuery("#jImg_btn_upload").find(".thumb-imgWrap");
            re = /^thumb\-imgWrap\-(\d+)$/;
            jQuery(list).each(function(i,els){
                var matches = re.exec(jQuery(els).attr("id"));
                if(matches != null) {
                    aidsfeedback += '|' + matches[1];
                }
            });
            updatefeedbackImageList(1,aidsfeedback);
        }
		if(aids) {
			if(type == 'attach') {
				updateAttachList(1, aids);
			} else {
				list = $('imgattachlist').getElementsByTagName('TD');
				re = /^image\_td\_(\d+)$/;
				for(i = 0;i < list.length;i++) {
					var matches = re.exec(list[i].id);
					if(matches != null) {
						aids += '|' + matches[1];
					}
				}
				updateImageList(1, aids);
			}
		}
		display('attachnotice_' + type);
	} else if(op == 2) {
		showDialog('<div id="unusedwin" class="c altw" style="overflow:auto;height:100px;">' + $('unusedlist_' + type).innerHTML + '</div>' +
			'<p class="o pns"><span class="z xg1"><label for="unusedwinchkall"><input id="unusedwinchkall" type="checkbox" onclick="attachoption(\'' + type + '\', 3)" checked="checked" />全选</label></span>' +
			'<button onclick="attachoption(\'' + type + '\', 1);hideMenu(\'fwin_dialog\', \'dialog\')" class="pn pnc"><strong>使用</strong></button></p>', 'info', '未使用的' + (type == 'attach' ? '附件' : '图片'));
	} else if(op == 3) {
		list = $('unusedwin').getElementsByTagName('INPUT');
		for(i = 0;i < list.length;i++) {
			if(list[i].name.match('unused')) {
				list[i].checked = $('unusedwinchkall').checked;
			}
		}
		return;
	}
	doane();
}

function insertAttachTag(aid) {
	var txt = '[attach]' + aid + '[/attach]';
	seditor_insertunit('fastpost', txt);
}
function insertAttachimgTag(aid) {
	var txt = '[attachimg]' + aid + '[/attachimg]';
	seditor_insertunit('fastpost', txt);
}
function insertText(str) {
	seditor_insertunit('fastpost', str);
}

function insertAllAttachTag() {
	var attachListObj = $('e_attachlist').getElementsByTagName("tbody");
	for(var i in attachListObj) {
		if(typeof attachListObj[i] == "object") {
			var attach = attachListObj[i];
			var ids = attach.id.split('_');
			if(ids[0] == 'attach') {
				if($('attachname'+ids[1]) && attach.style.display != 'none') {
					if(parseInt($('attachname'+ids[1]).getAttribute('isimage'))) {
						insertAttachimgTag(ids[1]);
					} else {
						insertAttachTag(ids[1]);
					}
					var txt = wysiwyg ? '\r\n<br/><br/>\r\n' : '\r\n\r\n';
					insertText(txt, strlen(txt), 0);
				}
			}
		}
	}
	doane();
}

function selectAllSaveImg(state) {
	var inputListObj = $('imgattachlist').getElementsByTagName("input");
	for(i in inputListObj) {
		if(typeof inputListObj[i] == "object" && inputListObj[i].id) {
			var inputObj = inputListObj[i];
			var ids = inputObj.id.split('_');
			if(ids[0] == 'albumaidchk' && $('image_td_' + ids[1]).className != 'imgdeleted' && inputObj.checked != state) {
				inputObj.click();
			}
		}
	}
}

function showExtra(id) {
	if ($(id+'_c').style.display == 'block') {
		$(id+'_b').className = 'pn z';
		$(id+'_c').style.display = 'none';
	} else {
		var extraButton = $('post_extra_tb').getElementsByTagName('label');
		var extraForm = $('post_extra_c').getElementsByTagName('div');

		for (i=0;i<extraButton.length;i++) {
			extraButton[i].className = '';
		}

		for (i=0;i<extraForm.length;i++) {
			if(hasClass(extraForm[i],'exfm')) {
				extraForm[i].style.display = 'none';
			}
		}

		for (i=0;i<extraForm.length;i++) {
			if(hasClass(extraForm[i],'exfm')) {
				extraForm[i].style.display = 'none';
			}
		}
		$(id+'_b').className = 'a';
		$(id+'_c').style.display = 'block';
	}
}

function extraCheck(op) {
	if(!op && $('extra_replycredit_chk')) {
		$('extra_replycredit_chk').className = $('replycredit_extcredits').value > 0 && $('replycredit_times').value > 0 ? 'a' : '';
	} else if(op == 1 && $('readperm')) {
		$('extra_readperm_chk').className = $('readperm').value !== '' ? 'a' : '';
	} else if(op == 2 && $('price')) {
		$('extra_price_chk').className = $('price').value > 0 ? 'a' : '';
	} else if(op == 3 && $('rushreply')) {
		$('extra_rushreplyset_chk').className = $('rushreply').checked ? 'a' : '';
	} else if(op == 4 && $('tags')) {
		$('extra_tag_chk').className = $('tags').value !== '' ? 'a' : '';
	} else if(op == 5 && $('cronpublish')) {
		$('extra_pubdate_chk').className = $('cronpublish').checked ? 'a' : '';
	}
}

function hidenFollowBtn(flag) {
	var fobj = $('adddynamicspan');
	if(fobj) {
		if(flag) {
			$('adddynamic').checked = !flag;
			fobj.style.display = 'none';
		} else {
			fobj.style.display = '';
		}
	}
}

function getreplycredit() {
	var replycredit_extcredits = $('replycredit_extcredits');
	var replycredit_times = $('replycredit_times');
	var credit_once = parseInt(replycredit_extcredits.value) > 0 ? parseInt(replycredit_extcredits.value) : 0;
	var times = parseInt(replycredit_times.value) > 0 ? parseInt(replycredit_times.value) : 0;
	if(parseInt(credit_once * times) - have_replycredit > 0) {
		var real_reply_credit = Math.ceil(parseInt(credit_once * times) - have_replycredit + ((parseInt(credit_once * times) - have_replycredit) * creditstax));
	} else {
		var real_reply_credit = Math.ceil(parseInt(credit_once * times) - have_replycredit);
	}

	var reply_credits_sum = Math.ceil(parseInt(credit_once * times));

	if(real_reply_credit > userextcredit) {
		$('replycredit').innerHTML = '<b class="xi1">回帖奖励积分总额过大('+real_reply_credit+')</b>';
	} else {
		if(have_replycredit > 0 && real_reply_credit < 0) {
			$('replycredit').innerHTML = "<font class='xi1'>返还"+Math.abs(real_reply_credit)+"</font>";
		} else {
			$('replycredit').innerHTML = replycredit_result_lang + (real_reply_credit > 0 ? real_reply_credit : 0 );
		}
		$('replycredit_sum').innerHTML = reply_credits_sum > 0 ? reply_credits_sum : 0 ;
	}
}

function extraCheckall() {
	for(i = 0;i < 5;i++) {
		extraCheck(i);
	}
}

function deleteThread() {
	if(confirm('确定要删除该帖子吗？') != 0){
		$('delete').value = '1';
		$('postform').submit();
	}
}

function hideAttachMenu(id) {
	if($(editorid + '_' + id + '_menu')) {
		$(editorid + '_' + id + '_menu').style.visibility = 'hidden';
	}
}

/**验证联系人**/
function checkContact(obj,checklen,maxlen){
    var v = obj.value, charlen = 0, maxlen = !maxlen ? 200 : maxlen, curlen = maxlen, len = strlen(v);
    obj.value = obj.value.replace(/[^\d.]/g,"");   //清除“数字”，“.”和“空格”以外的字符
    for(var i = 0; i < obj.value.length; i++) {
            curlen -= charset == 1;
    }
    if(curlen > len) {
        //$(checklen).innerHTML = curlen - len;
    } else {
        obj.value = mb_cutstrUTF8(obj.value, maxlen, '');
    }
}

/**验证**/
function vailate(obj){
    if(obj&&obj!="bug"){
        checkTip(obj);
    }else if(obj=="bug"){
        if(checkTip(document.getElementById("description")) && checkTip(document.getElementById("steps")) &&checkTip(document.getElementById("contact"))){
            return true;
        }
        return false;
    }
    else{
        if(checkTip(document.getElementById("backgrounds")) && checkTip(document.getElementById("description")) &&checkTip(document.getElementById("contact"))&&checkTip(document.getElementById("funtions"))){
            return true;
        }
        return false;
    }
}
function checkTip(fromFieldid){
    if (fromFieldid.value && typeof(fromFieldid.value)!="undefined"){
        document.getElementById(fromFieldid.id+"_tip").style.display="none";
        return true;
    }else{
        document.getElementById(fromFieldid.id+"_tip").style.display="";
        return false;
    }
}
/**
 * 获取文件的扩展名
 * @returns {boolean}
 */
function lastname(){
    //获取欲上传的文件路径
    var filepath = document.getElementById("logFile").value;
    //为了避免转义反斜杠出问题，这里将对其进行转换
    var re = /(\\+)/g;
    var filename=filepath.replace(re,"#");
    //对路径字符串进行剪切截取
    var one=filename.split("#");
    //获取数组中最后一个，即文件名
    var two=one[one.length-1];
    //再对文件名进行截取，以取得后缀名
    var three=two.split(".");
    //获取截取的最后一个字符串，即为后缀名
    var last=three[three.length-1];
    //添加需要判断的后缀名类型
    var tp ="txt,zip,rar";
    //返回符合条件的后缀名在字符串中的位置
    var rs=tp.indexOf(last);
    //如果返回的结果大于或等于0，说明包含允许上传的文件类型
    if(rs>=0){
        return true;
    }else{
        $("btn_logFile_tip").innerHTML="请上传"+tp+"文件类型"
        $("btn_logFile_tip").style.display="";
        return false;
    }
}

function checkfile(){
    var maxsize = document.getElementById("file_max_size").value*1024*1024;//2M
    var errMsg = "上传的附件文件不能超过"+document.getElementById("file_max_size").value+"M！！！";
    var tipMsg = "您的浏览器暂不支持计算上传文件的大小，建议使用IE、FireFox、Chrome浏览器。";
    var  browserCfg = {};
    var ua = window.navigator.userAgent;
    if (ua.indexOf("MSIE")>=1){
        browserCfg.ie = true;
    }else if(ua.indexOf("Firefox")>=1){
        browserCfg.firefox = true;
    }else if(ua.indexOf("Chrome")>=1){
        browserCfg.chrome = true;
    }else if(ua.indexOf("rv:11.0")>=1){
        browserCfg.ie11 = true;
    }
    try{
        var obj_file = document.getElementById("logFile");
        if(obj_file.value==""){
            return false;
        }
        var filesize = 0;
        if(browserCfg.firefox || browserCfg.chrome || browserCfg.ie11){
            filesize = obj_file.files[0].size;
        }else if(browserCfg.ie){
            var obj_img = document.getElementById('tempimg');
            obj_img.dynsrc=obj_file.value;
            filesize = obj_img.fileSize;
        }else{
            jQuery("#btn_logFile_tip").html(tipMsg).show();
            return false;
        }
        if(filesize==-1){
            jQuery("#btn_logFile_tip").html(tipMsg).show();
            return false;
        }else if(filesize>maxsize){
            jQuery("#btn_logFile_tip").html(errMsg).show();
            return false;
        }else{
            return true;
        }
    }catch(e){
        return false;
    }
}
