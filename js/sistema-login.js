document.addEventListener('DOMContentLoaded', function () {

    // --------- Sistema de Tabs ---------
    const tabPaciente = document.getElementById('paciente-tab');
    const tabFuncionario = document.getElementById('funcionario-tab');
    const painelPaciente = document.getElementById('paciente-pane');
    const painelFuncionario = document.getElementById('funcionario-pane');

    // Verificação de elementos obrigatórios
    if (!tabPaciente || !tabFuncionario || !painelPaciente || !painelFuncionario) {
        console.error('Erro: Elementos das tabs não encontrados no DOM');
        return;
    }

    /**
     * Ativa a tab do paciente
     */
    function ativarTabPaciente() {
        // Remove classes ativas da tab funcionário
        tabFuncionario.classList.remove('active');
        painelFuncionario.classList.remove('show', 'active');

        // Adiciona classes ativas na tab paciente
        tabPaciente.classList.add('active');
        painelPaciente.classList.add('show', 'active');

        // Atualiza atributos de acessibilidade
        tabPaciente.setAttribute('aria-selected', 'true');
        tabFuncionario.setAttribute('aria-selected', 'false');

        // Foca no primeiro input do formulário de paciente
        focusPrimeiroInput(painelPaciente);
    }

    /**
     * Ativa a tab do funcionário
     */
    function ativarTabFuncionario() {
        // Remove classes ativas da tab paciente
        tabPaciente.classList.remove('active');
        painelPaciente.classList.remove('show', 'active');

        // Adiciona classes ativas na tab funcionário
        tabFuncionario.classList.add('active');
        painelFuncionario.classList.add('show', 'active');

        // Atualiza atributos de acessibilidade
        tabFuncionario.setAttribute('aria-selected', 'true');
        tabPaciente.setAttribute('aria-selected', 'false');

        // Foca no primeiro input do formulário de funcionário
        focusPrimeiroInput(painelFuncionario);
    }

    /**
     * Foca no primeiro input visível do painel
     * @param {HTMLElement} painel - Elemento do painel
     */
    function focusPrimeiroInput(painel) {
        const primeiroInput = painel.querySelector('input:not([type="hidden"])');
        if (primeiroInput) {
            setTimeout(() => primeiroInput.focus(), 100);
        }
    }

    // Event listeners das tabs
    tabPaciente.addEventListener('click', function (e) {
        e.preventDefault();
        ativarTabPaciente();
    });

    tabFuncionario.addEventListener('click', function (e) {
        e.preventDefault();
        ativarTabFuncionario();
    });

    // Navegação por teclado
    tabPaciente.addEventListener('keydown', handleKeyboardNavigation);
    tabFuncionario.addEventListener('keydown', handleKeyboardNavigation);

    // Estado inicial: paciente ativo
    ativarTabPaciente();

    // --------- Sistema de Login ---------
    const formPaciente = document.getElementById('loginPacienteForm');
    const formFuncionario = document.getElementById('loginFuncionarioForm');

    /**
     * Simula loading e redireciona para dashboard
     * @param {string} url - URL de destino
     * @param {HTMLElement} form - Formulário que foi submetido
     */
    function redirecionarComLoading(url, form) {
        // Adiciona classe de loading ao botão submit
        const submitBtn = form.querySelector('input[type="submit"], button[type="submit"]');
        if (submitBtn) {
            const textoOriginal = submitBtn.value || submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.value = 'Entrando...';
            submitBtn.textContent = 'Entrando...';

            // Restaura estado original se algo der errado
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.value = textoOriginal;
                submitBtn.textContent = textoOriginal;
            }, 3000);
        }

        // Redireciona após pequeno delay para melhor UX
        setTimeout(() => {
            try {
                window.location.href = url;
            } catch (error) {
                console.error('Erro ao redirecionar:', error);
                alert('Erro ao fazer login. Tente novamente.');
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.value = textoOriginal;
                    submitBtn.textContent = textoOriginal;
                }
            }
        }, 800);
    }

    // Event listener para login de paciente
    if (formPaciente) {
        formPaciente.addEventListener('submit', function (e) {
            e.preventDefault();
            redirecionarComLoading("/restrito/dashboard-paciente.html", this);
        });
    }

    // Event listener para login de funcionário
    if (formFuncionario) {
        formFuncionario.addEventListener('submit', function (e) {
            e.preventDefault();
            redirecionarComLoading("/restrito/dashboard-funcionarios.html", this);
        });
    }

    // --------- Botão Criar Conta de Paciente ---------
    const btnCriarConta = document.querySelector('a[href="/restrito/cadastro-pacientes.html"]');

    if (btnCriarConta) {
        btnCriarConta.addEventListener('click', function (e) {
            e.preventDefault();

            // Adiciona efeito visual de loading
            const textoOriginal = this.textContent;
            this.style.pointerEvents = 'none';
            this.textContent = 'Redirecionando...';
            this.classList.add('disabled');

            // Redireciona para página de cadastro
            setTimeout(() => {
                try {
                    window.location.href = "/restrito/cadastro-pacientes.html";
                } catch (error) {
                    console.error('Erro ao redirecionar para cadastro:', error);
                    alert('Erro ao abrir página de cadastro. Tente novamente.');

                    // Restaura botão em caso de erro
                    this.style.pointerEvents = 'auto';
                    this.textContent = textoOriginal;
                    this.classList.remove('disabled');
                }
            }, 300);
        });
    } else {
        console.warn('Botão "Criar Conta de Paciente" não encontrado no DOM');
    }
});
