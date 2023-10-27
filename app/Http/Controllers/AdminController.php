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

    public function slide()
    {
        $data = DB::table('slide_tb')->where('id_admin', $this->idAdmin())->get();
        return view('ui.slide.index', ['datas' => $data]);
    }

    public function add_slide()
    {
        return view('ui.slide.add');
    }

    public function edit_slide($id)
    {
        $data = DB::table('slide_tb')->where('id', $id)->first();
        return view('ui.slide.edit', ['data' => $data]);
    }

    public function post_slide(Request $request)
    {
        $data = [
            'id_admin' => $this->idAdmin(),
            'judul' => $request->judul,
            'isi' => $request->isi
        ];

        if ($request->mode === 'add') {
            $id = DB::table('slide_tb')->insertGetId($data);
        } else {
            $id = $request->id;
            DB::table('slide_tb')->where('id', $id)->update($data);
        }

        if ($request->has('gambar')) {

            request()->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);

            $file = $request->file('gambar');
            $tujuan = "img/slide";
            $nama = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($tujuan, $nama);

            DB::table('slide_tb')
                ->where('id', $id)
                ->update(['gambar' => "$tujuan/$nama"]);
        }

        return redirect(route('slide'))->with('sukses', 'Slide telah di perbarui');
    }

    public function delete_slide($id)
    {
        DB::table('slide_tb')
            ->where('id', $id)
            ->where('id_admin', $this->idAdmin())
            ->delete();

        return redirect(route('slide'))->with('sukses', 'Slide telah di hapus');
    }

    //------------------------------------------------------------------------------------------------------------------

    //slide_show
    public function slide_show()
    {
        $data = DB::table('slide_tb')->get();
        @dd($data);
        return view('ui.userscreen.home.index', ['datas' => $data]);
    }
    //------------------------------------------------------------------------------------------------------------------

    function idAdmin()
    {
        return Auth::guard('admin')->user()->id;
    }

    public function md5Pass($pass)
    {
        return md5("$pass@skripsiakbar");
    }

    public function push_notifikasi($id_akun, $judul, $pesan)
    {
        $akun = DB::table('admin_tb')->find($id_akun);
        $app_name = DB::table('setting_tb')->find($this->idAdmin())->app_name;

        $key = "key=AAAA_bBYUFs:APA91bHGTugGFDhQK61yjefK6Xre3BR98P4sHw8uZy3cqTcyBwErpJ1VezpzDS1iNE003HObVR_WkcrM87km0G-xZsFg_24kSTijW2F_SSORMSUweojkCTlF7xndgQB55PGn1Lbfc0B1";

        $notifikasi = [
            'to' => $akun->token,
            'notification' => [
                'title' => "$judul - $app_name",
                'body' => $pesan,
                'android_channel_id' => 'high_importance_channel',
            ],
            "priority" => "high",
            "android" => [
                "priority" => "high"
            ]
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($notifikasi, JSON_THROW_ON_ERROR),
            CURLOPT_HTTPHEADER => [
                "Authorization: $key",
                "Content-Type: application/json; charset=UTF-8"
            ],
        ]);

        curl_exec($curl);
        curl_error($curl);
        curl_close($curl);

        return true;
    }

    public function push_notifikasi_masal($judul, $pesan)
    {
        $app_name = DB::table('setting_tb')->find($this->idAdmin())->app_name;
        $akun = DB::table('akun_tb')
            ->where('id_admin', $this->idAdmin())
            ->whereNotNull('token')
            ->pluck('token');

        $key = "key=AAAA_bBYUFs:APA91bHGTugGFDhQK61yjefK6Xre3BR98P4sHw8uZy3cqTcyBwErpJ1VezpzDS1iNE003HObVR_WkcrM87km0G-xZsFg_24kSTijW2F_SSORMSUweojkCTlF7xndgQB55PGn1Lbfc0B1";

        $notifikasi = [
            'registration_ids' => $akun,
            'notification' => [
                'title' => "$judul - $app_name",
                'body' => $pesan,
                'android_channel_id' => 'high_importance_channel',
            ],
            "priority" => "high",
            "android" => [
                "priority" => "high"
            ]
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($notifikasi, JSON_THROW_ON_ERROR),
            CURLOPT_HTTPHEADER => [
                "Authorization: $key",
                "Content-Type: application/json; charset=UTF-8"
            ],
        ]);

        curl_exec($curl);
        curl_error($curl);
        curl_close($curl);

        return true;
    }

}

