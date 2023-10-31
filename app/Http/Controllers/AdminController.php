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
        return view('ui.parameter.add');
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
            'co2' => $request->co2,
            'pm25' => $request->pm25,
            'pm10' => $request->pm10,
            'voc' => $request->voc,
            'ozon' => $request->ozon,
        ];

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
        $data = DB::table('alat_tb')->get();
        return view('ui.alat.index', ['datas' => $data]);
    }

    public function add_akun()
    {
        return view('ui.alat.add');
    }

    public function edit_akun($id)
    {
        $data = DB::table('alat_tb')->where('id', $id)->first();
        return view('ui.alat.edit', ['data' => $data]);
    }

    public function post_akun(Request $request)
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

    public function delete_akun($id)
    {
        DB::table('alat_tb')
            ->where('id', $id)
            ->delete();

        return redirect(route('alat'))->with('sukses', 'alat telah di hapus');
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

