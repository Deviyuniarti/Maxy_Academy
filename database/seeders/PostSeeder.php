<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Menemukan Jalan di Tengah Keramaian Jakarta',
            'slug' => 'menemukan-jalan-di-tengah-keramaian-jakarta',
            'content' => 'Jakarta selalu sibuk, tidak pernah sepi. Di tengah keramaian ini, aku belajar untuk menemukan jalanku sendiri. Meskipun tantangan datang silih berganti, setiap langkah yang kuambil adalah bagian dari perjalanan menuju impianku. Keterasingan yang ku rasakan justru membuatku lebih berani dan mandiri. Dengan setiap tantangan, aku menyadari bahwa keramaian ini mengajarkan aku untuk bertahan dan beradaptasi. Setiap suara yang ramai, setiap wajah asing, semuanya menjadi bagian dari pengalamanku. Dalam kesibukan ini, aku menemukan kesempatan untuk tumbuh, berinovasi, dan meraih mimpiku dengan sepenuh hati.',
            'author' => 'Anak Rantau',
        ]);

        Post::create([
            'title' => 'Kisah Perjuangan: Jarak Bukan Penghalang',
            'slug' => 'kisah-perjuangan-jarak-bukan-penghalang',
            'content' => 'Perjalanan jarak jauh adalah ujian yang menuntut ketahanan dan semangat yang tak pernah pudar. Jarak mungkin memisahkan fisik, tetapi tidak pernah memisahkan cinta dan dukungan dari keluarga. Setiap kilometer yang kulalui semakin memperkuat tekadku untuk membuktikan bahwa segala sesuatu mungkin dicapai jika kita berjuang dengan sepenuh hati. Aku belajar bahwa setiap langkah menuju impian adalah langkah berharga. Ketika lelah menghadang, ingatan akan orang-orang terkasih menjadi sumber energiku untuk terus bergerak maju. Setiap tantangan yang kuhadapi, aku anggap sebagai batu loncatan untuk meraih masa depan yang lebih cerah.',
            'author' => 'Anak Rantau',
        ]);

        Post::create([
            'title' => 'Berharap di Tengah Kerinduan',
            'slug' => 'berharap-di-tengah-kerinduan',
            'content' => 'Rindu akan keluarga seringkali menjadi dorongan untuk terus berjuang. Dalam setiap doa dan harapan, aku menemukan kekuatan baru untuk melangkah. Kerinduan ini mengingatkanku akan arti rumah, tempat di mana cintaku tumbuh dan mimpi-mimpiku dimulai. Setiap kali aku merasa lelah, aku mengingat semua pengorbanan yang telah dilakukan oleh keluarga untuk mendukungku. Dengan semangat itu, aku kembali bangkit dan berusaha lebih keras. Kerinduan bukanlah penghalang, tetapi penguat untuk mengejar impian yang lebih tinggi.',
            'author' => 'Anak Rantau',
        ]);

        Post::create([
            'title' => 'Menjaga Semangat di Tengah Kesulitan',
            'slug' => 'menjaga-semangat-di-tengah-kesulitan',
            'content' => 'Dalam setiap kesulitan, selalu ada pelajaran yang bisa dipetik. Ketika tantangan datang, aku berusaha untuk tidak menyerah. Setiap kegagalan adalah kesempatan untuk belajar dan tumbuh. Kesulitan mengajarkanku untuk bersyukur atas setiap hal kecil yang ada dalam hidupku. Aku percaya bahwa setiap tantangan yang kuhadapi adalah bagian dari proses untuk mencapai kesuksesan. Dengan semangat yang tidak pernah padam, aku terus berjuang dan yakin bahwa suatu hari nanti, semua usaha ini akan terbayar. Kesulitan hanyalah sementara, tetapi semangat juangku akan abadi.',
            'author' => 'Anak Rantau',
        ]);
    }
}
