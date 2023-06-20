@extends('template_StokBarang')
@section('title_template')
    <title>Tambah Data StokBarang</title>
@endsection

@section('body_template')
    <!-- section baris pertama -->
    <section class="flex w-full">
        <!-- section untuk Nama -->
        <section class="bg-sky-500 w-1/2">
            Nama
        </section>
        <!-- section untuk Harga -->
        <section class="bg-rose-500 w-1/2">
            Harga
        </section>
        <!-- object/kategori -->
            <input type="text" name="txt_merk" id="txt_merk" class="border-2 border-sky-500 rounded-lg h-8 focus:outline-none
            focus:ring focus:border-blue-500 my-2.5 px-2.5" maxlength="10">
    </section>

    <!-- section baris pertama -->
    <section class="flex w-full">
        <!-- section untuk Nama -->
        <section class="bg-sky-500 w-1/2">
            Nama
        </section>
        <!-- section untuk Harga -->
        <section class="bg-rose-500 w-1/2">
            Harga
        </section>
    </section>
@endsection
