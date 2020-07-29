<?php

class Database
{

    private string $host = "localhost";
    private string $port = "5432";
    private string $username = "root";
    private string $password = "123456";
    private string $database = "market";
    private $connection = null;

    public function __construct()
    {   
        $this->connect();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function connect()
    {
        $connectionString = "host={$this->host} port={$this->port} dbname={$this->database} user={$this->username} password={$this->password}";
        $this->connection = pg_connect($connectionString);
    }
}
