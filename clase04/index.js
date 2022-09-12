window.onload = function () {
    var botonSubmit = document.getElementById('btnEnviar');
    botonSubmit.onclick = function () {
        var cboAccion = document.getElementById('cboAccion');
        var form = document.getElementById('frm');
        var action = '../clase03/ejercicios/nexo_poo.php';
        var method = "post";
        if (cboAccion.value == "listar" || cboAccion.value == "verificar") {
            method = "get";
        }
        form.method = method;
        form.action = action;
        form.submit();
    };
};
