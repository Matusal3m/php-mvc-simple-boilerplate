<?php

namespace Database;

use Exception;
use PgSql\Connection;
use PgSql\Result;

class Database
{
    private readonly Connection $conn;

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

    public function query(string $query): Result
    {
        return pg_query($this->conn, $query);
    }

    public function queryParams(string $query, array &$params): Result
    {
        return pg_query_params($this->conn, $query, $params);
    }
}
