<?php

namespace Fias;

use Fias\Dbf\CouldNotConnectException;
use Fias\Dbf\Dbf;
use Fias\Downloader\Downloader;
use Fias\Downloader\DownloadException;
use Fias\Dto\AddressObject;
use Fias\Parser\Parser;
use Generator;

class Fias implements FiasInterface
{
    /**
     * @inheritDoc
     * @throws CouldNotConnectException
     */
    public static function getAddresses(): Generator
    {
        $fileList = Fias::downloadFileList('https://fias.nalog.ru/Updates');

        foreach ($fileList as $item) {
            foreach (Fias::parse($item) as $addressObject) {
                yield $addressObject;
            }
        }
    }

    /**
     * @inheritDoc
     */
    public static function downloadFileList(string $url): array
    {
        try {
            $folderPath = (new Downloader())->download($url);

            return array_map(function ($link) use ($folderPath) {
                return $folderPath . '/' . $link;
            }, array_diff(scandir($folderPath), ['..', '.']));
        } catch (DownloadException $exception) {
            throw new FiasException($exception->getMessage());
        }
    }

    /**
     * @inheritDoc
     * @throws CouldNotConnectException
     */
    public static function parse(string $fileName): Generator
    {
        if (!is_file($fileName)) {
            return [];
        }

        $dataBase = new Dbf($fileName);

        return (new Parser($dataBase))->each(function ($fileName) {
            return $fileName;
        });
    }

    /**
     * @inheritDoc
     * @throws CouldNotConnectException
     */
    public static function getActiveAddresses(): Generator
    {
        $fileList = Fias::downloadFileList('https://fias.nalog.ru/Updates');

        foreach ($fileList as $item) {
            foreach (Fias::parse($item) as $addressObject) {
                if (Fias::isActive($addressObject)) {
                    yield $addressObject;
                }
            }
        }
    }

    /**
     * @inheritDoc
     */
    public static function isActive(AddressObject $addressObject): bool
    {
        return $addressObject->getLIVESTATUS() == 1
            && $addressObject->getACTSTATUS() == 1;
    }
}