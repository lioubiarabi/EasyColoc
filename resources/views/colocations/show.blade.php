<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ColocFi – Ma Colocation</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
<script>tailwind.config={theme:{extend:{fontFamily:{syne:['Syne','sans-serif'],dm:['DM Sans','sans-serif']},colors:{brand:{50:'#f0f0ff',100:'#e2e1ff',300:'#a89dff',500:'#7B68EE',600:'#6451e0',700:'#5040c8'},accent:{400:'#ff8c69',500:'#ff6b45'},surface:'#f7f7fb',card:'#ffffff'}}}}</script>
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
      <div class="w-9 h-9 rounded-xl bg-brand-500 flex items-center justify-center shadow-md">
        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
      </div>
      <div><p class="font-syne font-700 text-gray-900 text-sm leading-none">ColocFi</p><p class="text-xs text-gray-400 mt-0.5">Smart Colocation</p></div>
    </div>
  </div>
  <div class="mx-4 mt-4 p-4 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 text-white">
    <p class="text-xs font-medium opacity-75 uppercase tracking-wider">Solde Total</p>
    <p class="font-syne text-2xl font-700 mt-1">€2 340,00</p>
    <div class="flex items-center gap-1 mt-1"><svg class="w-3 h-3 text-emerald-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.293 7.293A1 1 0 0115 7h-3z" clip-rule="evenodd"/></svg><span class="text-xs text-emerald-300 font-medium">+8.2% ce mois</span></div>
  </div>
  <nav class="flex-1 px-3 mt-5 space-y-0.5 overflow-y-auto">
    <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Principal</p>
    <a href="dashboard.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div><span class="text-sm">Dashboard</span></a>
    <a href="colocation.html" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl"><div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div><span class="text-sm">Ma Colocation</span></a>
    <a href="expenses.blade.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div><span class="text-sm">Dépenses</span></a>
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
  <!-- Header -->
  <div class="flex items-center justify-between mb-8">
    <div>
      <h1 class="font-syne text-2xl font-700 text-gray-900">Ma Colocation</h1>
      <p class="text-sm text-gray-400 mt-0.5">Appartement Les Lilas – Paris 11ème</p>
    </div>
    <div class="flex items-center gap-3">
      <button onclick="document.getElementById('inviteModal').classList.add('open')" class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 text-sm font-600 rounded-xl hover:bg-gray-50 transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
        Inviter un membre
      </button>
      <button class="flex items-center gap-2 px-4 py-2 bg-brand-500 text-white text-sm font-600 rounded-xl hover:bg-brand-600 transition-colors shadow-md shadow-brand-200">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        Gérer
      </button>
    </div>
  </div>

  <div class="grid grid-cols-3 gap-6">
    <!-- Left: Info + Members -->
    <div class="col-span-2 space-y-6">
      <!-- Colocation Info Card -->
      <div class="stat-card p-6">
        <div class="flex items-start gap-4">
          <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center text-white text-2xl font-syne font-800">🏠</div>
          <div class="flex-1">
            <div class="flex items-center gap-3">
              <h2 class="font-syne text-xl font-700 text-gray-900">Appartement Les Lilas</h2>
              <span class="badge bg-emerald-50 text-emerald-600">● Active</span>
            </div>
            <p class="text-gray-500 text-sm mt-1">12 Rue des Lilas, Paris 75011</p>
            <div class="flex items-center gap-6 mt-3">
              <div><p class="text-xs text-gray-400">Créée le</p><p class="text-sm font-600 text-gray-700">15 Jan 2024</p></div>
              <div><p class="text-xs text-gray-400">Membres</p><p class="text-sm font-600 text-gray-700">4 actifs</p></div>
              <div><p class="text-xs text-gray-400">Dépenses totales</p><p class="text-sm font-600 text-gray-700">€8 420</p></div>
              <div><p class="text-xs text-gray-400">Votre rôle</p><p class="text-sm font-600 text-brand-600">Owner 👑</p></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Members -->
      <div class="stat-card p-6">
        <div class="flex items-center justify-between mb-5">
          <h2 class="font-syne text-base font-700 text-gray-900">Membres (4)</h2>
          <span class="badge bg-brand-50 text-brand-600">4 / 8 places</span>
        </div>
        <div class="space-y-3">
          <!-- Member 1 - Alice (Owner) -->
          <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-brand-200 hover:bg-brand-50/30 transition-colors">
            <div class="w-11 h-11 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white font-syne font-700">A</div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-2">
                <p class="font-600 text-gray-800 text-sm">Alice Martin</p>
                <span class="badge bg-yellow-50 text-yellow-600">👑 Owner</span>
              </div>
              <p class="text-xs text-gray-400 mt-0.5">alice@email.com · Membre depuis Jan 2024</p>
            </div>
            <div class="text-right">
              <p class="text-sm font-600 text-emerald-500">+€215</p>
              <p class="text-xs text-gray-400">solde</p>
            </div>
            <div class="flex items-center gap-1">
              <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <span class="text-sm font-600 text-gray-600">4.8</span>
            </div>
          </div>
          <!-- Member 2 -->
          <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-brand-200 hover:bg-brand-50/30 transition-colors">
            <div class="w-11 h-11 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white font-syne font-700">B</div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-2">
                <p class="font-600 text-gray-800 text-sm">Bob Dupont</p>
                <span class="badge bg-brand-50 text-brand-600">Membre</span>
              </div>
              <p class="text-xs text-gray-400 mt-0.5">bob@email.com · Membre depuis Fév 2024</p>
            </div>
            <div class="text-right">
              <p class="text-sm font-600 text-red-500">-€380</p>
              <p class="text-xs text-gray-400">solde</p>
            </div>
            <div class="flex items-center gap-1">
              <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <span class="text-sm font-600 text-gray-600">3.2</span>
            </div>
            <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group" title="Retirer">
              <svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"/></svg>
            </button>
          </div>
          <!-- Member 3 -->
          <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-brand-200 hover:bg-brand-50/30 transition-colors">
            <div class="w-11 h-11 rounded-full bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center text-white font-syne font-700">C</div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-2">
                <p class="font-600 text-gray-800 text-sm">Clara Lebeau</p>
                <span class="badge bg-brand-50 text-brand-600">Membre</span>
              </div>
              <p class="text-xs text-gray-400 mt-0.5">clara@email.com · Membre depuis Mar 2024</p>
            </div>
            <div class="text-right">
              <p class="text-sm font-600 text-gray-500">€0</p>
              <p class="text-xs text-gray-400">solde</p>
            </div>
            <div class="flex items-center gap-1">
              <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <span class="text-sm font-600 text-gray-600">4.5</span>
            </div>
            <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group" title="Retirer">
              <svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"/></svg>
            </button>
          </div>
          <!-- Member 4 -->
          <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-brand-200 hover:bg-brand-50/30 transition-colors">
            <div class="w-11 h-11 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white font-syne font-700">D</div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-2">
                <p class="font-600 text-gray-800 text-sm">David Morel</p>
                <span class="badge bg-brand-50 text-brand-600">Membre</span>
              </div>
              <p class="text-xs text-gray-400 mt-0.5">david@email.com · Membre depuis Avr 2024</p>
            </div>
            <div class="text-right">
              <p class="text-sm font-600 text-emerald-500">+€165</p>
              <p class="text-xs text-gray-400">solde</p>
            </div>
            <div class="flex items-center gap-1">
              <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              <span class="text-sm font-600 text-gray-600">4.1</span>
            </div>
            <button class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group" title="Retirer">
              <svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"/></svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div class="space-y-5">
      <!-- Pending Invitations -->
      <div class="stat-card p-5">
        <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">Invitations en attente</h3>
        <div class="space-y-3">
          <div class="flex items-center gap-3 p-3 bg-yellow-50 rounded-xl border border-yellow-100">
            <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center flex-shrink-0">
              <svg class="w-4 h-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-xs font-600 text-gray-700 truncate">emma@email.com</p>
              <p class="text-xs text-gray-400">Envoyée il y a 2j</p>
            </div>
            <button class="text-xs text-red-400 hover:text-red-600 font-500">Annuler</button>
          </div>
          <div class="flex items-center gap-3 p-3 bg-yellow-50 rounded-xl border border-yellow-100">
            <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center flex-shrink-0">
              <svg class="w-4 h-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-xs font-600 text-gray-700 truncate">marc@email.com</p>
              <p class="text-xs text-gray-400">Envoyée il y a 5j</p>
            </div>
            <button class="text-xs text-red-400 hover:text-red-600 font-500">Annuler</button>
          </div>
        </div>
      </div>

      <!-- Categories -->
      <div class="stat-card p-5">
        <div class="flex items-center justify-between mb-4">
          <h3 class="font-syne text-sm font-700 text-gray-900">Catégories</h3>
          <button class="text-xs text-brand-500 font-600">+ Ajouter</button>
        </div>
        <div class="space-y-2">
          <div class="flex items-center justify-between py-2 border-b border-gray-50">
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-brand-500 flex-shrink-0"></span><span class="text-sm text-gray-700">Loyer</span></div>
            <div class="flex items-center gap-1"><span class="text-xs text-gray-400">€7 200</span><button class="w-6 h-6 flex items-center justify-center hover:bg-red-50 rounded-lg group"><svg class="w-3 h-3 text-gray-300 group-hover:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button></div>
          </div>
          <div class="flex items-center justify-between py-2 border-b border-gray-50">
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-orange-400 flex-shrink-0"></span><span class="text-sm text-gray-700">Courses</span></div>
            <div class="flex items-center gap-1"><span class="text-xs text-gray-400">€480</span><button class="w-6 h-6 flex items-center justify-center hover:bg-red-50 rounded-lg group"><svg class="w-3 h-3 text-gray-300 group-hover:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button></div>
          </div>
          <div class="flex items-center justify-between py-2 border-b border-gray-50">
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-400 flex-shrink-0"></span><span class="text-sm text-gray-700">Électricité</span></div>
            <div class="flex items-center gap-1"><span class="text-xs text-gray-400">€380</span><button class="w-6 h-6 flex items-center justify-center hover:bg-red-50 rounded-lg group"><svg class="w-3 h-3 text-gray-300 group-hover:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button></div>
          </div>
          <div class="flex items-center justify-between py-2 border-b border-gray-50">
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-purple-400 flex-shrink-0"></span><span class="text-sm text-gray-700">Internet</span></div>
            <div class="flex items-center gap-1"><span class="text-xs text-gray-400">€240</span><button class="w-6 h-6 flex items-center justify-center hover:bg-red-50 rounded-lg group"><svg class="w-3 h-3 text-gray-300 group-hover:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button></div>
          </div>
          <div class="flex items-center justify-between py-2">
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-emerald-400 flex-shrink-0"></span><span class="text-sm text-gray-700">Divers</span></div>
            <div class="flex items-center gap-1"><span class="text-xs text-gray-400">€120</span><button class="w-6 h-6 flex items-center justify-center hover:bg-red-50 rounded-lg group"><svg class="w-3 h-3 text-gray-300 group-hover:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button></div>
          </div>
        </div>
      </div>

      <!-- Danger Zone -->
      <div class="stat-card p-5 border border-red-100">
        <h3 class="font-syne text-sm font-700 text-red-600 mb-3">Zone dangereuse</h3>
        <p class="text-xs text-gray-500 mb-3">Annuler la colocation mettra fin à toutes les activités. Cette action est irréversible.</p>
        <button class="w-full py-2 px-4 bg-red-50 hover:bg-red-100 text-red-600 text-sm font-600 rounded-xl transition-colors border border-red-200">
          Annuler la colocation
        </button>
      </div>
    </div>
  </div>
</main>

<!-- Invite Modal -->
<div id="inviteModal" class="modal-backdrop" onclick="if(event.target===this)this.classList.remove('open')">
  <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl mx-4">
    <div class="flex items-center justify-between mb-5">
      <h2 class="font-syne text-lg font-700 text-gray-900">Inviter un membre</h2>
      <button onclick="document.getElementById('inviteModal').classList.remove('open')" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center">
        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-600 text-gray-700 mb-1.5">Email du futur colocataire</label>
        <input type="email" placeholder="exemple@email.com" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300 focus:border-transparent">
      </div>
      <div class="p-3 bg-brand-50 rounded-xl">
        <p class="text-xs text-brand-700 font-500">Un lien d'invitation unique sera envoyé par email. Il expirera après 7 jours.</p>
      </div>
      <div class="flex gap-3">
        <button onclick="document.getElementById('inviteModal').classList.remove('open')" class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-600 text-sm rounded-xl hover:bg-gray-50">Annuler</button>
        <button class="flex-1 py-2.5 bg-brand-500 text-white font-600 text-sm rounded-xl hover:bg-brand-600 transition-colors">Envoyer l'invitation</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
