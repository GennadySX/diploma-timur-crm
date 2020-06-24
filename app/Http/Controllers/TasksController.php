<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\User;
use App\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function list()
    {
        return $this->json(['list' => Tasks::with('team', 'file')->where('status', '!=', 'e')->orderBy('created_at', 'DESC')->get(),
            'userList' => User::where('role', 'employee')->get()
        ]);
    }

    public function archiveList()
    {
        return $this->json(['list' => Tasks::with('team', 'file')->where('status',  'e')->orderBy('created_at', 'DESC')->get(),
            'userList' => User::where('role', 'employee')->get()
        ]);
    }

    public function addUser(Request $request, UserTask $task)
    {
        $is = $task->fill([
            'company_id' => 1,
            'task_id' => $request->task_id,
            'executor_id' => $request->executor_id,
            'creator_id' => Auth::id(),
            'description' => 'nullable'
        ])->save();

        if ($is) {
            return $this->json(['is' => $task], 200);
        }
        return $this->json(['err' => 'не добавлен пользователь'], 200, false);
    }

    public function removeUser(Request $request, UserTask $task)
    {
        $is = $task::where('task_id', $request->task_id)->where('executor_id', $request->executor_id)->delete();

        return $this->json(['is' => $request->all()], 200);
    }


    public function create(Request $request, Tasks $tasks, $task = array())
    {
        foreach ($request->all() as $key => $value)
            $task[$key] = $value;
        $task['creator_id'] = Auth::id();
        if ($tasks->fill($task)->save()) {
            return $this->json(['task' => $tasks]);
        }
        return $this->json(['err' => 'Не создана новая задача'], 200, false);
    }


    public function myTask()
    {
        return $this->pager('task', 'Задачи', true);
    }
    public function archive()
    {
        return $this->pager('task-archive', 'Архив задачи', true);
    }

    public function income()
    {
        return $this->pager('report', 'Доходы', false);
    }

    public function expense()
    {
        return $this->pager('report', 'Расходы', false);
    }

    public function finishIt(Request $request, Tasks $task) {
        $task::where('id', $request->id)->update([
            'status' => 'e'
        ]);
        return $this->json(['update' => true]);
    }


    public function destroy($id, Tasks $tasks)
    {
        $tasks->where('id', $id)->delete();

        return back();
    }
}
