<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if( kastell_mkdf_core_plugin_installed() && kastell_mkdf_options()->getOptionValue('enable_social_share') === 'yes' && kastell_mkdf_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="mkdf-blog-share">
        <?php echo kastell_mkdf_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>