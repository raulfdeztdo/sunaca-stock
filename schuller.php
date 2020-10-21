<?php include 'head.php'; ?>

<body>

  <?php include 'conexion.php'; ?>
  <?php include 'header.php'; ?>

  <section id="main-content">

    <article>
      <header style="min-height: 280px; display: grid; align-items: center">
        <center><img src="img/Logo-Schuller.png" width="200px" alt="logo-schuller"></center>
      </header>


      <div class="content">

        <?php
  if(!$_POST){
    ?>
        <form action="schuller.php" method="post" style=" padding: 0 5%">
          <div class="card mb-3 justify-content-center">
            <div class="card-header text-white bg-dark">
              <h5>CSV Stock SCHULLER</h5>
            </div>
            <div class="row" style="padding: 2%">
              <div class="col-md-6">
                <div class="card-body row justify-content-center">
                  <div class="form-inline">
                    <div class="input-group mb-3">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="myInput" name="csvfileshuller" value="" required>
                          <label class="custom-file-label" for="myInput">CSV Stock SCHULLER</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="alert alert-secondary justify-content-center" role="alert" style="max-width: 50rem; color: #7d7d7d">
                  <li type="disc">¡¡MUY IMPORTANTE QUE LAS COLUMNAS TENGAN EL SIGUIENTE TITULO!!</li>
                  <li type="disc">Nombre de columnas: "ITEMID", "CONFIGID","STOCK","FECHAPROX"</li>
                  <li type="disc">Delimitador por defecto: ;</li>
                  <li type="disc">Este programa solo actualiza Stock</li>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header text-white bg-dark">
              <h5>CSV Oxatis SCHULLER</h5>
            </div>
            <div class="card-body row justify-content-center">
              <div class="form-inline">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input form-control-sm" name="nombreCsv" id="switch5" value="yes" checked>
                        <label class="custom-control-label" for="switch5"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-1" value="Nombre" style="background-color: white; width: 90px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input form-control-sm" name="stockCsv" id="switch2" value="yes" checked>
                        <label class="custom-control-label" for="switch2"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="Stock" style="background-color: white; width: 70px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="pvpVentaCsv" value="yes" id="switch1" checked>
                        <label class="custom-control-label" for="switch1"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="PVP Venta" style="background-color: white; width: 120px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="pvpRecomendadoCsv" id="switch3" value="yes" checked>
                        <label class="custom-control-label" for="switch3"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="PVP Recomendado" style="background-color: white; width: 170px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="eanCodeCsv" id="switch4" value="yes" checked>
                        <label class="custom-control-label" for="switch4"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="Codigo EAN" style="background-color: white; width: 120px" disabled>
                </div>
              </div>
              <div class="input-group mb-3 justify-content-center">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="myInput2" name="csvfilestock" value="" required>
                    <label class="custom-file-label" for="myInput2">CSV Oxatis SCHULLER</label>
                  </div>
                </div>
              </div>
              <div class="alert alert-secondary" role="alert" style="max-width: 50rem; color: #7d7d7d">
                <li type="disc">Nombre de columnas: "idoxatis", "sku", "nombre", "stock", "pvpventa", "pvprecomendado", "proveedor", "ean", "visible"</li>
                <li type="disc">Delimitador que TIENE que tener archivo CSV de Oxatis: ;</li>
                <li type="disc">Marcar los datos que queremos que salgan en el CSV actualizado</li>
              </div>
            </div>
          </div>
          <center><input type="submit" class="enviar" name="Submit" value="Enviar"></center>
        </form>
        <?php
  }
?>



        <?php


