<?php
/**
 * This file is part of Easydoc.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

namespace Easydoc;

define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('BP', dirname(dirname(dirname(__FILE__))));

use Easydoc\Core\Model\Config;
use Easydoc\Exception;

/**
 * This is the Easydoc Application :)
 * @package Easydoc
 * @singleton
 */
class App
{

    /**
     * The App instance
     *
     * @access private
     * @var \Easydoc\App
     */
    private static $_instance;

    /**
     * The configuration
     *
     * @access private
     * @var \Easydoc\Core\Model\Config
     */
    private static $_config;

    /**
     * Private constructor : Singleton
     *
     * @access private
     * @return \Easydoc\App
     */
    private function __construct()
    {}

    /**
     * Retrieve the Application instance
     *
     * @access public
     * @static
     * @return \Easydoc\App
     */
    static public function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Run the application
     * <p>Init the application (config, routes...)</p>
     *
     * @access public
     * @static
     * @return \Easydoc\App
     */
    static public function run()
    {
        $app = self::instance();
        $app->_initConfig();
        $app->_initRouter();

        return $app;
    }

    /**
     * Init the routes
     *
     * @access protected
     * @return \Easydoc\App
     */
    protected function _initRouter()
    {
        return $this;
    }

    /**
     * Init the configuration
     *
     * @access protected
     * @return \Easydoc\App
     */
    protected function _initConfig()
    {
        self::$_config = new Config;
        $this->getConfig()->init();
        return $this;
    }

    /**
     * Retrieve the configuration
     *
     * @access public
     * @static
     * @return \Easydoc\Core\Model\Config
     */
    static public function getConfig()
    {
        return self::$_config;
    }

    /**
     * Retrieve a specific directory
     *
     * @access public
     * @static
     * @return string
     */
    static public function getBaseDir($type = null)
    {
        switch ($type) {
        case 'code':
            return BP . '/app/code';
        case 'lib':
            return BP . '/lib';
        default:
            return BP;
        }
    }

    /**
     * Dispatch the application
     *
     * @access public
     * @return void
     */
    public function dispatch()
    {
        throw new Exception('dispatch');
    }

}
