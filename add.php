<?php
require 'functions.php';

$data = json_decode(file_get_contents('php://input'), true);

$taskText = $data['text'];

if ($taskText === '') {
    echo json_encode('Пустая строка, повторите...');
    exit();
}

db_exec("INSERT INTO `tasks` (`task`) VALUES ('$taskText');");

echo json_encode('Отправленно!');