if($_POST){


  if($_POST["Submit"]){
      $sql0 = "TRUNCATE TABLE schuller";
      if (mysqli_query($conn, $sql0)) {
            echo "Tabla anterior borrada </br>";
      } else {
            echo "Error: " . $sql0 . "<br>" . mysqli_error($conn)."</br>";
      }

      $sql01 = "TRUNCATE TABLE stock";
      if (mysqli_query($conn, $sql01)) {
            echo "Tabla anterior borrada </br>";
      } else {
            echo "Error: " . $sql01 . "<br>" . mysqli_error($conn)."</br>"."</br>";
      }


      $filecsvSchuller='Oxatis/Schuller/'.$_POST["csvfileshuller"];
      $filecsvStock='Oxatis/Schuller/'.$_POST["csvfilestock"];

      if (isset($_POST["nombreCsv"])) { $botonNombreCsv=$_POST["nombreCsv"]; } else { $botonNombreCsv="no"; }
      if (isset($_POST["stockCsv"])) {$botonStockCsv=$_POST["stockCsv"]; } else { $botonStockCsv="no"; }
      if (isset($_POST["pvpVentaCsv"])) {$botonPvpVentaCsv=$_POST["pvpVentaCsv"]; } else { $botonPvpVentaCsv="no"; }
      if (isset($_POST["pvpRecomendadoCsv"])) { $botonPvpRecomendadoCsv=$_POST["pvpRecomendadoCsv"]; } else { $botonPvpRecomendadoCsv="no"; }
      if (isset($_POST["eanCodeCsv"])) {$botonCodeCsv=$_POST["eanCodeCsv"]; } else { $botonCodeCsv="no"; }

      /************LECTURA DE CSV*/
      /****************************************************************************************METER CSV DE SCHULLER*/
        $fila=0;
        $itemid=-1;
        $configid=-1;
        $stock=-1;
        $fechaprox=-1;
        $total=0;
        if (($gestor0 = fopen($filecsvSchuller,"r")) !== FALSE){

          while (($datos0 = fgetcsv($gestor0,0,";")) !== FALSE){

            $numero0 = count ($datos0);

            for($c=0; $c < $numero0; $c++){
              if ($datos0[$c] == "ITEMID"){
                $itemid = $c;
              } elseif ($datos0[$c] == "CONFIGID"){
                $configid = $c;
              } elseif ($datos0[$c] == "STOCK"){
                $stock = $c;
              } elseif ($datos0[$c] == "FECHAPROX"){
                $fechaprox = $c;
              }

            }

            if ($fila > 0){


                if ($itemid !== -1) { $itemid1=trim($datos0[$itemid]); } else { $itemid1 = " "; }
                if ($configid !== -1) { $configid1=trim($datos0[$configid]); } else { $configid1 = " "; }
                if ($stock !== -1) { $stock1=trim($datos0[$stock]); } else { $stock1= " "; }
                if ($fechaprox !== -1) { $fechaprox1=trim($datos0[$fechaprox]); } else { $fechaprox1 = " "; }

                $sql = "INSERT INTO schuller (itemid, configid, stock, fechaprox) VALUES ('$itemid1', '$configid1', '$stock1', '$fechaprox1')";
                if (mysqli_query($conn, $sql)) {
                      //echo "New record created successfully";
                      $total++;
                } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn)."</br>";
                }
            }
            $fila++;
          }
          echo "</br>"."Se han introducido " . $total . " filas del Stock de Schuller"."</br>"."</br>";
        }
      /****************************************************************************************METER CSV DE NUESTRO STOCK*/
        $fila1=0;
        $itemSku1=-1;
        $qTyStock1=-1;
        $price1=-1;
        $priceDos1=-1;
        $proveedor1=-1;
        $eanCode1=-1;
        $name1=-1;
        $visible1=-1;
        $total1=0;
        if (($gestor1 = fopen($filecsvStock,"r")) !== FALSE){

          while (($datos1 = fgetcsv($gestor1,0,";")) !== FALSE){

            $numero1 = count ($datos1);
            //echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
            for($c=0; $c < $numero1; $c++){
              if ($datos1[$c] == "sku"){
                $itemSku1 = $c;
              } elseif ($datos1[$c] == "idoxatis"){
                $oxatisId1 = $c;
              } elseif ($datos1[$c] == "nombre"){
                $name1 = $c;
              } elseif ($datos1[$c] == "stock"){
                $qTyStock1 = $c;
              } elseif ($datos1[$c] == "pvpventa"){
                $price1 = $c;
              } elseif ($datos1[$c] == "pvprecomendado"){
                $priceDos1 = $c;
              } elseif ($datos1[$c] == "proveedor"){
                $proveedor1 = $c;
              } elseif ($datos1[$c] == "ean"){
                $eanCode1 = $c;
              } elseif ($datos1[$c] == "visible"){
                $visible1 = $c;
              }
            }

            if ($fila1 > 0){
                if($oxatisId1 !== -1){ $oxID=trim($datos1[$oxatisId1]); }
                if($itemSku1 !== -1){ $itemSku=trim($datos1[$itemSku1]); } else{ $itemSku=" "; }
                if($name1 !== -1){ $name=trim(utf8_encode($datos1[$name1])); } else{ $name=" "; }
                if($qTyStock1 !== -1){ $qTyStock=trim($datos1[$qTyStock1]); } else{ $qTyStock=" "; }
                if($price1 !== -1){
                  $pvp_aux = floatval($datos1[$price1]);
                  $pvp_aux2 = str_replace(".",",",$pvp_aux);
                  $price=$pvp_aux2;
                } else{
                  $price=" ";
                }
                if($priceDos1 !== -1){ $priceDos=trim($datos1[$priceDos1]); } else{ $priceDos=" "; }
                if($proveedor1 !== -1){ $proveedor=trim($datos1[$proveedor1]); } else{ $proveedor=" "; }
                if($eanCode1 !== -1){ $eanCode=trim($datos1[$eanCode1]); } else{ $eanCode=" "; }
                if($visible1 !== -1){ $visible=trim($datos1[$visible1]); } else{ $visible=" "; }
                $sql1 = "INSERT INTO stock (idoxatis, sku, nombre, stock, pvpventa, pvprecomendado, proveedor, ean, visible) VALUES ('$oxID','$itemSku', '$name', '$qTyStock','$price', '$priceDos', '$proveedor','$eanCode','$visible')";
                if (mysqli_query($conn, $sql1)) {
                      //echo "New record created successfully";
                      $total1++;
                } else {
                      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn)."</br>";
                }
            }
            $fila1++;
          }
          echo "</br>"."Se han introducido " . $total1 . " filas de nuestro Stock"."</br>"."</br>"."</br>";
        }
  /********************************************************************************************** ALMACENAMOS LOS DATOS EN ARRAYS*/
  /**************ALMACENAMOS DATOS SCHULLER*/
  $consulta0 = "SELECT * FROM Schuller";

  if ($resultado0=mysqli_query($conn, $consulta0)) {
      $j=0;
      while ($row0 = mysqli_fetch_assoc($resultado0)) {
          $SchullerItemId[$j] = trim($row0['itemid']);
          if (trim($row0['configid']) != "") { $SchullerItemId[$j].="/".trim($row0['configid']); }
          //echo $SchullerItemId[$j]."</br>";
          $SchullerStock[$j] = trim($row0['stock']);
          $SchullerFechaProx[$j] = trim($row0['fechaprox']);
          $j++;
      }

      $totalSchuller = $j;
      mysqli_free_result($resultado0);
    }
   //echo "Total filas Schuller cogidas: " .$totalSchuller. "</br>";

    /**************ALMACENAMOS DATOS STOCK*/
    $consulta01 = "SELECT * FROM stock";

    if ($resultado01=mysqli_query($conn, $consulta01)) {
        $w=0;
        while ($row01 = mysqli_fetch_assoc($resultado01)) {
            $stockIdOxatis[$w] = trim($row01['idoxatis']);
            $stockSku[$w] = trim($row01['sku']);
            $stockNombre[$w] = trim($row01['nombre']);
            $stockStock[$w] = trim($row01['stock']);
            $stockPvpventa[$w] = trim($row01['pvpventa']);
            $stockPvprecomendado[$w] = trim($row01['pvprecomendado']);
            $stockProveedor[$w] = trim($row01['proveedor']);
            $stockEan[$w] = trim($row01['ean']);
            $stockVisible[$w] = trim($row01['visible']);
            $w++;
        }

        $totalStock = $w;
        mysqli_free_result($resultado01);
      }
    //echo "Total filas stock nuestro cogidas: " .$totalStock. "</br>";
  /********************************************************************************************** ACTUALIZO STOCK */
    $totalSi=0;
    $totalNoModificados=0;
    $totalSi=0;

    for ($s=0; $s < $totalSchuller; $s++){
      for($m=0; $m<$totalStock; $m++){
          if ($SchullerItemId[$s] == $stockSku[$m]){
            $sql2 = "UPDATE stock SET stock='$SchullerStock[$s]' WHERE sku = '$SchullerItemId[$s]'";
            if (mysqli_query($conn, $sql2)) {
                  $totalSi++;
            } else {
                  $totalNoModificados++;
            }
          }
        }
    }
    $char=" ";
    for($m=0; $m<$totalStock; $m++){
      if(strpos($stockSku[$m],'+')){
          if ( strpos($stockSku[$m],'+') ){
            $char="+";
          }
          //echo "</br>".$stockSku[$m]."</br>";
          $skuDoble = explode($char, $stockSku[$m]);
          //print_r($skuDoble);
          //echo "</br>"."Primer Sku: ".$skuDoble[0]."</br>"."Segundo Sku: ".$skuDoble[1]."</br>";

          $skuBool1=false;
          $skuBool2=false;
          for ($s=0; $s < $totalSchuller; $s++){
              if($skuDoble[0] == $SchullerItemId[$s]){
                  $skuBool1 = true;
              }
          }
          for ($s=0; $s < $totalSchuller; $s++){
              if($skuDoble[1] == $SchullerItemId[$s]){
                  $skuBool2 = true;
              }
          }

          if($skuBool1==true && $skuBool2==true){
              $sql4 = "UPDATE stock SET stock='30' WHERE sku = '$stockSku[$m]'";
              if (mysqli_query($conn, $sql4)) {
                    $totalSi++;
              } else {
                    $totalNoModificados++;
              }
          }
      }
    }

