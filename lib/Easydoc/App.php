<?php

namespace Easydoc;

define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('BP', dirname(dirname(dirname(__FILE__))));

use Easydoc\Core\Model\Config;

class App
{

    private static $_instance;

    private static $_config;

    private function __construct()
    {
    }

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    static public function run()
    {
        $app = self::instance();
        $app->_initConfig();
        $app->_initRoutes();

        return $app;
    }

    protected function _initRoutes()
    {}

    protected function _initConfig()
    {
        self::$_config = new Config;
        $this->getConfig()->loadModules();
        return $this;
    }

    static public function getConfig()
    {
        return self::$_config;
    }

    public function dispatch()
    {
        throw new \Exception('dispatch');
    }

}
