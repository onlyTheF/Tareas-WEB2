<?php
    class DBUtil {
        public static function getConnection() {
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'example3';
            $port = 3307;

            $dsn = "mysql:host=$server;dbname=$database;port=$port";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            try {
                $pdo = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }

            return $pdo;
        }
    }