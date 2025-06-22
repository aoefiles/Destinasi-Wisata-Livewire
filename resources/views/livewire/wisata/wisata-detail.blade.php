<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-3xl font-bold mb-4">{{ $wisata->nama }}</h1>
                <p class="text-gray-600 mb-2">Kota: {{ $wisata->kota->nama_kota ?? 'N/A' }}</p>
                <p class="text-gray-600 mb-2">Kategori: {{ $wisata->kategori->nama_kategori ?? 'N/A' }}</p>
                <p class="text-gray-600 mb-4">Biaya Masuk: Rp{{ number_format($wisata->biaya_masuk, 0, ',', '.') }}</p>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Deskripsi</h3>
                    <p class="text-gray-700">{{ $wisata->deskripsi }}</p>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Rating Rata-rata:
                        <span class="text-yellow-500">{{ number_format($averageRating, 1) }}</span> / 5
                    </h3>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Ulasan Pengguna</h3>
                    @forelse($ulasans as $ulasan)
                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <p class="text-md font-medium">{{ $ulasan->user->name ?? 'Pengguna Tidak Dikenal' }}</p>
                            <div class="flex items-center text-yellow-500 text-sm">
                                @for ($i = 0; $i < $ulasan->rating; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                @endfor
                                @for ($i = $ulasan->rating; $i < 5; $i++)
                                    <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                @endfor
                                <span class="ml-1 text-gray-600">{{ $ulasan->rating }}</span>
                            </div>
                            <p class="text-gray-700 mt-1">{{ $ulasan->komentar }}</p>
                            <p class="text-gray-500 text-sm mt-1">Ditulis pada: {{ $ulasan->created_at->format('d M Y') }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada ulasan untuk destinasi ini.</p>
                    @endforelse
                </div>

                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-2">Berikan Ulasan Anda</h3>
                    @livewire('ulasan.create-ulasan', ['wisataId' => $wisata->id])
                </div>
            </div>
        </div>
    </div>
</div>
