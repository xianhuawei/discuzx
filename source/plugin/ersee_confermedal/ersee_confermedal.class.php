<?php
if ( ! defined( 'IN_DISCUZ' ) )
{
    exit( 'Access Denied' );
}
class plugin_ersee_confermedal
{
}

class plugin_ersee_confermedal_forum extends plugin_ersee_confermedal
{
    public function index_bottom ()
    {
        global $_G;
        $enable = isset( $_G['cache']['plugin']['ersee_confermedal']['ersee_confermedal_enable'] ) ? $_G['cache']['plugin']['ersee_confermedal']['ersee_confermedal_enable'] : 0;
        if ( ! $enable || ! $_G['uid'] )
            return;
        $notice_enable = isset( $_G['cache']['plugin']['ersee_confermedal']['ersee_confermedal_notice_enable'] ) ? $_G['cache']['plugin']['ersee_confermedal']['ersee_confermedal_notice_enable'] : 0;
        $notice_title = isset( $_G['cache']['plugin']['ersee_confermedal']['ersee_confermedal_notice_title'] ) ? $_G['cache']['plugin']['ersee_confermedal']['ersee_confermedal_notice_title'] : '';
        $notice_content = isset( $_G['cache']['plugin']['ersee_confermedal']['ersee_confermedal_notice_content'] ) ? $_G['cache']['plugin']['ersee_confermedal']['ersee_confermedal_notice_content'] : '';
        $medalNews = $medalIds = array ();
        $memberFieldForum = C::t( 'common_member_field_forum' )->fetch( $_G['uid'] );
        $memberMedals = empty( $memberFieldForum['medals'] ) ? array () : explode( "\t", $memberFieldForum['medals'] );
        foreach ( C::t( 'forum_medal' )->fetch_all_data( 1 ) as $forumMedal )
        {
            $permission = dunserialize( $forumMedal['permission'] );
            if ( $permission['usergroupallow'] && ! in_array( $_G['groupid'], $permission['usergroups'] ) || empty( $permission[0] ) )
                continue;
            $forumMedal['permission'] = medalformulaperm( serialize( array (
                    'message' => '',
                    'medal' => $permission,
                    'usergroupallow' => '',
                    'usergroups' => array () 
            ) ), 1 );
            if ( empty( $forumMedal['permission'] ) && ! in_array( $forumMedal['medalid'], $memberMedals ) )
            {
                $medalNews[] = $forumMedal;
                $medalIds[] = $forumMedal['medalid'];
            }
        }
        if ( ! empty( $medalIds ) )
        {
            $inserMedalId = '';
            $medalNewsCount = count( $medalNews );
            if ( empty( $memberFieldForum['medals'] ) )
            {
                $inserMedalId = implode( "\t", $medalIds );
            }
            else
            {
                $medalIds = array_merge( explode( "\t", $memberFieldForum['medals'] ), $medalIds );
                sort( $medalIds );
                $inserMedalId = implode( "\t", $medalIds );
            }
            C::t( 'common_member_field_forum' )->update( $_G['uid'], array (
                    'medals' => $inserMedalId 
            ), true );
            foreach ( $medalNews as $medalNew )
            {
                C::t( 'forum_medallog' )->insert( array (
                        'uid' => $_G['uid'],
                        'medalid' => $medalNew['medalid'],
                        'type' => 0,
                        'dateline' => $_G['timestamp'],
                        'expiration' => empty( $medalNew['expiration'] ) ? 0 : TIMESTAMP + $medalNew['expiration'] * 86400,
                        'status' => empty( $medalNew['status'] ) ? 0 : 1 
                ) );
                $notice_enable && notification_add( $_G['uid'], 'system', 'system_notice', array (
                        'subject' => $notice_title,
                        'message' => str_replace( array (
                                '{$username}',
                                '{$medalname}' 
                        ), array (
                                $_G['username'],
                                $medalNew['name'] 
                        ), $notice_content . '&nbsp;&nbsp;<a href="' . $_G['siteurl'] . 'home.php?mod=medal&action=log" target="_blank">�鿴ѫ��</a>' ),
                        'from_id' => 0,
                        'from_idtype' => 'sendnotice' 
                ), 1 );
                C::t( 'common_member_medal' )->insert( array (
                        'uid' => $_G['uid'],
                        'medalid' => $medalNew['medalid'] 
                ), 0, 1 );
            }
        }
        return;
    }
}