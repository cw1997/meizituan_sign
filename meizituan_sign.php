<?php
/*
Plugin Name: 妹子团签到
Version: 1.0.0
Plugin URL: https://github.com/cw1997/meizituan_sign
Description: 妹子团每天自动签到
Author: 昌维
Author Email: 867597730@qq.com
Author URL: http://changwei.me
For: V3.1+
*/
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }

function meizituan_sign_addaction_navi() {
	?>
	<li <?php if(isset($_GET['plugin']) && $_GET['plugin'] == 'meizituan_sign') { echo 'class="active"'; } ?>><a href="index.php?plugin=meizituan_sign"><span class="glyphicon glyphicon-heart-empty"></span> 妹子团签到记录</a></li>
	<?php
}

function meizituan_sign_setting_navi() {
	?>
	<li><a href="index.php?mod=admin:setplug&plug=meizituan_sign"><span class="glyphicon glyphicon-heart-empty"></span> 妹子团签到记录</a></li>
	<?php
}

addAction('navi_1','meizituan_sign_addaction_navi');
addAction('navi_7','meizituan_sign_addaction_navi');
addAction('navi_3','meizituan_sign_setting_navi');
