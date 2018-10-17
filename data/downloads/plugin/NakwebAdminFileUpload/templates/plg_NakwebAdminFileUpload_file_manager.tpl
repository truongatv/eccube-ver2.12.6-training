<!--{*
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
*}-->

<!-- start nakweb_admin_file_upload -->
<h2>ファイルアップロード</h2>
<script type="text/javascript">//<![CDATA[

    <!--{$plg_nakweb_00002_tpl_javascript}-->
    $(function(){
        <!--{$plg_nakweb_00002_tpl_onload}-->
    });

    $(function() {
        var bread_crumbs = <!--{$plg_nakweb_00002_tpl_now_dir}-->;
        var file_path = '<!--{$plg_nakweb_00002_tpl_file_path}-->';
        var $delimiter = '<span>&nbsp;&gt;&nbsp;</span>';
        var $node = $('h2.plg_nakweb_00002');
        var total = bread_crumbs.length;
        for (var i in bread_crumbs) {
            file_path += bread_crumbs[i] + '/';
            $('<a href="javascript:;" onclick="fnFolderOpen(\'' + file_path + '\'); return false;" />')
                .text(bread_crumbs[i])
                .appendTo($node);
            if (i < total - 1) $node.append($delimiter);
        }
    });

    var IMG_FOLDER_CLOSE   = "<!--{$TPL_URLPATH}-->img/contents/folder_close.gif";  // フォルダクローズ時画像
    var IMG_FOLDER_OPEN    = "<!--{$TPL_URLPATH}-->img/contents/folder_open.gif";   // フォルダオープン時画像
    var IMG_PLUS           = "<!--{$TPL_URLPATH}-->img/contents/plus.gif";          // プラスライン
    var IMG_MINUS          = "<!--{$TPL_URLPATH}-->img/contents/minus.gif";         // マイナスライン
    var IMG_NORMAL         = "<!--{$TPL_URLPATH}-->img/contents/space.gif";         // スペース

// モードとキーを指定してSUBMITを行う。
    function fnModeSubmit(mode, keyname, keyid) {
        switch(mode) {
            case 'plg_nakweb_00002_delete':
                if(!window.confirm('一度削除したデータは、元に戻せません。\n削除しても宜しいですか？')){
                    return;
                }
                break;
            default:
                break;
        }
        document.form1['mode'].value = mode;
        if(keyname != "" && keyid != "") {
            document.form1[keyname].value = keyid;
        }
        document.form1.submit();
    };
//]]></script>
<form name="form1" method="post" action="?"  enctype="multipart/form-data">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="mode" value="" />
<input type="hidden" name="now_file" value="<!--{$plg_nakweb_00002_tpl_now_dir|h}-->" />
<input type="hidden" name="now_dir" value="<!--{$plg_nakweb_00002_tpl_now_file|h}-->" />
<input type="hidden" name="tree_select_file" value="" />
<input type="hidden" name="tree_status" value="" />
<input type="hidden" name="select_file" value="" />
<!--{if $page_id}-->
<input type="hidden" name="page_id" value="<!--{$page_id|h}-->" />
<!--{/if}-->
<!--{if $bloc_id}-->
<input type="hidden" name="bloc_id" value="<!--{$bloc_id|h}-->" />
<!--{/if}-->
<!--{if $old_css_name}-->
<input type="hidden" name="css_name" value="<!--{$css_name|h}-->" />
<!--{/if}-->
<input type="hidden" name="device_type_id" value="<!--{$device_type_id|h}-->" />

