<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mews\Captcha\Facades\Captcha;

class UserController extends Controller
{
    public function index()
    {
        dd(captcha_src());

        $provinsi = DB::select('SELECT * FROM reg_provinces');
        $kabupaten = DB::select('SELECT * FROM reg_regencies');
        $kecamatan = DB::select('SELECT * FROM reg_districts');
        $desa = DB::select('SELECT * FROM reg_villages');

        return view('user', compact('provinsi', 'kabupaten', 'kecamatan', 'desa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha',
            'nama' => 'required',
            'nik' => 'required | numeric | digits:16',
            'tanggal_lahir' => 'required | date',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required | in:Laki-laki,Perempuan',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'email' => 'required | email:rfc,dns',
            'password' => 'required | min:8 | confirmed',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        \App\Models\User::create($data);

        return redirect()->route('user.index')->with('success', 'Pendaftaran Berhasil');
    }
}
