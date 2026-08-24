<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\SchoolMajor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolMajorController extends Controller
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

        $schoolMajors = SchoolMajor::with('major')->where('school_id', $school->id)->latest()->get();

        return view('admin.school_majors.index', compact('school','schoolMajors'));
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

        $majors = Major::orderBy('name')->get();

        // Jurusan yang sudah dimiliki sekolah
        $selectedMajorIds = SchoolMajor::where('school_id', $school->id)->pluck('major_id')->toArray();

        return view('admin.school_majors.create', compact('school','majors','selectedMajorIds'));
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
            'major_ids' => 'required|array',
            'major_ids.*' => 'required|exists:majors,id',
        ]);

        foreach ($validated['major_ids'] as $majorId) {
            SchoolMajor::create([
                'school_id' => $school->id,
                'major_id' => $majorId,
            ]);
        }

        return redirect()->route('school_majors.index')->with('success', 'Jurusan sekolah berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolMajor $schoolMajor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolMajor $schoolMajor)
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;

        // Semua jurusan dari master Superadmin
        $majors = Major::orderBy('name')->get();

        // Jurusan yang sedang digunakan sekolah
        $selectedMajorIds = SchoolMajor::where('school_id', $school->id)
            ->pluck('major_id')
            ->toArray();

        return view('admin.school_majors.edit', compact(
            'school',
            'majors',
            'selectedMajorIds'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolMajor $schoolMajor)
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolMajor $schoolMajor)
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;

        // Pastikan mapel memang milik sekolah admin
        if ($schoolMajor->school_id !== $school->id) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $schoolMajor->delete();

        return redirect()->route('school_majors.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
