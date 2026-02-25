<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ColocFi – Balances & Dettes</title>
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
  .arrow-line{position:relative;height:2px;background:linear-gradient(90deg,#ef4444,#ef4444);border-radius:99px;}
  .arrow-line::after{content:'▶';position:absolute;right:-6px;top:-7px;color:#ef4444;font-size:10px;}
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
    <a href="index.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div><span class="text-sm">Dashboard</span></a>
    <a href="colocation.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div><span class="text-sm">Ma Colocation</span></a>
    <a href="expenses.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div><span class="text-sm">Dépenses</span></a>
    <a href="balances.html" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl"><div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div><span class="text-sm">Balances</span></a>
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
      <h1 class="font-syne text-2xl font-700 text-gray-900">Balances & Dettes</h1>
      <p class="text-sm text-gray-400 mt-0.5">Vue simplifiée des remboursements</p>
    </div>
    <button onclick="document.getElementById('payModal').classList.add('open')" class="flex items-center gap-2 px-4 py-2 bg-emerald-500 text-white text-sm font-600 rounded-xl hover:bg-emerald-600 transition-colors shadow-md shadow-emerald-200">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      Marquer payé
    </button>
  </div>

  <!-- Personal balance -->
  <div class="grid grid-cols-4 gap-4 mb-6">
    <div class="col-span-1 bg-gradient-to-br from-brand-500 to-brand-700 text-white rounded-2xl p-5">
      <p class="text-xs font-medium opacity-75 mb-2">Votre solde</p>
      <p class="font-syne text-3xl font-800">+€215</p>
      <p class="text-xs opacity-75 mt-2">On vous doit de l'argent</p>
    </div>
    <div class="stat-card p-5">
      <p class="text-xs text-gray-400 mb-1">Total payé</p>
      <p class="font-syne text-xl font-700 text-gray-900">€1 240</p>
      <p class="text-xs text-emerald-500 mt-0.5">Ce mois</p>
    </div>
    <div class="stat-card p-5">
      <p class="text-xs text-gray-400 mb-1">Part théorique</p>
      <p class="font-syne text-xl font-700 text-gray-900">€310</p>
      <p class="text-xs text-gray-400 mt-0.5">¼ des dépenses</p>
    </div>
    <div class="stat-card p-5">
      <p class="text-xs text-gray-400 mb-1">Transactions en attente</p>
      <p class="font-syne text-xl font-700 text-gray-900">3</p>
      <p class="text-xs text-red-500 mt-0.5">À régler</p>
    </div>
  </div>

  <div class="grid grid-cols-2 gap-6">
    <!-- All member balances -->
    <div class="stat-card p-6">
      <h2 class="font-syne text-base font-700 text-gray-900 mb-5">Soldes individuels</h2>
      <div class="space-y-4">
        <!-- Alice -->
        <div class="flex items-center gap-4 p-3 bg-emerald-50 rounded-xl border border-emerald-100">
          <div class="w-11 h-11 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white font-syne font-700">A</div>
          <div class="flex-1 min-w-0">
            <p class="font-600 text-gray-800 text-sm">Alice Martin</p>
            <div class="flex items-center gap-3 mt-1">
              <span class="text-xs text-gray-500">Payé: <strong class="text-gray-700">€1 240</strong></span>
              <span class="text-xs text-gray-500">Part: <strong class="text-gray-700">€310</strong></span>
            </div>
          </div>
          <div class="text-right">
            <p class="text-lg font-syne font-700 text-emerald-600">+€215</p>
            <p class="text-xs text-emerald-500">À recevoir</p>
          </div>
        </div>
        <!-- Bob -->
        <div class="flex items-center gap-4 p-3 bg-red-50 rounded-xl border border-red-100">
          <div class="w-11 h-11 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white font-syne font-700">B</div>
          <div class="flex-1 min-w-0">
            <p class="font-600 text-gray-800 text-sm">Bob Dupont</p>
            <div class="flex items-center gap-3 mt-1">
              <span class="text-xs text-gray-500">Payé: <strong class="text-gray-700">€87,50</strong></span>
              <span class="text-xs text-gray-500">Part: <strong class="text-gray-700">€310</strong></span>
            </div>
          </div>
          <div class="text-right">
            <p class="text-lg font-syne font-700 text-red-500">-€222,50</p>
            <p class="text-xs text-red-400">Doit rembourser</p>
          </div>
        </div>
        <!-- Clara -->
        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-xl border border-gray-100">
          <div class="w-11 h-11 rounded-full bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center text-white font-syne font-700">C</div>
          <div class="flex-1 min-w-0">
            <p class="font-600 text-gray-800 text-sm">Clara Lebeau</p>
            <div class="flex items-center gap-3 mt-1">
              <span class="text-xs text-gray-500">Payé: <strong class="text-gray-700">€129</strong></span>
              <span class="text-xs text-gray-500">Part: <strong class="text-gray-700">€310</strong></span>
            </div>
          </div>
          <div class="text-right">
            <p class="text-lg font-syne font-700 text-gray-500">€0</p>
            <p class="text-xs text-gray-400">Équilibré</p>
          </div>
        </div>
        <!-- David -->
        <div class="flex items-center gap-4 p-3 bg-emerald-50 rounded-xl border border-emerald-100">
          <div class="w-11 h-11 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white font-syne font-700">D</div>
          <div class="flex-1 min-w-0">
            <p class="font-600 text-gray-800 text-sm">David Morel</p>
            <div class="flex items-center gap-3 mt-1">
              <span class="text-xs text-gray-500">Payé: <strong class="text-gray-700">€56</strong></span>
              <span class="text-xs text-gray-500">Part: <strong class="text-gray-700">€310</strong></span>
            </div>
          </div>
          <div class="text-right">
            <p class="text-lg font-syne font-700 text-emerald-600">+€165</p>
            <p class="text-xs text-emerald-500">À recevoir</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Settlements: Who owes who -->
    <div class="stat-card p-6">
      <h2 class="font-syne text-base font-700 text-gray-900 mb-5">Qui doit à qui</h2>
      <div class="space-y-3">
        <!-- Settlement 1 -->
        <div class="p-4 rounded-xl border border-gray-100 bg-gradient-to-r from-red-50 to-transparent">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white text-sm font-700">B</div>
            <div class="flex items-center gap-2 flex-1">
              <div>
                <p class="text-xs text-gray-400">Bob doit à</p>
                <p class="text-sm font-700 text-gray-800">Alice</p>
              </div>
              <div class="flex-1 flex items-center justify-center">
                <div class="h-0.5 w-full bg-red-200 relative mx-2">
                  <div class="absolute right-0 top-1/2 -translate-y-1/2 w-0 h-0 border-t-4 border-b-4 border-l-4 border-transparent border-l-red-300"></div>
                </div>
              </div>
              <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white text-sm font-700">A</div>
            </div>
            <p class="text-base font-syne font-700 text-red-500 ml-2">€215</p>
            <button onclick="document.getElementById('payModal').classList.add('open')" class="ml-2 px-3 py-1.5 bg-emerald-500 text-white text-xs font-600 rounded-lg hover:bg-emerald-600 transition-colors whitespace-nowrap">Marquer payé</button>
          </div>
        </div>

        <!-- Settlement 2 -->
        <div class="p-4 rounded-xl border border-gray-100 bg-gradient-to-r from-orange-50 to-transparent">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center text-white text-sm font-700">C</div>
            <div class="flex items-center gap-2 flex-1">
              <div>
                <p class="text-xs text-gray-400">Clara doit à</p>
                <p class="text-sm font-700 text-gray-800">David</p>
              </div>
              <div class="flex-1 flex items-center justify-center">
                <div class="h-0.5 w-full bg-orange-200 relative mx-2">
                  <div class="absolute right-0 top-1/2 -translate-y-1/2 w-0 h-0 border-t-4 border-b-4 border-l-4 border-transparent border-l-orange-300"></div>
                </div>
              </div>
              <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white text-sm font-700">D</div>
            </div>
            <p class="text-base font-syne font-700 text-orange-500 ml-2">€165</p>
            <button onclick="document.getElementById('payModal').classList.add('open')" class="ml-2 px-3 py-1.5 bg-emerald-500 text-white text-xs font-600 rounded-lg hover:bg-emerald-600 transition-colors whitespace-nowrap">Marquer payé</button>
          </div>
        </div>

        <!-- Settlement 3 - Paid -->
        <div class="p-4 rounded-xl border border-gray-100 bg-gray-50 opacity-60">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gray-300 flex items-center justify-center text-white text-sm font-700">B</div>
            <div class="flex items-center gap-2 flex-1">
              <div>
                <p class="text-xs text-gray-400">Bob avait à</p>
                <p class="text-sm font-700 text-gray-600 line-through">Clara</p>
              </div>
              <div class="flex-1"></div>
            </div>
            <p class="text-base font-syne font-700 text-gray-400 ml-2 line-through">€45</p>
            <span class="ml-2 px-3 py-1.5 bg-gray-200 text-gray-500 text-xs font-600 rounded-lg">Payé ✓</span>
          </div>
        </div>

        <!-- Info box -->
        <div class="mt-4 p-3 bg-brand-50 rounded-xl border border-brand-100">
          <p class="text-xs text-brand-700 font-500">💡 Ces remboursements sont calculés automatiquement pour minimiser le nombre de transactions nécessaires.</p>
        </div>
      </div>

      <!-- Payment history -->
      <div class="mt-5 pt-5 border-t border-gray-100">
        <h3 class="font-syne text-sm font-700 text-gray-900 mb-3">Historique des paiements</h3>
        <div class="space-y-2">
          <div class="flex items-center gap-3 py-2">
            <div class="w-7 h-7 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0"><svg class="w-3.5 h-3.5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg></div>
            <div class="flex-1"><p class="text-xs font-600 text-gray-700">Bob → Clara : €45</p><p class="text-xs text-gray-400">Il y a 3 jours</p></div>
            <span class="text-xs text-emerald-500 font-500">Payé</span>
          </div>
          <div class="flex items-center gap-3 py-2">
            <div class="w-7 h-7 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0"><svg class="w-3.5 h-3.5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg></div>
            <div class="flex-1"><p class="text-xs font-600 text-gray-700">David → Alice : €95</p><p class="text-xs text-gray-400">Il y a 7 jours</p></div>
            <span class="text-xs text-emerald-500 font-500">Payé</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Pay Modal -->
<div id="payModal" class="modal-backdrop" onclick="if(event.target===this)this.classList.remove('open')">
  <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl mx-4">
    <div class="flex items-center justify-between mb-5">
      <h2 class="font-syne text-lg font-700 text-gray-900">Confirmer le paiement</h2>
      <button onclick="document.getElementById('payModal').classList.remove('open')" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center"><svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    </div>
    <div class="p-4 bg-emerald-50 rounded-xl mb-4 text-center">
      <p class="text-2xl font-syne font-800 text-emerald-600">€215,00</p>
      <p class="text-sm text-gray-600 mt-1">Bob → Alice</p>
    </div>
    <p class="text-sm text-gray-500 mb-4">En confirmant, vous indiquez que ce remboursement a été effectué. Le solde sera mis à jour automatiquement.</p>
    <div class="flex gap-3">
      <button onclick="document.getElementById('payModal').classList.remove('open')" class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-600 text-sm rounded-xl hover:bg-gray-50">Annuler</button>
      <button onclick="document.getElementById('payModal').classList.remove('open')" class="flex-1 py-2.5 bg-emerald-500 text-white font-600 text-sm rounded-xl hover:bg-emerald-600 transition-colors">Confirmer le paiement ✓</button>
    </div>
  </div>
</div>
</body>
</html>
