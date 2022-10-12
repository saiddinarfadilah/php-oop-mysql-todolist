<?php

namespace Service;

use Entity\TodoList;
use Repository\TodoListRepository;

interface TodoListService
{
    function show():void;
    function add(string $todo):void;
    function delete(int $number):void;
}

class TodoListServiceImpl implements TodoListService
{
    private TodoListRepository $todoListRepository;

    public function __construct(TodoListRepository $todoListRepository)
    {
        $this->todoListRepository = $todoListRepository;
    }

    public function show(): void
    {
        echo "### TODOLIST ###".PHP_EOL;
        $todolist = $this->todoListRepository->findAll();
        foreach ($todolist as $number => $value){
            echo $value->getId(). ". ". $value->getTodo().PHP_EOL;
        }
    }
    public function add(string $todo): void
    {
        $todolist = new TodoList($todo);
        $this->todoListRepository->save($todolist);
        echo "Sukses menambah TODOLIST".PHP_EOL;
    }

    public function delete(int $number): void
    {
        if ($this->todoListRepository->delete($number)){
            echo "Sukses menghapus TODOLIST".PHP_EOL;
        } else {
            echo "Gagal menghapus TODOLIST".PHP_EOL;
        }
    }
}