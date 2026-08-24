@extends('layout.app')

@section('content')

    <div class="space-y-6, p-6">
        <div class="mb-6">

            <h1 class="text-2xl font-bold text-gray-800">
                Pilih Jurusan
            </h1>

            <p class="text-gray-500 mt-1">
                Pilih semua jurusan yang tersedia di sekolah Anda.
            </p>

        </div>

        <form action="{{ route('school_majors.store') }}" method="POST">

            @csrf

            <div class="rounded-2xl bg-white border border-gray-100 shadow-sm">

                <div class="border-b border-gray-100 px-8 py-5">

                    <h2 class="text-lg font-semibold text-gray-800">
                        Daftar Jurusan
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Pilih jurusan yang tersedia di sekolah.
                    </p>

                </div>


                <div class="p-8">

                    @if($majors->count())

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                            @foreach($majors as $major)

                                <label
                                    class="flex items-center gap-4 rounded-xl border border-gray-200 p-4 cursor-pointer hover:bg-indigo-50 hover:border-indigo-300 transition"
                                >

                                    <input
                                        type="checkbox"
                                        name="major_ids[]"
                                        value="{{ $major->id }}"
                                        class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                        {{ in_array($major->id, $selectedMajorIds) ? 'checked' : '' }}
                                    >

                                    <div>

                                        <p class="font-medium text-gray-800">
                                            {{ $major->name }}
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            {{ $major->kode_jur }}
                                        </p>

                                    </div>

                                </label>

                            @endforeach

                        </div>

                    @else

                        <div class="rounded-xl bg-gray-50 p-6 text-center">

                            <p class="text-gray-500">
                                Belum ada jurusan yang disediakan oleh SuperAdmin.
                            </p>

                        </div>

                    @endif


                    @error('major_ids')

                        <p class="mt-3 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror


                    @error('major_ids.*')

                        <p class="mt-3 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>


            <div class="mt-6 flex justify-end gap-3">

                <a
                    href="{{ route('school_majors.index') }}"
                    class="rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-gray-700 hover:bg-gray-100"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-indigo-600 px-5 py-2.5 text-white hover:bg-indigo-700"
                >
                    Simpan Jurusan
                </button>

            </div>

        </form>
    </div>

@endsection