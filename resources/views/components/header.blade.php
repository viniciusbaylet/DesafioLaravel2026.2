<header class="w-full flex flex-row items-center justify-between pt-7 pb-7 pl-24 pr-24 bg-[#0D1B2A]">
    <div class="w-full flex flex-row justify-between">
        <x-logo class="text-white" />
        <div class="w-116 bg-white flex flex-row justify-between rounded-2xl h-10">
            <input type="text" placeholder="Buscar no ByPlace..." class="bg-white w-[90%] pl-2 rounded-l-2xl placeholder-black text-sm focus:outline-none">
            <button class="w-[8%] items-center justify-center cursor-pointer">
                <img src="{{ asset('assets/images/search.svg') }}" alt="lupa" class="w-5 h-5">
            </button>
        </div>
        <div class="flex flex-row gap-7 items-center justify-center">
            <button class="items-center justify-center cursor-pointer">
                <img src="{{ asset('assets/images/buyCart.svg') }}" alt="carrinho de compras" class="w-7 h-7 hover:scale-103 transition">
            </button>

            {{-- 1. SE O USUÁRIO NÃO ESTIVER LOGADO (VISITANTE) --}}
            @guest
            <div class="flex flex-row gap-2 items-center text-white text-sm">
                <img src="{{ asset('assets/images/personCircle.svg') }}" alt="perfil" class="w-6 h-6">
                <div class="flex flex-col text-left">
                    <span class="text-sm text-gray-300">Bem-Vindo :)</span>
                    <a href="{{ route('login') }}" class=" text-sm font-bold hover:underline">Entre ou Cadastre-se</a>
                </div>
            </div>
            @endguest

            {{-- 2. SE O USUÁRIO ESTIVER LOGADO --}}
            @auth
            <div class="relative group">
                <button class="flex flex-row gap-1 items-center justify-center text-white cursor-pointer">
                    <img src="{{ asset('assets/images/personCircle.svg') }}" alt="perfil" class="w-5 h-5">
                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                    <img src="{{ asset('assets/images/arrowDown.svg') }}" alt="seta" class="w-4 h-4">
                </button>

                <!-- Exemplo de menu dropdown (opcional) ao passar o mouse/clicar -->
                <div class="absolute right-0 hidden group-hover:block bg-white text-black rounded-lg shadow-lg mt-2 w-48 py-2 z-50">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Meus Pedidos</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Meu Perfil</a>
                    <hr class="my-1">
                    <!-- Form de Logout obrigatório no Laravel (via POST por segurança) -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</header>