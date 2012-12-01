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
        $this->_postDispatch();
    }

    /**
     * Load the view
     *
     * @access public
     * @render \Easydoc\Controller\ControllerAbstract
     */
    public function loadView()
    {
        if (is_null($this->_view)) {
            $this->_view = new View;
        }
        return $this;
    }

    /**
     * Render the view in response
     *
     * @thrown \Easydoc\Exception
     * @access public
     * @return \Easydoc\Controller\ControllerAbstract
     */
    public function renderView()
    {
        if (is_null($this->_view)) {
            throw new Exception("You need to load the view before render it.");
        }
        $this->getResponse()->setBody($this->getView()->dispatch());
        return $this;
    }

    /**
     * Retrieve the view
     *
     * @thrown \Easydoc\Exception
     * @access public
     * @return \Easydoc\View
     */
    public function getView()
    {
        if (is_null($this->_view)) {
            throw new Exception("You need to load the view before get it.");
        }
        return $this->_view;
    }

}
