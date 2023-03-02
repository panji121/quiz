<?php

namespace App\Http\Controllers;

use App\teachers;
use Illuminate\Http\Request;

class teachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = teachers::orderBy('id', 'ASC')->get();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'teachers' => 'required|string'
        ]);

        try {
            $teachers = teachers::create([
                'teachers' => $request->teachers,
                'kapasitas' => $request->kapasitas,
                'terisi' => $request->terisi
            ]);
            return redirect('/teachers')->with(['success' => '<strong>' . $request->teachers . '</strong> Telah disimpan']);
        } catch(\Exception $e) {
            return redirect('/teachers/create')->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teachers  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = teachers::find($id);
        return view('teachers.show', compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teachers  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = teachers::find($id);
        return view('teachers.edit', compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teachers = teachers::find($id);
        $teachers->update([
            'teachers' => $request->teachers,
            'kapasitas' => $request->kapasitas,
            'terisi' => $request->terisi
        ]);
        return redirect('/teachers')->with(['success' => '<b>' . $request->teachers . '</b> Diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teachers  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teachers = teachers::find($id);
        $teachers->delete();
        return redirect('/jurusan')->with(['success' => '<b>' . $teachers->teachers . '</b> Berhasil Dihapus']);
    }
}