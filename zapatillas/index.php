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
            <img src="/images/tick.png" class="tick-producto" alt="">
            Producto añadido al carrito
        </div>
    </div>

    <header class="header">
        <div class="header-top-border">
            <div class="menu container">
                <a href="../" class="logo">MAMBA</a>
                <input type="checkbox" id="menu" />
                <label for="menu">
                    <img src="../images/menu.png" class="menu-icono" alt="menu" />
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="../">Inicio</a></li>
                        <li class="dropdown-li">
                            Productos
                            <ul class="dropdown">
                                <li class="dropdowns"><a class="dropdowns-link" href="../camisetas/">Camisetas</a></li>
                                <li class="dropdowns"><a class="dropdowns-link" href="./">Zapatillas</a></li>
                                <li class="dropdowns"><a class="dropdowns-link" href="../accesorios/">Accesorios</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="../contacto/">Contacto</a></li>

                    </ul>
                </nav>
                </nav>
                <div>
                    <ul>
                        <li class="submenu">
                            <span id="contador-carrito" class="contador-carrito">0</span>
                            <img src="../images/car.svg" id="img-carrito" alt="carrito">
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
                                <a href="../pedido/" class="btn-2">Realizar Pedido</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <main class="products container" id="lista-1">

        <h2>Zapatillas</h2>

        <div class="product-content">

        <?php
            $sql = "SELECT * FROM productos WHERE categoria = 'zapatilla'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<a href='../producto/?id={$row["id"]}'' class='product'>";
                    echo "<img src='../images/{$row["imagen"]}' alt='{$row["nombre"]}' />";
                    echo "<div class='product-txt'>";
                    echo "<h3>{$row["nombre"]}</h3>";
                    echo "<p class='precio'>{$row["precio"]}€</p>";
                    if ($row["precio_oferta"]) {
                        echo "<p class='precio-oferta'>{$row["precio_oferta"]}€</p>";
                    }    
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

            <div class="link">
                <h3>lorem</h3>
                <ul>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                </ul>
            </div>
            <div class="link">
                <h3>lorem</h3>
                <ul>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                </ul>


            </div>

            <div class="link">
                <h3>lorem</h3>
                <ul>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                </ul>


            </div>

            <div class="link">
                <h3>lorem</h3>
                <ul>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Lorem</a></li>
                </ul>


            </div>

        </div>


    </footer>




    <script src="../script.js"></script>
</body>

</html>