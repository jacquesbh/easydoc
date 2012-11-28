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
 * The Toolbox !
 *
 * @namespace Easydoc
 * @package Easydoc
 */
trait Toolbox
{

    /**
     * Retrieve the request
     *
     * @acces public
     * @return Easydoc\Http\Request
     */
    public function getRequest()
    {
        return App::getRequest();
    }

    /**
     * Retrieve the response
     *
     * @acces public
     * @return Easydoc\Http\Response
     */
    public function getResponse()
    {
        return App::getResponse();
    }

    /**
     * Retrieve an URL
     *
     * @param string $path
     * @param array $params
     * @access public
     * @return string
     */
    public function getUrl($path, $params = [])
    {
        return App::getUrl($path, $params);
    }
}
