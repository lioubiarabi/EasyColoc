<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc – Administration</title>
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
        .scrollbar-hide { scrollbar-width:none; }
        .scrollbar-hide::-webkit-scrollbar { display:none; }
    </style>
</head>
<body class="bg-surface min-h-screen flex">

<aside class="w-64 bg-white min-h-screen flex flex-col shadow-sm border-r border-gray-100 fixed left-0 top-0 bottom-0 z-20">
    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-brand-500 flex items-center justify-center shadow-md">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            <div><p class="font-syne font-700 text-gray-900 text-sm leading-none">EasyColoc</p><p class="text-xs text-gray-400 mt-0.5">Smart Colocation</p></div>
        </div>
    </div>

    <div class="mx-4 mt-4 p-4 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 text-white shadow-lg shadow-brand-500/30">
        <p class="text-xs font-medium opacity-80 uppercase tracking-wider mb-1">Reputation Score</p>
        <div class="flex items-center gap-1.5">
            <p class="font-syne text-3xl font-800">{{ Auth::user()->reputation ?? 0 }}</p>
            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
        </div>
    </div>

    <nav class="flex-1 px-3 mt-5 space-y-0.5 overflow-y-auto scrollbar-hide">
        <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Main</p>
        <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div><span class="text-sm">Dashboard</span></a>
        <a href="{{ route('colocations.show') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div><span class="text-sm">My Colocation</span></a>
        <a href="{{ route('expenses.index') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div><span class="text-sm">Expenses</span></a>
        <a href="{{ route('balances.index') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div><span class="text-sm">Balances</span></a>
        <div class="border-t border-gray-100 my-3"></div>
        <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Admin</p>
        <a href="{{ route('admin.index') }}" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl"><div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></div><span class="text-sm">Administration</span></a>
    </nav>

    <div class="px-4 py-4 border-t border-gray-100">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white font-syne font-700 text-sm">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-600 text-gray-800 truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-red-500 font-500">Global Admin</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-7 h-7 rounded-lg hover:bg-gray-100 flex items-center justify-center" title="Log Out">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<main class="ml-64 flex-1 p-8">

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center gap-3 text-emerald-700 shadow-sm">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-sm font-600">{{ session('success') }}</span>
        </div>
    @endif
    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 flex items-center gap-3 text-red-700 shadow-sm">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-sm font-600">{{ $errors->first() }}</span>
        </div>
    @endif

    <div class="mb-8">
        <div class="flex items-center gap-3">
            <h1 class="font-syne text-2xl font-700 text-gray-900">Global Administration</h1>
            <span class="badge bg-red-50 text-red-600">🛡 Admin</span>
        </div>
        <p class="text-sm text-gray-400 mt-0.5">Platform statistics and user moderation</p>
    </div>

    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="stat-card p-5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-brand-100 flex items-center justify-center"><svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                <span class="badge bg-emerald-50 text-emerald-600">Live</span>
            </div>
            <p class="font-syne text-2xl font-700 text-gray-900">{{ $activeColocsCount }}</p>
            <p class="text-sm text-gray-400">Active Colocations</p>
        </div>
        <div class="stat-card p-5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center"><svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
                <span class="badge bg-emerald-50 text-emerald-600">Total</span>
            </div>
            <p class="font-syne text-2xl font-700 text-gray-900">{{ $usersCount }}</p>
            <p class="text-sm text-gray-400">Registered Users</p>
        </div>
        <div class="stat-card p-5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center"><svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                <span class="badge bg-brand-50 text-brand-600">All Time</span>
            </div>
            <p class="font-syne text-2xl font-700 text-gray-900">€{{ number_format($totalExpenses, 0) }}</p>
            <p class="text-sm text-gray-400">Total Expenses Tracked</p>
        </div>
        <div class="stat-card p-5">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center"><svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg></div>
                <span class="badge bg-red-50 text-red-500">Restricted</span>
            </div>
            <p class="font-syne text-2xl font-700 text-gray-900">{{ $bannedUsersCount }}</p>
            <p class="text-sm text-gray-400">Banned Users</p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6">
        <div class="stat-card p-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="font-syne text-base font-700 text-gray-900">All Users</h2>
            </div>
            <div class="space-y-2 overflow-y-auto max-h-[500px] scrollbar-hide pr-2">
                @foreach($users as $u)
                    @if($u->is_active)
                        <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white text-sm font-700 flex-shrink-0">
                                {{ strtoupper(substr($u->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-600 text-gray-800">{{ $u->name }}</p>
                                    @if($u->is_global_admin)
                                        <span class="badge bg-red-50 text-red-500 text-[10px]">Global Admin</span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-400 truncate">{{ $u->email }} · Joined {{ $u->created_at->format('M Y') }}</p>
                            </div>

                            @if(!$u->is_global_admin)
                                <div class="flex items-center gap-2">
                                    <span class="badge bg-emerald-50 text-emerald-600">Active</span>
                                    <button onclick="openBanModal({{ $u->id }}, '{{ addslashes($u->name) }}')" class="px-2 py-1 text-xs bg-red-50 text-red-500 hover:bg-red-100 rounded-lg font-600 transition-colors">Ban</button>
                                </div>
                            @else
                                <span class="badge bg-emerald-50 text-emerald-600">Active</span>
                            @endif
                        </div>
                    @else
                        <div class="flex items-center gap-3 p-3 rounded-xl border border-red-100 bg-red-50/30">
                            <div class="w-9 h-9 rounded-full bg-gray-300 flex items-center justify-center text-white text-sm font-700 flex-shrink-0">
                                {{ strtoupper(substr($u->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2"><p class="text-sm font-600 text-gray-500 line-through">{{ $u->name }}</p></div>
                                <p class="text-xs text-gray-400">{{ $u->email }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="badge bg-red-100 text-red-600">Banned</span>
                                <form action="{{ route('admin.users.unban', $u->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-2 py-1 text-xs bg-emerald-50 text-emerald-600 hover:bg-emerald-100 rounded-lg font-600 transition-colors">Unban</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="space-y-5">
            <div class="stat-card p-5">
                <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">Latest Colocations</h3>
                <div class="space-y-2">
                    @foreach($colocations as $coloc)
                        @if($coloc->status === 'active')
                            <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50">
                                <div class="w-9 h-9 rounded-xl bg-brand-50 flex items-center justify-center text-xl flex-shrink-0">🏠</div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-600 text-gray-800">{{ $coloc->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $coloc->users_count }} members · Created {{ $coloc->created_at->format('M d, Y') }}</p>
                                </div>
                                <span class="badge bg-emerald-50 text-emerald-600">Active</span>
                            </div>
                        @else
                            <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50 opacity-60">
                                <div class="w-9 h-9 rounded-xl bg-gray-200 flex items-center justify-center text-xl flex-shrink-0">🏠</div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-600 text-gray-500">{{ $coloc->name }}</p>
                                    <p class="text-xs text-gray-400">Canceled</p>
                                </div>
                                <span class="badge bg-gray-100 text-gray-500">Canceled</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>

<div id="banModal" class="modal-backdrop" onclick="if(event.target===this)this.classList.remove('open')">
    <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl mx-4">
        <div class="flex items-center justify-between mb-5">
            <h2 class="font-syne text-lg font-700 text-gray-900">Ban User</h2>
            <button onclick="document.getElementById('banModal').classList.remove('open')" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center"><svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>

        <div class="p-4 bg-red-50 rounded-xl border border-red-100 mb-4">
            <p class="text-sm text-red-700 font-500">⚠️ This action will immediately block <strong id="modalUserName">the user</strong> from accessing the platform.</p>
        </div>

        <form id="banForm" method="POST" action="">
            @csrf
            <div class="flex gap-3 mt-6">
                <button type="button" onclick="document.getElementById('banModal').classList.remove('open')" class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-600 text-sm rounded-xl hover:bg-gray-50">Cancel</button>
                <button type="submit" class="flex-1 py-2.5 bg-red-500 text-white font-600 text-sm rounded-xl hover:bg-red-600 transition-colors">Confirm Ban</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openBanModal(userId, userName) {
        document.getElementById('modalUserName').innerText = userName;
        // Dynamically set the form action based on the user ID
        document.getElementById('banForm').action = `/admin/users/${userId}/ban`;
        document.getElementById('banModal').classList.add('open');
    }
</script>
</body>
</html>
