// import './bootstrap';
import $ from 'jquery';
import "datatables.net-dt";
// import "datatables.net-buttons";
import language from 'datatables.net-plugins/i18n/es-ES.mjs';

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp(){
    dataTable();
}

function dataTable(){
    $('#tablaServicios').DataTable({
        language
    });
    $('#tablaProductos').DataTable({
        scrollY: 400,
        language
    });
}