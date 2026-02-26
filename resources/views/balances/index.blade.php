<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc – Balances & Debts</title>
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
        <a href="{{ route('balances.index') }}" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-xl"><div class="nav-icon bg-brand-100"><svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg></div><span class="text-sm">Balances</span></a>
    </nav>

    <div class="px-4 py-4 border-t border-gray-100">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white font-syne font-700 text-sm">
                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-600 text-gray-800 truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-400">{{ Auth::user()->is_global_admin ? 'Global Admin' : 'Member' }}</p>
            </div>
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

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="font-syne text-2xl font-700 text-gray-900">Balances & Debts</h1>
            <p class="text-sm text-gray-400 mt-0.5">Pay specific settlements to clear your balance</p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6">

        <div class="space-y-6">

            <div class="stat-card p-6 border-t-4 border-red-400">
                <h2 class="font-syne text-base font-700 text-gray-900 mb-5">You Owe</h2>
                <div class="space-y-3">
                    @forelse($myDebts as $debt)
                        <div class="p-4 rounded-xl border border-red-100 bg-red-50/30 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-400 to-accent-500 flex items-center justify-center text-white text-sm font-700">
                                    {{ strtoupper(substr($debt->expense->user->name ?? 'U', 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">To <strong class="text-gray-800">{{ explode(' ', $debt->expense->user->name)[0] }}</strong></p>
                                    <p class="text-sm font-700 text-gray-900">{{ $debt->expense->title }}</p>
                                    <p class="text-xs text-gray-400">{{ $debt->expense->category->name }} · {{ $debt->created_at->format('d M') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-syne font-700 text-red-500">€{{ number_format($debt->amount, 2) }}</p>
                                <button onclick="openPayModal({{ $debt->id }}, '{{ addslashes($debt->expense->user->name) }}', '{{ addslashes($debt->expense->title) }}', {{ $debt->amount }})" class="mt-1 px-3 py-1.5 bg-emerald-500 text-white text-xs font-600 rounded-lg hover:bg-emerald-600 transition-colors">
                                    Pay Now
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 italic p-3 bg-gray-50 rounded-xl">You don't owe anything! 🎉</p>
                    @endforelse
                </div>
            </div>

            <div class="stat-card p-6 border-t-4 border-emerald-400">
                <h2 class="font-syne text-base font-700 text-gray-900 mb-5">Owed To You</h2>
                <div class="space-y-3">
                    @forelse($owedToMe as $credit)
                        <div class="p-4 rounded-xl border border-emerald-100 bg-emerald-50/30 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white text-sm font-700">
                                    {{ strtoupper(substr($credit->user->name ?? 'U', 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">From <strong class="text-gray-800">{{ explode(' ', $credit->user->name)[0] }}</strong></p>
                                    <p class="text-sm font-700 text-gray-900">{{ $credit->expense->title }}</p>
                                    <p class="text-xs text-gray-400">{{ $credit->expense->category->name }} · {{ $credit->created_at->format('d M') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-syne font-700 text-emerald-600">+€{{ number_format($credit->amount, 2) }}</p>
                                <p class="text-xs text-emerald-500 mt-1">Pending</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 italic p-3 bg-gray-50 rounded-xl">Nobody owes you anything.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-6">

            <div class="stat-card p-6">
                <h2 class="font-syne text-base font-700 text-gray-900 mb-5">Individual Balances</h2>
                <div class="space-y-4">
                    @foreach($members as $member)
                        @php
                            if($member->net_balance > 0.01) {
                                $bg = 'bg-emerald-50 border-emerald-100'; $text = 'text-emerald-600'; $label = 'Gets back'; $sign = '+';
                            } elseif($member->net_balance < -0.01) {
                                $bg = 'bg-red-50 border-red-100'; $text = 'text-red-500'; $label = 'Owes'; $sign = '';
                            } else {
                                $bg = 'bg-gray-50 border-gray-100'; $text = 'text-gray-500'; $label = 'Settled up'; $sign = '';
                            }
                        @endphp
                        <div class="flex items-center gap-4 p-3 rounded-xl border {{ $bg }}">
                            <div class="w-11 h-11 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center text-white font-syne font-700">
                                {{ strtoupper(substr($member->name ?? 'U', 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-600 text-gray-800 text-sm">
                                    {{ $member->name }}
                                    @if($member->id === Auth::id()) <span class="font-normal text-gray-500">(You)</span> @endif
                                </p>
                                <div class="flex items-center gap-3 mt-1">
                                    <span class="text-xs text-gray-500">Paid: <strong class="text-gray-700">€{{ number_format($member->total_paid, 0) }}</strong></span>
                                    <span class="text-xs text-gray-500">Share: <strong class="text-gray-700">€{{ number_format($member->total_share, 0) }}</strong></span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-syne font-700 {{ $text }}">{{ $sign }}€{{ number_format($member->net_balance, 2) }}</p>
                                <p class="text-xs {{ $text }} opacity-80">{{ $label }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @if($history->count() > 0)
                <div class="stat-card p-6">
                    <h3 class="font-syne text-sm font-700 text-gray-900 mb-4">Payment History</h3>
                    <div class="space-y-3">
                        @foreach($history as $item)
                            <div class="flex items-center gap-3 py-2 border-b border-gray-50 last:border-0">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-600 text-gray-700">
                                        {{ explode(' ', $item->user->name)[0] }} paid {{ explode(' ', $item->expense->user->name)[0] }}
                                    </p>
                                    <p class="text-xs text-gray-400 truncate">{{ $item->expense->title }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-700 text-gray-800">€{{ number_format($item->amount, 2) }}</p>
                                    <p class="text-[10px] text-gray-400">{{ \Carbon\Carbon::parse($item->paid_at)->format('d M') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</main>

<div id="payModal" class="modal-backdrop" onclick="if(event.target===this)this.classList.remove('open')">
    <div class="bg-white rounded-2xl p-6 w-full max-w-md shadow-2xl mx-4">
        <div class="flex items-center justify-between mb-5">
            <h2 class="font-syne text-lg font-700 text-gray-900">Confirm Payment</h2>
            <button onclick="document.getElementById('payModal').classList.remove('open')" class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center"><svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
        </div>

        <div class="p-4 bg-emerald-50 rounded-xl mb-4 text-center">
            <p id="modal_amount_display" class="text-2xl font-syne font-800 text-emerald-600">€0.00</p>
            <p id="modal_text_display" class="text-sm text-gray-600 mt-1">Paying user for expense</p>
        </div>

        <p class="text-sm text-gray-500 mb-4">By confirming, you indicate that you have transferred this money. The settlement will be marked as paid.</p>

        <form action="{{ route('balances.pay') }}" method="POST" class="flex gap-3">
            @csrf
            <input type="hidden" name="settlement_id" id="modal_settlement_id">

            <button type="button" onclick="document.getElementById('payModal').classList.remove('open')" class="flex-1 py-2.5 border border-gray-200 text-gray-700 font-600 text-sm rounded-xl hover:bg-gray-50">Cancel</button>
            <button type="submit" class="flex-1 py-2.5 bg-emerald-500 text-white font-600 text-sm rounded-xl hover:bg-emerald-600 transition-colors">Confirm Paid ✓</button>
        </form>
    </div>
</div>

<script>
    function openPayModal(settlementId, toUserName, expenseTitle, amount) {
        document.getElementById('modal_settlement_id').value = settlementId;
        document.getElementById('modal_amount_display').innerText = '€' + parseFloat(amount).toFixed(2);
        document.getElementById('modal_text_display').innerText = 'Paying ' + toUserName + ' for ' + expenseTitle;
        document.getElementById('payModal').classList.add('open');
    }
</script>
</body>
</html>
