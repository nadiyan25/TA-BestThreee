@extends('template_StokBarang')


@section('title_template')
    <title>Tampil Data StokBarang</title>
@endsection

@section('body_template')

    <!-- buat menu -->
    <nav class="text-center mb-5">
        <button id="btn_tambah" class="bg-red-300 w-36 h-10 rounded-full border-2 border-black" onclick="gotoAdd()">Tambah</button>
        <button id="btn_refresh" class="bg-slate-300 w-36 h-10 rounded-full border-2 border-black">Refresh</button>
    </nav>

    <!-- buat table -->
     <table class="w-full">
        <!-- buat judul -->
        <thead>
            <tr class="bg-orange-600 h-10">
                <th class="border-2 border-rose-600 w-1/12">Aksi</th>
                <th class="border-2 border-rose-600 w-1/12">ID</th>
                <th class="bg-sky-400 border-2 border-rose-600 w-3/12">Nama Barang</th>
                <th class="border-2 border-rose-600 w-3/12">Harga</th>
                <th class="border-2 border-rose-600 w-2/12">Merek</th>
                <th class="border-2 border-rose-600 w-2/12">Gambar</th>
            </tr>
        </thead>
        <!-- buat isi -->
        <tbody class="text-center">
            @foreach ($result as $output)
            <tr>
                <td class="text-center border-2 border-rose-600">
                    <button id="btn-ubah" class="bg-sky-600 w-10 h-10 text-white">
                         <i class="fa-solid fa-pencil"></i>
                     </button>
                    <button id="btn-hapus" class="bg-rose-600 w-10 h-10 text-white" onclick="gotoDelete('{{$output->kode_karyawan}}')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
                <td class="text-center border-2 border-rose-600">{{$output->ID_StokBarang}}</p></td>
                <td class="text-justify border-2 border-rose-600 p-2.5">{{$output->Nama Barang_StokBarang}}</p></td>
                <td class="text-justify border-2 border-rose-600 px-2.5">{{$output->Harga_StokBarang}}</p></td>
                <td class="text-center border-2 border-rose-600">{{$output->Harga_StokBarang}}</p></td>
                <td class="text-justify border-2 border-rose-600 px-2.5">{{$output->Gambar_StokBarang}}</p></td>
            </tr>
            @endforeach
     </table>



     <!-- Custom javascript -->
     <script>
        // buat fungsi link untuk tambah data (js ke html/dom html)
        function gotoAdd()
        {
            location.href="{{url('/add')}}"
            // window.open("http://google.com")
        }

        // fungsi untuk refresh data (html ke js/dom js)
        document.querySelector("#btn_refresh").addEventListener('click',function(){
            location.href="{{url('/')}}"
        })

        // buat fungsi untuk hapus data
        function gotoDelete(kode)
        {
            //location.href="{{url('/delete')}}/"+kode
            if(confirm("Data"+kode+"Ingin Dihapus?") == true)
            {
                //buat variabel link
                const url = "{{url('/delete')}}/"+kode
                // asyncronous javascript (dengan fetch)
                fetch(url,{
                    method : "DELETE",
                    headers: {
                        'X-CSRF-Token': document.querySelector('meta[name="_token"]').content
                    }
                })
                //hasil response dari url
                .then((response) => response.json())
                // menampilkan hasil response (dari "then" sebelumnya)
                .then((output) => {
                    alert(output.pesan)
                    //panggil method dari btn_refresh
                    document.querySelector("#btn_refresh").click()
                })
                .catch((error) => alert("Data Gagal Dikirim !"))
            }
        }
     </script>
@endsection
