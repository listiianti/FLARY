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
            // Teknologi (15 buku)
            ['judul' => 'Cyber Security Fundamentals', 'penulis' => 'Qori Hendra', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2022, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Jaringan Komputer Modern', 'penulis' => 'Reza Fahmi', 'penerbit' => 'Informatika', 'tahun_terbit' => 2021, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Docker dan Kubernetes', 'penulis' => 'Sandi Wijaya', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2023, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Vue JS dari Nol', 'penulis' => 'Toni Kusuma', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2022, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Flutter Mobile Development', 'penulis' => 'Umar Hakim', 'penerbit' => 'Andi Publisher', 'tahun_terbit' => 2023, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Python untuk Data Science', 'penulis' => 'Andi Wijaya', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2022, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Machine Learning Dasar', 'penulis' => 'Budi Hartono', 'penerbit' => 'Informatika', 'tahun_terbit' => 2023, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Belajar React JS', 'penulis' => 'Citra Dewi', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2022, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Database MySQL Lanjut', 'penulis' => 'Dedi Kurniawan', 'penerbit' => 'Andi Publisher', 'tahun_terbit' => 2021, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Pemrograman Java Modern', 'penulis' => 'Eko Prasetyo', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2020, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Cloud Computing dengan AWS', 'penulis' => 'Fajar Nugroho', 'penerbit' => 'Informatika', 'tahun_terbit' => 2023, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Artificial Intelligence Terapan', 'penulis' => 'Gilang Ramadhan', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2023, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Pemrograman C++ untuk Pemula', 'penulis' => 'Hendra Gunawan', 'penerbit' => 'Andi Publisher', 'tahun_terbit' => 2019, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'DevOps dan CI/CD Pipeline', 'penulis' => 'Irfan Maulana', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2022, 'kategori' => 1, 'stok' => 7],
            ['judul' => 'Blockchain untuk Pemula', 'penulis' => 'Joko Susilo', 'penerbit' => 'Informatika', 'tahun_terbit' => 2021, 'kategori' => 1, 'stok' => 7],

            // Fiksi (20 buku)
            ['judul' => 'Ranah 3 Warna', 'penulis' => 'Ahmad Fuadi', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2011, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Edensor', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2007, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Maryamah Karpov', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2008, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Rindu', 'penulis' => 'Tere Liye', 'penerbit' => 'Republika', 'tahun_terbit' => 2014, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Daun yang Jatuh', 'penulis' => 'Tere Liye', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2010, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Negeri 5 Menara', 'penulis' => 'Ahmad Fuadi', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2009, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Bumi', 'penulis' => 'Tere Liye', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Hujan', 'penulis' => 'Tere Liye', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Pulang', 'penulis' => 'Tere Liye', 'penerbit' => 'Republika', 'tahun_terbit' => 2015, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Perahu Kertas', 'penulis' => 'Dee Lestari', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2009, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Supernova', 'penulis' => 'Dee Lestari', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2001, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Dilan 1990', 'penulis' => 'Pidi Baiq', 'penerbit' => 'Pastel Books', 'tahun_terbit' => 2014, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Ayat-Ayat Cinta', 'penulis' => 'Habiburrahman El Shirazy', 'penerbit' => 'Republika', 'tahun_terbit' => 2004, 'kategori' => 2, 'stok' => 7],
            ['judul' => 'Ketika Mas Gagah Pergi', 'penulis' => 'Helvy Tiana Rosa', 'penerbit' => 'Indiva', 'tahun_terbit' => 2015, 'kategori' => 2, 'stok' => 7],

            // Non-Fiksi (13 buku)
            ['judul' => 'The 48 Laws of Power', 'penulis' => 'Robert Greene', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Outliers', 'penulis' => 'Malcolm Gladwell', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Blink', 'penulis' => 'Malcolm Gladwell', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'The Tipping Point', 'penulis' => 'Malcolm Gladwell', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2013, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Essentialism', 'penulis' => 'Greg McKeown', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Atomic Habits', 'penulis' => 'James Clear', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2019, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Deep Work', 'penulis' => 'Cal Newport', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2018, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'The Power of Now', 'penulis' => 'Eckhart Tolle', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Ikigai', 'penulis' => 'Hector Garcia', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2020, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'The Subtle Art of Not Giving a F*ck', 'penulis' => 'Mark Manson', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2018, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'penerbit' => 'Kompas', 'tahun_terbit' => 2018, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Start With Why', 'penulis' => 'Simon Sinek', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 3, 'stok' => 7],
            ['judul' => 'Sapiens', 'penulis' => 'Yuval Noah Harari', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 3, 'stok' => 7],

            // Sains (12 buku)
            ['judul' => 'Fisika Dasar Jilid 2', 'penulis' => 'Halliday Resnick', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2011, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Kimia Dasar', 'penulis' => 'Raymond Chang', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2010, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Biologi Molekuler', 'penulis' => 'Lewin', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2013, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Astronomi Modern', 'penulis' => 'Budi Santoso', 'penerbit' => 'ITB Press', 'tahun_terbit' => 2015, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Kalkulus Lanjut', 'penulis' => 'Purcell', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2010, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Fisika Kuantum', 'penulis' => 'Arif Budiman', 'penerbit' => 'ITB Press', 'tahun_terbit' => 2016, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Genetika Modern', 'penulis' => 'Bambang Sutrisno', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2014, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Kimia Organik', 'penulis' => 'Paula Bruice', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2012, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Statistika Dasar', 'penulis' => 'Sudjana', 'penerbit' => 'Tarsito', 'tahun_terbit' => 2011, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Ekologi Lingkungan', 'penulis' => 'Dedy Setiawan', 'penerbit' => 'UI Press', 'tahun_terbit' => 2013, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Termodinamika Teknik', 'penulis' => 'Cengel Boles', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2010, 'kategori' => 4, 'stok' => 7],
            ['judul' => 'Pengantar Ilmu Komputer', 'penulis' => 'Eko Nugroho', 'penerbit' => 'Andi Publisher', 'tahun_terbit' => 2015, 'kategori' => 4, 'stok' => 7],

            // Sejarah (13 buku)
            ['judul' => 'Sejarah Kerajaan Sriwijaya', 'penulis' => 'Slamet Muljana', 'penerbit' => 'LKiS', 'tahun_terbit' => 2008, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Perang Kemerdekaan Indonesia', 'penulis' => 'Nugroho Notosusanto', 'penerbit' => 'Balai Pustaka', 'tahun_terbit' => 2010, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Sejarah Asia Tenggara', 'penulis' => 'D.G.E. Hall', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2012, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Hatta Biografi Politik', 'penulis' => 'Deliar Noer', 'penerbit' => 'LP3ES', 'tahun_terbit' => 2009, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Sejarah Perang Dunia I', 'penulis' => 'John Keegan', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Sejarah Indonesia Modern', 'penulis' => 'M.C. Ricklefs', 'penerbit' => 'Gadjah Mada University Press', 'tahun_terbit' => 2008, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Bung Karno Penyambung Lidah Rakyat', 'penulis' => 'Cindy Adams', 'penerbit' => 'Media Pressindo', 'tahun_terbit' => 2007, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Perang Diponegoro', 'penulis' => 'Peter Carey', 'penerbit' => 'Kompas', 'tahun_terbit' => 2015, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Sejarah Perang Dunia II', 'penulis' => 'Antony Beevor', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2013, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Majapahit Peradaban Maritim', 'penulis' => 'Agus Aris Munandar', 'penerbit' => 'Wedatama', 'tahun_terbit' => 2011, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Revolusi Prancis', 'penulis' => 'William Doyle', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Sejarah Peradaban Islam', 'penulis' => 'Philip Hitti', 'penerbit' => 'Ikrar Mandiri', 'tahun_terbit' => 2010, 'kategori' => 5, 'stok' => 7],
            ['judul' => 'Indonesia dalam Arus Sejarah', 'penulis' => 'Taufik Abdullah', 'penerbit' => 'Ichtiar Baru', 'tahun_terbit' => 2012, 'kategori' => 5, 'stok' => 7],

            // Pendidikan (11 buku)
            ['judul' => 'Filsafat Pendidikan', 'penulis' => 'Imam Barnadib', 'penerbit' => 'FIP IKIP', 'tahun_terbit' => 2010, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Sosiologi Pendidikan', 'penulis' => 'Nasution', 'penerbit' => 'Bumi Aksara', 'tahun_terbit' => 2011, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Manajemen Sekolah', 'penulis' => 'Wahjosumidjo', 'penerbit' => 'Raja Grafindo', 'tahun_terbit' => 2013, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Teknologi Pembelajaran', 'penulis' => 'Yusufhadi Miarso', 'penerbit' => 'Kencana', 'tahun_terbit' => 2012, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Pengembangan Kurikulum', 'penulis' => 'Nana Syaodih', 'penerbit' => 'Remaja Rosdakarya', 'tahun_terbit' => 2014, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Psikologi Pendidikan', 'penulis' => 'Santrock', 'penerbit' => 'Salemba Humanika', 'tahun_terbit' => 2014, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Evaluasi Pembelajaran', 'penulis' => 'Zainal Arifin', 'penerbit' => 'Remaja Rosdakarya', 'tahun_terbit' => 2012, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Strategi Pembelajaran', 'penulis' => 'Wina Sanjaya', 'penerbit' => 'Kencana', 'tahun_terbit' => 2013, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Belajar dan Pembelajaran', 'penulis' => 'Dimyati', 'penerbit' => 'Rineka Cipta', 'tahun_terbit' => 2011, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Pendidikan Karakter', 'penulis' => 'Muchlas Samani', 'penerbit' => 'Remaja Rosdakarya', 'tahun_terbit' => 2012, 'kategori' => 6, 'stok' => 7],
            ['judul' => 'Media Pembelajaran', 'penulis' => 'Azhar Arsyad', 'penerbit' => 'Raja Grafindo', 'tahun_terbit' => 2013, 'kategori' => 6, 'stok' => 7],

            // Bisnis (11 buku)
            ['judul' => 'Crush It', 'penulis' => 'Gary Vaynerchuk', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'The Hard Thing About Hard Things', 'penulis' => 'Ben Horowitz', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'Delivering Happiness', 'penulis' => 'Tony Hsieh', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'Ekonomi Makro', 'penulis' => 'N. Gregory Mankiw', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2013, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'Pengantar Bisnis', 'penulis' => 'Jeff Madura', 'penerbit' => 'Salemba Empat', 'tahun_terbit' => 2011, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'Rich Dad Poor Dad', 'penulis' => 'Robert Kiyosaki', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'Zero to One', 'penulis' => 'Peter Thiel', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2016, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'Good to Great', 'penulis' => 'Jim Collins', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2014, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'The Lean Startup', 'penulis' => 'Eric Ries', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2015, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'Marketing 4.0', 'penulis' => 'Philip Kotler', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2017, 'kategori' => 7, 'stok' => 7],
            ['judul' => 'Manajemen Keuangan', 'penulis' => 'Brigham Houston', 'penerbit' => 'Salemba Empat', 'tahun_terbit' => 2013, 'kategori' => 7, 'stok' => 7],
        ];

        foreach ($buku as $data) {
            $b = Buku::create([
                'judul'        => $data['judul'],
                'penulis'      => $data['penulis'],
                'penerbit'     => $data['penerbit'],
                'tahun_terbit' => $data['tahun_terbit'],
                'stok'         => $data['stok'], 
            ]);

            KategoriBukuRelasi::create([
                'id_buku'     => $b->id,
                'id_kategori' => $data['kategori'],
            ]);
        }
    }
}