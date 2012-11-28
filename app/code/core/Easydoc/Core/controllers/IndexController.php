<?php
/**
 * This file is part of Easydoc.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

namespace Easydoc\Core;

use Easydoc\Controller\ControllerAbstract;

/**
 * The Core IndexController
 *
 * @package Easydoc
 * @namespace Easydoc\Core
 */
class IndexController extends ControllerAbstract
{

    /**
     * Main action :)
     *
     * @access public
     * @return void
     */
    public function indexAction()
    {
        echo 'Hello World!';
    }

}
