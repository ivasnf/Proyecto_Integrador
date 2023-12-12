const contenedorQR = document.getElementById('contenedorQR');
const formulario = document.getElementById('formulario1');

const QR = new QRCode(contenedorQR);

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
    QR.makeCode(formulario.nombre.value, formulario.ap.value, formulario.am.value, formulario.curp.value, formulario.telefono.value);
})