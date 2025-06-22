<div>
    <div class="hero-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1>Jelajahi Keindahan Destinasi Wisata</h1>
            <p>Temukan petualangan Anda berikutnya dan bagikan pengalaman tak terlupakan!</p>
            <a href="{{ route('register') }}" class="btn-primary text-xl px-8 py-3" wire:navigate>Mulai Petualangan Anda</a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="content-card"> {{-- Menggunakan class custom.css --}}
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Destinasi Wisata Terpopuler</h2>

                <div class="mb-6 flex flex-col sm:flex-row gap-4 items-center">
                    <select wire:model.live="selectedKota" class="form-select flex-grow"> {{-- Menggunakan class custom.css --}}
                        <option value="">Filter Berdasarkan Kota</option>
                        @foreach($kotas as $kota)
                            <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                        @endforeach
                    </select>

                    <input type="number" wire:model.live.debounce.300ms="maxBiayaMasuk" placeholder="Maks Biaya Masuk (Rp)" class="form-input flex-grow"> {{-- Menggunakan class custom.css --}}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($wisatas as $wisata)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4 flex flex-col hover:shadow-lg transition-shadow duration-300">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                <a href="/wisata/{{ $wisata->id }}" class="hover:text-indigo-600" wire:navigate>{{ $wisata->nama }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-1">Kota: <span class="font-medium">{{ $wisata->kota->nama_kota ?? 'N/A' }}</span></p>
                            <p class="text-gray-600 text-sm mb-1">Kategori: <span class="font-medium">{{ $wisata->kategori->nama_kategori ?? 'N/A' }}</span></p>
                            <p class="text-gray-600 text-sm mb-2">Biaya Masuk: <span class="font-bold text-green-700">Rp{{ number_format($wisata->biaya_masuk, 0, ',', '.') }}</span></p>
                            <p class="text-gray-700 text-sm line-clamp-3 mb-3">{{ $wisata->deskripsi }}</p>
                            <div class="mt-auto flex items-center justify-between">
                                @if ($wisata->average_rating)
                                    <span class="text-yellow-500 font-bold text-lg flex items-center">
                                        <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.381-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"></path></svg>
                                        {{ number_format($wisata->average_rating, 1) }} / 5
                                    </span>
                                @else
                                    <span class="text-gray-500 text-sm">Belum ada rating</span>
                                @endif
                                <a href="/wisata/{{ $wisata->id }}" class="btn-primary" wire:navigate>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8 text-gray-500">
                            Tidak ada destinasi wisata populer yang ditemukan.
                        </div>
                    @endforelse
                </div>

                <div class="mt-8">
                    {{ $wisatas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>