<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc – Smart Colocation Finance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand: #7B68EE;
            --brand-dark: #5040c8;
            --brand-light: #a89dff;
            --accent: #ff7e5f;
            --accent2: #feb47b;
            --surface: #0d0d1a;
            --surface2: #13132b;
            --card: rgba(255,255,255,0.04);
            --border: rgba(255,255,255,0.08);
            --text: #f0f0ff;
            --muted: rgba(240,240,255,0.45);
        }

        * { font-family: 'DM Sans', sans-serif; box-sizing: border-box; }
        .font-syne { font-family: 'Syne', sans-serif; }

        body {
            background: var(--surface);
            color: var(--text);
            overflow-x: hidden;
            cursor: none;
        }

        /* CUSTOM CURSOR */
        .cursor {
            width: 12px; height: 12px;
            background: var(--brand-light);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.15s ease, background 0.3s ease;
            transform: translate(-50%, -50%);
            mix-blend-mode: screen;
        }
        .cursor-ring {
            width: 36px; height: 36px;
            border: 1.5px solid rgba(168,157,255,0.4);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9998;
            transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1), width 0.3s, height 0.3s, border-color 0.3s;
            transform: translate(-50%, -50%);
        }
        a:hover ~ .cursor, button:hover ~ .cursor { transform: translate(-50%, -50%) scale(2); }

        /* MESH BACKGROUND */
        .mesh-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }
        .mesh-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.18;
            animation: orbFloat 12s ease-in-out infinite;
        }
        .orb1 { width: 700px; height: 700px; background: var(--brand); top: -200px; left: -150px; animation-delay: 0s; }
        .orb2 { width: 500px; height: 500px; background: var(--accent); bottom: -100px; right: -100px; animation-delay: -4s; }
        .orb3 { width: 400px; height: 400px; background: #5b21b6; top: 40%; left: 50%; animation-delay: -8s; }
        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -40px) scale(1.05); }
            66% { transform: translate(-20px, 30px) scale(0.97); }
        }

        /* GRID TEXTURE */
        .grid-texture {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                linear-gradient(rgba(123,104,238,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(123,104,238,0.04) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        /* NAV */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 20px 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to bottom, rgba(13,13,26,0.95) 0%, transparent 100%);
            backdrop-filter: blur(0px);
            animation: navReveal 0.8s ease 0.2s both;
        }
        @keyframes navReveal {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* HERO */
        .hero {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 60px 80px;
        }

        /* STAGGER ANIMATIONS */
        .reveal { opacity: 0; transform: translateY(32px); }
        .reveal.visible {
            animation: revealUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        }
        @keyframes revealUp {
            to { opacity: 1; transform: translateY(0); }
        }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.25s; }
        .delay-3 { animation-delay: 0.4s; }
        .delay-4 { animation-delay: 0.55s; }
        .delay-5 { animation-delay: 0.7s; }
        .delay-6 { animation-delay: 0.85s; }

        /* HEADLINE GRADIENT */
        .headline-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #c4b8ff 40%, #ff7e5f 80%, #feb47b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* GLOW BUTTON */
        .btn-primary {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 36px;
            background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
            color: white;
            font-weight: 600;
            font-size: 15px;
            border-radius: 14px;
            border: none;
            cursor: none;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 0 0 0 rgba(123,104,238,0);
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 60%);
            border-radius: 14px;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 40px rgba(123,104,238,0.5), 0 0 0 1px rgba(168,157,255,0.3);
        }
        .btn-primary .arrow-icon {
            transition: transform 0.2s ease;
        }
        .btn-primary:hover .arrow-icon {
            transform: translateX(4px);
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 16px 32px;
            background: var(--card);
            color: var(--text);
            font-weight: 500;
            font-size: 15px;
            border-radius: 14px;
            border: 1px solid var(--border);
            cursor: none;
            text-decoration: none;
            transition: background 0.2s, transform 0.2s;
            backdrop-filter: blur(8px);
        }
        .btn-ghost:hover {
            background: rgba(255,255,255,0.08);
            transform: translateY(-2px);
        }

        /* FLOATING CARD */
        .float-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.09);
            border-radius: 20px;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            transition: transform 0.4s ease, box-shadow 0.4s ease, border-color 0.3s;
        }
        .float-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 0 1px rgba(168,157,255,0.15);
            border-color: rgba(168,157,255,0.2);
        }

        /* DASHBOARD MOCKUP */
        .mockup-container {
            position: relative;
            animation: mockupFloat 6s ease-in-out infinite;
        }
        @keyframes mockupFloat {
            0%, 100% { transform: translateY(0px) rotate(-1deg); }
            50% { transform: translateY(-16px) rotate(0.5deg); }
        }
        .mockup-glow {
            position: absolute;
            inset: -40px;
            background: radial-gradient(ellipse at center, rgba(123,104,238,0.3) 0%, transparent 70%);
            z-index: -1;
            animation: glowPulse 4s ease-in-out infinite;
        }
        @keyframes glowPulse {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.05); }
        }

        /* MINI BADGE FLOAT */
        .badge-float {
            animation: badgeFloat 4s ease-in-out infinite;
            position: absolute;
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 14px;
            padding: 12px 16px;
            background: rgba(13,13,26,0.85);
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        }
        .badge-float-1 { top: 10%; right: -40px; animation-delay: 0s; }
        .badge-float-2 { bottom: 20%; left: -40px; animation-delay: -2s; }
        .badge-float-3 { top: 55%; right: -20px; animation-delay: -1s; }
        @keyframes badgeFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* STATS BAR */
        .stat-bar-fill {
            height: 4px;
            border-radius: 99px;
            background: linear-gradient(90deg, var(--brand-light), var(--brand));
            animation: barGrow 1.5s ease 1.5s both;
            transform-origin: left;
        }
        @keyframes barGrow {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }

        /* SECTION DIVIDER */
        .section-divider {
            position: relative;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168,157,255,0.3), transparent);
        }

        /* FEATURE CARD GLOW ON HOVER */
        .feature-card {
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
            background: radial-gradient(400px at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(123,104,238,0.08), transparent 70%);
            opacity: 0;
            transition: opacity 0.4s;
        }
        .feature-card:hover::before { opacity: 1; }

        /* SCROLL INDICATOR */
        .scroll-indicator {
            position: absolute;
            bottom: 32px;
            left: 50%;
            transform: translateX(-50%);
            animation: scrollBounce 2s ease-in-out infinite;
        }
        @keyframes scrollBounce {
            0%, 100% { transform: translateX(-50%) translateY(0); opacity: 0.5; }
            50% { transform: translateX(-50%) translateY(8px); opacity: 1; }
        }

        /* COUNTER ANIMATION */
        .counter { display: inline-block; }

        /* NOISE OVERLAY */
        .noise {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            opacity: 0.025;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        }

        /* TESTIMONIAL SLIDER */
        .testimonial-track {
            display: flex;
            gap: 20px;
            animation: slide 30s linear infinite;
            width: max-content;
        }
        @keyframes slide {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        .testimonial-track:hover { animation-play-state: paused; }

        /* TAG pill */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid rgba(168,157,255,0.25);
            background: rgba(123,104,238,0.12);
            color: var(--brand-light);
            letter-spacing: 0.02em;
        }

        /* STEP LINE */
        .step-line {
            position: absolute;
            left: 22px;
            top: 48px;
            bottom: -20px;
            width: 1px;
            background: linear-gradient(to bottom, rgba(168,157,255,0.4), transparent);
        }

        section { position: relative; z-index: 10; }

        /* PING DOT */
        .ping-dot::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: #22c55e;
            animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
        @keyframes ping {
            75%, 100% { transform: scale(2); opacity: 0; }
        }

    </style>
