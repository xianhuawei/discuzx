<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php by Valery Votintsev at sources.ru
 *	Translated to Spanish by razor007, discuzhispano.com
 */

$lang = array
(

	'type_wall'		=> 'Mensaje del muro',//'留言',
	'type_piccomment'	=> 'Comentario de la imagen ',//'图片评论',
	'type_blogcomment'	=> 'Comentario del blog',//'日志评论',
	'type_clickblog'	=> 'Posicionamiento del blog',//'日志表态',
	'type_clickarticle'	=> 'Posicionamiento del artículo',//'文章表态',
	'type_clickpic'		=> 'Imagen de posicionamiento',//'图片表态',
	'type_sharecomment'	=> 'Compartir comentario',//'分享评论',
	'type_doing'		=> 'Aciones',//'记录',
	'type_friend'		=> 'Amigos',//'好友',
	'type_credit'		=> 'Dinero',//'积分',
	'type_bbs'		=> 'Foros',//'论坛',
	'type_system'		=> 'Sistema',//'系统',
	'type_thread'		=> 'Temas',//'主题',
	'type_task'		=> 'Tareas',//'任务',
	'type_group'		=> 'Grupos',//'群组',

	'mail_to_user'		=> 'Nueva notificación',//'有新的通知',
	'showcredit'		=> '{actor} le ofrece una oferta {credit} puntos para mejorar su posición en la <a href="home.php?mod=space&do=top" target="_blank">Lista de Top</a>.',//'{actor} 赠送给你 {credit} 个竞价积分，帮助提升在 <a href="home.php?mod=space&do=top" target="_blank">竞价排行榜</a> 中的名次',
	'share_space'		=> '{actor} compartio tu espacio.',//'{actor} 分享了你的空间',
	'share_blog'		=> '{actor} compartio tu blog <a href="{url}" target="_blank">{subject}</a>',//'{actor} 分享了你的日志 <a href="{url}" target="_blank">{subject}</a>',
	'share_album'		=> '{actor} compartio tu álbum <a href="{url}" target="_blank">{albumname}</a>.',//'{actor} 分享了你的相册 <a href="{url}" target="_blank">{albumname}</a>',
	'share_pic'		=> '{actor} compartio tu imagen del álbum  <a href="{url}" target="_blank">{albumname}</a>.',//'{actor} 分享了你的相册 {albumname} 中的 <a href="{url}" target="_blank"> 图片</a>',
	'share_thread'		=> '{actor} compartio tu tema <a href="{url}" target="_blank">{subject}</a>.',//'{actor} 分享了你的帖子 <a href="{url}" target="_blank">{subject}</a>',
	'share_article'		=> '{actor} compartio tu artículo <a href="{url}" target="_blank">{subject}</a>',//'{actor} 分享了你的文章 <a href="{url}" target="_blank">{subject}</a>',
	'magic_present_note'	=> ' presenta tu magia <a href="{url}" target="_blank">{name}</a>.',//'送给你一个道具 <a href="{url}" target="_blank">{name}</a>',
	'friend_add'		=> '{actor} y tu quiere convertirse en amigos.',//'{actor} 和你成为了好友',
	'friend_request'	=> '{actor} pide que lo agregues como amigo: {note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">Aceptar la solicitud</a>',//'{actor} 请求加您为好友{note}&nbsp;&nbsp;<a onclick="showWindow(this.id, this.href, \'get\', 0);" class="xw1" id="afr_{uid}" href="{url}">批准申请</a>',
	'doing_reply'		=> '{actor} respondió a su <a href="{url}" target="_blank">tweet</a>.',//'{actor} 在 <a href="{url}" target="_blank">记录</a> 中对你进行了回复',
	'wall_reply'		=> '{actor} respondió a su <a href="{url}" target="_blank">mensaje del muro</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">留言</a>',
	'pic_comment_reply'	=> '{actor} respondió a su <a href="{url}" target="_blank">comentario de la imagen</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">图片评论</a>',
	'blog_comment_reply'	=> '{actor} respondió a su <a href="{url}" target="_blank">comentario</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">日志评论</a>',
	'share_comment_reply'	=> '{actor} respondió a su <a href="{url}" target="_blank">compartimieno del comentario</a>',//'{actor} 回复了你的 <a href="{url}" target="_blank">分享评论</a>',
	'wall'			=> '{actor} dejo un <a href="{url}&fchannel=nwall" target="_blank">mensaje</a> en tu muro.',//'{actor} 在留言板上给你 <a href="{url}&fchannel=nwall" target="_blank">留言</a>',
	'pic_comment'		=> '{actor} comento tu <a href="{url}" target="_blank">imagen</a>',//'{actor} 评论了你的 <a href="{url}" target="_blank">图片</a>',
	'blog_comment'		=> '{actor} comento tu blog <a href="{url}" target="_blank">{subject}</a>',//'{actor} 评论了你的日志 <a href="{url}" target="_blank">{subject}</a>',
	'share_comment'		=> '{actor} comentó a su <a href="{url}" target="_blank">compartir</a>',//'{actor} 评论了你的 <a href="{url}" target="_blank">分享</a>',
	'click_blog'		=> '{actor} calificó su blog <a href="{url}" target="_blank">{subject}</a> y hizo una declaración',//'{actor} 对你的日志 <a href="{url}" target="_blank">{subject}</a> 做了表态',
	'click_pic'		=> '{actor} valoró tu <a href="{url}" target="_blank">imagen</a>',//'{actor} 对你的 <a href="{url}" target="_blank">图片</a> 做了表态',
	'click_article'		=> '{actor} valoró tu articulo <a href="{url}" target="_blank">articulo</a>',//'{actor} 对你的 <a href="{url}" target="_blank">文章</a> 做了表态',
	'show_out'		=> '{actor} visita su página de inicio, este mostró su oferta final punto también consumen',//'{actor} 访问了你的主页后，你在竞价排名榜中最后一个积分也被消费掉了',
	'puse_article'		=> 'Felicitaciones, su artículo <a href="{url}" target="_blank">{subject}</a> se ha puesto en el portal., <a href="{newurl}" target="_blank">haga clic aquí para ver</a>',//'恭喜你，你的<a href="{url}" target="_blank">{subject}</a>已被推送到门户， <a href="{newurl}" target="_blank">点击查看</a>',

	'myinvite_request'	=> 'Nuevo mensaje de la Aplicación <a href="home.php?mod=space&do=notice&view=userapp">Haga clic aquí para ingresar a la página de información sobre aplicaciones y operaciones relacionadas</a>',//'有新的应用消息<a href="home.php?mod=space&do=notice&view=userapp">点此进入应用消息页面进行相关操作</a>',


	'group_member_join'		=> '{actor} queremos que se unan a su grupo <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>, por favor moderar él en el <a href="{url}" target="_blank">Grupo CP</a>',//'{actor} 加入你的群组需要审核，请到群组 <a href="{url}" target="_blank">管理后台</a> 进行审核',
	'group_member_invite'		=> '{actor} lo invita a unirse al grupo <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a>, <a href="{url}" target="_blank">Pulsa aquí para unirme ahora</a>',//'{actor} 邀请你加入 <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> 群组，<a href="{url}" target="_blank">点此马上加入</a>',
	'group_member_check'		=> 'Usted solicita a unirse al grupo <a href="{url}" target="_blank">{groupname}</a> fue aprobada, por favor <a href="{url}" target="_blank">Haga clic aquí para ver</a>',//'你已经通过了 <a href="{url}" target="_blank">{groupname}</a> 群组的审核，请 <a href="{url}" target="_blank">点击访问</a>',
	'group_member_check_failed'	=> 'Tu grupo <a href="{url}" target="_blank">{groupname}</a> No ah pasado la verificación',//'你没有通过 <a href="{url}" target="_blank">{groupname}</a> 群组的审核。',

	'reason_moderate'	=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue {modaction} por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge'		=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue {modaction} por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post'	=> 'Tu post en <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue borrado por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment'	=> 'Tu comentario en <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> fue borrado por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的点评被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post'	=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue {modaction} por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

//	'reason_warn_post' => '您的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction}<br />
//连续 {warningexpiration} 天内累计 {warninglimit} 次警告，您将被自动禁止发言 {warningexpiration} 天。<br />
//截止至目前，您已被警告 {authorwarnings} 次，请注意！<div class="quote"><blockquote>{reason}</blockquote></div>',
	'reason_warn_post'	=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue {modaction} por {actor}.<br/>
				Fueron advertidos {warninglimit} veces en {warningexpiration} días, estará deshabilitado su post {warningexpiration} días automáticamente.<br/>
				En la actualidad, usted ha sido advertido {authorwarnings} veces!
				<div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move'			=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue movido a <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 移动到 <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy'			=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue copiado como <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 复制为 <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward'		=> 'Su recompensa del tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue removida por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update'		=> 'A su post <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> se añadió un sello {stamp} por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图章 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete'		=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue eliminado el sello por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图章 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update'	=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> por {actor} añadio el icono {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图标 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete'	=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> por {actor} quito el icono <div class="quote"><blockquote>{reason}</blockquote></div>',//'你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图标 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply'		=> 'Su respuesta al post <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue resaltada al comienzo por {actor}. <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply'	=> 'Su respuesta en un post <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> fue quitado el resaltado por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回帖被 {actor} 撤销置顶 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete'	=> 'Tu tema {threadsubject} no fue aprobada, y fue borrado! <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 {threadsubject} 没有通过审核，现已被删除！<div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_validate'	=> 'Tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> fue aprobado! &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Haga clic aquí para verlo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> 已经审核通过！ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_delete'	=> 'Su respuesta no fue aprobada, asi que ha sido borrada! <p class="summary">Content: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表回复没有通过审核，现已被删除！ <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_validate'	=> 'Su respuesta fue aprobada! &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">Haga clic aquí para verlo</a> <p class="summary">Contenido: <span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',//'你发表的回复已经审核通过！ &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'transfer'		=> 'Tu has recivido {credit} puntos de {actor} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">Haga clic aquí para verlo</a>
				<p class="summary">{actor} dijo: <span>{transfermessage}</span></p>',

	'addfunds'		=> 'Su solicitud para recargar puntos se finalizó con éxito, Correspondiente de la cantidad de puntos se han acreditado a su cuenta
                		&nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">Haga clic aquí para verlo &rsaquo;</a>.
				<p class="summary">Ordenar por numero: <span>{orderid}</span></p>
                		<p class="summary">Pago: <span>{price} USD</span></p>
                		<p class="summary">Puntos a solicitar: <span>{value}</span></p>',
//	'addfunds' => '您提交的积分充值请求已完成，相应数额的积分已存入您的积分账户 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看 &rsaquo;</a>
//<p class="summary">订单号：<span>{orderid}</span></p><p class="summary">支出：<span>人民币 {price} 元</span></p><p class="summary">收入：<span>{value}</span></p>',

	'rate_reason'		=> 'Su mensaje en el post <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> fue valorado {ratescore} por {actor} <div class="quote"><blockquote>{reason}</blockquote></div>',//'你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'rate_removereason'	=> '{actor} quitó la calificación {ratescore} de tu tema <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'{actor} 撤销了你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 中帖子的评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send'	=> '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> compró su producto <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, el otro ha sido pagado, a la espera de su entrega  &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Haga clic aquí para ver</a>',//'<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 购买你的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，对方已经付款，等待你发货 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_buyer_confirm'	=> 'Usted compra el producto <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>, <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> ha enviado, en espera de su confirmación &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Haga clic aquí para ver</a>',//'你购买的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，<a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 已发货，等待你确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_fefund_success'	=> ' Los Productos <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> tiene una restitución con éxito, &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Opinar</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已退款成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_success'		=> 'Productos <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> fueron vendidos correctamente, &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Opinar</a>',//'商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已交易成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_order_update_sellerid'	=> 'El Vendedor <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> modificó el producto <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> single transaction, make sure that &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">view it</a>',//'卖家 <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_order_update_buyerid'	=> 'Comprador <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> modifico la orden <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> Única transacción, asegúrese de que &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Verlo</a>',//'买家 <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'eccredit'		=> 'Con su transacción (actor) se ha realizado evaluación a usted &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">Comentar</a>',//'与你交易的 {actor} 已经给你作了评价 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">回评 &rsaquo;</a>',

	'activity_notice'	=> '{actor} asolicitó unirse a su evento <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, por favor &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Verlo</a>',//'{actor} 申请加入你举办的活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>，请审核 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'activity_apply'	=> 'El evento <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> organizador "{actor}" ha aprobado su union a este evento &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Ir a verlo</a> <div class="quote"><blockquote>{reason}</blockquote></div>',//'活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 已批准你参加此活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish'	=> 'El evento <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>, iniciado por {actor}, informa a usted que usted necesita para mejorar la información de registro de eventos. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Verlo&rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete'	=> 'El evento <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> organizer "{actor}" se ha negado a su unión a este evento &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">Verlo</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel'	=> '{actor} canceló su participación en <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> evento. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">View &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification'	=> 'El evento <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> initiator {actor} sent a new information. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看活动 &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question'	=> 'Su recompensa del tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> se estableció una mejor respuesta por {actor} &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Ir a verlo</a>',//'你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 设置了最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer'	=> 'Su respuesta de recompensa del post <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was set as the best answer by author {actor} &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Ir a verlo</a>',//'你的回复被的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的作者 {actor} 选为悬赏最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer_moderator'	=> 'Su respuesta a la recompensa del post<a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> was selected as the best answer &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Ver &rsaquo;</a>',//'您在悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回复被选为最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'comment_add'		=> '{actor} comentó tu tema <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">Verlo &rsaquo;</a>',

	'reppost_noticeauthor'	=> '{actor} respondió el mensaje en el post   <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> &nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">Ir a verlo</a>',

	'task_reward_credit'	=> '¡Enhorabuena! Usted ha completado la tarea: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, y obtuvo el bonus {creditbonus} puntos. &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">View my points &rsaquo;</a></p>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得积分 {creditbonus} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看我的积分 &rsaquo;</a></p>',

	'task_reward_magic'	=> '¡Enhorabuena! Usted ha completado la tarea: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, y obtuvo el {bonus} magic <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得道具 <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} 张',

	'task_reward_medal'	=> '¡Enhorabuena! Usted ha completado la tarea:: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, y galardonado con la medalla de <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a>. Valido por: {bonus} dias.',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="forum.php?mod=medal" target="_blank">{rewardtext}</a> 有效期 {bonus} 天',

	'task_reward_medal_forever'	=> '¡Felicidades por completar sus tareas: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, Obtener la medalla <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> Permanentemente',//'恭喜您完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> 永久有效',

	'task_reward_invite'	=> '¡Enhorabuena! Usted ha completado la tarea: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>. The <a href="home.php?mod=spacecp&ac=invite" target="_blank">Codigo de invitacion {rewardtext}</a> es valido por {bonus} dias.',

	'task_reward_group'	=> 'Enhorabuena! Se ha completado la tarea: <a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>, y obtener el grupo de usuarios {rewardtext}. Valido por: {bonus} dias. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">Mirar mis permisos</a>',//'恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得用户组 {rewardtext} 有效期 {bonus} 天 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'user_usergroup'	=> 'El grupo de usuario se a actualizado a {usergroup}. &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">Mirar mis permisos</a>',//'你的用户组升级为 {usergroup} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'grouplevel_update'	=> '¡Enhorabuena! Su grupo {groupname} subio al nivel {newlevel}.',//'恭喜你，你的群组 {groupname} 已经升级到了 {newlevel}。',

	'thread_invite'		=> '{actor} lo invitamos a {invitename} the <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>. &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">Verlo</a>',//'{actor} 邀请你{invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'invite_friend'		=> '¡Enhorabuena! Se ha invitado, y se añadió por {actor} como amigo con éxito.',//'恭喜你成功邀请到 {actor} 并成为你的好友',

	'poke_request'		=> '<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">Volver a decir hola</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">Ignore</a>',//'<a href="{fromurl}" class="xi2">{fromusername}</a>: <span class="xw0">{pokemsg}&nbsp;</span><a href="home.php?mod=spacecp&ac=poke&op=reply&uid={fromuid}&from=notice" id="a_p_r_{fromuid}" class="xw1" onclick="showWindow(this.id, this.href, \'get\', 0);">回打招呼</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid={fromuid}&from=notice" id="a_p_i_{fromuid}" onclick="showWindow(\'pokeignore\', this.href, \'get\', 0);">忽略</a>',

	'profile_verify_error'		=> '{verify} la revisión de los datos no es aprobada, ya que debe llenar los siguientes campos:<br/>{profile}<br/> el motivo del rechazo: {reason}',//'{verify}资料审核被拒绝,以下字段需要重新填写:<br/>{profile}<br/>拒绝理由:{reason}',
	'profile_verify_pass'		=> 'Felicitaciones, rellenar los {verify} los datos revisados por el',//'恭喜你，你填写的{verify}资料审核通过了',
	'profile_verify_pass_refusal'	=> 'Lo sentimos, rellenar el {verify} los datos revisados fueron rechazados',//'很遗憾，你填写的{verify}资料审核被拒绝了',
	'member_ban_speak'			=> 'Se le ha prohibido hablar con {user}, duracion: {day}(0: en nombre de la mordaza permanente), y se les prohibió el postpor la razon de: {reason}',//'你已被 {user} 禁止发言，期限：{day}天(0：代表永久禁言)，禁言理由：{reason}',

	'member_moderate_invalidate'		=> 'Su cuenta fue rechazada por el administrador, por favor <a href="home.php?mod=spacecp&ac=profile"> volver a enviar su información de registro</a>.<br/>Administrador de observación: <b>{remark}</b>',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_validate'		=> 'Su cuenta ha sido aprobado.<br/> Administrador observación: <b>{remark}</b>',//'你的账号已经通过审核。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_invalidate_no_remark'	=> 'Su cuenta fue rechazada por el administrador, por favor<a href="home.php?mod=spacecp&ac=profile"> volver a enviar su información de registro</a>.',//'你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。',
	'member_moderate_validate_no_remark'	=> 'Su cuenta ha sido aprobada.',//'你的账号已经通过审核。',
	'manage_verifythread'		=> 'Nuevos temas pendientes. <a href="admin.php?action=moderate&operation=threads&dateline=all">Ir a verlo</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',//'有新的待审核主题。<a href="admin.php?action=moderate&operation=threads&dateline=all">现在进行审核</a>',
	'manage_verifypost'		=> 'Nuevos comentarios pendientes. <a href="admin.php?action=moderate&operation=replies&dateline=all">Ir a verlo</a>',//'有新的待审核回帖。<a href="admin.php?action=moderate&operation=replies&dateline=all">现在进行审核</a>',
	'manage_verifyuser'		=> 'Nuevos miembros de pendientes. <a href="admin.php?action=moderate&operation=members">Ir a verlo</a>',//'有新的待审核会员。<a href="admin.php?action=moderate&operation=members">现在进行审核</a>',
	'manage_verifyblog'		=> 'Nuevos blogs pendientes. <a href="admin.php?action=moderate&operation=blogs">Ir a verlo</a>',//'有新的待审核日志。<a href="admin.php?action=moderate&operation=blogs">现在进行审核</a>',
	'manage_verifydoing'		=> 'Nuevas acciones pendientes. <a href="admin.php?action=moderate&operation=doings">Ir a verlo</a>',//'有新的待审核记录。<a href="admin.php?action=moderate&operation=doings">现在进行审核</a>',
	'manage_verifypic'		=> 'Nuevas imágenes pendientes. <a href="admin.php?action=moderate&operation=pictures">Ir a verlo</a>',//'有新的待审核图片。<a href="admin.php?action=moderate&operation=pictures">现在进行审核</a>',
	'manage_verifyshare'		=> 'Nuevas acciones pendientes. <a href="admin.php?action=moderate&operation=shares">Ir a verlo</a>',//'有新的待审核分享。<a href="admin.php?action=moderate&operation=shares">现在进行审核</a>',
	'manage_verifycommontes'	=> 'Nueva espera de comentarios y respuestas. <a href="admin.php?action=moderate&operation=comments">Ir a verlo</a>',//'有新的待审核留言/评论。<a href="admin.php?action=moderate&operation=comments">现在进行审核</a>',
	'manage_verifyrecycle'		=> 'La papelera de reciclaje tiene nuevos articulos. <a href="admin.php?action=recyclebin">Ir a verlo</a>',//'回收站有新的待处理主题。<a href="admin.php?action=recyclebin">现在处理</a>',
	'manage_verifyrecyclepost'	=> 'La papelera de reciclaje tiene nuevos post. <a href="admin.php?action=recyclebinpost">Ir a verlo</a>',//'回帖回收站有新的待处理回帖。<a href="admin.php?action=recyclebinpost">现在处理</a>',
	'manage_verifyarticle'		=> 'Nuevos artículos pendientes. <a href="admin.php?action=moderate&operation=articles">Ir a verlo</a>',//'有新的待审核文章。<a href="admin.php?action=moderate&operation=articles">现在进行审核</a>',
	'manage_verifymedal'		=> 'Nuevas medallas pendientes.. <a href="admin.php?action=medals&operation=mod">Ir a verlo</a>',//'有新的待审核勋章申请。<a href="admin.php?action=medals&operation=mod">现在进行审核</a>',
	'manage_verifyacommont'		=> 'El nuevo artículo tiene comentarios  nuevos.. <a href="admin.php?action=moderate&operation=articlecomments">Ir a verlo</a>',//'有新的待审核文章评论。<a href="admin.php?action=moderate&operation=articlecomments">现在进行审核</a>',
	'manage_verifytopiccommont'	=> 'Nuevo comentario pendiente. <a href="admin.php?action=moderate&operation=topiccomments">Ir a verlo</a>',//'有新的待审核专题评论。<a href="admin.php?action=moderate&operation=topiccomments">现在进行审核</a>',
	'manage_verify_field'		=> 'Nuevos campos pendientes {verifyname}. <a href="admin.php?action=verify&operation=verify&do={doid}">Ir a verlo</a>',//'有新的待处理{verifyname}。<a href="admin.php?action=verify&operation=verify&do={doid}">现在处理</a>',
	'system_notice'			=> '{subject}<p class="summary">{message}</p>',
	'system_adv_expiration'		=> 'Los siguientes anuncios en su sitio sea expiraron {day} dias. Por favor tratar:<br />{advs}',//'您站点的以下广告将于 {day} 天后到期，请及时处理：<br />{advs}',
	'report_change_credits'		=> '{actor} tiene ocuparse de su informe, el total de los puntos {creditchange}',//'{actor} 处理了你的举报，你的 {creditchange}',
	'new_report'			=> 'nuevo informe pendiente, <a href="admin.php?action=report" target="_blank">Haga clic aquí para entrar en el fondo que se procesa</a>.',//'有新的举报等待处理，<a href="admin.php?action=report" target="_blank">点此进入后台处理</a>。',
	'new_post_report'		=> 'Nuevo informe pendiente,, <a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">Haga clic aquí para acceder al panel de administración</a>.',//'有新的举报等待处理，<a href="forum.php?mod=modcp&action=report&fid={fid}" target="_blank">点此进入管理面版</a>。',
//	'magics_receive' => '您收到 {actor} 送给您的道具 {magicname}
//<p class="summary">{actor} 说：<span>{msg}</span></p>
//<p class="mbn"><a href="home.php?mod=magic" target="_blank">回赠道具</a><span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">查看我的道具箱</a></p>',
	'magics_receive'		=> 'Usted ha recibido la magia {magicname} de {actor}.
					<p class="summary">{actor} dice: <span>{msg}</span></p>
					<p class="mbn"><a href="home.php?mod=magic" target="_blank">Devolver el regalo!</a>
					<span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">Ver mi magia</a></p>',

	'pmreportcontent' => '{pmreportcontent}',

//vot ToDo: From install_data.sql
'welcome_message_title'		=> 'Hello {username}! Thank you for your registration, please read the following ...',
'welcome_message_content'	=> 'Dear {username}, you have already registered as a member at {sitename}, please when you publish, compliance with local laws and regulations.\nIf you have any questions please contact the administrator, Email: {adminemail}.\n\n\n{bbname}\n{time}',
'terms_of_services'		=> 'This is Rules.\nMust read!',

);

