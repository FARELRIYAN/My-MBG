<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MBG Portal - Makan Bergizi Gratis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="font-sans antialiased text-gray-800 bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-100/50 backdrop-blur-md bg-white/90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 text-white p-2.5 rounded-xl shadow-lg shadow-green-200">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="block font-bold text-xl text-gray-900 tracking-tight leading-none">SPPG Kokrosono</span>
                        <span class="text-[10px] text-green-600 font-bold tracking-widest uppercase">Portal MBG Nasional</span>
                    </div>
                </div>
                <div>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-700 hover:text-green-600">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="px-6 py-2.5 text-sm font-bold text-white bg-green-600 rounded-full hover:bg-green-700 transition shadow-lg shadow-green-600/20 active:scale-95 transform duration-150">
                        Masuk (Login)
                    </a>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-24 pb-32 overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-50 text-green-700 text-xs font-bold uppercase tracking-wide mb-8 border border-green-100">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                Official MBG Portal
            </div>
            <h1 class="text-5xl md:text-7xl font-black text-gray-900 mb-8 leading-tight tracking-tight">
                Gizi Seimbang <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-400">Generasi Gemilang</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 mb-12 leading-relaxed">
                Sistem informasi terpadu Satuan Pelayanan Pemenuhan Gizi (SPPG) untuk memantau distribusi, kualitas, dan transparansi program Makan Bergizi Gratis.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#menu-hari-ini" class="px-8 py-3.5 bg-green-600 text-white rounded-xl font-bold hover:bg-green-700 transition shadow-xl shadow-green-200 hover:-translate-y-1">
                    Lihat Menu Hari Ini
                </a>
                <a href="#layanan-pengaduan" class="px-8 py-3.5 bg-white text-gray-700 border border-gray-200 rounded-xl font-bold hover:bg-gray-50 transition hover:-translate-y-1">
                    Layanan Pengaduan
                </a>
            </div>

            <div class="mt-16 flex justify-center gap-8 text-gray-400 grayscale opacity-60">
                <!-- Mock School Logos/Partners -->
                <div class="h-8 w-24 bg-gray-200 rounded"></div>
                <div class="h-8 w-24 bg-gray-200 rounded"></div>
                <div class="h-8 w-24 bg-gray-200 rounded"></div>
                <div class="h-8 w-24 bg-gray-200 rounded"></div>
            </div>
        </div>

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute top-[10%] left-[20%] w-[500px] h-[500px] bg-green-200/20 rounded-full blur-3xl mix-blend-multiply filter opacity-70 animate-blob"></div>
            <div class="absolute top-[10%] right-[20%] w-[500px] h-[500px] bg-emerald-200/20 rounded-full blur-3xl mix-blend-multiply filter opacity-70 animate-blob animation-delay-2000"></div>
        </div>
    </section>

    <!-- Menu Hari Ini (Point 18 & 19) -->
    <section id="menu-hari-ini" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 tracking-tight">Menu Spesial Hari Ini</h2>
                <p class="text-gray-500 mt-3 text-lg">Disajikan dengan standar gizi terbaik untuk siswa.</p>
            </div>

            @if($todaysMenu)
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 max-w-5xl mx-auto flex flex-col md:flex-row relative group">
                <div class="md:w-1/2 relative h-96 md:h-auto overflow-hidden">
                    <img src="{{ $todaysMenu->photo_url ?? 'https://placehold.co/800x600?text=No+Food+Image' }}" alt="{{ $todaysMenu->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-8">
                        <div class="text-white">
                            <span class="bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full mb-2 inline-block">Menu Utama</span>
                            <h3 class="text-3xl font-bold leading-tight">{{ $todaysMenu->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 p-10 flex flex-col justify-center">
                    <div class="flex items-center gap-2 text-gray-400 text-sm font-medium mb-6 uppercase tracking-wider">
                        <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($todaysMenu->date_served)->translatedFormat('l, d F Y') }}
                    </div>

                    <p class="text-gray-600 text-lg leading-relaxed mb-8">{{ $todaysMenu->description }}</p>

                    <!-- Nutrition Preview -->
                    @if($todaysMenu->nutritionFact)
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-orange-50 p-4 rounded-2xl border border-orange-100">
                            <span class="block text-3xl font-black text-orange-500">{{ $todaysMenu->nutritionFact->calories }}</span>
                            <span class="text-xs uppercase font-bold text-orange-900/50 tracking-wider">Kalori (Kkal)</span>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-2xl border border-blue-100">
                            <span class="block text-3xl font-black text-blue-500">{{ $todaysMenu->nutritionFact->protein }}g</span>
                            <span class="text-xs uppercase font-bold text-blue-900/50 tracking-wider">Protein</span>
                        </div>
                    </div>
                    @endif

                    <div x-data="{ open: false }">
                        <button @click="open = true" class="w-full py-4 bg-gray-900 text-white rounded-xl font-bold hover:bg-gray-800 transition flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Lihat Detail Gizi Lengkap
                        </button>

                        <!-- Modal Detail Gizi -->
                        <div x-show="open" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" style="display: none;">
                            <div @click.away="open = false" class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 animate-fade-in-up">
                                <div class="flex justify-between items-center mb-6">
                                    <h3 class="text-xl font-bold text-gray-900">Informasi Nilai Gizi</h3>
                                    <button @click="open = false" class="text-gray-400 hover:text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg></button>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                        <span class="text-gray-600">Energi Total</span>
                                        <span class="font-bold text-gray-900">{{ $todaysMenu->nutritionFact->calories ?? 0 }} kkal</span>
                                    </div>
                                    <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                        <span class="text-gray-600">Protein</span>
                                        <span class="font-bold text-gray-900">{{ $todaysMenu->nutritionFact->protein ?? 0 }} g</span>
                                    </div>
                                    <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                        <span class="text-gray-600">Karbohidrat</span>
                                        <span class="font-bold text-gray-900">{{ $todaysMenu->nutritionFact->carbohydrates ?? 0 }} g</span>
                                    </div>
                                    <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                        <span class="text-gray-600">Lemak Total</span>
                                        <span class="font-bold text-gray-900">{{ $todaysMenu->nutritionFact->fats ?? 0 }} g</span>
                                    </div>
                                    <div class="flex justify-between p-3 bg-gray-50 rounded-lg">
                                        <span class="text-gray-600">Serat Pangan</span>
                                        <span class="font-bold text-gray-900">{{ $todaysMenu->nutritionFact->fiber ?? 0 }} g</span>
                                    </div>
                                </div>
                                <div class="mt-6 text-center text-xs text-gray-400">
                                    *Persen Angka Kecukupan Gizi (AKG) berdasarkan kebutuhan energi 2150 kkal.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <!-- Empty State -->
            <div class="max-w-2xl mx-auto text-center py-16 bg-gray-50 rounded-3xl border border-dashed border-gray-300">
                <div class="bg-white w-20 h-20 rounded-full mx-auto flex items-center justify-center shadow-sm mb-4">
                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Menu Belum Dipublikasikan</h3>
                <p class="text-gray-500">Petugas Gizi belum mengupdate menu untuk hari ini.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Riwayat Menu (Point 20) -->
    <section class="py-24 bg-gray-50" id="histori-menu">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Riwayat Menu</h2>
                    <p class="text-gray-500 mt-2">Daftar menu 30 hari terakhir.</p>
                </div>

                <!-- FILTER JS -->
                <div class="flex gap-4">
                    <!-- Filter Bulan -->
                    <select id="filterMonth" class="bg-white border-0 px-5 py-3 rounded-xl shadow-sm text-sm font-semibold text-gray-700 ring-1 ring-gray-200 focus:ring-green-500">
                        <option value="all">Semua Bulan</option>
                        @foreach($availableMonths as $month)
                        @php
                        $val = str_pad($month->month, 2, '0', STR_PAD_LEFT);
                        $label = \Carbon\Carbon::createFromDate($month->year, $month->month, 1)->translatedFormat('F Y');
                        @endphp
                        <option value="{{ $val }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <!-- Filter Sekolah (Dummy/Mock Logic since global menu) -->
                    <select id="filterSchool" class="bg-white border-0 px-5 py-3 rounded-xl shadow-sm text-sm font-semibold text-gray-700 ring-1 ring-gray-200 focus:ring-green-500">
                        <option value="all">Semua Sekolah</option>
                        @foreach($schools as $school)
                        <option value="{{ $school->name }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="historyGrid">
                @foreach($pastMenus as $menu)
                @php
                $monthVal = \Carbon\Carbon::parse($menu->date_served)->format('m'); // 01, 02, etc.
                // Mock assigning random school for filtering demo purposes if menu doesn't have school
                // In real production with global menu, this filter implies filtering WHICH school ate THIS menu.
                @endphp
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group history-item" data-month="{{ $monthVal }}" data-school="all">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ $menu->photo_url ?? 'https://placehold.co/400x300' }}" alt="{{ $menu->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute bottom-2 left-2 bg-white/90 backdrop-blur px-2 py-1 rounded-md text-xs font-bold shadow-sm">
                            {{ \Carbon\Carbon::parse($menu->date_served)->format('d M Y') }}
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-gray-900 mb-1 leading-snug">{{ $menu->name }}</h3>
                        <p class="text-xs text-gray-500 line-clamp-2">{{ $menu->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <p id="noHistory" class="hidden text-center text-gray-400 py-10 italic">Tidak ada menu yang sesuai dengan filter.</p>
        </div>
    </section>

    <!-- Tim Kami (Point 21) -->
    <section class="py-24 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Tim SPPG</h2>
                <p class="text-gray-500 mt-2">Dibalik standar gizi dan pelayanan prima.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($teamMembers as $member)
                <div class="text-center group">
                    <div class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-gray-100 group-hover:border-green-100 transition mb-4 relative">
                        <img src="{{ $member->photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode($member->name).'&background=random' }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold text-lg text-gray-900">{{ $member->name }}</h4>
                    <p class="text-green-600 font-medium text-sm mt-1 uppercase tracking-wide">{{ $member->position }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Layanan Pengaduan (Point 22 - Tabs) -->
    <section id="layanan-pengaduan" class="py-24 bg-gradient-to-br from-gray-900 to-gray-800 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Pusat Aspirasi & Pengaduan</h2>
                <p class="text-gray-400 mt-2">Sampaikan masukan Anda demi layanan yang lebih baik.</p>
            </div>

            <!-- TABS AlpineJS -->
            <div x-data="{ tab: 'form' }" class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-3xl p-1">
                <div class="flex gap-1 p-1 mb-8 bg-black/20 rounded-2xl">
                    <button @click="tab = 'form'" :class="{ 'bg-green-500 text-white shadow-lg': tab === 'form', 'text-gray-400 hover:text-white': tab !== 'form' }" class="flex-1 py-3 rounded-xl font-bold text-sm transition text-center">
                        Buat Laporan Baru
                    </button>
                    <button @click="tab = 'list'" :class="{ 'bg-green-500 text-white shadow-lg': tab === 'list', 'text-gray-400 hover:text-white': tab !== 'list' }" class="flex-1 py-3 rounded-xl font-bold text-sm transition text-center">
                        Daftar Laporan Publik
                    </button>
                </div>

                <!-- ALERT SUCCESS -->
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500 text-green-300 rounded-xl flex items-center gap-3">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div>
                        <p class="font-bold">Laporan Berhasil!</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-500/20 border border-red-500 text-red-300 rounded-xl">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- TAB CONTENT: FORM -->
                <div x-show="tab === 'form'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="p-4 md:p-8">
                    <form action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="{ anonim: true }">
                        @csrf

                        <!-- Toggle Anonim -->
                        <div class="flex items-center gap-6 mb-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="mode_pelapor" value="anonim" @click="anonim = true" checked class="text-green-500 focus:ring-green-500 bg-gray-700 border-gray-600">
                                <span class="text-sm font-bold">Kirim Anonim</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="mode_pelapor" value="identitas" @click="anonim = false" class="text-green-500 focus:ring-green-500 bg-gray-700 border-gray-600">
                                <span class="text-sm font-bold">Sertakan Identitas</span>
                            </label>
                        </div>

                        <div x-show="!anonim" class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-fade-in-up">
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-400 mb-2">Nama Pelapor</label>
                                <input type="text" name="reporter_name" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" placeholder="Nama Lengkap">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-400 mb-2">Kontak</label>
                                <input type="text" name="reporter_contact" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" placeholder="No HP / WA">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-400 mb-2">Kategori Masalah <span class="text-red-400">*</span></label>
                            <select name="category" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 appearance-none">
                                <option value="" class="bg-gray-800">Pilih Kategori...</option>
                                <option value="Kualitas Makanan" class="bg-gray-800">Kualitas Makanan</option>
                                <option value="Keterlambatan" class="bg-gray-800">Keterlambatan Distribusi</option>
                                <option value="Porsi" class="bg-gray-800">Porsi Tidak Sesuai</option>
                                <option value="Higienitas" class="bg-gray-800">Higienitas & Kebersihan</option>
                                <option value="Lainnya" class="bg-gray-800">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-400 mb-2">Detail Laporan <span class="text-red-400">*</span></label>
                            <textarea name="content" rows="4" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" placeholder="Ceritakan kronologi kejadian secara detail..."></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-400 mb-2">Bukti Foto <span class="text-red-400">*</span></label>
                            <input type="file" name="photo_evidence" required accept="image/*" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-green-600 file:text-white hover:file:bg-green-700">
                        </div>

                        <button type="submit" class="w-full bg-green-500 text-white font-bold py-4 rounded-xl shadow-lg shadow-green-900/50 hover:bg-green-400 transition transform hover:-translate-y-1">
                            Kirim Laporan Sekarang
                        </button>
                    </form>
                </div>

                <!-- TAB CONTENT: LIST -->
                <div x-show="tab === 'list'" x-transition:enter="transition ease-out duration-300" class="p-4 md:p-8">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-gray-400 text-xs border-b border-white/10">
                                    <th class="py-3 px-4 font-bold uppercase">No Tiket</th>
                                    <th class="py-3 px-4 font-bold uppercase">Kategori</th>
                                    <th class="py-3 px-4 font-bold uppercase">Tanggal</th>
                                    <th class="py-3 px-4 font-bold uppercase">Status</th>
                                    <th class="py-3 px-4 font-bold uppercase">Isi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @forelse($publicComplaints as $pc)
                                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                                    <td class="py-4 px-4 font-mono text-green-400">{{ Str::mask($pc->ticket_code, '*', -4) }}</td>
                                    <td class="py-4 px-4 font-bold">{{ $pc->category ?? '-' }}</td>
                                    <td class="py-4 px-4 text-gray-400">{{ $pc->created_at->diffForHumans() }}</td>
                                    <td class="py-4 px-4">
                                        @if($pc->status == 'pending')
                                        <span class="bg-yellow-500/20 text-yellow-300 px-2 py-1 rounded text-xs font-bold">Menunggu</span>
                                        @elseif($pc->status == 'process')
                                        <span class="bg-blue-500/20 text-blue-300 px-2 py-1 rounded text-xs font-bold">Diproses</span>
                                        @elseif($pc->status == 'done')
                                        <span class="bg-green-500/20 text-green-300 px-2 py-1 rounded text-xs font-bold">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-gray-300 max-w-xs truncate">{{ $pc->content }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-gray-500 italic">Belum ada laporan publik yang ditampilkan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak & Lokasi (Point 24) -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 rounded-3xl overflow-hidden shadow-2xl bg-white border border-gray-100">
                <div class="p-10 flex flex-col justify-center">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Hubungi Pusat Layanan</h2>
                    <div class="space-y-6">
                        <!-- Item Kontak -->
                        <div class="flex items-start gap-4">
                            <div class="bg-green-100 p-3 rounded-lg text-green-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-gray-900">Lokasi Kantor</h4>
                                <p class="text-gray-500 leading-relaxed">Jl. Pemuda No. 123, Semarang<br>Jawa Tengah, Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-green-100 p-3 rounded-lg text-green-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg></div>
                            <div>
                                <h4 class="font-bold text-gray-900">Kontak Resmi</h4>
                                <p class="text-gray-500">layanan@sppg.go.id<br>+62 812-3456-7890 (WA Only)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-96 lg:h-auto bg-gray-200 relative">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253304.7078235492!2d110.3346592!3d-7.0245543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4d3f0d024d%3A0x1e0432b9da5cb9f2!2sSemarang%2C%20City%20of%20Semarang%2C%20Central%20Java!5e0!3m2!1sen!2sid"
                        class="w-full h-full absolute inset-0"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- EDUKASI GIZI (Enrichment - Poin Plus) -->
    <section class="py-16 bg-green-50/50 border-t border-green-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-10">
                <span class="text-green-600 font-bold uppercase tracking-wider text-xs">Pojok Edukasi</span>
                <h2 class="text-2xl font-bold text-gray-900">Pentingnya Gizi Seimbang</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-green-50 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4 text-green-600 font-bold">1</div>
                    <h3 class="font-bold text-lg mb-2">Isi Piringku</h3>
                    <p class="text-sm text-gray-500">Panduan porsi makan: 50% Buah & Sayur, 50% Karbohidrat & Lauk Pauk untuk gizi optimal.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-green-50 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4 text-blue-600 font-bold">2</div>
                    <h3 class="font-bold text-lg mb-2">Pentingnya Protein</h3>
                    <p class="text-sm text-gray-500">Protein hewani & nabati sangat penting untuk pertumbuhan sel dan kecerdasan otak siswa.</p>
                </div>
                <!-- Card 3 (Video Embed) -->
                <div class="bg-white p-1 rounded-2xl shadow-sm border border-green-50 overflow-hidden group">
                    <div class="relative h-48 rounded-xl overflow-hidden">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/p4W-bvGvyfk?si=bYrHGKB_9xJwl1Vd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-green-700 text-sm">VIDEO: Pedoman Gizi Seimbang</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-100 py-12 text-center text-gray-400 text-sm">
        <p class="font-bold text-gray-600 mb-2">SPPG Kokrosono &copy; {{ date('Y') }}</p>
        <p>Mendukung Program Makan Bergizi Gratis Nasional</p>
    </footer>

    <!-- Scripts for History Filter -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterMonth = document.getElementById('filterMonth');
            const filterSchool = document.getElementById('filterSchool');
            const items = document.querySelectorAll('.history-item');
            const noRes = document.getElementById('noHistory');

            function filterItems() {
                const selectedMonth = filterMonth.value; // "01", "02"
                const selectedSchool = filterSchool.value;
                let visibleCount = 0;

                items.forEach(item => {
                    const cardMonth = item.getAttribute('data-month'); // "01", "02"
                    const cardSchool = item.getAttribute('data-school');

                    const matchMonth = selectedMonth === 'all' || selectedMonth === cardMonth;
                    const matchSchool = selectedSchool === 'all' || cardSchool === selectedSchool || cardSchool === 'all';

                    if (matchMonth && matchSchool) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                noRes.style.display = visibleCount === 0 ? 'block' : 'none';
            }

            filterMonth.addEventListener('change', filterItems);
            filterSchool.addEventListener('change', filterItems);
        });
    </script>
</body>

</html>