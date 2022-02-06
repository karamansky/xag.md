<?php
namespace MikadoCore\CPT\Shortcodes\BlogSlider;

use MikadoCore\Lib;

class BlogSlider implements Lib\ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'mkdf_blog_slider';

        add_action('vc_before_init', array($this,'vcMap'));

        //Category filter
        add_filter( 'vc_autocomplete_mkdf_blog_slider_category_callback', array( &$this, 'blogListCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Category render
        add_filter( 'vc_autocomplete_mkdf_blog_slider_category_render', array( &$this, 'blogListCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
    }

    public function getBase() {
        return $this->base;
    }
	
	public function vcMap() {
		vc_map(
			array(
				'name'                      => esc_html__( 'Mikado Blog Slider', 'kastell' ),
				'base'                      => $this->base,
				'icon'                      => 'icon-wpb-blog-slider extended-custom-icon',
				'category'                  => esc_html__( 'by MIKADO', 'kastell' ),
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'       => 'textfield',
						'param_name' => 'number_of_posts',
						'heading'    => esc_html__( 'Number of Posts', 'kastell' )
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'orderby',
						'heading'     => esc_html__( 'Order By', 'kastell' ),
						'value'       => array_flip( kastell_mkdf_get_query_order_by_array() ),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'order',
						'heading'     => esc_html__( 'Order', 'kastell' ),
						'value'       => array_flip( kastell_mkdf_get_query_order_array() ),
						'save_always' => true
					),
					array(
						'type'        => 'autocomplete',
						'param_name'  => 'category',
						'heading'     => esc_html__( 'Category', 'kastell' ),
						'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'kastell' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'image_size',
						'heading'    => esc_html__( 'Image Size', 'kastell' ),
						'value'      => array(
							esc_html__( 'Original', 'kastell' )  => 'full',
							esc_html__( 'Square', 'kastell' )    => 'kastell_mkdf_square',
							esc_html__( 'Landscape', 'kastell' ) => 'kastell_mkdf_landscape',
							esc_html__( 'Portrait', 'kastell' )  => 'kastell_mkdf_portrait',
							esc_html__( 'Thumbnail', 'kastell' ) => 'thumbnail',
							esc_html__( 'Medium', 'kastell' )    => 'medium',
							esc_html__( 'Large', 'kastell' )     => 'large'
						),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_tag',
						'heading'     => esc_html__( 'Title Tag', 'kastell' ),
						'value'       => array_flip( kastell_mkdf_get_title_tag( true ) ),
						'group'       => esc_html__( 'Post Info', 'kastell' )
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_transform',
						'heading'     => esc_html__( 'Title Text Transform', 'kastell' ),
						'value'       => array_flip( kastell_mkdf_get_text_transform_array( true ) ),
						'group'       => esc_html__( 'Post Info', 'kastell' )
					),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'excerpt_length',
                        'heading'     => esc_html__( 'Text Length', 'kastell' ),
                        'description' => esc_html__( 'Number of words', 'kastell' ),
                        'group'       => esc_html__( 'Post Info', 'kastell' )
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'number_of_visible_items',
                        'heading'     => esc_html__( 'Number Of Visible Items', 'kastell' ),
                        'value'       => array(
                            esc_html__( 'One', 'kastell' )   => '1',
                            esc_html__( 'Two', 'kastell' )   => '2',
                            esc_html__( 'Three', 'kastell' ) => '3',
                            esc_html__( 'Four', 'kastell' )  => '4',
                            esc_html__( 'Five', 'kastell' )  => '5',
                            esc_html__( 'Six', 'kastell' )   => '6'
                        ),
                        'save_always' => true,
                        'group'       => esc_html__( 'Slider Settings', 'kastell' )
                    ),
				)
			)
		);
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'slider_type'        => 'carousel',
			'number_of_posts'    => '-1',
			'orderby'            => 'title',
			'order'              => 'ASC',
			'category'           => '',
			'image_size'         => 'full',
			'title_tag'          => 'h4',
			'title_transform'    => '',
            'excerpt_length'     => '50',
            'number_of_visible_items' => '3'
		);
		$params = shortcode_atts( $default_atts, $atts );
		
		$queryArray             = $this->generateBlogQueryArray( $params );
		$query_result           = new \WP_Query( $queryArray );
		$params['query_result'] = $query_result;
		
		$params['slider_type']    = ! empty( $params['slider_type'] ) ? $params['slider_type'] : $default_atts['slider_type'];
		$params['slider_classes'] = $this->getSliderClasses( $params );
		$params['slider_data']    = $this->getSliderData( $params );
		
		ob_start();
		
		kastell_mkdf_get_module_template_part( 'shortcodes/blog-slider/holder', 'blog', '', $params );
		
		$html = ob_get_contents();
		
		ob_end_clean();
		
		return $html;
	}
	
	public function generateBlogQueryArray( $params ) {
		$queryArray = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'orderby'        => $params['orderby'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'post__not_in'   => get_option( 'sticky_posts' )
		);
		
		if ( ! empty( $params['category'] ) ) {
			$queryArray['category_name'] = $params['category'];
		}
		
		return $queryArray;
	}
	
	public function getSliderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'mkdf-bs-' . $params['slider_type'];
		
		return implode( ' ', $holderClasses );
	}
	
	private function getSliderData( $params ) {
		$slider_data = array();
		
        $slider_data['data-number-of-items']   = $params['number_of_visible_items'];
        $slider_data['data-slider-margin']     = '20';
        $slider_data['data-slider-padding']    = 'no';
        $slider_data['data-enable-navigation'] = 'no';
        $slider_data['data-enable-pagination'] = 'yes';
		
		return $slider_data;
	}

    /**
     * Filter categories
     *
     * @param $query
     *
     * @return array
     */
    public function blogListCategoryAutocompleteSuggester( $query ) {
        global $wpdb;
        $post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

        $results = array();
        if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
            foreach ( $post_meta_infos as $value ) {
                $data          = array();
                $data['value'] = $value['slug'];
                $data['label'] = ( ( strlen( $value['category_title'] ) > 0 ) ? esc_html__( 'Category', 'kastell' ) . ': ' . $value['category_title'] : '' );
                $results[]     = $data;
            }
        }

        return $results;
    }

    /**
     * Find categories by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function blogListCategoryAutocompleteRender( $query ) {
        $query = trim( $query['value'] ); // get value from requested
        if ( ! empty( $query ) ) {
            // get category
            $category = get_term_by( 'slug', $query, 'category' );
            if ( is_object( $category ) ) {

                $category_slug = $category->slug;
                $category_title = $category->name;

                $category_title_display = '';
                if ( ! empty( $category_title ) ) {
                    $category_title_display = esc_html__( 'Category', 'kastell' ) . ': ' . $category_title;
                }

                $data          = array();
                $data['value'] = $category_slug;
                $data['label'] = $category_title_display;

                return ! empty( $data ) ? $data : false;
            }

            return false;
        }

        return false;
    }
}
