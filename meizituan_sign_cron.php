<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }

function cron_meizituan_sign() {
	global $m,$i,$s;
	// $users = $i['user']['bduss']; // key:uid value:bduss
	$datetime = date('Y-m-d', time());
	// 此处有重签两次的bug by 昌维 2018-07-18 17:38:42
	// $users_rs = $m->query("SELECT `id`,`bduss`,`name` FROM `".DB_PREFIX."baiduid` WHERE `id` NOT IN (SELECT `uid` FROM `".DB_PREFIX."meizituan_sign` WHERE `signdate`='{$datetime}' AND `error`=0) LIMIT 20");
	$users_rs = $m->query("SELECT `id`,`bduss`,`name` FROM `".DB_PREFIX."baiduid` AS `b` WHERE `b`.`id` NOT IN (SELECT `m`.`uid` FROM `".DB_PREFIX."meizituan_sign` AS `m` WHERE `signdate`='{$datetime} AND `error`=0') ORDER BY RAND() LIMIT 20");
	// $users_rs = $m->query("SELECT `id`,`bduss`,`name` FROM `".DB_PREFIX."baiduid` ORDER BY RAND() LIMIT 20");
	while ($users = $m->fetch_array($users_rs) ) {
		$bduss = $users['bduss'];
		$uid = $users['id'];
		$un = $users['name'];

		// 如果已经有记录 并且超过两条就直接跳过
		// （重签两次，两次都出错那就不再签到）
		$rs = $m->query("SELECT count(`uid`) AS c FROM `".DB_PREFIX."meizituan_sign` WHERE `uid`='{$uid}' AND `signdate`='{$datetime}'");
		$signed = $m->fetch_array($rs);

		if ($signed['c'] == 0) {
			$tbs = misc::getTbs($uid , $bduss);
			$c = new wcurl('http://tieba.baidu.com/mo/q/meizhi/signIn?tbs='.$tbs);
			$c->addcookie('BDUSS='.$bduss);
			$res = $c->get($option);
			$res = json_decode($res,TRUE);

			$error = $res['error'];
			$no = $res['no'];
			$m->query("INSERT INTO `".DB_PREFIX."meizituan_sign` (`uid`, `un`, `signdate`, `raw_result`, `error`) VALUES ('{$uid}', '{$un}', '{$datetime}', '{$error}', '{$no}')");
		}

	}
}
