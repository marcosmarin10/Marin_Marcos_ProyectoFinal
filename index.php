<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "abfinal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div id="popup-contenedor" class="popup-oculto">
        <div id="popup">
            <img src="./images/tick.png" class="tick-producto" alt="">
            Producto añadido al carrito
        </div>
    </div>
    <header class="header">
        <div class="header-top-border">
            <div class="menu container">
                <a href="./" class="logo">MAMBA</a>
                <input type="checkbox" id="menu" />
                <label for="menu">
                    <img src="images/menu.png" class="menu-icono" alt="menu" />
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li class="dropdown-li">
                            Productos
                            <ul class="dropdown">
                                <li class="dropdowns"><a class="dropdowns-link" href="./camisetas/">Camisetas</a></li>
                                <li class="dropdowns"><a class="dropdowns-link" href="./zapatillas/">Zapatillas</a></li>
                                <li class="dropdowns"><a class="dropdowns-link" href="./accesorios/">Accesorios</a></li>
                            </ul>
                        </li>
                        <li><a href="./contacto/">Contacto</a></li>

                    </ul>
                </nav>
                <div>
                    <ul>
                        <li class="submenu">
                            <span id="contador-carrito" class="contador-carrito">0</span>
                            <img src="images/car.svg" id="img-carrito" alt="carrito">
                            <div id="carrito">
                                <table id="lista-carrito">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a href="#" id="vaciar-carrito" class="btn-2">Vaciar Carrito</a>
                                <a href="./pedido/" class="btn-2">Realizar Pedido</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-content container">
            <div class="header-img">
                <img src="images/stars img.png" alt="">
            </div>
    </header>
    <div class="header-txt">
        <h1>Ofertas estelares</h1>
        <p>Consigue tu prenda favorita al mejor precio</p>
    </div>
    </div>

    <section class="ofert container">
        <?php
            $sql = "SELECT id, nombre, imagen, precio, precio_oferta FROM productos WHERE precio_oferta IS NOT NULL";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<a href='./producto/?id={$row["id"]}' class='ofert-1'>
                            <div class='ofert-img'>
                                <img src='./images/{$row["imagen"]}' alt='{$row["nombre"]}' />
                            </div>
                            <div class='ofert-txt'>
                                <h3>{$row["nombre"]}</h3>
                                <p class='precio-normal'>{$row["precio"]}€</p>
                                <p class='precio-oferta'>{$row["precio_oferta"]}€</p>
                                <div class='btn-2'>Agregar al carrito</div>
                            </div>
                        </a>";
                }
            } else {
                echo "<p>No hay productos en oferta en este momento :(</p>";
            }
        ?>
    </section>

    <main class="products container" id="lista-1">
        <h2>Productos</h2>
        <div class="product-content">
        <?php
            $sql = "SELECT id, nombre, imagen, precio, precio_oferta FROM productos WHERE id IN (2, 4, 10, 28, 29, 30, 31, 32, 33)";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<a href='./producto/?id={$row["id"]}'' class='product'>";
                    echo "<img src='./images/{$row["imagen"]}' alt='{$row["nombre"]}' />";
                    echo "<div class='product-txt'>";
                    echo "<h3>{$row["nombre"]}</h3>";
                    echo "<p class='precio'>{$row["precio"]}€</p>";
                    echo "<div class='btn-2'>Agregar al carrito</div>";
                    echo "</div>";
                    echo "</a>";
                }
            }
        ?>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content container">
            <div class="link left-cont-footer">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3050.7135380786135!2d-3.84858142348012!3d40.1263869732587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd41f11f69cacb37%3A0x4117d0b3060252c0!2sAv.%20Castilla%20La%20Mancha%2C%2084%2C%2045200%20Illescas%2C%20Toledo!5e0!3m2!1ses!2ses!4v1705882343044!5m2!1ses!2ses" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="link right-cont-footer">
                <div class="div-cont-footer-btn">
                    <a class="footer-link" href="#">Teléfono: +34 661841131</a>
                    <a class="footer-link" href="#">E-mail: mambastore@gmail.com</a>
                    <a class="footer-link" href="#">¿Dónde nos encontramos? Avenida Castilla-La Mancha 43 Illescas </a>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>