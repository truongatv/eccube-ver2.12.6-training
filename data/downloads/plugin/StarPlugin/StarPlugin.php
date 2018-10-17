<?php
/*
 * レビュースタープラグイン
 * レビュー評価の星表記をjavascriptで動的表示します。
 * Copyright (C) 2012 tokuhiro
 * 
 *
 * 
*/

class StarPlugin extends SC_Plugin_Base {

    /**
     * コンストラクタ
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
        // プラグインのロゴ画像をアップ
        if (file_exists(PLUGIN_UPLOAD_REALDIR ."StarPlugin/logo.png")){
            if(copy(PLUGIN_UPLOAD_REALDIR . "StarPlugin/logo.png", PLUGIN_HTML_REALDIR . "StarPlugin/logo.png") === false);
        }
        //SmartStarRaterを/user_data以下に移動させる処理
        SC_Utils_Ex::sfCopyDir(PLUGIN_UPLOAD_REALDIR . 'StarPlugin/SmartStarRater/', USER_REALDIR . 'SmartStarRater/');
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
        unlink(USER_REALDIR . 'SmartStarRater');
        // ロゴ画像削除
        if (file_exists(PLUGIN_HTML_REALDIR ."StarPlugin/logo.png")){
            if(SC_Helper_FileManager_Ex::deleteFile(PLUGIN_HTML_REALDIR . "StarPlugin/logo.png") === false);
        }
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
     * 処理の介入箇所とコールバック関数を設定
     * registerはプラグインインスタンス生成時に実行されます
     *
     * @param SC_Helper_Plugin $objHelperPlugin
     */
    function register(SC_Helper_Plugin $objHelperPlugin) {
        $objHelperPlugin->addAction('prefilterTransform', array(&$this, 'prefilterTransform'), 1);
    }

    // プラグイン独自の設定データを追加
    function insertFreeField() {

    }

    function insertBloc($arrPlugin) {

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
        $template_dir = PLUGIN_UPLOAD_REALDIR . 'StarPlugin/';
        
        switch($objPage->arrPageLayout["HeaderInternalNavi"][0]['device_type_id']){
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                //レビュー画面のテンプレートをフック
                if (strpos($filename, 'products/review.tpl') !== false) {
                    $objTransform->select('html body div#window_area form table tr td select',0)->replaceElement(file_get_contents($template_dir . 'snip_product_review.tpl'));
                }
                //レビュー画面のテンプレートをフック
                if (strpos($filename, 'products/review_confirm.tpl') !== false) {
                    $objTransform->select('html body div#window_area form table tr td',4)->replaceElement(file_get_contents($template_dir . 'snip_product_review_confirm.tpl'));
                }

                break;
            case DEVICE_TYPE_ADMIN:
            default:
                break;
        }
        //トランスフォームされた値で書き換え
        $source = $objTransform->getHTML();
    }




}
