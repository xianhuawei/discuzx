--
1,forum_thread 其它页面,只要满页也缓存 fetch_all_by_tid_range_position,fetch_all_common_viewthread_by_tid,fetch_all_search
--
2,forum_post 改造 insert $maxposition 查主库 把当前页面的缓存删除
--
3,forum_post 分表优化 唯一ID生成; pid,tableid,tid,authorid 索引

4,好友,文章索引优化