<div id="admin-contents" class="contents-main">
    <div id="contents-filemanager-tree">
        <div id="tree"></div>
    </div>
    <div id="contents-filemanager-right">
        <table class="now_dir">
            <tr>
                <th>ファイルのアップロード</th>
                <td>
                    <!--{if $plg_nakweb_00002_arrErr.upload_file}--><span class="attention"><!--{$plg_nakweb_00002_arrErr.upload_file}--></span><!--{/if}-->
                    <input type="file" name="upload_file" size="40" <!--{if $plg_nakweb_00002_arrErr.upload_file}-->style="background-color:<!--{$smarty.const.ERR_COLOR|h}-->"<!--{/if}-->><a class="btn-normal" href="javascript:;" onclick="setTreeStatus('tree_status');fnModeSubmit('plg_nakweb_00002_upload','',''); return false;">アップロード</a>
                </td>
            </tr>
            <tr>
                <th>フォルダ作成</th>
                <td>
                    <!--{if $plg_nakweb_00002_arrErr.create_file}--><span class="attention"><!--{$plg_nakweb_00002_arrErr.create_file}--></span><!--{/if}-->
                    <input type="text" name="create_file" value="" style="width:336px;<!--{if $plg_nakweb_00002_arrErr.create_file}--> background-color:<!--{$smarty.const.ERR_COLOR|h}--><!--{/if}-->"><a class="btn-normal" href="javascript:;" onclick="setTreeStatus('tree_status');fnModeSubmit('plg_nakweb_00002_create','',''); return false;">作成</a>
                </td>
            </tr>
        </table>
        <h2 class="plg_nakweb_00002"><!--{* jQuery で挿入される *}--></h2>
        <table class="list">
            <tr>
                <th>ファイル名</th>
                <th>サイズ</th>
                <th>更新日付</th>
                <th class="edit">表示</th>
                <th>ダウンロード</th>
                <th class="delete">削除</th>
            </tr>
            <!--{if !$plg_tpl_is_top_dir}-->
                <tr id="parent_dir" onclick="fnSetFormVal('form1', 'select_file', '<!--{$plg_nakweb_00002_tpl_parent_dir|h}-->');fnSelectFile('parent_dir', '#808080');" onDblClick="setTreeStatus('tree_status');fnDbClick(arrTree, '<!--{$plg_nakweb_00002_tpl_parent_dir|h}-->', true, '<!--{$plg_nakweb_00002_tpl_now_dir|h}-->', true)" style="">
                    <td>
                        <img src="<!--{$TPL_URLPATH}-->img/contents/folder_parent.gif" alt="フォルダ">&nbsp;..
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            <!--{/if}-->
            <!--{section name=cnt loop=$plg_nakweb_00002_arrFileList}-->
                <!--{assign var="id" value="select_file`$smarty.section.cnt.index`"}-->
                <tr id="<!--{$id}-->" style="">
                    <td class="file-name" onDblClick="setTreeStatus('tree_status');fnDbClick(arrTree, '<!--{$plg_nakweb_00002_arrFileList[cnt].file_path|h}-->', <!--{if $plg_nakweb_00002_arrFileList[cnt].is_dir|h}-->true<!--{else}-->false<!--{/if}-->, '<!--{$plg_nakweb_00002_tpl_now_dir|h}-->', false)">
                        <!--{if $plg_nakweb_00002_arrFileList[cnt].is_dir}-->
                            <img src="<!--{$TPL_URLPATH}-->img/contents/folder_close.gif" alt="フォルダ">
                        <!--{else}-->
                            <img src="<!--{$TPL_URLPATH}-->img/contents/file.gif">
                        <!--{/if}-->
                        <!--{$plg_nakweb_00002_arrFileList[cnt].file_name|h}-->
                    </td>
                    <td class="right">
                        <!--{$plg_nakweb_00002_arrFileList[cnt].file_size|number_format}-->
                    </td>
                    <td class="center">
                        <!--{$plg_nakweb_00002_arrFileList[cnt].file_time|h}-->
                    </td>
                    <!--{if $plg_nakweb_00002_arrFileList[cnt].is_dir}-->
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'tree_select_file', '<!--{$plg_nakweb_00002_arrFileList[cnt].file_path}-->');fnSelectFile('<!--{$id}-->', '#808080');fnModeSubmit('plg_nakweb_00002_move','',''); return false;">表示</a>
                        </td>
                    <!--{else}-->
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<!--{$plg_nakweb_00002_arrFileList[cnt].file_path|h}-->');fnSelectFile('<!--{$id}-->', '#808080');fnModeSubmit('plg_nakweb_00002_view','',''); return false;">表示</a>
                        </td>
                    <!--{/if}-->
                    <!--{if $plg_nakweb_00002_arrFileList[cnt].is_dir}-->
                        <!--{* ディレクトリはダウンロード不可 *}-->
                        <td class="center">-</td>
                    <!--{else}-->
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<!--{$plg_nakweb_00002_arrFileList[cnt].file_path|h}-->');fnSelectFile('<!--{$id}-->', '#808080');setTreeStatus('tree_status');fnModeSubmit('plg_nakweb_00002_download','',''); return false;">ダウンロード</a>
                        </td>
                    <!--{/if}-->
                    <td class="center">
                        <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<!--{$plg_nakweb_00002_arrFileList[cnt].file_path|h}-->');fnSelectFile('<!--{$id}-->', '#808080');setTreeStatus('tree_status');fnModeSubmit('plg_nakweb_00002_delete','',''); return false;">削除</a>
                    </td>
                </tr>
            <!--{/section}-->
        </table>
    </div>
    <div style="clear:both;"></div>
</div>
</form>
<!-- end   nakweb_admin_file_upload -->
