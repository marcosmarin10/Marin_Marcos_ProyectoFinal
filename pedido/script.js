document.addEventListener('DOMContentLoaded', () => {
    cargarProductosDeLocalStorage();

    const botonPedido = document.getElementById('realizar-pedido');
    botonPedido.addEventListener('click', realizarPedido);
});

function cargarProductosDeLocalStorage() {
    const listaProductos = document.getElementById('lista-productos');
    listaProductos.innerHTML = '';

    let total = 0;

    if (localStorage.getItem('carrito')) {
        const productos = JSON.parse(localStorage.getItem('carrito'));
        productos.forEach(producto => {
            const precio = parseFloat(producto.precio.replace(/[^0-9.-]+/g,""));
            total += precio;

            const div = document.createElement('div');
            div.className = 'producto-carrito';
            div.innerHTML = `
                <img src="${producto.imagen}" alt="${producto.nombre}" width="100">
                <p>${producto.nombre}</p>
                <p>Precio: ${producto.precio}</p>
            `;
            listaProductos.appendChild(div);
        });
    }

    mostrarTotal(total);
}

function mostrarTotal(total) {
    const totalDiv = document.getElementById('total');
    totalDiv.textContent = `Total: ${total}€`;
}

function realizarPedido() {
    localStorage.removeItem('carrito');
    const listaProductos = document.getElementById('lista-productos');
    listaProductos.innerHTML = '';
    document.getElementById('mensaje-agradecimiento').style.display = 'block';
    document.getElementById('total').textContent = '';
}
