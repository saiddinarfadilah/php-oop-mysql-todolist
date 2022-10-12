<?php
require_once __DIR__ . '/../Entity/TodoList.php';
require_once __DIR__ . '/../Repository/TodoListRepository.php';
require_once __DIR__ . '/../Service/TodoListService.php';
require_once __DIR__ . '/../Config/Database.php';

use Config\Database;

use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;

function testShow():void
{
    $conn = Database::getConnection();
    $todolistRepository = new TodoListRepositoryImpl($conn);
    $todolistService = new TodoListServiceImpl($todolistRepository);
    $todolistService->add("Belajar PHP");
    $todolistService->add("Belajar PHP OOP");
    $todolistService->add("Belajar PHP Database");


    $todolistService->show();
}

function testAdd():void
{
    $conn = Database::getConnection();
    $todolistRepository = new TodoListRepositoryImpl($conn);
    $todolistService = new TodoListServiceImpl($todolistRepository);
    $todolistService->add("Belajar PHP");
    $todolistService->add("Belajar PHP OOP");
    $todolistService->add("Belajar PHP Database");

//    $todolistService->show();
}

function testDelete():void
{
    $conn = Database::getConnection();
    $todolistRepository = new TodoListRepositoryImpl($conn);
    $todolistService = new TodoListServiceImpl($todolistRepository);

    echo $todolistService->delete(5).PHP_EOL;
    echo $todolistService->delete(4).PHP_EOL;
    echo $todolistService->delete(3).PHP_EOL;
    echo $todolistService->delete(2).PHP_EOL;
    echo $todolistService->delete(1).PHP_EOL;

}
testShow();
//testAdd();
//testDelete();