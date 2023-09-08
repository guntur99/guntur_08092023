<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    public function __construct(){
        $this->now = Carbon::now('Asia/Jakarta');
    }

    public function index()
    {
        $pegawai = Pegawai::get();

        return view('pegawai.index', [
            'pegawai' => $pegawai,
        ]);
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store()
    {
        request()->validate([
            'pegawai_name'     => ['required', 'string', 'max:255'],
            'pegawai_jabatan'  => ['required', 'string'],
            'pegawai_umur'     => ['required'],
            'pegawai_alamat'   => ['required', 'string'],
        ]);

        $pegawai                    = new Pegawai;
        $pegawai->pegawai_id        = request()->pegawai_id;
        $pegawai->pegawai_name      = request()->pegawai_name;
        $pegawai->pegawai_jabatan   = request()->pegawai_jabatan;
        $pegawai->pegawai_umur      = request()->pegawai_umur;
        $pegawai->pegawai_alamat    = request()->pegawai_alamat;
        $pegawai->created_at        = $this->now;
        $pegawai->save();

        return redirect()->route('index.pegawai');
    }

    public function show(Pegawai $pegawai)
    {
        //
    }

    public function edit(Pegawai $pegawai)
    {
        //
    }

    public function update()
    {

        $pegawai                    = Pegawai::find(request()->id);
        $pegawai->pegawai_id        = request()->pegawai_id;
        $pegawai->pegawai_name      = request()->pegawai_name;
        $pegawai->pegawai_jabatan   = request()->pegawai_jabatan;
        $pegawai->pegawai_umur      = request()->pegawai_umur;
        $pegawai->pegawai_alamat    = request()->pegawai_alamat;
        $pegawai->created_at        = $this->now;
        $pegawai->save();

        return redirect()->route('index.pegawai');
    }

    public function destroy()
    {
        Pegawai::find(request()->id)->delete();

        return response('Delete Successfuly!', 200);
    }
}
