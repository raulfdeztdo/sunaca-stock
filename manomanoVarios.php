<?php include 'head.php'; ?>
<script type="text/javascript">
  function predefinir(img) {
    var img = img.getAttribute("value")
    if (img == "datos-faro") {
      document.getElementById("sku").value = "Reference"
      document.getElementById("stock").value = "Quantity"
      document.getElementById("pvpventa").value = "pvpventa"
      document.getElementById("pvpRecomendado").value = "PVP"
      document.getElementById("eancode").value = "Barcode"
      document.getElementById("del").value = "|"
      document.getElementById("faro-inf").style.display = ''
      document.getElementById("leds-inf").style.display = 'none'
      document.getElementById("mantra-inf").style.display = 'none'
      document.getElementById("ajp-inf").style.display = 'none'
      document.getElementById("sulion-inf").style.display = 'none'
      document.getElementById("otro-inf").style.display = 'none'
      document.getElementById("marca").value = "FARO"
      document.getElementById("marca").readOnly = true;
    }
    if (img == "datos-leds") {
      document.getElementById("sku").value = "article"
      document.getElementById("stock").value = "stock"
      document.getElementById("pvpventa").value = ""
      document.getElementById("pvpRecomendado").value = ""
      document.getElementById("eancode").value = ""
      document.getElementById("del").value = ";"
      document.getElementById("faro-inf").style.display = 'none'
      document.getElementById("leds-inf").style.display = ''
      document.getElementById("mantra-inf").style.display = 'none'
      document.getElementById("ajp-inf").style.display = 'none'
      document.getElementById("sulion-inf").style.display = 'none'
      document.getElementById("otro-inf").style.display = 'none'
      document.getElementById("marca").value = "LEDS-C4"
      document.getElementById("marca").readOnly = true;
    }
    if (img == "datos-mantra") {
      document.getElementById("sku").value = "sku"
      document.getElementById("stock").value = "stock"
      document.getElementById("pvpventa").value = ""
      document.getElementById("pvpRecomendado").value = ""
      document.getElementById("eancode").value = ""
      document.getElementById("del").value = ";"
      document.getElementById("faro-inf").style.display = 'none'
      document.getElementById("leds-inf").style.display = 'none'
      document.getElementById("mantra-inf").style.display = ''
      document.getElementById("ajp-inf").style.display = 'none'
      document.getElementById("sulion-inf").style.display = 'none'
      document.getElementById("otro-inf").style.display = 'none'
      document.getElementById("marca").value = "MANTRA"
      document.getElementById("marca").readOnly = true;
    }
    if (img == "datos-ajp") {
      document.getElementById("sku").value = "REFERENCIA"
      document.getElementById("stock").value = "DISPONIBLE_SINCRONIZACION"
      document.getElementById("pvpventa").value = ""
      document.getElementById("eancode").value = "EAN"
      document.getElementById("del").value = ";"
      document.getElementById("faro-inf").style.display = 'none'
      document.getElementById("leds-inf").style.display = 'none'
      document.getElementById("mantra-inf").style.display = 'none'
      document.getElementById("ajp-inf").style.display = ''
      document.getElementById("sulion-inf").style.display = 'none'
      document.getElementById("otro-inf").style.display = 'none'
      document.getElementById("marca").value = "AJP"
      document.getElementById("marca").readOnly = true;
    }
    if (img == "datos-sulion") {
      document.getElementById("sku").value = "CODE"
      document.getElementById("stock").value = "STOCK"
      document.getElementById("pvpventa").value = ""
      document.getElementById("eancode").value = "EAN"
      document.getElementById("del").value = ";"
      document.getElementById("faro-inf").style.display = 'none'
      document.getElementById("leds-inf").style.display = 'none'
      document.getElementById("mantra-inf").style.display = 'none'
      document.getElementById("ajp-inf").style.display = 'none'
      document.getElementById("sulion-inf").style.display = ''
      document.getElementById("otro-inf").style.display = 'none'
      document.getElementById("marca").value = "SULION"
      document.getElementById("marca").readOnly = true;
    }
    if (img == "datos-otro") {
      document.getElementById("sku").value = ""
      document.getElementById("stock").value = ""
      document.getElementById("pvpventa").value = ""
      document.getElementById("eancode").value = ""
      document.getElementById("del").value = ";"
      document.getElementById("faro-inf").style.display = 'none'
      document.getElementById("leds-inf").style.display = 'none'
      document.getElementById("mantra-inf").style.display = 'none'
      document.getElementById("ajp-inf").style.display = 'none'
      document.getElementById("sulion-inf").style.display = 'none'
      document.getElementById("marca").value = ""
      document.getElementById("marca").readOnly = false;
    }
  }
