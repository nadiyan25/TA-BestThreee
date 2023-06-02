<?php

namespace App\Http\Controllers;

use App\Models\Mkaryawan;
use Illuminate\Http\Request;

class Karyawan extends Controller
{
    //function __construct()
    //{
        //$this->model = new Mkaryawan();
    //}
   protected $model;

   public function __construct(Mkaryawan $model)
   {
    $this ->model = $model;
   }

    function view()
    {
        //ambil fungsi viewData(dari Mkaryawan)
        $data = $this->model->viewData();

        //tampilkan hasil dari "tb_karyawan"
        return response([
            "Karyawan" => $data
        ],http_response_code());
    }

    function detail($parameter)
    {
        //ambil fungsi detailData(dari Mkaryawan)
        $data = $this->model->detailData($parameter);

        //tampilkan hasil dari "tb_karyawan"
        return response([
            "Karyawan" => $data
        ],http_response_code());
    }

    //buat fungsi untuk hapus data
    function delete($parameter)
    {
        //cek apakah data (nik) tersedia/tidak
        $cek_data = $this->model->detailData($parameter);
        //jika data ditemukan
        if (count($cek_data) == 1)
        {
            //hapus data sesuai nik
            $this->model->deleteData($parameter);
            //buat pesan
            $status = 1;
            $pesan = "Data Berhasil Dihapus";
        }
        //jika data tidak ditemukan
        else
        {
            //buat pesan
            $status = 0;
            $pesan = "Data  Gagal Dihapus ! (KODE Tidak Ditemukan !)";
        }

        //tampilkan hasil respon
        return response([
            "status" => $status,
            "pesan" => $pesan,
        ],http_response_code());
    }

    // fungsi untuk simpan data
    function insert(Request $req)
    {
        //ambil data dari hasil input
        $data = [
            "kode" => $req->kode_stokbarang,
            "nama barang" => $req->namabarang_stokbarang,
            "harga" => $req->harga_stokbarang,
            "stok" => $req->stok_stokbarang,
            "merk" => $req->merk_stokbarang,
        ];
        //cek apakah nik sudah pernah tersimpan/belom
        $parameter = base64_encode($data["nik"]);
        $cek_data = $this->model->detailData($parameter);

        //jika data tidak ditemukan 
        if(count($cek_data) == 0)
        {
            //simpan data
            $this->model->saveData($data["kode"], $data["nama barang"], $data["harga"],
            $data["stok"], $data["merk"]);

            //buat pesan
            $status = 1;
            $pesan = "Data Berhasil Disimpan";
        }
        //jika data ditemukan
        else
        {
            //buat pesan
            $status = 0;
            $pesan = "Data Gagal Disimpan ! (KODE Sudah Pernah Tersimpan !)";
        }
        //tampilkan hasil respon
        return response([
            "status" => $status,
            "pesan" => $pesan,
        ],http_response_code());
    }

    //fungsi untuk ubah data
    function update($parameter, Request $req)
    {
        //ambil data dari hasil input
        $data = [
            "kode" => $req->kode_stokbarang,
            "nama barang" => $req->namabarang_stokbarang,
            "harga" => $req->harga_stokbarang,
            "stok" => $req->stok_stokbarang,
            "merk" => $req->merk_stokbarang,
        ];

        //cek apakah nik data karyawan sudah pernah disimpan/belom
        $cek_data = $this->model->checkUpdate($parameter, $data["nik"]);

        // jika data tidak ditemukan
        if(count($cek_data) == 0)
        {
            //update data
            $this->model->updateData($data["kode"], $data["nama barang"], $data["harga"],
            $data["stok"], $data["merk"], $parameter);
            //buat pesan
            $status = 1;
            $pesan = "Data Berhasil Diubah";
        }
        // jika data ditemukan
        else
        {
             //buat pesan
             $status = 0;
             $pesan = "Data Gagal Diubah ! (KODE Sudah Pernah Tersimpan !)";
        }
        //tampilkan hasil respon
        return response([
            "status" => $status,
            "pesan" => $pesan,
        ],http_response_code());
    }
}