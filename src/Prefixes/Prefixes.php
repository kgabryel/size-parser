<?php

namespace Frankie\SizeParser\Prefixes;

use Ds\Set;

abstract class Prefixes
{
    public function getDefaultValue():string{
        return '0B';
    }
    abstract public function getTypes():Set;
    abstract public function getBase():int;
}