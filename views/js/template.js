$(document).ready(function(){
    // DataTables
    $("#example2").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "sProcessing":      "Procesando...",
            "sLengthMenu":      "Mostrar _MENU_ registros",
            "sZeroRecords":     "No se encontraron rsultados",
            "sEmptyTable":      "Ningún datos disponible en esta tabla",
            "sInfo":            "Mostrando registros de _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":       "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":    "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":     "",
            "sSearch":          "Buscar:",
            "sUrl":             "",
            "sInfoThousands":   ",",
            "sLoadingRecords":  "Cargando...",
            "oPaginate":  {
                "sFirst":   "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious":"Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente",
            }
        }
    });

});