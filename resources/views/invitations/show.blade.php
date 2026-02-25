<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc – Invitation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand: #7B68EE;
            --surface: #0d0d1a;
            --brand-light: #a89dff;
        }
        body { font-family: 'DM Sans', sans-serif; background: var(--surface); color: white; overflow: hidden; }
        .font-syne { font-family: 'Syne', sans-serif; }

        /* MESH BACKGROUND (From Welcome Page) */
        .mesh-bg { position: fixed; inset: 0; z-index: 0; overflow: hidden; }
        .mesh-orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.15; animation: orbFloat 12s ease-in-out infinite; }
        .orb1 { width: 600px; height: 600px; background: var(--brand); top: -100px; left: -100px; }
        .orb2 { width: 500px; height: 500px; background: #ff7e5f; bottom: -100px; right: -100px; animation-delay: -4s; }
        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -40px) scale(1.05); }
            66% { transform: translate(-20px, 30px) scale(0.97); }
        }

        .grid-texture { position: fixed; inset: 0; z-index: 0; background-image: linear-gradient(rgba(123,104,238,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(123,104,238,0.04) 1px, transparent 1px); background-size: 48px 48px; }

        .float-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 24px;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            position: relative;
            z-index: 10;
            animation: slideUp 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        @keyframes slideUp { to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

<div class="mesh-bg">
    <div class="mesh-orb orb1"></div>
    <div class="mesh-orb orb2"></div>
</div>
<div class="grid-texture"></div>

<div class="float-card p-10 max-w-md w-full text-center">

    <div class="w-20 h-20 rounded-2xl mx-auto mb-6 flex items-center justify-center text-3xl" style="background: linear-gradient(135deg, #7B68EE, #5040c8); box-shadow: 0 0 40px rgba(123,104,238,0.4);">
        🏠
    </div>

    <h2 class="font-syne font-800 text-3xl mb-2">You're Invited!</h2>
    <p class="text-gray-400 mb-6 text-sm">You have been invited to join the following colocation to share expenses:</p>

    <div class="p-5 rounded-xl bg-white/5 border border-white/10 mb-8">
        <p class="text-xs text-gray-500 uppercase tracking-widest font-600 mb-1">Colocation Name</p>
        <p class="font-syne font-700 text-xl" style="color: var(--brand-light)">{{ $invitation->colocation->name }}</p>
    </div>

    <div class="flex gap-4">
        <form action="{{ route('invitations.decline', $invitation->UUID) }}" method="POST" class="flex-1">
            @csrf
            <button type="submit" class="w-full py-3.5 rounded-xl font-600 text-sm border border-white/10 text-gray-300 hover:bg-white/5 hover:text-white hover:border-white/20 transition-all">
                Decline
            </button>
        </form>

        <form action="{{ route('invitations.accept', $invitation->UUID) }}" method="POST" class="flex-1">
            @csrf
            <button type="submit" class="w-full py-3.5 rounded-xl font-600 text-sm text-white transition-all transform hover:-translate-y-0.5" style="background: linear-gradient(135deg, #7B68EE, #5040c8); box-shadow: 0 8px 20px rgba(123,104,238,0.3);">
                Accept Invite
            </button>
        </form>
    </div>

    <p class="text-xs text-gray-500 mt-6 mt-4">By accepting, you will gain access to shared expenses and balances for this apartment.</p>
</div>

</body>
</html>
