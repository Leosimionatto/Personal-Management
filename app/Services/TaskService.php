<?php

namespace App\Services;

use App\Models\Task;

class TaskService{

    /**
     * @var Task
     */
    protected $task;

    /**
     * TaskService constructor.
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Method to get all Project tasks
     *
     * @param $id
     * @param $group
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($id, $group)
    {
        return $this->task->where('idprojeto', $id)->where('idgrupo', $group)->paginate();
    }
}