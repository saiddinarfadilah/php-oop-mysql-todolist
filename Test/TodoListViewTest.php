<?php

require_once __DIR__ . '/../Entity/TodoList.php';
require_once __DIR__ . '/../Repository/TodoListRepository.php';
require_once __DIR__ . '/../Service/TodoListService.php';
require_once __DIR__ . '/../View/TodoListView.php';
require_once __DIR__ . '/../Helper/InputHelper.php';

use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

function testViewShow():void
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->add("Belajar PHP");
    $todoListService->add("Belajar PHP OOP");
    $todoListService->add("Belajar PHP Database");

    $todoListView->show();
}

//testViewShow();

function testViewAdd():void
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->add("Belajar PHP");
    $todoListService->add("Belajar PHP OOP");
    $todoListService->add("Belajar PHP Database");
    $todoListService->show();

    $todoListView->add();
    $todoListService->show();
}

//testViewAdd();

function testViewDelete():void
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->add("Belajar PHP");
    $todoListService->add("Belajar PHP OOP");
    $todoListService->add("Belajar PHP Database");

    $todoListService->show();
    $todoListView->delete();
    $todoListService->show();
}

testViewDelete();