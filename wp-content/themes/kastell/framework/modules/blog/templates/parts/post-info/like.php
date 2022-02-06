<?php if(kastell_mkdf_core_plugin_installed()) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('kastell_mkdf_get_like') ) kastell_mkdf_get_like(); ?>
    </div>
<?php } ?>