<!--ここから<!--{$smarty.template}-->-->
<style type="text/css">
div.btn_area a:hover img
{
    opacity:0.8;
    filter: alpha(opacity=80);
    -ms-filter: "alpha( opacity=80 )";
}
</style>
        <form name="facebook_login_form" id="facebook_login_form" method="post" action="?">
        <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
        <input type="hidden" name="mode" value="login_by_facebook" />
        <div class="login_area">
            <h3>Facebookのアカウントをお持ちの方</h3>
            <p class="inputtext">Facebookのアカウントから自動入力できます。</p>
            <div class="inputbox">
                <div class="btn_area">
                    <ul>
                        <li>
                            <a href="javascript:void(0);" onClick="return document.facebook_login_form.submit();"><img src="<!--{$smarty.const.PLUGIN_HTML_URLPATH}-->FacebookLogin/fblogin_btn.png" alt="Facebookでログイン" name="fb_login_button" id="fb_login_button" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </form>
<!--ここまで<!--{$smarty.template}-->-->
