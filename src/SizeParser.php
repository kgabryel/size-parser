<?php

namespace Frankie\SizeParser;

use Ds\Set;
use Frankie\SizeParser\Prefixes\Prefixes;

final class SizeParser
{
    private Set $types;
    private int $size;
    private string $parsed;
    private string $prefix;
    private int $precision;
    private int $base;

    public function __construct(Prefixes $prefixes, int $precision = 2)
    {
        $this->size = 0;
        $this->prefix = '';
        $this->precision = $precision;
        $this->parsed = $prefixes->getDefaultValue();
        $this->types = $prefixes->getTypes();
        $this->base = $prefixes->getBase();
    }

    public function setSize(int $size): self
    {
        $this->size = $size;
        if ($this->size < 0) {
            $this->prefix = '-';
            $this->size *= -1;
        }
        return $this;
    }

    public function parse(): self
    {
        if ($this->size < $this->base) {
            $this->parsed = $this->size . $this->types->get(0);
            return $this;
        }
        $index = (int)log($this->size, $this->base);
        $tmp = $this->base ** $index;
        $rest = $this->size - $tmp;
        $integer = ($this->size - $rest) / $tmp;
        $percent = round(($rest / $tmp) * 100);
        if ($percent < 10) {
            $percent = '0' . $percent;
        }
        if ($percent === 0) {
            $this->parsed = $integer . $this->types->get($index);
        } else {
            $this->parsed = round(
                    $integer . '.' . $percent,
                    $this->precision
                ) . $this->types->get($index);
        }
        return $this;
    }

    public function getParsed(): string
    {
        return $this->prefix . $this->parsed;
    }
}
