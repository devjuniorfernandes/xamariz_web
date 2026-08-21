<!DOCTYPE html>
<html lang="pt" class="h-full bg-[#141414]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CMS | Xamariz</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: var(--font-sans, 'Inter', sans-serif); }
    </style>
</head>
<body class="h-full bg-[#141414] text-gray-100 flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        {{-- Logo Header --}}
        <div class="text-center mb-8">
            <img src="{{ asset('logo_xamariz_white.svg') }}" alt="Xamariz" class="h-10 w-auto mx-auto mb-4">
            <h1 class="text-2xl font-bold text-white tracking-tight">Painel de Gestão CMS</h1>
            <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider font-sans">Inicie sessão para gerir a plataforma.</p>
        </div>

        {{-- Login Card (0px radius according to Myriad DS) --}}
        <div class="bg-[#1f2022] border border-[#2c2d30] rounded-none p-8">
            @if($errors->any())
                <div class="mb-6 p-4 bg-rose-950/40 border border-rose-500/40 text-rose-300 text-xs font-bold uppercase tracking-wider">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Endereço de E-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@xamariz.ao"
                           class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white placeholder-gray-500 focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Palavra-passe</label>
                    <input type="password" name="password" required placeholder="••••••••"
                           class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white placeholder-gray-500 focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-gray-400 hover:text-gray-200">
                        <input type="checkbox" name="remember" class="bg-[#141414] border-[#2c2d30] text-[var(--color-brand-accent)] focus:ring-0">
                        <span>Lembrar sessão</span>
                    </label>
                </div>

                {{-- Button 100% Rounded (Myriad DS Rule) --}}
                <button type="submit" class="w-full py-3.5 px-6 rounded-full bg-[var(--color-brand-accent)] hover:bg-[var(--color-brand-accent-hover)] text-white text-xs font-bold uppercase tracking-wider transition-all duration-300">
                    Entrar no Painel
                </button>
            </form>
        </div>

        <p class="text-center text-[10px] text-gray-500 uppercase tracking-widest mt-8">&copy; {{ date('Y') }} Xamariz. Todos os direitos reservados.</p>
    </div>

</body>
</html>
