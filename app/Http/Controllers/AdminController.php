<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            return view('ui.dashboard');
        } else {
            return view('ui.auth.login');
        }

    }

    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect(route('dashboard'));
        } else {
            return view('ui.auth.login');
        }

    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect(route('login'));
    }

    public function post_login(Request $request)
    {
        $admin = DB::table('admin_tb')
            ->where('username', $request->username)
            ->where('password', $this->md5Pass($request->password))
            ->get();

        if (count($admin) > 0) {
            Auth::guard('admin')->LoginUsingId($admin[0]->id);
            return redirect(route('dashboard'));
        } else {
            return redirect(route('login'))->with('error', "Username / Password salah");
        }
    }

    //------------------------------------------------------------------------------------------------------------------

    public function parameter()
    {
        $data = DB::table('pengukuran_tb')
            ->join('alat_tb', 'pengukuran_tb.id_alat', '=', 'alat_tb.id')
            ->get();
        return view('ui.parameter.index', ['datas' => $data]);
    }

    public function add_parameter()
    {
        $alatData = DB::table('alat_tb')->get(); // Ambil semua data alat dari database
        return view('ui.parameter.add', ['alatDatas' => $alatData]);
    }

    public function edit_parameter($id)
    {
        $data = DB::table('pengukuran_tb')->where('id', $id)->first();
        return view('ui.parameter.edit', ['data' => $data]);
    }

    public function post_parameter(Request $request)
    {
        $data = [
            'id_alat' => $request->id_alat,
            'temp' => $request->temp,
            'hum' => $request->hum,
            'pm25' => $request->pm25,
            'pm10' => $request->pm10,
            'voc' => $request->voc,
            'ozon' => $request->ozon,
        ];

        // Menghitung ISPU
        $ispu = $this->hitungISPU(
            $request->pm10,
            $request->pm25,
            $request->ozon,
            $request->voc
        );

        $data['kualitas'] = $ispu; // Simpan hasil perhitungan ISPU ke dalam 'kualitas'

        if ($request->mode === 'add') {
            $id = DB::table('pengukuran_tb')->insertGetId($data);
        } else {
            $id = $request->id;
            DB::table('pengukuran_tb')->where('id', $id)->update($data);
        }

        if ($request->has('gambar')) {
            request()->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);

            $file = $request->file('gambar');
            $tujuan = "img/slide";
            $nama = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($tujuan, $nama);

            DB::table('pengukuran_tb')
                ->where('id', $id)
                ->update(['gambar' => "$tujuan/$nama"]);
        }

        return redirect(route('parameter'))->with('sukses', 'Parameter telah di perbarui');
    }

    public function delete_parameter($id)
    {
        DB::table('pengukuran_tb')
            ->where('id', $id)
            ->delete();

        return redirect(route('parameter'))->with('sukses', 'Parameter telah di hapus');
    }

    public function bataspm10($pm10)
    {
        if ($pm10<=50){
            return [
                "bawah" => 0,
                "atas" => 50
            ];
        }
        if ($pm10<=150){
            return [
                "bawah" => 50,
                "atas" => 150
            ];
        }
        if ($pm10<=350){
            return [
                "bawah" => 150,
                "atas" => 350
            ];
        }
        if ($pm10<=420){
            return [
                "bawah" => 350,
                "atas" => 420
            ];
        }
        if ($pm10<=500){
            return [
                "bawah" => 420,
                "atas" => 500,
            ];
        }
        return [
            "bawah" => 500,
            "atas" => 9999
        ];

    }

    public function bataspm25($pm25)
    {
        if ($pm25<=15.5){
            return [
                "bawah" => 0,
                "atas" => 15.5
            ];
        }
        if ($pm25<=55.4){
            return [
                "bawah" => 15.5,
                "atas" => 55.4
            ];
        }
        if ($pm25<=150.4){
            return [
                "bawah" => 55.4,
                "atas" => 150.4
            ];
        }
        if ($pm25<=250.4){
            return [
                "bawah" => 150.4,
                "atas" => 250.4
            ];
        }
        if ($pm25<=500){
            return [
                "bawah" => 250.4,
                "atas" => 500,
            ];
        }
        return [
            "bawah" => 500,
            "atas" => 9999
        ];
    }

    public function batasozon($ozon)
    {
        if ($ozon<=120){
            return [
                "bawah" => 0,
                "atas" => 120
            ];
        }
        if ($ozon<=235){
            return [
                "bawah" => 120,
                "atas" => 235
            ];
        }
        if ($ozon<=400){
            return [
                "bawah" => 235,
                "atas" => 400
            ];
        }
        if ($ozon<=800){
            return [
                "bawah" => 400,
                "atas" => 800
            ];
        }
        if ($ozon<=1000){
            return [
                "bawah" => 800,
                "atas" => 1000,
            ];
        }
        return [
            "bawah" => 1000,
            "atas" => 9999
        ];
    }

    public function batasvoc($voc)
    {
        if ($voc<=45){
            return [
                "bawah" => 0,
                "atas" => 45
            ];
        }
        if ($voc<=100){
            return [
                "bawah" => 45,
                "atas" => 100
            ];
        }
        if ($voc<=215){
            return [
                "bawah" => 100,
                "atas" => 215
            ];
        }
        if ($voc<=432){
            return [
                "bawah" => 215,
                "atas" => 432
            ];
        }
        if ($voc<=648){
            return [
                "bawah" => 432,
                "atas" => 648,
            ];
        }
        return [
            "bawah" => 648,
            "atas" => 9999
        ];
    }


    //------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function alat()
    {
        $data = DB::table('alat_tb')->get();
        return view('ui.alat.index', ['datas' => $data]);
    }

    public function add_alat()
    {
        return view('ui.alat.add');
    }

    public function edit_alat($id)
    {
        $data = DB::table('alat_tb')->where('id', $id)->first();
        return view('ui.alat.edit', ['data' => $data]);
    }

    public function post_alat(Request $request)
    {
        $data = [
            'code' => $request->code,
            'alamat' => $request->alamat,
            'lat' => $request->lat,
            'lon' => $request->lon,
        ];

        if ($request->mode === 'add') {
            $id = DB::table('alat_tb')->insertGetId($data);
        } else {
            $id = $request->id;
            DB::table('alat_tb')->where('id', $id)->update($data);
        }

        if ($request->has('gambar')) {

            request()->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);

            $file = $request->file('gambar');
            $tujuan = "img/slide";
            $nama = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($tujuan, $nama);

            DB::table('alat_tb')
                ->where('id', $id)
                ->update(['gambar' => "$tujuan/$nama"]);
        }

        return redirect(route('alat'))->with('sukses', 'alat telah di perbarui');
    }

    public function delete_alat($id)
    {
        DB::table('alat_tb')
            ->where('id', $id)
            ->delete();

        return redirect(route('alat'))->with('sukses', 'alat telah di hapus');
    }

    //------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function akun()
    {
        $data = DB::table('admin_tb')->get();
        return view('ui.akun.index', ['datas' => $data]);
    }

    public function add_akun()
    {
        return view('ui.akun.add');
    }

    public function edit_akun($id)
    {
        $data = DB::table('admin_tb')->where('id', $id)->first();
        return view('ui.akun.edit', ['data' => $data]);
    }

    public function post_akun(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
        ];

        if ($request->mode === 'add') {
            $id = DB::table('admin_tb')->insertGetId($data);
        } else {
            $id = $request->id;
            DB::table('admin_tb')->where('id', $id)->update($data);
        }

        if ($request->has('gambar')) {

            request()->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);

            $file = $request->file('gambar');
            $tujuan = "img/slide";
            $nama = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($tujuan, $nama);

            DB::table('alat_tb')
                ->where('id', $id)
                ->update(['gambar' => "$tujuan/$nama"]);
        }

        return redirect(route('akun'))->with('sukses', 'alat telah di perbarui');
    }

    public function delete_akun($id)
    {
        DB::table('admin_tb')
            ->where('id', $id)
            ->delete();

        return redirect(route('akun'))->with('sukses', 'akun telah di hapus');
    }

    //------------------------------------------------------------------------------------------------------------------

    //slide_show
    public function slide_show()
    {
        $data = DB::table('slide_tb')->get();
        return view('ui.userscreen.home.index', ['datas' => $data]);
    }
    //------------------------------------------------------------------------------------------------------------------

    public function md5Pass($pass)
    {
        return md5("$pass@skripsiakbar");
    }


}

