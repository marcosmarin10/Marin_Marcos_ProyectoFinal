<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "abfinal";
    $productId = isset($_GET['id']) ? $_GET['id'] : 0;

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
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="popup-contenedor" class="popup-oculto">
        <div id="popup">
            <img src="../images/tick.png" class="tick-producto" alt="">
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
                                <li class="dropdowns"><a class="dropdowns-link" href="../zapatillas/">Zapatillas</a>
                                </li>
                                <li class="dropdowns"><a class="dropdowns-link" href="../accesorios/">Accesorios</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="../contacto/">Contacto</a></li>

                    </ul>
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
        <?php
            $sql = "SELECT * FROM productos WHERE id = ?";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                die("Error en la preparación de la consulta: " . $conn->error);
            }
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='product'>
                <div class='img-viewer'>
                        <div class='imagen-principal' id='imagenPrincipal'>
                            <img src='../images/{$row["imagen"]}' id='imgPrincipal' alt='{$row["nombre"]}'>
                        </div>
                        <div class='imagenes-secundarias'>";
                        if (!empty($row["imagen"])) {
                            echo "<img src='../images/{$row["imagen"]}' class='img-secundaria' onclick='cambiarImagen(\"../images/{$row["imagen"]}\")'>";
                        }
                        if (!empty($row["imagen_2"])) {
                            echo "<img src='../images/{$row["imagen_2"]}' class='img-secundaria' onclick='cambiarImagen(\"../images/{$row["imagen_2"]}\")'>";
                        }
                        if (!empty($row["imagen_3"])) {
                            echo "<img src='../images/{$row["imagen_3"]}' class='img-secundaria' onclick='cambiarImagen(\"../images/{$row["imagen_3"]}\")'>";
                        }
                echo "</div>
                </div>
                <div class='producto-info'>";
                echo "<h3>{$row["nombre"]}</h3>";
                echo "<p class='precio'>Precio: {$row["precio"]}€</p>";
                if ($row["precio_oferta"]) {
                    echo "<p class='precio-oferta'>Precio de oferta: {$row["precio_oferta"]}€</p>";
                }
                echo "<a href='#' class='agregar carrito btn-2' data-id='{$row["id"]}' >Agregar al carrito</a>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<p>Producto no encontrado.</p>";
            }

            $stmt->close();
            $conn->close();
        ?>
    </main>
    <script src="../script.js"></script>
    <script>
        function cambiarImagen(src) {
            document.getElementById('imgPrincipal').src = src;
        }
    </script>
</body>
</html>
