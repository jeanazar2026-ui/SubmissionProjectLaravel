<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function profil()
    {
        $nama = 'Budi Santoso';
        $nim = '12345678';
        $prodi = 'Informatika';

        return view('mahasiswa.profil', compact(
            'nama',
            'nim',
            'prodi'
        ));
    }

    public function daftar()
    {
        $mahasiswa = [
            ['nama' => 'Budi Santoso', 'nim' => '12345678', 'ipk' => 3.80],
            ['nama' => 'Siti Aminah', 'nim' => '12345679', 'ipk' => 3.60],
            ['nama' => 'Andi Putra', 'nim' => '12345680', 'ipk' => 3.20],
            ['nama' => 'Dewi Lestari', 'nim' => '12345681', 'ipk' => 3.10],
            ['nama' => 'Rina Putri', 'nim' => '12345682', 'ipk' => 2.75],
        ];

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function detail($nim)
    {
        $mahasiswa = [
            ['nama' => 'Budi Santoso', 'nim' => '12345678', 'ipk' => 3.80],
            ['nama' => 'Siti Aminah', 'nim' => '12345679', 'ipk' => 3.60],
            ['nama' => 'Andi Putra', 'nim' => '12345680', 'ipk' => 3.20],
            ['nama' => 'Dewi Lestari', 'nim' => '12345681', 'ipk' => 3.10],
            ['nama' => 'Rina Putri', 'nim' => '12345682', 'ipk' => 2.75],
        ];

        foreach ($mahasiswa as $m) {
            if ($m['nim'] === $nim) {
                return view('mahasiswa.detail', compact('m'));
            }
        }

        abort(404);
    }
}