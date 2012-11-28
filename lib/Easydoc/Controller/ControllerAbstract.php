<?php
/**
 * This file is part of Easydoc.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

namespace Easydoc\Controller;

use Easydoc\View;
use Easydoc\Exception;

/**
 * The Abstract controller
 *
 * @namespace Easydoc\Controller
 * @package Easydoc
 */
class ControllerAbstract
{

    use \Easydoc\Toolbox;

    /**
     * The view
     *
     * @access protected
     * @var Easydoc\View
     */
    protected $_view;

    /**
     * Before the dispatch
     *
     * @access protected
     * @return void
     */
    protected function _preDispatch()
    {}

    /**
     * After the dispatch
     *
     * @access protected
     * @return void
     */
    protected function _postDispatch()
    {}

    /**
     * Dispatch the specific action
     *
     * @param string $action The action to dispatch
     * @access public
     * @return void
     */
    public function dispatch($action)
    {
        // Check the action
        $action = $action . 'Action';
        if (!method_exists($this, $action)) {
            throw new Exception('Action doesn\'t exists.');
        }

        // Dispatch it!
        $this->_preDispatch();
        $this->$action();
        $this->getResponse()->setBody($this->getView()->dispatch());
        $this->_postDispatch();
    }

    /**
     * Retrieve the view
     *
     * @access public
     * @return \Easydoc\View
     */
    public function getView()
    {
        if (is_null($this->_view)) {
            $this->_view = new View;
        }
        return $this->_view;
    }

}
