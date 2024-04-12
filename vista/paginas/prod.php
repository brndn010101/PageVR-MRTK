<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Power-Bio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/navi.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/fontawesome-free-5.15.4-web/css/all.css">
    <script src="../bootstrap/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .carousel-item img{
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>

<?php
    function obtenerProductosDesdeBD(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "power_bio";

        $conn = new mysqli($servername, $username, $password, $database);

        if($conn->connect_error){
            die("Error al conectar con la base de datos: " . $conn->connect_error);
        }

        $sql = "SELECT id, nombre, descripcion, precio, imagen FROM productos";

        $result = $conn->query($sql);

        $productos = [];

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $productos[] = $row;
            }
        }

        $conn->close();

        return $productos;
    }
    $productos = obtenerProductosDesdeBD();
?>



<body>
<header id="encabezado" class="container-fluid bg-white text-black text-center">
        <div class="row p-3">
            <div class="col-2 p-4">
                <img src="../imagenes/Fuente Power-Bio.png" width="150 px" height="40px">
            </div>

            <div class="col-2 p-2">
                <nav id="menu">
                    <ul class="navigation bg-white" align="center">               
                        <a href="../../index.html"><button class="btn btn-primary text-black"
                                type="button"><b>REGRESAR</b></button></a>
                    </ul>
                </nav>
            </div> 


            <div class="col-2 p-2">
                <nav id="menu">
                    <ul class="navigation bg-white" align="center">               
                        <a href="../paginas/productos.html"><button class="btn btn-primary text-black"
                                type="button"><b>PRODUCTOS</b></button></a>
                    </ul>
                </nav>
            </div>

            <div class="col-2 p-2">
                <nav id="menu">
                    <ul class="navigation bg-white" align="center">
                        <a href="../paginas/contacto.html"><button class="btn btn-primary text-black"
                            type="button"><b>CONTACTO</b></button></a>
                    </ul>
                </nav>
            </div>

            <div class="col-2 p-4" class="container mt-3">
                <button type="button" class="btn btn-primary dropdown-toggle text-black" data-bs-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                        Cuenta</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../paginas/IS-C.html">Iniciar Sesión</a></li>
                        <li><a class="dropdown-item" href="../paginas/signup.html">Crear Cuenta</a></li>
                    </ul>
            </div>
            <div class="col-2 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <h6>Carrito</h6>
            </div>
        </div>
    </header>
    <br>
        <img src="../imagenes/BANL1.jpg" class="d-block w-100">
        <section id="Catálogo" class="mt-5">
           <div class="row">
            <?php
                foreach($productos as $producto){
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card">';    
                    echo '<img src="' . $producto['imagen'] . '" class="card-img-top" alt="' . $producto['nombre'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $producto['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $producto['descripcion'] . '<br>' . '$ ' . $producto['precio'] . ' MXN' . '</p>';
                    echo '<button class="btn btn-dark text-white addToCart" data-id="' . $producto['id'] . '"data-name="' . $producto['nombre'] . '"data-price="' . $producto['precio'] . '">Agregar al carrito</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </section>

        <section id="Carrito" class="mt-5">
            <h2>Carrito de Compras</h2>
            <ul id="cartItems"></ul>
            <p>Total: $<span id="cartTotal">0</span></p>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const addToCartButtons = document.querySelectorAll(".addToCart");
        const cartItems = document.getElementById("cartItems");
        const cartTotal = document.getElementById("cartTotal");
        let cart = [];
        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                const name = button.dataset.name;
                const price = parseFloat(button.dataset.price);
                addItemToCart(name, price);
                displayCartItems();
                calculateCartTotal();
            });
        });
    
        function addItemToCart(itemName, itemPrice) {
            cart.push({
                name: itemName,
                price: itemPrice
            });
        }
    
        function displayCartItems() {
            cartItems.innerHTML = "";
            cart.forEach((item, index) => {
                const li = document.createElement("li");
                li.textContent = `${item.name} - $${item.price} `;
                const removeButton = document.createElement("button");
                removeButton.textContent = "Eliminar";
                removeButton.classList.add("btn", "btn-danger", "btn-sm");
                removeButton.onclick = function() { removeItemFromCart(index); };
                li.appendChild(removeButton);
                cartItems.appendChild(li);
            });
        }
    
        function removeItemFromCart(index) {
            cart.splice(index, 1);
            displayCartItems();
            calculateCartTotal();
        }
    
        function calculateCartTotal() {
            const total = cart.reduce((acc, item) => acc + parseFloat(item.price), 0);
            cartTotal.textContent = total.toFixed(2);
        }
    </script>

<br>


<div class="container-fluid">

    <div class="row p-5 bg-black text-white">
    
    <div class="col-xs-12 col-md-6 col-lg-3">
        <br>
        <br>
        <br>
        <img src="../imagenes/Fuente Power-Bio.png" width="150 px" height="40px">
    </div>
    
    <div class="col-xs-12 col-md-6 col-lg-3">
        <p class="h5 mb-3 text-primary">Redes Sociales</p>
        <div class="mb-2">
        <a class="text-white text-decoration-none" href="#">Facebook</a>
        </div>
        <div class="mb-2">
        <a class="text-white text-decoration-none" href="#">Instagram</a>
        </div>
        <div class="mb-2">
        <a class="text-white text-decoration-none" href="#">X</a>
        </div>
        <div class="mb-2">
        <a class="text-white text-decoration-none" href="#">TikTok</a>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-3">
        <p class="h5 mb-3 text-primary">Legal</p>
        <div class="mb-2">
        <a class="text-white text-decoration-none" href="../paginas/terms.html">Términos y Condiciones</a>
        </div>
        <div class="mb-2">
        <a class="text-white text-decoration-none" href="../paginas/policy.html">Política de Privacidad</a>
        </div>
    </div>
    
    <div class="col-xs-12 col-md-6 col-lg-3">
        <p class="h5 mb-3 text-primary">Nosotros</p>
        <div class="mb-2">
        <a class="text-white text-decoration-none" href="../paginas/mvv.html">Misión, Visión, Valores</a>
        </div>
        <div class="mb-2">
            <a href="https://www.google.com/maps/place/Universidad+Tecnológica+de+Tula-Tepeji/@20.0129998,-99.3342293,13.81z/data=!4m6!3m5!1s0x85d22d134f5ed9d9:0xaf1e77aba8c3a0a2!8m2!3d20.0092097!4d-99.3427861!16s%2Fm%2F0whzryz?authuser=0&entry=ttu" class="text-decoration-none text-white" target="_blank">Ubicación</a>
        </div>
    </div>

    </div>
    <div class="row p-1 bg-black text-white">
            <center><p>Power-Bio 2024. Todos los Derechos Reservados.</p></center>
    </div>

</div>

</body>
</html>
