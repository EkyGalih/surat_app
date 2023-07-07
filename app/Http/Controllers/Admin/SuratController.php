<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = Surat::orderBy('created_at', 'ASC')->get();

        return view('admin.Surat.surat', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_surat = Helpers::_jsonDecode('data/jenis_surat.json');
        $bidang = Bidang::get();

        return view('admin.Surat.components.add', compact('jenis_surat', 'bidang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
