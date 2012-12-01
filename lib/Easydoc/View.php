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
     * Template to use
     *
     * @access protected
     * @var string
     */
    protected $_template = null;

    /**
     * Dispatch this view
     *
     * @access public
     * @return string
     */
    public function dispatch()
    {
        ob_start();
        $this->render();
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * Render the view without buffer
     *
     * @access public
     * @return void
     */
    public function render()
    {
        if (!is_null($this->_template)) {
            $file = App::getDesign()->getTemplatesPath() . '/' . $this->_template;
            if (is_file($file)) {
                include $file;
            }
        }

        return null;
    }

    /**
     * Set the template file
     *
     * @access public
     * @return \Easydoc\View
     */
    public function setTemplate($templateName = null)
    {
        $this->_template = $templateName;
        return $this;
    }


}
