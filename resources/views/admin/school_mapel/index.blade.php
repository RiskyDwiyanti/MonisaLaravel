@extends('layout.app')

@section('content')

    <div class="space-y-6, p-6">
        <div class="mb-6 flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Mata Pelajaran Sekolah
            </h1>

            <p class="mt-1 text-gray-500">
                Kelola mata pelajaran yang tersedia di sekolah.
            </p>
        </div>

            <a
                href="{{ route('school_mapel.create') }}"
                class="rounded-xl bg-indigo-600 px-5 py-3 text-white hover:bg-indigo-700"
            >
                + Tambah Mata Pelajaran
            </a>

        </div>

        @if(session('success'))

            <div class="mb-6 rounded-xl bg-green-50 px-5 py-4 text-green-700">
                {{ session('success') }}
            </div>

        @endif

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">

            @forelse($schoolMapels as $schoolMapel)

                <div class="rounded-2xl bg-white border border-gray-100 p-6 shadow-sm">

                    <div class="mb-4">

                        <span class="text-sm font-medium text-indigo-600">
                            {{ $schoolMapel->masterMapel->kode_mapel }}
                        </span>

                        <h2 class="mt-1 text-lg font-semibold text-gray-800">
                            {{ $schoolMapel->masterMapel->name }}
                        </h2>

                    </div>

                    <form
                        action="{{ route('school_mapel.destroy', $schoolMapel->id) }}"
                        method="POST"
                        onsubmit="return confirm('Hapus mata pelajaran ini dari sekolah?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded-xl border border-red-200 px-4 py-2 text-sm text-red-600 hover:bg-red-50"
                        >
                            Hapus
                        </button>

                    </form>

                </div>

            @empty

                <div class="col-span-full rounded-2xl bg-white p-10 text-center">

                    <h3 class="text-lg font-semibold text-gray-700">
                        Belum ada mata pelajaran
                    </h3>

                    <p class="mt-1 text-gray-500">
                        Silakan tambahkan mata pelajaran dari master yang tersedia.
                    </p>

                </div>

            @endforelse

        </div>
    </div>

@endsection