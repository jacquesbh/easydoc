<?php
/**
 * This file is part of Easydoc.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

namespace Easydoc\Core\Model;

use Easydoc\App;
use Jacquesbh\Eater;

/**
 * The config
 *
 * @package Easydoc
 * @namespace \Easydoc\Core\Model
 */
class Config extends Eater
{

    /**
     * The config
     *
     * @access protected
     * @var \Jacquesbh\Eater
     */
    protected $_config;

    /**
     * Init the configuration
     *
     * @access public
     * @return \Easydoc\Core\Model\Config
     */
    public function init()
    {
        $this->_initModulesConfiguration();
    }

    /**
     * Load the modules configuration
     *
     * @access protected
     * @return \Easydoc\Core\Model\Config
     */
    protected function _initModulesConfiguration()
    {
        $files = glob($this->getBaseDir('code') . '/*/*/etc/config.json');

        foreach ($files as $file) {
            $this->merge(new Eater(json_decode(file_get_contents($file), true)));
        }

        return $this;
    }

}
