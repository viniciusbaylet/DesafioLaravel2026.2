<x-layout>
    <main class="w-full min-h-screen flex items-center justify-center bg-[#0D1B2A]">
        <div class="bg-white px-5 py-10 rounded-2xl flex flex-col gap-10 w-118">
            <a href="{{ route('home') }}" class="cursor-pointer hover:scale-103 transition">
                <x-logo class="text-[#0D1B2A]" />
            </a>
            <div class="flex flex-col gap-5">
                <h2 class="font-semibold text-[#0D1B2A] text-xl">Acesse sua conta</h2>
                <form action="" method="post" class="flex flex-col gap-2.5">
                    @csrf
                    <x-inputContainer label="Email *" type="email" name="email" placeholder="Seu e-mail..." required />
                    <x-inputContainer label="Senha *" type="password" name="password" placeholder="Sua senha..." required />
                    <div class="flex w-full items-center justify-end">
                        <a href="{{ route('password.request') }}" class="text-sm text-[#0D1B2A] hover:underline">Esqueci minha senha</a>
                    </div>
                    <x-button type="submit">Entrar</x-button>
                </form>
                <div class="text-sm text-[#0D1B2A]">
                    Não tem uma conta? <a href="{{ route('register') }}" class="font-semibold hover:underline">Cadastre-se</a>
                </div>
            </div>
        </div>
    </main>
</x-layout>