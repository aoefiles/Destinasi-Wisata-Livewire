<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    @auth
        <form wire:submit="store">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Rating</label>
                <div class="flex items-center mt-1">
                    @for ($i = 1; $i <= 5; $i++)
                        {{-- Menggunakan wire:click untuk mengatur rating secara langsung --}}
                        <label wire:click="$set('rating', {{ $i }})" class="cursor-pointer text-gray-400 transition-colors duration-200
                            @if($rating >= $i) text-yellow-500 @endif
                            hover:text-yellow-500 {{-- Tambahkan efek hover untuk bintang yang belum dipilih --}}
                            text-3xl {{-- Jadikan bintang lebih besar untuk kemudahan klik --}}
                        ">
                            &#9733; {{-- Menggunakan karakter bintang Unicode yang lebih sederhana --}}
                        </label>
                    @endfor
                    {{-- Debugging: Tampilkan nilai rating yang sedang dipilih (hanya untuk pengembangan) --}}
                    {{-- <span class="ml-2 text-gray-600">({{ $rating }} bintang dipilih)</span> --}}
                </div>
                @error('rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="komentar" class="block text-sm font-medium text-gray-700">Komentar</label>
                <textarea id="komentar" wire:model="komentar" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                @error('komentar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Kirim Ulasan
            </button>
        </form>
    @else
        <p class="text-gray-600">Silakan <a href="/login" class="text-indigo-600 hover:underline" wire:navigate>login</a> untuk memberikan ulasan.</p>
    @endauth
</div>
