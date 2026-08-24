<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;
        
        $teachers = Teacher::where('school_id', $school->id)->latest()->get();
        
        return view('admin.teachers.index', compact('teachers', 'school'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;

        return view('admin.teachers.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:teachers,nip',
            'nuptk' => 'required|string|max:20|unique:teachers,nuptk',
            'gender' => 'required|in:l,p'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['nuptk'] . '@monisa.com',
            'password' => Hash::make($validated['nuptk']),
        ]);

        $user->assignRole('teacher');

        Teacher::create([
            'name' => $validated['name'],
            'nip' => $validated['nip'],
            'nuptk' => $validated['nuptk'],
            'gender' => $validated['gender'],
            'school_id' => $school->id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;

        if ($teacher->school_id !== $school->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit guru ini.');
        }

        return view('admin.teachers.edit', compact('teacher', 'school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;

        if ($teacher->school_id !== $school->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit guru ini.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:teachers,nip,' . $teacher->id,
            'nuptk' => 'required|string|max:20|unique:teachers,nuptk,' . $teacher->id,
            'gender' => 'required|in:l,p'
        ]);

        $user = $teacher->user;
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['nuptk'] . '@monisa.com',
            'password' => Hash::make($validated['nuptk']),
        ]);

        $teacher->update([
            'name' => $validated['name'],
            'nip' => $validated['nip'],
            'nuptk' => $validated['nuptk'],
            'gender' => $validated['gender'],
        ]);

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->user->delete();
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus.');
    }
}
