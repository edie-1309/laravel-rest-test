<?php

namespace App\Http\Controllers;

use App\Http\Resources\MahasiswaCollection;
use App\Http\Resources\MahasiswaDetailResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Resources\MahasiswaResource;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('search'))
        {
            $data = Mahasiswa::filter(request('search'))->with('jurusan.fakultas')->paginate(5);
        }else{
            $data = Mahasiswa::with('jurusan.fakultas')->paginate(5);
        }
        
        return MahasiswaResource::collection($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        $mahasiswa = Mahasiswa::create($validatedData);

        return new MahasiswaDetailResource($mahasiswa->loadMissing('jurusan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return new MahasiswaDetailResource($mahasiswa->load('jurusan.fakultas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
