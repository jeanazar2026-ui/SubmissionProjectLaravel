@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
    <h1>Detail Mahasiswa</h1>

    <x-alert tipe="info">
        Informasi lengkap mahasiswa.
    </x-alert>

    <p>Nama: {{ $m['nama'] }}</p>
    <p>NIM: {{ $m['nim'] }}</p>
    <p>IPK: {{ number_format($m['ipk'], 2) }}</p>

    <a href="{{ route('mahasiswa.index') }}">Kembali ke daftar</a>
@endsection