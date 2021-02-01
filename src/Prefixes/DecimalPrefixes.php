<?php

namespace Frankie\SizeParser\Prefixes;

use Ds\Set;

class DecimalPrefixes extends Prefixes
{
    public function getTypes(): Set
    {
        return new Set(
            [
                'B',
                'kB',
                'MB',
                'GB',
                'TB',
                'PB',
                'EB',
                'ZB',
                'YB'
            ]
        );
    }

    public function getBase(): int
    {
        return 1000;
    }
}