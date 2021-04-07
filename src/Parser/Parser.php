<?php

namespace Fias\Parser;

use Fias\Dbf\Dbf;
use Fias\Dto\AddressObject;
use Generator;

class Parser implements ParserInterface
{
    private Dbf $database;

    public function __construct(Dbf $database)
    {
        $this->database = $database;
    }

    /**
     * @inheritDoc
     */
    public function each($callback): Generator
    {
        foreach ($this->database->getRecords() as $record) {
            yield $callback($this->fill($record));
        }
    }

    /**
     * @inheritDoc
     */
    public function fill(array $record): AddressObject
    {
        $address = new AddressObject();

        $columns = $this->database->getColumns();

        foreach ($record as $fieldId => $field) {
            $methodName = 'set' . $columns[$fieldId];
            if (method_exists($address, $methodName)) {
                $address->{$methodName}($field);
            }
        }

        return $address;
    }
}