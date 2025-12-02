<x-layout>
  <h1 class="text-xl mb-5 font-bold">Tambah siswa</h1>
  <form action="{{ route('siswa.store') }}" method="POST" class="space-y-4 max-w-4xl">
    @csrf
    <div>
      <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
      <input type="text" id="nama" name="nama" required class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300" />
    </div>

    <div>
      <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
      <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300" />
    </div>

    <div>
      <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
      <input type="text" id="jurusan" name="jurusan" required class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300" />
    </div>

    <div>
      <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
      <input type="number" id="nilai" name="nilai" min="0" max="100" required class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300" />
    </div>

    <div>
      <label for="mentor_id" class="block text-sm font-medium text-gray-700">Mentor</label>
      <select id="mentor_id" name="mentor_id" required class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300">
        <option value="">-- Pilih Mentor --</option>
        @foreach ($mentors as $mentor)
          <option value="{{ $mentor->id }}">{{ $mentor->nama }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Simpan Siswa</button>
  </form>
  <x-slot:footer>
        <strong>Tambah Siswa Page</strong>
    </x-slot:footer>
</x-layout>