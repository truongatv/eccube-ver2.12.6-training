<<?='?'?>xml version="1.0" encoding="utf-8"<?='?'?>>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-style-type" content="text/css" />
	<meta http-equiv="content-script-type" content="text/javascript" />
	<title>AJAX Smart Star Rater</title>
	<link rel="stylesheet" type="text/css" href="star.css" />
	<script type="text/javascript" src="star.js" charset="utf-8"></script>
	<style type="text/css">
		body { font-family: "メイリオ", Meiryo, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", Osaka, Verdana, sans-serif; }
		h1 { font-size: 28px; }
		h2 { font-size: 16px; }
		body > div { margin: 24px 0; }
	</style>
</head>

<body>

<h1>AJAX Smart Star Rater</h1>

<?php require_once './StarRater.php'; ?>

<div>
	<h2>基本形</h2>
	<div class="star">
		<?php extract(StarRater::get(1, 5), EXTR_PREFIX_ALL, 'star'); ?>
		<div class="star-rect" onmousemove="star.start(event, this, <?=$star_id?>, {disabled: <?=$star_disabled?>});"><ul><li>&nbsp;</li><li style="width: <?=$star_rates?>%;">&nbsp;</li></ul></div>
		<div class="star-text">
			<span class="star-text-rates"><span id="starRates<?=$star_id?>"><?=$star_rates?></span>%</span>
			<span class="star-text-stars"><span id="starStars<?=$star_id?>"><?=$star_stars?></span>/<?=$star_length?></span>
			<span class="star-text-users"><span id="starUsers<?=$star_id?>"><?=$star_users?></span>users</span>
			<span class="star-text-alert"><span id="starAlert<?=$star_id?>"></span></span>
		</div>
	</div>
</div>

<div>
	<h2>10星ステップ1</h2>
	<div class="star">
		<?php extract(StarRater::get(3, 10), EXTR_PREFIX_ALL, 'star'); ?>
		<div class="star-rect" onmousemove="star.start(event, this, <?=$star_id?>, {disabled: <?=$star_disabled?>, length: <?=$star_length?>, step: 1});" style="width: 210px;"><ul style="width: 200px;"><li>&nbsp;</li><li style="width: <?=$star_rates?>%;">&nbsp;</li></ul></div>
		<div class="star-text">
			<span class="star-text-rates"><span id="starRates<?=$star_id?>"><?=$star_rates?></span>%</span>
			<span class="star-text-stars"><span id="starStars<?=$star_id?>"><?=$star_stars?></span>/<?=$star_length?></span>
			<span class="star-text-users"><span id="starUsers<?=$star_id?>"><?=$star_users?></span>users</span>
			<span class="star-text-alert"><span id="starAlert<?=$star_id?>"></span></span>
		</div>
	</div>
</div>

<div>
	<h2>30星ステップ1.5</h2>
	<div class="star">
		<?php extract(StarRater::get(4, 30), EXTR_PREFIX_ALL, 'star'); ?>
		<div class="star-rect" onmousemove="star.start(event, this, <?=$star_id?>, {disabled: <?=$star_disabled?>, length: <?=$star_length?>, step: 1.5});" style="width: 610px;"><ul style="width: 600px;"><li>&nbsp;</li><li style="width: <?=$star_rates?>%;">&nbsp;</li></ul></div>
		<div class="star-text">
			<span class="star-text-rates"><span id="starRates<?=$star_id?>"><?=$star_rates?></span>%</span>
			<span class="star-text-stars"><span id="starStars<?=$star_id?>"><?=$star_stars?></span>/<?=$star_length?></span>
			<span class="star-text-users"><span id="starUsers<?=$star_id?>"><?=$star_users?></span>users</span>
			<span class="star-text-alert"><span id="starAlert<?=$star_id?>"></span></span>
		</div>
	</div>
</div>

<div>
	<address>Copyright (C) <a href="http://www.mt312.com/">MT312</a> All Rights Reserved.</address>
</div>

</body>
</html>
