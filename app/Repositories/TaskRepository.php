<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TaskInterface;
//use Your Model
use App\Models\Task;

/**
 * Class TaskRepository.
 */
class TaskRepository implements TaskInterface
{
    public function allTasks(){
        try {
            return Task::all();
        } catch (\Exception $e) {
            return $e;  
        }
    }
    public function storeTask($data){
        return Task::create($data);
    }
    public function findTask($id){
        return Task::find($id);
    }
    public function updateTask($data, $id){
        $task = Task::find($id);
        $task->title = $data["title"];
        $task->desc = $data["desc"];
        $task->save();
    }
    public function destroyTask($id){
        $task = Task::find($id);
        $task->delete();
    }
    
    

}
