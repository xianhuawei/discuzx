<?php
 
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class plugin_torrent_info {
    var $identifier = 'torrent_info';
    var $cvars = array();
    var $ac = array();

    function plugin_torrent_info() {
        global $_G;
        $this->cvars = $_G['cache']['plugin']['torrent_info'];
        $forums_list = (array)unserialize($this->cvars['forums_list']);
        $this->cvars['forums_list'] = is_array($forums_list) ? $forums_list : array();
        $groups_list = (array)unserialize($this->cvars['groups_list']);
        $this->cvars['groups_list'] = is_array($groups_list) ? $groups_list : array();
        $this->ac = $_G['cache']['plugin']['attachcenter'];
    }

    function common() {
        global $_G;
        if($_GET['mod'] == 'viewthread') {
        }
    }

    function discuzcode() {}
}

class plugin_torrent_info_forum extends plugin_torrent_info {
    function viewthread_bottom_output() {
        global $_G, $postlist, $return;
        if((empty($this->cvars['forums_list'][0]) || in_array($_G['fid'], $this->cvars['forums_list'])) && (empty($this->cvars['groups_list'][0]) || in_array($_G['groupid'], $this->cvars['groups_list'])) && isset($_G['forum_thread']['attachment'])){
            foreach($postlist as $pid => $post) {
                if($post['first']) {
                    $torrent_file = '<link rel="stylesheet" type="text/css" href="./plugin.php?id=torrent_info:file&type=css" />';
                    $torrent_file.= '<script type="text/javascript" src="./plugin.php?id=torrent_info:file&type=js"></script>';
                    $postlist[$pid]['message'] = $torrent_file.$postlist[$pid]['message'];
                }
                foreach($post['attachments'] as $aid => $attach) {
                    if($attach['ext'] == 'torrent') {
                        if(in_array($aid, $post['attachlist'])){
                            $postlist[$pid]['attachments'][$aid]['description'] = '[<a href="plugin.php?id=torrent_info:info&aid='.$aid.'" onclick="showWindow(\'torrentInfo\', this.href);return false">'.lang('plugin/torrent_info', 'torrent_info').'</a>]'.
                            (!empty($attach['description']) ? '<br />'.$attach['description'] : NULL);
                        }else{
                            $search = '/(<div\s.*?id="attach_'.$aid.'_menu"[\S\s]+?<\/div>[\S\s]+?)(<\/div>)/i';
                            $replace = '\1<br \/>[<a href="plugin.php?id=torrent_info:info&aid='.$aid.'" onclick="showWindow(\'torrentInfo\', this.href);return false">'.lang('plugin/torrent_info', 'torrent_info').'</a>]\2';
                            $postlist[$pid]['message'] = preg_replace($search, $replace, $postlist[$pid]['message']);
                        }
                    }
                }
            }
        }
    }
}
?>