<?php
require './php/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guiacereza</title>
    <link rel="stylesheet" href="./assets/css/products.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Header Section -->
    <header 
    class="header">
      <nav class="nav bd_grid">
        <div>
          <h4 class="nav_logo">Guiacereza</h4>
        </div>

        <div class="nav_menu" id="nav_menu">
          <ul class="nav_list">
            <li class="nav_items">
              <a href="index.html" class="nav_link active">Inicio</a>
            </li>
            <li class="nav_items">
              <a href="index.html" class="nav_link active">Acerca De</a>
            </li>
            <li class="nav_items">
              <a href="index.html" class="nav_link active">Rendimiento</a>
            </li>
            <li class="nav_items">
              <a href="index.html" class="nav_link active">Lo mas nuevo</a>
            </li>
            <li class="nav_items">
              <a href="register_form.php" class="nav_link active">Register</a>
            </li>
            <li class="nav_items">
                <a href="#" class="nav_link active">Productos</a>
              </li>
          </ul>
        </div>

        <div class="nav_toggle" id="nav_toggle">
          <i class="bx bx-menu-alt-right"></i>
        </div>
      </nav>
    </header>

    <section class="work section" id="work">

    
        <h2 class="section-title" data-aos="fade-down">Productos</h2>
        

        <div
          class="work_container bd_grid"
          data-aos="fade-down"
          data-aos-delay="250"
        >
        <?php foreach($resultado as $row) { ?>

        <div class="work_img">
        <?php
        $id = $row['id'];
        $imagen = "./assets/productos/2/principal.jpg";

        if (!file_exists($imagen)) {
          $imagen = "./assets/istockphoto-887464786-612x612.jpg";
        }
        ?>
            <a href="https://tiendacereza.com"><img src="<?php echo $imagen; ?>" alt="" /></a>
            <div class="info_work">
              <h1><?php echo $row['nombre']; ?></h1>
              <p><?php echo number_format($row['precio'], 2, '.', ','); ?></p>
            </div>
          </div>
          <?php } ?>
      </section>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./assets/js/main.js"></script>

    <script>
      AOS.init({
        duration: 1200,
        once: false,
      });
    </script>
  </body>
</html>
