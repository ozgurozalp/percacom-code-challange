@extends('layouts.app')
@section('title', 'Log Kayıları')

@section('content')
    <h1>Log Kayıtları</h1>
    <div class="table-responsive-md overflow-auto">
        <table class="table table-bordered text-nowrap">
            <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th scope="col">Log detayı</th>
                <th scope="col">Loglanma tarihi</th>
            </tr>
            </thead>
            <tbody>
            @forelse($logs as $log)
                <tr>
                    <td class="text-center">{{ $log->id }}</td>
                    <td>{!! $log->detail !!}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @empty
                <tr class="text-center">
                    <th scope="row" colspan="3">
                        <span class="fs-3 text-danger">Log Bulunamadı !!!</span>
                    </th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
