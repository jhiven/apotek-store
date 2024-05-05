<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Drug;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([DrugSeeder::class, TransactionSeeder::class]);
        $adminAccount = [
            'name' => 'Super Admin',
            'email' => 'kelompok5@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('123123123'),
        ];
        $userAccount = [
            'name' => 'Jhiven Agnar',
            'email' => 'jivenagnar11@gmail.com',
            'is_admin' => false,
            'password' => Hash::make('password'),
        ];

        $drugs = [
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/03/26100915/Opidiar-Suspensi-120-ml.jpg',
                'nama' => 'Opidiar Suspensi 120 ml',
                'deskripsi' => 'Menyembuhkan penyakit diare untuk orang dewasa',
                'indikasi' => 'Obat sirup ini dapat mengurangi frekuensi buang air besar dan memperbaiki konsistensi feses yang cair.',
                'jenis' => 'Sirup',
                'dosis' => '2 sendok takar (10 ml) setelah buang air besar, diminum 3 sampai 4 kali sehari (maksimum 8 sendok takar atau 40 ml).',
                'harga' => '28000',
                'stok' => '100',
            ],
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/06/26022630/Oralit-200-4.1-g-10-Sachet.jpg',
                'nama' => 'Oralit 200 4.1 g 10 Sachet',
                'deskripsi' => 'Oralit 200 4.1 g 10 Sachet dapat mencegah dan mengobati dehidrasi akibat diare dan muntah. ',
                'indikasi' => 'Obat ini dapat mengurangi frekuensi buang air besar dan memperbaiki konsistensi feses yang cair.',
                'jenis' => 'Serbuk',
                'dosis' => 'Untuk orang dewasa, pemakaian obat ini adalah sebanyak 12 gelas untuk 3 jam pertama dan selanjut 2 gelas tiap kali mencret.',
                'harga' => '5000',
                'stok' => '70',
            ],
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/06/26022646/Entrostop-20-Tablet.jpg',
                'nama' => 'Entrostop 20 Tablet',
                'deskripsi' => 'Neo Entrostop merupakan obat diare paling ampuh dengan kandungan attapulgite dan pektin.',
                'indikasi' => 'Obat ini dapat mengurangi frekuensi buang air besar dan memperbaiki konsistensi feses yang cair.',
                'jenis' => 'Tablet',
                'dosis' => 'Teruntuk orang dewasa dan anak di atas 12 tahun, dosisnya adalah dua tablet setiap kali diare. Dosis maksimal tidak lebih dari 12 tablet per hari. Untuk anak 6-12 tahun adalah satu tablet sekali usai BAB.',
                'harga' => '15000',
                'stok' => '80',
            ],
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/03/26101656/Diagit-10-Tablet.jpg',
                'nama' => 'Diagit 10 Tablet',
                'deskripsi' => 'Diagit 10 Tablet dapat digunakan pada diare yang tidak diketahui jenis penyebabnya. Dengan kandungan activated attapulgite dan pectin di dalamnya, obat ini bisa menyerap racun, bakteri, virus penyebab diare, membantu pengidap diare yang sering buang air besar, serta memperbaiki konsistensi feses yang encer. ',
                'indikasi' => 'Obat ini dapat mengurangi frekuensi buang air besar dan memperbaiki konsistensi feses yang cair.',
                'jenis' => 'Tablet',
                'dosis' => 'Diagit 10 Tablet bisa diminum sebelum atau sesudah makan sebanyak 2 tablet, lalu diikuti dengan penambahan 2 tablet lagi setiap selesai buang air besar. Penggunaan maksimum  12 tablet selama 24 jam. ',
                'harga' => '37500',
                'stok' => '40',
            ],
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/03/26101522/Kaotin-Suspensi-60-ml.jpg',
                'nama' => 'Kaotin Suspensi 60 ml',
                'deskripsi' => 'Kaotin Suspensi adalah obat sirup yang dapat membantu mengobati diare. Dengan kandungan kaolin-pectin di dalamnya, racun dan bakteri di saluran pencernaan dapat terikat. Sehingga frekuensi buang air besar dapat berkurang dan konsistensi feses yang encer bisa diperbaiki. ',
                'indikasi' => 'Obat ini dapat mengurangi frekuensi buang air besar dan memperbaiki konsistensi feses yang cair.',
                'jenis' => 'Sirup',
                'dosis' => 'Untuk dosis penggunaannya, kamu dapat meminum obat diare ini sebelum atau setelah makan sebanyak 2 sendok takar (10 ml), setiap setelah buang air besar (maksimum 12 sendok takar dalam waktu 24 jam). ',
                'harga' => '18000',
                'stok' => '200',
            ],
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/03/21031725/Garlicia-500-mg-30-Kapsul.jpg',
                'nama' => 'Garlicia 500 mg 30 Kapsul',
                'deskripsi' => 'Garlicia mengandung ekstrak bawang putih yang setara dengan 1,5 gram bawang putih segar. Bumbu dapur ini sudah popular digunakan penurun tekanan darah tinggi secara alami.',
                'indikasi' => 'Hipertensi atau tekanan darah tinggi terjadi ketika tekanan di pembuluh darah terlalu tinggi, angkanya di atas 140/90 mmHg. Gangguan kesehatan ini biasanya ditandai dengan sensasi pusing, sakit kepala, dan kelelahan. Bahkan beberapa orang bisa saja mengalaminya tanpa gejala apa pun.',
                'jenis' => 'Tablet',
                'dosis' => 'Kamu bisa mengonsumsi 2 kapsul sekali sehari. Jika perlu, bisa ditingkatkan hingga 2 kapsul tiga kali sehari. ',
                'harga' => '78000',
                'stok' => '50',
            ],
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/03/21031654/Osfit-60-Kaplet.jpg',
                'nama' => 'Osfit 60 Kaplet',
                'deskripsi' => 'Kaotin Suspensi adalah obat sirup yang dapat membantu mengobati diare. Dengan kandungan kaolin-pectin di dalamnya, racun dan bakteri di saluran pencernaan dapat terikat. Sehingga frekuensi buang air besar dapat berkurang dan konsistensi feses yang encer bisa diperbaiki. ',
                'indikasi' => 'Hipertensi atau tekanan darah tinggi terjadi ketika tekanan di pembuluh darah terlalu tinggi, angkanya di atas 140/90 mmHg. Gangguan kesehatan ini biasanya ditandai dengan sensasi pusing, sakit kepala, dan kelelahan. Bahkan beberapa orang bisa saja mengalaminya tanpa gejala apa pun.',
                'jenis' => 'Tablet',
                'dosis' => 'Pengidap tekanan darah tinggi bisa mengonsumsi suplemen ini 2 kaplet dua kali sehari. Konsumsi bersamaan dengan makanan. ',
                'harga' => '150000',
                'stok' => '20',
            ],
            [
                'image_url' => 'https://d3bbrrd0qs69m4.cloudfront.net/images/product/large/apotek_online_k24klik_20211223092009359225_AMOXICILLIN-KF-500MG-TAB-100S-removebg-preview.png',
                'nama' => 'Amoxicillin KF 500 Mg Tablet',
                'deskripsi' => 'Amoxicillin trihydrate bermanfaat untuk mengobati segala macam infeksi  bakteri. Cara kerjanya yaitu dengan menghentikan pertumbuhan bakteri. Obat ini kerap dokter kombinasikan dengan obat lain untuk mengobati tukak lambung akibat infeksi bakteri H. pylori. Tujuannya untuk membunuh bakteri sekaligus mencegah tukak kembali. Penisilin hanya bisa mengobati infeksi bakteri sehingga tidak akan efektif apabila kamu gunakan untuk mengatasi infeksi virus. Mengonsumsinya saat tidak kamu perlukan bisa menurunkan efektivitasnya di masa mendatang saat pemakaianya dibutuhkan.',
                'indikasi' => 'Indikasi Sinusitis: Batuk berkepanjangan. Hidung tersumbat, hingga daya penciuman menurun. Terdapat gejala alergi yang tidak merespon pengobatan. Demam hingga timbul nyeri pada kepala, hidung, dahi, belakang mata, dan pipi.',
                'jenis' => 'Tablet',
                'dosis' => 'Dewasa dan anak dengan berat badan di atas 40 kilogram: 250-500  miligram setiap delapan jam sekali . Dokter bisa meningkatkan dosisnya pada kasus infeksi berat menjadi 750-1.000 miligram, setiap 8 jam.',
                'harga' => '8000',
                'stok' => '300',
            ],
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/08/08035647/Ventolin-Expectorant-Sirup.jpg',
                'nama' => 'Ventolin Expectorant Sirup 100 ml',
                'deskripsi' => 'Ventolin Expectorant Sirup 100 ml adalah obat asma dewasa dan anak-anak yang efektif untuk mengatasi gejala asma.',
                'indikasi' => 'Asma adalah penyakit saluran pernapasan yang kronis, menyebabkan peradangan pada saluran udara dan mengakibatkan kesulitan bernapas. Cara paling umum untuk mengatasi kondisi ini melalui pemberian obat asma.',
                'jenis' => 'Sirup',
                'dosis' => 'Dewasa: 10-20ml, 2-3 kali sehari, Anak-anak: 5-10ml, 2-3 kali sehari',
                'harga' => '8000',
                'stok' => '200',
            ],
            [
                'image_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/04/16103229/Lasal-2-mg-10-Kapsul-1.jpg',
                'nama' => 'Lasal 2 mg 10 Kapsul',
                'deskripsi' => 'Rekomendasi yang terakhir adalah Lasal 2 mg 10 Kapsul. Obat ini  dapat digunakan untuk mengobati masalah pada saluran pernafasan seperti asma dan penyakit paru obstruktif kronik (PPOK). ',
                'indikasi' => 'Asma adalah penyakit saluran pernapasan yang kronis, menyebabkan peradangan pada saluran udara dan mengakibatkan kesulitan bernapas. Cara paling umum untuk mengatasi kondisi ini melalui pemberian obat asma.',
                'jenis' => 'Tablet',
                'dosis' => 'Orang dewasa: 3 sampai 4 kali sehari sebanyak 1-2 tablet. Anak-anak berusia 6-12 tahun: 3 kali sehari sebanyak 1 tablet. Anak berusia 2-6 tahun: 3 kali sehari sebanyak ½ tablet. ',
                'harga' => '21000',
                'stok' => '140',
            ],
        ];

        User::factory()->create($adminAccount);
        User::factory()->create($userAccount);
        foreach ($drugs as $drug) {
            Drug::factory()->create($drug);
        }
        // User::factory(10)
        //     ->has(Cart::factory(3)->state(function (array $attributes, user $user) {
        //         return [
        //             'user_id' => $user->id,
        //             'drug_id' => Drug::factory()
        //                 ->has(
        //                     DetailTransaction::factory(10)
        //                         ->for(Transaction::factory()->state([
        //                             'user_id' => $user->id,
        //                         ]))
        //                 )
        //                 ->create()
        //                 ->id,
        //         ];
        //     }))
        //     ->create();
    }
}
