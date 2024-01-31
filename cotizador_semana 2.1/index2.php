<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <link rel="stylesheet" href="estilo2.css">
</head>
    <header>
        <div class="logo">
            <img src="Logo.jpg" alt="logo de la compania">
            <h1 class="nombre de la empresa">Liverpool</h1>
            <body><a href="desarrolladores.php"><button>Desarrolladores</button></a>
            <a href="cotizador.php"><button>Version 1</button></a>
        </div>
    </header>

    <section id="stock">
        <div>
            <form action='' method='post'>
                <p>
                    Encuentra lo que buscas:
                    <input type='text' name='busquedacodigo' pattern='[A-Za-z0-9\s]{1,20}' title='Un código válido consiste en una cadena con 1 a 20 caracteres, cada uno de los cuales es una letra o un dígito'>

                    <!-- Lista desplegable para filtrar tiendas -->
                    <select name="tienda_filtro">
                        <option value="">Todas las tiendas</option>
                        <?php
                            // Obtener la lista de tiendas únicas del archivo CSV
                            $tiendas = array();
                            $file = fopen('productos_liverpool.csv', 'r');
                            while (($data = fgetcsv($file, 1000, ',')) !== false) {
                                $tiendas[] = $data[4];
                            }
                            fclose($file);

                            // Eliminar duplicados
                            $tiendas = array_unique($tiendas);

                            // Imprimir las opciones de la lista desplegable
                            foreach ($tiendas as $tienda) {
                                echo "<option value=\"$tienda\">$tienda</option>";
                            }
                        ?>
                    </select>

                    <input type='submit' value='Buscar'>
                
                </p>
                <button type="submit" name="ofertas">Ofertas</button>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Stock</tn>
                            <th>Tienda</th>
                            <th>Empresa</th>
                            <th>Promocion</th>
                            <th>Descuento</th>
                            <th>Añadir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Ruta del archivo CSV
                            $csvFile = 'productos_liverpool.csv';

                            // Inicializar la variable $codigo_producto
                            $codigo_producto = "";

                            // Variable para verificar si se presionó el botón "Ofertas"
                            $buscar_ofertas = false;

                            // Verificar si se ha enviado un formulario
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Obtener el valor del input y la tienda seleccionada
                                $codigo_producto = $_POST["busquedacodigo"];
                            
                                // Inicializa la variable $tienda_filtro
                                $tienda_filtro = "";
                            
                                if (isset($_POST["tienda_filtro"])) {
                                    $tienda_filtro = $_POST["tienda_filtro"];
                                }

                                // Verificar si se presionó el botón "Ofertas"
                                if (isset($_POST['ofertas'])) {
                                    $buscar_ofertas = true;
                                }
                            }

                            // Abre el archivo CSV en modo lectura
                            $file = fopen($csvFile, 'r');

                            // Verifica si se pudo abrir el archivo
                            if ($file !== false) {
                                // Inicializar variables para la suma
                                $sumaCasillas = 0;
                                $sumaDescuento = 0;
                                $sumaPrecios = 0;

                                // Lee cada línea del archivo CSV
                                while (($data = fgetcsv($file, 1000, ',')) !== false) {
                                    // Verifica si coincide el código de producto y la tienda seleccionada
                                    if (($codigo_producto == $data[0] || strpos($data[1], $codigo_producto) !== false) &&
                                        ($tienda_filtro == "" || $tienda_filtro == $data[4])) {
                                        // Verifica si se deben mostrar solo las ofertas
                                        if (!$buscar_ofertas || (floatval($data[7]) > 0)) {
                                            echo "<tr>
                                            <td>{$data[0]}</td>
                                            <td>{$data[1]}</td>
                                            <td>{$data[2]}</td>
                                            <td><img src='Imagenes/{$data[0]}.jpeg' alt='Imagen del producto' height='200px'></td>
                                            <td>{$data[3]}</td>
                                            <td>{$data[4]}</td>
                                            <td>{$data[5]}</td>
                                            <td>{$data[6]}</td>
                                            <td>{$data[7]}</td>
                                            <td><input type='checkbox' name='casilla_{$data[0]}'></td>
                                            </tr>";

                                            // Recorrer las casillas marcadas y sumar precios
                                            if (isset($_POST['casilla_' . $data[0]]) && $_POST['casilla_' . $data[0]] == 'on') {
                                                $sumaCasillas++;
                                                $sumaDescuento += floatval($data[8]); // Sumar el precio (convierte a número flotante)
                                                $sumaPrecios += floatval($data[9]); // Sumar el precio (convierte a número flotante)
                                            }
                                        }
                                    }
                                }

                                // Cierra el archivo CSV
                                fclose($file);
                            } else {
                                echo "Error al abrir el archivo CSV.";
                            }
                        ?>
                    </tbody>
                </table>

                <!-- Botón de calcular dentro del formulario principal -->
                <input type='hidden' name='sumaCasillas' value='<?php echo $sumaCasillas; ?>'>
                <input type='hidden' name='sumaDescuento' value='<?php echo $sumaDescuento; ?>'>
                <input type='hidden' name='sumaPrecios' value='<?php echo $sumaPrecios; ?>'>
                <br><br>
                <button type='submit'>Calcular</button>
            </form>

            <?php
                // Verificar si se ha enviado el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Mostrar resultados
                    echo "<p>Articulos en Carrito: $sumaCasillas</p>";
                    echo "<p>Descuento: $sumaDescuento</p>";
                    echo "<p>Total: $sumaPrecios</p>";
                }
            ?>
        </div>
    </section>
</body>
</html>
