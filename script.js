document.addEventListener('DOMContentLoaded', () => {
    const botonesAgregar = document.querySelectorAll('.agregar.carrito');
    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', agregarAlCarrito);
    });

    const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);

    cargarCarritoDeLocalStorage();
}); 

function actualizarContadorCarrito() {
    const productosEnCarrito = document.querySelectorAll('#lista-carrito tbody tr').length;
    const contadorCarrito = document.getElementById('contador-carrito');
    contadorCarrito.textContent = productosEnCarrito;
}

function agregarAlCarrito(event) {
    event.preventDefault();
    const boton = event.target;
    const producto = boton.closest('.product');
    const imagen = producto.querySelector('img').src;
    const productoInfo = {
        id: boton.getAttribute('data-id'),
        imagen: imagen,
        nombre: producto.querySelector('h3').textContent,
        precio: producto.querySelector('.precio').textContent
    };
    insertarCarrito(productoInfo, true);
    guardarCarritoEnLocalStorage();
}

function insertarCarrito(producto, mostrarPopupFlag) {
    const carrito = document.querySelector('#lista-carrito tbody');
    const row = document.createElement('tr');

    row.innerHTML = `
        <td><img src="${producto.imagen}" width="50" height="50"></td>
        <td>${producto.nombre}</td>
        <td>${producto.precio}</td>
        <td><a href="#" class="borrar-producto" data-id="${producto.id}">X</a></td>
    `;

    const botonEliminar = row.querySelector('.borrar-producto');
    botonEliminar.addEventListener('click', eliminarProducto);

    carrito.appendChild(row);
    if (mostrarPopupFlag) {
        mostrarPopup();
    }
    actualizarContadorCarrito();
    scrollHaciaCarrito();
}

function scrollHaciaCarrito() {
    setTimeout(() => {
        const carrito = document.getElementById('img-carrito');
        carrito.scrollIntoView({ behavior: 'smooth' });
    }, 100);
}

function vaciarCarrito(event) {
    event.preventDefault();
    const carrito = document.querySelector('#lista-carrito tbody');
    while (carrito.firstChild) {
        carrito.removeChild(carrito.firstChild);
    }
    actualizarContadorCarrito();
    guardarCarritoEnLocalStorage();
}

function eliminarProducto(event) {
    event.preventDefault();
    const boton = event.target;
    boton.closest('tr').remove();
    actualizarContadorCarrito();
    guardarCarritoEnLocalStorage();
}

function mostrarPopup() {
    const popupContenedor = document.getElementById('popup-contenedor');
    popupContenedor.classList.add('popup-visible');

    setTimeout(() => {
        popupContenedor.classList.remove('popup-visible');
    }, 2000);
}

function guardarCarritoEnLocalStorage() {
    const productosEnCarrito = [];
    document.querySelectorAll('#lista-carrito tbody tr').forEach(row => {
        const producto = {
            id: row.querySelector('.borrar-producto').getAttribute('data-id'),
            imagen: row.querySelector('img').src,
            nombre: row.cells[1].textContent,
            precio: row.cells[2].textContent
        };
        productosEnCarrito.push(producto);
    });
    localStorage.setItem('carrito', JSON.stringify(productosEnCarrito));
}

function cargarCarritoDeLocalStorage() {
    if (localStorage.getItem('carrito')) {
        const productos = JSON.parse(localStorage.getItem('carrito'));
        productos.forEach(producto => {
            insertarCarrito(producto, false);
        });
    }
}
