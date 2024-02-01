<?php

namespace App\Http\Controllers;

use App\Helpers\Encryption;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Kreait\Laravel\Firebase\Facades\Firebase;


class ApiController extends Controller
{


    function registrasi(Request $request)
    {
        // Check if any required fields are empty
        if (empty($request->nama) || empty($request->username) || empty($request->password)) {
            $data['status'] = false;
            $data['pesan'] = "Maaf, data belum diisi dengan benar";
            return response()->json($data);
        }

        $cek1 = DB::table('user_tb')
            ->where('username', $request->username)
            ->get();

        if (count($cek1) > 0) {
            $data['status'] = false;
            $data['pesan'] = "Maaf, Username ini telah terdaftar";
            return response()->json($data);
        }

        $user = [
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $this->md5Pass($request->password),
            'remember_token' => $this->md5Pass($request->password)
        ];

        //        $id = DB::table('user_tb')->insertGetId($user);
        $data['status'] = true;
        $data['pesan'] = "Registrasi Berhasil";
        $data['data'] = $user;

        return response()->json($data);
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

    public function load_alat()
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

    public function load_parameter()
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

    public function dashboard()
    {
        $parameter = DB::table('pengukuran_tb')
            ->leftJoin('alat_tb', 'pengukuran_tb.id_alat', '=', 'alat_tb.id')
            ->select('alat_tb.id', 'alat_tb.code', 'alat_tb.alamat', 'pengukuran_tb.*')
            ->orderBy('pengukuran_tb.id', 'desc')
            ->first();

        if ($parameter) {
            $data['status'] = true;
            $data['pesan'] = "Load Berhasil";
            $data['data'] = $parameter;
        } else {
            $data['status'] = false;
            $data['pesan'] = "Data belum ada";
        }

        return response()->json($data);
    }

    public function load_grafik()
    {
        try {
            $now = Carbon::now();
            $dtbefore1 = $now->copy()->subHours(8);
            $dtbefore2 = $now->copy()->subHours(9);
            $dtbefore3 = $now->copy()->subHours(10);
            $dtbefore4 = $now->copy()->subHours(11);
            $dtbefore5 = $now->copy()->subHours(12);

            $dtstart1 = $dtbefore1->setTime($dtbefore1->hour, 0, 0)->toDateTimeString();
            $dtstart2 = $dtbefore2->setTime($dtbefore2->hour, 0, 0)->toDateTimeString();
            $dtstart3 = $dtbefore3->setTime($dtbefore3->hour, 0, 0)->toDateTimeString();
            $dtstart4 = $dtbefore4->setTime($dtbefore4->hour, 0, 0)->toDateTimeString();
            $dtstart5 = $dtbefore5->setTime($dtbefore5->hour, 0, 0)->toDateTimeString();

            $dtend1 = $dtbefore1->setTime($dtbefore1->hour, 59, 59)->toDateTimeString();
            $dtend2 = $dtbefore2->setTime($dtbefore2->hour, 59, 59)->toDateTimeString();
            $dtend3 = $dtbefore3->setTime($dtbefore3->hour, 59, 59)->toDateTimeString();
            $dtend4 = $dtbefore4->setTime($dtbefore4->hour, 59, 59)->toDateTimeString();
            $dtend5 = $dtbefore5->setTime($dtbefore5->hour, 59, 59)->toDateTimeString();

            $grafik1 = DB::table('pengukuran_tb')
                ->whereBetween('created_at', [$dtstart1, $dtend1])
                ->select([
                    DB::raw('COALESCE(AVG(ispupm25), 0) as avg_ispupm25'),
                    DB::raw('COALESCE(AVG(ispupm10), 0) as avg_ispupm10'),
                    DB::raw('COALESCE(AVG(ispuozon), 0) as avg_ispuozon'),
                    DB::raw('COALESCE(AVG(ispuco), 0) as avg_ispuco'),
                ])
                ->first();

            $grafik2 = DB::table('pengukuran_tb')
                ->whereBetween('created_at', [$dtstart2, $dtend2])
                ->select([
                    DB::raw('COALESCE(AVG(ispupm25), 0) as avg_ispupm25'),
                    DB::raw('COALESCE(AVG(ispupm10), 0) as avg_ispupm10'),
                    DB::raw('COALESCE(AVG(ispuozon), 0) as avg_ispuozon'),
                    DB::raw('COALESCE(AVG(ispuco), 0) as avg_ispuco'),
                ])
                ->first();

            $grafik3 = DB::table('pengukuran_tb')
                ->whereBetween('created_at', [$dtstart3, $dtend3])
                ->select([
                    DB::raw('COALESCE(AVG(ispupm25), 0) as avg_ispupm25'),
                    DB::raw('COALESCE(AVG(ispupm10), 0) as avg_ispupm10'),
                    DB::raw('COALESCE(AVG(ispuozon), 0) as avg_ispuozon'),
                    DB::raw('COALESCE(AVG(ispuco), 0) as avg_ispuco'),
                ])
                ->first();

            $grafik4 = DB::table('pengukuran_tb')
                ->whereBetween('created_at', [$dtstart4, $dtend4])
                ->select([
                    DB::raw('COALESCE(AVG(ispupm25), 0) as avg_ispupm25'),
                    DB::raw('COALESCE(AVG(ispupm10), 0) as avg_ispupm10'),
                    DB::raw('COALESCE(AVG(ispuozon), 0) as avg_ispuozon'),
                    DB::raw('COALESCE(AVG(ispuco), 0) as avg_ispuco'),
                ])
                ->first();

            $grafik5 = DB::table('pengukuran_tb')
                ->whereBetween('created_at', [$dtstart5, $dtend5])
                ->select([
                    DB::raw('COALESCE(AVG(ispupm25), 0) as avg_ispupm25'),
                    DB::raw('COALESCE(AVG(ispupm10), 0) as avg_ispupm10'),
                    DB::raw('COALESCE(AVG(ispuozon), 0) as avg_ispuozon'),
                    DB::raw('COALESCE(AVG(ispuco), 0) as avg_ispuco'),
                ])
                ->first();

            $data['bef_1jam'] = $grafik1;
            $data['bef_2jam'] = $grafik2;
            $data['bef_3jam'] = $grafik3;
            $data['bef_4jam'] = $grafik4;
            $data['bef_5jam'] = $grafik5;

            $response['status'] = true;
            $response['pesan'] = "Load Berhasil";
            $response['data'] = $data;

            return response()->json($response);
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during database operations
            $response['status'] = false;
            $response['pesan'] = "Error: " . $e->getMessage();
            return response()->json($response, 500); // Return a 500 Internal Server Error status
        }
    }


    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = '/';
    }

