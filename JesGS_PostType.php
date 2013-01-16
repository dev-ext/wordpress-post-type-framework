<?php
/**
 * WordPress_PostType_Framework
 *
 * @package WordPress_PostType_Framework
 * @subpackage JesGS_PostType
 * @author Jess Green <jgreen@psy-dreamer.com>
 * @version $Id$
 */
/**
 * JesGS_PostType
 *
 * @package JesGS_PostType
 * @author Jess Green <jgreen@psy-dreamer.com>
 */
class JesGS_PostType extends JesGS_FrameWork_Helper
{

    /**
     * PostType Capabilities
     * @var array
     */
    protected $_capabilities = array(
        'edit_post',
        'read_post',
        'delete_post',
        'edit_posts',
        'edit_others_posts',
        'publish_posts',
        'read_private_posts',
    );

    /**
     * Taxonomies attached to PostType
     *
     * @var array
     */
    protected $_taxonomies   = array();

    /**
     * Object arguments
     *
     * @var array
     */
    protected $_args         = array(
        'labels'               => '',
        'description'          => '',
        'public'               => true,
        'publicly_queryable'   => true,
        'exclude_from_search'  => false,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_position'        => 5,
        'menu_icon'            => '',
        'capability_type'      => 'post',
        //'capabilities'         => '',
        //'map_meta_cap'         => false,
        'hierarchical'         => false,
        'supports'             => '',
        'register_meta_box_cb' => '',
        'taxonomies'           => array(),
        'permalink_epmask'     => EP_PERMALINK,
        'has_archive'          => false,
        'rewrite'              => true,
        'can_export'           => true,
        'show_in_nav_menus'    => true,
    );

    /**
     * PostType supports
     * @var array
     */
    protected $_supports     = array('title');

    /**
     * @var View
     */
    protected $_view;

    /**
     * Object init
     *
     * @return void
     */
    public function init()
    {

        register_post_type($this->_name, $this->_args);

        add_action('template_include', array($this, 'template_include'));

    }


    /**
     * Set object arguments
     *
     * @param array $args Array of arguments. Optional
     * @return JesGS_PostType
     */
    public function set_arguments($args = array())
    {
        $args = array_merge($this->_args, $args);
        extract($args);

        $labels
            = array(
                'name'               => $this->_label_plural,
                'singular_name'      => $this->_label_single,
                'add_new'            => __('Add New ' . $this->_label_single, MYTHEME_TEXT_DOMAIN),
                'add_new_item'       => __('Add New ' . $this->_label_single, MYTHEME_TEXT_DOMAIN),
                'edit_item'          => __('Edit ' . $this->_label_single, MYTHEME_TEXT_DOMAIN),
                'view_item'          => __('View ' . $this->_label_single, MYTHEME_TEXT_DOMAIN),
                'search_items'       => __('Search ' . $this->_label_single, MYTHEME_TEXT_DOMAIN),
                'not_found'          => __($this->_label_single . ' not found', MYTHEME_TEXT_DOMAIN),
                'not_found_in_trash' => __($this->_label_single . ' not found in Trash', MYTHEME_TEXT_DOMAIN),
                'parent_item_colon'  => __($this->_label_single . ': ', MYTHEME_TEXT_DOMAIN),
            );

        $args =
            array(
                'labels'               => $labels,
                'description'          => $description,
                'public'               => $public,
                'publicly_queryable'   => $publicly_queryable,
                'exclude_from_search'  => $exclude_from_search,
                'show_ui'              => $show_ui,
                'show_in_menu'         => $show_in_menu,
                'menu_position'        => $menu_position,
                'menu_icon'            => $menu_icon,
                'capability_type'      => $capability_type,
                //'capabilities'         => $this->_capabilities,
                //'map_meta_cap'         => $map_meta_cap,
                'hierarchical'         => $hierarchical,
                'supports'             => $supports,
                'register_meta_box_cb' => array($this, 'meta_box_cb'),
                'taxonomies'           => $taxonomies,
                'permalink_epmask'     => EP_PERMALINK,
                'has_archive'          => $has_archive,
                'rewrite'              => $rewrite,
                'can_export'           => $can_export,
                'show_in_nav_menus'    => $show_in_nav_menus,
            );

        $this->_args = $args;

        return $this;
    }

    /**
     * Set object taxonomies
     *
     * @param array $taxonomies
     * @return JesGS_PostType
     */
    public function set_taxonomies($taxonomies)
    {
        $this->_taxonomies = $taxonomies;

        return $this;
    }

    /**
     * Set object supports
     * Must be called before set_arguments()
     *
     * @param array $supports
     * @return JesGS_PostType
     */
    public function set_support($supports)
    {
        $this->_supports = $supports;

        return $this;
    }

    /**
     * Modifies object templates.
     *
     * @param string|array $template Template to be included
     * @return string|array
     */
    public function template_include($template)
    {
        return $template;
    }

    /**
     * Meta-box callback
     *
     * @return void
     */
    public function meta_box_cb()
    {
        // override
    }

}
