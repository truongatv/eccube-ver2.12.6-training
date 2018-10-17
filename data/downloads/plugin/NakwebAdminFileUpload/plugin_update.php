<?php
/*
 * NakwebCsvShipmentOrder
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
 * プラグイン のアップデート用クラス.
 *
 * @package NakwebCsvShipmentOrder
 * @author NAKWEB CO.,LTD.
 * @version $Id: $
 */
class plugin_update{
   /**
     * アップデート
     * updateはアップデート時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function update($arrPlugin) {
        switch($arrPlugin['plugin_version']){
            // バージョン0.1からのアップデート
            case("0.1"):
            case("1.0"):
               plugin_update::updatever($arrPlugin);
               plugin_update::insertFookPoint($arrPlugin);
               break;
            default:
               break;
        }
    }

    /**
     * 0.1のアップデートを実行します.
     * @param type $param 
     */
    function updatever($arrPlugin) {

        // 変更のあったファイルを上書きします.
        //// プログラムファイル
        copy(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . "/plugin_info.php", PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/plugin_info.php");
        copy(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . "/plugin_update.php", PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/plugin_update.php");
        copy(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . "/NakwebAdminFileUpload.php", PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/NakwebAdminFileUpload.php");
        ////テンプレートファイル
        copy(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . "/templates/plg_NakwebAdminFileUpload_file_manager.tpl", PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/templates/plg_NakwebAdminFileUpload_file_manager.tpl");
        copy(DOWNLOADS_TEMP_PLUGIN_UPDATE_DIR . "/templates/plg_NakwebAdminFileUpload_file_manager_2-13.tpl", PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . "/templates/plg_NakwebAdminFileUpload_file_manager_2-13.tpl");


        // プラグイン用の変数設定
        $plugin_data  = '';
        $arrData   = array();
        $plugin_data  = serialize($arrData);

        // dtb_pluhinを更新します.
        plugin_update::updateDtbPluginData($arrPlugin, $plugin_data);
    }

    /**
     * dtb_pluginを更新します.
     * 
     * @param int $arrPlugin プラグイン情報
     * @return void
     */
    function updateDtbPluginData($arrPlugin, $plugin_data = '') {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $sqlval = array();
        $table = "dtb_plugin";
        if (strlen($plugin_data) > 0) {
            // データが存在している場合は更新する（シリアライズ化を事前に行なっておくこと）
            $sql_conf['free_field1']    = $plugin_data;
        }
        //$sql_conf['plugin_name']        = '';
        //$sql_conf['plugin_description'] = '';
        $sql_conf['plugin_version']     = '1.1';
        $sql_conf['compliant_version']  = '2.12.2 ～ 2.13.2';
        $sql_conf['update_date']        = 'CURRENT_TIMESTAMP';
        $where = "plugin_id = ?";
        $objQuery->update($table, $sql_conf, $where, array($arrPlugin['plugin_id']));
    }

    /**
     * バージョン1.0では登録されていなかったフックポイントを登録する。
     * 
     * @param int $arrPlugin プラグイン情報
     * @return void
     */
    function insertFookPoint($arrPlugin) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        // フックポイントをDB登録.
        $hook_point = array(
            array("LC_Page_Admin_Design_MainEdit_action_after", "plg_file_upload_set"),
            array("LC_Page_Admin_Design_Bloc_action_after", "plg_file_upload_set"),
            array("LC_Page_Admin_Design_Header_action_after", "plg_file_upload_set"),
            array("LC_Page_Admin_Design_CSS_action_after", "plg_file_upload_set")
        );
        /**
         * FIXME コードが重複しているため、要修正
         */
        // フックポイントが配列で定義されている場合
        if (is_array($hook_point)) {
            foreach ($hook_point as $h) {
                $arr_sqlval_plugin_hookpoint = array();
                $id = $objQuery->nextVal('dtb_plugin_hookpoint_plugin_hookpoint_id');
                $arr_sqlval_plugin_hookpoint['plugin_hookpoint_id'] = $id;
                $arr_sqlval_plugin_hookpoint['plugin_id'] = $arrPlugin['plugin_id'];
                $arr_sqlval_plugin_hookpoint['hook_point'] = $h[0];
                $arr_sqlval_plugin_hookpoint['callback'] = $h[1];
                $arr_sqlval_plugin_hookpoint['update_date'] = 'CURRENT_TIMESTAMP';
                $objQuery->insert('dtb_plugin_hookpoint', $arr_sqlval_plugin_hookpoint);
            }
        // 文字列定義の場合
        } else {
            $array_hook_point = explode(',', $hook_point);
            foreach ($array_hook_point as $h) {
                $arr_sqlval_plugin_hookpoint = array();
                $id = $objQuery->nextVal('dtb_plugin_hookpoint_plugin_hookpoint_id');
                $arr_sqlval_plugin_hookpoint['plugin_hookpoint_id'] = $id;
                $arr_sqlval_plugin_hookpoint['plugin_id'] = $arrPlugin['plugin_id'];
                $arr_sqlval_plugin_hookpoint['hook_point'] = $h;
                $arr_sqlval_plugin_hookpoint['update_date'] = 'CURRENT_TIMESTAMP';
                $objQuery->insert('dtb_plugin_hookpoint', $arr_sqlval_plugin_hookpoint);
            }
        }
        
        $objQuery->commit();
    }
}
?>
