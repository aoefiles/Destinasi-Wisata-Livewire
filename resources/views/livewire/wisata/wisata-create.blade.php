<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-4">Tambah Destinasi Wisata Baru</h2>

                <form wire:submit="store">
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Destinasi</label>
                        <input type="text" id="nama" wire:model="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="deskripsi" wire:model="deskripsi" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        @error('deskripsi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kota_id" class="block text-sm font-medium text-gray-700">Kota</label>
                        <select id="kota_id" wire:model="kota_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Pilih Kota</option>
                            @foreach($kotas as $kota)
                                <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                            @endforeach
                        </select>
                        @error('kota_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="kategori_id" wire:model="kategori_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="biaya_masuk" class="block text-sm font-medium text-gray-700">Biaya Masuk (Rp)</label>
                        <input type="number" id="biaya_masuk" wire:model="biaya_masuk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('biaya_masuk') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="/wisata" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-2">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
