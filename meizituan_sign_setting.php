<?php
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 

$s = unserialize(option::get('plugin_meizituan_sign'));

global $m,$i,$s;
    //$users = $i['user']['bduss']; // key:uid value:bduss
    //var_dump($users);
?>
<h3>妹子团签到 - 管理</h3><br/>
<form action="setting.php?mod=plugin:meizituan_sign" method="post">
作者：昌维
<hr>
本插件无需任何设置,安装并且激活插件之后，将会开始每天自动签到妹子团.

<hr>



</form>