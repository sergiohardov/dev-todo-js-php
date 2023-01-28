<?php require 'functions.php'; ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список Дел</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main class="todo">
        <div class="container">
            <h1 class="todo__title">Список Дел</h1>

            <form class="todo__form">
                <input type="text" class="todo__form-input" placeholder="Нужно сделать...">
                <button type="submit" class="todo__form-button btn btn-success">Отправить</button>
            </form>

            <ul class="todo__list"></ul>
        </div>
    </main>

    <script src="js/script.js"></script>
</body>

</html>