</head>
<body>

<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursorRing"></div>

<div class="noise"></div>

<div class="mesh-bg">
    <div class="mesh-orb orb1"></div>
    <div class="mesh-orb orb2"></div>
    <div class="mesh-orb orb3"></div>
</div>
<div class="grid-texture"></div>

<nav>
    <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #7B68EE, #5040c8); box-shadow: 0 0 20px rgba(123,104,238,0.4);">
            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        </div>
        <span class="font-syne font-800 text-white text-lg tracking-tight">EasyColoc</span>
    </div>

    <div class="hidden md:flex items-center gap-8">
        <a href="#features" class="text-sm text-white/50 hover:text-white transition-colors" style="cursor:none">Features</a>
        <a href="#how" class="text-sm text-white/50 hover:text-white transition-colors" style="cursor:none">How it works</a>
        <a href="#stats" class="text-sm text-white/50 hover:text-white transition-colors" style="cursor:none">Statistics</a>
    </div>

    <div class="flex items-center gap-3">
        @auth
            <a href="{{ route('dashboard') }}" class="btn-primary text-sm" style="cursor:none; padding: 10px 22px; font-size:13px;">
                Go to Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="btn-ghost text-sm" style="cursor:none; padding: 10px 22px; font-size:13px;">
                Log in
            </a>
            <a href="{{ route('register') }}" class="btn-primary text-sm" style="cursor:none; padding: 10px 22px; font-size:13px;">
                Start for free
                <svg class="arrow-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        @endauth
    </div>
