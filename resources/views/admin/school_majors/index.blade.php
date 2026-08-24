@extends('layout.app')

@section('content')

    <div class="space-y-6, p-6">
        <div class="mb-6 flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Jurusan
            </h1>

            <p class="mt-1 text-gray-500">
                Kelola jurusan yang tersedia di sekolah.
            </p>
        </div>

            <a
                href="{{ route('school_majors.create') }}"
                class="rounded-xl bg-indigo-600 px-5 py-3 text-white hover:bg-indigo-700"
            >
                + Tambah Jurusan
            </a>

        </div>

        {{-- @if(session('success'))

            <div class="mb-6 rounded-xl bg-green-50 px-5 py-4 text-green-700">
                {{ session('success') }}
            </div>

        @endif --}}

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">

            @forelse($schoolMajors as $schoolMajor)

                <div class="rounded-2xl bg-white border border-gray-100 p-6 shadow-sm">

                    <div class="mb-4">

                        <span class="text-sm font-medium text-indigo-600">
                            {{ $schoolMajor->major->kode_jur }}
                        </span>

                        <h2 class="mt-1 text-lg font-semibold text-gray-800">
                            {{ $schoolMajor->major->name }}
                        </h2>

                    </div>

                    <form
                        action="{{ route('school_majors.destroy', $schoolMajor->id) }}"
                        method="POST"
                        onsubmit="return confirm('Hapus jurusan ini dari sekolah?')"
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
                        Belum ada jurusan.
                    </h3>

                    <p class="mt-1 text-gray-500">
                        Silakan tambahkan jurusan dari master yang tersedia.
                    </p>

                </div>

            @endforelse

        </div>
    </div>

@endsection