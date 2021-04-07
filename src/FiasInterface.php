<?php

namespace Fias;

use Fias\Dto\AddressObject;
use Generator;

interface FiasInterface
{
    /**
     * @return Generator
     * @throws FiasException
     */
    public static function getAddresses(): Generator;

    /**
     * @return Generator
     * @throws FiasException
     */
    public static function getActiveAddresses(): Generator;

    /**
     * @param string $url
     * @return array
     * @throws FiasException
     */
    public static function downloadFileList(string $url): array;

    /**
     * @param string $fileName
     * @return Generator
     */
    public static function parse(string $fileName): Generator;

    /**
     * @param AddressObject $addressObject
     * @return bool
     */
    public static function isActive(AddressObject $addressObject): bool;
}