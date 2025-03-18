@extends('mahasiswa.layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-white leading-tight">
        {{ __('Mahasiswa - Dashboard') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(auth('mahasiswa')->check())
                        <p>Welcome, {{ auth('mahasiswa')->user()->nama }}!</p>
                        <p>Email: {{ auth('mahasiswa')->user()->email }}</p>
                    @else
                        <p>No user is logged in.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
