<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        //
    }

    public function employees ()
    {
        return $this->pager('employee', 'Сотрудники', false);
    }

    public function manager ()
    {
        return $this->pager('employee', 'Менеджеры', false);
    }


    public function clients ()
    {
        return $this->pager('client', 'Клиенты', false);
    }

    public function list()
    {
        return $this->json(['list' => Employee::where('user_id','!=', Auth::id())->with('user','role', 'company','department')->get()]);
    }


    public function create(Request $request, User $user, Employee $employee)
    {
        $user->fill([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
        ])->save();

        if ($user) {
            $employee->fill([
                'user_id' => $user->id,
                'company_id' => 1,
                'department_id' => 2,
                'role_id' => 3,
                'password' => $request->password
            ])->save();
            if ($employee) {
                return $this->json(['employee'=> $employee]);
            }
        }
        return $this->json(['err'=>  'Пользователь не создан при неизвестной причине!'], 204, false);
    }


    public function destroy($id, User $user)
    {
        $user->where('id', $id)->delete();
       return back();
    }


}
