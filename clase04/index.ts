window.onload = () => {
  const botonSubmit = <HTMLInputElement>document.getElementById('btnEnviar');
  
  botonSubmit.onclick = () => {
    const cboAccion = <HTMLSelectElement>document.getElementById('cboAccion');
    const form = <HTMLFormElement>document.getElementById('frm');
    const action = '../clase03/ejercicios/nexo_poo.php';
    let method = "post";

    if (cboAccion.value == "listar" || cboAccion.value == "verificar") {
      method = "get";
    }

    form.method = method;
    form.action = action;
    form.submit();
  }
}



