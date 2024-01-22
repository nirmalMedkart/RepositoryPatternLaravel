<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TaskInterface;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function get()
    {
        $task = $this->taskRepository->allTasks();
        return $task;
    }

    public function create(TaskRequest $request)
    {
        $validation = $request->validated();
        if ($validation) {
            $in = $request->all();
            $task = $this->taskRepository->storeTask($in);
            return $task;
        } else {
            return response()->json([
                "message"=> $validation->error()
            ]);
        }
    }

    public function update(TaskRequest $request, $id){
        $in = $request->all();
        $this->taskRepository->updateTask($in, $id);
    }

    public function destroy($id){
        $this->taskRepository->destroyTask($id);
    }

    public function index($id){
        $this->taskRepository->findTask($id);
    }
}
