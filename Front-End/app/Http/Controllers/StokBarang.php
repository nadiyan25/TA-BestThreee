<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class StokBarang extends Controller
{
    protected $client;
    //buat konstruktor
    function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    function index()
    {
        //echo "Ini Halaman Home";
        //echo env("API_URL");

        //buat url (service "GET" dari server)
        $url = env("API_URL")."view";

        //ambil service "GET" dari server
        $request = $this->client->get($url);

        //tampilkan hasil
        $response = $request->getBody();

        //$data = json_decode($response)->Karyawan;
        //echo $data;
        //foreach(json_decode($response)->Karyawan as $data)
        //{
            //echo $data->nama_karyawan."<br>";
        //}
        //echo $response;

        $data["result"] = json_decode($response)->StokBarang;

        //panggil view "vw_karyawan"
        return view("vw_StokBarang",$data);
    }

    //buat fungsi untuk hapus data karyawan
    function delete($kode){
        $parameter = base64_encode($kode);
         //buat url (service "DELETE" dari server)
         $url = env("API_URL")."delete/".$parameter;
         //ambil service "DELETE" dari server
        $request = $this->client->delete($url);
        //tampilkan hasil
        $response = $request->getBody();
        //kirim ke "vw_karyawan" (fetch)
        echo $response;
    }
    //fungsi tambah data karyawan
    function add()
    {
        // tampilkan view "en_karwayan"
        return view("en_StokBarang");
    }
}
