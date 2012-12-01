<?php
/**
 * This file is part of Easydoc.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

namespace Easydoc;

/**
 * Design class
 *
 * @namespace Easydoc
 * @package Easydoc
 */
class Design
{

    /**
     * The design area
     *
     * @access protected
     * @var string
     */
    protected $_area = 'frontend';

    /**
     * The design package
     *
     * @access protected
     * @var string
     */
    protected $_package = 'default';

    /**
     * Retrieve the templates path
     *
     * @access public
     * @return string
     */
    public function getTemplatesPath()
    {
        return App::getBaseDir('design') . DS . $this->_area . DS . $this->_package . DS . 'templates' . DS;
    }

}
