<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.index');
    }

    public function store(Request $request)
    {
        // logic simpan data
    }

    public function update(Request $request, $id)
    {
        // logic update data
    }

    public function destroy($id)
    {
        // logic hapus data
    }
}
