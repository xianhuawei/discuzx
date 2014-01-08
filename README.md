discuzx3.1
==========
1,MyISAM改成InnoDB
2,加了几个主键,加了几个索引
3,mediumint(8) 改成 int(11)
4,DAO层加了点cache ; 去掉了apc,xcache,eaccelerator,wincache，只剩下常用的redis,memcache
