<?php /* Smarty version 2.6.26, created on 2018-10-17 15:43:07
         compiled from /Applications/MAMP/htdocs/eccube-2.12.6/html/../data/Smarty/templates/default/frontparts/bloc/disqus.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/Applications/MAMP/htdocs/eccube-2.12.6/html/../data/Smarty/templates/default/frontparts/bloc/disqus.tpl', 1, false),array('modifier', 'h', '/Applications/MAMP/htdocs/eccube-2.12.6/html/../data/Smarty/templates/default/frontparts/bloc/disqus.tpl', 5, false),)), $this); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['enable'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1): ?>
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['free_field1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'; // required: replace example with your forum shortname

    var disqus_config = function () { 
      this.language = "ja";
    };

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
<?php endif; ?>