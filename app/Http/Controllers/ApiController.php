<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\Encryption;
use Carbon\Traits\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ApiController extends Controller
{

    public function registrasi(Request $request)
    {
        // Validate unique username
        $existingUser = DB::table('user_tb')->where('username', $request->username)->first();

        if ($existingUser) {
            // Username already exists, return error response
            return response()->json(['error' => 'Username sudah ada'], 422);
        }

        // If the username is unique, proceed with registration
        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $this->md5Pass($request->password),
            'remember_token' => $this->md5Pass($request->password)
        ];

        $userId = DB::table('user_tb')->insertGetId($data);

        $responseData = [
            'user_id' => $userId,
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => $data['password']
        ];

        return response()->json($responseData);
    }
    public function edit_akun(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'password' => $this->md5Pass($request->password),
        ];
        $id = $request->id;
        DB::table('user_tb')->where('id', $id)->update($data);

        return response()->json($data);
    }
    public function login(Request $request)
    {
        $user = DB::table('user_tb')
            ->where('username', $request->username)
            ->where('password', $this->md5Pass($request->password))
            ->get();

        if (count($user) > 0) {
            $data['status'] = true;
            $data['pesan'] = "Login berhasil";
            $data['data'] = $user[0];
        } else {
            $data['status'] = false;
            $data['pesan'] = "username dan password salah, silahkan coba lagi";
        }
        return response()->json($data);
    }
    public function load_alat(Request $request)
    {
        $alat = DB::table('alat_tb')->get();

        if (count($alat) > 0) {
            $data['status'] = true;
            $data['pesan'] = "Load Berhasil";
            $data['data'] = $alat;
        } else {
            $data['status'] = false;
            $data['pesan'] = "data belum ada";
        }
        return response()->json($data);
    }
    public function load_parameter(Request $request)
    {
        $parameter = DB::table('pengukuran_tb')->get();

        if (count($parameter) > 0) {
            $data['status'] = true;
            $data['pesan'] = "Load Berhasil";
            $data['data'] = $parameter;
        } else {
            $data['status'] = false;
            $data['pesan'] = "data belum ada";
        }
        return response()->json($data);
    }


    // -----------------------------------------------------------------------------------------------------------------

    public function wilayah($kode, $panjang)
    {
        $data = DB::table('wilayah_tb')
            ->whereRaw("LENGTH(kode) = $panjang")
            ->where('kode', 'like', "$kode%")
            ->orderBy('nama')
            ->get();

        return response()->json($data);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function md5Pass($pass)
    {
        return md5("$pass@skripsiakbar");
    }

    function decrypt($text)
    {
        $encryption = new Encryption();
        $de = $encryption->decrypt($text);
        $x = json_decode($de, false);
        $result['status'] = $x !== null;
        if ($result['status']) {
            $result['result'] = $x;
        }
        return $result;

    }

    function encrypt($text)
    {
        $encryption = new Encryption();
        return $encryption->encrypt($text);
    }

    public function array_string($data)
    {
        return str_replace(array('[', ']'), '', (string)$data);
    }
}

