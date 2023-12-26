<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

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
        $alatData = DB::table('alat_tb')->select('code','id')->get(); // Ambil semua data alat dari database
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
        $ispupm10 = $this->hitungispupm10($request->pm10);
        $ispupm25 = $this->hitungispupm25($request->pm25);
        $ispuozon = $this->hitungispuozon($request->ozon);
        $ispuvoc = $this->hitungispuvoc($request->voc);

        $data['ispupm10'] = $ispupm10;
        $data['ispupm25'] = $ispupm25;
        $data['ispuozon'] = $ispuozon;
        $data['ispuvoc'] = $ispuvoc;

        $nilai_tertinggi = max($ispupm10, $ispupm25, $ispuozon, $ispuvoc);

        if ($nilai_tertinggi <= 50) {
            $data['kualitas'] = 'Baik'; // Hijau
        } elseif ($nilai_tertinggi <= 100) {
            $data['kualitas'] = 'Sedang'; // Biru
        } elseif ($nilai_tertinggi <= 200) {
            $data['kualitas'] = 'Tidak Sehat'; // Kuning
        } elseif ($nilai_tertinggi <= 300) {
            $data['kualitas'] = 'Sangat Tidak Sehat'; // Merah
        } else {
            $data['kualitas'] = 'Berbahaya'; // Hitam
        }

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

    public function hitungispupm10($pm10){
        $Ia = $this->batasispupm10($pm10)["ispuatas"];
        $Ib = $this->batasispupm10($pm10)["ispubawah"];
        $Xa = $this->bataspm10($pm10)["atas"];
        $Xb = $this->bataspm10($pm10)["bawah"];
        $Xx = $pm10;

        $ispu = ($Ia-$Ib)/($Xa-$Xb)*($Xx-$Xb)+$Ib;

        return $ispu;
    }

    public function hitungispupm25($pm25){
        $Ia = $this->batasispupm25($pm25)["ispuatas"];
        $Ib = $this->batasispupm25($pm25)["ispubawah"];
        $Xa = $this->bataspm25($pm25)["atas"];
        $Xb = $this->bataspm25($pm25)["bawah"];
        $Xx = $pm25;

        $ispu = ($Ia-$Ib)/($Xa-$Xb)*($Xx-$Xb)+$Ib;

        return $ispu;
    }

    public function hitungispuozon($ozon){
        $Ia = $this->batasispuozon($ozon)["ispuatas"];
        $Ib = $this->batasispuozon($ozon)["ispubawah"];
        $Xa = $this->batasozon($ozon)["atas"];
        $Xb = $this->batasozon($ozon)["bawah"];
        $Xx = $ozon;

        $ispu = ($Ia-$Ib)/($Xa-$Xb)*($Xx-$Xb)+$Ib;

        return $ispu;
    }

    public function hitungispuvoc($voc){
        $Ia = $this->batasispuvoc($voc)["ispuatas"];
        $Ib = $this->batasispuvoc($voc)["ispubawah"];
        $Xa = $this->batasvoc($voc)["atas"];
        $Xb = $this->batasvoc($voc)["bawah"];
        $Xx = $voc;

        $ispu = ($Ia-$Ib)/($Xa-$Xb)*($Xx-$Xb)+$Ib;

        return $ispu;
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

    public function batasispupm10($pm10)
    {
        if ($pm10<=50){
            return [
                "ispubawah" => 0,
                "ispuatas" => 50
            ];
        }
        if ($pm10<=150){
            return [
                "ispubawah" => 51,
                "ispuatas" => 100
            ];
        }
        if ($pm10<=350){
            return [
                "ispubawah" => 101,
                "ispuatas" => 200
            ];
        }
        if ($pm10<=420){
            return [
                "ispubawah" => 201,
                "ispuatas" => 300
            ];
        }
        if ($pm10<=500){
            return [
                "ispubawah" => 301,
                "ispuatas" => 500,
            ];
        }
        return [
            "ispubawah" => 501,
            "ispuatas" => 9999
        ];

    }

    public function batasispupm25($pm25)
    {
        if ($pm25<=15.5){
            return [
                "ispubawah" => 0,
                "ispuatas" => 50
            ];
        }
        if ($pm25<=55.4){
            return [
                "ispubawah" => 51,
                "ispuatas" => 100
            ];
        }
        if ($pm25<=150.4){
            return [
                "ispubawah" => 101,
                "ispuatas" => 200
            ];
        }
        if ($pm25<=250.4){
            return [
                "ispubawah" => 201,
                "ispuatas" => 300
            ];
        }
        if ($pm25<=500){
            return [
                "ispubawah" => 301,
                "ispuatas" => 500,
            ];
        }
        return [
            "ispubawah" => 501,
            "ispuatas" => 9999
        ];
    }

    public function batasispuozon($ozon)
    {
        if ($ozon<=120){
            return [
                "ispubawah" => 0,
                "ispuatas" => 50
            ];
        }
        if ($ozon<=235){
            return [
                "ispubawah" => 51,
                "ispuatas" => 100
            ];
        }
        if ($ozon<=400){
            return [
                "ispubawah" => 101,
                "ispuatas" => 200
            ];
        }
        if ($ozon<=800){
            return [
                "ispubawah" => 201,
                "ispuatas" => 300
            ];
        }
        if ($ozon<=1000){
            return [
                "ispubawah" => 301,
                "ispuatas" => 500,
            ];
        }
        return [
            "ispubawah" => 501,
            "ispuatas" => 9999
        ];
    }

    public function batasispuvoc($voc)
    {
        if ($voc<=45){
            return [
                "ispubawah" => 0,
                "ispuatas" => 50
            ];
        }
        if ($voc<=100){
            return [
                "ispubawah" => 51,
                "ispuatas" => 100
            ];
        }
        if ($voc<=215){
            return [
                "ispubawah" => 101,
                "ispuatas" => 200
            ];
        }
        if ($voc<=432){
            return [
                "ispubawah" => 201,
                "ispuatas" => 300
            ];
        }
        if ($voc<=648){
            return [
                "ispubawah" => 301,
                "ispuatas" => 500,
            ];
        }
        return [
            "ispubawah" => 501,
            "ispuatas" => 9999
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

