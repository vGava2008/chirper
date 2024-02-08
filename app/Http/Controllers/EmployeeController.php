<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index ()
    {
        if (auth()->user()->admin) {
            return Inertia::render('Employee/Index', [
                'employees' => Employee::with('services:id,name')->latest()->get(),
            ]);
        }
    }

    public function create()
    {
        if (auth()->user()->admin) {
            $services = Service::all();
        } else {
            $services = Service::select()->where('user_id', '=', auth()->user()->id)->latest()->get();
        }
        return Inertia::render('Employee/Create', [
            'services' => $services,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'string|max:64',
            'phone_number' => 'required|string|max:65535',
        ]);
        $employee = $request->user()->employees()->create($validated);
        if ($request->service_id) {
            $employee->services()->attach(Service::select()->where('id', '=', $request->service_id)->latest()->get());
        }
        return redirect('employees');
    }

    public function show($id)
    {
        return Inertia::render('Employee/Show', [
            'employee' => Employee::with('services')->where('id', '=', $id)->latest()->get()->first(),
        ]);
    }

    public function edit($id)
    {
        if (auth()->user()->admin) {
            $services = Service::all();
        } else {
            $services = Service::select()->where('user_id', '=', auth()->user()->id)->latest()->get();
        }
        return Inertia::render('Employee/Edit', [
            'services' => $services,
            'employee' => Employee::with(['services'])->where('id', '=', $id)->latest()->get()->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $validated = $request->validate([
            'first_name' => 'string|max:64',
            'phone_number' => 'required|string|max:14',
        ]);
        $employee->update($validated);
        return $employee;
    }

    public function destroy(Employee $employee)
    {
        $employee->services()->detach();
        $employee->delete();
        return redirect('employees', '', '', '', '');
    }

}