</nav>

<section class="hero">
    <div class="max-w-7xl mx-auto w-full grid grid-cols-2 gap-16 items-center">
        <div class="space-y-8">
            <div class="reveal delay-1">
                <div class="pill">
                    <span class="relative w-2 h-2 rounded-full bg-green-400 ping-dot inline-block"></span>
                    Available now · 100% free
                </div>
            </div>

            <div class="reveal delay-2">
                <h1 class="font-syne font-900 text-6xl leading-none tracking-tight">
                    <span class="headline-gradient">Shared finance,</span><br>
                    <span class="text-white/90">simplified.</span>
                </h1>
            </div>

            <div class="reveal delay-3">
                <p class="text-lg leading-relaxed" style="color: var(--muted); max-width: 420px;">
                    Manage shared expenses, calculate debts automatically, and build your reputation as the ideal roommate.
                </p>
            </div>

            <div class="reveal delay-4 flex items-center gap-4 flex-wrap">
                <a href="{{ route('register') }}" class="btn-primary">
                    Create my colocation
                    <svg class="arrow-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('dashboard') }}" class="btn-ghost">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    View dashboard
                </a>
            </div>

            <div class="reveal delay-5">
                <div class="flex items-center gap-5 pt-2">
                    <div class="flex -space-x-2">
                        <div class="w-9 h-9 rounded-full border-2 flex items-center justify-center text-xs font-700 text-white" style="background: linear-gradient(135deg,#7B68EE,#a89dff); border-color: var(--surface);">A</div>
                        <div class="w-9 h-9 rounded-full border-2 flex items-center justify-center text-xs font-700 text-white" style="background: linear-gradient(135deg,#10b981,#34d399); border-color: var(--surface);">B</div>
                        <div class="w-9 h-9 rounded-full border-2 flex items-center justify-center text-xs font-700 text-white" style="background: linear-gradient(135deg,#ff7e5f,#feb47b); border-color: var(--surface);">C</div>
                        <div class="w-9 h-9 rounded-full border-2 flex items-center justify-center text-xs font-700 text-white" style="background: linear-gradient(135deg,#6366f1,#8b5cf6); border-color: var(--surface);">D</div>
                        <div class="w-9 h-9 rounded-full border-2 flex items-center justify-center text-xs font-600 text-white" style="background: rgba(255,255,255,0.1); border-color: var(--surface);">+</div>
                    </div>
                    <div>
                        <div class="flex gap-0.5 mb-0.5">
                            <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <p class="text-xs" style="color:var(--muted);"><strong class="text-white">1,200+</strong> happy roommates</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="reveal delay-3 relative">
            <div class="mockup-container">
                <div class="mockup-glow"></div>

                <div class="float-card p-5 relative" style="background: rgba(19,19,43,0.9);">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-xs font-600 uppercase tracking-widest" style="color:var(--muted)">Dashboard</p>
                            <p class="font-syne font-700 text-white text-sm mt-0.5">The Lilacs Apartment</p>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="w-2 h-2 rounded-full bg-green-400 relative ping-dot"></div>
                            <span class="text-xs" style="color:var(--muted)">Online</span>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl mb-4" style="background: linear-gradient(135deg, #7B68EE 0%, #5040c8 100%);">
                        <p class="text-xs opacity-70 font-500 mb-1">Your balance</p>
                        <p class="font-syne font-800 text-2xl text-white">+€215.00</p>
                        <div class="flex items-center gap-1 mt-1">
                            <svg class="w-3 h-3 text-emerald-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.293 7.293A1 1 0 0115 7h-3z" clip-rule="evenodd"/></svg>
                            <span class="text-xs text-emerald-300">You are owed money</span>
                        </div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <p class="text-xs font-600 uppercase tracking-widest mb-2" style="color:var(--muted)">Recent expenses</p>
                        <div class="flex items-center gap-3 p-2 rounded-xl" style="background: rgba(255,255,255,0.04)">
                            <div class="w-8 h-8 rounded-lg text-base flex items-center justify-center" style="background:rgba(123,104,238,0.2)">🏠</div>
                            <div class="flex-1"><p class="text-xs font-600 text-white">July Rent</p><p class="text-xs" style="color:var(--muted)">Alice · 01/07</p></div>
                            <span class="text-xs font-700 text-white">€1,200</span>
                        </div>
                        <div class="flex items-center gap-3 p-2 rounded-xl" style="background: rgba(255,255,255,0.04)">
                            <div class="w-8 h-8 rounded-lg text-base flex items-center justify-center" style="background:rgba(255,126,95,0.2)">🛒</div>
                            <div class="flex-1"><p class="text-xs font-600 text-white">Groceries</p><p class="text-xs" style="color:var(--muted)">Bob · 15/07</p></div>
                            <span class="text-xs font-700 text-white">€87.50</span>
                        </div>
                        <div class="flex items-center gap-3 p-2 rounded-xl" style="background: rgba(255,255,255,0.04)">
                            <div class="w-8 h-8 rounded-lg text-base flex items-center justify-center" style="background:rgba(16,185,129,0.2)">⚡</div>
                            <div class="flex-1"><p class="text-xs font-600 text-white">Electricity</p><p class="text-xs" style="color:var(--muted)">Clara · 10/07</p></div>
                            <span class="text-xs font-700 text-white">€95</span>
                        </div>
                    </div>

                    <div class="p-3 rounded-xl" style="background: linear-gradient(135deg, rgba(255,126,95,0.8) 0%, rgba(254,180,123,0.8) 100%);">
                        <p class="text-xs opacity-80 mb-1">This month</p>
                        <p class="font-syne font-800 text-white text-lg">€1,382.50</p>
                        <svg viewBox="0 0 200 40" class="w-full h-8 mt-1" preserveAspectRatio="none">
                            <path d="M0,35 C20,30 40,25 60,20 C80,15 100,28 120,22 C140,16 160,8 180,5 L200,3 L200,40 L0,40Z" fill="rgba(255,255,255,0.2)"/>
                            <path d="M0,35 C20,30 40,25 60,20 C80,15 100,28 120,22 C140,16 160,8 180,5 L200,3" fill="none" stroke="rgba(255,255,255,0.8)" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>

                <div class="badge-float badge-float-1">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-emerald-500/20 flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-700 text-white">Paid!</p>
                            <p class="text-xs" style="color:var(--muted)">Bob → Alice</p>
                        </div>
                        <span class="font-syne font-800 text-emerald-400 text-sm ml-2">€215</span>
                    </div>
                </div>

                <div class="badge-float badge-float-2">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center" style="background:rgba(123,104,238,0.2)">
                            <svg class="w-3.5 h-3.5" style="color:var(--brand-light)" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-700 text-white">Reputation</p>
                            <div class="flex gap-0.5 mt-0.5">
                                <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                        </div>
                        <span class="font-syne font-800 text-yellow-400 text-sm ml-1">4.8</span>
                    </div>
                </div>

                <div class="badge-float badge-float-3">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-brand-500/20 flex items-center justify-center">
                            <svg class="w-3.5 h-3.5" style="color:var(--brand-light)" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-700 text-white">+1 member</p>
                            <p class="text-xs" style="color:var(--muted)">Emma joined</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator hidden md:block">
        <div class="w-6 h-10 rounded-full border flex items-start justify-center pt-1.5" style="border-color: rgba(168,157,255,0.3)">
            <div class="w-1 h-2 rounded-full" style="background:var(--brand-light); animation: scrollDot 2s ease-in-out infinite;"></div>
        </div>
    </div>
</section>

<section id="stats" class="py-12 relative z-10" style="border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); background: rgba(255,255,255,0.02);">
    <div class="max-w-5xl mx-auto px-12 grid grid-cols-4 gap-8">
        <div class="text-center reveal">
            <p class="font-syne font-900 text-4xl text-white">1.2k<span style="color:var(--brand-light)">+</span></p>
            <p class="text-sm mt-1" style="color:var(--muted)">Active roommates</p>
        </div>
        <div class="text-center reveal delay-1">
            <p class="font-syne font-900 text-4xl text-white">€142k<span style="color:var(--brand-light)">+</span></p>
            <p class="text-sm mt-1" style="color:var(--muted)">Expenses managed</p>
        </div>
        <div class="text-center reveal delay-2">
            <p class="font-syne font-900 text-4xl text-white">89<span style="color:var(--brand-light)">%</span></p>
            <p class="text-sm mt-1" style="color:var(--muted)">Reimbursement rate</p>
        </div>
        <div class="text-center reveal delay-3">
            <p class="font-syne font-900 text-4xl text-white">4.9<span style="color:var(--brand-light)">★</span></p>
            <p class="text-sm mt-1" style="color:var(--muted)">Average score</p>
        </div>
    </div>
</section>

<section id="features" class="py-28 px-12">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16 reveal">
            <div class="pill inline-flex mb-4">Features</div>
            <h2 class="font-syne font-800 text-4xl text-white mt-4">Everything you need,<br><span style="color:var(--brand-light)">nothing you don't.</span></h2>
        </div>

        <div class="grid grid-cols-3 gap-5">
            <div class="float-card feature-card p-6 reveal delay-1">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5" style="background: rgba(123,104,238,0.15); border: 1px solid rgba(123,104,238,0.2);">
                    <svg class="w-6 h-6" style="color:var(--brand-light)" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-syne font-700 text-white text-lg mb-2">Colocation Management</h3>
                <p class="text-sm leading-relaxed" style="color:var(--muted)">Create your colocation, invite your roommates via email, and manage members easily.</p>
                <div class="mt-5 pt-5 border-t" style="border-color: var(--border)">
                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(123,104,238,0.1); color:var(--brand-light)">Invitations</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(123,104,238,0.1); color:var(--brand-light)">Roles</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(123,104,238,0.1); color:var(--brand-light)">1 active coloc</span>
                    </div>
                </div>
            </div>

            <div class="float-card feature-card p-6 reveal delay-2" style="border-color: rgba(123,104,238,0.2); background: rgba(123,104,238,0.06);">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5" style="background: rgba(123,104,238,0.2); border: 1px solid rgba(123,104,238,0.3);">
                    <svg class="w-6 h-6" style="color:var(--brand-light)" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                </div>
                <h3 class="font-syne font-700 text-white text-lg mb-2">Automatic Calculation</h3>
                <p class="text-sm leading-relaxed" style="color:var(--muted)">Balances calculated in real-time. See exactly who owes what to whom, without the headache.</p>
                <div class="mt-5 pt-5 border-t" style="border-color: rgba(123,104,238,0.2)">
                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(123,104,238,0.15); color:var(--brand-light)">Balances</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(123,104,238,0.15); color:var(--brand-light)">Reimbursements</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(123,104,238,0.15); color:var(--brand-light)">Payments</span>
                    </div>
                </div>
            </div>

            <div class="float-card feature-card p-6 reveal delay-3">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5" style="background: rgba(255,126,95,0.12); border: 1px solid rgba(255,126,95,0.2);">
                    <svg class="w-6 h-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                </div>
                <h3 class="font-syne font-700 text-white text-lg mb-2">Reputation System</h3>
                <p class="text-sm leading-relaxed" style="color:var(--muted)">Build your roommate score. Every departure without debt earns you points.</p>
                <div class="mt-5 pt-5 border-t" style="border-color: var(--border)">
                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(255,126,95,0.1); color:#ffa07a">Score</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(255,126,95,0.1); color:#ffa07a">Badges</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(255,126,95,0.1); color:#ffa07a">Ranking</span>
                    </div>
                </div>
            </div>

            <div class="float-card feature-card p-6 reveal delay-1">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5" style="background: rgba(16,185,129,0.12); border: 1px solid rgba(16,185,129,0.2);">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <h3 class="font-syne font-700 text-white text-lg mb-2">Expense Tracking</h3>
                <p class="text-sm leading-relaxed" style="color:var(--muted)">Add each expense with category, date, and payer. Filter by month to analyze your habits.</p>
                <div class="mt-5 pt-5 border-t" style="border-color: var(--border)">
                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(16,185,129,0.1); color:#34d399">Categories</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(16,185,129,0.1); color:#34d399">Filters</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(16,185,129,0.1); color:#34d399">History</span>
                    </div>
                </div>
            </div>

            <div class="float-card feature-card p-6 reveal delay-2">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5" style="background: rgba(99,102,241,0.12); border: 1px solid rgba(99,102,241,0.2);">
                    <svg class="w-6 h-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="font-syne font-700 text-white text-lg mb-2">Token Invitations</h3>
                <p class="text-sm leading-relaxed" style="color:var(--muted)">A unique link sent by email. The future roommate accepts or declines in one click.</p>
                <div class="mt-5 pt-5 border-t" style="border-color: var(--border)">
                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(99,102,241,0.1); color:#a5b4fc">Unique token</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(99,102,241,0.1); color:#a5b4fc">Email</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(99,102,241,0.1); color:#a5b4fc">Expiration</span>
                    </div>
                </div>
            </div>

            <div class="float-card feature-card p-6 reveal delay-3">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5" style="background: rgba(245,158,11,0.12); border: 1px solid rgba(245,158,11,0.2);">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <h3 class="font-syne font-700 text-white text-lg mb-2">Admin Dashboard</h3>
                <p class="text-sm leading-relaxed" style="color:var(--muted)">Global admins oversee the platform, view stats, and moderate users.</p>
                <div class="mt-5 pt-5 border-t" style="border-color: var(--border)">
                    <div class="flex flex-wrap gap-2">
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(245,158,11,0.1); color:#fbbf24">Stats</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(245,158,11,0.1); color:#fbbf24">Moderation</span>
                        <span class="text-xs px-3 py-1 rounded-full" style="background:rgba(245,158,11,0.1); color:#fbbf24">Banning</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="how" class="py-20 px-12" style="background: rgba(255,255,255,0.015);">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16 reveal">
            <div class="pill inline-flex mb-4">How it works</div>
            <h2 class="font-syne font-800 text-4xl text-white mt-4">In 3 steps,<br><span style="color:var(--brand-light)">manage everything.</span></h2>
        </div>

        <div class="grid grid-cols-3 gap-8">
            <div class="relative reveal delay-1">
                <div class="float-card p-6 h-full">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 font-syne font-900 text-xl" style="background: linear-gradient(135deg, #7B68EE, #5040c8); color:white; box-shadow: 0 8px 24px rgba(123,104,238,0.3);">1</div>
                    <h3 class="font-syne font-700 text-white text-base mb-2">Create your colocation</h3>
                    <p class="text-sm" style="color:var(--muted); line-height:1.6">Sign up, name your colocation, and invite your roommates via email.</p>
                    <div class="mt-5 p-3 rounded-xl" style="background:rgba(255,255,255,0.04)">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-brand-500/20 flex items-center justify-center"><svg class="w-3 h-3" style="color:var(--brand-light)" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            <span class="text-xs" style="color:var(--muted)">Only 1 active colocation per user</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative reveal delay-2">
                <div class="float-card p-6 h-full" style="border-color: rgba(123,104,238,0.25); background: rgba(123,104,238,0.05);">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 font-syne font-900 text-xl" style="background: linear-gradient(135deg, #ff7e5f, #feb47b); color:white; box-shadow: 0 8px 24px rgba(255,126,95,0.3);">2</div>
                    <h3 class="font-syne font-700 text-white text-base mb-2">Add expenses</h3>
                    <p class="text-sm" style="color:var(--muted); line-height:1.6">Each roommate adds their shared expenses. Balances are calculated automatically.</p>
                    <div class="mt-5 p-3 rounded-xl" style="background:rgba(255,255,255,0.04)">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-orange-500/20 flex items-center justify-center"><svg class="w-3 h-3 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            <span class="text-xs" style="color:var(--muted)">Simplified debt calculation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative reveal delay-3">
                <div class="float-card p-6 h-full">
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 font-syne font-900 text-xl" style="background: linear-gradient(135deg, #10b981, #059669); color:white; box-shadow: 0 8px 24px rgba(16,185,129,0.3);">3</div>
                    <h3 class="font-syne font-700 text-white text-base mb-2">Settle up and earn reputation</h3>
                    <p class="text-sm" style="color:var(--muted); line-height:1.6">Mark payments as done and build your score as a reliable roommate.</p>
                    <div class="mt-5 p-3 rounded-xl" style="background:rgba(255,255,255,0.04)">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center"><svg class="w-3 h-3 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            <span class="text-xs" style="color:var(--muted)">+1 point for every clean departure</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 overflow-hidden">
    <div class="mb-8 text-center reveal">
        <p class="text-sm font-600 uppercase tracking-widest" style="color:var(--muted)">What they say about us</p>
    </div>
    <div style="overflow:hidden; mask-image: linear-gradient(90deg, transparent, black 10%, black 90%, transparent);">
        <div class="testimonial-track">
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#7B68EE,#a89dff)">M</div>
                    <div><p class="text-sm font-600 text-white">Marie L.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"No more arguments over expenses! Everything is transparent."</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#10b981,#34d399)">T</div>
                    <div><p class="text-sm font-600 text-white">Thomas R.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"The automatic balance calculation saved us. Simple and effective."</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#ff7e5f,#feb47b)">S</div>
                    <div><p class="text-sm font-600 text-white">Sophie M.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"The reputation system really motivates everyone to pay on time!"</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#6366f1,#8b5cf6)">K</div>
                    <div><p class="text-sm font-600 text-white">Kevin B.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"Super clean interface, easy to navigate. Perfect for our coloc of 5."</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#f59e0b,#fbbf24)">L</div>
                    <div><p class="text-sm font-600 text-white">Laura P.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"No more complicated Excel sheets. EasyColoc handles everything automatically."</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#7B68EE,#a89dff)">M</div>
                    <div><p class="text-sm font-600 text-white">Marie L.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"No more arguments over expenses! Everything is transparent."</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#10b981,#34d399)">T</div>
                    <div><p class="text-sm font-600 text-white">Thomas R.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"The automatic balance calculation saved us. Simple and effective."</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#ff7e5f,#feb47b)">S</div>
                    <div><p class="text-sm font-600 text-white">Sophie M.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"The reputation system really motivates everyone to pay on time!"</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#6366f1,#8b5cf6)">K</div>
                    <div><p class="text-sm font-600 text-white">Kevin B.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"Super clean interface, easy to navigate. Perfect for our coloc of 5."</p>
            </div>
            <div style="min-width:280px" class="float-card p-5">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-700" style="background:linear-gradient(135deg,#f59e0b,#fbbf24)">L</div>
                    <div><p class="text-sm font-600 text-white">Laura P.</p><div class="flex gap-0.5">⭐⭐⭐⭐⭐</div></div>
                </div>
                <p class="text-sm" style="color:var(--muted);">"No more complicated Excel sheets. EasyColoc handles everything automatically."</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 px-12">
    <div class="max-w-3xl mx-auto text-center reveal">
        <div class="float-card p-12" style="background: rgba(123,104,238,0.08); border-color: rgba(123,104,238,0.2);">
            <div class="w-16 h-16 rounded-3xl mx-auto mb-6 flex items-center justify-center" style="background: linear-gradient(135deg, #7B68EE, #5040c8); box-shadow: 0 0 40px rgba(123,104,238,0.4);">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            <h2 class="font-syne font-900 text-4xl text-white mb-4">Ready to simplify<br>your colocation?</h2>
            <p class="text-lg mb-8" style="color:var(--muted)">Join hundreds of roommates who manage their finances with peace of mind.</p>
            <div class="flex items-center justify-center gap-4">
                <a href="{{ route('register') }}" class="btn-primary text-base" style="cursor:none; padding: 16px 40px;">
                    Create my free account
                    <svg class="arrow-icon w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('dashboard') }}" class="btn-ghost" style="cursor:none;">View dashboard →</a>
            </div>
            <p class="text-xs mt-5" style="color:var(--muted)">No credit card required · First account = Global Admin</p>
        </div>
    </div>
</section>

<footer class="py-10 px-12 border-t relative z-10" style="border-color: var(--border);">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-xl flex items-center justify-center" style="background: linear-gradient(135deg, #7B68EE, #5040c8);">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            <span class="font-syne font-700 text-white text-sm">EasyColoc</span>
            <span class="text-xs" style="color:var(--muted)">· Smart Colocation Finance</span>
        </div>
        <div class="flex items-center gap-6">
            <a href="{{ route('dashboard') }}" class="text-xs hover:text-white transition-colors" style="color:var(--muted); cursor:none;">Dashboard</a>
            <a href="{{ route('register') }}" class="text-xs hover:text-white transition-colors" style="color:var(--muted); cursor:none;">Sign up</a>
            <a href="{{ route('login') }}" class="text-xs hover:text-white transition-colors" style="color:var(--muted); cursor:none;">Log in</a>
        </div>
        <p class="text-xs" style="color:var(--muted)">© 2024 EasyColoc. All rights reserved.</p>
    </div>
</footer>

<script>
    // CUSTOM CURSOR
    const cursor = document.getElementById('cursor');
    const ring = document.getElementById('cursorRing');
    let mouseX = 0, mouseY = 0, ringX = 0, ringY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX; mouseY = e.clientY;
        cursor.style.left = mouseX + 'px';
        cursor.style.top = mouseY + 'px';
    });

    function animateRing() {
        ringX += (mouseX - ringX) * 0.12;
        ringY += (mouseY - ringY) * 0.12;
        ring.style.left = ringX + 'px';
        ring.style.top = ringY + 'px';
        requestAnimationFrame(animateRing);
    }
    animateRing();

    // Hover effect on interactive elements
    document.querySelectorAll('a, button').forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.style.transform = 'translate(-50%, -50%) scale(2.5)';
            cursor.style.background = '#ff7e5f';
            ring.style.width = '56px';
            ring.style.height = '56px';
            ring.style.borderColor = 'rgba(255,126,95,0.4)';
        });
        el.addEventListener('mouseleave', () => {
            cursor.style.transform = 'translate(-50%, -50%) scale(1)';
            cursor.style.background = 'var(--brand-light)';
            ring.style.width = '36px';
            ring.style.height = '36px';
            ring.style.borderColor = 'rgba(168,157,255,0.4)';
        });
    });

    // SCROLL REVEAL
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    reveals.forEach(el => observer.observe(el));

    // Trigger hero reveals immediately
    setTimeout(() => {
        document.querySelectorAll('.hero .reveal').forEach(el => el.classList.add('visible'));
    }, 100);

    // FEATURE CARDS mouse move glow
    document.querySelectorAll('.feature-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            card.style.setProperty('--mouse-x', x + '%');
            card.style.setProperty('--mouse-y', y + '%');
        });
    });

    // PARALLAX on hero text
    document.addEventListener('mousemove', (e) => {
        const x = (e.clientX / window.innerWidth - 0.5) * 20;
        const y = (e.clientY / window.innerHeight - 0.5) * 10;
        document.querySelector('.mockup-container').style.transform =
            `translateY(0px) rotateY(${x * 0.3}deg) rotateX(${-y * 0.2}deg)`;
    });
</script>
</body>
</html>
