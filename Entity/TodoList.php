<?php

namespace Entity;

class TodoList
{
    private int $id;
    private string $todo;

    public function __construct(string $todo = "")
    {
        $this->todo = $todo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTodo(): string
    {
        return $this->todo;
    }

    /**
     * @param string $todo
     */
    public function setTodo(string $todo): void
    {
        $this->todo = $todo;
    }
}