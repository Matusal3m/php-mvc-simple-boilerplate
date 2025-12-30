<?php

namespace Database;

use Exception;
use PgSql\Connection;
use PgSql\Result;

class Database
{
    private readonly Connection $conn;

    public string $host;

    public string $port;

    public string $dbname;

    public string $user;

    public string $password;

    public function __construct(string $host, string $port, string $dbname, string  $user, string $password)
    {
        $this->conn = pg_connect("
            host=$host 
            port=$port 
            dbname=$dbname 
            user=$user
            password=$password
        ");

        if (!$this->conn) {
            throw new Exception('Error on database connection');
        }
    }

    /**
     * @return array|bool[]
     */
    public function query(string $query): array
    {
        $rows = pg_query($this->conn, $query);
        if (!$rows) return [];
        return $this->resultToArray($rows);
    }

    /**
     * @param array<int,mixed> $params
     * @return array|bool[]
     */
    public function queryParams(string $query, array $params): array
    {
        $rows = pg_query_params($this->conn, $query, $params);
        if (!$rows) return [];
        return $this->resultToArray($rows);
    }

    /**
     * @param array<int,mixed> $params
     */
    public function queryParamsFirst(string $query, array $params): mixed
    {
        $rows = pg_query_params($this->conn, $query, $params);
        if (!$rows) return [];
        return $this->resultToArray($rows)[0];
    }

    /**
     * @return array|bool[]
     */
    private function resultToArray(Result $result): array
    {
        $rows = [];
        while ($row = pg_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
