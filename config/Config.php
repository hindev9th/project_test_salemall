<?php
declare(strict_types=1);
namespace Config;
use PDO;
use PDOException;

class Config
{
    private string $hostName = 'localhost';
    private string $databaseName = 'salemall_test';
    private string $username = 'root';
    private string $password = '';
    private string $baseUrl = 'http://salemall.test/';
    private PDO $conn;
    
    private static ?Config $config = null;

    private function __construct(){}

    /**
     *
     * @return Config
     */
    public static function gI(): Config
    {
        if (Config::$config == null){
            Config::$config = new Config();
        }
        return Config::$config;
    }

    public function connect()
    {
        try {
            $this->conn =  new PDO("mysql:host=$this->hostName;myDB=$this->databaseName",$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->query("use {$this->databaseName}");
            return $this->conn;
        }catch (PDOException $e){
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function close()
    {
        try {
            $this->conn = null;
        }catch (PDOException $e){
            die("Close failed: {$e->getMessage()}");
        }
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

}