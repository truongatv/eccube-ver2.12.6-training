<link rel="stylesheet" type="text/css" href="/user_data/SmartStarRater/star.css" />
<script type="text/javascript" src="/user_data/SmartStarRater/star.js" charset="utf-8"></script>
<div><input type="hidden" name="recommend_level" id="rates" value="<!--{if $arrForm.recommend_level != 0}--><!--{$arrForm.recommend_level}--><!--{else}-->3<!--{/if}-->" /></div>
<div class="star">
<div class="star-rect lfloat" onmousemove="star.start(event, this, 6, {step: 1, form: 'rates'});"><ul><li>&nbsp;</li><li style="width: <!--{if $arrForm.recommend_level != 0}--><!--{$arrForm.recommend_level*20}--><!--{else}-->60<!--{/if}-->%;">&nbsp;</li></ul></div>
<div class="kfloat"></div>
</div>
<span class="attention">※上部の星にマウスカーソルを合わせると星の数を変更できます。</span>
