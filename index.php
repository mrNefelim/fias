<?php
# Любой проект должен начинаться с index.php
require __DIR__ . '/vendor/autoload.php';

use Fias\Dbf\CouldNotConnectException;
use Fias\Dto\AddressObject;
use Fias\Fias;
use Fias\FiasException;

try {
    /**
     * @var AddressObject $address
     */
    foreach (Fias::getActiveAddresses() as $address) {
        echo $address->getFORMALNAME() . PHP_EOL;
    };
} catch (CouldNotConnectException | FiasException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}