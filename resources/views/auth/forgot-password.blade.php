<x-layout>
    <main class="w-full min-h-screen flex items-center justify-center bg-[#0D1B2A]">
        <div class="bg-white px-5 py-10 rounded-2xl flex flex-col gap-10 w-118">
            <a href="{{ route('home') }}" class="cursor-pointer">
                <x-logo class="text-[#0D1B2A]" />
            </a>
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <h2 class="font-semibold text-[#0D1B2A] text-xl">Recupere sua senha</h2>
                    <p class="text-sm text-[#0D1B2A]">Digite seu email que enviaremos um link de recuperação de senha para ele.</p>
                </div>
                <form action="{{ route('password.email') }}" method="post" class="flex flex-col gap-2.5">
                    @csrf
                    <x-inputContainer label="Email *" type="email" name="email" placeholder="Seu e-mail..." :value="old('email')" required />
                    <x-button type="submit" class="mt-3.5">Enviar</x-button>
                </form>
                <a href="{{ route('login') }}" class="text-sm text-[#0D1B2A] hover:underline flex w-full justify-center items-center gap-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
    </main>
</x-layout>