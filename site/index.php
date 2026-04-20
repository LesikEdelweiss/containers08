<?php

require_once __DIR__ . '/modules/database.php';
require_once __DIR__ . '/modules/page.php';
require_once __DIR__ . '/config.php';

// подключение к БД
$db = new Database($config["db"]["path"]);

// шаблон страницы
$page = new Page(__DIR__ . '/templates/index.tpl');

// защита от отсутствия параметра
$pageId = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// получение данных
$data = $db->Read("page", $pageId);

// если страницы нет
if (!$data) {
    $data = [
        "title" => "Not found",
        "content" => "Page not found"
    ];
}

// вывод
echo $page->Render($data);