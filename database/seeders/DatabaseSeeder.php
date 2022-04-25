<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Infocategory;
use App\Models\Rankcategory;
use App\Models\Jobcategory;
use App\Models\Postcategory;
use App\Models\Filecategory;
use Symfony\Polyfill\Intl\Idn\Info;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User::factory(4)->create();
        // Post::factory(20)->create();

        User::create([
            'name'              => 'Lalu M. Fatwa Aulia',
            'username'          => 'crace007',
            'slug'              => 'crace007',
            'email'             => 'fatwa.tkj1@gmail.com',
            'tempat_lahir'      => 'Pejeruk',
            'tanggal_lahir'     => '1999-06-12',
            'jenis_kelamin'      => 'laki-laki',
            'umur'              => '23',
            'status_pekerjaan'  => 'THL',
            'status_hubungan'   => 'lanjang',
            'password'          => bcrypt('123akusayang'),
        ]);

        User::create([
            'name'              => 'Admin',
            'username'          => 'admin',
            'slug'              => 'admin',
            'email'             => 'bot.bapelkes@gmail.com',
            'tempat_lahir'      => 'bapelkes',
            'tanggal_lahir'     => '2022-3-12',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '1',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'lanjang',
            'password'          => bcrypt('admin'),
        ]);

        Filecategory::create([
            'name'  => 'Sertifikat',
            'slug'  => 'sertifikat',
        ]);
        Filecategory::create([
            'name'  => 'SK',
            'slug'  => 'sk',
        ]);
        Filecategory::create([
            'name'  => 'Data Lainnya',
            'slug'  => 'data-lainnya',
        ]);

        Postcategory::create([
            'name' => 'Berita',
            'slug' => 'berita'
        ]);

        Postcategory::create([
            'name' => 'Kegiatan',
            'slug' => 'kegiatan'
        ]);

        Postcategory::create([
            'name' => 'Artikel',
            'slug' => 'artikel'
        ]);

        Postcategory::create([
            'name' => 'Informasi',
            'slug' => 'informasi'
        ]);

        Infocategory::create([
            'name' => 'Chairman',
            'slug' => 'chairman'
        ]);
        Infocategory::create([
            'name' => 'Baner Carousel',
            'slug' => 'baner-carousel'
        ]);
        Infocategory::create([
            'name' => 'Story',
            'slug' => 'story'
        ]);
        Infocategory::create([
            'name' => 'Visi',
            'slug' => 'visi'
        ]);
        Infocategory::create([
            'name' => 'Misi',
            'slug' => 'misi'
        ]);

        //category Rank
        Rankcategory::create([
            'nama_pangkat' => 'JURU, I/c',
            'slug' => 'juru-i-c'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'JURU TINGKAT I, I/d',
            'slug' => 'juru-tingkat-i-i-d'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PENGATUR MUDA, II/a',
            'slug' => 'pengatur-muda-ii-a'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PENGATUR MUDA TINGKAT I, II/b',
            'slug' => 'pengatur-muda-tingkat-i-ii-b'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PENGATUR, II/c',
            'slug' => 'pengatur-ii-c'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PENGATUR TINGKAT I, II/d',
            'slug' => 'pengatur-tingkat-i-ii-d'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PENATA MUDA, III/a',
            'slug' => 'penata-muda-iii-a'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PENATA MUDA TINGKAT I, III/b',
            'slug' => 'penata-muda-tingkat-i-iii-b'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PENATA, III/c',
            'slug' => 'penata-iii-c'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PENATA TINGKAT I, III/d',
            'slug' => 'penata-tingkat-i-iii-d'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PEMBINA, IV/a',
            'slug' => 'pembina-iv-a'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PEMBINA TINGKAT I, IV/b',
            'slug' => 'pembina-tingkat-i-iv-b'
        ]);
        Rankcategory::create([
            'nama_pangkat' => 'PEMBINA UTAMA MUDA, IV/c',
            'slug' => 'pembina-utama-muda-iv-c'
        ]);

        //jabatan category
        Jobcategory::create([
            'nama_jabatan' => 'Kepala Bapelkes Mataram',
            'slug' => 'kepala-bapelkes-mataram'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Widyaiswara Ahli Madya',
            'slug' => 'widyaiswara-ahli-madya'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Kasi Kajian Mutu Pelatihan',
            'slug' => 'kasi-kajian-mutu-pelatihan'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Widyaiswara Ahli Muda',
            'slug' => 'widyaiswara-ahli-muda'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pengelola Kepegawaian',
            'slug' => 'pengelola-kepegawaian'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Membantu Keuangan SIMDA pada Bapelkes',
            'slug' => 'membantu-keuangan-simda-pada-bapelkes'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Perencanaan pada Bapelkes Mataram',
            'slug' => 'perencanaan-pada-bapelkes-mataram'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pengelola Data pada Seksi PP Bapelkes Mataram',
            'slug' => 'pengelola-data-pada-seksi-pp-bapelkes-mataram'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Bendahara pengeluaran',
            'slug' => 'bendahara-pengeluaran'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Analisis Diklat',
            'slug' => 'analisis-diklat'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pengadministrasi umum',
            'slug' => 'pengadministrasi-umum'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pengelola Data pada seksi KMP',
            'slug' => 'pengelola-data-pada-seksi-kmp'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pembantu Pengurus barang',
            'slug' => 'pembantu-pengurus-barang'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pengadministrasi Keuangan',
            'slug' => 'pengadministrasi-keuangan'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pengadministrasi Umum pada TU',
            'slug' => 'pengadministrasi-umum-pada-tu'
        ]);
    }
}
