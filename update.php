<?php
require 'functions.php';

$tasks = db_query("SELECT * FROM `tasks`;")->fetchAll();

$arr = [];
foreach ($tasks as $task) {
    $arr[] = $task;
}

echo json_encode($arr);
