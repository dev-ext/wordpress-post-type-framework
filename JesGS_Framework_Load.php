<?php
/**
 * WordPress_PostType_Framework
 *
 * @package WordPress_PostType_Framework
 * @subpackage JesGS_Framework_Load.php
 * @author Jess Green <jgreen@psy-dreamer.com
 * @version $Id$
 */
/**
 * JesGS_Framework_Load
 *
 * @package JesGS_Framework_Load
 * @author Jess Green <jgreen@psy-dreamer.com
 */
class JesGS_Framework_Load
{
    /**
     * Directory that framework is stored in. Can be changed.
     */
    const FRAMEWORK_DIRECTORY = '/modules/wordpress-post-type-framework';

    /**
     * PHP5 Constructor function
     *
     * @return void
     */
    public function __construct()
    {
        // Change these
        define('FRAMEWORK_DIR_PATH', get_template_directory() . self::FRAMEWORK_DIRECTORY);
        define('FRAMEWORK_DIR_URL', get_template_directory_uri() . self::FRAMEWORK_DIRECTORY);

        spl_autoload_register(array($this, '__autoload'));
    }

    /**
     * Autoload
     *
     * @return void
     */
    protected function __autoload($class)
    {
        if (strpos($class, 'JesGS') !== false) {
            include( FRAMEWORK_DIR_PATH . '/' . $class . '.php');
        }
    }
}

new JesGS_Framework_Load(); // Ideally, this should take place in an action, like after_theme_setup
