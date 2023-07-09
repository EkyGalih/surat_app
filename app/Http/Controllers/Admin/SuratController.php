<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Distribusi;
use App\Models\FileSurat;
use App\Models\Surat;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

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
        $file       = $request->file('file_surat');
        $ext        = array('jpg', 'png', 'jpeg', 'PNG', 'JPG', 'JPEG');
        $filename   = 'surat '.$request->jenis_surat.' - '.md5($file->getClientOriginalName());
        $id         = (string)Uuid::generate(4);

        if (in_array($file->getClientOriginalExtension(), $ext)) {
            if ($file->getSize() <= 5000000) {
                if ($request->jenis_surat == 'Undangan') {
                    $file->move('uploads/surat/undangan/', $filename);
                    $request->file_surat = 'uploads/surat/undangan/'.$filename;
                } elseif ($request->jenis_surat == 'Biasa') {
                    $file->move('uploads/surat/biasa/', $filename);
                    $request->file_surat = 'uploads/surat/biasa/'.$filename;
                } elseif ($request->jenis_surat == 'Disposisi') {
                    $file->move('uploads/surat/disposisi/', $filename);
                    $request->file_surat = 'uploads/surat/disposisi/'.$filename;
                }
            }
        }

        Surat::create([
                    'id'            => $id,
                    'surat'         => 'masuk',
                    'jenis_surat'   => $request->jenis_surat,
                    'dinas'         => $request->dinas,
                    'tgl_masuk'     => Helpers::_formatTanggal($request->tgl_masuk),
                    'no_surat'      => $request->no_surat,
                    'tgl_surat'     => Helpers::_formatTanggal($request->tgl_surat),
                    'uraian'        => $request->uraian,
                    'tanda_terima'  => $request->penerima.', '.Helpers::_formatTanggal($request->tgl_terima)
        ]);

        FileSurat::create([
            'surat_id' => $id,
            'file_surat' => $request->file_surat
        ]);
        if ($request->distribusi != NULL) {
            foreach ($request->distribusi as $distribusi) {
                Distribusi::create([
                    'surat_id' => $id,
                    'bidang_id' => $distribusi
                ]);
            }
        }

        return redirect()->route('surat-admin.index')->with(['success' => 'Surat Masuk ditambahkan!']);
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
        $surat = Surat::findOrFail($id);
        $jenis_surat = Helpers::_jsonDecode('data/jenis_surat.json');
        $bidang = Bidang::get();

        return view('admin.Surat.components.edit', compact('surat', 'bidang', 'jenis_surat'));
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
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat-admin.index')->with(['success' => 'Surat Masuk dihapus!']);
    }
}
