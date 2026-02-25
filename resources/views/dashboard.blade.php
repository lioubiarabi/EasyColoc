<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ColocFi – Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: { syne: ['Syne','sans-serif'], dm: ['DM Sans','sans-serif'] },
      colors: {
        brand: { 50:'#f0f0ff', 100:'#e2e1ff', 300:'#a89dff', 500:'#7B68EE', 600:'#6451e0', 700:'#5040c8' },
        accent: { 400:'#ff8c69', 500:'#ff6b45' },
        emerald2: '#10b981',
        surface: '#f7f7fb',
        card: '#ffffff',
      }
    }
  }
}
</script>
<style>
  * { font-family: 'DM Sans', sans-serif; }
  .font-syne { font-family: 'Syne', sans-serif; }
  .sidebar-item { transition: all .2s; }
  .sidebar-item:hover { background: #f0f0ff; color: #6451e0; }
  .sidebar-item.active { background: #e2e1ff; color: #6451e0; font-weight: 600; }
  .stat-card { background: white; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,.07); transition: box-shadow .2s; }
  .stat-card:hover { box-shadow: 0 4px 16px rgba(123,104,238,.13); }
  .gradient-card { background: linear-gradient(135deg, #ff8c69 0%, #ffb347 50%, #ffd700 100%); }
  .progress-bar { height: 6px; border-radius: 99px; background: #e2e1ff; }
  .progress-fill { height: 6px; border-radius: 99px; background: linear-gradient(90deg, #7B68EE, #a89dff); }
  .badge { display:inline-flex; align-items:center; padding:2px 10px; border-radius:99px; font-size:12px; font-weight:600; }
  .scrollbar-hide { scrollbar-width:none; }
  .scrollbar-hide::-webkit-scrollbar { display:none; }
  .nav-icon { width:36px; height:36px; border-radius:10px; display:flex; align-items:center; justify-content:center; }
  .amount-pos { color:#10b981; font-weight:600; }
  .amount-neg { color:#ef4444; font-weight:600; }
</style>
</head>
<body class="bg-surface min-h-screen flex">

<!-- SIDEBAR -->
<aside class="w-64 bg-white min-h-screen flex flex-col shadow-sm border-r border-gray-100 fixed left-0 top-0 bottom-0 z-20">
  <!-- Logo -->
  <div class="px-6 py-5 border-b border-gray-100">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-xl bg-brand-500 flex items-center justify-center shadow-md">
        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
      </div>
      <div>
        <p class="font-syne font-700 text-gray-900 text-sm leading-none">ColocFi</p>
        <p class="text-xs text-gray-400 mt-0.5">Smart Colocation</p>
      </div>
    </div>
  </div>

  <!-- Balance -->
  <div class="mx-4 mt-4 p-4 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 text-white">
    <p class="text-xs font-medium opacity-75 uppercase tracking-wider">Solde Total</p>
    <p class="font-syne text-2xl font-700 mt-1">€2 340,00</p>
    <div class="flex items-center gap-1 mt-1">
      <svg class="w-3 h-3 text-emerald-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.293 7.293A1 1 0 0115 7h-3z" clip-rule="evenodd"/></svg>
      <span class="text-xs text-emerald-300 font-medium">+8.2% ce mois</span>
    </div>
  </div>

  <!-- Nav -->
  <nav class="flex-1 px-3 mt-5 space-y-0.5 overflow-y-auto scrollbar-hide">
    <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Principal</p>

    <a href="index.html" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl">
      <div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div>
      <span class="text-sm">Dashboard</span>
    </a>

    <a href="colocation.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600">
      <div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
      <span class="text-sm">Ma Colocation</span>
    </a>

    <a href="expenses.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600">
      <div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div>
      <span class="text-sm">Dépenses</span>
    </a>

    <a href="balances/index.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600">
      <div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div>
      <span class="text-sm">Balances</span>
    </a>

    <a href="reputation.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600">
      <div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg></div>
      <span class="text-sm">Réputation</span>
    </a>

    <div class="border-t border-gray-100 my-3"></div>
    <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Admin</p>

    <a href="admin/admin.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600">
      <div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></div>
      <span class="text-sm">Administration</span>
    </a>
  </nav>

  <!-- User -->
  <div class="px-4 py-4 border-t border-gray-100">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white font-syne font-700 text-sm">A</div>
      <div class="flex-1 min-w-0">
        <p class="text-sm font-600 text-gray-800 truncate">Alice Martin</p>
        <p class="text-xs text-gray-400">Premium Member</p>
      </div>
      <button class="w-7 h-7 rounded-lg hover:bg-gray-100 flex items-center justify-center">
        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
      </button>
    </div>
  </div>
</aside>

<!-- MAIN -->
<main class="ml-64 flex-1 flex flex-col min-h-screen">
  <!-- Header -->
  <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
    <div>
      <h1 class="font-syne text-xl font-700 text-gray-900">Dashboard</h1>
      <p class="text-sm text-gray-400">Bienvenue, Alice! 👋</p>
    </div>
    <div class="flex items-center gap-3">
      <div class="relative">
        <input type="text" placeholder="Rechercher..." class="pl-9 pr-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl w-52 focus:outline-none focus:ring-2 focus:ring-brand-300 focus:border-transparent">
        <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
      </div>
      <button class="w-9 h-9 rounded-xl bg-gray-50 border border-gray-200 flex items-center justify-center hover:bg-gray-100 relative">
        <svg class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
      </button>
      <a href="expenses.blade.php" class="flex items-center gap-2 px-4 py-2 bg-brand-500 text-white text-sm font-600 rounded-xl hover:bg-brand-600 transition-colors shadow-md shadow-brand-200">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Ajouter Dépense
      </a>
    </div>
  </header>

  <!-- Content -->
  <div class="flex flex-1">
    <!-- Center -->
    <div class="flex-1 p-8 space-y-6">
      <!-- Stats Row -->
      <div class="grid grid-cols-3 gap-4">
        <div class="stat-card p-5">
          <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 rounded-xl bg-brand-100 flex items-center justify-center">
              <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <span class="badge bg-emerald-50 text-emerald-600">+12%</span>
          </div>
          <p class="text-2xl font-syne font-700 text-gray-900">€1 240</p>
          <p class="text-sm text-gray-400 mt-0.5">Total dépensé ce mois</p>
        </div>
        <div class="stat-card p-5">
          <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center">
              <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <span class="badge bg-red-50 text-red-500">Dû</span>
          </div>
          <p class="text-2xl font-syne font-700 text-gray-900">€380</p>
          <p class="text-sm text-gray-400 mt-0.5">Vous devez rembourser</p>
        </div>
        <div class="stat-card p-5">
          <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
              <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <span class="badge bg-emerald-50 text-emerald-600">À recevoir</span>
          </div>
          <p class="text-2xl font-syne font-700 text-gray-900">€215</p>
          <p class="text-sm text-gray-400 mt-0.5">On vous doit</p>
        </div>
      </div>

      <!-- Savings Goals -->
      <div class="stat-card p-6">
        <div class="flex items-center justify-between mb-5">
          <h2 class="font-syne text-base font-700 text-gray-900">Objectifs d'épargne</h2>
          <a href="expenses.blade.php" class="text-sm text-brand-500 font-600 hover:text-brand-700">Voir tout</a>
        </div>
        <div class="space-y-4">
          <div>
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-brand-100 flex items-center justify-center">
                  <svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <span class="text-sm font-500 text-gray-700">Loyer Juillet</span>
              </div>
              <span class="text-sm font-600 text-gray-600">€700 / €1 200</span>
            </div>
            <div class="progress-bar"><div class="progress-fill" style="width:58%"></div></div>
          </div>
          <div>
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-orange-100 flex items-center justify-center">
                  <svg class="w-4 h-4 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <span class="text-sm font-500 text-gray-700">Électricité</span>
              </div>
              <span class="text-sm font-600 text-gray-600">€85 / €120</span>
            </div>
            <div class="progress-bar"><div class="progress-fill" style="width:71%; background: linear-gradient(90deg, #ff8c69, #ffb347)"></div></div>
          </div>
          <div>
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-emerald-50 flex items-center justify-center">
                  <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <span class="text-sm font-500 text-gray-700">Courses communes</span>
              </div>
              <span class="text-sm font-600 text-gray-600">€230 / €300</span>
            </div>
            <div class="progress-bar"><div class="progress-fill" style="width:77%; background: linear-gradient(90deg, #10b981, #34d399)"></div></div>
          </div>
        </div>
      </div>

      <!-- Stat Chart -->
      <div class="gradient-card rounded-2xl p-6 text-white">
        <p class="text-sm font-medium opacity-80">Statistique mensuelle</p>
        <p class="font-syne text-3xl font-800 mt-1">€3 201,00</p>
        <div class="mt-4 h-24 relative">
          <svg viewBox="0 0 400 80" class="w-full h-full" preserveAspectRatio="none">
            <path d="M0,70 C20,65 40,55 60,50 C80,45 100,60 120,55 C140,50 160,35 180,30 C200,25 220,40 240,35 C260,30 280,20 300,15 C320,10 340,20 360,15 C380,10 400,5 400,5" fill="none" stroke="rgba(255,255,255,0.8)" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M0,70 C20,65 40,55 60,50 C80,45 100,60 120,55 C140,50 160,35 180,30 C200,25 220,40 240,35 C260,30 280,20 300,15 C320,10 340,20 360,15 C380,10 400,5 400,5 L400,80 L0,80 Z" fill="rgba(255,255,255,0.15)"/>
          </svg>
        </div>
      </div>
    </div>

    <!-- Right Panel: Transactions -->
    <div class="w-80 bg-white border-l border-gray-100 p-6">
      <div class="flex items-center justify-between mb-5">
        <h2 class="font-syne text-base font-700 text-gray-900">Transactions récentes</h2>
        <a href="expenses.blade.php" class="text-sm text-brand-500 font-600 hover:text-brand-700">Voir tout</a>
      </div>
      <div class="space-y-3">
        <!-- Transaction items -->
        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors">
          <div class="w-10 h-10 rounded-xl bg-brand-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">Loyer</p>
            <p class="text-xs text-gray-400">Aujourd'hui, 14h30</p>
          </div>
          <span class="amount-neg text-sm">-€600</span>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors">
          <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">Courses Carrefour</p>
            <p class="text-xs text-gray-400">Hier</p>
          </div>
          <span class="amount-neg text-sm">-€87,50</span>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors">
          <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">Remboursement Bob</p>
            <p class="text-xs text-gray-400">Il y a 2 jours</p>
          </div>
          <span class="amount-pos text-sm">+€120</span>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors">
          <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">Électricité</p>
            <p class="text-xs text-gray-400">Il y a 3 jours</p>
          </div>
          <span class="amount-neg text-sm">-€95</span>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors">
          <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.14 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">Internet</p>
            <p class="text-xs text-gray-400">Il y a 5 jours</p>
          </div>
          <span class="amount-neg text-sm">-€40</span>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors">
          <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-sm font-600 text-gray-800">Remboursement Clara</p>
            <p class="text-xs text-gray-400">Il y a 7 jours</p>
          </div>
          <span class="amount-pos text-sm">+€95</span>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="mt-6 pt-5 border-t border-gray-100">
        <p class="text-xs font-600 text-gray-400 uppercase tracking-wider mb-3">Actions rapides</p>
        <div class="grid grid-cols-2 gap-2">
          <a href="expenses.blade.php" class="flex flex-col items-center gap-1 p-3 rounded-xl bg-brand-50 hover:bg-brand-100 transition-colors cursor-pointer">
            <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span class="text-xs font-600 text-brand-600">Dépense</span>
          </a>
          <a href="balances/index.blade.php" class="flex flex-col items-center gap-1 p-3 rounded-xl bg-orange-50 hover:bg-orange-100 transition-colors cursor-pointer">
            <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            <span class="text-xs font-600 text-orange-500">Payer</span>
          </a>
          <a href="colocation.blade.php" class="flex flex-col items-center gap-1 p-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 transition-colors cursor-pointer">
            <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            <span class="text-xs font-600 text-emerald-500">Inviter</span>
          </a>
          <a href="balances/index.blade.php" class="flex flex-col items-center gap-1 p-3 rounded-xl bg-purple-50 hover:bg-purple-100 transition-colors cursor-pointer">
            <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            <span class="text-xs font-600 text-purple-500">Balances</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>
