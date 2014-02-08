<?php
$readme=<<<EOF
<br>
<table border=0 cellspacing=1 cellpadding=5 width=72%>
<tr height=27>
<td align="center" class=p11t bgcolor="eeeecc"><b>新手报到(Newuser) For X2.0/X2.5/X3.0使用说明</b></td>
</tr>
</table><br>
<table border="0" cellpadding="2" cellspacing="2" width="72%">
<tr><td><span class="p11blk"><ol>
<li>本插件由土着人宁巴开发,<a href="http://www.ailab.cn/" target="_blank">人工智能实验室</a>技术团队 出品（Made By Nimba, Team From ailab.cn ）请尊重开发者版权<br><br>
<li>开发者主页<a href="http://addon.discuz.com/?@1552.developer" target="_blank">http://addon.discuz.com/?@1552.developer</a><br><br>
<li>本插件设计的初衷是强制新用户在指定版块发布报到贴，以降低机器注册灌水的概率<br><br>
<li>本插件会强制跳转，或与某些跳转类功能相冲突，例如防灌水中的强制上传头像、某签到插件等，建议各位站长根据自身情况合理使用<br><br>
<li>跳转窗口提示信息可以在后台自行定义，支持HTML代码，如果对html不了解的朋友切记不可随意修改，否则后果自负<br><br>
<li>本插件使用了global_header嵌入点，部分深度开发的模板中丢失了global_header嵌入点造成无法正常使用，请在使用时确保您的模板嵌入点正常<br><br>
<li>由于各种难以预料的原因，插件在设计和使用上难免会有些细节问题，敬请见谅，如需获取插件最新动态请加QQ：594941227、281688302！免费版插件使用问题提交：<a href="http://dz.open.ailab.cn/club-57-1.html" target="_blank">http://dz.open.ailab.cn/club-57-1.html</a><br><br>
<li>v2.7.1版本及以下将提供终身免费使用，如需更多功能，请联系插件作者定制开发！<br><br>
</ol></span></td></tr></table>
<DIV>人工智能实验室开发小组作品精选 作者 土着人宁巴 人工智能实验室 出品（Made By Nimba, Team From ailab.cn ）<BR></DIV>
<DIV><BR></DIV>
<DIV><BR></DIV>
<DIV>【团队招募】：人工智能实验室开发团队正处在一个快速发展的时期，先需要扩充团队力量，吸收新鲜血液，我们诚招具有以下技能之一的朋友加入我们的团队：1、熟悉PHP程序开发和discuz框架结构，2、精通算法设计或具有扎实的数学基础，3、精通mysql数据库，4、熟悉Linux服务器的搭建和配置，5、具有扎实的美工功底，精通html、DIV+CSS、js！人工智能实验室欢迎心怀梦想的朋友加入我们的团队！</DIV>
<DIV><BR></DIV>
<DIV>【技术服务】人工智能实验室(AiLab Inc.)技术团队承接以下各种论坛外包技术业务：1、插件定制开发，2、程序问题修复，3、论坛搬家，4、数据库修复，5、GBK和UTF-8版本互转，6、论坛升级，7、其他论坛转discuz，8、其他程序与UCenter整合，9、其他个性化需求！ </DIV>
<DIV><BR></DIV>
<DIV>【联系我们】QQ：594941227(土着人宁巴)、QQ：281688302（仙剑小虾）！ </DIV>
<DIV><BR></DIV>
EOF;
if(strtolower(CHARSET) == 'utf-8') $readme=iconv('GB2312', 'UTF-8',$readme);//utf-8
echo $readme;
?>
