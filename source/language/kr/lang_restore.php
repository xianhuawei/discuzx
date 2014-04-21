<?php

/**
 *      $Id: lang_restore.php by Valery Votintsev at sources.ru
 */

$lang = array(

//---------------------------
//utility/restore.php

	'restore_title'		=> 'Discuz! 테이타 복구 도구',//'Discuz! 数据恢复工具',
	'restore_questions'	=> '복구시 문제가 있으면 기술지원 사이트를  방문 바랍니다.',//'恢复当中有任何问题请访问技术支持站点',
	'browser_jump'		=> '브라우저가 자동으로 넘어감으로 장시간 변동없을시 외 에는 인공터치 안하셔도 됩니다.',//'浏览器会自动跳转页面，无需人工干预。除非当您的浏览器长时间没有自动跳转时，请点击这里',
	'ok'			=> '확인',//'确定',
	'cancel'		=> '취소',//'取消',
	'filename'		=> '파일명',//'文件名称',

	'director'		=> '소재목록',//'所在目录',
	'version'		=> '버전',//'版本',
	'time'			=> '백업시간',//'备份时间',
	'type'			=> '유형',//'类型',
	'size'			=> '사이즈',//'尺寸',
	'db_method'		=> '방식',//'方式',
	'db_volume'		=> '볼륨수',//'卷数',
	'import'		=> '도입',//'导入',
	'different_dbcharset_tablepre'	=> '도입하신 백업데이터와 설정파일{diff} 동일하지 않습니다. 프로그램을 계속 진행 하시겠습니까?',//'检测到导入的备份数据与配置文件的{diff} 不同，您还要继续运行此程序吗？',
	'db_import_tips'	=> '본 기능은 백업한 데이터 복구하는 동시에 모든 기존 데이터를 업하오니 진행전 사이트 정지를 하셨는지 확인바랍니다. 복구완료후 사이트를 다시 오픈하시면 됩니다.<br />데이터 백업 관리기능으로 사이트 백업파일의 상세내역을 보실수 있고 삭제 혹은 도입할수 있습니다.<br /><span class="red">데이터 복구 과정은 새로운 페이지에서 완성되며 복구성공후 필히restore.php파일을 삭제하시기 바랍니다. </span><br />',//'本功能在恢复备份数据的同时，将全部覆盖原有数据，请确定恢复前已将论坛关闭，恢复全部完成后可以将论坛重新开放。<br />您可以通过数据备份管理功能查看站点的备份文件的详细信息，删除过期的备份,并导入需要的备份。<br /><span class="red">恢复数据的整个过程会在一个新页面完成，您成功恢复数据后请务必及时删除restore.php文件。</span><br />',
	'db_export_discuz'	=> 'Discuz! 데이터(UCenter미포함)',//'Discuz! 数据(不含UCenter)',
	'db_export_discuz_uc'	=> 'Discuz! 및 UCenter 데이터',//'Discuz! 和 UCenter 数据',
	'db_multivol'		=> '다 볼륨',//'多卷',
	'db_import_unzip'	=> '압축풀기',//'解压缩',
	'db_export_zip'		=> '백업압축',//'压缩备份',
	'db_zip'		=> 'ZIP',
	'db_shell'		=> 'Shell',
	'unknown'		=> '미지',//'未知',
	'backup_file_unexist'	=> '백업파일이 존재하지 않습니다.',//'备份文件不存在',
	'connect_error'		=> 'DB연결실패,DB설정파일(config/config_global.php와config/config_ucenter.php)을 확인 하세요.',//'连接数据库失败，请您查看数据库配置文件config/config_global.php和config/config_ucenter.php是否存在以及配置是否正确',
	'dbcharsetdiff'		=> ' 데이터베이스 문자집합 ($_config[\'db\'][\'1\'][\'dbcharset\'])',//' 数据库字符集($_config[\'db\'][\'1\'][\'dbcharset\'])',
	'tableprediff'		=> '데이블 접두사 ($_config[\'db\'][\'1\'][\'tablepre\'])',//' 表前缀($_config[\'db\'][\'1\'][\'tablepre\'])',
	'database_import_multivol_succeed'	=> 'Multi-Volume 데이터를 성공적으로 사이트 데이터베이스에 불러오기 했습니다.<br />관리자 센터에서 캐시를 업데이트 하세요.<br /><span class="red">restore.php 파일을 삭제 하세요.</span>',//'分卷数据成功导入站点数据库<br />请在后台更新缓存<br /><span class="red">请尽快删除restore.php文件，以免对数据造成影响</span>',
	'database_import_file_illegal'		=> '데이터 파일이 존재하지 않습니다: 서버가 파일 업로드를 허용하지 않거나 파일이 너무 큽니다.',//'数据文件不存在：可能服务器不允许上传文件或文件大小超过限制',
	'database_import_multivol_prompt'	=> 'Volume data imported into the database successfully, do you need to automatically import a backup to other volumes in this backup?',//'分卷数据第一卷成功导入数据库，您需要自动导入本次备份的其他分卷吗？',
	'database_import_succeed'		=> '사이트 데이터베이스에 데이터 불러오기 완료.<br />관리자 센터에서 캐시를 업데이트 하세요.<br /><span class="red"> restore.php 파일을 삭제하세요.</span>',//'数据已成功导入站点数据库<br />请在后台更新缓存<br /><span class="red">请尽快删除restore.php文件，以免对数据造成影响</span>',
	'database_import_format_illegal'	=> 'Discuz! 데이터 파일 격식이 아니여서 불러오기 않됩니다.',//'数据文件非 Discuz! 格式，无法导入',
	'database_import_unzip'			=> '{info}<br />백업파일 압축풀기 완성. 백업을 자동 불러오기 하시겠습니까? 압축풀기한 파일들은 삭제 됩니다.',//'{info}<br />备份文件解压缩完毕，您需要自动导入备份吗？导入后解压缩的文件将会被删除',
	'database_import_multivol_unzip'	=> '{info}<br />백업파일 압축풀기 완성. 기타 sub-volume파일도 자동 압축풀기 진행 하시겠습니까?',//'{info}<br />备份文件解压缩完毕，您需要自动解压缩其他的分卷文件吗？',
	'database_import_multivol_unzip_redirect'	=> '데이터 파일 # {multivol} 압축풀기 성공. 자동 계속 진행.',//'数据文件 #{multivol} 解压缩成功，程序将自动继续',
	'database_import_confirm'		=> '현재 Discuz! 버전과 일치하지않는 데이터 불러오기는 해결할수 없는 에러를 발생시킬수 있는데 그래도 계속 진행 하시겠습니까? ',//'导入和当前 Discuz! 版本不一致的数据极有可能产生无法解决的故障，您确定继续吗？',
	'database_import_confirm_sql'		=> '백업을 복구 하시겠습니까?',//'您确定导入该备份吗？',
	'database_import_confirm_zip'		=> '백업을 압출풀기 하시겠습니까?',//'您确定解压该备份吗？',
	'database_import_multivol_confirm'	=> '모든 sub-volume 파일 압축풀기 완성, 백업 파일을 자동 불러오기 하시겠습니까? 불러오기 진행후 압축풀기한 파일은 삭제 됩니다.',//'所有分卷文件解压缩完毕，您需要自动导入备份吗？导入后解压缩的文件将会被删除',
	'database_import_multivol_redirect'	=> '데이터 파일 # {volume} 불러오기에 성공했습니다.자동으로 계속 진행됩니다.',//'数据文件 #{volume} 成功导入，程序将自动继续',
	'error_quit_msg'			=> '위 문제를 해결해야 데이터 복구를 계속 진행할수 있습니다.',//'必须解决以上问题，才能继续恢复数据',
	'restored_error'			=> '이미 복구하셨기때문에 데이터 복구 기능 잠금됨.데이터 복구를 하시려면 ./data/restore.lock 파일을 삭제하세요.',//'恢复数据功能锁定，已经恢复过了，如果您确定要恢复数据，请到服务器上删除./data/restore.lock',

// Added by Valery Votintsev
	'restore_title'		=> 'Discuz! 데이터 복구 공구',//'Discuz! 数据恢复工具',
	'restore_questions'	=> '복구시 문제있으면 기술지원 센터 방문 바랍니다.',//'恢复当中有任何问题请访问技术支持站点',
	'browser_jump'		=> '브라우저가 자동 이동됩니다. 오랜시간 이동되지 않을시 클릭하세요.',//'浏览器会自动跳转页面，无需人工干预。除非当您的浏览器长时间没有自动跳转时，请点击这里',
	'ok'			=> '확인',//'确定',
	'cancel'		=> '취소',//'取消',

);