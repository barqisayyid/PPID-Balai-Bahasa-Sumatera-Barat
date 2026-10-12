<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Services\AgendaExcelService;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('tanggal', 'desc')->get();
        return view('admin.agenda.index', compact('agendas'));
    }

    public function template(AgendaExcelService $excelService)
    {
        return $excelService->downloadTemplate();
    }

    public function export(AgendaExcelService $excelService)
    {
        return $excelService->exportData();
    }

    public function import(Request $request, AgendaExcelService $excelService)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:5120',
        ], [
            'file.required' => 'Silakan pilih file Excel terlebih dahulu.',
            'file.file'     => 'File yang diunggah tidak valid.',
            'file.mimes'    => 'Format file harus berupa .xlsx, .xls, atau .csv.',
            'file.max'      => 'Ukuran file maksimal adalah 5MB.',
        ]);

        $result = $excelService->importFile($request->file('file'));

        if (!$result['success']) {
            $errorMessage = $result['message'];
            if (!empty($result['errors'])) {
                $errorMessage .= ' (' . implode('; ', array_slice($result['errors'], 0, 3)) . ')';
            }
            return back()->with('error', $errorMessage)->with('import_errors', $result['errors']);
        }

        $successMsg = $result['message'];
        if (!empty($result['errors'])) {
            $successMsg .= ' (Perhatian: ' . count($result['errors']) . ' baris dilewati karena data tidak lengkap/valid).';
        }

        return back()->with('success', $successMsg);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        Agenda::create($request->all());
        return back()->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'kegiatan' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        $agenda->update($request->all());
        return back()->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return back()->with('success', 'Agenda berhasil dihapus.');
    }
}
