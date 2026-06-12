<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = User::where('role', 'staff')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','string','min:8'],
            'status' => ['required','in:active,inactive'],
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'staff';

        User::create($data);

        return redirect()->route('admin.staff.index')->with('success','Staff created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff = User::findOrFail($id);

        return view('admin.staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = User::findOrFail($id);

        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $staff = User::findOrFail($id);

        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email,'.$staff->id],
            'password' => ['nullable','string','min:8'],
            'status' => ['required','in:active,inactive'],
        ]);

        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $staff->update($data);

        return redirect()->route('admin.staff.index')->with('success','Staff updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = User::findOrFail($id);

        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success','Staff deleted.');
    }
}
