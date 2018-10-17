<?php /* Smarty version 2.6.26, created on 2018-10-17 15:13:59
         compiled from design/main_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'design/main_edit.tpl', 13, false),array('modifier', 'h', 'design/main_edit.tpl', 13, false),array('modifier', 'sfGetErrorColor', 'design/main_edit.tpl', 21, false),array('modifier', 'u', 'design/main_edit.tpl', 55, false),array('modifier', 'strlen', 'design/main_edit.tpl', 68, false),array('modifier', 'escape', 'design/main_edit.tpl', 74, false),array('modifier', 'number_format', 'design/main_edit.tpl', 219, false),)), $this); ?>


<script type="text/javascript">
<!--
function fnTargetSelf(){
    document.form_edit.target = "_self";
}
//-->
</script>


<form name="form_edit" id="form_edit" method="post" action="?">
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><input type="hidden" name="mode" value=""><input type="hidden" name="page_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['page_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"><input type="hidden" name="device_type_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['device_type_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"><?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['err'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?><div class="message">
            <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['err'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
        </div>
    <?php endif; ?>
    <table><tr><th>名称</th>
            <td>
                <?php $this->assign('key', 'page_name'); ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['edit_flg']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 2): ?>
                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"><?php else: ?><input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="60" class="box60"><span class="attention"> (上限<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
文字)</span>
                <?php endif; ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                    <div class="message">
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    </div>
                <?php endif; ?>
            </td>
        </tr><tr><th>URL</th>
            <td>
                <?php $this->assign('key', 'filename'); ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['edit_flg']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 2): ?>
                    <?php echo ((is_array($_tmp=((is_array($_tmp=@HTTP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
.php
                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"><?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=@USER_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="ime-mode: disabled;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="40" class="box40">.php<span class="attention"> (上限<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
文字)</span>
                <?php endif; ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                    <div class="attention">
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    </div>
                <?php endif; ?>
            </td>
        </tr><tr><td colspan="2">
                <label for="header-chk"><input type="checkbox" name="header_chk" id="header-chk" value="1" <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['header_chk']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '1'): ?> checked <?php endif; ?>>共通のヘッダーを使用する</label> 
                <label for="footer-chk"><input type="checkbox" name="footer_chk" id="footer-chk" value="1" <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['footer_chk']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '1'): ?> checked <?php endif; ?>>共通のフッターを使用する</label>
                <div>
                    <textarea id="tpl_data" class="top" name="tpl_data" rows='<?php echo ((is_array($_tmp=$this->_tpl_vars['text_row'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
' style="width: 98%;"><?php echo "\n"; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['tpl_data']['value'])) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</textarea><input type="hidden" name="html_area_row" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['text_row'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><br><a id="resize-btn" class="btn-normal" href="javascript:;" onclick="ChangeSize('#resize-btn', '#tpl_data', 50, 13); return false;"><span>拡大</span></a>
                </div>
            </td>
        </tr></table><div class="btn-area">
        <ul><li><a class="btn-action" href="javascript:;" name="subm" onclick="fnTargetSelf(); fnFormModeSubmit('form_edit','confirm','',''); return false;"><span class="btn-next">登録する</span></a></li>
        </ul></div>

    <h2>編集可能ページ一覧</h2>
    <div class="btn addnew">
        <a class="btn-normal" href="?device_type_id=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['device_type_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
"><span>ページを新規入力</span></a>
    </div>
    <table class="list"><col width="70%"><col width="10%"><col width="10%"><col width="10%"><tr><th>名称</th>
            <th>レイアウト</th>
            <th>ページ詳細</th>
            <th>削除</th>
        </tr><?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrPageList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?><tr style="<?php if (((is_array($_tmp=$this->_tpl_vars['item']['page_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['page_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>background-color: <?php echo ((is_array($_tmp=@SELECT_RGB)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
;<?php endif; ?>"><td>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['page_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

                </td>
                <td class="center">
                    <a href="./<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
?page_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['page_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
&amp;device_type_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['device_type_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">編集</a>
                </td>
                <td class="center">
                    <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['filename'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                        <a href="?page_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['page_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
&amp;device_type_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['device_type_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">編集</a>
                    <?php endif; ?>
                </td>
                <td class="center">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['item']['edit_flg'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1): ?>
                        <a href="javascript:;" onclick="fnTargetSelf(); fnFormModeSubmit('form_edit','delete','page_id','<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['page_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'); return false;">削除</a>
                    <?php endif; ?>
                </td>
            </tr><?php endforeach; endif; unset($_from); ?></table></form>
<!-- start nakweb_admin_file_upload -->
<h2>ファイルアップロード</h2>
<script type="text/javascript">//<![CDATA[

    <?php echo ((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_javascript'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

    $(function(){
        <?php echo ((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_onload'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

    });

    $(function() {
        var bread_crumbs = <?php echo ((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_now_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
;
        var file_path = '<?php echo ((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
';
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

    var IMG_FOLDER_CLOSE   = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/folder_close.gif";  // フォルダクローズ時画像
    var IMG_FOLDER_OPEN    = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/folder_open.gif";   // フォルダオープン時画像
    var IMG_PLUS           = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/plus.gif";          // プラスライン
    var IMG_MINUS          = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/minus.gif";         // マイナスライン
    var IMG_NORMAL         = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/space.gif";         // スペース

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
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input type="hidden" name="mode" value="" />
<input type="hidden" name="now_file" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_now_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<input type="hidden" name="now_dir" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_now_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<input type="hidden" name="tree_select_file" value="" />
<input type="hidden" name="tree_status" value="" />
<input type="hidden" name="select_file" value="" />
<?php if (((is_array($_tmp=$this->_tpl_vars['page_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
<input type="hidden" name="page_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['page_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['bloc_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
<input type="hidden" name="bloc_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bloc_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['old_css_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
<input type="hidden" name="css_name" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['css_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
<?php endif; ?>
<input type="hidden" name="device_type_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['device_type_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />

<div id="admin-contents" class="contents-main">
    <div id="contents-filemanager-tree">
        <div id="tree"></div>
    </div>
    <div id="contents-filemanager-right">
        <table class="now_dir">
            <tr>
                <th>ファイルのアップロード</th>
                <td>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrErr']['upload_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrErr']['upload_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <input type="file" name="upload_file" size="40" <?php if (((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrErr']['upload_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>style="background-color:<?php echo ((is_array($_tmp=((is_array($_tmp=@ERR_COLOR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"<?php endif; ?>><a class="btn-normal" href="javascript:;" onclick="setTreeStatus('tree_status');fnModeSubmit('plg_nakweb_00002_upload','',''); return false;">アップロード</a>
                </td>
            </tr>
            <tr>
                <th>フォルダ作成</th>
                <td>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrErr']['create_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrErr']['create_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <input type="text" name="create_file" value="" style="width:336px;<?php if (((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrErr']['create_file'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> background-color:<?php echo ((is_array($_tmp=((is_array($_tmp=@ERR_COLOR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php endif; ?>"><a class="btn-normal" href="javascript:;" onclick="setTreeStatus('tree_status');fnModeSubmit('plg_nakweb_00002_create','',''); return false;">作成</a>
                </td>
            </tr>
        </table>
        <h2 class="plg_nakweb_00002"></h2>
        <table class="list">
            <tr>
                <th>ファイル名</th>
                <th>サイズ</th>
                <th>更新日付</th>
                <th class="edit">表示</th>
                <th>ダウンロード</th>
                <th class="delete">削除</th>
            </tr>
            <?php if (! ((is_array($_tmp=$this->_tpl_vars['plg_tpl_is_top_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <tr id="parent_dir" onclick="fnSetFormVal('form1', 'select_file', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_parent_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');fnSelectFile('parent_dir', '#808080');" onDblClick="setTreeStatus('tree_status');fnDbClick(arrTree, '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_parent_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', true, '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_now_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', true)" style="">
                    <td>
                        <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/folder_parent.gif" alt="フォルダ">&nbsp;..
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            <?php endif; ?>
            <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = $this->_sections['cnt']['loop'];
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?>
                <?php $this->assign('id', "select_file".($this->_sections['cnt']['index'])); ?>
                <tr id="<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="">
                    <td class="file-name" onDblClick="setTreeStatus('tree_status');fnDbClick(arrTree, '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['is_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp))): ?>true<?php else: ?>false<?php endif; ?>, '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_tpl_now_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
', false)">
                        <?php if (((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['is_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/folder_close.gif" alt="フォルダ">
                        <?php else: ?>
                            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/contents/file.gif">
                        <?php endif; ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['file_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                    </td>
                    <td class="right">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['file_size'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

                    </td>
                    <td class="center">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['file_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                    </td>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['is_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'tree_select_file', '<?php echo ((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
');fnSelectFile('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '#808080');fnModeSubmit('plg_nakweb_00002_move','',''); return false;">表示</a>
                        </td>
                    <?php else: ?>
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');fnSelectFile('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '#808080');fnModeSubmit('plg_nakweb_00002_view','',''); return false;">表示</a>
                        </td>
                    <?php endif; ?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['is_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                                <td class="center">-</td>
                    <?php else: ?>
                        <td class="center">
                            <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');fnSelectFile('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '#808080');setTreeStatus('tree_status');fnModeSubmit('plg_nakweb_00002_download','',''); return false;">ダウンロード</a>
                        </td>
                    <?php endif; ?>
                    <td class="center">
                        <a href="javascript:;" onclick="fnSetFormVal('form1', 'select_file', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plg_nakweb_00002_arrFileList'][$this->_sections['cnt']['index']]['file_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');fnSelectFile('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', '#808080');setTreeStatus('tree_status');fnModeSubmit('plg_nakweb_00002_delete','',''); return false;">削除</a>
                    </td>
                </tr>
            <?php endfor; endif; ?>
        </table>
    </div>
    <div style="clear:both;"></div>
</div>
</form>
<!-- end   nakweb_admin_file_upload -->
