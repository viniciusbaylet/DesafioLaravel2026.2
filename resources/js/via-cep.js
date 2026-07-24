document.addEventListener('DOMContentLoaded', () => {
    const cepInput = document.getElementById('cep');
    const streetInput = document.getElementById('street');
    const neighborhoodInput = document.getElementById('neighborhood');
    const cityInput = document.getElementById('city');
    const stateInput = document.getElementById('state');
    const numberInput = document.getElementById('number');

    // Função para limpar os campos (da lógica oficial do ViaCEP)
    function clearAddressFields() {
        if (streetInput) streetInput.value = '';
        if (neighborhoodInput) neighborhoodInput.value = '';
        if (cityInput) cityInput.value = '';
        if (stateInput) stateInput.value = '';
    }

    // Função para mostrar que está carregando (da lógica oficial do ViaCEP)
    function setLoadingState() {
        if (streetInput) streetInput.value = '...';
        if (neighborhoodInput) neighborhoodInput.value = '...';
        if (cityInput) cityInput.value = '...';
        if (stateInput) stateInput.value = '...';
    }

    if (cepInput) {
        cepInput.addEventListener('input', (e) => {
            // 1. Aplica a máscara visual (00000-000)
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 5) {
                value = value.replace(/^(\d{5})(\d)/, '$1-$2');
            }
            e.target.value = value;

            const cleanCep = value.replace(/\D/g, '');

            // 2. Se o usuário apagar o CEP ou diminuir os dígitos, limpa os campos
            if (cleanCep.length < 8) {
                clearAddressFields();
                return;
            }

            // 3. Quando atinge exatamente 8 dígitos válidos
            if (cleanCep.length === 8) {
                setLoadingState(); // Mostra "..." nos campos

                fetch(`/api/cep/${cleanCep}`)
                    .then(response => {
                        if (!response.ok) throw new Error('Erro na requisição');
                        return response.json();
                    })
                    .then(data => {
                        // O ViaCEP pode retornar 200 OK mas com a propriedade "erro: true"
                        if (data.erro || data.error) {
                            clearAddressFields();
                            alert('CEP não encontrado.');
                            return;
                        }

                        // Preenche os campos com os dados retornados
                        if (streetInput) streetInput.value = data.logradouro || '';
                        if (neighborhoodInput) neighborhoodInput.value = data.bairro || '';
                        if (cityInput) cityInput.value = data.localidade || '';
                        if (stateInput) stateInput.value = data.uf || '';

                        // Foca no campo de número para agilizar a digitação
                        if (numberInput) numberInput.focus();
                    })
                    .catch(error => {
                        console.error('Erro ao buscar o CEP:', error);
                        clearAddressFields();
                        alert('Não foi possível buscar o CEP. Verifique sua conexão.');
                    });
            }
        });
    }
});