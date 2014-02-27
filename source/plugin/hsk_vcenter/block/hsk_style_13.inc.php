<?php

$_XMLS = array(
	'header'	=> '
<STYLE>
.collgrid6t_{CSSID}{overflow:hidden;margin:0 auto;}
.collgrid6t_{CSSID} .items{overflow:hidden;margin-bottom:-10px;}
.collgrid6t_{CSSID} .v,.collgrid6t_{CSSID} .p_{CSSID}{float:left;margin-left:5px;margin-right:5px;}
.collgrid6t_{CSSID} .v,.collgrid6t_{CSSID} .last{margin-right:0px;}
.p_{CSSID}{z-index:0;position:relative;width:{XWIDTH}px;margin-bottom:10px;}
.p_{CSSID} li label,.p_{CSSID} li .label{margin-right:2px;white-space:nowrap;}
.p_{CSSID} .p_title {padding-top:5px;}
.p_{CSSID} .p_thumb {display:block;position:relative;overflow:hidden; {PWIDTH}px; height:{PHEIGHT}px; padding:3px;background:#fff;border:1px solid #ddd;}
.p_{CSSID} .p_thumb .clipImg{margin:0;width:{PWIDTH}px; height:{PHEIGHT}px}
.p_{CSSID} .p_thumb .vpbg{margin: 0px 3px 3px 3px; width:{PWIDTH}px; height:21px;background:#000;opacity:.6;filter:alpha(opacity = 60);position:absolute;left:0;bottom:0}
.p_{CSSID} .p_thumb .vinf{width:{YWIDTH}px;height:20px;padding:0 3px 3px 8px;line-height:21px;overflow:hidden;position:absolute;bottom:0;left:0;margin:0;color:#fff;text-decoration:none}
</STYLE>

<div class="collgrid6t_{CSSID}"><div class="items">',
	'footer'	=> '</div></div>',
	'loop'		=> '<ul class="p_{CSSID}"><li class="p_thumb"><a title="{SUBJECT}" href="{LINK}"><img class="clipImg" alt="{SUBJECT}" src="{PICTURE}"></a><span class="vpbg"></span><span class="vinf"><div class="z"><a href="{ABTOTAL}" traget="_blank" style="color:#fff">{VSUM}</a></div></span></li><li class="p_title"><a title="{SUBJECT}" href="{LINK}" class="xs2" traget="_blank">{SUBJECTC}</a></li></ul>',
);