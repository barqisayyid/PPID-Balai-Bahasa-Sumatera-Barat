<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('tanggal', 'desc')->get();
        return view('admin.agenda.index', compact('agendas'));
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
