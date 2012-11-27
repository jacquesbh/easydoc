<?php

namespace Easydoc\Core\Model;

use Easydoc\App;
use Jacquesbh\Eater;

class Config extends Eater
{

    protected $_config;

    public function loadModules()
    {
        $files = glob($this->getBaseDir('code') . '/*/*/etc/config.json');

        foreach ($files as $file) {
            $this->merge(new Eater(json_decode(file_get_contents($file), true)));
        }

        return $this;
    }

    public function getBaseDir($type = null)
    {
        switch ($type) {
        case 'code':
            return BP . '/app/code';
        case 'lib':
            return BP . '/lib';
        default:
            return BP;
        }
    }

}
