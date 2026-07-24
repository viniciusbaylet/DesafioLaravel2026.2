<x-layout>
    <main class="w-full min-h-screen flex items-center justify-center bg-[#0D1B2A] p-14">
        <div class="bg-white px-5 py-10 rounded-2xl flex flex-col gap-10 w-118">
            <a href="{{ route('home') }}" class="cursor-pointer">
                <x-logo class="text-[#0D1B2A]" />
            </a>
            <div class="flex flex-col gap-5">
                <h2 class="font-semibold text-[#0D1B2A] text-xl">Cadastre sua conta</h2>
                <form action="{{ route('register') }}" method="post" class="flex flex-col gap-2.5">
                    @csrf
                    <x-inputContainer label="Nome *" type="text" name="name" placeholder="Seu nome completo..." />
                    <x-inputContainer label="Email *" type="email" name="email" placeholder="Seu e-mail..." />
                    <x-inputContainer label="Senha *" type="password" name="password" placeholder="Sua senha..." />
                    <x-inputContainer label="Confirmar senha *" type="password" name="confirm password" placeholder="Sua senha novamente..." />
                    <div class="flex gap-2">
                        <x-inputContainer id="cep" label="CEP *" type="text" name="cep" placeholder="Seu CEP..." require />
                        <x-inputContainer id="street" label="Logradouro *" type="text" name="street" placeholder="Seu logradouro..." />
                    </div>
                    <div class="flex gap-2">
                        <x-inputContainer id="neighborhood" label="Bairro *" type="text" name="neighborhood" placeholder="Seu bairro..."  />
                        <x-inputContainer id="city" label="Cidade *" type="text" name="city" placeholder="Sua cidade..."  />
                    </div>
                    <div class="flex gap-2">
                        <x-inputContainer id="state" label="Estado *" type="text" name="state" placeholder="Seu estado..."  />
                        <x-inputContainer id="number" label="Número *" type="text" name="number" placeholder="Seu número..."  />
                    </div>
                    <x-inputContainer label="Complemento" type="text" name="complement" placeholder="Complemento..." />
                    <x-inputContainer label="Telefone *" type="tel" name="phone" placeholder="(00) 00000-0000" maxlength="15" oninput="this.value = this.value.replace(/\D/g, '').replace(/^(\d{2})(\d)/g, '($1) $2').replace(/(\d{5})(\d)/, '$1-$2').replace(/(-\d{4})\d+?$/, '$1')"  />
                    <x-inputContainer label="Data de nascimento *" type="date" name="date" placeholder="Sua data de nascimento..."  />
                    <x-inputContainer label="CPF *" type="text" name="CPF" placeholder="000.000.000-00" maxlength="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" oninput="this.value = this.value.replace(/\D/g, '').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d{1,2})$/, '$1-$2')"  />
                    <x-inputContainer label="Saldo *" type="text" name="balance" placeholder="Seu saldo..."  />
                    <x-button type="submit" class="mt-4">Cadastrar</x-button>
                </form>
                <div class="text-sm text-[#0D1B2A]">
                    Já possui uma conta? <a href="{{ route('login') }}" class="font-semibold hover:underline">Entrar</a>
                </div>
            </div>
        </div>
    </main>

    @vite(['resources/js/via-cep.js'])
</x-layout>