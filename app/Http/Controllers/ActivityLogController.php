<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $logs = ActivityLog::with('user')
            ->when($request->filled('aksi'), fn ($q) => $q->where('aksi', $request->aksi))
            ->when($request->filled('cari'), function ($q) use ($request) {
                $q->where('keterangan', 'like', "%{$request->cari}%");
            })
            ->latest()
            ->paginate(20);

        return view('admin.activity-log', compact('logs'));
    }
}