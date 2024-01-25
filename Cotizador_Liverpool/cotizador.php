<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estilo1.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('https://i.ytimg.com/vi/1pCZ2fNoJeE/maxresdefault.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
        }

        #pide-online {
            background-color: rgba(150, 138, 159, 0.8);
            padding: 50px 20px;
        }

        #pide-online form {
            margin-bottom: 200px;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ffffff;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <header>
       
    </header>

    <section>
        
    </section>

    <section id="pide-online">
        <div>
            <form action='' method='post'>
                <p>
                    Nombre o ID del producto:
                    <input type='text' name='busquedacodigo' pattern='[A-Za-z0-9\s]{4,20}' title='Un código válido consiste en una cadena con 4 a 20 caracteres, cada uno de los cuales es una letra o un dígito'>
                    <input type='submit' value='Buscar'>
                </p>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $csvFile = 'productos_liverpool.csv';

                        
                        $codigo_producto = "";

                        
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            
                            $codigo_producto = $_POST["busquedacodigo"];
                        }

                        
                        $file = fopen($csvFile, 'r');

                        
                        if ($file !== false) {
                            
                            $sumaCasillas = 0;
                            $sumaPrecios = 0;

                           
                            while (($data = fgetcsv($file, 1000, ',')) !== false) {
                                
                                if ($codigo_producto == $data[0] || strpos($data[1], $codigo_producto) !== false) {
                                    echo "<tr>
                                            <td>{$data[0]}</td>
                                            <td>{$data[1]}</td>
                                            <td>{$data[2]}</td>
                                            <td><img src='Imagenes/{$data[0]}.jpeg' alt='Imagen del producto' height='200px'></td>
                                            <td><input type='checkbox' name='casilla_{$data[0]}'></td>
                                        </tr>";

                                    
                                    if (isset($_POST['casilla_' . $data[0]]) && $_POST['casilla_' . $data[0]] == 'on') {
                                        $sumaCasillas++;
                                        $sumaPrecios += floatval($data[2]); 
                                    }
                                }
                            }

                            
                            fclose($file);
                        } else {
                            echo "Error al abrir el archivo CSV.";
                        }
                        ?>
                    </tbody>
                </table>

                
                <input type='hidden' name='sumaCasillas' value='<?php echo $sumaCasillas; ?>'>
                <input type='hidden' name='sumaPrecios' value='<?php echo $sumaPrecios; ?>'>
                <button type='submit'>Calcular</button>
            </form>

            <?php
           
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                echo "<p>Articulos en Carrito: $sumaCasillas</p>";
                echo "<p>Total: $sumaPrecios</p>";
            }
            ?>
        </div>
    </section>
</body>

</html>