/********************************************************************************************** GENERO CSV NUEVO */

  $csv_end = "
";
  $csv_sep = ";";
  $fechahoy = date('d-m-y');
  $csv_file = "oxatis-Schuller-Actualizado-".$fechahoy.".csv";
  $csv='"idoxatis"'.$csv_sep.'"sku"';
  if ($botonNombreCsv=="yes"){ $csv.=$csv_sep.'"nombre"'; }
  if ($botonStockCsv=="yes") { $csv.=$csv_sep.'"stock"'; }
  if ($botonPvpVentaCsv=="yes") { $csv.=$csv_sep.'"pvpventa"'; }
  if ($botonPvpRecomendadoCsv=="yes") { $csv.=$csv_sep.'"pvprecomendado"'; }
  if ($botonCodeCsv=="yes") { $csv.=$csv_sep.'"ean"'; }
  $csv.=$csv_end;
  $sql="SELECT * from stock";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
    $csv.=$row['idoxatis'].$csv_sep.$row['sku'];
    if ($botonNombreCsv=="yes"){ $csv.=$csv_sep.$row['nombre']; }
    if ($botonStockCsv=="yes") { $csv.=$csv_sep.$row['stock']; }
    if ($botonPvpVentaCsv=="yes") { $csv.=$csv_sep.$row['pvpventa']; }
    if ($botonPvpRecomendadoCsv=="yes") { $csv.=$csv_sep.$row['pvprecomendado']; }
    if ($botonCodeCsv=="yes") { $csv.=$csv_sep.$row['ean']; }
    $csv.=$csv_end;
  }
  //Generamos el csv de todos los datos
  if (!$handle = fopen($csv_file, "w")) {
    echo "<div class='mensajeError'>¡El fichero .csv no se puede abrir, o que lo tiene abierto mientras se actualiza!</div>"."</br>";
    exit;
  } else {
    echo "<div class='mensajeBueno'>¡El fichero csv se ha grabado correctamente!</div>"."</br>";
  }
  if (fwrite($handle, utf8_decode($csv)) === FALSE) {
    echo "<div class='mensajeError'>No se puede escribir en el fichero</div>"."</br>";
    exit;
  }
  fclose($handle);

