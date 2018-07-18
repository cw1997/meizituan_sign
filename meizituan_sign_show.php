<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }  
global $i,$m;

$s = unserialize(option::get('plugin_meizituan_sign'));

	loadhead();
	require SYSTEM_ROOT.'/plugins/meizituan_sign/show.php';
	loadfoot(); 
