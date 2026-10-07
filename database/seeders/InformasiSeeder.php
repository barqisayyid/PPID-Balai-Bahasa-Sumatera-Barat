<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Seeder;

/**
 * Mengimpor dokumen yang sebelumnya tertulis langsung (hardcode) di halaman publik.
 * Format tiap baris: [nama, jenis_informasi, tahun, pj, dokumen]
 * Aman dijalankan ulang: baris yang sudah ada (kategori + nama + tahun sama) tidak digandakan.
 */
class InformasiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'berkala' => [
                ['Laporan Kinerja Tahunan', 'Laporan', '2024', 'Tim Administrasi', 'https://drive.google.com/file/d/1uM0_EeBknxJCViW_rUGqAGJGcN4PjLvu/view'],
            ],
            'kebijakan' => [
                ['Undang-Undang Nomor 24 Tahun 2009 tentang Bendera, Bahasa, dan Lambang Negara, serta Lagu Kebangsaan', 'Undang-Undang', '2009', null, 'https://peraturan.bpk.go.id/Details/38661/uu-no-24-tahun-2009'],
                ['Peraturan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 47 Tahun 2024 tentang Perubahan atas Peraturan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 12 Tahun 2022 tentang Organisasi dan Tata Kerja Balai Bahasa dan Balai Bahasa', 'Peraturan Menteri', '2024', null, 'https://peraturan.bpk.go.id/Details/303331/permendikbudriset-no-47-tahun-2024#:~:text=CATATAN:,hlm%205%20sd%206%20lampiran'],
                ['Peraturan Menteri Keuangan Nomor 39 Tahun 2024 tentang Standar Biaya Masukan Tahun Anggaran 2025', 'Peraturan Menteri', '2024', null, 'https://peraturan.bpk.go.id/Details/292592/pmk-no-39-tahun-2024'],
                ['Peraturan Menteri Keuangan Nomor 92 Tahun 2024 tentang Standar Biaya Keluaran Tahun Anggaran 2025', 'Peraturan Menteri', '2024', null, 'https://peraturan.bpk.go.id/Details/309180/pmk-no-92-tahun-2024'],
                ['Peraturan Menteri Pendidikan Dasar dan Menengah Nomor 2 Tahun 2025 tentang Pedoman Pengawasan Penggunaan Bahasa Indonesia', 'Peraturan Menteri', '2025', null, 'https://peraturan.bpk.go.id/Details/315669/permendikdasmen-no-2-tahun-2025'],
                ['Rencana Strategis Balai Bahasa Provinsi Sumatera Barat 2025 s.d. 2030', 'Rencana Strategis', '2025', null, null],
                ['Petunjuk Teknis Model Registrasi Bahasa', 'Petunjuk Teknis', '2025', null, 'https://drive.google.com/file/d/1_gdv8FRNmKskMEGeBqQX-81BebRpi9b1/view'],
                ['Petunjuk Teknis Pembinaan Komunitas Penggerak Literasi Tahun', 'Petunjuk Teknis', '2025', null, 'https://drive.google.com/file/d/1JJO583Mczez64RQkz6m8v2lC9t0jHvnM/view?usp=sharing'],
                ['Petunjuk Teknis Peningkatan Kompetensi Membaca Kritis Dan Analitis Tahun 2025', 'Petunjuk Teknis', '2025', null, 'https://drive.google.com/file/d/13pPsMCzxGmF-AKjUywkD-ACx6Z2xB7Xh/view?usp=sharing'],
            ],
            'keuangan' => [
                ['Rencana Kerja dan Anggaran (RKA)', null, '2025', 'Tim Administrasi', 'https://drive.google.com/file/d/1aFnhjb9imyMFWL6KVj7yhpcLpctyCN7v/view?usp=sharing'],
                ['Daftar Isian Pelaksanaan Anggaran', null, '2025', 'Tim Administrasi', 'https://drive.google.com/file/d/1aD-US53RFJTRQ16YpSwV9u5S4VqPciEV/view?usp=sharing'],
                ['Laporan Keuangan Semester II', null, '2024', 'Tim Administrasi', 'https://drive.google.com/file/d/1_9NKDu5abptSwQl1sllDX_ZTQYJaj7Ge/view?usp=sharing'],
            ],
            'program' => [
                ['Kegiatan Pekan 5 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1azx_tx0SsEBtfGrVUrn4zcwfPMiUBIWV/view?usp=sharing'],
                ['Kegiatan Pekan 4 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1h0bcU_sSx_P0wJs9dOJF_Eq8_APZ2Vpi/view?usp=sharing'],
                ['Kegiatan Pekan 3 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1VL6B1mWj902Rl11KQ0DXOOeYxtXcfHyP/view?usp=sharing'],
                ['Kegiatan Pekan 2 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1igPxzdAP_0e_njEcJsziaK4F_5MBr86D/view?usp=sharing'],
                ['Kegiatan Pekan 1 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1UpYFozWh90SWOb0szVWBV_N_O1WMTTbf/view?usp=sharing'],
                ['Kegiatan Pekan 5 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1OqK60JZRbg4iW9AlU6KHv9eDWxn-WFJL/view?usp=sharing'],
                ['Kegiatan Pekan 4 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1OdlPiVl1-UZ0I6JTxkJc9vKTZKRa3i-y/view?usp=drive_link'],
                ['Kegiatan Pekan 3 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1c5oqEhGllll5clNr8YH0nb2RgMQM50sw/view?usp=sharing'],
                ['Kegiatan Pekan 2 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1qzxhiIPjC_Z0uKmdlzZ46I9dUmKib5tj/view?usp=sharing'],
                ['Kegiatan Pekan 1 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/19KSoZc2B2byfxh_NHEBf0YBMR8RGqpq7/view?usp=sharing'],
                ['Kegiatan Pekan 5 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1hDPayKe4P8Bfo8bL7KCLpTPmJWkcstEF/view?usp=sharing'],
                ['Kegiatan Pekan 4 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1tFroXRSdYA1YC84m_n1qDi1xars6jvaq/view?usp=sharing'],
                ['Kegiatan Pekan 3 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1siO5u8bvLmw6MdC9V3PH0WTaPINMAdxO/view?usp=sharing'],
                ['Kegiatan Pekan 2 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/177FtvUhxtk6IMexvfb2Qk-aIcXXUvUZB/view?usp=sharing'],
                ['Kegiatan Pekan 1 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1mOtwEN26lquSNlV7HzBf0uJLnH5ysdfx/view?usp=sharing'],
                ['Kegiatan Pekan 5 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1nFgX_kJZVHqY3CbowXnmI-f6W8GNSjej/view?usp=sharing'],
                ['Kegiatan Pekan 4 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1x6VrnuUG8J6_oP7Vg5U5P_kquqMyy412/view?usp=sharing'],
                ['Kegiatan Pekan 3 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1118RZjmQaOiDfgHGMw-7bQ35y17g2Hbw/view?usp=sharing'],
                ['Kegiatan Pekan 2 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1Fj4CvbIAMvkiXu5WPugRrpsTiyIDLX0n/view?usp=sharing'],
                ['Kegiatan Pekan 1 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1itBQgWuVpla5JGJkU4_9hWqRjIOmYfOn/view?usp=sharing'],
                ['Kegiatan Pekan 4 April', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1itBQgWuVpla5JGJkU4_9hWqRjIOmYfOn/view?usp=sharing'],
                ['Kegiatan Pekan 3 April', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1sQkxF99sCLdCG-Yt7dcf09DYt01qIYz-/view?usp=sharing'],
                ['Kegiatan Pekan 2 April', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1j9AObTBHXxOJYOd5EnfJTvo7wBx4hhQI/view?usp=sharing'],
                ['Kegiatan Pekan 4 Maret', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1sSyVhUC8yIkHK5ioFzBrmOxwQJRMD6_Q/view?usp=sharing'],
                ['Kegiatan Pekan 3 Maret', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1iyPzxwkO-RFLHg3YcoUsTPKrGHAiBIzE/view?usp=sharing'],
                ['Kegiatan Pekan 2 Maret', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1nUp3hKCdyaD34qeD_x0lKl0ZmRRJalHi/view?usp=sharing'],
                ['Kegiatan Pekan 1 Maret', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1Jz1po5EiTlQe2XIKS8cj3G-ezv-rBH6R/view?usp=sharing'],
            ],
        ];

        $jumlah = 0;

        foreach ($data as $kategori => $baris) {
            foreach ($baris as [$nama, $jenis, $tahun, $pj, $dokumen]) {
                $item = Informasi::firstOrCreate(
                    ['kategori' => $kategori, 'nama' => $nama, 'tahun' => $tahun],
                    ['jenis_informasi' => $jenis, 'pj' => $pj, 'dokumen' => $dokumen, 'tampil' => true]
                );

                if ($item->wasRecentlyCreated) {
                    $jumlah++;
                }
            }
        }

        $this->command->info("Informasi publik: {$jumlah} dokumen baru diimpor.");
    }
}