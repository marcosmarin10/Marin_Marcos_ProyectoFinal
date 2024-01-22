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

$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->num_rows > 0 ? $result->fetch_assoc() : null;
$stmt->close();

$tallas = null;
$tallasDisponibles = 0;
if ($product) {
    if ($product["categoria"] == "zapatilla") {
        $sqlTallas = "SELECT * FROM talla_zapatillas WHERE producto_id = ?";
    } elseif ($product["categoria"] == "camiseta") {
        $sqlTallas = "SELECT * FROM talla_camisetas WHERE producto_id = ?";
    }

    if (isset($sqlTallas)) {
        $stmtTallas = $conn->prepare($sqlTallas);
        if (!$stmtTallas) {
            die("Error en la preparación de la consulta de tallas: " . $conn->error);
        }
        $stmtTallas->bind_param("i", $productId);
        $stmtTallas->execute();
        $resultTallas = $stmtTallas->get_result();
        if ($resultTallas->num_rows > 0) {
            $tallas = $resultTallas->fetch_assoc();
            foreach ($tallas as $talla => $cantidad) {
                if ($talla !== "producto_id") {
                    $tallasDisponibles += intval($cantidad);
                }
            }
        }
        $stmtTallas->close();
    }
}
$conn->close();
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
        <?php if ($product): ?>
            <div class='product'>
                <div class='img-viewer'>
                    <div class='imagen-principal' id='imagenPrincipal'>
                        <img src='../images/<?= htmlspecialchars($product["imagen"]) ?>' id='imgPrincipal' alt='<?= htmlspecialchars($product["nombre"]) ?>'>
                    </div>
                    <div class='imagenes-secundarias'>
                        <?php 
                        if (!empty($product["imagen"])) {
                            echo "<img src='../images/" . htmlspecialchars($product["imagen"]) . "' class='img-secundaria' onclick='cambiarImagen(\"../images/" . htmlspecialchars($product["imagen"]) . "\")'>";
                        }
                        if (!empty($product["imagen_2"])) {
                            echo "<img src='../images/" . htmlspecialchars($product["imagen_2"]) . "' class='img-secundaria' onclick='cambiarImagen(\"../images/" . htmlspecialchars($product["imagen_2"]) . "\")'>";
                        }
                        if (!empty($product["imagen_3"])) {
                            echo "<img src='../images/" . htmlspecialchars($product["imagen_3"]) . "' class='img-secundaria' onclick='cambiarImagen(\"../images/" . htmlspecialchars($product["imagen_3"]) . "\")'>";
                        }
                        ?>
                    </div>
                </div>
                <div class='producto-info'>
                    <h3><?= htmlspecialchars($product["nombre"]) ?></h3>
                    <p class='precio'>Precio: <?= htmlspecialchars($product["precio"]) ?>€</p>
                    <?php if ($product["precio_oferta"]): ?>
                        <p class='precio-oferta'>Precio de oferta: <?= htmlspecialchars($product["precio_oferta"]) ?>€</p>
                    <?php endif; ?>
                    <a href='#' class='agregar carrito btn-2' data-id='<?= $product["id"] ?>'>Agregar al carrito</a>
                    <?php if ($tallas): ?>
                        <div class='tallas-disponibles'>
                            <p>Total de unidades disponibles: <?= $tallasDisponibles ?></p>
                            <div class="tallas-div-cont">
                                <?php foreach ($tallas as $talla => $cantidad): ?>
                                    <?php if ($talla !== "producto_id" && $cantidad > 0): ?>
                                        <p><?= htmlspecialchars($talla) ?>: <?= $cantidad ?></p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <p>Producto no encontrado.</p>
        <?php endif; ?>
    </main>
    <script src="../script.js"></script>
    <script>
        function cambiarImagen(src) {
            document.getElementById('imgPrincipal').src = src;
        }
    </script>
</body>
</html>
