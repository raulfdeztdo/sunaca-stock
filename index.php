<?php include 'head.php'; ?>

<body>
  <?php include 'conexion.php'; ?>
  <?php include 'header.php'; ?>


  <section id="main-content">

    <article>
      <header>
        <h1>Inicio</h1>
      </header>

      <div class="content">

        <div class="alert alert-secondary" role="alert">
          Esta aplicación web sirve para actualizar el stockaje, precio, etc.. segun el proveedor.</br></br>
          Consejos:</br>
          <ul>
            <li>Muy importante que los CSV que se importen esten en la carpeta del proveedor elegido, dentro de la carpeta del programa</li>
            <li>Hay que fijarse que los nombres de las columnas de los CSV a importar coincidan con los nombres de las columnas marcados por proveedor y con nuestros nombres de las columnas de Oxatis</li>
            <li>La aplicación después de enviar los CSV te mostrará una tabla con los articulos que tenemos en Stock y el proveedor NO.</li>
            <li>Una vez enviados los CSV se generará un CSV con el formato de Oxatis en la carpeta principal del programa con el nombre: "oxatis-PROVEEDOR-Actualizado.csv"</li>
          </ul>
        </div>
      </div>
    </article>

  </section>


  <?php include 'footer.php'; ?>

</body>

</html>