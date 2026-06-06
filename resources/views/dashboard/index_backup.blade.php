<!doctype html>
<html lang="id" class="h-full">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NTB Lib-Insights Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <style>
    body {
      box-sizing: border-box;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .gradient-bg {
      background: linear-gradient(135deg, #0c4a6e 0%, #164e63 50%, #134e4a 100%);
    }
    
    .card-glass {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
    }
    
    .stat-card {
      background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
      transition: all 0.3s ease;
    }
    
    .stat-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    
    .map-container {
      background: linear-gradient(180deg, #e0f2fe 0%, #bae6fd 50%, #7dd3fc 100%);
      position: relative;
      overflow: hidden;
    }
    
    .island-shape {
      fill: #059669;
      filter: drop-shadow(2px 4px 6px rgba(0,0,0,0.2));
    }
    
    .marker {
      cursor: pointer;
      transition: all 0.2s ease;
    }
    
    .marker:hover {
      transform: scale(1.3);
    }
    
    .progress-bar {
      background: linear-gradient(90deg, #10b981 0%, #059669 100%);
      transition: width 0.8s ease-out;
    }
    
    .accred-bar {
      transition: width 0.6s ease-out;
    }
    
    .sidebar {
      transition: transform 0.3s ease;
    }
    
    .modal-overlay {
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(4px);
    }
    
    .pulse-dot {
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.7; transform: scale(1.1); }
    }
    
    .fade-in {
      animation: fadeIn 0.5s ease-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .login-card {
      background: rgba(255, 255, 255, 0.98);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    input:focus, select:focus {
      outline: none;
      ring: 2px;
      ring-color: #0891b2;
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
      transition: all 0.2s ease;
    }
    
    .btn-primary:hover {
      background: linear-gradient(135deg, #0e7490 0%, #155e75 100%);
      transform: translateY(-1px);
    }
    
    .btn-danger {
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }
    
    .btn-danger:hover {
      background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    }
    
    .table-row:hover {
      background: #f0fdfa;
    }
    
    .toast {
      animation: slideIn 0.3s ease-out;
    }
    
    @keyframes slideIn {
      from { transform: translateX(100%); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }
  </style>
  <style>@view-transition { navigation: auto; }</style>
 </head>
 <body class="h-full m-0 p-0 overflow-auto">
  <div id="app" class="min-h-full w-full gradient-bg"><!-- Login Screen -->
   <div id="login-screen" class="min-h-full w-full flex items-center justify-center p-4">
    <div class="login-card rounded-3xl p-8 md:p-12 w-full max-w-md fade-in">
     <div class="text-center mb-8">
      <div class="w-20 h-20 mx-auto mb-4 rounded-2xl gradient-bg flex items-center justify-center">
       <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
       </svg>
      </div>
      <h1 id="login-title" class="text-2xl font-bold text-gray-800">NTB Lib-Insights</h1>
      <p class="text-gray-500 mt-2">Dashboard Statistik &amp; Akreditasi Perpustakaan</p>
     </div>
     <div class="space-y-4">
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Username</label> <input type="text" id="username" placeholder="Masukkan username" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition">
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Password</label> <input type="password" id="password" placeholder="Masukkan password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition">
      </div><button onclick="handleLogin()" class="w-full btn-primary text-white font-semibold py-3 px-6 rounded-xl mt-6"> Masuk sebagai Admin </button> <button onclick="viewAsGuest()" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-6 rounded-xl transition"> Lihat sebagai Tamu </button>
     </div>
     <p id="login-error" class="text-red-500 text-sm text-center mt-4 hidden">Username atau password salah</p>
     <div class="mt-8 pt-6 border-t border-gray-100 text-center">
      <p class="text-xs text-gray-400">Demo: admin / admin123</p>
     </div>
    </div>
   </div><!-- Main Dashboard -->
   <div id="dashboard-screen" class="hidden min-h-full w-full"><!-- Header -->
    <header class="bg-white/95 backdrop-blur-lg shadow-sm sticky top-0 z-40">
     <div class="max-w-7xl mx-auto px-4 py-4">
      <div class="flex items-center justify-between">
       <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl gradient-bg flex items-center justify-center">
         <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
         </svg>
        </div>
        <div>
         <h1 id="dashboard-title" class="text-xl font-bold text-gray-800">NTB Lib-Insights</h1>
         <p id="dashboard-subtitle" class="text-sm text-gray-500">Dashboard Statistik &amp; Akreditasi</p>
        </div>
       </div>
       <div class="flex items-center gap-3"><span id="user-badge" class="hidden md:flex items-center gap-2 px-3 py-1.5 bg-emerald-100 text-emerald-700 rounded-full text-sm font-medium"> <span class="w-2 h-2 bg-emerald-500 rounded-full pulse-dot"></span> Admin </span> <button onclick="handleLogout()" class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 font-medium transition">
         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
         </svg> Keluar </button>
       </div>
      </div>
     </div>
    </header><!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-6"><!-- Stats Cards -->
     <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
      <div class="stat-card rounded-2xl p-5 shadow-lg">
       <div class="flex items-start justify-between">
        <div>
         <p class="text-gray-500 text-sm font-medium">Total Perpustakaan</p>
         <p id="stat-total" class="text-3xl font-bold text-gray-800 mt-1">0</p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-cyan-100 flex items-center justify-center">
         <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
         </svg>
        </div>
       </div>
      </div>
      <div class="stat-card rounded-2xl p-5 shadow-lg">
       <div class="flex items-start justify-between">
        <div>
         <p class="text-gray-500 text-sm font-medium">Terakreditasi</p>
         <p id="stat-accredited" class="text-3xl font-bold text-emerald-600 mt-1">0</p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
         <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
         </svg>
        </div>
       </div>
      </div>
      <div class="stat-card rounded-2xl p-5 shadow-lg">
       <div class="flex items-start justify-between">
        <div>
         <p class="text-gray-500 text-sm font-medium">Memiliki NPP</p>
         <p id="stat-npp" class="text-3xl font-bold text-blue-600 mt-1">0</p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
         <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
         </svg>
        </div>
       </div>
      </div>
      <div class="stat-card rounded-2xl p-5 shadow-lg">
       <div class="flex items-start justify-between">
        <div>
         <p class="text-gray-500 text-sm font-medium">% NPP</p>
         <p id="stat-npp-percent" class="text-3xl font-bold text-purple-600 mt-1">0%</p>
        </div>
        <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">
         <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
         </svg>
        </div>
       </div>
      </div>
     </div><!-- Filters -->
     <div class="bg-white rounded-2xl shadow-lg p-5 mb-6">
      <div class="flex flex-wrap items-center gap-4">
       <div class="flex-1 min-w-[200px]"><label class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label> <select id="filter-kabupaten" onchange="applyFilters()" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"> <option value="">Semua Kabupaten/Kota</option> <option value="Kota Mataram">Kota Mataram</option> <option value="Kab. Lombok Barat">Kab. Lombok Barat</option> <option value="Kab. Lombok Tengah">Kab. Lombok Tengah</option> <option value="Kab. Lombok Timur">Kab. Lombok Timur</option> <option value="Kab. Lombok Utara">Kab. Lombok Utara</option> <option value="Kota Bima">Kota Bima</option> <option value="Kab. Bima">Kab. Bima</option> <option value="Kab. Dompu">Kab. Dompu</option> <option value="Kab. Sumbawa">Kab. Sumbawa</option> <option value="Kab. Sumbawa Barat">Kab. Sumbawa Barat</option> </select>
       </div>
       <div class="flex-1 min-w-[200px]"><label class="block text-sm font-medium text-gray-700 mb-2">Jenis Perpustakaan</label> <select id="filter-type" onchange="applyFilters()" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"> <option value="">Semua Jenis</option> <option value="Sekolah">Perpustakaan Sekolah</option> <option value="Umum">Perpustakaan Umum</option> <option value="Perguruan Tinggi">Perpustakaan PT</option> <option value="Khusus">Perpustakaan Khusus</option> </select>
       </div>
       <div class="flex-1 min-w-[200px]"><label class="block text-sm font-medium text-gray-700 mb-2">Status Akreditasi</label> <select id="filter-accred" onchange="applyFilters()" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"> <option value="">Semua Status</option> <option value="A">Akreditasi A</option> <option value="B">Akreditasi B</option> <option value="C">Akreditasi C</option> <option value="Belum">Belum Terakreditasi</option> </select>
       </div>
       <div id="admin-actions" class="hidden"><label class="block text-sm font-medium text-gray-700 mb-2">&nbsp;</label> <button onclick="openAddModal()" class="btn-primary text-white font-semibold py-2.5 px-6 rounded-xl flex items-center gap-2">
         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
         </svg> Tambah Data </button>
       </div>
      </div>
     </div>
     <div class="grid lg:grid-cols-2 gap-6 mb-6"><!-- Map -->
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
       <div class="px-5 py-4 border-b border-gray-100">
        <h2 class="font-bold text-gray-800">📍 Peta Sebaran Perpustakaan NTB</h2>
       </div>
       <div class="map-container h-80 relative">
        <svg viewbox="0 0 500 250" class="w-full h-full"><!-- Sea background --> <rect width="500" height="250" fill="url(#seaGradient)" /> <defs>
          <lineargradient id="seaGradient" x1="0%" y1="0%" x2="0%" y2="100%">
           <stop offset="0%" style="stop-color:#bae6fd" />
           <stop offset="100%" style="stop-color:#7dd3fc" />
          </lineargradient>
         </defs> <!-- Lombok Island (simplified) --> <path class="island-shape" d="M60,100 Q80,70 120,75 Q160,70 180,90 Q200,110 190,140 Q170,170 140,175 Q100,180 70,160 Q50,140 60,100 Z" /> <!-- Sumbawa Island (simplified) --> <path class="island-shape" d="M220,90 Q250,70 300,75 Q350,70 390,85 Q420,100 430,120 Q440,150 420,170 Q380,190 320,185 Q260,180 230,160 Q210,140 220,90 Z" /> <!-- Location markers will be added dynamically --> <g id="map-markers"></g> <!-- Labels --> <text x="120" y="130" text-anchor="middle" class="fill-white text-xs font-bold" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5)">
          LOMBOK
         </text> <text x="320" y="130" text-anchor="middle" class="fill-white text-xs font-bold" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5)">
          SUMBAWA
         </text>
        </svg><!-- Legend -->
        <div class="absolute bottom-3 left-3 bg-white/90 rounded-lg p-2 text-xs">
         <div class="flex items-center gap-2 mb-1"><span class="w-3 h-3 rounded-full bg-cyan-500"></span> <span>Sekolah</span>
         </div>
         <div class="flex items-center gap-2 mb-1"><span class="w-3 h-3 rounded-full bg-emerald-500"></span> <span>Umum</span>
         </div>
         <div class="flex items-center gap-2 mb-1"><span class="w-3 h-3 rounded-full bg-purple-500"></span> <span>PT</span>
         </div>
         <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-orange-500"></span> <span>Khusus</span>
         </div>
        </div>
       </div>
      </div><!-- Accreditation Chart -->
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
       <div class="px-5 py-4 border-b border-gray-100">
        <h2 class="font-bold text-gray-800">📊 Status Akreditasi Perpustakaan</h2>
       </div>
       <div class="p-5">
        <div class="space-y-4">
         <div>
          <div class="flex justify-between mb-2"><span class="font-medium text-gray-700">Akreditasi A</span> <span id="accred-a-count" class="font-bold text-emerald-600">0</span>
          </div>
          <div class="h-4 bg-gray-100 rounded-full overflow-hidden">
           <div id="accred-a-bar" class="h-full accred-bar rounded-full bg-emerald-500" style="width: 0%"></div>
          </div>
         </div>
         <div>
          <div class="flex justify-between mb-2"><span class="font-medium text-gray-700">Akreditasi B</span> <span id="accred-b-count" class="font-bold text-blue-600">0</span>
          </div>
          <div class="h-4 bg-gray-100 rounded-full overflow-hidden">
           <div id="accred-b-bar" class="h-full accred-bar rounded-full bg-blue-500" style="width: 0%"></div>
          </div>
         </div>
         <div>
          <div class="flex justify-between mb-2"><span class="font-medium text-gray-700">Akreditasi C</span> <span id="accred-c-count" class="font-bold text-amber-600">0</span>
          </div>
          <div class="h-4 bg-gray-100 rounded-full overflow-hidden">
           <div id="accred-c-bar" class="h-full accred-bar rounded-full bg-amber-500" style="width: 0%"></div>
          </div>
         </div>
         <div>
          <div class="flex justify-between mb-2"><span class="font-medium text-gray-700">Belum Terakreditasi</span> <span id="accred-none-count" class="font-bold text-gray-500">0</span>
          </div>
          <div class="h-4 bg-gray-100 rounded-full overflow-hidden">
           <div id="accred-none-bar" class="h-full accred-bar rounded-full bg-gray-400" style="width: 0%"></div>
          </div>
         </div>
        </div><!-- NPP Progress -->
        <div class="mt-6 pt-6 border-t border-gray-100">
         <h3 class="font-bold text-gray-800 mb-4">📋 Status NPP (Nomor Pokok Perpustakaan)</h3>
         <div class="relative">
          <div class="h-6 bg-gray-100 rounded-full overflow-hidden">
           <div id="npp-progress-bar" class="h-full progress-bar rounded-full" style="width: 0%"></div>
          </div>
          <div class="flex justify-between mt-2 text-sm"><span class="text-gray-500">Memiliki NPP: <span id="npp-have" class="font-bold text-emerald-600">0</span></span> <span class="text-gray-500">Belum NPP: <span id="npp-not" class="font-bold text-gray-500">0</span></span>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div><!-- Data Table -->
     <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
      <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center">
       <h2 class="font-bold text-gray-800">📚 Daftar Perpustakaan</h2><span id="table-count" class="text-sm text-gray-500">0 data</span>
      </div>
      <div class="overflow-x-auto">
       <table class="w-full">
        <thead class="bg-gray-50">
         <tr>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis</th>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kabupaten/Kota</th>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Akreditasi</th>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NPP</th>
          <th id="action-header" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider hidden">Aksi</th>
         </tr>
        </thead>
        <tbody id="table-body" class="divide-y divide-gray-100">
         <tr>
          <td colspan="6" class="px-4 py-8 text-center text-gray-500">
           <div class="flex flex-col items-center">
            <svg class="w-16 h-16 text-gray-300 mb-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <p>Belum ada data perpustakaan</p>
            <p class="text-sm text-gray-400 mt-1">Klik "Tambah Data" untuk menambahkan</p>
           </div></td>
         </tr>
        </tbody>
       </table>
      </div>
     </div>
    </main>
   </div><!-- Add/Edit Modal -->
   <div id="modal" class="fixed inset-0 z-50 hidden">
    <div class="modal-overlay absolute inset-0" onclick="closeModal()"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4 pointer-events-none">
     <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90%] overflow-auto pointer-events-auto fade-in">
      <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center sticky top-0 bg-white">
       <h3 id="modal-title" class="text-lg font-bold text-gray-800">Tambah Perpustakaan</h3><button onclick="closeModal()" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center">
        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg></button>
      </div>
      <form id="library-form" onsubmit="handleFormSubmit(event)" class="p-6 space-y-4"><input type="hidden" id="edit-id">
       <div><label class="block text-sm font-medium text-gray-700 mb-2">Nama Perpustakaan *</label> <input type="text" id="form-name" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200" placeholder="Masukkan nama perpustakaan">
       </div>
       <div class="grid grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Jenis *</label> <select id="form-type" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"> <option value="">Pilih Jenis</option> <option value="Sekolah">Perpustakaan Sekolah</option> <option value="Umum">Perpustakaan Umum</option> <option value="Perguruan Tinggi">Perpustakaan PT</option> <option value="Khusus">Perpustakaan Khusus</option> </select>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota *</label> <select id="form-kabupaten" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"> <option value="">Pilih Kabupaten/Kota</option> <option value="Kota Mataram">Kota Mataram</option> <option value="Kab. Lombok Barat">Kab. Lombok Barat</option> <option value="Kab. Lombok Tengah">Kab. Lombok Tengah</option> <option value="Kab. Lombok Timur">Kab. Lombok Timur</option> <option value="Kab. Lombok Utara">Kab. Lombok Utara</option> <option value="Kota Bima">Kota Bima</option> <option value="Kab. Bima">Kab. Bima</option> <option value="Kab. Dompu">Kab. Dompu</option> <option value="Kab. Sumbawa">Kab. Sumbawa</option> <option value="Kab. Sumbawa Barat">Kab. Sumbawa Barat</option> </select>
        </div>
       </div>
       <div><label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label> <input type="text" id="form-address" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200" placeholder="Masukkan alamat lengkap">
       </div>
       <div class="grid grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Status Akreditasi</label> <select id="form-accred" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"> <option value="Belum">Belum Terakreditasi</option> <option value="A">Akreditasi A</option> <option value="B">Akreditasi B</option> <option value="C">Akreditasi C</option> </select>
        </div>
        <div><label class="block text-sm font-medium text-gray-700 mb-2">Status NPP</label> <select id="form-npp" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200"> <option value="false">Belum Memiliki</option> <option value="true">Sudah Memiliki</option> </select>
        </div>
       </div>
       <div id="npp-number-field" class="hidden"><label class="block text-sm font-medium text-gray-700 mb-2">Nomor NPP</label> <input type="text" id="form-npp-number" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200" placeholder="Masukkan nomor NPP">
       </div>
       <div class="flex gap-3 pt-4"><button type="button" onclick="closeModal()" class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition"> Batal </button> <button type="submit" id="form-submit-btn" class="flex-1 btn-primary text-white font-semibold py-3 px-6 rounded-xl"> Simpan </button>
       </div>
      </form>
     </div>
    </div>
   </div><!-- Delete Confirmation -->
   <div id="delete-confirm" class="fixed inset-0 z-50 hidden">
    <div class="modal-overlay absolute inset-0" onclick="closeDeleteConfirm()"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4 pointer-events-none">
     <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm pointer-events-auto fade-in p-6 text-center">
      <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-100 flex items-center justify-center">
       <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
       </svg>
      </div>
      <h3 class="text-lg font-bold text-gray-800 mb-2">Hapus Data?</h3>
      <p id="delete-name" class="text-gray-500 mb-6">Apakah Anda yakin ingin menghapus perpustakaan ini?</p>
      <div class="flex gap-3"><button onclick="closeDeleteConfirm()" class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition"> Batal </button> <button onclick="confirmDelete()" id="delete-btn" class="flex-1 btn-danger text-white font-semibold py-3 px-6 rounded-xl"> Hapus </button>
      </div>
     </div>
    </div>
   </div><!-- Toast -->
   <div id="toast" class="fixed bottom-4 right-4 z-50 hidden">
    <div class="toast bg-gray-800 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3"><span id="toast-icon">✓</span> <span id="toast-message">Berhasil disimpan</span>
    </div>
   </div>
  </div>
  <script>
    // State
    let allLibraries = [];
    let filteredLibraries = [];
    let isAdmin = false;
    let deleteTarget = null;
    let isLoading = false;
    
    // Kabupaten coordinates for map
    const kabupatenCoords = {
      'Kota Mataram': { x: 90, y: 110 },
      'Kab. Lombok Barat': { x: 70, y: 100 },
      'Kab. Lombok Tengah': { x: 120, y: 130 },
      'Kab. Lombok Timur': { x: 160, y: 115 },
      'Kab. Lombok Utara': { x: 130, y: 85 },
      'Kota Bima': { x: 410, y: 115 },
      'Kab. Bima': { x: 380, y: 100 },
      'Kab. Dompu': { x: 330, y: 110 },
      'Kab. Sumbawa': { x: 280, y: 120 },
      'Kab. Sumbawa Barat': { x: 240, y: 110 }
    };
    
    // Type colors
    const typeColors = {
      'Sekolah': '#06b6d4',
      'Umum': '#10b981',
      'Perguruan Tinggi': '#8b5cf6',
      'Khusus': '#f97316'
    };
    
    // Default config
    const defaultConfig = {
      dashboard_title: 'NTB Lib-Insights',
      subtitle_text: 'Dashboard Statistik & Akreditasi',
      background_color: '#0c4a6e',
      surface_color: '#ffffff',
      text_color: '#1f2937',
      primary_action: '#0891b2',
      secondary_action: '#10b981'
    };
    
    // Login handlers
    function handleLogin() {
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
      
      if (username === 'admin' && password === 'admin123') {
        isAdmin = true;
        showDashboard();
      } else {
        document.getElementById('login-error').classList.remove('hidden');
        setTimeout(() => {
          document.getElementById('login-error').classList.add('hidden');
        }, 3000);
      }
    }
    
    function viewAsGuest() {
      isAdmin = false;
      showDashboard();
    }
    
    function showDashboard() {
      document.getElementById('login-screen').classList.add('hidden');
      document.getElementById('dashboard-screen').classList.remove('hidden');
      
      if (isAdmin) {
        document.getElementById('admin-actions').classList.remove('hidden');
        document.getElementById('action-header').classList.remove('hidden');
        document.getElementById('user-badge').classList.remove('hidden');
      } else {
        document.getElementById('admin-actions').classList.add('hidden');
        document.getElementById('action-header').classList.add('hidden');
        document.getElementById('user-badge').classList.add('hidden');
      }
      
      applyFilters();
    }
    
    function handleLogout() {
      isAdmin = false;
      document.getElementById('dashboard-screen').classList.add('hidden');
      document.getElementById('login-screen').classList.remove('hidden');
      document.getElementById('username').value = '';
      document.getElementById('password').value = '';
    }
    
    // Filter functions
    function applyFilters() {
      const kabupaten = document.getElementById('filter-kabupaten').value;
      const type = document.getElementById('filter-type').value;
      const accred = document.getElementById('filter-accred').value;
      
      filteredLibraries = allLibraries.filter(lib => {
        if (kabupaten && lib.kabupaten !== kabupaten) return false;
        if (type && lib.type !== type) return false;
        if (accred && lib.accreditation !== accred) return false;
        return true;
      });
      
      updateStats();
      updateMap();
      updateTable();
      updateCharts();
    }
    
    // Update functions
    function updateStats() {
      const total = filteredLibraries.length;
      const accredited = filteredLibraries.filter(l => l.accreditation !== 'Belum').length;
      const npp = filteredLibraries.filter(l => l.has_npp).length;
      const nppPercent = total > 0 ? Math.round((npp / total) * 100) : 0;
      
      document.getElementById('stat-total').textContent = total;
      document.getElementById('stat-accredited').textContent = accredited;
      document.getElementById('stat-npp').textContent = npp;
      document.getElementById('stat-npp-percent').textContent = nppPercent + '%';
    }
    
    function updateCharts() {
      const total = filteredLibraries.length || 1;
      const accredA = filteredLibraries.filter(l => l.accreditation === 'A').length;
      const accredB = filteredLibraries.filter(l => l.accreditation === 'B').length;
      const accredC = filteredLibraries.filter(l => l.accreditation === 'C').length;
      const accredNone = filteredLibraries.filter(l => l.accreditation === 'Belum').length;
      const nppHave = filteredLibraries.filter(l => l.has_npp).length;
      const nppNot = filteredLibraries.length - nppHave;
      
      document.getElementById('accred-a-count').textContent = accredA;
      document.getElementById('accred-b-count').textContent = accredB;
      document.getElementById('accred-c-count').textContent = accredC;
      document.getElementById('accred-none-count').textContent = accredNone;
      
      document.getElementById('accred-a-bar').style.width = (accredA / total * 100) + '%';
      document.getElementById('accred-b-bar').style.width = (accredB / total * 100) + '%';
      document.getElementById('accred-c-bar').style.width = (accredC / total * 100) + '%';
      document.getElementById('accred-none-bar').style.width = (accredNone / total * 100) + '%';
      
      document.getElementById('npp-have').textContent = nppHave;
      document.getElementById('npp-not').textContent = nppNot;
      document.getElementById('npp-progress-bar').style.width = (nppHave / total * 100) + '%';
    }
    
    function updateMap() {
      const markersGroup = document.getElementById('map-markers');
      markersGroup.innerHTML = '';
      
      // Group by kabupaten
      const grouped = {};
      filteredLibraries.forEach(lib => {
        if (!grouped[lib.kabupaten]) grouped[lib.kabupaten] = [];
        grouped[lib.kabupaten].push(lib);
      });
      
      Object.entries(grouped).forEach(([kab, libs]) => {
        const coords = kabupatenCoords[kab];
        if (!coords) return;
        
        // Create marker cluster
        const count = libs.length;
        const radius = Math.min(8 + count * 0.5, 20);
        const mainType = libs[0].type;
        const color = typeColors[mainType] || '#06b6d4';
        
        const marker = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        marker.classList.add('marker');
        marker.innerHTML = `
          <circle cx="${coords.x}" cy="${coords.y}" r="${radius}" fill="${color}" opacity="0.8"/>
          <circle cx="${coords.x}" cy="${coords.y}" r="${radius - 3}" fill="white" opacity="0.3"/>
          <text x="${coords.x}" y="${coords.y + 3}" text-anchor="middle" fill="white" font-size="8" font-weight="bold">${count}</text>
        `;
        marker.setAttribute('data-kabupaten', kab);
        marker.onclick = () => {
          document.getElementById('filter-kabupaten').value = kab;
          applyFilters();
        };
        markersGroup.appendChild(marker);
      });
    }
    
    function updateTable() {
      const tbody = document.getElementById('table-body');
      document.getElementById('table-count').textContent = filteredLibraries.length + ' data';
      
      if (filteredLibraries.length === 0) {
        tbody.innerHTML = `
          <tr>
            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
              <div class="flex flex-col items-center">
                <svg class="w-16 h-16 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <p>Tidak ada data ditemukan</p>
                ${isAdmin ? '<p class="text-sm text-gray-400 mt-1">Klik "Tambah Data" untuk menambahkan</p>' : ''}
              </div>
            </td>
          </tr>
        `;
        return;
      }
      
      tbody.innerHTML = filteredLibraries.map(lib => {
        const accredBadge = {
          'A': 'bg-emerald-100 text-emerald-700',
          'B': 'bg-blue-100 text-blue-700',
          'C': 'bg-amber-100 text-amber-700',
          'Belum': 'bg-gray-100 text-gray-600'
        };
        
        return `
          <tr class="table-row" data-id="${lib.__backendId}">
            <td class="px-4 py-3">
              <div class="font-medium text-gray-800">${lib.name}</div>
              ${lib.address ? `<div class="text-xs text-gray-500">${lib.address}</div>` : ''}
            </td>
            <td class="px-4 py-3">
              <span class="inline-flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full" style="background: ${typeColors[lib.type] || '#06b6d4'}"></span>
                ${lib.type}
              </span>
            </td>
            <td class="px-4 py-3 text-gray-600">${lib.kabupaten}</td>
            <td class="px-4 py-3">
              <span class="px-2.5 py-1 rounded-full text-xs font-medium ${accredBadge[lib.accreditation] || accredBadge['Belum']}">
                ${lib.accreditation === 'Belum' ? 'Belum' : 'Akreditasi ' + lib.accreditation}
              </span>
            </td>
            <td class="px-4 py-3">
              ${lib.has_npp 
                ? `<span class="inline-flex items-center gap-1 text-emerald-600"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>${lib.npp_number || 'Ada'}</span>`
                : '<span class="text-gray-400">Belum ada</span>'
              }
            </td>
            <td class="px-4 py-3 ${isAdmin ? '' : 'hidden'}">
              <div class="flex items-center gap-2">
                <button onclick="openEditModal('${lib.__backendId}')" class="p-2 hover:bg-gray-100 rounded-lg text-gray-500 hover:text-cyan-600 transition">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </button>
                <button onclick="openDeleteConfirm('${lib.__backendId}')" class="p-2 hover:bg-gray-100 rounded-lg text-gray-500 hover:text-red-600 transition">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </div>
            </td>
          </tr>
        `;
      }).join('');
    }
    
    // Modal functions
    function openAddModal() {
      document.getElementById('modal-title').textContent = 'Tambah Perpustakaan';
      document.getElementById('edit-id').value = '';
      document.getElementById('library-form').reset();
      document.getElementById('npp-number-field').classList.add('hidden');
      document.getElementById('modal').classList.remove('hidden');
    }
    
    function openEditModal(id) {
      const lib = allLibraries.find(l => l.__backendId === id);
      if (!lib) return;
      
      document.getElementById('modal-title').textContent = 'Edit Perpustakaan';
      document.getElementById('edit-id').value = id;
      document.getElementById('form-name').value = lib.name;
      document.getElementById('form-type').value = lib.type;
      document.getElementById('form-kabupaten').value = lib.kabupaten;
      document.getElementById('form-address').value = lib.address || '';
      document.getElementById('form-accred').value = lib.accreditation;
      document.getElementById('form-npp').value = lib.has_npp ? 'true' : 'false';
      document.getElementById('form-npp-number').value = lib.npp_number || '';
      document.getElementById('npp-number-field').classList.toggle('hidden', !lib.has_npp);
      document.getElementById('modal').classList.remove('hidden');
    }
    
    function closeModal() {
      document.getElementById('modal').classList.add('hidden');
    }
    
    async function handleFormSubmit(e) {
      e.preventDefault();
      if (isLoading) return;
      
      if (allLibraries.length >= 999 && !document.getElementById('edit-id').value) {
        showToast('Batas maksimum 999 data tercapai!', 'error');
        return;
      }
      
      isLoading = true;
      const submitBtn = document.getElementById('form-submit-btn');
      submitBtn.textContent = 'Menyimpan...';
      submitBtn.disabled = true;
      
      const editId = document.getElementById('edit-id').value;
      const hasNpp = document.getElementById('form-npp').value === 'true';
      const kabupaten = document.getElementById('form-kabupaten').value;
      const coords = kabupatenCoords[kabupaten] || { x: 0, y: 0 };
      
      const data = {
        id: editId || 'lib_' + Date.now(),
        name: document.getElementById('form-name').value,
        type: document.getElementById('form-type').value,
        kabupaten: kabupaten,
        address: document.getElementById('form-address').value,
        accreditation: document.getElementById('form-accred').value,
        has_npp: hasNpp,
        npp_number: hasNpp ? document.getElementById('form-npp-number').value : '',
        lat: coords.y,
        lng: coords.x,
        created_at: new Date().toISOString()
      };
      
      let result;
      if (editId) {
        const existing = allLibraries.find(l => l.__backendId === editId);
        if (existing) {
          result = await window.dataSdk.update({ ...existing, ...data });
        }
      } else {
        result = await window.dataSdk.create(data);
      }
      
      isLoading = false;
      submitBtn.textContent = 'Simpan';
      submitBtn.disabled = false;
      
      if (result && result.isOk) {
        closeModal();
        showToast(editId ? 'Data berhasil diperbarui' : 'Data berhasil ditambahkan');
      } else {
        showToast('Gagal menyimpan data', 'error');
      }
    }
    
    // Delete functions
    function openDeleteConfirm(id) {
      deleteTarget = allLibraries.find(l => l.__backendId === id);
      if (!deleteTarget) return;
      
      document.getElementById('delete-name').textContent = `Apakah Anda yakin ingin menghapus "${deleteTarget.name}"?`;
      document.getElementById('delete-confirm').classList.remove('hidden');
    }
    
    function closeDeleteConfirm() {
      document.getElementById('delete-confirm').classList.add('hidden');
      deleteTarget = null;
    }
    
    async function confirmDelete() {
      if (!deleteTarget || isLoading) return;
      
      isLoading = true;
      const deleteBtn = document.getElementById('delete-btn');
      deleteBtn.textContent = 'Menghapus...';
      deleteBtn.disabled = true;
      
      const result = await window.dataSdk.delete(deleteTarget);
      
      isLoading = false;
      deleteBtn.textContent = 'Hapus';
      deleteBtn.disabled = false;
      
      if (result && result.isOk) {
        closeDeleteConfirm();
        showToast('Data berhasil dihapus');
      } else {
        showToast('Gagal menghapus data', 'error');
      }
    }
    
    // Toast notification
    function showToast(message, type = 'success') {
      const toast = document.getElementById('toast');
      const icon = document.getElementById('toast-icon');
      const msg = document.getElementById('toast-message');
      
      icon.textContent = type === 'success' ? '✓' : '✕';
      msg.textContent = message;
      toast.querySelector('div').className = `toast ${type === 'success' ? 'bg-emerald-600' : 'bg-red-500'} text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3`;
      
      toast.classList.remove('hidden');
      setTimeout(() => toast.classList.add('hidden'), 3000);
    }
    
    // Initialize on load
    init();
  </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9cb844e8327b514a',t:'MTc3MDY5MTUxMy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>