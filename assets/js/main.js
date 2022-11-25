$('#tablaPersonas tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Filtrar.." />' );
} );

$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
    dom: 'Bfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious": "Anterior"
            },
        "sProcessing":"Procesando...",
        },
    "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    "responsive": false,
    "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    "order": [[ 0, "desc" ]],
    "initComplete": function () {
        this.api().columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            });
        })
    }
});
    
$("#btnNuevo").click(function(){
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo usuario");            
    $("#modalCreate").modal("show");        
    id=null;
    opcion = 1; //alta
});

var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    usuario = fila.find('td:eq(1)').text();
    telefono = fila.find('td:eq(2)').text();
    email = fila.find('td:eq(3)').text();
    rol = fila.find('td:eq(4)').text();

    console.log(id, usuario, telefono, email, rol);
    $("#id").val(id);
    $("#usuario").val(usuario);
    $("#telefono").val(telefono);
    $("#email").val(email);
    $("#rol").val(rol);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar usuario");            
    $("#modalUpdate").modal("show");  
});

$(document).on("click", ".btnEditarColonia", function(){
    console.log("Editar colonia", id);
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    cp = fila.find('td:eq(2)').text();
    municipio = fila.find('td:eq(3)').text();
    estado = fila.find('td:eq(4)').text();
    
    console.log(id, nombre, cp, municipio, estado);
    $("#id").val(id);
    $("#nombre").val(nombre);
    $("#cp").val(cp);
    $("#municipio").val(municipio);
    $("#estado").val(estado);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar usuario");            
    $("#modalUpdate").modal("show");  
});

$(document).on("click", ".btnEditarVivienda", function(){
    console.log("Editar colonia", id);
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    direccion = fila.find('td:eq(1)').text();
    cuartos = fila.find('td:eq(2)').text();
    banos = fila.find('td:eq(3)').text();
    agua = fila.find('td:eq(4)').text();
    luz = fila.find('td:eq(5)').text();
    internet = fila.find('td:eq(6)').text();
    televisores = fila.find('td:eq(7)').text();
    techo = fila.find('td:eq(8)').text();
    piso = fila.find('td:eq(9)').text();
    tipo = fila.find('td:eq(10)').text();
    extension = fila.find('td:eq(11)').text();
    habitantes = fila.find('td:eq(12)').text();
    jardin = fila.find('td:eq(13)').text();

    //console.log(id, nombre, cp, municipio, estado);
    $("#id").val(id);
    $("#direccion").val(direccion);
    $("#cuartos").val(cuartos);
    $("#banos").val(banos);
    $("#agua").val(agua);
    $("#luz").val(luz);
    $("#internet").val(internet);
    $("#televisores").val(televisores);
    $("#techo").val(techo);
    $("#piso").val(piso);
    $("#extension").val(extension);
    $("#habitantes").val(habitantes);
    $("#jardin").val(jardin);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar usuario");            
    $("#modalUpdate").modal("show");  
});
    
});