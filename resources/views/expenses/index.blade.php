<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ColocFi – Dépenses</title>
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
  .cat-dot{width:10px;height:10px;border-radius:99px;flex-shrink:0;}
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
  <nav class="flex-1 px-3 mt-5 space-y-0.5 overflow-y-auto">
    <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Principal</p>
    <a href="dashboard.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div><span class="text-sm">Dashboard</span></a>
    <a href="colocations/show.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div><span class="text-sm">Ma Colocation</span></a>
    <a href="expenses.html" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl"><div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div><span class="text-sm">Dépenses</span></a>
    <a href="balances/index.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div><span class="text-sm">Balances</span></a>
    <a href="reputation.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg></div><span class="text-sm">Réputation</span></a>
    <div class="border-t border-gray-100 my-3"></div>
    <a href="admin/admin.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></div><span class="text-sm">Administration</span></a>
  </nav>
  <div class="px-4 py-4 border-t border-gray-100">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white font-syne font-700 text-sm">A</div>
      <div class="flex-1 min-w-0"><p class="text-sm font-600 text-gray-800 truncate">Alice Martin</p><p class="text-xs text-gray-400">Owner</p></div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<main class="ml-64 flex-1 p-8">
  <div class="flex items-center justify-between mb-8">
    <div>
      <h1 class="font-syne text-2xl font-700 text-gray-900">Dépenses</h1>
      <p class="text-sm text-gray-400 mt-0.5">Suivez et gérez les dépenses communes</p>
    </div>
    <button onclick="document.getElementById('addExpenseModal').classList.add('open')" class="flex items-center gap-2 px-4 py-2 bg-brand-500 text-white text-sm font-600 rounded-xl hover:bg-brand-600 transition-colors shadow-md shadow-brand-200">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
      Nouvelle dépense
    </button>
  </div>

  <!-- Stats -->
  <div class="grid grid-cols-4 gap-4 mb-6">
    <div class="stat-card p-4">
      <p class="text-xs text-gray-400 mb-1">Total ce mois</p>
      <p class="font-syne text-xl font-700 text-gray-900">€1 240</p>
      <p class="text-xs text-emerald-500 mt-0.5 font-500">+12% vs mois dernier</p>
    </div>
    <div class="stat-card p-4">
      <p class="text-xs text-gray-400 mb-1">Dépenses totales</p>
      <p class="font-syne text-xl font-700 text-gray-900">€8 420</p>
      <p class="text-xs text-gray-400 mt-0.5">Depuis Jan 2024</p>
    </div>
    <div class="stat-card p-4">
      <p class="text-xs text-gray-400 mb-1">Moy. par membre</p>
      <p class="font-syne text-xl font-700 text-gray-900">€310</p>
      <p class="text-xs text-gray-400 mt-0.5">Ce mois</p>
    </div>
    <div class="stat-card p-4">
      <p class="text-xs text-gray-400 mb-1">Nb. dépenses</p>
      <p class="font-syne text-xl font-700 text-gray-900">47</p>
      <p class="text-xs text-gray-400 mt-0.5">Ce mois</p>
    </div>
  </div>

  <div class="grid grid-cols-3 gap-6">
    <!-- Expenses List -->
    <div class="col-span-2 stat-card p-6">
      <div class="flex items-center justify-between mb-5">
        <h2 class="font-syne text-base font-700 text-gray-900">Liste des dépenses</h2>
        <div class="flex items-center gap-2">
          <select class="text-sm border border-gray-200 rounded-xl px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-brand-300 text-gray-600">
            <option>Tous les mois</option>
            <option>Juillet 2024</option>
            <option>Juin 2024</option>
            <option>Mai 2024</option>
          </select>
          <select class="text-sm border border-gray-200 rounded-xl px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-brand-300 text-gray-600">
            <option>Toutes catégories</option>
            <option>Loyer</option>
            <option>Courses</option>
            <option>Électricité</option>
          </select>
        </div>
      </div>
      <div class="space-y-2">
        <!-- Expense items -->
        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
          <div class="w-10 h-10 rounded-xl bg-brand-100 flex items-center justify-center flex-shrink-0 text-lg">🏠</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
              <p class="text-sm font-600 text-gray-800">Loyer Juillet</p>
              <span class="badge bg-brand-50 text-brand-600 text-xs">Loyer</span>
            </div>
            <p class="text-xs text-gray-400 mt-0.5">Payé par <span class="font-500 text-gray-600">Alice</span> · 01/07/2024</p>
          </div>
          <div class="text-right">
            <p class="text-sm font-700 text-gray-900">€1 200</p>
            <p class="text-xs text-gray-400">€300 / pers.</p>
          </div>
          <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group flex-shrink-0">
            <svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
          </button>
        </div>
        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
          <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center flex-shrink-0 text-lg">🛒</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
              <p class="text-sm font-600 text-gray-800">Courses Carrefour</p>
              <span class="badge bg-orange-50 text-orange-600 text-xs">Courses</span>
            </div>
            <p class="text-xs text-gray-400 mt-0.5">Payé par <span class="font-500 text-gray-600">Bob</span> · 15/07/2024</p>
          </div>
          <div class="text-right">
            <p class="text-sm font-700 text-gray-900">€87,50</p>
            <p class="text-xs text-gray-400">€21,88 / pers.</p>
          </div>
          <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group flex-shrink-0"><svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
        </div>
        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
          <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0 text-lg">⚡</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
              <p class="text-sm font-600 text-gray-800">Facture EDF Juillet</p>
              <span class="badge bg-blue-50 text-blue-600 text-xs">Électricité</span>
            </div>
            <p class="text-xs text-gray-400 mt-0.5">Payé par <span class="font-500 text-gray-600">Clara</span> · 10/07/2024</p>
          </div>
          <div class="text-right">
            <p class="text-sm font-700 text-gray-900">€95</p>
            <p class="text-xs text-gray-400">€23,75 / pers.</p>
          </div>
          <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group flex-shrink-0"><svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
        </div>
        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
          <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center flex-shrink-0 text-lg">📶</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
              <p class="text-sm font-600 text-gray-800">Abonnement Internet</p>
              <span class="badge bg-purple-50 text-purple-600 text-xs">Internet</span>
            </div>
            <p class="text-xs text-gray-400 mt-0.5">Payé par <span class="font-500 text-gray-600">Alice</span> · 05/07/2024</p>
          </div>
          <div class="text-right">
            <p class="text-sm font-700 text-gray-900">€40</p>
            <p class="text-xs text-gray-400">€10 / pers.</p>
          </div>
          <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group flex-shrink-0"><svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
        </div>
        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
          <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center flex-shrink-0 text-lg">🍕</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
              <p class="text-sm font-600 text-gray-800">Soirée pizza</p>
              <span class="badge bg-emerald-50 text-emerald-600 text-xs">Divers</span>
            </div>
            <p class="text-xs text-gray-400 mt-0.5">Payé par <span class="font-500 text-gray-600">David</span> · 20/07/2024</p>
          </div>
          <div class="text-right">
            <p class="text-sm font-700 text-gray-900">€56</p>
            <p class="text-xs text-gray-400">€14 / pers.</p>
          </div>
          <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group flex-shrink-0"><svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
        </div>
        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
          <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center flex-shrink-0 text-lg">🧹</div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
              <p class="text-sm font-600 text-gray-800">Produits ménagers</p>
              <span class="badge bg-orange-50 text-orange-600 text-xs">Courses</span>
            </div>
            <p class="text-xs text-gray-400 mt-0.5">Payé par <span class="font-500 text-gray-600">Clara</span> · 22/07/2024</p>
          </div>
          <div class="text-right">
            <p class="text-sm font-700 text-gray-900">€34</p>
            <p class="text-xs text-gray-400">€8,50 / pers.</p>
          </div>
          <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group flex-shrink-0"><svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
        </div>
      </div>
    </div>

    <!-- Right: By Category -->
    <div class="space-y-5">
      <div class="stat-card p-5">
        <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">Par catégorie</h3>
        <div class="space-y-3">
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2"><span class="cat-dot bg-brand-500"></span><span class="text-xs font-500 text-gray-600">Loyer</span></div>
              <span class="text-xs font-600 text-gray-700">€1 200 (77%)</span>
            </div>
            <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width:77%"></div></div>
          </div>
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2"><span class="cat-dot bg-orange-400"></span><span class="text-xs font-500 text-gray-600">Courses</span></div>
              <span class="text-xs font-600 text-gray-700">€122 (10%)</span>
            </div>
            <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-orange-400 rounded-full" style="width:10%"></div></div>
          </div>
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2"><span class="cat-dot bg-blue-400"></span><span class="text-xs font-500 text-gray-600">Électricité</span></div>
              <span class="text-xs font-600 text-gray-700">€95 (8%)</span>
            </div>
            <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-blue-400 rounded-full" style="width:8%"></div></div>
          </div>
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2"><span class="cat-dot bg-purple-400"></span><span class="text-xs font-500 text-gray-600">Internet</span></div>
              <span class="text-xs font-600 text-gray-700">€40 (3%)</span>
            </div>
            <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-purple-400 rounded-full" style="width:3%"></div></div>
          </div>
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2"><span class="cat-dot bg-emerald-400"></span><span class="text-xs font-500 text-gray-600">Divers</span></div>
              <span class="text-xs font-600 text-gray-700">€56 (5%)</span>
            </div>
            <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-emerald-400 rounded-full" style="width:5%"></div></div>
          </div>
        </div>
      </div>

      <!-- Who paid most -->
      <div class="stat-card p-5">
        <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">Qui a le plus payé</h3>
        <div class="space-y-3">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white text-xs font-700">A</div>
            <div class="flex-1"><div class="flex justify-between mb-1"><span class="text-xs font-500 text-gray-600">Alice</span><span class="text-xs font-700 text-gray-700">€1 240</span></div><div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-brand-500 rounded-full" style="width:70%"></div></div></div>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white text-xs font-700">B</div>
            <div class="flex-1"><div class="flex justify-between mb-1"><span class="text-xs font-500 text-gray-600">Bob</span><span class="text-xs font-700 text-gray-700">€87,50</span></div><div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-emerald-400 rounded-full" style="width:5%"></div></div></div>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center text-white text-xs font-700">C</div>
            <div class="flex-1"><div class="flex justify-between mb-1"><span class="text-xs font-500 text-gray-600">Clara</span><span class="text-xs font-700 text-gray-700">€129</span></div><div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-orange-400 rounded-full" style="width:7%"></div></div></div>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white text-xs font-700">D</div>
            <div class="flex-1"><div class="flex justify-between mb-1"><span class="text-xs font-500 text-gray-600">David</span><span class="text-xs font-700 text-gray-700">€56</span></div><div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 bg-blue-400 rounded-full" style="width:3%"></div></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Add Expense Modal -->
