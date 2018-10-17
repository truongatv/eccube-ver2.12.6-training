<?php
/*
 * NakwebAdminFileUpload
 * Copyright (C) 2012 NAKWEB CO.,LTD. All Rights Reserved.
 * http://www.nakweb.com/
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

/**
 * プラグインのメインクラス
 *
 * @package NakwebAdminFileUpload
 * @author NAKWEB CO.,LTD.
 * @version $Id: $
 */
class NakwebAdminFileUpload extends SC_Plugin_Base {

    // プラグイン用識別子
    private static $nakweb_plgin_individual = 'plg_nakweb_00002';

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

        // 必要なファイルをコピーします.
        // ロゴ画像
        copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/logo.png", PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/logo.png");

        // // 管理画面用ファイル
        // copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/config.php", PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/config.php");
        // // CSS, Image
        // mkdir(PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/css");
        // SC_Utils_Ex::sfCopyDir(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/css/", PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/css/");
        // mkdir(PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/img");
        // SC_Utils_Ex::sfCopyDir(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/img/", PLUGIN_HTML_REALDIR . $arrPlugin['plugin_code'] . "/img/");

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
        // nop
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
     * @param $objHelperPlugin
     * @param $priority
     */
    function register($objHelperPlugin, $priority) {
        parent::register($objHelperPlugin, $priority);
        //// 管理画面用 ファイルアップロード機能の追加
        $objHelperPlugin->addAction('prefilterTransform', array(&$this, 'prefilterTransform'), $this->arrSelfInfo['priority']);
    }

    // // スーパーフックポイント（preProcess）
    // function preProcess() {
    //     // nop
    // }

    // // スーパーフックポイント（prosess）
    // function prosess() {
    //     // nop
    // }




    //==========================================================================
    // Original Function
    //==========================================================================

    // テンプレートのフック（CSV出力用のボタン表示）
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $arrEcVersion = explode('.',ECCUBE_VERSION,3); 
        if($arrEcVersion[1]=='13'){
         $objTransform = new SC_Helper_Transform($source);
         $template_dir = PLUGIN_UPLOAD_REALDIR . $this->arrSelfInfo['plugin_code'] . '/templates/';
         switch($objPage->arrPageLayout['device_type_id']){
             case DEVICE_TYPE_MOBILE:
             case DEVICE_TYPE_SMARTPHONE:
             case DEVICE_TYPE_PC:
                 break;
             case DEVICE_TYPE_ADMIN:
             default:
                 if       (strpos($filename, 'design/main_edit.tpl') !== false) {
                     $objTransform->select('form#form_edit')->insertAfter(file_get_contents($template_dir . 'plg_NakwebAdminFileUpload_file_manager_2-13.tpl'));
                 } elseif (strpos($filename, 'design/bloc.tpl')      !== false) {
                     $objTransform->select('form#form_bloc')->insertAfter(file_get_contents($template_dir . 'plg_NakwebAdminFileUpload_file_manager_2-13.tpl'));
                 } elseif (strpos($filename, 'design/header.tpl')    !== false) {
                     $objTransform->select('div#design')->insertAfter(file_get_contents($template_dir . 'plg_NakwebAdminFileUpload_file_manager_2-13.tpl'));
                 } elseif (strpos($filename, 'design/css.tpl')       !== false) {
                     $objTransform->select('form')->insertAfter(file_get_contents($template_dir . 'plg_NakwebAdminFileUpload_file_manager_2-13.tpl'));
                 }
                 break;
         }
         $source = $objTransform->getHTML();
        } else {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . $this->arrSelfInfo['plugin_code'] . '/templates/';
        switch($objPage->arrPageLayout['device_type_id']){
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                break;
            case DEVICE_TYPE_ADMIN:
            default:
                if       (strpos($filename, 'design/main_edit.tpl') !== false) {
                    $objTransform->select('form#form_edit')->insertAfter(file_get_contents($template_dir . 'plg_NakwebAdminFileUpload_file_manager.tpl'));
                } elseif (strpos($filename, 'design/bloc.tpl')      !== false) {
                    $objTransform->select('form#form_bloc')->insertAfter(file_get_contents($template_dir . 'plg_NakwebAdminFileUpload_file_manager.tpl'));
                } elseif (strpos($filename, 'design/header.tpl')    !== false) {
                    $objTransform->select('div#design')->insertAfter(file_get_contents($template_dir . 'plg_NakwebAdminFileUpload_file_manager.tpl'));
                } elseif (strpos($filename, 'design/css.tpl')       !== false) {
                    $objTransform->select('form')->insertAfter(file_get_contents($template_dir . 'plg_NakwebAdminFileUpload_file_manager.tpl'));
                }
                break;
        }
        }
        $source = $objTransform->getHTML();
    }



    // ファイルアップロード用のデータを取得
    function plg_file_upload_set($objPage) {

        $arrEcVersion = explode('.',ECCUBE_VERSION,3);

        // プラグイン用識別子
        $plg_head = NakwebAdminFileUpload::$nakweb_plgin_individual;

        // フォーム操作クラス
        $objFormParam = new SC_FormParam_Ex();
        // パラメーター情報の初期化
        $this->lfInitParam($objFormParam);
        $objFormParam->setParam($this->createSetParam($_POST));
        $objFormParam->convParam();

        // ファイル管理クラス
        $objUpFile = new SC_UploadFile_Ex($objFormParam->getValue('now_dir'), $objFormParam->getValue('now_dir'));
        // ファイル情報の初期化
        $this->lfInitFile($objUpFile);

        // ファイル操作クラス
        $objFileManager = new SC_Helper_FileManager_Ex();


        // 処理別動作
        $arrErrTmp = array();
        switch ($this->getMode()) {
            // フォルダ移動
            case $plg_head . '_move':
                $objFormParam = new SC_FormParam_Ex();
                $this->lfInitParamModeMove($objFormParam);
                $objFormParam->setParam($this->createSetParam($_POST));
                $objFormParam->convParam();

                $arrErrTmp = $objFormParam->checkError();
                if (SC_Utils_Ex::isBlank($arrErrTmp)) {
                    $now_dir = $this->lfCheckSelectDir($objFormParam, $objFormParam->getValue('tree_select_file'));
                    $objFormParam->setValue('now_dir', $now_dir);
                }
                break;

            // ファイル表示
            case $plg_head . '_view':
                $objFormParam = new SC_FormParam_Ex();
                $this->lfInitParamModeView($objFormParam);
                $objFormParam->setParam($this->createSetParam($_POST));
                $objFormParam->convParam();

                $arrErrTmp = $objFormParam->checkError();
                if (SC_Utils_Ex::isBlank($arrErrTmp)) {
                    if ($this->tryView($objFormParam)) {
                        $pattern = '/' . preg_quote($objFormParam->getValue('top_dir'), '/') . '/';
                        $file_url = htmlspecialchars(preg_replace($pattern, '', $objFormParam->getValue('select_file')));
                       if($arrEcVersion[1]=='13'){
                           $tpl_onload = "eccube.openWindow('../contents/file_view.php?file=". $file_url ."', 'user_data', '600', '400');";
                       } else {
                           $tpl_onload = "win02('../contents/file_view.php?file=". $file_url ."', 'user_data', '600', '400');";
                       }
                       $this->setDispParam($objPage, $plg_head . '_tpl_onload', $tpl_onload, true);
                    }
                }
                break;

            // ファイルダウンロード
            case $plg_head . '_download':
                $objFormParam = new SC_FormParam_Ex();
                $this->lfInitParamModeView($objFormParam);
                $objFormParam->setParam($this->createSetParam($_POST));
                $objFormParam->convParam();

                $arrErrTmp = $objFormParam->checkError();
                if (SC_Utils_Ex::isBlank($arrErrTmp)) {
                    if (is_dir($objFormParam->getValue('select_file'))) {
                        $disp_error = '※ ディレクトリをダウンロードすることは出来ません。<br/>';
                        $this->setDispError($objPage, 'select_file', $disp_error);
                    } else {
                        if($arrEcVersion[1]=='13'){
                            $path_exists = SC_Utils::checkFileExistsWithInBasePath($objFormParam->getValue('select_file'),USER_REALDIR);
                            if ($path_exists) {
                                // ファイルダウンロード
                                $objFileManager->sfDownloadFile($objFormParam->getValue('select_file'));
                                SC_Response_Ex::actionExit();
                            }
                        } else {
                            // ファイルダウンロード
                            $objFileManager->sfDownloadFile($objFormParam->getValue('select_file'));
                            SC_Response_Ex::actionExit();
                        }
                    }
                }
                break;

            // ファイル削除
            case $plg_head . '_delete':
                $objFormParam = new SC_FormParam_Ex();
                $this->lfInitParamModeView($objFormParam);
                $objFormParam->setParam($this->createSetParam($_POST));
                $objFormParam->convParam();

                $this->arrErr = $objFormParam->checkError();
                if($arrEcVersion[1]=='13' && $arrEcVersion[2]!='0'){
                    $path_exists = SC_Utils::checkFileExistsWithInBasePath($objFormParam->getValue('select_file'),USER_REALDIR);
                    if (SC_Utils_Ex::isBlank($this->arrErr) && ($path_exists)){
                        $objFileManager->deleteFile($objFormParam->getValue('select_file'));
                    }
                } else {
                    if (SC_Utils_Ex::isBlank($this->arrErr)) {
                        $objFileManager->deleteFile($objFormParam->getValue('select_file'));
                    }
                }
                break;

            // フォルダ作成
            case $plg_head . '_create':
                $objFormParam = new SC_FormParam_Ex();
                $this->lfInitParamModeCreate($objFormParam);
                $objFormParam->setParam($this->createSetParam($_POST));
                $objFormParam->convParam();

                $this->arrErr = $objFormParam->checkError();
                    if (SC_Utils_Ex::isBlank($this->arrErr)) {
                        if (!$this->tryCreateDir($objFileManager, $objFormParam)) {
                            $disp_error = '※ '.htmlspecialchars($objFormParam->getValue('create_file'), ENT_QUOTES).'の作成に失敗しました。<br/>';
                            $this->setDispError($objPage, 'create_file', $disp_error);
                        } else {
                            $tpl_onload = "alert('フォルダを作成しました。');";
                            $this->setDispParam($objPage, $plg_head . '_tpl_onload', $tpl_onload, true);
                        }
                    }
                break;

            // ファイルアップロード
            case $plg_head . '_upload':
                // 画像保存処理
                $ret = $objUpFile->makeTempFile('upload_file', false);
                if (SC_Utils_Ex::isBlank($ret)) {
                    $tpl_onload = "alert('ファイルをアップロードしました。');";
                    $this->setDispParam($objPage, $plg_head . '_tpl_onload', $tpl_onload, true);
                } else {
                    $this->setDispError($objPage, 'upload_file', $ret);
                }
                break;

            // 初期表示
            default:
                break;
        }

        // エラーの有無を確認
        if (!(SC_Utils_Ex::isBlank($arrErrTmp))) {
            $this->setDispParam($objPage, $plg_head . '_arrErr', $arrErrTmp);
        }
        $this->setDispPath($objFormParam, $objPage);

        // 値をテンプレートに渡す
        $this->setDispParam($objPage, $plg_head . '_arrParam', $objFormParam->getHashArray());
        // 現在の階層がルートディレクトリかどうかテンプレートに渡す
        $this->setDispParam($objPage, $plg_head . '_tpl_is_top_dir', $this->setIsTopDir($objFormParam));
        // 現在の階層より一つ上の階層をテンプレートに渡す
        $this->setDispParam($objPage, $plg_head . '_tpl_parent_dir', $this->lfGetParentDir($objFormParam->getValue('now_dir')));
        // 現在いる階層(表示用)をテンプレートに渡す
        $this->setDispPath($objFormParam, $objPage);
        // 現在のディレクトリ配下のファイル一覧を取得
        $this->setDispParam($objPage, $plg_head . '_arrFileList', $objFileManager->sfGetFileList($objFormParam->getValue('now_dir')));
        // 現在の階層のディレクトリをテンプレートに渡す
        $this->setDispParam($objPage, $plg_head . '_tpl_now_file', $objFormParam->getValue('now_dir'));
        // ディレクトリツリー表示
        $this->setDispTree($objFileManager, $objFormParam, $objPage);
    }


    /**
     * リクエストパラメーター 'mode' を取得する.
     *
     * 1. $_GET['mode'] の値を取得する.
     * 2. 1 が存在しない場合は $_POST['mode'] の値を取得する.
     * 3. どちらも存在しない場合は null を返す.
     *
     * mode に, 半角英数字とアンダーバー(_) 以外の文字列が検出された場合は null を
     * 返す.
     *
     * @access protected
     * @return string $_GET['mode'] 又は $_POST['mode'] の文字列
     */
    function getMode() {
        $pattern = '/^[a-zA-Z0-9_]+$/';
        $mode = null;
        if (isset($_GET['mode']) && preg_match($pattern, $_GET['mode'])) {
            $mode =  $_GET['mode'];
        } elseif (isset($_POST['mode']) && preg_match($pattern, $_POST['mode'])) {
            $mode = $_POST['mode'];
        }
        return $mode;
    }


    /**
     * 初期化を行う.
     *
     * @param SC_FormParam $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam) {
        // 共通定義
        $this->lfInitParamCommon($objFormParam);
    }

    /**
     * ディレクトリ移動時、パラメーター定義
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitParamModeMove(&$objFormParam) {
        // 共通定義
        $this->lfInitParamCommon($objFormParam);
        $objFormParam->addParam('選択ファイル', 'select_file', MTEXT_LEN, 'a', array());
    }

    /**
     * ファイル表示時、パラメーター定義
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitParamModeView(&$objFormParam) {
        // 共通定義
        $this->lfInitParamCommon($objFormParam);
        $objFormParam->addParam('選択ファイル', 'select_file', MTEXT_LEN, 'a', array('SELECT_CHECK'));
    }

    /**
     * ファイル表示時、パラメーター定義
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitParamModeCreate(&$objFormParam) {
        // 共通定義
        $this->lfInitParamCommon($objFormParam);
        $objFormParam->addParam('選択ファイル', 'select_file', MTEXT_LEN, 'a', array());
        $objFormParam->addParam('作成ファイル名', 'create_file', MTEXT_LEN, 'a', array('EXIST_CHECK', 'FILE_NAME_CHECK_BY_NOUPLOAD'));
    }

    /**
     * ファイル表示時、パラメーター定義
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitParamCommon(&$objFormParam) {
        $objFormParam->addParam('ルートディレクトリ', 'top_dir', MTEXT_LEN, 'a', array());
        $objFormParam->addParam('現在の階層ディレクトリ', 'now_dir', MTEXT_LEN, 'a', array());
        $objFormParam->addParam('現在の階層ファイル', 'now_file', MTEXT_LEN, 'a', array());
        $objFormParam->addParam('ツリー選択状態', 'tree_status', MTEXT_LEN, 'a', array());
        $objFormParam->addParam('ツリー選択ディレクトリ', 'tree_select_file', MTEXT_LEN, 'a', array());
    }

    /*
     * ファイル情報の初期化
     *
     * @param object $objUpFile SC_UploadFileインスタンス
     * @return void
     */
    function lfInitFile(&$objUpFile) {
        $objUpFile->addFile('ファイル', 'upload_file', array(), FILE_SIZE, true, 0, 0, false);
    }

    /*
     * 選択ディレクトリがUSER_REALDIR以下かチェック
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @param string $dir ディレクトリ
     * @return string $select_dir 選択ディレクトリ
     */
    function lfCheckSelectDir($objFormParam, $dir) {
        $select_dir = '';
        $top_dir = $objFormParam->getValue('top_dir');
        // USER_REALDIR以下の場合
        if (preg_match("@^\Q". $top_dir. "\E@", $dir) > 0) {
            // 相対パスがある場合、USER_REALDIRを返す.
            if (preg_match("@\Q..\E@", $dir) > 0) {
                $select_dir = $top_dir;
            // 相対パスがない場合、そのままディレクトリパスを返す.
            } else {
                $select_dir= $dir;
            }
        // USER_REALDIR以下でない場合、USER_REALDIRを返す.
        } else {
            $select_dir = $top_dir;
        }
        return $select_dir;
    }

    /**
     * 親ディレクトリ取得
     *
     * @param string $dir 現在いるディレクトリ
     * @return string $parent_dir 親ディレクトリ
     */
    function lfGetParentDir($dir) {
        $parent_dir = '';
        $dir = rtrim($dir, '/');
        $arrDir = explode('/', $dir);
        array_pop($arrDir);
        foreach ($arrDir as $val) {
            $parent_dir .= "$val/";
        }
        $parent_dir = rtrim($parent_dir, '/');
        return $parent_dir;
    }


    /**
     * テンプレートに渡す値を整形する
     *
     * @param array $arrVal $_POST
     * @return array $setParam テンプレートに渡す値
     */
    function createSetParam($arrVal) {
        $setParam = $arrVal;
        // Windowsの場合は, ディレクトリの区切り文字を\から/に変換する
        $setParam['top_dir'] = (strpos(PHP_OS, 'WIN') === false) ? USER_REALDIR : str_replace('\\', '/', USER_REALDIR);

        //// 初期表示はルートディレクトリ(user_data/)を表示
        if (SC_Utils_Ex::isBlank($this->getMode())) {
            $setParam['now_dir'] = $setParam['top_dir'];
        }
        return $setParam;
    }

    /**
     * ファイル表示を行う
     *
     * @param SC_FormParam $objFormParam SC_FormParamインスタンス
     * @return boolean ファイル表示するかどうか
     */
    function tryView(&$objFormParam) {
        $view_flg = false;
        $now_dir = $this->lfCheckSelectDir($objFormParam, dirname($objFormParam->getValue('select_file')));
        $objFormParam->setValue('now_dir', $now_dir);
        if (!strpos($objFormParam->getValue('select_file'), $objFormParam->getValue('top_dir'))) {
            $view_flg = true;
        }
        return $view_flg;
    }

    /**
     * ディレクトリを作成
     *
     * @param object $objFileManager SC_Helper_FileManager_Exインスタンス
     * @param SC_FormParam $objFormParam SC_FormParamインスタンス
     * @return boolean ディレクトリ作成できたかどうか
     */
    function tryCreateDir($objFileManager, $objFormParam) {
        $create_dir_flg = false;
        $create_dir = rtrim($objFormParam->getValue('now_dir'), '/');
        // ファイル作成
        if ($objFileManager->sfCreateFile($create_dir.'/'.$objFormParam->getValue('create_file'), 0755)) {
            $create_dir_flg = true;
        }
        return $create_dir_flg;
    }


    /**
     * 現在の階層がルートディレクトリかどうかテンプレートに渡す
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function setIsTopDir($objFormParam) {
        // トップディレクトリか調査
        $is_top_dir = false;
        // 末尾の/をとる
        $top_dir_check = rtrim($objFormParam->getValue('top_dir'), '/');
        $now_dir_check = rtrim($objFormParam->getValue('now_dir'), '/');
        if ($top_dir_check == $now_dir_check) {
            $is_top_dir = true;
        }
        return $is_top_dir;
    }

    /**
     * 現在の階層のパスをテンプレートに渡す
     *
     * @param SC_FormParam $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function setDispPath($objFormParam, &$objPage) {
        // プラグイン用識別子
        $plg_head = NakwebAdminFileUpload::$nakweb_plgin_individual;
        // Windows 環境で DIRECTORY_SEPARATOR が JavaScript に渡るとエスケープ文字と勘違いするので置換
        $html_realdir = str_replace(DIRECTORY_SEPARATOR, '/', HTML_REALDIR);
        $arrNowDir = preg_split('/\//', str_replace($html_realdir, '', $objFormParam->getValue('now_dir')));
        $this->setDispParam($objPage, $plg_head . '_tpl_now_dir', SC_Utils_Ex::jsonEncode($arrNowDir));
        $this->setDispParam($objPage, $plg_head . '_tpl_file_path', $html_realdir);
    }

    /**
     * ディレクトリツリー生成
     *
     * @param object $objFileManager SC_Helper_FileManager_Exインスタンス
     * @param SC_FormParam $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function setDispTree($objFileManager, $objFormParam, &$objPage) {
        $arrEcVersion = explode('.',ECCUBE_VERSION,3);
        // プラグイン用識別子
        $plg_head = NakwebAdminFileUpload::$nakweb_plgin_individual;
        // ツリーを表示する divタグid, ツリー配列変数名, 現在ディレクトリ, 選択ツリーhidden名, ツリー状態hidden名, mode hidden名
        $tpl_onload = '';
        $now_dir = $objFormParam->getValue('now_dir');
        if($arrEcVersion[1]=='13'){
        $tpl_onload = "eccube.fileManager.viewFileTree('tree', arrTree, '$now_dir', 'tree_select_file', 'tree_status', '" . $plg_head . "_move');";
        } else {
        $tpl_onload = "fnTreeView('tree', arrTree, '$now_dir', 'tree_select_file', 'tree_status', '" . $plg_head . "_move');";}
        $this->setDispParam($objPage, $plg_head . '_tpl_onload', $tpl_onload, true);

        $tpl_javascript = '';
        $arrTree = $objFileManager->sfGetFileTree($objFormParam->getValue('top_dir'), $objFormParam->getValue('tree_status'));
        $tpl_javascript .= "arrTree = new Array();\n";
        foreach ($arrTree as $arrVal) {
            $tpl_javascript .= 'arrTree['.$arrVal['count'].'] = new Array('.$arrVal['count'].", '".$arrVal['type']."', '".$arrVal['path']."', ".$arrVal['rank'].',';
            if ($arrVal['open']) {
                $tpl_javascript .= "true);\n";
            } else {
                $tpl_javascript .= "false);\n";
            }
        }
        $this->setDispParam($objPage, $plg_head . '_tpl_javascript', $tpl_javascript);
    }

    /**
     * テンプレートに値を渡す
     *
     * @param string $obj オブジェクト
     * @param string $key キー名
     * @param string $val 値
     * @param string $add true の場合は追記する 
     * @return void
     */
    function setDispParam(&$obj, $key, $val, $add = false) {
        if ($add == true) {
            // 追記処理
            $obj->$key .= $val;
        } else {
            // 上書処理
            $obj->$key  = $val;
        }
    }

    /**
     * エラーを表示用の配列に格納
     *
     * @param string $obj オブジェクト
     * @param string $key キー名
     * @param string $value エラー内容
     * @return void
     */
    function setDispError(&$obj, $key, $value) {
        // プラグイン用識別子
        $plg_head   = NakwebAdminFileUpload::$nakweb_plgin_individual;
        $parent_key = $plg_head . '_arrErr';
        // 既にエラーがある場合は、処理しない
        if (SC_Utils_Ex::isBlank($obj->$parent_key[$key])) {
            $obj->$parent_key[$key] = $value;
        }
    }
}
?>
