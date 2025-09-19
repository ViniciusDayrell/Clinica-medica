// Sempre que o <select id="cargo"> muda:
// Se o valor for "medico", mostra os campos de especialidade e CRM (style.display = 'block').
// Caso contrário, esconde (style.display = 'none').

document.getElementById('cargo').onchange = function () {
    var medicoCampos = document.getElementById('medicoCampos');
    if (this.value === 'medico') {
        medicoCampos.style.display = 'block';
    } else {
        medicoCampos.style.display = 'none';
    }
};
