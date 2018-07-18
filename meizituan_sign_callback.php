<?php
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }

function callback_init() {
	global $m;
	$m->query("CREATE TABLE IF NOT EXISTS `".DB_PREFIX."meizituan_sign` (
		`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		`uid` int(10) unsigned NOT NULL,
		`un` varchar(255) NOT NULL,
		`signdate` date NOT NULL,
		`raw_result` varchar(255) NOT NULL,
		`error` tinyint(3) unsigned NOT NULL,
		PRIMARY KEY (`id`)
	  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

	cron::set('meizituan_sign','plugins/meizituan_sign/meizituan_sign_cron.php',0,0,0);
}

function callback_inactive() {
	cron::del('meizituan_sign');
}

function callback_remove() {
	global $m;
	$m->query("DROP TABLE IF EXISTS `".DB_PREFIX."meizituan_sign`");
}
