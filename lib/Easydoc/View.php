<?php
/**
 * This file is part of Easydoc.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

namespace Easydoc;

use Jacquesbh\Eater;

/**
 * The View :)
 *
 * @namespace Easydoc
 * @package Easydoc
 */
class View extends Eater
{

    use \Easydoc\Toolbox;

    /**
     * Dispatch this view
     *
     * @access public
     * @return string
     */
    public function dispatch()
    {
        ob_start();
        echo 'Hello World! (again...)';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

}
