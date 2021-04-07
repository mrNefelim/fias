<?php

namespace Fias\Dbf;

use Generator;

class Dbf
{
    /**
     * @var null|resource
     */
    private $connection = null;

    /**
     * @var array
     */
    private array $headers = [];

    /**
     * @param string|null $fileName
     * @throws CouldNotConnectException
     */
    public function __construct(?string $fileName)
    {
        if ($fileName) {
            $this->connect($fileName);
        }
    }

    /**
     * @param string $fileName
     * @return $this
     * @throws CouldNotConnectException
     */
    public function connect(string $fileName): Dbf
    {
        $this->connection = dbase_open($fileName, 0);
        if (!$this->connection) {
            throw new CouldNotConnectException('Не удается открыть базу данных ' . $fileName);
        }
        $this->headers = dbase_get_header_info($this->connection);
        return $this;
    }

    public function __destruct()
    {
        if ($this->connection) {
            dbase_close($this->connection);
        }
    }

    /**
     * @return string[]
     */
    public function getColumns(): array
    {
        return array_column($this->getHeaders(), 'name');
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return Generator
     */
    public function getRecords(): Generator
    {
        $recordsCount = $this->getRecordsCount();
        for ($i = 1; $i <= $recordsCount; $i++) {
            yield $this->getRecordById($i);
        }
    }

    /**
     * @return int
     */
    public function getRecordsCount(): int
    {
        return dbase_numrecords($this->connection);
    }

    /**
     * @param int $id
     * @return array
     */
    public function getRecordById(int $id): array
    {
        $record = dbase_get_record($this->connection, $id);

        foreach ($record as $key => $field) {
            foreach ($this->headers as $header) {
                if ($header['type'] == 'character') {
                    $record[$key] = trim(iconv('CP866', 'UTF-8', $field));
                }
            }
        }

        return $record;
    }
}