<?php

namespace Repository;

use Entity\TodoList;

interface TodoListRepository{
    function save(TodoList $todoList):void;
    function delete(int $number):bool;
    function findAll():array;
}

class TodoListRepositoryImpl implements TodoListRepository
{
    public function __construct(private \PDO $conn)
    {
    }

    public function save(TodoList $todoList): void
    {
        $sql = <<<EOSQL
            INSERT INTO todolist(todo) VALUES (?)
        EOSQL;
        $statement = $this->conn->prepare($sql);
        $statement->execute([$todoList->getTodo()]);
    }

    public function delete(int $number): bool
    {
        $sql = <<<EOSQL
            SELECT id FROM todolist WHERE id = ?
        EOSQL;
        $statement = $this->conn->prepare($sql);
        $statement->execute([$number]);

        if ($statement->fetch()){
            //todolist ada
            $sql = <<<EOSQL
            DELETE FROM todolist WHERE id = ?
        EOSQL;
            $statement = $this->conn->prepare($sql);
            $statement->execute([$number]);
            return true;
        } else {
            //todolist tidak ada
            return false;
        }
    }

    public function findAll(): array
    {
        $sql = <<<EOSQL
          SELECT id, todo FROM todolist  
        EOSQL;
        $statement = $this->conn->prepare($sql);
        $statement->execute();

        $result = [];
        foreach ($statement as $row){
            $todolist = new TodoList();
            $todolist->setId($row['id']);
            $todolist->setTodo($row['todo']);
            $result[] = $todolist;
        }
        return $result;
    }
}
