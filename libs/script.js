document.addEventListener("keyup", e => {
    if (e.target.matches("#buscador")) {
        console.log(e.target.value);

        if (e.key === "Escape") e.target.value = ""

        document.querySelectorAll(".articulo").forEach(prod => {
            prod.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                ? prod.classList.remove("filtro")
                : prod.classList.add("filtro")
        })
    }

});

//MODALES PARA TABLA CLIENTES 
function nuevoCliente() {
    var modal = new bootstrap.Modal(document.getElementById('modalNuevoCliente'));
    modal.show();
}

function confirmarEliminarCliente(id) {
    var modal = new bootstrap.Modal(document.getElementById('modalEliminar'));
    modal.show();

    document.getElementById('btnConfirmarEliminar').addEventListener('click', function () {
        window.location.href = 'controladores/controlador-eliminar.php?id=' + id + '&tabla=clientes&pkey=id_cliente&opc=2';
    });

}

function editarCliente(id) {
    $.ajax({
        url: 'controladores/controlador-obtener-cliente.php',
        type: 'GET',
        data: {
            id: id
        },
        success: function (response) {

            var elementos = response.replace(/[\[\]]/g, '').split(',');

            elementos = elementos.map(function (elemento) {
                return elemento.replace(/"/g, '');
            });

            var Id = elementos[0];
            var nombre = elementos[1];
            var apellidos = elementos[2];
            var direccion = elementos[3];
            var telefono = elementos[4];

            console.log('respuesta sin separar: ', response);
            console.log("Id:", Id);
            console.log("Nombre:", nombre);
            console.log("Apellidos:", apellidos);
            console.log("Direccion:", direccion);
            console.log("Telefono:", telefono);


            $('#idEditar').val(Id);
            $('#nombreEditar').val(nombre);
            $('#apellidosEditar').val(apellidos);
            $('#direccionEditar').val(direccion);
            $('#telefonoEditar').val(telefono);

            var modal = new bootstrap.Modal(document.getElementById('modalEditarCliente'));
            modal.show();
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}
//MODALES PARA TABLA CLIENTES 


//MODALES PARA TABLA PRODUCTOS
function nuevoProducto() {
    var modal = new bootstrap.Modal(document.getElementById('modalNuevoProducto'));
    modal.show();
}

function editarProducto(id) {
    $.ajax({
        url: 'controladores/controlador-obtener-producto.php',
        type: 'GET',
        data: {
            id: id
        },
        success: function (response) {

            var elementos = response.replace(/[\[\]]/g, '').split(',');

            elementos = elementos.map(function (elemento) {
                return elemento.replace(/"/g, '');
            });

            var codigo = elementos[0];
            var producto = elementos[1];
            var descripcion = elementos[2];
            var precio = elementos[3];
            var stock = elementos[4];
            var costo = elementos[5];

            console.log('respuesta sin separar: ', response);
            console.log("codigo:", codigo);
            console.log("producto:", producto);
            console.log("descripcion:", descripcion);
            console.log("stock:", stock);
            console.log("precio:", precio);
            console.log("costo:", costo);


            $('#codigoEditar').val(codigo);
            $('#productoEditar').val(producto);
            $('#descripcionEditar').val(descripcion);
            $('#stockEditar').val(stock);
            $('#precioEditar').val(precio);
            $('#costoEditar').val(costo);

            var modal = new bootstrap.Modal(document.getElementById('modalEditarProducto'));
            modal.show();
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function confirmarEliminarProducto(id) {
    var modal = new bootstrap.Modal(document.getElementById('modalEliminarProd'));
    modal.show();

    document.getElementById('btnConfirmarEliminar').addEventListener('click', function () {
        window.location.href = 'controladores/controlador-eliminar.php?id=' + id + '&tabla=productos&pkey=codigo&opc=1';
    });

}
//MODALES PARA TABLA PRODUCTOS

//MODALES PARA TABLA USUARIOS
function nuevoUsuario() {
    var modal = new bootstrap.Modal(document.getElementById('modalNuevoUsuario'));
    modal.show();
}

function confirmarEliminarUsuario(id) {
    var modal = new bootstrap.Modal(document.getElementById('modalEliminarUsuario'));
    modal.show();

    document.getElementById('btnConfirmarEliminar').addEventListener('click', function () {
        window.location.href = 'controladores/controlador-eliminar.php?id=' + id + '&tabla=usuarios&pkey=id_usuario&opc=4';
    });

}

function editarUsuario(id) {
    $.ajax({
        url: 'controladores/controlador-obtener-usuario.php',
        type: 'GET',
        data: {
            id: id
        },
        success: function (response) {

            var elementos = response.replace(/[\[\]]/g, '').split(',');

            elementos = elementos.map(function (elemento) {
                return elemento.replace(/"/g, '');
            });

            var id = elementos[0];
            var usuario = elementos[1];
            var password = elementos[2];

            console.log('respuesta sin separar: ', response);
            console.log("codigo:", id);
            console.log("usuario:", usuario);
            console.log("contra:", password);

            $('#idEditar').val(id);
            $('#usuarioEditar').val(usuario);
            $('#passwordEditar').val(password);

            var modal = new bootstrap.Modal(document.getElementById('modalEditarUsuario'));
            modal.show();
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}
//MODALES PARA TABLA USUARIOS

//reporte de ventas ver detalles
function mostrarProductos(id_venta) {
    console.log("id_venta: ", id_venta);

    $.ajax({
        type: 'GET',
        url: 'controladores/obtener_productos.php',
        data: {
            id_venta: id_venta
        },
        dataType: 'json',
        success: function (response) {
            console.log("Detalles de productos obtenidos correctamente:");
            console.log(response);

            // Construir filas HTML para los productos
            var costoTotal = 0;

            var productos_html = '<div class="card-body">';
            productos_html += '<h4 class="card-title">#' + id_venta + '</h4>';
            productos_html += '<div class="table-responsive">';
            productos_html += '<table class="table table-striped">';
            productos_html += '<thead>';
            productos_html += '<tr>';
            productos_html += '<th>Producto</th>';
            productos_html += '<th>Descripción</th>';
            productos_html += '<th>Cantidad</th>';
            productos_html += '<th>Precio</th>';
            productos_html += '<th>Costo</th>';
            productos_html += '</tr>';
            productos_html += '</thead>';
            productos_html += '<tbody>';
            $.each(response, function (index, producto) {
                productos_html += '<tr>';
                productos_html += '<td>' + producto.producto + '</td>';
                productos_html += '<td>' + producto.descripcion + '</td>';
                productos_html += '<td>' + producto.cantidad + '</td>';
                productos_html += '<td>' + producto.precio + '</td>';
                productos_html += '<td>' + producto.costo + '</td>';
                costoTotal += parseFloat(producto.costo);
                productos_html += '</tr>';
            });
            productos_html += '</tbody>';
            productos_html += '</table>';
            productos_html += '</div>';
            productos_html += '</div>';


            // Agregar la tabla de productos al div con id "prueba"
            $('#prueba').html(productos_html);

            // Hacer scroll hacia arriba más rápido
            $('html, body').animate({ scrollTop: 0 }, 500); // Cambia 500 por el valor deseado en milisegundos

            // Obtener los datos de la venta seleccionada y mostrarlos en el div "prueba2"
            var fila = $('button[data-id="' + id_venta + '"]').closest('tr');
            var datos_venta = {
                id_venta: fila.find('td:eq(0)').text(),
                fecha: fila.find('td:eq(1)').text(),
                cliente: fila.find('td:eq(2)').text(),
                total: fila.find('td:eq(3)').text()
            };

            var ganancia = parseFloat(datos_venta.total) - costoTotal;
            var venta_html = '<div class="card">';
            venta_html += '<div class="card-body">';
            venta_html += '<h4 class="card-title">Datos de la venta</h4>';
            venta_html += '<ul class="list-group list-group-flush">';
            venta_html += '<li class="list-group-item">ID de Venta: <span class="text-primary">' + datos_venta.id_venta + '</span></li>';
            venta_html += '<li class="list-group-item">Fecha: <span class="text-primary">' + datos_venta.fecha + '</span></li>';
            venta_html += '<li class="list-group-item">Cliente: <span class="text-primary">' + datos_venta.cliente + '</span></li>';
            venta_html += '<li class="list-group-item">Total: <span class="text-primary">' + datos_venta.total + '</span></li>';
            venta_html += '<li class="list-group-item">Costo: <span class="text-primary">' + costoTotal + '</span></li>';
            venta_html += '<li class="list-group-item">Ganancia: <span class="text-primary">' + ganancia + '</span></li>';
            venta_html += '</ul>';
            venta_html += '</div>';
            venta_html += '</div>';

            // Agregar los datos de la venta al div con id "prueba2"
            $('#prueba2').html(venta_html);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}



