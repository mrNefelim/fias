<?php

namespace Fias\Downloader;

use ZipArchive;

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
        $saveSuccess = file_put_contents($filePath, file_get_contents($link));

        if (!$saveSuccess) {
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
        try {
            $fileList = [];
            $zip = new ZipArchive();

            if (!$zip->open($filePath) == TRUE) {
                throw new DownloadException('Ошибка при попытке открыть архив базы ФИАС на диске');
            }

            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                # Собираем только файлы с addr в названии - это адреса
                if (stripos($filename, 'addr') !== false) {
                    $fileList[] = $filename;
                }
            }

            $zip->extractTo($unpackDirectory, $fileList);
            $zip->close();
            unlink($filePath);
        } catch (\Exception $exception) {
            throw new DownloadException('Ошибка при попытке распаковать архив базы ФИАС на диске: ' . $exception->getMessage());
        }

        return true;
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
}