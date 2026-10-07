@extends('admin.layouts.app')

@section('title', $item->no_registrasi)

@section('content')
    <div class="mb-3">
        <a href="{{ route($jenis . '.index') }}" class="text-decoration-none">&larr; Kembali ke daftar {{ $judul }}</a>
    </div>

    <div class="row">
        {{-- Data masuk --}}
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                        <div>
                            <h4 class="card-title mb-1">{{ $item->no_registrasi }}</h4>
                            <p class="text-muted mb-0">{{ $judul }} &middot; diterima {{ $item->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <span class="badge fs-3 bg-{{ $item->status_warna }}-subtle text-{{ $item->status_warna }}">
                            {{ $item->status_label }}
                        </span>
                    </div>

                    <h6 class="text-uppercase text-muted mt-4 mb-2">Identitas</h6>
                    <dl class="row mb-0">
                        @foreach ($baris['identitas'] as $label => $nilai)
                            <dt class="col-sm-4 fw-semibold">{{ $label }}</dt>
                            <dd class="col-sm-8" style="white-space: pre-line">{{ $nilai }}</dd>
                        @endforeach
                    </dl>

                    <h6 class="text-uppercase text-muted mt-4 mb-2">Isi {{ strtolower($judul) }}</h6>
                    <dl class="row mb-0">
                        @foreach ($baris['isi'] as $label => $nilai)
                            <dt class="col-sm-4 fw-semibold">{{ $label }}</dt>
                            <dd class="col-sm-8" style="white-space: pre-line">{{ $nilai }}</dd>
                        @endforeach

                        <dt class="col-sm-4 fw-semibold">Lampiran</dt>
                        <dd class="col-sm-8">
                            @if ($adaFile)
                                <a href="{{ route($jenis . '.lampiran', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                    Unduh lampiran
                                </a>
                            @else
                                <span class="text-muted">Tidak ada lampiran</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

        {{-- Penanganan --}}
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Penanganan</h5>

                    <form method="POST" action="{{ route($jenis . '.update', $item->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                @foreach ($statusList as $kode => $label)
                                    <option value="{{ $kode }}" @selected(old('status', $item->status) === $kode)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="tanggapan">Tanggapan / catatan</label>
                            <textarea id="tanggapan" name="tanggapan" rows="6" maxlength="5000"
                                class="form-control @error('tanggapan') is-invalid @enderror"
                                placeholder="Tuliskan tanggapan atau alasan penolakan">{{ old('tanggapan', $item->tanggapan) }}</textarea>
                            <div class="form-text">Wajib diisi jika status <strong>Ditolak</strong>.</div>
                            @error('tanggapan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                    @if ($item->ditanggapi_at)
                        <hr>
                        <p class="text-muted small mb-0">
                            Tanggapan terakhir oleh <strong>{{ $item->penanggap?->name ?? 'petugas yang sudah dihapus' }}</strong>
                            pada {{ $item->ditanggapi_at->format('d/m/Y H:i') }}.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection