<?php

namespace Fias\Downloader;

use DateTime;

class SiteParser
{
    /**
     * Ссылка на актуальный файл обновления в формате xml
     *
     * @param string $fiasPageUrl
     * @return string
     * @throws DownloadException
     */
    public function fiasActualFileUrl(string $fiasPageUrl): string
    {
        $html = file_get_contents($fiasPageUrl);

        if (empty($html)) {
            throw new DownloadException('Не удалось спарсить html-страницу с базами ФИАС');
        }

        $values = $this->parse($html);

        if (empty($values)) {
            throw new DownloadException('Не найдено ссылок на архивы с базами ФИАС');
        }

        $hashList = $this->getFiasFileLinks($values);

        if (empty($hashList)) {
            throw new DownloadException('Не найдено ссылок на архивы с базами ФИАС');
        }

        $lastDate = $this->getLastFiasDownloadDate($hashList);

        if (strtotime($lastDate) <= 0) {
            throw new DownloadException('Не удалось разобрать дату формирования базы ФИАС');
        }

        return $hashList[$lastDate];
    }

    /**
     * Достаем из html список файлов FIAS для скачивания
     *
     * @param string $html
     * @return array
     */
    private function parse(string $html): array
    {
        // парсим скрипт, в котором лежит нужная нам структура даннных
        preg_match('/<div id="GridDeltaFias" name="GridDeltaFias"><\/div><script>(.*?)<\/script>/', $html, $matches);
        $jsonStructure = preg_replace('/.*"Data":\[(.*?)],"Total".*/u', '[$1]', $matches[1]);

        return json_decode($jsonStructure, true) ?? [];
    }

    /**
     * Формируем список соответствий дат и хэшей файлов
     *
     * @param array $values
     * @return array
     */
    private function getFiasFileLinks(array $values): array
    {
        $hashList = [];

        foreach ($values as $value) {
            $value['date'] = preg_replace('/БД ФИАС от /ui', '', $value['Version']);

            if ($date = DateTime::createFromFormat('d.m.Y', $value['date'])) {
                $link = preg_replace(
                    "/.*href='(.*)?'.*/ui",
                    '$1',
                    $value['Columns'][0]
                );

                $link = str_replace('delta_', '', $link);

                $hashList[$date->format('Y-m-d')] = $link;
            }
        }

        return $hashList;
    }

    /**
     * Выбираем самую свежую дату из списка файлов
     *
     * @param array $hashList
     * @return string
     */
    private function getLastFiasDownloadDate(array $hashList): string
    {
        ksort($hashList);
        $lastDate = array_key_last($hashList);

        return $lastDate ?? '';
    }
}