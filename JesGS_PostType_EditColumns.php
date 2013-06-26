<?php
/**
 * wordpress-post-type-framework
 *
 * @package JesGs_PostType_EditColumns
 * @author Jess Green <jgreen at psy-dreamer.com>
 * @version $Id$
 * @license GPL
 */

/**
 * JesGs_PostType_EditColumns
 * PHP 5.3 and newer.
 *
 * @author Jess Green <jgreen at psy-dreamer.com>
 */
abstract class JesGS_PostType_EditColumns
{
    /**
     * Post-type string
     * 
     * @var string
     */
    protected $_post_type;
    
    /**
     * 
     * @param string $post_type
     */
     public static function init_columns_factory($post_type)
     {
         $called_class = get_called_class();
         if ($called_class == false)
             return false;
         
        add_filter("manage_edit-{$post_type}_columns", array($called_class, 'manage_post_columns'));
        add_action("manage_book_{$post_type}_custom_column" , array($called_class, 'column_data'), 10, 2 );
        add_filter("manage_edit-{$post_type}_sortable_columns", array($called_class, 'register_sortable_columns'));         
     }

    /**
     * Abstract method. Handles adding the post column headers
     *
     * @param array $columns
     * @return array Array of modified columns. Should be a key => value pair
     */
    abstract public static function manage_post_columns($columns);

    /**
     * Abstract method. Adds column data
     *
     * @param string $column Name of column to add data to
     * @param int $post_id Post ID of current post row
     *
     * @return void
     */
    abstract public static function column_data($column, $post_id);

    /**
     * Set up sortable columns
     *
     * @param array Default sortable columns. Usually $columns['title']
     * @return array Columns to sort-by, see http://goo.gl/CO8bj for code examples
     */
    abstract public static function register_sortable_columns($columns);

}
