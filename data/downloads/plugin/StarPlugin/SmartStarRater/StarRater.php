<?php

class StarRater
{
	const dir = 'data';
	const limit = 1000;
	const running = '1,3,4,5';

	function param($k)
	{
		return isset($_GET[$k]) && is_string($_GET[$k]) ? $_GET[$k] : '';
	}
	function get($id, $length = 5)
	{
		$path = sprintf('%s/%s/%d.php', dirname(__FILE__), self::dir, $id);
		if (is_file($path)) {
			include $path;
		} else {
			$data = array();
		}
		$users = count($data);
		$total = array_sum($data);
		$rates = $total / max($users, 1);
		$stars = sprintf('%.1f', $rates / (100 / $length));
		$rates = floor($rates);
		$ip = $_SERVER['REMOTE_ADDR'];
		$ip = (string)base_convert(ip2long($ip), 10, 36);
		$again = (int)isset($data[$ip]);
		$limited = (int)($users >= self::limit);
		$disabled = $again | $limited;
		return get_defined_vars();
	}
	function err($msg)
	{
		print $msg;
		exit;
	}
	function rec()
	{
		$id = self::param('id');
		$rates = (int)self::param('rates');
		$time = (int)self::param('time');
		$now = $_SERVER['REQUEST_TIME'];

		if (!preg_match('/^[1-9]\d*$/D', $id) || strpos(self::running, $id) === false || $rates < 1 || $rates > 100 || $time < $now - 7200 || $time > $now + 300) {
			self::err('Request parameter is incorrect.');
		}

		extract(self::get($id));

		if ($limited) {
			self::err('The rating has been already closed.');
		}

		if ($again) {
			self::err('You have recently rated.');
		}

		self::save($data);
		extract(self::get($id));
		printf("{rates: $rates, users: $users}");
	}
	function save($data)
	{
		$id = self::param('id');
		$rates = (int)self::param('rates');
		$ip = $_SERVER['REMOTE_ADDR'];
		$ip = (string)base_convert(ip2long($ip), 10, 36);

		$data[$ip] = $rates;
		$log = var_export($data, true);
		$log = preg_replace('/[\s]/', '', $log);
		$log = sprintf('<?php $data=%s;', $log);

		$path = sprintf('%s/%s/%d.php', dirname(__FILE__), self::dir, $id);
		$fp = fopen($path, 'a+b');
		flock($fp, LOCK_EX);
		ftruncate($fp, 0);
		fwrite($fp, $log);
		fclose($fp);
	}
}

