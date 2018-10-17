<?php
/*
 * レビュースタープラグイン
 * レビュー評価の星表記をjavascriptで動的表示します。
 * @author Cyber-Will Inc. 
 *
 * 
*/

class DisqusPlugin extends SC_Plugin_Base {

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
        if (file_exists(PLUGIN_UPLOAD_REALDIR ."DisqusPlugin/logo.png")){
            if(copy(PLUGIN_UPLOAD_REALDIR . "DisqusPlugin/logo.png", PLUGIN_HTML_REALDIR . "DisqusPlugin/logo.png") === false);
        }
        copy(PLUGIN_UPLOAD_REALDIR . "DisqusPlugin/templates/disqus.tpl", TEMPLATE_REALDIR . BLOC_DIR . "disqus.tpl");
        copy(PLUGIN_UPLOAD_REALDIR . "DisqusPlugin/templates/disqus.php", HTML_REALDIR . "frontparts/bloc/disqus.php");

        DisqusPlugin::setData('create');
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
        // ロゴ画像削除
        if (file_exists(PLUGIN_HTML_REALDIR ."DisqusPlugin/logo.png")){
            if(SC_Helper_FileManager_Ex::deleteFile(PLUGIN_HTML_REALDIR . "DisqusPlugin/logo.png") === false);
        }
        DisqusPlugin::setData('delete');
        unlink(TEMPLATE_REALDIR . BLOC_DIR . "disqus.tpl");
        unlink(HTML_REALDIR . "frontparts/bloc/disqus.php");

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
    }

    // 初期インストール用SQLを発行
    function setData($type) {
        $objQuery = SC_Query_Ex::getSingletonInstance();
        $filepath = PLUGIN_UPLOAD_REALDIR . "../tmp/plugin_install/" . DB_TYPE . "_"  . $type . ".sql";
        $arrErr = false;

        if ($type == 'create') {
            $filepath = PLUGIN_UPLOAD_REALDIR . "../tmp/plugin_install/" . DB_TYPE . "_"  . $type . ".sql";
        }else if ($type == 'delete') {
            $filepath = PLUGIN_UPLOAD_REALDIR . "DisqusPlugin/" . DB_TYPE . "_"  . $type . ".sql";
        }

        if (!file_exists($filepath)) {
            echo $filepath. "<br>";
            echo 'SQLファイルがありません。一度プラグインを削除して下さい';
            exit;
        } else {
            if ($fp = fopen($filepath, 'r')) {
                $sql = fread($fp, filesize($filepath));
                fclose($fp);
            }
        }
        $objQuery = SC_Query_Ex::getSingletonInstance();
        
        $sql_split = split(';', $sql);
        foreach ($sql_split as $key => $val) {
            SC_Utils::sfFlush(true);
            if (trim($val) != '') {
                $ret = $objQuery->query($val);
                if (PEAR::isError($ret) && $disp_err) {
                    GC_Utils_Ex::gfPrintLog($ret->userinfo, PLUGIN_LOG_REALFILE);
                    break;
                } else {
                    GC_Utils_Ex::gfPrintLog('OK:' . $val, PLUGIN_LOG_REALFILE);
                }
            }
        }
    }

}
