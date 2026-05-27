<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\KategoriBukuRelasi;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $buku = [
            // Teknologi (id_kategori: 1)
            ['judul' => 'Belajar Laravel dari Nol', 'penulis' => 'Andi Setiawan', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2022, 'kategori' => 1],
            ['judul' => 'Pemrograman Python Modern', 'penulis' => 'Budi Raharjo', 'penerbit' => 'Informatika', 'tahun_terbit' => 2023, 'kategori' => 1],
            ['judul' => 'Artificial Intelligence Dasar', 'penulis' => 'Siti Nurhaliza', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2021, 'kategori' => 1],
            ['judul' => 'Web Development dengan React', 'penulis' => 'Dian Pratama', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2022, 'kategori' => 1],
            ['judul' => 'Database MySQL Lengkap', 'penulis' => 'Rudi Hermawan', 'penerbit' => 'Andi Publisher', 'tahun_terbit' => 2020, 'kategori' => 1],
            ['judul' => 'Keamanan Jaringan Komputer', 'penulis' => 'Fajar Nugroho', 'penerbit' => 'Informatika', 'tahun_terbit' => 2021, 'kategori' => 1],
            ['judul' => 'Cloud Computing untuk Pemula', 'penulis' => 'Hendra Wijaya', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2023, 'kategori' => 1],
            ['judul' => 'Machine Learning dengan Python', 'penulis' => 'Irwan Kusuma', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2022, 'kategori' => 1],
            ['judul' => 'Internet of Things', 'penulis' => 'Joko Susilo', 'penerbit' => 'Andi Publisher', 'tahun_terbit' => 2021, 'kategori' => 1],
            ['judul' => 'Pemrograman Mobile Android', 'penulis' => 'Kartika Sari', 'penerbit' => 'Informatika', 'tahun_terbit' => 2023, 'kategori' => 1],
            ['judul' => 'DevOps dan CI/CD', 'penulis' => 'Luki Prabowo', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2022, 'kategori' => 1],
            ['judul' => 'Algoritma dan Struktur Data', 'penulis' => 'Maya Indah', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2020, 'kategori' => 1],
            ['judul' => 'UI/UX Design Principles', 'penulis' => 'Nanda Putra', 'penerbit' => 'Andi Publisher', 'tahun_terbit' => 2023, 'kategori' => 1],
            ['judul' => 'Blockchain Technology', 'penulis' => 'Oki Firmansyah', 'penerbit' => 'Informatika', 'tahun_terbit' => 2022, 'kategori' => 1],
            ['judul' => 'Data Science untuk Bisnis', 'penulis' => 'Putri Rahayu', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2023, 'kategori' => 1],

            // Fiksi (id_kategori: 2)
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005, 'kategori' => 2],
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'penerbit' => 'Lentera Dipantara', 'tahun_terbit' => 1980, 'kategori' => 2],
            ['judul' => 'Negeri 5 Menara', 'penulis' => 'Ahmad Fuadi', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2009, 'kategori' => 2],
            ['judul' => 'Sang Pemimpi', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2006, 'kategori' => 2],
            ['judul' => 'Dilan 1990', 'penulis' => 'Pidi Baiq', 'penerbit' => 'Pastel Books', 'tahun_terbit' => 2014, 'kategori' => 2],
            ['judul' => 'Perahu Kertas', 'penulis' => 'Dee Lestari', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2009, 'kategori' => 2],
            ['judul' => 'Supernova', 'penulis' => 'Dee Lestari', 'penerbit' => 'Truedee Books', 'tahun_terbit' => 2001, 'kategori' => 2],
            ['judul' => 'Ronggeng Dukuh Paruk', 'penulis' => 'Ahmad Tohari', 'penerbit' => 'Gramedia', 'tahun_terbit' => 1982, 'kategori' => 2],
            ['judul' => 'Ayat-Ayat Cinta', 'penulis' => 'Habiburrahman', 'penerbit' => 'Republika', 'tahun_terbit' => 2004, 'kategori' => 2],
            ['judul' => 'Pulang', 'penulis' => 'Tere Liye', 'penerbit' => 'Republika', 'tahun_terbit' => 2015, 'kategori' => 2],
            ['judul' => 'Hujan', 'penulis' => 'Tere Liye', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 2],
            ['judul' => 'Bintang', 'penulis' => 'Tere Liye', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 2],
            ['judul' => 'Rembulan Tenggelam di Wajahmu', 'penulis' => 'Tere Liye', 'penerbit' => 'Republika', 'tahun_terbit' => 2009, 'kategori' => 2],
            ['judul' => 'Hafalan Shalat Delisa', 'penulis' => 'Tere Liye', 'penerbit' => 'Republika', 'tahun_terbit' => 2005, 'kategori' => 2],
            ['judul' => 'Tentang Kamu', 'penulis' => 'Tere Liye', 'penerbit' => 'Republika', 'tahun_terbit' => 2016, 'kategori' => 2],

            // Non-Fiksi (id_kategori: 3)
            ['judul' => 'Atomic Habits', 'penulis' => 'James Clear', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2019, 'kategori' => 3],
            ['judul' => 'The 7 Habits', 'penulis' => 'Stephen Covey', 'penerbit' => 'Binarupa Aksara', 'tahun_terbit' => 2013, 'kategori' => 3],
            ['judul' => 'Ikigai', 'penulis' => 'Hector Garcia', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2018, 'kategori' => 3],
            ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'penerbit' => 'Kompas', 'tahun_terbit' => 2018, 'kategori' => 3],
            ['judul' => 'Deep Work', 'penulis' => 'Cal Newport', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2020, 'kategori' => 3],
            ['judul' => 'Mindset', 'penulis' => 'Carol Dweck', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 3],
            ['judul' => 'Thinking Fast and Slow', 'penulis' => 'Daniel Kahneman', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2012, 'kategori' => 3],
            ['judul' => 'Sapiens', 'penulis' => 'Yuval Noah Harari', 'penerbit' => 'KPG', 'tahun_terbit' => 2017, 'kategori' => 3],
            ['judul' => 'Homo Deus', 'penulis' => 'Yuval Noah Harari', 'penerbit' => 'KPG', 'tahun_terbit' => 2018, 'kategori' => 3],
            ['judul' => 'Start with Why', 'penulis' => 'Simon Sinek', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 3],
            ['judul' => 'The Power of Now', 'penulis' => 'Eckhart Tolle', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 3],
            ['judul' => 'Man Search for Meaning', 'penulis' => 'Viktor Frankl', 'penerbit' => 'Noura Books', 'tahun_terbit' => 2016, 'kategori' => 3],
            ['judul' => 'Quiet', 'penulis' => 'Susan Cain', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 3],
            ['judul' => 'Grit', 'penulis' => 'Angela Duckworth', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 3],
            ['judul' => 'The Subtle Art', 'penulis' => 'Mark Manson', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2018, 'kategori' => 3],

            // Sains (id_kategori: 4)
            ['judul' => 'Fisika Dasar Jilid 1', 'penulis' => 'Halliday Resnick', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2010, 'kategori' => 4],
            ['judul' => 'Kimia Organik', 'penulis' => 'Fessenden', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2011, 'kategori' => 4],
            ['judul' => 'Biologi Campbell', 'penulis' => 'Neil Campbell', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2012, 'kategori' => 4],
            ['judul' => 'A Brief History of Time', 'penulis' => 'Stephen Hawking', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 4],
            ['judul' => 'The Gene', 'penulis' => 'Siddhartha Mukherjee', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2018, 'kategori' => 4],
            ['judul' => 'Cosmos', 'penulis' => 'Carl Sagan', 'penerbit' => 'KPG', 'tahun_terbit' => 2015, 'kategori' => 4],
            ['judul' => 'The Selfish Gene', 'penulis' => 'Richard Dawkins', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 4],
            ['judul' => 'Alam Semesta Einstein', 'penulis' => 'Nigel Calder', 'penerbit' => 'KPG', 'tahun_terbit' => 2005, 'kategori' => 4],
            ['judul' => 'Matematika Diskrit', 'penulis' => 'Rinaldi Munir', 'penerbit' => 'Informatika', 'tahun_terbit' => 2016, 'kategori' => 4],
            ['judul' => 'Pengantar Statistika', 'penulis' => 'Sudjana', 'penerbit' => 'Tarsito', 'tahun_terbit' => 2005, 'kategori' => 4],

            // Sejarah (id_kategori: 5)
            ['judul' => 'Sejarah Indonesia Modern', 'penulis' => 'M.C. Ricklefs', 'penerbit' => 'Serambi', 'tahun_terbit' => 2008, 'kategori' => 5],
            ['judul' => 'Perang Dunia II', 'penulis' => 'Antony Beevor', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 5],
            ['judul' => 'Soekarno Biografi', 'penulis' => 'Cindy Adams', 'penerbit' => 'Hasta Mitra', 'tahun_terbit' => 2007, 'kategori' => 5],
            ['judul' => 'Revolusi Prancis', 'penulis' => 'William Doyle', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2013, 'kategori' => 5],
            ['judul' => 'Sejarah Peradaban Islam', 'penulis' => 'Philip Hitti', 'penerbit' => 'Logos', 'tahun_terbit' => 2010, 'kategori' => 5],
            ['judul' => 'Indonesia dalam Arus Sejarah', 'penulis' => 'Taufik Abdullah', 'penerbit' => 'Ichtiar Baru', 'tahun_terbit' => 2012, 'kategori' => 5],
            ['judul' => 'Majapahit', 'penulis' => 'Slamet Muljana', 'penerbit' => 'LKiS', 'tahun_terbit' => 2006, 'kategori' => 5],
            ['judul' => 'Sejarah Dunia yang Disembunyikan', 'penulis' => 'Jonathan Black', 'penerbit' => 'Ufuk Press', 'tahun_terbit' => 2010, 'kategori' => 5],
            ['judul' => 'Guns Germs and Steel', 'penulis' => 'Jared Diamond', 'penerbit' => 'KPG', 'tahun_terbit' => 2014, 'kategori' => 5],
            ['judul' => 'Perang Diponegoro', 'penulis' => 'Peter Carey', 'penerbit' => 'KPG', 'tahun_terbit' => 2015, 'kategori' => 5],

            // Pendidikan (id_kategori: 6)
            ['judul' => 'Menjadi Guru Profesional', 'penulis' => 'E. Mulyasa', 'penerbit' => 'Remaja Rosdakarya', 'tahun_terbit' => 2013, 'kategori' => 6],
            ['judul' => 'Psikologi Pendidikan', 'penulis' => 'Syah Muhibbin', 'penerbit' => 'Remaja Rosdakarya', 'tahun_terbit' => 2014, 'kategori' => 6],
            ['judul' => 'Kurikulum dan Pembelajaran', 'penulis' => 'Oemar Hamalik', 'penerbit' => 'Bumi Aksara', 'tahun_terbit' => 2011, 'kategori' => 6],
            ['judul' => 'Belajar dan Pembelajaran', 'penulis' => 'Dimyati', 'penerbit' => 'Rineka Cipta', 'tahun_terbit' => 2009, 'kategori' => 6],
            ['judul' => 'Evaluasi Pembelajaran', 'penulis' => 'Nana Sudjana', 'penerbit' => 'Remaja Rosdakarya', 'tahun_terbit' => 2012, 'kategori' => 6],
            ['judul' => 'Metode Penelitian Pendidikan', 'penulis' => 'Sugiyono', 'penerbit' => 'Alfabeta', 'tahun_terbit' => 2015, 'kategori' => 6],
            ['judul' => 'Administrasi Pendidikan', 'penulis' => 'Daryanto', 'penerbit' => 'Gava Media', 'tahun_terbit' => 2011, 'kategori' => 6],
            ['judul' => 'Pendidikan Karakter', 'penulis' => 'Zubaedi', 'penerbit' => 'Kencana', 'tahun_terbit' => 2013, 'kategori' => 6],
            ['judul' => 'Media Pembelajaran', 'penulis' => 'Azhar Arsyad', 'penerbit' => 'Raja Grafindo', 'tahun_terbit' => 2014, 'kategori' => 6],
            ['judul' => 'Strategi Pembelajaran Aktif', 'penulis' => 'Hisyam Zaini', 'penerbit' => 'CTSD', 'tahun_terbit' => 2010, 'kategori' => 6],

            // Bisnis (id_kategori: 7)
            ['judul' => 'Rich Dad Poor Dad', 'penulis' => 'Robert Kiyosaki', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 7],
            ['judul' => 'Zero to One', 'penulis' => 'Peter Thiel', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 7],
            ['judul' => 'Good to Great', 'penulis' => 'Jim Collins', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 7],
            ['judul' => 'The Lean Startup', 'penulis' => 'Eric Ries', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 7],
            ['judul' => 'Blue Ocean Strategy', 'penulis' => 'W. Chan Kim', 'penerbit' => 'Serambi', 'tahun_terbit' => 2016, 'kategori' => 7],
            ['judul' => 'Built to Last', 'penulis' => 'Jim Collins', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 7],
            ['judul' => 'The E-Myth Revisited', 'penulis' => 'Michael Gerber', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2013, 'kategori' => 7],
            ['judul' => 'Thinking Grow Rich', 'penulis' => 'Napoleon Hill', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 7],
            ['judul' => 'The Millionaire Fastlane', 'penulis' => 'MJ DeMarco', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 7],
            ['judul' => 'Rework', 'penulis' => 'Jason Fried', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2013, 'kategori' => 7],
            ['judul' => 'Influence', 'penulis' => 'Robert Cialdini', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 7],
            ['judul' => 'Marketing 4.0', 'penulis' => 'Philip Kotler', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 7],
            ['judul' => 'Manajemen Keuangan', 'penulis' => 'Brigham Houston', 'penerbit' => 'Salemba Empat', 'tahun_terbit' => 2013, 'kategori' => 7],
            ['judul' => 'Akuntansi Dasar', 'penulis' => 'Soemarso', 'penerbit' => 'Salemba Empat', 'tahun_terbit' => 2010, 'kategori' => 7],
            ['judul' => 'Ekonomi Mikro', 'penulis' => 'N. Gregory Mankiw', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2012, 'kategori' => 7],
        ];

        foreach ($buku as $data) {
            $b = Buku::create([
                'judul' => $data['judul'],
                'penulis' => $data['penulis'],
                'penerbit' => $data['penerbit'],
                'tahun_terbit' => $data['tahun_terbit'],
            ]);

            KategoriBukuRelasi::create([
                'id_buku' => $b->id,
                'id_kategori' => $data['kategori'],
            ]);
        }
    }
}