    public function simpan_data(){
        $datasensor = $this->database->getReference($this->tablename)->getValue();


        $data = [
            'id_alat' => 10,
            'temp' => $datasensor['id_10']['data_sensor']['dht21']['temperature'],
            'hum' => $datasensor['id_10']['data_sensor']['dht21']['humidity'],
            'ozon' =>  $datasensor['id_10']['data_sensor']['mq131']['ozon'],
            'pm25' => $datasensor['id_10']['data_sensor']['dsm501']['pm25'],
            'pm10' => $datasensor['id_10']['data_sensor']['dsm501']['pm10'],
            'co' =>  $datasensor['id_10']['data_sensor']['mq135']['co'],

        ];

        $ispupm10 = $this->hitungispupm10($data['pm10']);
        $ispupm25 = $this->hitungispupm25($data['pm25']);
        $ispuozon = $this->hitungispuozon($data['ozon']);
        $ispuco = $this->hitungispuco($data['co']);

        $data['ispupm10'] = $ispupm10;
        $data['ispupm25'] = $ispupm25;
        $data['ispuozon'] = $ispuozon;
        $data['ispuco'] = $ispuco;

        $nilai_tertinggi = max($ispupm10, $ispupm25, $ispuozon, $ispuco);

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
        $id= DB::table('pengukuran_tb')->insertGetId($data);

        return response()->json($id);

    }

    public function hitungispupm10($pm10)
    {
        $Ia = $this->batasispupm10($pm10)["ispuatas"];
        $Ib = $this->batasispupm10($pm10)["ispubawah"];
        $Xa = $this->bataspm10($pm10)["atas"];
        $Xb = $this->bataspm10($pm10)["bawah"];
        $Xx = $pm10;

        $ispu = ($Ia - $Ib) / ($Xa - $Xb) * ($Xx - $Xb) + $Ib;

        return $ispu;
    }

    public function hitungispupm25($pm25)
    {
        $Ia = $this->batasispupm25($pm25)["ispuatas"];
        $Ib = $this->batasispupm25($pm25)["ispubawah"];
        $Xa = $this->bataspm25($pm25)["atas"];
        $Xb = $this->bataspm25($pm25)["bawah"];
        $Xx = $pm25;

        $ispu = ($Ia - $Ib) / ($Xa - $Xb) * ($Xx - $Xb) + $Ib;

        return $ispu;
    }

    public function hitungispuozon($ozon)
    {
        $Ia = $this->batasispuozon($ozon)["ispuatas"];
        $Ib = $this->batasispuozon($ozon)["ispubawah"];
        $Xa = $this->batasozon($ozon)["atas"];
        $Xb = $this->batasozon($ozon)["bawah"];
        $Xx = $ozon;

        $ispu = ($Ia - $Ib) / ($Xa - $Xb) * ($Xx - $Xb) + $Ib;

        return $ispu;
    }

    public function hitungispuco($co)
    {
        $Ia = $this->batasispuco($co)["ispuatas"];
        $Ib = $this->batasispuco($co)["ispubawah"];
        $Xa = $this->batasco($co)["atas"];
        $Xb = $this->batasco($co)["bawah"];
        $Xx = $co;

        $ispu = ($Ia - $Ib) / ($Xa - $Xb) * ($Xx - $Xb) + $Ib;

        return $ispu;
    }

