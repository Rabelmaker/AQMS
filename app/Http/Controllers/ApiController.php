<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\Encryption;
use Carbon\Traits\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function tes(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tps' => $request->tps
        ];

        DB::table('tes')->insertGetId($data);
        return response()->json(true);
    }

    public function post_data(Request $request)
    {
        $data = $this->decrypt($request->data);
        if (!$data['status']) {
            return response()->json(false);
        }
        $x = $data['result'];
        if ($x->jenis_data === "load_setting") return $this->load_setting($x);
        if ($x->jenis_data === "load_slide") return $this->load_slide($x);
        if ($x->jenis_data === "load_profil") return $this->load_profil($x);
        if ($x->jenis_data === "load_event") return $this->load_event($x);
        if ($x->jenis_data === "load_berita") return $this->load_berita($x);
        if ($x->jenis_data === "load_wilayah") return $this->load_wilayah();
        if ($x->jenis_data === "registrasi") return $this->registrasi($x);
        if ($x->jenis_data === "login") return $this->login($x);
        if ($x->jenis_data === "load_akun") return $this->load_akun($x);
        if ($x->jenis_data === "load_kecamatan") return $this->load_kecamatan($x);
        if ($x->jenis_data === "load_tugas") return $this->load_tugas($x);
        if ($x->jenis_data === "load_referal") return $this->load_referal($x);
        if ($x->jenis_data === "load_list_tugas") return $this->load_list_tugas($x);
        if ($x->jenis_data === "update_token") return $this->update_token($x);
        if ($x->jenis_data === "post_tugas") return $this->post_tugas($x);
        if ($x->jenis_data === "post_edit_tugas") return $this->post_edit_tugas($x);
        if ($x->jenis_data === "hapus_tugas") return $this->hapus_tugas($x);
        if ($x->jenis_data === "load_pengumuman") return $this->load_pengumuman($x);
        if ($x->jenis_data === "post_diskusi") return $this->post_diskusi($x);
        if ($x->jenis_data === "load_diskusi") return $this->load_diskusi($x);
        if ($x->jenis_data === "post_baca") return $this->post_baca($x);
        if ($x->jenis_data === "load_diskusi_caleg") return $this->load_diskusi_caleg($x);
        return response()->json(true);
    }

    function load_setting($data)
    {
        $id_admin = $data->id_admin;
        return DB::table('setting_tb')->where('id_admin', $id_admin)->first();
    }

    function load_slide($x)
    {
        $id_admin = $x->id_admin;
        $all = DB::table('slide_tb')
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $new = DB::table('slide_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);

        $data['new_data'] = DB::table('slide_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_admin', $id_admin)
            ->get();

        return response()->json($data);
    }

    function load_profil($data)
    {
        $id_admin = $data->id_admin;
        return DB::table('profil_tb')->where('id_admin', $id_admin)->first();
    }

    function load_event($x)
    {
        $id_admin = $x->id_admin;
        $all = DB::table('event_tb')
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $new = DB::table('event_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);

        $data['new_data'] = DB::table('event_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_admin', $id_admin)
            ->get();

        return response()->json($data);
    }

    function load_berita($x)
    {
        $id_admin = $x->id_admin;
        $all = DB::table('berita_tb')
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $new = DB::table('berita_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);

        $data['new_data'] = DB::table('berita_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_admin', $id_admin)
            ->get();

        return response()->json($data);
    }

    function load_wilayah()
    {
        $data['new_data'] = DB::table('wilayah_tb')
            ->get();
        return response()->json($data);
    }

    function registrasi($x)
    {

        $cek1 = DB::table('akun_tb')
            ->where('nik', $x->nik)
            ->where('id_admin', $x->id_admin)
            ->get();

        $cek2 = DB::table('akun_tb')
            ->where('hp', $x->hp)
            ->where('id_admin', $x->id_admin)
            ->get();

        if (count($cek1) > 0) {
            $data['status'] = false;
            $data['pesan'] = "Maaf, NIK ini telah terdaftar";
            return response()->json($data);
        }
        if (count($cek2) > 0) {
            $data['status'] = false;
            $data['pesan'] = "Maaf, Nomor HP ini telah terdaftar";
            return response()->json($data);
        }

        if ($x->reff == "") {
            $reff = 0;
        } else {
            $reff = $x->reff;
        }

        $a = [
            'id_admin' => $x->id_admin,
            'reff' => $reff,
            'nama' => $x->nama,
            'nik' => $x->nik,
            'jenis_kelamin' => $x->jenis_kelamin,
            'hp' => $x->hp,
            'wa' => $x->wa,
            'kota' => $x->kota,
            'kecamatan' => $x->kecamatan,
            'kelurahan' => $x->kelurahan,
            'tps' => $x->tps,
            'password' => $this->ePassword($x->password),
        ];

        $id = DB::table('akun_tb')->insertGetId($a);

        $nama = "ktp_" . $id . ".jpg";
        $path = base_path() . "/public/img/akun/" . $nama;
        $image = $x->foto_ktp;
        $realImage = base64_decode($image);
        file_put_contents($path, $realImage);

        DB::table('akun_tb')
            ->where('id', $id)
            ->update([
                'foto_ktp' => "/img/akun/$nama"
            ]);

        $data['status'] = true;
        $data['pesan'] = "Registrasi Berhasil";

        return response()->json($data);
    }

    function login($x)
    {
        $cek = DB::table('akun_tb')
            ->where('hp', $x->hp)
            ->where('password', $this->ePassword($x->password))
            ->get();

        if (count($cek) > 0) {
            $data['status'] = true;
            $data['pesan'] = "Login berhasil";
            $data['data'] = $cek[0];
        } else {
            $data['status'] = false;
            $data['pesan'] = "Kombinasi Nomor Handphone dan password salah, silahkan coba lagi";
        }

        return response()->json($data);
    }

    function load_akun($x)
    {
        $data = DB::table('akun_tb')
            ->where('id', $x->id_akun)
            ->where('id_admin', $x->id_admin)
            ->first();

        return response()->json($data);
    }

    function load_kecamatan($x)
    {
        $id_admin = $x->id_admin;
        $dapil = DB::table('dapil_tb')
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $all = DB::table('kecamatan_tb')
            ->whereIn('id_dapil', $dapil)
            ->pluck('id');

        $new = DB::table('kecamatan_tb')
            ->where('updated_at', '>', $x->last)
            ->whereIn('id_dapil', $dapil)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);
        $data['new_data'] = DB::table('kecamatan_tb')
            ->where('updated_at', '>', $x->last)
            ->whereIn('id_dapil', $dapil)
            ->get();

        return response()->json($data);
    }

    function load_tugas($x)
    {
        $id_akun = $x->id_akun;

        $all = DB::table('tugas_tb')
            ->where('id_akun', $id_akun)
            ->pluck('id');

        $new = DB::table('tugas_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_akun', $id_akun)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);

        $data['new_data'] = DB::table('tugas_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_akun', $id_akun)
            ->get();

        return response()->json($data);
    }

    function load_referal($x)
    {
        $id_akun = $x->id_akun;

        $all = DB::table('akun_tb')
            ->where('reff', $id_akun)
            ->pluck('id');

        $new = DB::table('akun_tb')
            ->where('updated_at', '>', $x->last)
            ->where('reff', $id_akun)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);

        $data['new_data'] = DB::table('akun_tb')
            ->where('updated_at', '>', $x->last)
            ->where('reff', $id_akun)
            ->get();

        return response()->json($data);
    }

    function load_list_tugas($x)
    {
        $id_akun = $x->id_akun;

        $all = DB::table('list_tugas_tb')
            ->where('id_akun', $id_akun)
            ->pluck('id');

        $new = DB::table('list_tugas_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_akun', $id_akun)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);
        $data['new_data'] = DB::table('list_tugas_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_akun', $id_akun)
            ->get();

        return response()->json($data);
    }

    function update_token($x)
    {
        DB::table('akun_tb')->where('id', $x->id_akun)->update([
            'token' => $x->token
        ]);
        return response()->json(true);
    }

    function post_tugas($x)
    {

        $a = [
            'id_akun' => $x->id_akun,
            'id_tugas' => $x->id_tugas,
            'keterangan' => $x->keterangan,
            'latitude' => $x->latitude,
            'longitude' => $x->longitude
        ];

        $id = DB::table('list_tugas_tb')->insertGetId($a);

        $nama = "tugas_" . $id . ".jpg";
        $path = base_path() . "/public/img/tugas/" . $nama;
        $image = $x->foto;
        $realImage = base64_decode($image);
        file_put_contents($path, $realImage);

        DB::table('list_tugas_tb')
            ->where('id', $id)
            ->update([
                'foto' => "/img/tugas/$nama"
            ]);

        return response()->json(true);
    }

    function post_edit_tugas($x)
    {
        $a = [
            'keterangan' => $x->keterangan,
        ];

        DB::table('list_tugas_tb')
            ->where('id', $x->id)
            ->update($a);

        if ($x->foto !== "") {
            $nama = "tugas_" . $x->id . "_" . date("YmdHis") . ".jpg";
            $path = base_path() . "/public/img/tugas/" . $nama;
            $image = $x->foto;
            $realImage = base64_decode($image);
            file_put_contents($path, $realImage);

            DB::table('list_tugas_tb')
                ->where('id', $x->id)
                ->update([
                    'foto' => "/img/tugas/$nama"
                ]);
        }

        return response()->json(true);
    }

    function hapus_tugas($x)
    {
        DB::table('list_tugas_tb')->where('id', $x->id)->delete();
        return response()->json(true);
    }

    function load_pengumuman($x)
    {
        $id_admin = $x->id_admin;
        $all = DB::table('pengumuman_tb')
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $new = DB::table('pengumuman_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_admin', $id_admin)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);

        $data['new_data'] = DB::table('pengumuman_tb')
            ->where('updated_at', '>', $x->last)
            ->where('id_admin', $id_admin)
            ->get();

        return response()->json($data);
    }

    function post_diskusi($x)
    {
        $a = [
            'id_akun' => $x->id_akun,
            'pair' => $x->pair,
            'pesan' => $x->pesan,
        ];

        DB::table('diskusi_tb')->insert($a);

        DB::table('diskusi_tb')
            ->where('pair', $x->pair)
            ->where('id_akun', '!=', $x->id_akun)
            ->update(['baca' => 1]);

        return response()->json(true);
    }

    function load_diskusi($x)
    {
        $id_akun = $x->id_akun;
        $pair = "x_$id_akun";

        $all = DB::table('diskusi_tb')
            ->where('pair', $pair)
            ->pluck('id');

        $new = DB::table('diskusi_tb')
            ->where('updated_at', '>', $x->last)
            ->where('pair', $pair)
            ->pluck('id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);
        $data['new_data'] = DB::table('diskusi_tb')
            ->where('updated_at', '>', $x->last)
            ->where('pair', $pair)
            ->get();

        return response()->json($data);
    }

    function post_baca($x)
    {
        DB::table('diskusi_tb')
            ->where('pair', $x->pair)
            ->where('id_akun', '!=', $x->id_akun)
            ->update(['baca' => 1]);
        return response()->json(true);
    }

    function load_diskusi_caleg($x)
    {
        $id_admin = $x->id_admin;

        $all = DB::table('diskusi_tb')
        ->leftJoin('akun_tb', 'diskusi_tb.id_akun', '=', 'akun_tb.id')
            ->where('akun_tb.id_admin', $id_admin)
            ->pluck('diskusi_tb.id');

        $new = DB::table('diskusi_tb')
            ->leftJoin('akun_tb', 'diskusi_tb.id_akun', '=', 'akun_tb.id')
            ->where('diskusi_tb.updated_at', '>', $x->last)
            ->where('akun_tb.id_admin', $id_admin)
            ->pluck('diskusi_tb.id');

        $data['all_id'] = $this->array_string($all);
        $data['new_id'] = $this->array_string($new);
        $data['new_data'] = DB::table('diskusi_tb')
            ->leftJoin('akun_tb', 'diskusi_tb.id_akun', '=', 'akun_tb.id')
            ->where('diskusi_tb.updated_at', '>', $x->last)
            ->where('akun_tb.id_admin', $id_admin)
            ->select('diskusi_tb.*', 'akun_tb.nama', 'akun_tb.jenis_akun')
            ->get();

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

    public function ePassword($pass)
    {
        return md5($pass . "@ayomenang");
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

