<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc – Expenses</title>
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
        .cat-dot{width:10px;height:10px;border-radius:99px;flex-shrink:0;}
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

    <div class="mx-4 mt-4 p-4 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 text-white">
        <p class="text-xs font-medium opacity-75 uppercase tracking-wider">Total Balance</p>
        <p class="font-syne text-2xl font-700 mt-1">€2 340.00</p>
    </div>

    <nav class="flex-1 px-3 mt-5 space-y-0.5 overflow-y-auto scrollbar-hide">
        <p class="text-xs font-600 text-gray-400 uppercase tracking-wider px-3 mb-2">Main</p>
        <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div><span class="text-sm">Dashboard</span></a>
        <a href="{{ route('colocations.show') }}" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div><span class="text-sm">My Colocation</span></a>
        <a href="{{ route('expenses.index') }}" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl"><div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></div><span class="text-sm">Expenses</span></a>
        <a href="#" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div><span class="text-sm">Balances</span></a>
        <a href="#" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600"><div class="nav-icon bg-gray-50"><svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg></div><span class="text-sm">Reputation</span></a>
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

<main class="ml-64 flex-1 p-8">

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center gap-3 text-emerald-700">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-sm font-500">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 flex items-center gap-3 text-red-700">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-sm font-500">{{ $errors->first() }}</span>
        </div>
    @endif

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="font-syne text-2xl font-700 text-gray-900">Expenses</h1>
            <p class="text-sm text-gray-400 mt-0.5">Track and manage shared expenses</p>
        </div>
        <button onclick="document.getElementById('addExpenseModal').classList.add('open')" class="flex items-center gap-2 px-4 py-2 bg-brand-500 text-white text-sm font-600 rounded-xl hover:bg-brand-600 transition-colors shadow-md shadow-brand-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Expense
        </button>
    </div>

    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="stat-card p-4">
            <p class="text-xs text-gray-400 mb-1">Total this month</p>
            <p class="font-syne text-xl font-700 text-gray-900">€{{ number_format($totalThisMonth, 2) }}</p>
        </div>
        <div class="stat-card p-4">
            <p class="text-xs text-gray-400 mb-1">Total ever</p>
            <p class="font-syne text-xl font-700 text-gray-900">€{{ number_format($totalEver, 2) }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Since {{ $colocation->created_at->format('M Y') }}</p>
        </div>
        <div class="stat-card p-4">
            <p class="text-xs text-gray-400 mb-1">Avg. per member</p>
            <p class="font-syne text-xl font-700 text-gray-900">€{{ number_format($avgPerMember, 2) }}</p>
            <p class="text-xs text-gray-400 mt-0.5">This month</p>
        </div>
        <div class="stat-card p-4">
            <p class="text-xs text-gray-400 mb-1">Total expenses</p>
            <p class="font-syne text-xl font-700 text-gray-900">{{ $countThisMonth }}</p>
            <p class="text-xs text-gray-400 mt-0.5">This month</p>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-6">

        <div class="col-span-2 stat-card p-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="font-syne text-base font-700 text-gray-900">Expense List</h2>
            </div>

            <div class="space-y-2">
                @forelse($expenses as $expense)
                    @php
                        // Map Category Names to Icons and Colors
                        $style = match($expense->category->name) {
                            'Rent' => ['icon' => '🏠', 'bg' => 'bg-brand-100', 'text' => 'text-brand-600', 'badge' => 'bg-brand-50 text-brand-600'],
                            'Groceries' => ['icon' => '🛒', 'bg' => 'bg-orange-100', 'text' => 'text-orange-600', 'badge' => 'bg-orange-50 text-orange-600'],
                            'Electricity' => ['icon' => '⚡', 'bg' => 'bg-blue-50', 'text' => 'text-blue-600', 'badge' => 'bg-blue-50 text-blue-600'],
                            'Internet' => ['icon' => '📶', 'bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'badge' => 'bg-purple-50 text-purple-600'],
                            default => ['icon' => '🍕', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'badge' => 'bg-emerald-50 text-emerald-600'],
                        };
                    @endphp

                    <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
                        <div class="w-10 h-10 rounded-xl {{ $style['bg'] }} flex items-center justify-center flex-shrink-0 text-lg">
                            {{ $style['icon'] }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <p class="text-sm font-600 text-gray-800">{{ $expense->title }}</p>
                                <span class="badge {{ $style['badge'] }} text-xs">{{ $expense->category->name }}</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-0.5">Paid by <span class="font-500 text-gray-600">{{ $expense->user->name }}</span> · {{ $expense->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-700 text-gray-900">€{{ number_format($expense->amount, 2) }}</p>
                            <p class="text-xs text-gray-400">€{{ number_format($expense->amount / max($members->count(), 1), 2) }} / pers.</p>
                        </div>

                        @if($isOwner || $expense->user_id === Auth::id())
                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this expense? This will remove all associated debts.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-8 h-8 rounded-lg hover:bg-red-50 flex items-center justify-center group flex-shrink-0">
                                    <svg class="w-4 h-4 text-gray-300 group-hover:text-red-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        @else
                            <div class="w-8 h-8"></div>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-sm text-gray-500">No expenses found for this colocation.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="space-y-5">

            <div class="stat-card p-5">
                <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">This Month By Category</h3>
                <div class="space-y-3">
                    @forelse($expensesByCategory as $catName => $amount)
                        @php
                            $percent = $totalThisMonth > 0 ? ($amount / $totalThisMonth) * 100 : 0;
                            $colorClass = match($catName) { 'Rent' => 'bg-brand-500', 'Groceries' => 'bg-orange-400', 'Electricity' => 'bg-blue-400', 'Internet' => 'bg-purple-400', default => 'bg-emerald-400' };
                        @endphp
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <div class="flex items-center gap-2"><span class="cat-dot {{ $colorClass }}"></span><span class="text-xs font-500 text-gray-600">{{ $catName }}</span></div>
                                <span class="text-xs font-600 text-gray-700">€{{ number_format($amount, 0) }} ({{ round($percent) }}%)</span>
                            </div>
                            <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 {{ $colorClass }} rounded-full" style="width:{{ $percent }}%"></div></div>
                        </div>
                    @empty
                        <p class="text-xs text-gray-500 italic">No data this month.</p>
                    @endforelse
                </div>
            </div>

            <div class="stat-card p-5">
                <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">Top Spenders (All Time)</h3>
                <div class="space-y-3">
                    @foreach($spenders as $index => $member)
                        @php
                            $colors = ['from-brand-400 to-accent-500', 'from-emerald-400 to-teal-500', 'from-orange-400 to-pink-500', 'from-blue-400 to-indigo-500'];
                            $bgClass = match($index % 4) { 0 => 'bg-brand-500', 1 => 'bg-emerald-400', 2 => 'bg-orange-400', 3 => 'bg-blue-400' };
                            $percent = $totalEver > 0 ? ($member->total_spent / $totalEver) * 100 : 0;
                        @endphp
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br {{ $colors[$index % 4] }} flex items-center justify-center text-white text-xs font-700">
                                {{ strtoupper(substr($member->name, 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between mb-1">
                                    <span class="text-xs font-500 text-gray-600">{{ explode(' ', $member->name)[0] }}</span>
                                    <span class="text-xs font-700 text-gray-700">€{{ number_format($member->total_spent, 2) }}</span>
                                </div>
                                <div class="h-1.5 bg-gray-100 rounded-full"><div class="h-1.5 {{ $bgClass }} rounded-full" style="width:{{ $percent }}%"></div></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</main>

<div id="addExpenseModal" class="modal-backdrop" onclick="if(event.target===this)this.classList.remove('open')">
    <div class="bg-white rounded-2xl p-6 w-full max-w-lg shadow-2xl mx-4">
        <div class="flex items-center justify-between mb-5">
            <h2 class="font-syne text-lg font-700 text-gray-900">New Expense</h2>
            <button onclick="document.getElementById('addExpenseModal').classList.remove('open')" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center"><svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>

        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-600 text-gray-700 mb-1.5">Title</label>
                    <input type="text" name="title" required placeholder="Ex: August Rent" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-600 text-gray-700 mb-1.5">Amount (€)</label>
                        <input type="number" step="0.01" min="0.01" name="amount" required placeholder="0.00" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300">
                    </div>
                    <div>
                        <label class="block text-sm font-600 text-gray-700 mb-1.5">Category</label>
                        <select name="category_id" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-300 text-gray-600">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="p-3 bg-brand-50 rounded-xl border border-brand-100 mt-2">
                    <p class="text-xs text-brand-700 font-500">You are recording that <strong>you</strong> paid this expense today. The total amount will be split equally among all {{ $members->count() }} active members.</p>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="document.getElementById('addExpenseModal').classList.remove('open')" class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-600 text-sm rounded-xl hover:bg-gray-50">Cancel</button>
                    <button type="submit" class="flex-1 py-2.5 bg-brand-500 text-white font-600 text-sm rounded-xl hover:bg-brand-600 transition-colors">Save Expense</button>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
</html>
