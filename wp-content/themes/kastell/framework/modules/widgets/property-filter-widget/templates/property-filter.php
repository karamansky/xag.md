<div class="mkdf-property-filter-holder">
    <div class="mkdf-property-filter-title-holder">
        <div class="mkdf-property-filter-title"><?php echo esc_html__( 'Find Property:', 'kastell' ); ?></div>
    </div>
    <a class="mkdf-property-filter-close" href="javascript:void(0)">
        <?php echo kastell_mkdf_icon_collections()->renderIcon( 'ion-ios-close-empty', 'ion_icons' ); ?>
    </a>
    <div class="mkdf-property-filter-holder-inner">
        <?php echo kastell_mkdf_execute_shortcode('mkdf_interactive_interactive_property_list', array(
                'enable_link_items_scroll' => 'no',
                'skin'                     => 'light'
        ));?>
    </div>
</div>