<?php include 'head.php'; ?>

<body>

  <?php include 'conexion.php'; ?>
  <?php include 'header.php'; ?>

  <section id="main-content">

    <article>
      <header style="min-height: 280px; display: grid; align-items: center">
        <center><img src="img/logo-faro-sunaca.jpg" alt="logo-faro"></center>
      </header>


      <div class="content">

        <?php
  if(!$_POST){
    ?>
        <form action="stockfaro.php" method="post" style=" padding: 0 5%">
          <div class="card mb-3">
            <div class="card-header text-white bg-dark">
              <h5>CSV Stock Faro</h5>
            </div>
            <div class="card-body row justify-content-center">
              <div class="form-inline">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Delimitador
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" name="del" value="|" style="width: 40px" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input form-control-sm" name="quantity" id="switch2" value="yes" checked>
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
                        <input type="checkbox" class="custom-control-input" name="pvpventaFaro" value="yes" id="switch1" checked>
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
                        <input type="checkbox" class="custom-control-input" name="pvp" id="switch3" value="yes" checked>
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
                        <input type="checkbox" class="custom-control-input" name="barcode" id="switch4" value="yes" checked>
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
                    <input type="file" class="custom-file-input" id="myInput" name="csvfilefaro" value="" required>
                    <label class="custom-file-label" for="myInput" >Introduce el CSV de FARO</label>
                  </div>
                </div>
              </div>
              <div class="alert alert-secondary" role="alert" style="max-width: 50rem; color: #7d7d7d">
                <li type="disc">¡¡MUY IMPORTANTE QUE LAS COLUMNAS TENGA EL SIGUIENTE TITULO!!</br> Nombre de columnas: "Reference", "Descripition", "Quantity", "PVP", "Barcode", "pvpventa".</li>
                <li type="disc">Delimitador por defecto: | </li>
                <li type="disc">El PVP RECOMENDADO NO ESTA EN EL ARCHIVO FARO DE SERIE.</li>
                <li type="disc">Marcar las casillas de los datos que queremos actualizar</li>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header text-white bg-dark">
              <h5>CSV Stock Oxatis</h5>
            </div>
            <div class="card-body row justify-content-center">
              <div class="form-inline">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="nombreCsv" value="yes" id="switch5" checked>
                        <label class="custom-control-label" for="switch5"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="Nombre" style="background-color: white; width: 120px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input form-control-sm" name="stockCsv" id="switch6" value="yes" checked>
                        <label class="custom-control-label" for="switch6"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="Stock" style="background-color: white; width: 70px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="pvpVentaCsv" value="yes" id="switch7" checked>
                        <label class="custom-control-label" for="switch7"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="PVP Venta" style="background-color: white; width: 120px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="pvpRecomendadoCsv" id="switch8" value="yes" checked>
                        <label class="custom-control-label" for="switch8"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="PVP Recomendado" style="background-color: white; width: 170px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="eanCodeCsv" id="switch9" value="yes" checked>
                        <label class="custom-control-label" for="switch9"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="Codigo EAN" style="background-color: white; width: 120px" disabled>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="myInput2" name="csvfilestock" value="" required>
                    <label class="custom-file-label" for="myInput2">Introduce el CSV de OXATIS</label>
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
      $sql0 = "TRUNCATE TABLE stockfaro";
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


      $filecsvFaro="Oxatis/Faro/".$_POST["csvfilefaro"];
      $filecsvStock="Oxatis/Faro/".$_POST["csvfilestock"];
      $delimitadorFaro=$_POST["del"];

      if (isset($_POST["quantity"])) { $botonCantidad=$_POST["quantity"]; } else { $botonCantidad="no"; }
      if (isset($_POST["pvp"])) { $botonPvp=$_POST["pvp"]; } else { $botonPvp="no"; }
      if (isset($_POST["pvpventaFaro"])) {$botonPvpVentaFaro=$_POST["pvpventaFaro"]; } else { $botonPvpVentaFaro="no"; }
      if (isset($_POST["barcode"])) { $botonBarcode=$_POST["barcode"]; } else { $botonBarcode="no"; }

      if (isset($_POST["nombreCsv"])) { $botonNombreCsv=$_POST["nombreCsv"]; } else { $botonNombreCsv="no"; }
      if (isset($_POST["stockCsv"])) { $botonStockCsv=$_POST["stockCsv"]; } else { $botonStockCsv="no"; }
      if (isset($_POST["pvpVentaCsv"])) { $botonPvpVentaCsv=$_POST["pvpVentaCsv"]; } else { $botonPvpVentaCsv="no"; }
      if (isset($_POST["pvpRecomendadoCsv"])) { $botonPvpRecomendadoCsv=$_POST["pvpRecomendadoCsv"]; } else { $botonPvpRecomendadoCsv="no"; }
      if (isset($_POST["eanCodeCsv"])) { $botonCodeCsv=$_POST["eanCodeCsv"]; } else { $botonCodeCsv="no"; }

      /************LECTURA DE CSV*/
      /****************************************************************************************METER CSV DE FARO*/
        $fila=0;
        $ref=-1;
        $cant=-1;
        $pvp=-1;
        $pvpventa=-1;
        $barcode=-1;
        $des=-1;
        $total=0;
        if (($gestor0 = fopen($filecsvFaro,"r")) !== FALSE){

          while (($datos0 = fgetcsv($gestor0,0,$delimitadorFaro)) !== FALSE){

            $numero0 = count ($datos0);

            for($c=0; $c < $numero0; $c++){
              if ($datos0[$c] == "Reference"){
                $ref = $c;
              } elseif ($datos0[$c] == "Descripition"){
                $des = $c;
              } elseif ($datos0[$c] == "Quantity"){
                $cant = $c;
              } elseif ($datos0[$c] == "PVP"){
                $pvp = $c;
              } elseif ($datos0[$c] == "pvpventa"){
                $pvpventa = $c;
              }elseif ($datos0[$c] == "Barcode"){
                $barcode = $c;
              }
            }

            if ($fila > 0){
                if ($cant !== -1) {
                  if (trim($datos0[$cant]) == "Available"){ $cant1=30; } else { $cant1=0; }
                } else { $cant1= " "; }

                if ($ref !== -1) { $ref1=trim($datos0[$ref]); } else { $ref1 = " "; }
                if ($pvp !== -1) { $pvp1=trim($datos0[$pvp]); } else { $pvp1 = " "; }
                if ($pvpventa !== -1) { $pvpventa1=trim($datos0[$pvpventa]); } else { $pvpventa1 = " "; }
                if ($barcode !== -1) { $barcode1=trim($datos0[$barcode]); } else { $bsrcode1 = " "; }
                if ($des !== -1) { $des1=trim($datos0[$des]); } else { $des1 = " "; }

                $sql = "INSERT INTO stockfaro (Reference, Descripition, Quantity, PVP, pvpventa, Barcode) VALUES ('$ref1', '$des1', '$cant1','$pvp1', '$pvpventa1','$barcode1')";
                if (mysqli_query($conn, $sql)) {
                      //echo "New record created successfully";
                      $total++;
                } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn)."</br>";
                }
            }
            $fila++;
          }
          echo "</br>"."Se han introducido " . $total . " filas del Stock de faro"."</br>"."</br>";
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
                if($name1 !== -1){ $name=trim($datos1[$name1]); } else{ $name=" "; }
                if($qTyStock1 !== -1){ $qTyStock=trim($datos1[$qTyStock1]); } else{ $qTyStock=" "; }
                if($price1 !== -1){ $price=trim($datos1[$price1]); } else{ $price=" "; }
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
  /**************ALMACENAMOS DATOS FARO*/
  $consulta0 = "SELECT * FROM stockfaro";

  if ($resultado0=mysqli_query($conn, $consulta0)) {
      $j=0;
      while ($row0 = mysqli_fetch_assoc($resultado0)) {
          $faroReference[$j] = trim($row0['Reference']);
          $faroDescription[$j] = trim($row0['Descripition']);
          $faroQuantity[$j] = trim($row0['Quantity']);
          $faroPvp[$j] = trim($row0['PVP']);
          $faroPvpVenta[$j] = trim($row0['pvpventa']);
          $faroBarCode[$j] = trim($row0['Barcode']);
          $j++;
      }

      $totalFaro = $j;
      mysqli_free_result($resultado0);
    }
  // echo "Total filas faro cogidas: " .$totalFaro. "</br>";

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
  /********************************************************************************************** ACTUALIZO STOCK, PVP Y EAN */
    $totalSi=0;
    $totalNoModificados=0;
    $totalSi=0;
    if ($botonCantidad=="yes"){
            for ($s=0; $s < $totalFaro; $s++){
                  if ($faroQuantity[$s] == '30'){
                    $sql2 = "UPDATE stock SET stock='$faroQuantity[$s]' WHERE sku = '$faroReference[$s]'";
                    if (mysqli_query($conn, $sql2)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
                    }
                  } elseif ($faroQuantity[$s] == '0') {
                    $sql2 = "UPDATE stock SET stock='$faroQuantity[$s]' WHERE sku = '$faroReference[$s]'";
                    if (mysqli_query($conn, $sql2)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
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
                  $precioTotal=0.0;
                  $precioTotalVenta=0.0;
                  for ($s=0; $s < $totalFaro; $s++){
                      if($skuDoble[0] == $faroReference[$s]){
                          $skuBool1 = true;
                          if ($botonPvp=="yes"){
                            $aux = str_replace(',','.',$faroPvp[$s]);
                            $precioTotal = $precioTotal + floatval($aux);
                          }
                          if ($botonPvpVentaFaro=="yes"){
                            $aux_venta = $faroPvpVenta[$s];
                            $precioTotalVenta = $precioTotalVenta + floatval($aux_venta);
                          }
                      }
                  }
                  for ($s=0; $s < $totalFaro; $s++){
                      if($skuDoble[1] == $faroReference[$s]){
                          $skuBool2 = true;
                          if ($botonPvp=="yes"){
                            $aux = str_replace(',','.',$faroPvp[$s]);
                            $precioTotal = $precioTotal + floatval($aux);
                          }

                          if ($botonPvpVentaFaro=="yes"){
                            $aux_venta = $faroPvpVenta[$s];
                            $precioTotalVenta = $precioTotalVenta + floatval($aux_venta);
                          }
                      }
                  }

                  if($skuBool1==true && $skuBool2==true){
                    if ($botonPvp=="yes" && $botonPvpRecomendadoCsv =="yes"){
                        $precioMod = floatval($precioTotal);
                        $precioMod2 = number_format($precioMod,2,".","");
                        $precioMod_aux = str_replace('.',',',$precioMod2);
                        $sql5 = "UPDATE stock SET pvprecomendado='$precioMod_aux' WHERE sku = '$stockSku[$m]'";
                        mysqli_query($conn, $sql5);
                    }
                    if ($botonPvpVentaFaro=="yes" && $botonPvpVentaCsv =="yes"){
                        $precioModVenta = floatval($precioTotalVenta);
                        $precioMod2Venta = number_format($precioModVenta,2,".","");
                        $sql5 = "UPDATE stock SET pvpventa='$precioMod2Venta' WHERE sku = '$stockSku[$m]'";
                        mysqli_query($conn, $sql5);
                    }
                    //echo "</br>"."El Sku: ".$stockSku[$m]." esta en el csv de Faro "."</br>";
                    $sql4 = "UPDATE stock SET stock='30' WHERE sku = '$stockSku[$m]'";
                    if (mysqli_query($conn, $sql4)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
                    }
                  } else {
                    //echo "</br>"."El Sku: ".$stockSku[$m]." NO esta en el csv de Faro "."</br>";
                  }


              }
            }
    }
    if ($botonPvp=="yes" && $botonPvpRecomendadoCsv =="yes"){
            $precioMod=0;
            for ($s=0; $s < $totalFaro; $s++){
                  if ($faroQuantity[$s] == '30'){
                    $aux = str_replace(',','.',$faroPvp[$s]);
                    $precioMod = floatval($aux);
                    $precioMod2 = number_format($precioMod,2,".","");
                    $aux2 = str_replace('.',',',$precioMod2);
                    $sql2 = "UPDATE stock SET pvprecomendado='$aux2' WHERE sku = '$faroReference[$s]'";
                    if (mysqli_query($conn, $sql2)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
                    }
                  }
            }
    }
    if ($botonPvpVentaFaro=="yes" && $botonPvpVentaCsv =="yes"){
            $precioModVenta1=0;
            for ($s=0; $s < $totalFaro; $s++){
                  if ($faroQuantity[$s] == '30'){
                    $aux_venta1 = str_replace(',','.',$faroPvpVenta[$s]);
                    $precioModVenta1 = floatval($aux_venta1);
                    $precioMod2Venta1 = number_format($precioModVenta1,2,".",",");
                    $aux2_venta = str_replace(',','.',$precioMod2Venta1);
                    $sql2 = "UPDATE stock SET pvpventa='$aux2_venta' WHERE sku = '$faroReference[$s]'";
                    if (mysqli_query($conn, $sql2)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
                    }
                  }
            }
    }
    if ($botonBarcode=="yes"){
            for ($s=0; $s < $totalFaro; $s++){
                  if ($faroQuantity[$s] == '30'){
                    $sql2 = "UPDATE stock SET ean='$faroBarCode[$s]' WHERE sku = '$faroReference[$s]'";
                    if (mysqli_query($conn, $sql2)) {
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
  $fechahoy=date('d-m-y');
  $csv_file = "oxatis-Faro-Actualizado-".$fechahoy.".csv";
  $csv='"idoxatis"'.$csv_sep.'"sku"';
  if ($botonNombreCsv=="yes"){ $csv.=$csv_sep.'"nombre"'; }
  if ($botonStockCsv=="yes") { $csv.=$csv_sep.'"stock"'; }
  if ($botonPvpVentaCsv=="yes" && $botonPvpVentaFaro=="yes") { $csv.=$csv_sep.'"pvpventa"'; }
  if ($botonPvpRecomendadoCsv=="yes" && $botonPvp=="yes") { $csv.=$csv_sep.'"pvprecomendado"'; }
  if ($botonCodeCsv=="yes") { $csv.=$csv_sep.'"ean"'; }
  $csv.=$csv_end;
  $sql="SELECT * from stock";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
    $csv.=$row['idoxatis'].$csv_sep.$row['sku'];
    if ($botonNombreCsv=="yes"){ $csv.=$csv_sep.$row['nombre']; }
    if ($botonStockCsv=="yes") { $csv.=$csv_sep.$row['stock']; }
    if ($botonPvpVentaCsv=="yes" && $botonPvpVentaCsv=="yes") { $csv.=$csv_sep.$row['pvpventa']; }
    if ($botonPvpRecomendadoCsv=="yes" && $botonPvp=="yes") { $csv.=$csv_sep.$row['pvprecomendado']; }
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

/********************************************************************************************** CALCULO SKU QUE NO ESTAN EN LA BD DE FARO */
    $h=0;
    for($m=0; $m<$totalStock; $m++){

        if(strpos($stockSku[$m],'+')){
          if ( strpos($stockSku[$m],'+') ){
            $char="+";
          }
          $skuDoble = explode($char, $stockSku[$m]);

          $skuBool1=false;
          $skuBool2=false;
          $precioTotal=0.0;
          for ($s=0; $s < $totalFaro; $s++){
              if($skuDoble[0] == $faroReference[$s]){
                  $skuBool1 = true;
              }
          }
          for ($s=0; $s < $totalFaro; $s++){
              if($skuDoble[1] == $faroReference[$s]){
                  $skuBool2 = true;
              }
          }

          if(!($skuBool1==true && $skuBool2==true)){
              //echo "Este sku no esta en la BD de Faro: ".$stockSku[$m]."</br>";
              $skuNoSimple[$h]=$stockSku[$m];
              $h++;
          }


      } else {

          $sql7 = "SELECT Reference FROM stockfaro WHERE Reference = '$stockSku[$m]'";
          $resultado_AUX = mysqli_query($conn, $sql7);
          if ($resultado_AUX) {
                if (!$row_AUX = mysqli_fetch_assoc($resultado_AUX)) {
                  //echo "Este sku no esta en la BD de Faro: ".$stockSku[$m]."</br>";
                  $skuNoSimple[$h]=$stockSku[$m];
                  $h++;
                }
          }
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
              $visibleNo[$i] = $row['visible'];
          }
          mysqli_free_result($resultado);
        }
    }

    ?>

        <table align="center" id="tableNo">
          <caption>ARTÍCULOS QUE NO ESTÁN EN EL CSV DE FARO - <?php echo $totalNo; ?> artículos<caption>
            <tr>
              <th scope="col"><b>idOxatis</b></td>
              <th scope="col"><b>sku</b></td>
              <th scope="col"><b>Nombre</b></td>
              <th scope="col"><b>Publicado</b></td>
            </tr>
            <?php
          for($z=0; $z<$totalNo; $z++){
           ?>
          <tr>
            <td><?php print $idOxNo[$z]; ?></td>
            <td><?php print $skuNo[$z]; ?></td>
            <td><?php print $nombreNo[$z]; ?></td>
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
