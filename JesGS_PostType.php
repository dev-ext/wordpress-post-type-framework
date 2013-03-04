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
 * @todo Add capabilities, per issue #4
 * @todo Remove meta_box_cb method, per issue #5
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
        'hierarchical'         => false,
        'supports'             => false,
        'register_meta_box_cb' => null,
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
     * Object init
     *
     * @return void
     */
    public function init()
    {

        register_post_type($this->_name, $this->_args);

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
                'add_new'            => __('Add New ' . $this->_label_single, $this->_textdomain),
                'add_new_item'       => __('Add New ' . $this->_label_single, $this->_textdomain),
                'edit_item'          => __('Edit ' . $this->_label_single, $this->_textdomain),
                'view_item'          => __('View ' . $this->_label_single, $this->_textdomain),
                'search_items'       => __('Search ' . $this->_label_single, $this->_textdomain),
                'not_found'          => __($this->_label_single . ' not found', $this->_textdomain),
                'not_found_in_trash' => __($this->_label_single . ' not found in Trash', $this->_textdomain),
                'parent_item_colon'  => __($this->_label_single . ': ', $this->_textdomain),
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
                'hierarchical'         => $hierarchical,
                'supports'             => $supports,
                'register_meta_box_cb' => $register_meta_box_cb,
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
     * Meta-box callback
     *
     * @return void
     */
    public function meta_box_cb()
    {
        // override
    }

}