    public function bataspm10($pm10)
    {
        if ($pm10 <= 50) {
            return [
                "bawah" => 0,
                "atas" => 50
            ];
        }
        if ($pm10 <= 150) {
            return [
                "bawah" => 50,
                "atas" => 150
            ];
        }
        if ($pm10 <= 350) {
            return [
                "bawah" => 150,
                "atas" => 350
            ];
        }
        if ($pm10 <= 420) {
            return [
                "bawah" => 350,
                "atas" => 420
            ];
        }
        if ($pm10 <= 500) {
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
        if ($pm25 <= 15.5) {
            return [
                "bawah" => 0,
                "atas" => 15.5
            ];
        }
        if ($pm25 <= 55.4) {
            return [
                "bawah" => 15.5,
                "atas" => 55.4
            ];
        }
        if ($pm25 <= 150.4) {
            return [
                "bawah" => 55.4,
                "atas" => 150.4
            ];
        }
        if ($pm25 <= 250.4) {
            return [
                "bawah" => 150.4,
                "atas" => 250.4
            ];
        }
        if ($pm25 <= 500) {
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
        if ($ozon <= 120) {
            return [
                "bawah" => 0,
                "atas" => 120
            ];
        }
        if ($ozon <= 235) {
            return [
                "bawah" => 120,
                "atas" => 235
            ];
        }
        if ($ozon <= 400) {
            return [
                "bawah" => 235,
                "atas" => 400
            ];
        }
        if ($ozon <= 800) {
            return [
                "bawah" => 400,
                "atas" => 800
            ];
        }
        if ($ozon <= 1000) {
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

    public function batasco($co)
    {
        if ($co <= 4000) {
            return [
                "bawah" => 0,
                "atas" => 4000
            ];
        }
        if ($co <= 8000) {
            return [
                "bawah" => 4000,
                "atas" => 8000
            ];
        }
        if ($co <= 15000) {
            return [
                "bawah" => 8000,
                "atas" => 15000
            ];
        }
        if ($co <= 30000) {
            return [
                "bawah" => 15000,
                "atas" => 30000
            ];
        }
        if ($co <= 45000) {
            return [
                "bawah" => 30000,
                "atas" => 45000,
            ];
        }
        return [
            "bawah" => 45000,
            "atas" => 99999
        ];
    }

    public function batasispupm10($pm10)
    {
        if ($pm10 <= 50) {
            return [
                "ispubawah" => 0,
                "ispuatas" => 50
            ];
        }
        if ($pm10 <= 150) {
            return [
                "ispubawah" => 51,
                "ispuatas" => 100
            ];
        }
        if ($pm10 <= 350) {
            return [
                "ispubawah" => 101,
                "ispuatas" => 200
            ];
        }
        if ($pm10 <= 420) {
            return [
                "ispubawah" => 201,
                "ispuatas" => 300
            ];
        }
        if ($pm10 <= 500) {
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
        if ($pm25 <= 15.5) {
            return [
                "ispubawah" => 0,
                "ispuatas" => 50
            ];
        }
        if ($pm25 <= 55.4) {
            return [
                "ispubawah" => 51,
                "ispuatas" => 100
            ];
        }
        if ($pm25 <= 150.4) {
            return [
                "ispubawah" => 101,
                "ispuatas" => 200
            ];
        }
        if ($pm25 <= 250.4) {
            return [
                "ispubawah" => 201,
                "ispuatas" => 300
            ];
        }
        if ($pm25 <= 500) {
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
        if ($ozon <= 120) {
            return [
                "ispubawah" => 0,
                "ispuatas" => 50
            ];
        }
        if ($ozon <= 235) {
            return [
                "ispubawah" => 51,
                "ispuatas" => 100
            ];
        }
        if ($ozon <= 400) {
            return [
                "ispubawah" => 101,
                "ispuatas" => 200
            ];
        }
        if ($ozon <= 800) {
            return [
                "ispubawah" => 201,
                "ispuatas" => 300
            ];
        }
        if ($ozon <= 1000) {
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

    public function batasispuco($co)
    {
        if ($co <= 4000) {
            return [
                "ispubawah" => 0,
                "ispuatas" => 50
            ];
        }
        if ($co <= 8000) {
            return [
                "ispubawah" => 51,
                "ispuatas" => 100
            ];
        }
        if ($co <= 15000) {
            return [
                "ispubawah" => 101,
                "ispuatas" => 200
            ];
        }
        if ($co <= 30000) {
            return [
                "ispubawah" => 201,
                "ispuatas" => 300
            ];
        }
        if ($co <= 45000) {
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



    function distance($lat1x, $lon1x, $lat2x, $lon2x)
    {
        $lat1 = floatval($lat1x);
        $lon1 = floatval($lon1x);
        $lat2 = floatval($lat2x);
        $lon2 = floatval($lon2x);
        $unit = "K";

        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);
            if ($unit == "K") {
                $x = ($miles * 1.609344) + 0.1;
                return $x;
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
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

