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
 *
 * @author Jess Green <jgreen at psy-dreamer.com>
 */
abstract class JesGS_PostType_EditColumns
{

    protected static $_post_type;
    
    /**
     * Factory method for creating calls to the column hooks
     * 
     * @param string $post_type Name of post-type
     * @return void
     */
    static function init_columns_factory($post_type)
    {
        self::$_post_type = $post_type;
        
    }


    /**
     * Abstract method. Handles adding the post column headers
     * 
     * @param array $columns
     * @return array Array of modified columns. Should be a key => value pair
     */
    abstract public function manage_post_columns($columns);
    
    /**
     * Abstract method. Adds column data
     * 
     * @param string $column Name of column to add data to
     * @param int $post_id Post ID of current post row
     * 
     * @return void
     */
    abstract public function column_data($column, $post_id);
    
    /**
     * Set up sortable columns
     * 
     * @param array Default sortable columns. Usually $columns['title']
     * @return array Columns to sort-by, see http://goo.gl/CO8bj for code examples
     */
    abstract public function register_sortable_columns($columns);
    
}
