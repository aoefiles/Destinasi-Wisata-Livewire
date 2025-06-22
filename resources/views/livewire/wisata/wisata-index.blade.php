<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-4">Daftar Destinasi Wisata</h2>

                @if (session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif

                <div class="mb-4 flex flex-col sm:flex-row gap-4">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama atau deskripsi..." class="flex-grow rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    <select wire:model.live="selectedKota" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Semua Kota</option>
                        @foreach($kotas as $kota)
                            <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                        @endforeach
                    </select>

                    <input type="number" wire:model.live.debounce.300ms="maxBiayaMasuk" placeholder="Maks Biaya Masuk" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    <a href="/wisata/create" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Tambah Wisata Baru
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kota
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Biaya Masuk
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($wisatas as $wisata)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $wisata->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/wisata/{{ $wisata->id }}" class="text-indigo-600 hover:text-indigo-900 font-medium">{{ $wisata->nama }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $wisata->kota->nama_kota ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $wisata->kategori->nama_kategori ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Rp{{ number_format($wisata->biaya_masuk, 0, ',', '.') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/wisata/{{ $wisata->id }}/edit" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                        <button wire:click="delete({{ $wisata->id }})"
                                                wire:confirm="Apakah Anda yakin ingin menghapus destinasi ini?"
                                                class="text-red-600 hover:text-red-900">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                        Tidak ada destinasi wisata yang ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $wisatas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>