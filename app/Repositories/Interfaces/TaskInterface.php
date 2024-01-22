<?php
namespace App\Repositories\Interfaces;

Interface TaskInterface{
    
    public function allTasks();
    public function storeTask($data);
    public function findTask($id);
    public function updateTask($data, $id); 
    public function destroyTask($id);
}