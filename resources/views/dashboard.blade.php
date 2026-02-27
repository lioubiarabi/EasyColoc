<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc – Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {syne: ['Syne', 'sans-serif'], dm: ['DM Sans', 'sans-serif']},
                    colors: {
                        brand: {50: '#f0f0ff', 100: '#e2e1ff', 300: '#a89dff', 500: '#7B68EE', 600: '#6451e0', 700: '#5040c8'},
                        accent: {400: '#ff8c69', 500: '#ff6b45'},
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
        .stat-card { background: white; border-radius: 16px; box-shadow: 0 1px 3px rgba(0, 0, 0, .07); transition: box-shadow .2s; }
        .stat-card:hover { box-shadow: 0 4px 16px rgba(123, 104, 238, .13); }
        .gradient-card { background: linear-gradient(135deg, #ff8c69 0%, #ffb347 50%, #ffd700 100%); }
        .progress-bar { height: 6px; border-radius: 99px; background: #e2e1ff; }
        .progress-fill { height: 6px; border-radius: 99px; background: linear-gradient(90deg, #7B68EE, #a89dff); }
        .badge { display: inline-flex; align-items: center; padding: 2px 10px; border-radius: 99px; font-size: 12px; font-weight: 600; }
        .scrollbar-hide { scrollbar-width: none; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .nav-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
        .amount-pos { color: #10b981; font-weight: 600; }
        .amount-neg { color: #ef4444; font-weight: 600; }
        .modal-backdrop { position: fixed; inset: 0; background: rgba(0,0,0,.5); z-index: 50; display: none; align-items: center; justify-content: center; }
        .modal-backdrop.open { display: flex; }
    </style>
</head>
<body class="bg-surface min-h-screen flex">

<aside class="w-64 bg-white min-h-screen flex flex-col shadow-sm border-r border-gray-100 fixed left-0 top-0 bottom-0 z-20">
    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-brand-500 flex items-center justify-center shadow-md">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            <div>
                <p class="font-syne font-700 text-gray-900 text-sm leading-none">EasyColoc</p>
                <p class="text-xs text-gray-400 mt-0.5">Smart Colocation</p>
            </div>
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
        <a href="{{ route('dashboard') }}" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl"><div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div><span class="text-sm">Dashboard</span></a>

        @if($colocation)
            <a href="{{ route('colocations.show') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div><span class="text-sm">My Colocation</span></a>
            <a href="{{ route('expenses.index') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div><span class="text-sm">Expenses</span></a>
            <a href="{{ route('balances.index') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div><span class="text-sm">Balances</span></a>
        @endif

        @if(Auth::user()->is_global_admin)
            <div class="border-t border-gray-100 my-3"></div>
            <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Admin</p>
            <a href="{{ route('admin.index') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></div><span class="text-sm">Administration</span></a>
        @endif
    </nav>

    <div class="px-4 py-4 border-t border-gray-100">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white font-syne font-700 text-sm">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-600 text-gray-800 truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-400">{{ Auth::user()->is_global_admin ? 'Global Admin' : 'Member' }}</p>
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

<main class="ml-64 flex-1 flex flex-col min-h-screen">

    @if($errors->any())
        <div class="mx-8 mt-6 p-4 rounded-xl bg-red-50 border border-red-100 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3 text-red-700">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span class="text-sm font-600">{{ $errors->first() }}</span>
            </div>
            <button onclick="this.parentElement.style.display='none'" class="text-red-400 hover:text-red-600"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
    @endif
    @if(session('success'))
        <div class="mx-8 mt-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3 text-emerald-700">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span class="text-sm font-600">{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.style.display='none'" class="text-emerald-400 hover:text-emerald-600"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>
    @endif

    <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
        <div>
            <h1 class="font-syne text-xl font-700 text-gray-900">Dashboard</h1>
            <p class="text-sm text-gray-400">Welcome, {{ explode(' ', Auth::user()->name)[0] }}! 👋</p>
        </div>
        <div class="flex items-center gap-3">
            @if($colocation)
                <a href="{{ route('expenses.index') }}" class="flex items-center gap-2 px-4 py-2 bg-brand-500 text-white text-sm font-600 rounded-xl hover:bg-brand-600 transition-colors shadow-md shadow-brand-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add Expense
                </a>
            @endif
        </div>
    </header>

    <div class="flex flex-1">
        <div class="flex-1 p-8 space-y-6">

            @if(!$colocation)
                <div class="bg-indigo-50 border border-indigo-100 p-6 rounded-2xl flex items-center justify-between">
                    <div>
                        <h3 class="font-syne text-lg font-700 text-indigo-900">You are not in a colocation yet!</h3>
                        <p class="text-sm text-indigo-700 mt-1">Create a new colocation to start tracking your shared expenses.</p>
                    </div>
                    <button onclick="document.getElementById('createColocModal').classList.add('open')" class="px-5 py-2.5 bg-indigo-600 text-white text-sm font-600 rounded-xl hover:bg-indigo-700 transition-colors">
                        Create My Colocation
                    </button>
                </div>
            @else
                <div class="grid grid-cols-3 gap-4">
                    <div class="stat-card p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="badge bg-emerald-50 text-emerald-600">This Month</span>
                        </div>
                        <p class="text-2xl font-syne font-700 text-gray-900">€{{ number_format($totalSpentThisMonth ?? 0, 2) }}</p>
                        <p class="text-sm text-gray-400 mt-0.5">Total spent by colocation</p>
                    </div>
                    <div class="stat-card p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            </div>
                            <span class="badge bg-red-50 text-red-500">Owed</span>
                        </div>
                        <p class="text-2xl font-syne font-700 text-gray-900">€{{ number_format($owedAmount ?? 0, 2) }}</p>
                        <p class="text-sm text-gray-400 mt-0.5">You need to reimburse</p>
                    </div>
                    <div class="stat-card p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="badge bg-emerald-50 text-emerald-600">To receive</span>
                        </div>
                        <p class="text-2xl font-syne font-700 text-gray-900">€{{ number_format($toReceiveAmount ?? 0, 2) }}</p>
                        <p class="text-sm text-gray-400 mt-0.5">You are owed</p>
                    </div>
                </div>

                @if(isset($categorySpending) && $categorySpending->count() > 0)
                    <div class="stat-card p-6">
                        <div class="flex items-center justify-between mb-5">
                            <h2 class="font-syne text-base font-700 text-gray-900">Top Category Spending</h2>
                            <a href="{{ route('expenses.index') }}" class="text-sm text-brand-500 font-600 hover:text-brand-700">See all</a>
                        </div>
                        <div class="space-y-4">
                            @foreach($categorySpending as $catName => $amount)
                                @php
                                    $percent = $totalSpentThisMonth > 0 ? ($amount / $totalSpentThisMonth) * 100 : 0;
                                    $colors = ['from-brand-500 to-brand-300', 'from-orange-500 to-orange-300', 'from-emerald-500 to-emerald-300'];
                                    $gradient = $colors[$loop->index % 3];
                                @endphp
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <span class="text-sm font-500 text-gray-700">{{ $catName }}</span>
                                        </div>
                                        <span class="text-sm font-600 text-gray-600">€{{ number_format($amount, 0) }} ({{ round($percent) }}%)</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill bg-gradient-to-r {{ $gradient }}" style="width:{{ $percent }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="gradient-card rounded-2xl p-6 text-white">
                    <p class="text-sm font-medium opacity-80">Total Tracked Expenses (All Time)</p>
                    @php $allTimeSpent = \App\Models\Expense::where('colocation_id', $colocation?->id)->sum('amount'); @endphp
                    <p class="font-syne text-3xl font-800 mt-1">€{{ number_format($allTimeSpent, 2) }}</p>
                    <div class="mt-4 h-24 relative">
                        <svg viewBox="0 0 400 80" class="w-full h-full" preserveAspectRatio="none">
                            <path d="M0,70 C20,65 40,55 60,50 C80,45 100,60 120,55 C140,50 160,35 180,30 C200,25 220,40 240,35 C260,30 280,20 300,15 C320,10 340,20 360,15 C380,10 400,5 400,5" fill="none" stroke="rgba(255,255,255,0.8)" stroke-width="2.5" stroke-linecap="round"/>
                            <path d="M0,70 C20,65 40,55 60,50 C80,45 100,60 120,55 C140,50 160,35 180,30 C200,25 220,40 240,35 C260,30 280,20 300,15 C320,10 340,20 360,15 C380,10 400,5 400,5 L400,80 L0,80 Z" fill="rgba(255,255,255,0.15)"/>
                        </svg>
                    </div>
                </div>
            @endif
        </div>

        @if($colocation)
            <div class="w-80 bg-white border-l border-gray-100 p-6 flex flex-col">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="font-syne text-base font-700 text-gray-900">Recent Activity</h2>
                    <a href="{{ route('expenses.index') }}" class="text-sm text-brand-500 font-600 hover:text-brand-700">See all</a>
                </div>

                <div class="space-y-3 flex-1 overflow-y-auto scrollbar-hide">
                    @forelse($recentTransactions ?? [] as $transaction)
                        @php
                            $isMe = $transaction->user_id === Auth::id();
                            $isReimbursement = $transaction->title === 'Reimbursement';
                            $iconClass = $isMe ? 'bg-emerald-50 text-emerald-500' : 'bg-brand-50 text-brand-600';
                            $amountClass = $isMe ? 'amount-pos' : 'amount-neg';
                            $sign = $isMe ? '+' : '-';
                        @endphp
                        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors border border-transparent hover:border-gray-100">
                            <div class="w-10 h-10 rounded-xl {{ $iconClass }} flex items-center justify-center flex-shrink-0">
                                @if($isReimbursement)
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-600 text-gray-800 truncate">{{ $transaction->title }}</p>
                                <p class="text-[10px] text-gray-400">Paid by {{ $isMe ? 'You' : explode(' ', $transaction->user->name)[0] }}</p>
                            </div>
                            <span class="{{ $amountClass }} text-sm">{{ $sign }}€{{ number_format($transaction->amount, 0) }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 text-center py-4">No recent activity.</p>
                    @endforelse
                </div>

                <div class="mt-6 pt-5 border-t border-gray-100">
                    <p class="text-xs font-600 text-gray-400 uppercase tracking-wider mb-3">Quick Actions</p>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('expenses.index') }}" class="flex flex-col items-center gap-1 p-3 rounded-xl bg-brand-50 hover:bg-brand-100 transition-colors cursor-pointer">
                            <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            <span class="text-xs font-600 text-brand-600">Expense</span>
                        </a>
                        <a href="{{ route('balances.index') }}" class="flex flex-col items-center gap-1 p-3 rounded-xl bg-orange-50 hover:bg-orange-100 transition-colors cursor-pointer">
                            <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            <span class="text-xs font-600 text-orange-500">Pay</span>
                        </a>
                        <a href="{{ route('colocations.show') }}" class="flex flex-col items-center gap-1 p-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 transition-colors cursor-pointer">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            <span class="text-xs font-600 text-emerald-500">Invite</span>
                        </a>
                        <a href="{{ route('balances.index') }}" class="flex flex-col items-center gap-1 p-3 rounded-xl bg-purple-50 hover:bg-purple-100 transition-colors cursor-pointer">
                            <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            <span class="text-xs font-600 text-purple-500">Balances</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</main>

<div id="createColocModal" class="modal-backdrop" onclick="if(event.target===this)this.classList.remove('open')">
    <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl mx-4">
        <div class="flex items-center justify-between mb-5">
            <h2 class="font-syne text-lg font-700 text-gray-900">Create a Colocation</h2>
            <button onclick="document.getElementById('createColocModal').classList.remove('open')" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('colocations.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-600 text-gray-700 mb-1.5">Colocation Name</label>
                    <input type="text" name="name" required placeholder="e.g. Les Lilas Apartment" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300 focus:border-transparent">
                </div>

                <div class="p-3 bg-brand-50 rounded-xl border border-brand-100 mt-2">
                    <p class="text-xs text-brand-700 font-500">By creating this, you will become the <strong>Owner</strong>. You will be able to invite your roommates via email.</p>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="document.getElementById('createColocModal').classList.remove('open')" class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-600 text-sm rounded-xl hover:bg-gray-50">Cancel</button>
                    <button type="submit" class="flex-1 py-2.5 bg-brand-500 text-white font-600 text-sm rounded-xl hover:bg-brand-600 transition-colors">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
