@extends('errors.layout')

@section('kode', '403')
@section('judul', 'Akses ditolak')
@section('pesan', $exception->getMessage() ?: 'Anda tidak memiliki akses ke halaman ini.')