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
 * The HTTP Response
 *
 * @namespace Easydoc\Http
 * @package Easydoc
 */
class Response extends Eater
{

    /**
     * Constructor
     * <p>Prepare the headers</p>
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->setHeaders(new Eater(['Content-Type' => 'text/html; charset=utf-8']));
        return parent::__construct();
    }

    /**
     * Send the response
     * <p>Send headers, then body</p>
     *
     * @access public
     * @return Easydoc\Http\Response
     */
    public function send()
    {
        // Send the headers
        $this->sendHeaders();

        // Send content
        echo $this->getBody();

        return $this;
    }

    /**
     * Send the headers
     *
     * @access public
     * @return Easydoc\Http\Response
     */
    public function sendHeaders()
    {
        foreach ($this->getHeaders() as $header => $value) {
            header($header, $value);
        }

        return $this;
    }

    /**
     * Reset the headers
     *
     * @access public
     * @return Easydoc\Http\Response
     */
    public function resetHeaders()
    {
        $this->getHeaders()->setData([]);
        return $this;
    }

    /**
     * Set a header
     *
     * @param string $name The header name
     * @param string $value The header value
     * @access public
     * @return Easydoc\Http\Response
     */
    public function setHeader($name, $value)
    {
        $this->getHeaders()->setData($name, $value);
        return $this;
    }

}
