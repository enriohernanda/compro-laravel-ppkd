<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::orderBy('id', 'DESC')->get();
        return view('admin.instructor.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validasi = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'name' => 'required|string',
                'major' => 'required|string',
                'social' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/instructor', $filename, 'public');
                $validasi['image'] = $path;
            }

            // Ubah string social jadi array dan encode ke JSON
            $social = [];
            if ($request->social) {
                $social = array_map('trim', explode(',', $request->social));
            }
            $validasi['social'] = json_encode($social);

            Instructor::create($validasi);
            return redirect()->route('instructoradmin.index');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Error! ' . $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instructor = Instructor::find($id);
        return view('admin.instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $instructor = instructor::find($id);
            $validasi = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'name' => 'required|string',
                'major' => 'required|string',
                'social' => 'required|string',
            ]);

            if ($request->hasFile(('image'))) {
                // Delete foto lama jika ada fotonya
                if ($instructor->image && Storage::disk('public')->exists($instructor->image)) {
                    Storage::disk('public')->delete(($instructor->image));
                }
                // upload gambar barunya
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/instructor', $filename, 'public');
                $validasi['image'] = $path;
            } else {
                // jika tidak perlu diganti, masih menyimpan foto lama
                $validasi['image'] = $instructor->image;
            }

            $social = [];
            if ($request->social) {
                $social = array_map('trim', explode(',', $request->social));
            }
            $validasi['social'] = json_encode($social);
            $instructor->update($validasi);
            return redirect()->route('instructoradmin.index');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Error!' . $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
