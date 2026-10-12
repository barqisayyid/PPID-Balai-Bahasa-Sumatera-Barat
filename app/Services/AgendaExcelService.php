<?php

namespace App\Services;

use App\Models\Agenda;
use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AgendaExcelService
{
    /**
     * Download template Excel untuk import agenda kegiatan.
     */
    public function downloadTemplate(): StreamedResponse
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Template Agenda');

        // Header Table
        $headers = [
            'A1' => 'No',
            'B1' => 'Nama Kegiatan *',
            'C1' => 'Tanggal (YYYY-MM-DD) *',
            'D1' => 'Waktu',
            'E1' => 'Tempat',
            'F1' => 'Deskripsi',
            'G1' => 'Status',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        // Header Styling
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
                'name' => 'Calibri',
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0F2A4A'], // Warna Navy Primary Balai Bahasa
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '0A1D33'],
                ],
            ],
        ];
        $sheet->getStyle('A1:G1')->applyFromArray($headerStyle);
        $sheet->getRowDimension(1)->setRowHeight(30);

        // Contoh Data (Sample rows)
        $today = Carbon::today();
        $samples = [
            [
                1,
                'Bimbingan Teknis Literasi Generasi Muda',
                $today->copy()->addDays(7)->format('Y-m-d'),
                '08:30 - 15:00 WIB',
                'Aula Balai Bahasa Sumatera Barat',
                'Pelatihan literasi penulisan kreatif bagi pelajar SMA/SMK',
                'Akan Datang',
            ],
            [
                2,
                'Sosialisasi UKBI (Uji Kemahiran Berbahasa Indonesia)',
                $today->copy()->addDays(14)->format('Y-m-d'),
                '09:00 - 12:00 WIB',
                'Daring (Zoom Meeting)',
                'Sosialisasi kebijakan dan mekanisme pendaftaran tes UKBI',
                'Akan Datang',
            ],
            [
                3,
                'Rapat Koordinasi Inventarisasi Kosakata Bahasa Daerah',
                $today->copy()->subDays(5)->format('Y-m-d'),
                '13:30 - 16:30 WIB',
                'Ruang Sidang Balai Bahasa',
                'Verifikasi dan pengesahan entri lema baru kamus bahasa daerah',
                'Selesai',
            ],
        ];

        $rowIndex = 2;
        foreach ($samples as $sample) {
            $sheet->setCellValue("A{$rowIndex}", $sample[0]);
            $sheet->setCellValue("B{$rowIndex}", $sample[1]);
            $sheet->setCellValue("C{$rowIndex}", $sample[2]);
            $sheet->setCellValue("D{$rowIndex}", $sample[3]);
            $sheet->setCellValue("E{$rowIndex}", $sample[4]);
            $sheet->setCellValue("F{$rowIndex}", $sample[5]);
            $sheet->setCellValue("G{$rowIndex}", $sample[6]);
            $sheet->getRowDimension($rowIndex)->setRowHeight(24);
            $rowIndex++;
        }

        // Data Rows Styling
        $dataStyle = [
            'font' => [
                'size' => 10,
                'name' => 'Calibri',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'D0D5DD'],
                ],
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];
        $sheet->getStyle('A2:G4')->applyFromArray($dataStyle);

        // Per-kolom alignment
        $sheet->getStyle('A2:A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C2:C4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D2:D4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('G2:G4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Format tanggal pada kolom C sebagai Text / Explicit Date
        $sheet->getStyle('C2:C100')->getNumberFormat()->setFormatCode('@');

        // Dropdown validasi untuk kolom G (Status)
        $validation = $sheet->getCell('G2')->getDataValidation();
        $validation->setType(DataValidation::TYPE_LIST);
        $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
        $validation->setAllowBlank(false);
        $validation->setShowInputMessage(true);
        $validation->setShowErrorMessage(true);
        $validation->setShowDropDown(true);
        $validation->setFormula1('"Akan Datang,Selesai"');
        $validation->setPromptTitle('Pilih Status');
        $validation->setPrompt('Pilih: Akan Datang atau Selesai');

        for ($r = 3; $r <= 100; $r++) {
            $sheet->getCell("G{$r}")->setDataValidation(clone $validation);
        }

        // Catatan & Petunjuk Pengisian
        $instructionRow = 6;
        $sheet->setCellValue("A{$instructionRow}", 'PETUNJUK PENGISIAN TEMPLATE:');
        $sheet->getStyle("A{$instructionRow}")->getFont()->setBold(true)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('0F2A4A'));

        $instructions = [
            '1. Kolom tanda bintang (*) wajib diisi: "Nama Kegiatan" dan "Tanggal".',
            '2. Format tanggal yang direkomendasikan adalah YYYY-MM-DD (contoh: 2026-10-25) atau DD/MM/YYYY (contoh: 25/10/2026).',
            '3. Kolom "Waktu", "Tempat", dan "Deskripsi" bersifat opsional (boleh dikosongkan jika belum ada data).',
            '4. Kolom "Status" dapat diisi "Akan Datang" atau "Selesai" (default jika kosong: Akan Datang).',
            '5. Baris 2 sampai 4 di atas adalah CONTOH. Anda dapat menghapus atau menimpanya dengan agenda kegiatan sebenarnya.',
            '6. Jangan mengubah nama/posisi judul kolom pada Baris 1.',
        ];

        foreach ($instructions as $idx => $inst) {
            $currRow = $instructionRow + 1 + $idx;
            $sheet->setCellValue("A{$currRow}", $inst);
            $sheet->getStyle("A{$currRow}")->getFont()->setSize(9)->setItalic(true)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('555555'));
        }

        // Lebar Kolom
        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(38);
        $sheet->getColumnDimension('C')->setWidth(24);
        $sheet->getColumnDimension('D')->setWidth(22);
        $sheet->getColumnDimension('E')->setWidth(32);
        $sheet->getColumnDimension('F')->setWidth(45);
        $sheet->getColumnDimension('G')->setWidth(18);

        $filename = 'Template_Agenda_Kegiatan.xlsx';

        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Cache-Control' => 'max-age=0',
        ]);
    }

    /**
     * Export seluruh data agenda saat ini ke file Excel.
     */
    public function exportData(): StreamedResponse
    {
        $agendas = Agenda::orderBy('tanggal', 'desc')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data Agenda');

        $headers = [
            'A1' => 'No',
            'B1' => 'Nama Kegiatan',
            'C1' => 'Tanggal',
            'D1' => 'Waktu',
            'E1' => 'Tempat',
            'F1' => 'Deskripsi',
            'G1' => 'Status',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0F2A4A'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '0A1D33'],
                ],
            ],
        ];
        $sheet->getStyle('A1:G1')->applyFromArray($headerStyle);
        $sheet->getRowDimension(1)->setRowHeight(28);

        $row = 2;
        foreach ($agendas as $idx => $agenda) {
            $sheet->setCellValue("A{$row}", $idx + 1);
            $sheet->setCellValue("B{$row}", $agenda->kegiatan);
            $sheet->setCellValue("C{$row}", $agenda->tanggal ? Carbon::parse($agenda->tanggal)->format('Y-m-d') : '-');
            $sheet->setCellValue("D{$row}", $agenda->waktu ?? '-');
            $sheet->setCellValue("E{$row}", $agenda->tempat ?? '-');
            $sheet->setCellValue("F{$row}", $agenda->deskripsi ?? '-');
            $sheet->setCellValue("G{$row}", $agenda->status ?? 'Akan Datang');
            $sheet->getRowDimension($row)->setRowHeight(22);
            $row++;
        }

        $lastRow = max(2, $row - 1);
        $dataStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'D0D5DD'],
                ],
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];
        $sheet->getStyle("A2:G{$lastRow}")->applyFromArray($dataStyle);
        $sheet->getStyle("A2:A{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("C2:C{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("D2:D{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("G2:G{$lastRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(38);
        $sheet->getColumnDimension('C')->setWidth(18);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(40);
        $sheet->getColumnDimension('G')->setWidth(16);

        $filename = 'Data_Agenda_Kegiatan_' . date('Ymd_His') . '.xlsx';

        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Cache-Control' => 'max-age=0',
        ]);
    }

    /**
     * Import data agenda dari file Excel/CSV.
     *
     * @return array [
     *   'success' => bool,
     *   'count' => int,
     *   'message' => string,
     *   'errors' => array
     * ]
     */
    public function importFile(UploadedFile $file): array
    {
        try {
            $spreadsheet = IOFactory::load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'count' => 0,
                'message' => 'Gagal membaca file Excel. Pastikan file tidak rusak dan berformat .xlsx, .xls, atau .csv.',
                'errors' => [$e->getMessage()],
            ];
        }

        $highestRow = $sheet->getHighestDataRow();
        $highestCol = $sheet->getHighestDataColumn();

        if ($highestRow < 2) {
            return [
                'success' => false,
                'count' => 0,
                'message' => 'File Excel kosong atau tidak memiliki baris data.',
                'errors' => ['File tidak memiliki baris data di bawah judul.'],
            ];
        }

        // Deteksi mapping kolom dari baris 1
        $colMapping = $this->detectColumns($sheet, $highestCol);

        $validRows = [];
        $errors = [];

        for ($rowIndex = 2; $rowIndex <= $highestRow; $rowIndex++) {
            $cellAVal = trim((string) $sheet->getCell("A{$rowIndex}")->getValue());

            // Lewati baris petunjuk pengisian jika ada
            if (str_starts_with(strtoupper($cellAVal), 'PETUNJUK') || str_starts_with(strtoupper($cellAVal), 'CATATAN')) {
                break;
            }

            $kegiatanRaw = $this->getCellValue($sheet, $colMapping['kegiatan'], $rowIndex);
            $tanggalRaw  = $sheet->getCell("{$colMapping['tanggal']}{$rowIndex}");
            $waktuRaw    = $this->getCellValue($sheet, $colMapping['waktu'], $rowIndex);
            $tempatRaw   = $this->getCellValue($sheet, $colMapping['tempat'], $rowIndex);
            $deskripsiRaw= $this->getCellValue($sheet, $colMapping['deskripsi'], $rowIndex);
            $statusRaw   = $this->getCellValue($sheet, $colMapping['status'], $rowIndex);

            // Jika satu baris kosong semua, lewati
            if (empty($kegiatanRaw) && empty($tanggalRaw->getValue()) && empty($waktuRaw) && empty($tempatRaw)) {
                continue;
            }

            // Validasi Kegiatan
            if (empty($kegiatanRaw)) {
                $errors[] = "Baris {$rowIndex}: Nama kegiatan tidak boleh kosong.";
                continue;
            }

            // Validasi & Parse Tanggal
            $parsedTanggal = $this->parseDateCell($tanggalRaw);
            if (!$parsedTanggal) {
                $rawText = trim((string)$tanggalRaw->getValue());
                $errors[] = "Baris {$rowIndex} (\"{$kegiatanRaw}\"): Tanggal '{$rawText}' tidak valid. Gunakan format YYYY-MM-DD atau DD/MM/YYYY.";
                continue;
            }

            // Normalisasi Status
            $status = 'Akan Datang';
            if (!empty($statusRaw)) {
                $statusLower = strtolower(trim($statusRaw));
                if (str_contains($statusLower, 'selesai') || $statusLower === 'done' || $statusLower === 'closed') {
                    $status = 'Selesai';
                }
            }

            $validRows[] = [
                'kegiatan'   => $kegiatanRaw,
                'tanggal'    => $parsedTanggal,
                'waktu'      => !empty($waktuRaw) ? $waktuRaw : null,
                'tempat'     => !empty($tempatRaw) ? $tempatRaw : null,
                'deskripsi'  => !empty($deskripsiRaw) ? $deskripsiRaw : null,
                'status'     => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if (empty($validRows)) {
            $msg = 'Tidak ada data agenda yang valid untuk diimpor.';
            if (!empty($errors)) {
                $msg .= ' Silakan periksa format data yang dimasukkan.';
            }
            return [
                'success' => false,
                'count' => 0,
                'message' => $msg,
                'errors' => $errors,
            ];
        }

        // Simpan ke database
        DB::beginTransaction();
        try {
            $firstInserted = null;
            foreach ($validRows as $row) {
                $agenda = Agenda::create($row);
                if (!$firstInserted) {
                    $firstInserted = $agenda;
                }
            }

            // Catat log aktivitas jika ada model
            if ($firstInserted && class_exists(ActivityLog::class)) {
                try {
                    ActivityLog::catat(
                        aksi: 'import',
                        model: $firstInserted,
                        keterangan: "Import " . count($validRows) . " agenda kegiatan dari file Excel: " . $file->getClientOriginalName()
                    );
                } catch (\Throwable) {}
            }

            DB::commit();

            return [
                'success' => true,
                'count' => count($validRows),
                'message' => 'Berhasil mengimpor ' . count($validRows) . ' agenda kegiatan.',
                'errors' => $errors,
            ];
        } catch (\Throwable $e) {
            DB::rollBack();
            return [
                'success' => false,
                'count' => 0,
                'message' => 'Terjadi kesalahan saat menyimpan data ke database: ' . $e->getMessage(),
                'errors' => array_merge($errors, [$e->getMessage()]),
            ];
        }
    }

    /**
     * Deteksi posisi kolom berdasarkan header di baris 1.
     */
    protected function detectColumns($sheet, string $highestCol): array
    {
        $mapping = [
            'kegiatan'  => 'B',
            'tanggal'   => 'C',
            'waktu'     => 'D',
            'tempat'    => 'E',
            'deskripsi' => 'F',
            'status'    => 'G',
        ];

        $highestColIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestCol);

        for ($col = 1; $col <= $highestColIndex; $col++) {
            $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
            $header = strtolower(trim((string)$sheet->getCell("{$colLetter}1")->getValue()));

            if (empty($header)) continue;

            if (str_contains($header, 'kegiatan') || str_contains($header, 'acara') || str_contains($header, 'agenda')) {
                $mapping['kegiatan'] = $colLetter;
            } elseif (str_contains($header, 'tanggal') || str_contains($header, 'tgl') || str_contains($header, 'date')) {
                $mapping['tanggal'] = $colLetter;
            } elseif (str_contains($header, 'waktu') || str_contains($header, 'jam') || str_contains($header, 'pukul') || str_contains($header, 'time')) {
                $mapping['waktu'] = $colLetter;
            } elseif (str_contains($header, 'tempat') || str_contains($header, 'lokasi') || str_contains($header, 'ruang') || str_contains($header, 'venue')) {
                $mapping['tempat'] = $colLetter;
            } elseif (str_contains($header, 'deskripsi') || str_contains($header, 'keterangan') || str_contains($header, 'uraian') || str_contains($header, 'detail')) {
                $mapping['deskripsi'] = $colLetter;
            } elseif (str_contains($header, 'status') || str_contains($header, 'keadaan')) {
                $mapping['status'] = $colLetter;
            }
        }

        return $mapping;
    }

    /**
     * Ambil string nilai cell dengan pembersihan whitespace.
     */
    protected function getCellValue($sheet, ?string $col, int $row): string
    {
        if (!$col) return '';
        $val = $sheet->getCell("{$col}{$row}")->getValue();
        return trim((string) $val);
    }

    /**
     * Parse tanggal dari cell Excel secara fleksibel.
     */
    protected function parseDateCell($cell): ?string
    {
        $raw = $cell->getValue();
        if ($raw === null || $raw === '') {
            return null;
        }

        // Jika Cell bertipe Date atau angka serial Excel
        if (Date::isDateTime($cell) || (is_numeric($raw) && $raw > 1000 && $raw < 100000)) {
            try {
                $dateTime = Date::excelToDateTimeObject($raw);
                return $dateTime->format('Y-m-d');
            } catch (\Throwable) {}
        }

        $str = trim((string) $raw);

        // Uji berbagai format standar
        $formats = [
            'Y-m-d',
            'd/m/Y',
            'd-m-Y',
            'd.m.Y',
            'Y/m/d',
            'Y.m.d',
            'j/n/Y',
            'j-n-Y',
        ];

        foreach ($formats as $fmt) {
            try {
                $parsed = Carbon::createFromFormat($fmt, $str);
                if ($parsed && $parsed->format($fmt) === $str) {
                    return $parsed->format('Y-m-d');
                }
            } catch (\Throwable) {}
        }

        // Coba parser Carbon umum
        try {
            $parsed = Carbon::parse($str);
            return $parsed->format('Y-m-d');
        } catch (\Throwable) {
            return null;
        }
    }
}
