<?php
# Любой проект должен начинаться с index.php
require __DIR__.'/vendor/autoload.php';

use Fias\Fias;

$addresses = Fias::getAddresses();