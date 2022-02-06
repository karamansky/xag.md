<?php do_action('kastell_mkdf_before_page_header'); ?>
<aside class="mkdf-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
    <div class="mkdf-vertical-menu-area-inner">
        <div class="mkdf-vertical-area-background"></div>
        <div class="mkdf-vertical-menu-nav-holder-outer">
            <div class="mkdf-vertical-menu-nav-holder">
                <div class="mkdf-vertical-menu-holder-nav-inner">
                    <?php kastell_mkdf_get_header_vertical_sliding_main_menu(); ?>
                </div>
                <div class="mkdf-vertical-menu-holder-widget-area">
                    <?php kastell_mkdf_get_header_vertical_menu_sliding_widget_areas(); ?>
                </div>
            </div>
        </div>
        <?php if(!$hide_logo) {
            kastell_mkdf_get_logo();
        } ?>
        <div class="mkdf-vertical-menu-holder">
            <div class="mkdf-vertical-menu-table">
                <div class="mkdf-vertical-menu-table-cell">

                    <div class="mkdf-vertical-menu-opener">
                        <a href="#"><span class="mkdf-line"></span></a>
                    </div>
                    <div class="mkdf-vertical-area-widget-holder">
                        <?php kastell_mkdf_get_header_vertical_sliding_widget_areas(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

<?php do_action('kastell_mkdf_after_page_header'); ?>