/********************************************************************************************** CALCULO SKU QUE NO ESTAN EN LA BD DE SCHULLER */
    $h=0;
    for($m=0; $m<$totalStock; $m++){

        if(strpos($stockSku[$m],'+')){
          if (strpos($stockSku[$m],'+')){
            $char="+";
          }
          $skuDoble = explode($char, $stockSku[$m]);

          $skuBool1=false;
          $skuBool2=false;
          $precioTotal=0.0;
          for ($s=0; $s < $totalSchuller; $s++){
              if($skuDoble[0] == $SchullerItemId[$s]){
                  $skuBool1 = true;
              }
          }
          for ($s=0; $s < $totalSchuller; $s++){
              if($skuDoble[1] == $SchullerItemId[$s]){
                  $skuBool2 = true;
              }
          }

          if(!($skuBool1==true && $skuBool2==true)){
              //echo "Este sku no esta en la BD de Schuller: ".$stockSku[$m]."</br>";
              $skuNoSimple[$h]=$stockSku[$m];
              $h++;
          }


      } else {
          $esta=false;
          for($p=0; $p<$totalSchuller; $p++){
            if ($stockSku[$m] == $SchullerItemId[$p]) {
              //echo "Este sku no esta en la BD de Schuller: ".$stockSku[$m]."</br>";
              $esta=true;
            }
          }
          if ($esta == false) { $skuNoSimple[$h]=$stockSku[$m]; $h++;}
      }
    }
    $totalNo =$h;


  /********************************************************************************************** TABLA DE NO */

    sort($skuNoSimple);

    for($i=0; $i<$totalNo; $i++){
      $consulta = "SELECT idoxatis,sku,nombre,stock,visible FROM stock WHERE sku = '$skuNoSimple[$i]'";
      if ($resultado=mysqli_query($conn, $consulta)) {
          while ($row = mysqli_fetch_assoc($resultado)) {
              $idOxNo[$i] = $row['idoxatis'];
              $skuNo[$i] = $row['sku'];
              $nombreNo[$i] = $row['nombre'];
              $stockNo[$i] = $row['stock'];
              $visibleNo[$i] = $row['visible'];
          }
          mysqli_free_result($resultado);
        }
    }
    ?>

        <table align="center" id="tableNo">
          <caption>ARTÍCULOS QUE NO ESTÁN EN EL CSV DE SCHULLER - <?php echo $totalNo; ?> artículos<caption>
            <tr>
              <th scope="col"><b>idOxatis</b></td>
              <th scope="col"><b>sku</b></td>
              <th scope="col"><b>Nombre</b></td>
              <th scope="col"><b>Stock</b></td>
              <th scope="col"><b>Publicado</b></td>
            </tr>
            <?php
          for($z=0; $z<$totalNo; $z++){
           ?>
          <tr>
            <td><?php print $idOxNo[$z]; ?></td>
            <td><?php print $skuNo[$z]; ?></td>
            <td><?php print $nombreNo[$z]; ?></td>
            <td><?php print $stockNo[$z]; ?></td>
            <td><?php if($visibleNo[$z]=='1'){ print "Si"; } elseif ($visibleNo[$z]=='0'){ print "No"; } else { print " "; } ?></td>
          </tr>
          <?php
          }
          ?>
        </table>

        <?php
    } // FIN DEL POST
}// FIN DEL POST SUBMIT
?>
      </div>

    </article>

  </section>


  <?php include 'footer.php'; ?>

</body>

</html>
