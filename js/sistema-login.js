document.addEventListener('DOMContentLoaded', function () {
    const tabPaciente = document.getElementById('paciente-tab');
    const tabFuncionario = document.getElementById('funcionario-tab');
    const painelPaciente = document.getElementById('paciente-pane');
    const painelFuncionario = document.getElementById('funcionario-pane');

    if (!tabPaciente || !tabFuncionario || !painelPaciente || !painelFuncionario) {
        console.error('Erro: Elementos das tabs não encontrados no DOM');
        return;
    }

    function ativarTabPaciente() {
        tabFuncionario.classList.remove('active');
        painelFuncionario.classList.remove('show', 'active');

        tabPaciente.classList.add('active');
        painelPaciente.classList.add('show', 'active');

        tabPaciente.setAttribute('aria-selected', 'true');
        tabFuncionario.setAttribute('aria-selected', 'false');

        focusPrimeiroInput(painelPaciente);
    }

    function ativarTabFuncionario() {
        tabPaciente.classList.remove('active');
        painelPaciente.classList.remove('show', 'active');

        tabFuncionario.classList.add('active');
        painelFuncionario.classList.add('show', 'active');

        tabFuncionario.setAttribute('aria-selected', 'true');
        tabPaciente.setAttribute('aria-selected', 'false');

        focusPrimeiroInput(painelFuncionario);
    }

    /**
     * @param {HTMLElement} painel 
     */
    function focusPrimeiroInput(painel) {
        const primeiroInput = painel.querySelector('input:not([type="hidden"])');
        if (primeiroInput) {
            setTimeout(() => primeiroInput.focus(), 100);
        }
    }

    /**
     * @param {KeyboardEvent} e
     */
    function handleKeyboardNavigation(e) {
        if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
            e.preventDefault();
            const isTabPacienteActive = tabPaciente.classList.contains('active');

            if (e.key === 'ArrowLeft' && !isTabPacienteActive) {
                ativarTabPaciente();
                tabPaciente.focus();
            } else if (e.key === 'ArrowRight' && isTabPacienteActive) {
                ativarTabFuncionario();
                tabFuncionario.focus();
            }
        }
    }

    tabPaciente.addEventListener('click', function (e) {
        e.preventDefault();
        ativarTabPaciente();
    });

    tabFuncionario.addEventListener('click', function (e) {
        e.preventDefault();
        ativarTabFuncionario();
    });

    tabPaciente.addEventListener('keydown', handleKeyboardNavigation);
    tabFuncionario.addEventListener('keydown', handleKeyboardNavigation);

    ativarTabPaciente();

    const formPaciente = document.getElementById('loginPacienteForm');
    const formFuncionario = document.getElementById('loginFuncionarioForm');

    /**
     * @param {string} url
     * @param {HTMLElement} form
     */
    function redirecionarComLoading(url, form) {
        const submitBtn = form.querySelector('input[type="submit"], button[type="submit"]');
        if (submitBtn) {
            const textoOriginal = submitBtn.value || submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.value = 'Entrando...';
            submitBtn.textContent = 'Entrando...';

            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.value = textoOriginal;
                submitBtn.textContent = textoOriginal;
            }, 3000);
        }

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

    if (formPaciente) {
        formPaciente.addEventListener('submit', function (e) {
            e.preventDefault();
            redirecionarComLoading("/restrito/dashboard-paciente.html", this);
        });
    }

    if (formFuncionario) {
        formFuncionario.addEventListener('submit', function (e) {
            e.preventDefault();
            redirecionarComLoading("/restrito/dashboard-funcionarios.html", this);
        });
    }

    const btnCriarConta = document.querySelector('a[href="/restrito/cadastro-pacientes.html"]');

    if (btnCriarConta) {
        btnCriarConta.addEventListener('click', function (e) {
            e.preventDefault();

            const textoOriginal = this.textContent;
            this.style.pointerEvents = 'none';
            this.textContent = 'Redirecionando...';
            this.classList.add('disabled');

            setTimeout(() => {
                try {
                    window.location.href = "/restrito/cadastro-pacientes.html";
                } catch (error) {
                    console.error('Erro ao redirecionar para cadastro:', error);
                    alert('Erro ao abrir página de cadastro. Tente novamente.');

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
