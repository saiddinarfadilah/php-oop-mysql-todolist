<?php

namespace View;

use Service\TodoListService;
use Helper\InputHelper;

class TodoListView
{
    private TodoListService $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }

    function show():void
    {
        while (true){
            $this->todoListService->show();
            echo "### MENU ###" . PHP_EOL;
            echo "1. Add Todo" . PHP_EOL;
            echo "2. Delete Todo" . PHP_EOL;
            echo "x. Exit" . PHP_EOL;

            $switch = InputHelper::input("Change : ");
            if ($switch == "1"){
                $this->add();
            } else if ($switch == "2"){
                $this->delete();
            } else if ($switch == "x"){
                break;
            } else {
                echo "Change no understand..., please try again" . PHP_EOL;
            }
        }
        echo "See you again..." . PHP_EOL;
    }

    function add():void
    {
        echo "### ADD TODOLIST ###".PHP_EOL;

        $todo = InputHelper::input("Todo (press x to exit) : ");

        if ($todo == "x"){
            echo "canceled to add todo".PHP_EOL;
        } else {
            $this->todoListService->add($todo);
        }
    }

    function delete():void
    {
        echo "### DELETE TODOLIST ###".PHP_EOL;

        $switch = InputHelper::input("Nomor (Press x to canceled) : ");
        if ($switch == "x"){
            echo "canceled to delete todolist".PHP_EOL;
        } else {
            $this->todoListService->delete($switch);
        }
    }
}