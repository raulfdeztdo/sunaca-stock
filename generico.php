<?php include 'head.php'; ?>
<script type="text/javascript">
  function predefinir() {
    var check = document.getElementById("checkPrede").checked
    if (check) {
      document.getElementById("sku").value = "sku"
      document.getElementById("nombre").value = "nombre"
      document.getElementById("stock").value = "stock"
      document.getElementById("pvpventa").value = "pvpventa"
      document.getElementById("pvp").value = "pvprecomendado"
      document.getElementById("barcode").value = "ean"
    } else {
      document.getElementById("sku").value = ""
      document.getElementById("nombre").value = ""
      document.getElementById("stock").value = ""
      document.getElementById("pvpventa").value = ""
      document.getElementById("pvp").value = ""
      document.getElementById("barcode").value = ""
    }
  }

  function predefinir2(img) {
    var img = img.getAttribute("value")
    if (img == "datos-ajp") {
      document.getElementById("sku").value = "REFERENCIA"
      document.getElementById("stock").value = "DISPONIBLE_SINCRONIZACION"
      document.getElementById("pvpventa").value = ""
      document.getElementById("nombre").value = "DESCRIPCION"
      document.getElementById("barcode").value = "EAN"
      document.getElementById("del").value = ";"
      document.getElementById("faro-inf").style.display = 'none'
      document.getElementById("leds-inf").style.display = 'none'
      document.getElementById("mantra-inf").style.display = 'none'
      document.getElementById("ajp-inf").style.display = ''
      document.getElementById("sulion-inf").style.display = 'none'
      document.getElementById("proveedor").value = "ajp"
    }
    if (img == "datos-sulion") {
      document.getElementById("sku").value = "CODE"
      document.getElementById("stock").value = "STOCK"
      document.getElementById("pvpventa").value = ""
      document.getElementById("nombre").value = "DESCRIPTION"
      document.getElementById("barcode").value = "EAN"
      document.getElementById("del").value = ";"
      document.getElementById("faro-inf").style.display = 'none'
      document.getElementById("leds-inf").style.display = 'none'
      document.getElementById("mantra-inf").style.display = 'none'
      document.getElementById("ajp-inf").style.display = 'none'
      document.getElementById("sulion-inf").style.display = ''
      document.getElementById("proveedor").value = "sulion"
    }
  }
</script>

