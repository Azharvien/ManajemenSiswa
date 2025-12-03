<x-layout>
  <h1 class="text-xl mb-5 font-bold">Tambah siswa</h1>
  <form action="{{ route('siswa.store') }}" method="POST" class="space-y-4 max-w-4xl">
    @csrf

    {{-- INPUT NAMA --}}
    <div>
      <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
      {{-- Tambahkan placeholder di sini --}}
      <input 
        type="text" 
        id="nama" 
        name="nama" 
        required 
        value="{{ old('nama') }}"
        placeholder="Mohon di isi minimal 3 karakter tidak menggunakan angka/simbol"
        class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300" 
      />
        @error('nama')
          <div class="mt-2 p-3 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ $message }}
          </div>
        @enderror
    </div>
    
    {{-- INPUT TANGGAL LAHIR --}}
    <div>
      <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
      {{-- Note: Untuk type="date", placeholder mungkin tidak muncul di beberapa browser karena terganti format dd/mm/yyyy --}}
      <input 
        type="date" 
        id="tanggal_lahir" 
        name="tanggal_lahir" 
        required 
        value="{{ old('tanggal_lahir') }}"
        class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300" 
      />
       {{-- Hint untuk tanggal lahir biasanya lebih baik tetap di bawah atau di label karena input date punya format sendiri --}}
       <p class="text-xs text-gray-500 mt-1">*Tidak boleh lebih dari hari ini*</p>

        @error('tanggal_lahir')
          <div class="mt-2 p-3 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ $message }}
          </div>
        @enderror
    </div>

    {{-- INPUT JURUSAN --}}
    <div>
      <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
      <input 
        type="text" 
        id="jurusan" 
        name="jurusan" 
        required 
        value="{{ old('jurusan') }}"
        placeholder="Mohon isi jurusan dengan minimal 3 karakter"
        class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300" 
      />
        @error('jurusan')
          <div class="mt-2 p-3 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ $message }}
          </div>
        @enderror
    </div>

    {{-- INPUT NILAI --}}
    <div>
      <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
      <input 
        type="number" 
        id="nilai" 
        name="nilai" 
        min="0" 
        max="100" 
        required 
        value="{{ old('nilai') }}"
        placeholder="Isi angka valid antara 0 sampai 100"
        class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300" 
      />
        @error('nilai')
          <div class="mt-2 p-3 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ $message }}
          </div>
        @enderror
    </div>

    {{-- INPUT MENTOR --}}
    <div>
      <label for="mentor_id" class="block text-sm font-medium text-gray-700 pt-3">Mentor</label>
      <select id="mentor_id" name="mentor_id" required class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300">
        {{-- Untuk Select Option, placeholder itu adalah option pertama yang disabled --}}
        <option value="" disabled selected>-- Mohon pilih mentor mu --</option>
        @foreach ($mentors as $mentor)
          <option value="{{ $mentor->id }}" {{ old('mentor_id') == $mentor->id ? 'selected' : '' }}>{{ $mentor->nama }}</option>
        @endforeach
      </select>
        @error('mentor_id')
          <div class="mt-2 p-3 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ $message }}
          </div>
        @enderror
    </div>

    <button type="submit" class="mt-4 bg-teal-600 w-full text-white px-5 py-2 rounded-lg opacity-70 hover:bg-teal-700 transition">Simpan Siswa</button>
  </form>

  <x-slot:footer>
        <strong>Tambah Siswa Page</strong>
    </x-slot:footer>
</x-layout>