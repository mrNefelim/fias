<?php

namespace Fias\Downloader;

class Downloader
{
    private string $tempDirectoryPath = '/tmp/fias';

    /**
     * @param string $fiasUrl
     * @return string
     * @throws DownloadException
     */
    public function download(string $fiasUrl): string
    {
        $siteParser = new SiteParser();
        $fiasBaseUrl = $siteParser->fiasActualFileUrl($fiasUrl);
        $archiveFileName = $this->createArchiveFileName();

        try {
            $this->wgetDownload($fiasBaseUrl, $archiveFileName);
            $this->unpack($archiveFileName, $this->tempDirectoryPath);
        } catch (DownloadException $exception) {
            throw new DownloadException('Ошибка скачивания: ' . $exception->getMessage());
        }
        return $this->tempDirectoryPath;
    }

    /**
     * @param string $tempDirectoryPath
     * @return $this
     */
    public function setTempDirectoryPath(string $tempDirectoryPath): self
    {
        $this->tempDirectoryPath = $tempDirectoryPath;

        return $this;
    }

    /**
     * Генерируем имя файла и создаем его в директории tempDirectoryPath
     *
     * @return string
     * @throws DownloadException
     */
    private function createArchiveFileName(): string
    {
        $archiveFileName = tempnam($this->tempDirectoryPath, 'fias_');


        if (!is_file($archiveFileName)) {
            throw new DownloadException('Не удалось удалось создать папку для скачивания архива');
        }

        chmod($archiveFileName, 0660);

        return $archiveFileName;
    }

    /**
     * Скачиваем файл с помощью программы wget
     *
     * @param string $link
     * @param string $filePath
     * @return bool
     * @throws DownloadException
     */
    private function wgetDownload(string $link, string $filePath): bool
    {
        $executeResponse = null;
        $executeCodeExit = 0;

        $executeCommand = '/usr/bin/env wget --quiet --output-document=' . escapeshellarg($filePath) . ' ' . escapeshellarg($link);
        exec($executeCommand, $executeResponse, $executeCodeExit);

        if ($executeCodeExit) {
            throw new DownloadException('Ошибка при попытке скачать архив базы ФИАС с сайта ведомства');
        }

        return true;
    }

    /**
     * Распаковываем архив с помощью программы unzip
     *
     * @param string $filePath
     * @param string $unpackDirectory
     * @return bool
     * @throws DownloadException
     */
    public function unpack(string $filePath, string $unpackDirectory): bool
    {
        /*
         * -d - set directory $dirName
         * -o - overwrite files
         * -CLL - set files names to lowercase
         * $archiveFileName - archive
         * '*addrobj*' - filter files in archive by name
         *
         * in console must be phrase "All OK"
        */
        $executeCommand = "/usr/bin/env unzip -CLL -o -d " . escapeshellarg($unpackDirectory) . " " . escapeshellarg($filePath) . " *addr*";

        $executeResponse = exec($executeCommand, $executeResponse, $executeCodeExit);
        if ($executeCodeExit) {
            throw new DownloadException('Ошибка при попытке распаковать архив базы ФИАС на диске');
        }

        return true;
    }
}