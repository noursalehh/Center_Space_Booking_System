<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
{
    $employees = Employee::with('user')->get();

    return view('employees.index', compact('employees'));
}
   public function create(){
    return view('employees.create');
   }
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'type' => 'employee',
        ]);

        $user->employee()->create([
            'job_title' => $validated['job_title'],
            'hire_date' => $validated['hire_date'],
        ]);

        return redirect()->route('employees.index');
    }
    public function show(Employee $employee)
    {
        $employee->load('user');

        return view('employees.show', compact('employee'));
    }
    public function edit(Employee $employee)
    {
        $employee->load('user');

        return view('employees.edit', compact('employee'));
    }
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();

        $employee->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'password' => !empty($validated['password'])
                ? Hash::make($validated['password'])
                : $employee->user->password,
        ]);

        $employee->update([
            'job_title' => $validated['job_title'],
            'hire_date' => $validated['hire_date'],
        ]);

        return redirect()->route('employees.index');
    }
    public function destroy(Employee $employee)
    {
        $user = $employee->user;
        $employee->delete();
        $user->delete();

        return redirect()->route('employees.index');
    }
}
