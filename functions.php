<?php
require 'config.php';

function db()
{
    try {
        return new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "; charset=utf8", DB_USER, DB_PASS, [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
function db_query($sql = '')
{
    if (empty($sql)) return false;

    return db()->query($sql);
}
function db_exec($sql = '')
{
    if (empty($sql)) return false;

    return db()->exec($sql);
}
