<?php
/* 
 * プラグインメインクラス
 */

class FacebookLogin extends SC_Plugin_Base {

    /**
     * コンストラクタ
     *
     */
    public function __construct(array $arrSelfInfo) {
        parent::__construct($arrSelfInfo);
    }

    /**
     * インストール
     * installはプラグインのインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin plugin_infoを元にDBに登録されたプラグイン情報(dtb_plugin)
     * @return void
     */
    function install($arrPlugin) {
        if(copy(PLUGIN_UPLOAD_REALDIR . "FacebookLogin/fblogin_btn.png", PLUGIN_HTML_REALDIR . "FacebookLogin/fblogin_btn.png") === false);
        if(copy(PLUGIN_UPLOAD_REALDIR . "FacebookLogin/logo.png", PLUGIN_HTML_REALDIR . "FacebookLogin/logo.png") === false);
    }

    /**
     * アンインストール
     * uninstallはアンインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     * 
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function uninstall($arrPlugin) {
    }
    
    /**
     * 稼働
     * enableはプラグインを有効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function enable($arrPlugin) {
        // nop
    }

    /**
     * 停止
     * disableはプラグインを無効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function disable($arrPlugin) {
        // nop
    }
    
    /**
     * プレフィルタコールバック関数
     *
     * @param string &$source テンプレートのHTMLソース
     * @param LC_Page_Ex $objPage ページオブジェクト
     * @param string $filename テンプレートのファイル名
     * @return void
     */
    function outputfilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . 'FacebookLogin/templates/';
        switch($objPage->arrPageLayout['device_type_id']){
            case DEVICE_TYPE_PC:
                if (strpos($filename, 'shopping/index.tpl') !== false) {
                    $objTransform->select('h2')->insertAfter(file_get_contents($template_dir . 'facebook_login.tpl'));
                }
                break;
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_ADMIN:
            default:
                break;
        }
        $source = $objTransform->getHTML();
    }
    
    /**
     * プレフィルタコールバック関数
     *
     * @param string &$source テンプレートのHTMLソース
     * @param LC_Page_Ex $objPage ページオブジェクト
     * @param string $filename テンプレートのファイル名
     * @return void
     */
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . 'FacebookLogin/templates/';
        switch($objPage->arrPageLayout['device_type_id']){
            case DEVICE_TYPE_PC:
                if (strpos($filename, 'entry/index.tpl') !== false) {
                    $objTransform->select('#form1')->insertBefore(file_get_contents($template_dir . 'facebook_login.tpl'));
                }
                break;
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_ADMIN:
            default:
                break;
        }
        $source = $objTransform->getHTML();
    }

    /**
     * 処理の介入箇所とコールバック関数を設定
     * registerはプラグインインスタンス生成時に実行されます
     * 
     * @param SC_Helper_Plugin $objHelperPlugin 
     * @return void
     */
    function register(SC_Helper_Plugin $objHelperPlugin) {
        // テンプレート差し込み
//        $objHelperPlugin->addAction('outputfilterTransform', array(&$this, 'outputfilterTransform'),1);
        $objHelperPlugin->addAction('prefilterTransform', array(&$this, 'prefilterTransform'),1);
        $objHelperPlugin->addAction('LC_Page_Entry_action_before', array($this, 'LC_Page_Entry_action_before'));
    }


    /**
     * @param type $objPage 
     */
    function LC_Page_Entry_action_before($objPage) {
        if ( "login_by_facebook" == $objPage->getMode() ){
            $plugin = SC_Plugin_Util_Ex::getPluginByPluginCode("FacebookLogin");
?>
<html>
<body onload="document.frm.submit()">
<form name="frm" method="post" action="https://fbdaisuki.com/eccube_login/">
<input type="hidden" name="transactionid" value="<?php echo $objPage->transactionid; ?>" />
<input type="hidden" name="prefix" value="<?php echo $plugin['free_field1']; ?>" />
<input type="hidden" name="return_url" value="<?php echo ENTRY_URL ; ?>" />
</form>
</body>
</html>
<?php
            exit;
        }
    }

}

?>
