<?php
require 'functions.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];

if ($id === '') {
    echo json_encode('Ошибка...');
    exit();
}

db_exec("DELETE FROM `tasks` WHERE `tasks`.`id` = $id");

echo json_encode('Удалено!');