<body>

  <?php include 'conexion.php'; ?>
  <?php include 'header.php'; ?>

  <section id="main-content">

    <article>
      <header style="min-height: 280px; display: grid; align-items: center">
        <h1>Generico</h1>
      </header>


      <div class="content">

        <?php
  if(!$_POST){
    ?>
        <form action="generico.php" method="post" method="post" style=" padding: 0 5%">
          <input type="hidden" name="proveedor" value="" id="proveedor">
          <div class="card mb-3 justify-content-center">
            <div class="card-header text-white bg-dark">
              <h5>Autocompletado Proveedores</h5>
            </div>
            <div class="row justify-content-center" style="width: auto">
              <div class="col-md-12">
                <div class="card-body">
                  <button type="button" class="img-thumbnail mr-3" name="button"><img src="img/ajp-logo.png"  alt="logo-ajp" style="height: 120px" id="img-ajp" value="datos-ajp" onclick="predefinir2(this)"></button>
                  <button type="button" class="img-thumbnail mr-3" name="button2"><img src="img/sulion-logo.png" alt="logo-sulion" style="height: 120px" id="img-sulion" value="datos-sulion" onclick="predefinir2(this)"></button>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header text-white bg-dark">
              <h5>CSV Stock Proveedor</h5>
            </div>
            <div class="card-body row justify-content-center">
              <div class="form-inline justify-content-center" style="width: 100%">
                <div class="row" style="padding: 2%; width: 70%">
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Delimitador
                        </div>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="del" id="del" value=";" style="width: 40px" required>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Sku</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="sku" id="sku" style="width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="nombre" id="nombre" style="width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Stock</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="quantity" id="stock" style=" width: 130px">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">PVP Venta</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="pvpventa" id="pvpventa" style="width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">PVP Recomendado</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="pvp" id="pvp" style="width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Codigo EAN</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="barcode" id="barcode" style="width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input form-control-sm" name="predefinido" id="checkPrede" value="1" onclick="predefinir()">
                            <label class="custom-control-label" for="checkPrede"></label>
                          </div>
                        </div>
                      </div>
                      <input type="text" class="form-control mr-sm-2" value="Columnas predefinidas" style="background-color: white" disabled>
                    </div>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="myInput" name="csvfilegenerico" value="" required>
                    <label class="custom-file-label" for="myInput">CSV Stock - PROVEEDOR</label>
                  </div>
                </div>
              </div>
              <div class="alert alert-secondary" role="alert" style="max-width: 50rem; color: #7d7d7d">
                <li type="disc">Si se marca la casilla de "Columnas predefinidas", los titulos de las columnas son los siguientes: "sku", "nombre", "stock", "pvpventa", "pvprecomendado", "ean"</li>
                <li type="disc">Si los titulos van a ser diferentes, escribir el titulo del CSV de Stock en cada casilla.</li>
                <li type="disc">Delimitador por defecto: ;</li>
                <li type="disc">Las columnas que esten vacías no se tomaran en cuenta</li>
              </div>

            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header text-white bg-dark">
              <h5>CSV Stock Oxatis Genérico</h5>
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
      $sql0 = "TRUNCATE TABLE generico";
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


      $filecsvGenerico="Oxatis/Generico/".$_POST["csvfilegenerico"];
      $filecsvStock="Oxatis/Generico/".$_POST["csvfilestock"];
      $nombreAjp=false;
      $nombreSulion=false;
      $delimitador=$_POST["del"];
      if (isset($_POST["sku"])) { $fieldSku=$_POST["sku"]; } else { $fieldSku=0; }
      if (isset($_POST["nombre"])) { $fieldNombre=$_POST["nombre"]; } else { $fieldNombre=0; }
      if (isset($_POST["quantity"])) { $fieldStock=$_POST["quantity"]; } else { $fieldStock=0; }
      if (isset($_POST["pvpventa"])) { $fieldPVPVenta=$_POST["pvpventa"]; } else { $fieldPVPVenta=0; }
      if (isset($_POST["pvp"])) { $fieldPVPRecomendado=$_POST["pvp"]; } else { $fieldPVPRecomendado=0; }
      if (isset($_POST["barcode"])) { $fieldEan=$_POST["barcode"]; } else { $fieldEan=0; }

      if (isset($_POST["proveedor"])){
        if ( $_POST["proveedor"] == "ajp") { $nombreAjp=true; }
        if ( $_POST["proveedor"] == "sulion") { $nombreSulion=true; }
      }


      if (isset($_POST["nombreCsv"])) { $botonNombreCsv=$_POST["nombreCsv"]; } else { $botonNombreCsv="no"; }
      if (isset($_POST["stockCsv"])) { $botonStockCsv=$_POST["stockCsv"]; } else { $botonStockCsv="no"; }
      if (isset($_POST["pvpVentaCsv"])) { $botonPvpVentaCsv=$_POST["pvpVentaCsv"]; } else { $botonPvpVentaCsv="no"; }
      if (isset($_POST["pvpRecomendadoCsv"])) { $botonPvpRecomendadoCsv=$_POST["pvpRecomendadoCsv"]; } else { $botonPvpRecomendadoCsv="no"; }
      if (isset($_POST["eanCodeCsv"])) { $botonCodeCsv=$_POST["eanCodeCsv"]; } else { $botonCodeCsv="no"; }

      /************LECTURA DE CSV*/
      /****************************************************************************************METER CSV DE PROVEEDOR*/
        $fila=0;
        $sku=-1;
        $nombre=-1;
        $stock=-1;
        $pvprecomendado=-1;
        $pvpventa=-1;
        $ean=-1;
        $total=0;
        if (($gestor0 = fopen($filecsvGenerico,"r")) !== FALSE){

          while (($datos0 = fgetcsv($gestor0,0,$delimitador)) !== FALSE){

            $numero0 = count ($datos0);

            for($c=0; $c < $numero0; $c++){
              //echo $datos0[$c]."</br>";
              if (utf8_encode($datos0[$c]) == $fieldSku){
                $sku = $c;
              } elseif (utf8_encode($datos0[$c]) == $fieldNombre){
                $nombre = $c;
              } elseif (utf8_encode($datos0[$c]) == $fieldStock){
                $stock = $c;
              } elseif (utf8_encode($datos0[$c]) == $fieldPVPVenta){
                $pvpventa = $c;
              } elseif (utf8_encode($datos0[$c]) == $fieldPVPRecomendado){
                $pvprecomendado = $c;
              }elseif (utf8_encode($datos0[$c]) == $fieldEan){
                $ean = $c;
              }
            }

            if ($fila > 0){

                if ( $nombreAjp == true ) {
                  if ( trim($datos0[$stock]) == "0" || trim($datos0[$stock]) == "5" ) { $stock_aux = 0; }
                  if ( trim($datos0[$stock]) == "20" ) { $stock_aux = 5; }
                  if ( trim($datos0[$stock]) == "30" ) { $stock_aux = 20; }
                }
                elseif ( $nombreSulion == true ) {
                  $num_aux = number_format($datos0[$stock]);
                  if ( $num_aux < 10 ) { $stock_aux = 0; }
                  if ( $num_aux >= 10 || $num_aux <= 20 ) { $stock_aux = 5; }
                  if ( $num_aux > 20 ) { $stock_aux = 20; }
                } else {
                  $NUM_AUX = floatval($datos0[$stock]);
                  $stock_aux = $NUM_AUX;
                }

                if ($sku !== -1) { $sku1=trim($datos0[$sku]); } else { $sku1 = " "; }
                if ($nombre !== -1) { $nombre1=trim(utf8_encode($datos0[$nombre])); } else { $nombre1 = " "; }
                if ($stock !== -1) { $stock1=$stock_aux; } else { $stock1 = " "; }
                if ($pvprecomendado !== -1) { $pvprecomendado1=trim($datos0[$pvprecomendado]); } else { $pvprecomendado1 = " "; }
                if ($pvpventa !== -1) { $pvpventa1=trim($datos0[$pvpventa]); } else { $pvpventa1 = " "; }
                if ($ean !== -1) { $ean1=trim($datos0[$ean]); } else { $ean1 = " "; }

                $sql = "INSERT INTO generico (sku, nombre, stock, pvpventa, pvprecomendado, ean) VALUES ('$sku1', '$nombre1', '$stock1','$pvpventa1', '$pvprecomendado1','$ean1')";
                if (mysqli_query($conn, $sql)) {
                      //echo "New record created successfully";
                      $total++;
                } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn)."</br>";
                }
            }
            $fila++;
          }
          echo "</br>"."Se han introducido " . $total . " filas del Stock del proveedor"."</br>"."</br>";
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
  $consulta0 = "SELECT * FROM generico";

  if ($resultado0=mysqli_query($conn, $consulta0)) {
      $j=0;
      while ($row0 = mysqli_fetch_assoc($resultado0)) {
          $genSku[$j] = trim($row0['sku']);
          $genNombre[$j] = trim($row0['nombre']);
          $genStock[$j] = trim($row0['stock']);
          $genPvpRecomendado[$j] = trim($row0['pvprecomendado']);
          $genPvpVenta[$j] = trim($row0['pvpventa']);
          $genEan[$j] = trim($row0['ean']);
          $j++;
      }

      $totalGen = $j;
      mysqli_free_result($resultado0);
    }
  // echo "Total filas faro cogidas: " .$totalGen. "</br>";

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
    if ($fieldStock !== 0){
            for ($s=0; $s < $totalGen; $s++){
                $sql2 = "UPDATE stock SET stock='$genStock[$s]' WHERE sku = '$genSku[$s]'";
                if (mysqli_query($conn, $sql2)) {
                      $totalSi++;
                } else {
                      $totalNoModificados++;
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
                  for ($s=0; $s < $totalGen; $s++){
                      if($skuDoble[0] == $genSku[$s]){
                          $skuBool1 = true;
                          if ($fieldPVPVenta !== 0){
                            $aux = str_replace(',','.',$genPvpVenta[$s]);
                            $precioTotal = $precioTotal + floatval($aux);
                          }
                          if ($fieldPVPRecomendado !== 0){
                            $aux_venta = $genPvpRecomendado[$s];
                            $precioTotalVenta = $precioTotalVenta + floatval($aux_venta);
                          }
                      }
                  }
                  for ($s=0; $s < $totalGen; $s++){
                      if($skuDoble[1] == $genSku[$s]){
                          $skuBool2 = true;
                          if ($fieldPVPVenta !== 0){
                            $aux = str_replace(',','.',$genPvpVenta[$s]);
                            $precioTotal = $precioTotal + floatval($aux);
                          }

                          if ($fieldPVPRecomendado !== 0){
                            $aux_venta = $genPvpRecomendado[$s];
                            $precioTotalVenta = $precioTotalVenta + floatval($aux_venta);
                          }
                      }
                  }

                  if($skuBool1==true && $skuBool2==true){
                    if (($fieldPVPRecomendado !== 0) && ($botonPvpRecomendadoCsv =="yes")){
                        $precioMod = floatval($precioTotal);
                        $precioMod2 = number_format($precioMod,2,".","");
                        $precioMod_aux = str_replace('.',',',$precioMod2);
                        $sql5 = "UPDATE stock SET pvprecomendado='$precioMod_aux' WHERE sku = '$stockSku[$m]'";
                        mysqli_query($conn, $sql5);
                    }
                    if (($fieldPVPVenta !== 0) && ($botonPvpVentaCsv =="yes")){
                        $precioModVenta = floatval($precioTotalVenta);
                        $precioMod2Venta = number_format($precioModVenta,2,".","");
                        $sql5 = "UPDATE stock SET pvpventa='$precioMod2Venta' WHERE sku = '$stockSku[$m]'";
                        mysqli_query($conn, $sql5);
                    }
                    //echo "</br>"."El Sku: ".$stockSku[$m]." esta en el csv del proveedors "."</br>";
                    $sql4 = "UPDATE stock SET stock='30' WHERE sku = '$stockSku[$m]'";
                    if (mysqli_query($conn, $sql4)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
                    }
                  }

              }
            }
    }
    if (($fieldPVPRecomendado !== 0) && ($botonPvpRecomendadoCsv =="yes")){
            $precioMod=0;
            for ($s=0; $s < $totalGen; $s++){
                    $aux = str_replace(',','.',$genPvpRecomendado[$s]);
                    $precioMod = floatval($aux);
                    $precioMod2 = number_format($precioMod,2,".","");
                    $aux2 = str_replace('.',',',$precioMod2);
                    $sql2 = "UPDATE stock SET pvprecomendado='$aux2' WHERE sku = '$genSku[$s]'";
                    if (mysqli_query($conn, $sql2)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
                    }

            }
    }
    if (($fieldPVPVenta !== 0) && ($botonPvpVentaCsv =="yes")){
            $precioModVenta1=0;
            for ($s=0; $s < $totalGen; $s++){
                    $aux_venta1 = str_replace(',','.',$genPvpVenta[$s]);
                    $precioModVenta1 = floatval($aux_venta1);
                    $precioMod2Venta1 = number_format($precioModVenta1,2,".",",");
                    $aux2_venta = str_replace(',','.',$precioMod2Venta1);
                    $sql2 = "UPDATE stock SET pvpventa='$aux2_venta' WHERE sku = '$genSku[$s]'";
                    if (mysqli_query($conn, $sql2)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
                    }
            }
    }
    if ($fieldEan !== 0){
            for ($s=0; $s < $totalGen; $s++){
                    $sql2 = "UPDATE stock SET ean='$genEan[$s]' WHERE sku = '$genSku[$s]'";
                    if (mysqli_query($conn, $sql2)) {
                          $totalSi++;
                    } else {
                          $totalNoModificados++;
                    }
            }
    }
