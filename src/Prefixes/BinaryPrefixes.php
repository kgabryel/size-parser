<?php

namespace Frankie\SizeParser\Prefixes;

use Ds\Set;

class BinaryPrefixes extends Prefixes
{
    public function getTypes(): Set
    {
        return new Set(
            [
                'B',
                'KiB',
                'MiB',
                'GiB',
                'TiB',
                'PiB',
                'EiB',
                'ZiB',
                'YiB'
            ]
        );
    }

    public function getBase(): int
    {
        return 1024;
    }
}