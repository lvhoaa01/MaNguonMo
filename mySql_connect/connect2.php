<?php

declare(strict_types=1);

namespace mySql_connect;

use PDO;

final class Connection
{
  public static function create(): PDO
  {
    $host = 'localhost';
    $port = '3306';
    $database = 'quanly_ban_sua';
    $username = 'root';
    $password = '';
    return new PDO(
      "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4", // DSN
      $username,
      $password,
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
      ],
    );
  }
}