</script>

<body>

  <?php include 'conexion.php'; ?>
  <?php include 'header.php'; ?>


  <section id="main-content">

    <article>
      <header style="min-height: 280px; display: grid; align-items: center">
        <h1><img src="img/manomanologo.jpg" alt="logo-amazon" width="300"></h1>
      </header>

      <div class="content">
        <?php if(!$_POST) { ?>
        <form action="manomanoVarios.php" method="post" style=" padding: 0 3%">
          <input type="hidden" name="proveedor" value="" id="proveedor">
          <div class="card mb-3 justify-content-center">
            <div class="card-header text-white bg-dark">
              <h5>Autocompletado Proveedores</h5>
            </div>
            <div class="row justify-content-center" style="width: auto">
              <div class="col-md-12">
                <div class="card-body">
                  <button type="button" class="img-thumbnail mr-2 mb-2" name="button"><img src="img/logo-faro-sunaca.jpg" alt="logo-faro" style="height: 80px" id="img-faro" value="datos-faro" onclick="predefinir(this)"></button>
                  <button type="button" class="img-thumbnail mr-2 mb-2" name="button2"><img src="img/logo-ledsc4.jpg" alt="logo-LedsC4" style="height: 80px" id="img-leds" value="datos-leds" onclick="predefinir(this)"></button>
                  <button type="button" class="img-thumbnail mr-2 mb-2" name="button3"><img src="img/mantra-logo.jpg" alt="logo-Mantra" style="height: 80px" id="img-mantra" value="datos-mantra" onclick="predefinir(this)"></button>
                  <button type="button" class="img-thumbnail mr-2 mb-2" name="button4"><img src="img/ajp-logo.png" alt="logo-ajp" style="height: 80px" id="img-ajp" value="datos-ajp" onclick="predefinir(this)"></button>
                  <button type="button" class="img-thumbnail mr-2 mb-2" name="button5"><img src="img/sulion-logo.png" alt="logo-sulion" style="height: 80px" id="img-sulion" value="datos-sulion" onclick="predefinir(this)"></button>
                  <button type="button" class="img-thumbnail mr-2 mb-2" name="button6"><img src="img/otro-logo.png" alt="logo-otro" alt="logo-ajp" style="height: 80px" id="img-otro" value="datos-otro" onclick="predefinir(this)"></button>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header text-white bg-dark">
              <h5>CSV Mano Mano</h5>
            </div>
            <div class="card-body row justify-content-center">
              <div class="form-inline justify-content-center" style="width: 100%">
                <div class="row" style="padding: 2%; width: 70%">
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input form-control-sm" name="checkStock" id="checkStock" value="yes" checked>
                            <label class="custom-control-label" for="checkStock"></label>
                          </div>
                        </div>
                      </div>
                      <input type="text" class="form-control mr-sm-2" value="Stock" style="background-color: white" disabled>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input form-control-sm" name="checkVenta" id="checkVenta" value="yes">
                            <label class="custom-control-label" for="checkVenta"></label>
                          </div>
                        </div>
                      </div>
                      <input type="text" class="form-control mr-sm-2" value="PVP Venta" style="background-color: white" disabled>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input form-control-sm" name="checkRecomendado" id="checkRecomendado" value="yes">
                            <label class="custom-control-label" for="checkRecomendado"></label>
                          </div>
                        </div>
                      </div>
                      <input type="text" class="form-control mr-sm-2" value="PVP Recomendado" style="background-color: white" disabled>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input form-control-sm" name="checkEan" id="checkEan" value="yes">
                            <label class="custom-control-label" for="checkEan"></label>
                          </div>
                        </div>
                      </div>
                      <input type="text" class="form-control mr-sm-2" value="Codigo EAN" style="background-color: white" disabled>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input form-control-sm" name="checkElimina" id="checkElimina" value="yes">
                            <label class="custom-control-label" for="checkElimina"></label>
                          </div>
                        </div>
                      </div>
                      <input type="text" class="form-control mr-sm-2" value="Elimina" style="background-color: white" disabled>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Dias para enviarlo</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="diasMM" id="diasMM" style="width: 100px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Marca</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="marca" id="marca" style="width: 100px">
                    </div>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="myInput" name="filemanomano" value="" required>
                    <label class="custom-file-label" for="myInput">CSV Mano Mano</label>
                  </div>
                </div>
              </div>
              <div class="alert alert-secondary" role="alert" style="max-width: 50rem; color: #7d7d7d">
                <li type="disc">Aqui hay que enviar el CSV de ManoMano y clickar sobre los atributos que quieres que se actualicen</li>
                <li type="disc">Asegurarse que los ficheros estan en su carpeta <b>/ManoMano/"Proveedor"</b> o si es otro proveedor que no sale arriba en la misma carpeta de <b>/ManoMano</b> </li>
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
                        <span class="input-group-text">Sku</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="sku" id="sku" style="width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Stock</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="stock" id="stock" style=" width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">PVP Recomendado</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="pvpRecomendado" id="pvpRecomendado" style="width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Precio Envio</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="precioEnvio" id="precioEnvio" style="width: 130px">
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
                        <span class="input-group-text">Codigo EAN</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="eancode" id="eancode" style="width: 130px">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Delimitador</span>
                      </div>
                      <input type="text" class="form-control mr-sm-2" name="del" id="del" style="width: 130px">
                    </div>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="myInput2" name="filestock" value="" required>
                    <label class="custom-file-label" for="myInput2">CSV Stock - PROVEEDOR</label>
                  </div>
                </div>
              </div>
              <div class="alert alert-secondary" id="faro-inf" role="alert" style="max-width: 50rem; color: #7d7d7d; display: none">
                <li type="disc">Para Faro, haz click en la imagen para cargar los nombres de las columnas predefinidas</li>
                <li type="disc">Las columnas que se queden vacias no se tendran en cuenta, comprobar que el delimitador es el correcto del CSV</li>
                <li type="disc">El delimitador por defecto será | </li>
              </div>
              <div class="alert alert-secondary" id="leds-inf" role="alert" style="max-width: 50rem; color: #7d7d7d; display: none">
                <li type="disc">Para Leds C4 haz click en la imagen y cargará los nombres de las columnas de sku y stock</li>
                <li type="disc">Como delimitador por defecto en Leds C4 es ;</li>
              </div>
              <div class="alert alert-secondary" id="mantra-inf" role="alert" style="max-width: 50rem; color: #7d7d7d; display: none">
                <li type="disc">Para Mantra MUY IMPORTANTE copiar y pegar en el CSV el nombre de las columnas siguientes al principio del documento: sku;nombre;stock</li>
                <li type="disc">El delimitador por defecto será ;</li>
                <li type="disc">NO OLVIDAR concatenar los CSV de STOCK y de NO STOCK juntos, ya que solo se enviará un archivo</li>
              </div>
              <div class="alert alert-secondary" id="ajp-inf" role="alert" style="max-width: 50rem; color: #7d7d7d; display: none">
                <li type="disc">Para AJP basta con hacer click en el logo para cargar los nombres de las columnas disponibles por defecto, si se quiere meter el precio debe de ser manual metiendo el nombre de la columna en "pvpventa"</li>
                <li type="disc">El delimitador por defecto será ;</li>
              </div>
              <div class="alert alert-secondary" id="sulion-inf" role="alert" style="max-width: 50rem; color: #7d7d7d; display: none">
                <li type="disc">Para Sulion, hacer click en el logo y cargara la configuracion de nombres para este proveedor</li>
                <li type="disc">El delimitador por defecto será ;</li>
              </div>
              <div class="alert alert-secondary" id="otro-inf" role="alert" style="max-width: 50rem; color: #7d7d7d">
                Este es para seleccionar otro proveedor distinto a los de las imagenes, selecciona este, y estarán todos los datos vacíos para un nuevo proveedor</li>
              </div>
            </div>
          </div>
          <center><input type="submit" class="enviar" name="Submit" value="Enviar"></center>
        </form>
        <?php } ?>


        <?php

    if($_POST) {
      /************************************************************************* RECOGER DATOS FORM */

      $nombreFaro=false;
      $nombreMantra=false;
      $nombreLedsC4=false;
      $nombreAjp=false;
      $nombreSulion=false;


      if(isset($_POST["checkStock"])) { $checkStock = true; } else { $checkStock = false; }
      if(isset($_POST["checkVenta"])) { $checkVenta = true; } else { $checkVenta = false; }
      if(isset($_POST["checkRecomendado"])) { $checkRecomendado = true; } else { $checkRecomendado = false; }
      if(isset($_POST["checkEan"])) { $checkEan = true; } else { $checkEan = false; }
      if(isset($_POST["checkElimina"])) { $checkElimina = true; } else { $checkElimina = false; }
      if(isset($_POST["diasMM"])) { $diasMM = $_POST["diasMM"]; } else { $diasMM = "false"; }
      if(isset($_POST["marca"])) { $marcaProveedor = $_POST["marca"]; } else { $marcaProveedor = "false"; }

      if ( $marcaProveedor == "FARO" ) {
        $nombreFaro=true;
        $fileCsvManoMano = "ManoMano/Faro/".$_POST["filemanomano"];
        $fileCsvProveedor = "ManoMano/Faro/".$_POST["filestock"];
      }
      if ( $marcaProveedor == "LEDS-C4" ) {
        $nombreLedsC4=true;
        $fileCsvManoMano = "ManoMano/LedsC4/".$_POST["filemanomano"];
        $fileCsvProveedor = "ManoMano/LedsC4/".$_POST["filestock"];
      }
      if ( $marcaProveedor == "AJP" ) {
        $nombreAjp=true;
        $fileCsvManoMano = "ManoMano/Ajp/".$_POST["filemanomano"];
        $fileCsvProveedor = "ManoMano/Ajp/".$_POST["filestock"];
      }
      if ( $marcaProveedor == "MANTRA" ) {
        $nombreMantra=true;
        $fileCsvManoMano = "ManoMano/Mantra/".$_POST["filemanomano"];
        $fileCsvProveedor = "ManoMano/Mantra/".$_POST["filestock"];
      }
      if ( $marcaProveedor == "SULION" ) {
        $nombreSulion=true;
        $fileCsvManoMano = "ManoMano/Sulion/".$_POST["filemanomano"];
        $fileCsvProveedor = "ManoMano/Sulion/".$_POST["filestock"];
      }
      if ( $marcaProveedor != "FARO" && $marcaProveedor != "LEDS-C4" && $marcaProveedor != "AJP" &&  $marcaProveedor != "MANTRA" && $marcaProveedor != "SULION" ) {
        $fileCsvManoMano = "ManoMano/".$_POST["filemanomano"];
        $fileCsvProveedor = "ManoMano/".$_POST["filestock"];
      }

      if ($_POST["sku"]){ $cabeceraSku=$_POST["sku"]; } else { $cabeceraSku=0; }
      if ($_POST["stock"]){ $cabeceraStock=$_POST["stock"]; } else { $cabeceraStock=0; }
      if ($_POST["pvpventa"]){ $cabeceraPvpVenta=$_POST["pvpventa"]; } else { $cabeceraPvpVenta=0; }
      if ($_POST["pvpRecomendado"]){ $cabeceraPvpRecomendado=$_POST["pvpRecomendado"]; } else { $cabeceraPvpRecomendado=0; }
      if ($_POST["eancode"]){ $cabeceraEanCode=$_POST["eancode"]; } else { $cabeceraEanCode=0; }
      if ($_POST["precioEnvio"]){ $cabeceraPrecioEnvio=$_POST["eancode"]; } else { $cabeceraPrecioEnvio=0; }
      if ($_POST["del"]){ $delimitador=$_POST["del"]; } else { $delimitador=";"; }




      /************************************************************************* LEER TXT Y ALMACENAR DATOS MANO MANO */
      $filaMM=0;
      $datosMM=array();
      $totalMM=0;
      if (($gestor = fopen($fileCsvManoMano,"r")) !== FALSE){

        while (($datos = fgetcsv($gestor,0,";")) !== FALSE){
           $numero = count($datos);
           //echo "<p> $numero de campos en la línea $filaMM: <br /></p>\n";

           for ($c=0; $c < $numero; $c++) {
               $datosMM[$filaMM][$c]=utf8_encode($datos[$c]);
           }
           $filaMM++;
        }


        $totalMM=count($datosMM);
        $totalColumnasMM=count($datosMM[1]);
        /*echo '<pre>';
        print_r($datosMM);
        echo '</pre>';*/
        echo "</br>"."Se han introducido " . $totalMM . " filas del Stock del proveedor con ".$totalColumnasMM." columnas</br>"."</br>";
      }

      /************************************************************************* LEER CSV Y ALMACENAR DATOS DE PROVEEDOR */
      $fila=0;
      $sku=-1;
      $stock=-1;
      $pvpventa=-1;
      $pvprecomendado=-1;
      $precioEnvio=-1;
      $ean=-1;
      $total=0;
      if (($gestor0 = fopen($fileCsvProveedor,"r")) !== FALSE){

        while (($datos0 = fgetcsv($gestor0,0,$delimitador)) !== FALSE){

          $numero0 = count ($datos0);

          for($c=0; $c < $numero0; $c++){
            if ($datos0[$c] == $cabeceraSku){
              $sku = $c;
            } elseif ($datos0[$c] == $cabeceraStock && $cabeceraStock!==0){
              $stock = $c;
            } elseif ($datos0[$c] == $cabeceraPvpVenta && $cabeceraPvpVenta!==0){
              $pvpventa = $c;
            } elseif ($datos0[$c] == $cabeceraPvpRecomendado && $cabeceraPvpRecomendado!==0){
              $pvprecomendado = $c;
            } elseif ($datos0[$c] == $cabeceraEanCode && $cabeceraEanCode!==0){
              $ean = $c;
            } elseif ($datos0[$c] == $cabeceraPrecioEnvio && $cabeceraPrecioEnvio!==0){
              $precioEnvio = $c;
            }
          }

          if ($fila > 0){

            if(trim($datos0[$stock]) == "Available"){ $stock_aux=30; $nombreFaro=true; }
            elseif ( trim($datos0[$stock]) == "Low Stock" || trim($datos0[$stock]) == "Not Available"){ $stock_aux=0; }
            elseif ( trim($datos0[$stock]) == "N") { $stock_aux = 0; }
            elseif ( trim($datos0[$stock]) == "S") { $stock_aux = 4; }
            elseif ( trim($datos0[$stock]) == "Y") { $stock_aux = 10; }
            elseif ( trim($datos0[$stock]) == "L") { $stock_aux = 30; }
            elseif ( $nombreAjp == true ) {
              if ( trim($datos0[$stock]) == "0" || trim($datos0[$stock]) == "5" ) { $stock_aux = 0; }
              if ( trim($datos0[$stock]) == "20" ) { $stock_aux = 5; }
              if ( trim($datos0[$stock]) == "30" ) { $stock_aux = 20; }
            }
            elseif ( $nombreSulion == true ) {
              $num_aux = number_format($datos0[$stock]);
              if ( $num_aux < 10 ) { $stock_aux = 0; }
              if ( $num_aux >= 10 || $num_aux <= 20 ) { $stock_aux = 5; }
              if ( $num_aux > 20 ) { $stock_aux = 20; }
            }
            else {
              $NUM_AUX = floatval($datos0[$stock]);
              $stock_aux = $NUM_AUX; }

            // SOLO PARA LEDSC4
            if ($cabeceraSku == "article") {
                $nombreLedsC4=true;
                if(substr($datos0[$sku], 0, 1) == "_"){
                  $datos0[$sku] = substr($datos0[$sku], 1);
                }
                $datos0[$sku] = strtoupper($datos0[$sku]);
                //$sku_Ledc4 = explode($datos0[$sku]);
            }

            if ($sku !== -1) { $datoStock[$fila][0] = trim($datos0[$sku]); } else { $datoStock[$fila][0] = ""; }
            if ($stock !== -1) { $datoStock[$fila][1] = $stock_aux; } else { $datoStock[$fila][1] = ""; }
            if ($pvpventa !== -1) { $datoStock[$fila][2] = trim($datos0[$pvpventa]); } else { $datoStock[$fila][2] = ""; }
            if ($pvprecomendado !== -1) {
                  $datoPvpAux = str_replace(',','.',$datos0[$pvprecomendado]);
                  $datoPvpAux2 = number_format($datoPvpAux,2,",","");
                  $datoStock[$fila][3] = str_replace('.',',',$datoPvpAux2); } else { $datoStock[$fila][3] = ""; }
            if ($ean !== -1) { $datoStock[$fila][4] = trim($datos0[$ean]); } else { $datoStock[$fila][4] = ""; }
            if ($precioEnvio !== -1) { $datoStock[$fila][5] = trim($datos0[$precioEnvio]); } else { $datoStock[$fila][5] = ""; }


          }
          $fila++;
        }
        $totalProveedor=count($datoStock);
        $totalColumnasProveedor=count($datoStock[1]);
        // echo '<pre>';
        // print_r($datoStock);
        // echo '</pre>';
        echo "</br>"."Se han introducido " . $totalProveedor . " filas del Stock del proveedor con ".$totalColumnasProveedor." columnas</br>"."</br>";
      }


      /************************************************************************* ACTUALIZAR ESTRUCTURA DE DATOS DE AMAZON */

      $todos=0;
      $todosNo=0;
      $todosSi=0;

      for ($j=1; $j < $totalMM ; $j++) {
        $datosMM[$j][49] = "";
        if (trim($datosMM[$j][2]) == trim($marcaProveedor)) { $datosMM[$j][49] = "false"; $todos++;}
      }


      /* FOR ARRAYS STOCK BIDIMENSIONALES */
      for ($w=1; $w<=$totalProveedor ; $w++) {

        /* FOR ARRAYS AMAZON BIDIMENSIONALES */
            for ($x=1; $x<$totalMM ; $x++){
                  if (trim($datoStock[$w][0]) == trim($datosMM[$x][1]) && trim($datosMM[$x][2]) == trim($marcaProveedor)){
                    $datosMM[$x][8] = $datoStock[$w][1];
                    $datosMM[$x][49] = "true";
                    $todosSi++;
                    if ($diasMM !== "false" ){ $datosMM[$x][26] = $diasMM; }
                    if ($cabeceraPrecioEnvio!==0){ $datosMM[$x][19]=$datoStock[$w][5]; }
                    if ($cabeceraPvpVenta!==0 && $checkVenta==true){ $datosMM[$x][6]=$datoStock[$w][2]; }
                    if ($cabeceraPvpRecomendado!==0 && $checkRecomendado==true){ $datosMM[$x][17]=$datoStock[$w][3]; }
                    if ($cabeceraEanCode!==0 && $checkEan==true){ $datosMM[$x][3]=$datoStock[$w][4]; }
                  }

            }

      }

      $i=0;
      $totalEliminados=0;
      for ($j=1; $j < $totalMM ; $j++) {
        if ($datosMM[$j][49] == "false"){
          $todosNo++;
          $NoSku[$i] = $datosMM[$j][1];
          $NoNombre[$i] = $datosMM[$j][4];
          $NoStock[$i] = $datosMM[$j][8];
          if ($checkElimina){
              array_splice($datosMM,$j,1);
              $totalEliminados++;
              $totalMM--;
          } else {
              $datosMM[$j][8]="0";
          }

          $i++;
        }
        $datosMM[$j][1] = "*".$datosMM[$j][1];
        $datosMM[$j][49] = "";
      }
      //$totalMM = $totalMM - $totalEliminados;
       if ($checkElimina){ print "</br>Se han eliminado un total de ".$totalEliminados." articulos del CSV por lo que quedan ".count($datosMM)." en el fichero.</br></br>"; } else { print "</br>NO se ha eliminado ningun articulo del CSV de ManoMano.</br></br>";}
      print "</br>Hay un total de ".$todos." de ".$marcaProveedor." de los cuales: ".$todosSi." SI estan en el csv del proveedor y ".$todosNo." que NO estan en el csv del provedor </br></br>";


      /*echo '<pre>';
      print_r($datosMM);
      echo '</pre>';*/


      /************************************************************************* ESCRIBIR RESULTADOS EN EL CSV */

      $fechahoy = date('d-m-y');
      $nombreCsv = "volcar-ManoMano-Proveedor-".$fechahoy.".csv";
      if( $nombreFaro == true) { $nombreCsv = "volcar-ManoMano-Faro-".$fechahoy.".csv"; }
      if( $nombreLedsC4 == true) { $nombreCsv = "volcar-ManoMano-LedsC4-".$fechahoy.".csv"; }
      if( $nombreMantra == true) { $nombreCsv = "volcar-ManoMano-Mantra-".$fechahoy.".csv"; }
      if( $nombreAjp == true) { $nombreCsv = "volcar-ManoMano-Ajp-".$fechahoy.".csv"; }
      if( $nombreSulion == true) { $nombreCsv = "volcar-ManoMano-Sulion-".$fechahoy.".csv"; }
      if (!$handle = fopen($nombreCsv, "w")) {
        echo "<div class='mensajeError'>El fichero CSV no se puede abrir</div>"."</br>";
        exit;
      } else {
        for ($i=0; $i < $totalMM ; $i++) {
          fputcsv($handle,$datosMM[$i],';');
        }
        echo "<div class='mensajeBueno'>¡El fichero CSV se ha generado correctamente!</div>"."</br>";
      }

      fclose($handle);



    ?>
        </br>
        <table align="center" id="tableNo">
          <caption>ARTÍCULOS DE MANO MANO QUE NO ESTAN EN EL PROVEEDOR - <?php echo count($NoSku); ?> artículos<caption>
            <tr>
              <th scope="col"><b>Sku</b></th>
              <th scope="col"><b>Nombre</b></th>
              <th scope="col"><b>Stock</b></th>
            </tr>
            <?php
      for($p=0; $p < count($NoSku); $p++){
       ?>
          <tr>
            <td><?php print $NoSku[$p]; ?></td>
            <td><?php print $NoNombre[$p]; ?></td>
            <td><?php print $NoStock[$p]; ?></td>
          </tr>
          <?php
      }
  } // FIN DEL POST
      ?>
        </table>

      </div>
    </article>

  </section>


  <?php include 'footer.php'; ?>

</body>

</html>