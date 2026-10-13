@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('content')
    <h1>Profil Mahasiswa</h1>

    <x-alert tipe="info">
        Berikut adalah informasi mahasiswa.
    </x-alert>

    <p>Nama: {{ $nama }}</p>
    <p>NIM: {{ $nim }}</p>
    <p>Program Studi: {{ $prodi }}</p>
@endsection