@extends('dashboard.layouts.app')

@section('container')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="flex justify-center items-start min-h-screen pt-20 bg-white">
    <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-300 w-full max-w-xl z-50 relative">
        <form action="{{ route('penilaian.perbarui', $data->alternatif_id) }}" method="post" enctype="multipart/form-data">
            <h3 class="font-bold text-lg mb-4">Ubah {{ $judul }}:
                <span class="text-greenPrimary">{{ $data->alternatif->objek->nama }}</span>
            </h3>
            @csrf
            <input type="text" name="alternatif_id" value="{{ $data->alternatif_id }}" hidden />
            @foreach ($subKriteria->unique('kriteria_id') as $item)
                <div class="form-control w-full mb-4">
                    <label class="label mb-1">
                        <span class="label-text text-gray-700">Sub Kriteria: <span class="text-green-600">{{ $item->kriteria->nama }}</span></span>
                    </label>
                    <select name="kriteria_id[]" class="select select-bordered bg-white text-black border-gray-300 w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option disabled selected>--Pilih--</option>
                        @foreach ($subKriteria->where('kriteria_id', $item->kriteria_id) as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == $data2->where('kriteria_id', $item->kriteria_id)->first()->sub_kriteria_id ? 'selected' : '' }}>
                                {{ $value->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('sub_kriteria_id')
                        <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
            <div class="modal-action flex justify-end gap-3 mt-6">
                <button type="submit" class="btn btn-success">Perbarui</button>
                <a href="{{ route('penilaian') }}" class="btn">Batal</a>
            </div>
        </form>
    </div>
</div>
    </div>
@endsection