/********************************************************************************************** GENERO CSV NUEVO */

  $csv_end = "
";
  $csv_sep = ";";
  $fechahoy = date('d-m-y');
  $csv_file = "oxatis-Generico-Actualizado-".$fechahoy.".csv";
  $csv='"idoxatis"'.$csv_sep.'"sku"';
  if ($botonNombreCsv=="yes"){ $csv.=$csv_sep.'"nombre"'; }
  if ($botonStockCsv=="yes") { $csv.=$csv_sep.'"stock"'; }
  if ($botonPvpVentaCsv=="yes" && $fieldPVPVenta !== 0) { $csv.=$csv_sep.'"pvpventa"'; }
  if ($botonPvpRecomendadoCsv=="yes" && $fieldPVPRecomendado !== 0) { $csv.=$csv_sep.'"pvprecomendado"'; }
  if ($botonCodeCsv=="yes") { $csv.=$csv_sep.'"ean"'; }
  $csv.=$csv_end;
  $sql="SELECT * from stock";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res))
  {
    $csv.=$row['idoxatis'].$csv_sep.$row['sku'];
    if ($botonNombreCsv=="yes"){ $csv.=$csv_sep.$row['nombre']; }
    if ($botonStockCsv=="yes" && $fieldPVPVenta !== 0) { $csv.=$csv_sep.$row['stock']; }
    if ($botonPvpVentaCsv=="yes" && $botonPvpVentaCsv=="yes") { $csv.=$csv_sep.$row['pvpventa']; }
    if ($botonPvpRecomendadoCsv=="yes" && $fieldPVPRecomendado !== 0) { $csv.=$csv_sep.$row['pvprecomendado']; }
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

/********************************************************************************************** CALCULO SKU QUE NO ESTAN EN LA BD DEL PROVEEDOR */
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
          for ($s=0; $s < $totalGen; $s++){
              if($skuDoble[0] == $genSku[$s]){
                  $skuBool1 = true;
              }
          }
          for ($s=0; $s < $totalGen; $s++){
              if($skuDoble[1] == $genSku[$s]){
                  $skuBool2 = true;
              }
          }

          if(!($skuBool1==true && $skuBool2==true)){
              //echo "Este sku no esta en la BD del proveedor: ".$stockSku[$m]."</br>";
              $skuNoSimple[$h]=$stockSku[$m];
              $h++;
          }


      } else {

          $sql7 = "SELECT sku FROM generico WHERE sku = '$stockSku[$m]'";
          $resultado_AUX = mysqli_query($conn, $sql7);
          if ($resultado_AUX) {
                if (!$row_AUX = mysqli_fetch_assoc($resultado_AUX)) {
                  //echo "Este sku no esta en la BD del proveedor: ".$stockSku[$m]."</br>";
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
          <caption>ARTÍCULOS QUE NO ESTÁN EN EL CSV DEL PROVEEDOR - <?php echo $totalNo; ?> artículos<caption>
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
