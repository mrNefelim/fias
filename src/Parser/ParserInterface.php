<?php

namespace Fias\Parser;

use Fias\Dto\AddressObject;
use Generator;

interface ParserInterface
{
    /**
     * @param callable $callback
     * @return Generator
     */
    public function each(callable $callback): Generator;

    /**
     * @param array $record
     * @return AddressObject
     */
    public function fill(array $record): AddressObject;
}