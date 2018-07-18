<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } global $m,$i,$s; ?>

<h2>妹子团签到记录</h2>

<?php
$users = $i['user']['bduss'];
$uids = array_keys($users);
$uids_str = implode(',', $uids);

// $rs = $m->query("SELECT * FROM `".DB_PREFIX."meizituan_sign` WHERE `uid` IN ('{$uids_str}') ORDER BY `id` DESC");
// while($ret = $m->fetch_array($rs)) {
//     echo "{$ret['uid']} - {$ret['signdate']} - {$ret['raw_result']}<br>";
// }
?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th style="width:30%">UID</th>
			<th style="width:30%">百度ID</th>
			<th style="width:20%">签到时间</th>
			<th style="width:30%">签到结果</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$rs = $m->query("SELECT * FROM `".DB_PREFIX."meizituan_sign` WHERE `uid` IN ({$uids_str}) ORDER BY `id` DESC");
        while($ret = $m->fetch_array($rs)) {
		?>
		<tr>
			<td><?php echo $ret['id'] ?></td>
			<td><?php echo $ret['uid'] ?></td>
			<td><?php echo $ret['un'] ?></td>
			<td><?php echo $ret['signdate'] ?></td>
			<td><?php echo $ret['raw_result'] ?></td>
			<td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<hr>妹子团签到<br/>
<br/><br/>作者：<a href="http://changwei.me" target="_blank">昌维</a>

</script>
