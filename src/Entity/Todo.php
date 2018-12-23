<?php

namespace App\Entity;

class Todo
{

    use \Tool\Entity\EntityBundle;
    
    private $id,   
            $project,
            $user,
            $task,
            $dead_line,
            $state;

    public function getId()
    {
        return $this->id;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function setProject(int $project)
    {
        $this->project = $project;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(int $user)
    {
        $this->user = $user;
        return $this;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask(string $task)
    {
        $this->task = $task;
        return $this;
    }

    public function getDeadLine()
    {
        return $this->dead_line;
    }

    public function setDeadLine($date)
    {
        $this->dead_line = $date;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState(string $state)
    {
        $this->state = $state;
        return $this;
    }


}
