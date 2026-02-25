<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ColocFi – Administration</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
<script>tailwind.config={theme:{extend:{fontFamily:{syne:['Syne','sans-serif']},colors:{brand:{50:'#f0f0ff',100:'#e2e1ff',300:'#a89dff',500:'#7B68EE',600:'#6451e0',700:'#5040c8'},accent:{500:'#ff6b45'},surface:'#f7f7fb'}}}}</script>
<style>
  *{font-family:'DM Sans',sans-serif;}
  .font-syne{font-family:'Syne',sans-serif;}
  .sidebar-item{transition:all .2s;}
  .sidebar-item:hover{background:#f0f0ff;color:#6451e0;}
  .sidebar-item.active{background:#e2e1ff;color:#6451e0;font-weight:600;}
  .stat-card{background:white;border-radius:16px;box-shadow:0 1px 3px rgba(0,0,0,.07);}
  .nav-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;}
  .badge{display:inline-flex;align-items:center;padding:2px 10px;border-radius:99px;font-size:12px;font-weight:600;}
  .modal-backdrop{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:50;display:none;align-items:center;justify-content:center;}
  .modal-backdrop.open{display:flex;}
</style>
</head>
<body class="bg-surface min-h-screen flex">

<!-- SIDEBAR -->
<aside class="w-64 bg-white min-h-screen flex flex-col shadow-sm border-r border-gray-100 fixed left-0 top-0 bottom-0 z-20">
  <div class="px-6 py-5 border-b border-gray-100">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-xl bg-brand-500 flex items-center justify-center shadow-md"><svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div>
      <div><p class="font-syne font-700 text-gray-900 text-sm leading-none">ColocFi</p><p class="text-xs text-gray-400 mt-0.5">Smart Colocation</p></div>
    </div>
  </div>
  <div class="mx-4 mt-4 p-4 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 text-white">
    <p class="text-xs font-medium opacity-75 uppercase tracking-wider">Solde Total</p>
    <p class="font-syne text-2xl font-700 mt-1">€2 340,00</p>
  </div>
  <nav class="flex-1 px-3 mt-5 space-y-0.5">
    <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Principal</p>
    <a href="index.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div><span class="text-sm">Dashboard</span></a>
    <a href="colocation.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div><span class="text-sm">Ma Colocation</span></a>
    <a href="expenses.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div><span class="text-sm">Dépenses</span></a>
    <a href="balances.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div><span class="text-sm">Balances</span></a>
    <a href="reputation.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg></div><span class="text-sm">Réputation</span></a>
    <div class="border-t border-gray-100 my-3"></div>
    <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Admin</p>
    <a href="admin.html" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl"><div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></div><span class="text-sm">Administration</span></a>
  </nav>
  <div class="px-4 py-4 border-t border-gray-100">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white font-syne font-700 text-sm">A</div>
      <div class="flex-1 min-w-0"><p class="text-sm font-600 text-gray-800 truncate">Alice Martin</p><p class="text-xs text-red-500 font-500">Global Admin</p></div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<main class="ml-64 flex-1 p-8">
  <div class="mb-8">
    <div class="flex items-center gap-3">
      <h1 class="font-syne text-2xl font-700 text-gray-900">Administration Globale</h1>
      <span class="badge bg-red-50 text-red-600">🛡 Admin</span>
    </div>
    <p class="text-sm text-gray-400 mt-0.5">Statistiques globales et modération de la plateforme</p>
  </div>

  <!-- Global Stats -->
  <div class="grid grid-cols-4 gap-4 mb-6">
    <div class="stat-card p-5">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 rounded-xl bg-brand-100 flex items-center justify-center"><svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
        <span class="badge bg-emerald-50 text-emerald-600">+2</span>
      </div>
      <p class="font-syne text-2xl font-700 text-gray-900">12</p>
      <p class="text-sm text-gray-400">Colocations actives</p>
    </div>
    <div class="stat-card p-5">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center"><svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
        <span class="badge bg-emerald-50 text-emerald-600">+8</span>
      </div>
      <p class="font-syne text-2xl font-700 text-gray-900">47</p>
      <p class="text-sm text-gray-400">Utilisateurs inscrits</p>
    </div>
    <div class="stat-card p-5">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center"><svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
        <span class="badge bg-brand-50 text-brand-600">Ce mois</span>
      </div>
      <p class="font-syne text-2xl font-700 text-gray-900">€142k</p>
      <p class="text-sm text-gray-400">Dépenses totales</p>
    </div>
    <div class="stat-card p-5">
      <div class="flex items-center justify-between mb-3">
        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center"><svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg></div>
        <span class="badge bg-red-50 text-red-500">Actifs</span>
      </div>
      <p class="font-syne text-2xl font-700 text-gray-900">3</p>
      <p class="text-sm text-gray-400">Utilisateurs bannis</p>
    </div>
  </div>

  <div class="grid grid-cols-2 gap-6">
    <!-- Users list -->
    <div class="stat-card p-6">
      <div class="flex items-center justify-between mb-5">
        <h2 class="font-syne text-base font-700 text-gray-900">Tous les utilisateurs</h2>
        <div class="relative">
          <input type="text" placeholder="Rechercher..." class="pl-8 pr-4 py-1.5 text-sm bg-gray-50 border border-gray-200 rounded-xl w-40 focus:outline-none focus:ring-2 focus:ring-brand-300">
          <svg class="w-3.5 h-3.5 text-gray-400 absolute left-2.5 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
      </div>
      <div class="space-y-2">
        <!-- Active user -->
        <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
          <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white text-sm font-700 flex-shrink-0">A</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2"><p class="text-sm font-600 text-gray-800">Alice Martin</p><span class="badge bg-red-50 text-red-500 text-xs">Global Admin</span></div>
            <p class="text-xs text-gray-400">alice@email.com · Inscrit Jan 2024</p>
          </div>
          <span class="badge bg-emerald-50 text-emerald-600">Actif</span>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
          <div class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white text-sm font-700 flex-shrink-0">B</div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">Bob Dupont</p>
            <p class="text-xs text-gray-400">bob@email.com · Inscrit Fév 2024</p>
          </div>
          <div class="flex items-center gap-2">
            <span class="badge bg-emerald-50 text-emerald-600">Actif</span>
            <button onclick="document.getElementById('banModal').classList.add('open')" class="px-2 py-1 text-xs bg-red-50 text-red-500 hover:bg-red-100 rounded-lg font-600 transition-colors">Bannir</button>
          </div>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
          <div class="w-9 h-9 rounded-full bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center text-white text-sm font-700 flex-shrink-0">C</div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">Clara Lebeau</p>
            <p class="text-xs text-gray-400">clara@email.com · Inscrit Mar 2024</p>
          </div>
          <div class="flex items-center gap-2">
            <span class="badge bg-emerald-50 text-emerald-600">Actif</span>
            <button onclick="document.getElementById('banModal').classList.add('open')" class="px-2 py-1 text-xs bg-red-50 text-red-500 hover:bg-red-100 rounded-lg font-600 transition-colors">Bannir</button>
          </div>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
          <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white text-sm font-700 flex-shrink-0">D</div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">David Morel</p>
            <p class="text-xs text-gray-400">david@email.com · Inscrit Avr 2024</p>
          </div>
          <div class="flex items-center gap-2">
            <span class="badge bg-emerald-50 text-emerald-600">Actif</span>
            <button onclick="document.getElementById('banModal').classList.add('open')" class="px-2 py-1 text-xs bg-red-50 text-red-500 hover:bg-red-100 rounded-lg font-600 transition-colors">Bannir</button>
          </div>
        </div>
        <!-- Banned user -->
        <div class="flex items-center gap-3 p-3 rounded-xl border border-red-100 bg-red-50/30">
          <div class="w-9 h-9 rounded-full bg-gray-300 flex items-center justify-center text-white text-sm font-700 flex-shrink-0">E</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2"><p class="text-sm font-600 text-gray-500 line-through">Eve Blanc</p></div>
            <p class="text-xs text-gray-400">eve@email.com · Banni le 20/06/2024</p>
          </div>
          <div class="flex items-center gap-2">
            <span class="badge bg-red-100 text-red-600">Banni</span>
            <button class="px-2 py-1 text-xs bg-emerald-50 text-emerald-600 hover:bg-emerald-100 rounded-lg font-600 transition-colors">Débannir</button>
          </div>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl border border-red-100 bg-red-50/30">
          <div class="w-9 h-9 rounded-full bg-gray-300 flex items-center justify-center text-white text-sm font-700 flex-shrink-0">F</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2"><p class="text-sm font-600 text-gray-500 line-through">Frank Noir</p></div>
            <p class="text-xs text-gray-400">frank@email.com · Banni le 15/05/2024</p>
          </div>
          <div class="flex items-center gap-2">
            <span class="badge bg-red-100 text-red-600">Banni</span>
            <button class="px-2 py-1 text-xs bg-emerald-50 text-emerald-600 hover:bg-emerald-100 rounded-lg font-600 transition-colors">Débannir</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Right: Colocations + Stats -->
    <div class="space-y-5">
      <!-- All colocations -->
      <div class="stat-card p-5">
        <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">Colocations actives</h3>
        <div class="space-y-2">
          <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50">
            <div class="w-9 h-9 rounded-xl bg-brand-50 flex items-center justify-center text-xl flex-shrink-0">🏠</div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-600 text-gray-800">Appartement Les Lilas</p>
              <p class="text-xs text-gray-400">4 membres · Paris 11ème</p>
            </div>
            <span class="badge bg-emerald-50 text-emerald-600">Active</span>
          </div>
          <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50">
            <div class="w-9 h-9 rounded-xl bg-orange-50 flex items-center justify-center text-xl flex-shrink-0">🏡</div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-600 text-gray-800">Villa Montmartre</p>
              <p class="text-xs text-gray-400">3 membres · Paris 18ème</p>
            </div>
            <span class="badge bg-emerald-50 text-emerald-600">Active</span>
          </div>
          <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50">
            <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center text-xl flex-shrink-0">🏢</div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-600 text-gray-800">Studio Bastille</p>
              <p class="text-xs text-gray-400">2 membres · Paris 12ème</p>
            </div>
            <span class="badge bg-emerald-50 text-emerald-600">Active</span>
          </div>
          <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50 opacity-60">
            <div class="w-9 h-9 rounded-xl bg-gray-200 flex items-center justify-center text-xl flex-shrink-0">🏠</div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-600 text-gray-500">Coloc Nation</p>
              <p class="text-xs text-gray-400">Annulée le 10/03/2024</p>
            </div>
            <span class="badge bg-gray-100 text-gray-500">Annulée</span>
          </div>
        </div>
      </div>

      <!-- Platform stats chart placeholder -->
      <div class="stat-card p-5">
        <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">Activité mensuelle</h3>
        <div class="grid grid-cols-6 gap-1 items-end h-24">
          <div class="flex flex-col items-center gap-1"><div class="w-full bg-brand-200 rounded-t-lg" style="height:40%"></div><span class="text-xs text-gray-400">Fév</span></div>
          <div class="flex flex-col items-center gap-1"><div class="w-full bg-brand-300 rounded-t-lg" style="height:55%"></div><span class="text-xs text-gray-400">Mar</span></div>
          <div class="flex flex-col items-center gap-1"><div class="w-full bg-brand-400 rounded-t-lg" style="height:45%"></div><span class="text-xs text-gray-400">Avr</span></div>
          <div class="flex flex-col items-center gap-1"><div class="w-full bg-brand-400 rounded-t-lg" style="height:70%"></div><span class="text-xs text-gray-400">Mai</span></div>
          <div class="flex flex-col items-center gap-1"><div class="w-full bg-brand-500 rounded-t-lg" style="height:85%"></div><span class="text-xs text-gray-400">Jun</span></div>
          <div class="flex flex-col items-center gap-1"><div class="w-full bg-brand-600 rounded-t-lg" style="height:100%"></div><span class="text-xs text-gray-400">Jul</span></div>
        </div>
        <div class="grid grid-cols-3 gap-3 mt-4">
          <div class="text-center p-2 bg-brand-50 rounded-lg">
            <p class="font-syne text-base font-700 text-brand-600">1.2k</p>
            <p class="text-xs text-gray-400">Dépenses</p>
          </div>
          <div class="text-center p-2 bg-emerald-50 rounded-lg">
            <p class="font-syne text-base font-700 text-emerald-600">89%</p>
            <p class="text-xs text-gray-400">Taux remb.</p>
          </div>
          <div class="text-center p-2 bg-orange-50 rounded-lg">
            <p class="font-syne text-base font-700 text-orange-600">4.2</p>
            <p class="text-xs text-gray-400">Score moy.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Ban Modal -->
<div id="banModal" class="modal-backdrop" onclick="if(event.target===this)this.classList.remove('open')">
  <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl mx-4">
    <div class="flex items-center justify-between mb-5">
      <h2 class="font-syne text-lg font-700 text-gray-900">Bannir l'utilisateur</h2>
      <button onclick="document.getElementById('banModal').classList.remove('open')" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center"><svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    </div>
    <div class="p-4 bg-red-50 rounded-xl border border-red-100 mb-4">
      <p class="text-sm text-red-700 font-500">⚠️ Cette action va immédiatement déconnecter l'utilisateur et bloquer son accès à la plateforme.</p>
    </div>
    <div class="mb-4">
      <label class="block text-sm font-600 text-gray-700 mb-1.5">Raison du bannissement</label>
      <textarea class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-red-300 resize-none" rows="3" placeholder="Décrivez la raison..."></textarea>
    </div>
    <div class="flex gap-3">
      <button onclick="document.getElementById('banModal').classList.remove('open')" class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-600 text-sm rounded-xl hover:bg-gray-50">Annuler</button>
      <button onclick="document.getElementById('banModal').classList.remove('open')" class="flex-1 py-2.5 bg-red-500 text-white font-600 text-sm rounded-xl hover:bg-red-600 transition-colors">Confirmer le bannissement</button>
    </div>
  </div>
</div>
</body>
</html>
