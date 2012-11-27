<?php
/**
 * This file is part of Easydoc.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

namespace Easydoc\Http;

use Jacquesbh\Eater;

/**
 * The HTTP Request
 *
 * @namespace Easydoc\Http
 * @package Easydoc
 */
class Request extends Eater
{

    /**
     * Init the router
     *
     * @access public
     * @return Easyboc\Http\Request
     */
    public function init()
    {
        // The URI
        $this->setUri($_SERVER['REQUEST_URI']);
        $this->setParts(new Eater(parse_url($this->getUri())));

        // The standard route
        $request = $this->getParts()->getPath();
        if (preg_match('`^(/[^/]*)+$`', $request)) {
            if (empty($request)) {
                $routes = array();
            } else {
                $routes = explode('/', trim($request, '/'));
            }

            // The module/controller/action
            $this->setModuleName(array_shift($routes));
            $this->setControllerName(array_shift($routes));
            $this->setActionName(array_shift($routes));

            // The params
            if (count($routes)) {
                while (null !== ($v = array_shift($routes))) {
                    $request->setParam($v, array_shift($routes));
                }
            }
        }

        return $this;
    }

}
