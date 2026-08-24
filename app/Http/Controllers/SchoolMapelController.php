<?php

namespace App\Http\Controllers;

use App\Models\MasterMapel;
use App\Models\SchoolMapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolMapelController extends Controller
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

        $schoolMapels = SchoolMapel::with('masterMapel')->where('school_id', $school->id)->latest()->paginate(10);

        return view('admin.school_mapel.index',compact('schoolMapels', 'school'));
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
        $masterMapels = MasterMapel::whereNotIn('id', SchoolMapel::where('school_id', $school->id)->pluck('master_mapel_id'))
            ->orderBy('name')->get();

        return view(
            'admin.school_mapel.create',
            compact('school', 'masterMapels')
        );
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
            'master_mapel_id' => [
                'required',
                'exists:master_mapels,id',
            ],
        ]);

        // Cegah duplikat
        $exists = SchoolMapel::where('school_id', $school->id)
            ->where(
                'master_mapel_id',
                $validated['master_mapel_id']
            )
            ->exists();

        if ($exists) {
            return back()
                ->withErrors([
                    'master_mapel_id' => 'Mata pelajaran sudah ditambahkan.'
                ])
                ->withInput();
        }

        SchoolMapel::create([
            'school_id' => $school->id,
            'master_mapel_id' => $validated['master_mapel_id'],
        ]);

        return redirect()->route('school_mapel.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolMapel $schoolMapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolMapel $schoolMapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolMapel $schoolMapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolMapel $schoolMapel)
    {
        $admin = Auth::user()->admin;

        if (!$admin || !$admin->school) {
            abort(404, 'Sekolah belum terhubung dengan akun admin.');
        }

        $school = $admin->school;

        // Pastikan mapel memang milik sekolah admin
        if ($schoolMapel->school_id !== $school->id) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $schoolMapel->delete();

        return redirect()->route('school_mapel.index')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