<div id="addExpenseModal" class="modal-backdrop" onclick="if(event.target===this)this.classList.remove('open')">
  <div class="bg-white rounded-2xl p-6 w-full max-w-lg shadow-2xl mx-4">
    <div class="flex items-center justify-between mb-5">
      <h2 class="font-syne text-lg font-700 text-gray-900">Nouvelle dépense</h2>
      <button onclick="document.getElementById('addExpenseModal').classList.remove('open')" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center"><svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    </div>
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-600 text-gray-700 mb-1.5">Titre</label>
        <input type="text" placeholder="Ex: Loyer Août" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300">
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block text-sm font-600 text-gray-700 mb-1.5">Montant (€)</label>
          <input type="number" placeholder="0.00" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300">
        </div>
        <div>
          <label class="block text-sm font-600 text-gray-700 mb-1.5">Date</label>
          <input type="date" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300">
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block text-sm font-600 text-gray-700 mb-1.5">Catégorie</label>
          <select class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300 text-gray-600">
            <option>Loyer</option>
            <option>Courses</option>
            <option>Électricité</option>
            <option>Internet</option>
            <option>Divers</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-600 text-gray-700 mb-1.5">Payé par</label>
          <select class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300 text-gray-600">
            <option>Alice (moi)</option>
            <option>Bob</option>
            <option>Clara</option>
            <option>David</option>
          </select>
        </div>
      </div>
      <div class="flex gap-3 pt-2">
        <button onclick="document.getElementById('addExpenseModal').classList.remove('open')" class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-600 text-sm rounded-xl hover:bg-gray-50">Annuler</button>
        <button class="flex-1 py-2.5 bg-brand-500 text-white font-600 text-sm rounded-xl hover:bg-brand-600 transition-colors">Ajouter la dépense</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
