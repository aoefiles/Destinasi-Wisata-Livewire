<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-6">Ringkasan Aplikasi Destinasi Wisata</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card: Total Pengguna -->
                    <div class="bg-blue-100 border border-blue-200 rounded-lg p-5 shadow-sm text-center">
                        <h3 class="text-lg font-semibold text-blue-800">Total Pengguna</h3>
                        <p class="text-4xl font-bold text-blue-900 mt-2">{{ $totalUsers }}</p>
                    </div>

                    <!-- Card: Total Destinasi Wisata -->
                    <div class="bg-green-100 border border-green-200 rounded-lg p-5 shadow-sm text-center">
                        <h3 class="text-lg font-semibold text-green-800">Total Destinasi Wisata</h3>
                        <p class="text-4xl font-bold text-green-900 mt-2">{{ $totalWisatas }}</p>
                    </div>

                    <!-- Card: Total Kategori -->
                    <div class="bg-purple-100 border border-purple-200 rounded-lg p-5 shadow-sm text-center">
                        <h3 class="text-lg font-semibold text-purple-800">Total Kategori</h3>
                        <p class="text-4xl font-bold text-purple-900 mt-2">{{ $totalKategoris }}</p>
                    </div>

                    <!-- Card: Total Kota -->
                    <div class="bg-yellow-100 border border-yellow-200 rounded-lg p-5 shadow-sm text-center">
                        <h3 class="text-lg font-semibold text-yellow-800">Total Kota</h3>
                        <p class="text-4xl font-bold text-yellow-900 mt-2">{{ $totalKotas }}</p>
                    </div>

                    <!-- Card: Total Ulasan -->
                    <div class="bg-indigo-100 border border-indigo-200 rounded-lg p-5 shadow-sm text-center">
                        <h3 class="text-lg font-semibold text-indigo-800">Total Ulasan</h3>
                        <p class="text-4xl font-bold text-indigo-900 mt-2">{{ $totalUlasans }}</p>
                    </div>

                    <!-- Card: Rata-rata Rating -->
                    <div class="bg-red-100 border border-red-200 rounded-lg p-5 shadow-sm text-center">
                        <h3 class="text-lg font-semibold text-red-800">Rata-rata Rating</h3>
                        <p class="text-4xl font-bold text-red-900 mt-2">{{ $averageRating }} / 5</p>
                    </div>
                </div>

                <div class="mt-8 text-center text-gray-700">
                    <p>Kelola data aplikasi Anda melalui menu navigasi di atas.</p>
                    <p class="mt-2 text-sm text-gray-500">Dashboard ini memberikan ringkasan cepat tentang data utama di sistem Destinasi Wisata Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
