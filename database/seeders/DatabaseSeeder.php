<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Role;
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

        //user
        User::create([
            'name'              => 'Admin',
            'role_id'           => '1',
            'username'          => 'admin',
            'slug'              => 'admin',
            'email'             => 'bot.bapelkes@gmail.com',
            'tempat_lahir'      => 'bapelkes',
            'tanggal_lahir'     => '2022-3-12',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '1',
            'status_pekerjaan'  => 'Admin',
            'status_hubungan'   => 'lanjang',
            'password'          => bcrypt('admin'),
        ]);

        User::create([
            'name'              => 'Khaerul Anwar,SKM.M.Kes',
            'role_id'           => '2',
            'username'          => 'Khaerul',
            'slug'              => 'khaerul',
            'email'             => 'khaerulibnuanwar@gmail.com',
            'tempat_lahir'      => 'Lombok Utara',
            'tanggal_lahir'     => '1964-12-31',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '57',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Mustika  Hidayati,SKM.,M.Kes',
            'role_id'           => '2',
            'username'          => 'Mustika',
            'slug'              => 'mustika',
            'email'             => 'mustika_12@yahoo.co.id',
            'tempat_lahir'      => 'Jakarta',
            'tanggal_lahir'     => '1963-04-06',
            'jenis_kelamin'     => 'perempuan',
            'umur'              => '58',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'dr. IGAR Astarini, M.Kes',
            'role_id'           => '2',
            'username'          => 'Astarini',
            'slug'              => 'astarini',
            'email'             => 'igar_dr@yahoo.co.id',
            'tempat_lahir'      => 'Penebel',
            'tanggal_lahir'     => '1966-06-22',
            'jenis_kelamin'     => 'perempuani',
            'umur'              => '55',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Anak Agung Istri Agung Trisnawati, S.Si.,M.Pd',
            'role_id'           => '2',
            'username'          => 'Agung',
            'slug'              => 'agung',
            'email'             => 'agungtrisna2373@gmail.com',
            'tempat_lahir'      => 'Gianyar',
            'tanggal_lahir'     => '1973-04-23',
            'jenis_kelamin'     => 'perempuan',
            'umur'              => '48',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'H. Mulyadi Fadjar, S.Kp.M.Kes',
            'role_id'           => '2',
            'username'          => 'Fadjar',
            'slug'              => 'fadjar',
            'email'             => 'mulyadifadjar930@gmail.com',
            'tempat_lahir'      => 'Sumenep',
            'tanggal_lahir'     => '1970-07-26',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '50',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Ali Wardana.SKM.M,Si',
            'role_id'           => '2',
            'username'          => 'Ali',
            'slug'              => 'ali',
            'email'             => 'ali.wardanaa01@gmail.com',
            'tempat_lahir'      => 'Surabaya',
            'tanggal_lahir'     => '1973-11-01',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '48',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Lalu Ahmad Yani,SKM., MPH.',
            'role_id'           => '2',
            'username'          => 'Yani',
            'slug'              => 'yani',
            'email'             => 'laluahmadyani4@gmail.com',
            'tempat_lahir'      => 'Lombok Tengah',
            'tanggal_lahir'     => '1967-03-14',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '54',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Nani Fitriani, S.Pd,MPH',
            'role_id'           => '2',
            'username'          => 'Nani',
            'slug'              => 'nani',
            'email'             => 'finan.mataram@gmail.com',
            'tempat_lahir'      => 'Mataram',
            'tanggal_lahir'     => '1971-11-24',
            'jenis_kelamin'     => 'perempuan',
            'umur'              => '49',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'L. Muh. Harmain Siswanto,S.Kep.Ns.M.Kep',
            'role_id'           => '2',
            'username'          => 'Siswanto',
            'slug'              => 'siswanto',
            'email'             => 'lalusiswantoui@gmail.com',
            'tempat_lahir'      => 'Lombok Timur',
            'tanggal_lahir'     => '1983-05-09',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '38',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Zukhairiyati S.Sos',
            'role_id'           => '2',
            'username'          => 'Zukhairiyati',
            'slug'              => 'zukhairiyati',
            'email'             => 'hj.zukhairiyati1966@gmail.com',
            'tempat_lahir'      => 'Lombok Tengah',
            'tanggal_lahir'     => '1966-12-31',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '57',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Mukhtardi,S.Kep.,Ns.,M.P.H',
            'role_id'           => '2',
            'username'          => 'Mukhtardi',
            'slug'              => 'mukhtardi',
            'email'             => 'arkhanmyson@gmail.com',
            'tempat_lahir'      => 'Lombok Barat',
            'tanggal_lahir'     => '1983-01-13',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '38',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Wahida Nurusshobah, SKM.,M.Kes',
            'role_id'           => '2',
            'username'          => 'Wahida',
            'slug'              => 'wahida',
            'email'             => 'wahida.nurusshobah@gmail.com',
            'tempat_lahir'      => 'Lombok Timur',
            'tanggal_lahir'     => '1983-11-20',
            'jenis_kelamin'     => 'perempuan',
            'umur'              => '38',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Bq.Citra Lestari,S.ST.M.Keb',
            'role_id'           => '2',
            'username'          => 'Citra',
            'slug'              => 'citra',
            'email'             => 'bq.citra@gmail.com',
            'tempat_lahir'      => 'Mataram',
            'tanggal_lahir'     => '1980-02-18',
            'jenis_kelamin'     => 'perempuan',
            'umur'              => '40',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Arif rahman,SKM.MPH',
            'role_id'           => '2',
            'username'          => 'Arif',
            'slug'              => 'arif',
            'email'             => 'rifombojooke@gmail.com',
            'tempat_lahir'      => 'Rabangodu',
            'tanggal_lahir'     => '1978-08-18',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '42',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Ari Kusmiantini,S.Kep.Ners',
            'role_id'           => '2',
            'username'          => 'Ari',
            'slug'              => 'ari',
            'email'             => 'kusmiantini@gmail.com',
            'tempat_lahir'      => 'Mataram',
            'tanggal_lahir'     => '1983-09-27',
            'jenis_kelamin'     => 'perempuan',
            'umur'              => '38',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Dian Fajriani,S.Kep.Ns',
            'role_id'           => '2',
            'username'          => 'Dian',
            'slug'              => 'dian',
            'email'             => 'dianfajriani16@gmail.com',
            'tempat_lahir'      => 'Lombok Tengah',
            'tanggal_lahir'     => '1984-05-06',
            'jenis_kelamin'     => 'perempuan',
            'umur'              => '37',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Ahmad Idrus',
            'role_id'           => '2',
            'username'          => 'Idrus',
            'slug'              => 'idrus',
            'email'             => 'idrusahmad1967@gmail.com',
            'tempat_lahir'      => 'Ampenan',
            'tanggal_lahir'     => '1967-10-13',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '54',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Hery Pranoto,SKM',
            'role_id'           => '2',
            'username'          => 'Hery',
            'slug'              => 'hery',
            'email'             => 'pranotohery@yahoo.com',
            'tempat_lahir'      => 'Jawa Tengah',
            'tanggal_lahir'     => '1978-11-21',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '42',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Siti Nurlaila Ahyani,SE',
            'role_id'           => '2',
            'username'          => 'Nurlaila',
            'slug'              => 'nurlaila',
            'email'             => 'el.ahyani@yahoo.com',
            'tempat_lahir'      => 'Mataram',
            'tanggal_lahir'     => '1977-08-03',
            'jenis_kelamin'     => 'perempuan',
            'umur'              => '44',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Mawardi',
            'role_id'           => '2',
            'username'          => 'Mawardi',
            'slug'              => 'mawardi',
            'email'             => 'mawardibapelkes16@gmail.com',
            'tempat_lahir'      => 'Lombok Timur',
            'tanggal_lahir'     => '1970-12-31',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '50',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Abdurrahman',
            'role_id'           => '2',
            'username'          => 'Abdurrahman',
            'slug'              => 'abdurrahman',
            'email'             => 'abdurrahmanjengguar@gmail.com',
            'tempat_lahir'      => 'Lombok Tengah',
            'tanggal_lahir'     => '1977-12-31',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '50',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Kamarudin',
            'role_id'           => '2',
            'username'          => 'Kamarudin',
            'slug'              => 'kamarudin',
            'email'             => 'kamarudikes4t@gmail.com',
            'tempat_lahir'      => 'Lombok Barat',
            'tanggal_lahir'     => '1974-12-31',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '46',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        User::create([
            'name'              => 'Nuridin',
            'role_id'           => '2',
            'username'          => 'Nuridin',
            'slug'              => 'nuridin',
            'email'             => 'nuridinidin424@gmail.com',
            'tempat_lahir'      => 'Mataram',
            'tanggal_lahir'     => '1976-10-26',
            'jenis_kelamin'     => 'laki-laki',
            'umur'              => '45',
            'status_pekerjaan'  => 'ASN',
            'status_hubungan'   => 'Menikah',
            'password'          => bcrypt('password'),
        ]);

        Role::create([
            'nama' => 'Admin',
        ]);
        Role::create([
            'nama' => 'Member',
        ]);
        Role::create([
            'nama' => 'User',
        ]);

        //filecategory
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
            'nama_jabatan' => 'Fungsional Widyaiswara',
            'slug' => 'fungsional-widyaiswara'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Kepala Sub. Bagian Adum',
            'slug' => 'kepala-sub-bagian-adum'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Perencanaan/Penyusunan Program Anggaran dan Pelaporan',
            'slug' => 'perencanaan-penyusunan-program-anggaran-dan-pelaporan'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Bendahara',
            'slug' => 'bendahara'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pemeliharan Sarana dan Prasarana',
            'slug' => 'pemeliharan-sarana-dan-prasarana'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pengadministrasian Umum',
            'slug' => 'pengadministrasian-umum'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Pramu Bakti',
            'slug' => 'pramu-bakti'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Analis Data dan Informasi',
            'slug' => 'analis-data-dan-informasi'
        ]);
        Jobcategory::create([
            'nama_jabatan' => 'Analis Diklat',
            'slug' => 'analis-diklat'
        ]);
    }
}
