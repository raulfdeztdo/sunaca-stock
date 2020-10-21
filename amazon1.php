<?php include 'head.php'; ?>
    <script type="text/javascript">

    function predefinir(img){
        var img = img.getAttribute("value")
        if( img == "datos-faro" ){
          document.getElementById("sku").value="Reference"
          document.getElementById("stock").value="Quantity"
          document.getElementById("pvpventa").value="pvpventa"
          document.getElementById("eancode").value="Barcode"
          document.getElementById("del").value="|"
          document.getElementById("faro-inf").style.display=''
          document.getElementById("leds-inf").style.display='none'
          document.getElementById("mantra-inf").style.display='none'
          document.getElementById("ajp-inf").style.display='none'
          document.getElementById("otro-inf").style.display='none'
          document.getElementById("sulion-inf").style.display='none'
          document.getElementById("proveedor").value="faro"
        }
        if( img == "datos-leds" ){
          document.getElementById("sku").value="article"
          document.getElementById("stock").value="stock"
          document.getElementById("pvpventa").value=""
          document.getElementById("eancode").value=""
          document.getElementById("del").value=";"
          document.getElementById("faro-inf").style.display='none'
          document.getElementById("leds-inf").style.display=''
          document.getElementById("mantra-inf").style.display='none'
          document.getElementById("ajp-inf").style.display='none'
          document.getElementById("sulion-inf").style.display='none'
          document.getElementById("otro-inf").style.display='none'
          document.getElementById("proveedor").value="ledsc4"
        }
        if( img == "datos-mantra" ){
          document.getElementById("sku").value="sku"
          document.getElementById("stock").value="stock"
          document.getElementById("pvpventa").value=""
          document.getElementById("eancode").value=""
          document.getElementById("del").value=";"
          document.getElementById("faro-inf").style.display='none'
          document.getElementById("leds-inf").style.display='none'
          document.getElementById("mantra-inf").style.display=''
          document.getElementById("ajp-inf").style.display='none'
          document.getElementById("sulion-inf").style.display='none'
          document.getElementById("otro-inf").style.display='none'
          document.getElementById("proveedor").value="mantra"
        }
        if( img == "datos-ajp" ){
          document.getElementById("sku").value="REFERENCIA"
          document.getElementById("stock").value="DISPONIBLE_SINCRONIZACION"
          document.getElementById("pvpventa").value=""
          document.getElementById("eancode").value="EAN"
          document.getElementById("del").value=";"
          document.getElementById("faro-inf").style.display='none'
          document.getElementById("leds-inf").style.display='none'
          document.getElementById("mantra-inf").style.display='none'
          document.getElementById("ajp-inf").style.display=''
          document.getElementById("sulion-inf").style.display='none'
          document.getElementById("otro-inf").style.display='none'
          document.getElementById("proveedor").value="ajp"
        }
        if( img == "datos-sulion" ){
          document.getElementById("sku").value="CODE"
          document.getElementById("stock").value="STOCK"
          document.getElementById("pvpventa").value=""
          document.getElementById("eancode").value="EAN"
          document.getElementById("del").value=";"
          document.getElementById("faro-inf").style.display='none'
          document.getElementById("leds-inf").style.display='none'
          document.getElementById("mantra-inf").style.display='none'
          document.getElementById("ajp-inf").style.display='none'
          document.getElementById("sulion-inf").style.display=''
          document.getElementById("otro-inf").style.display='none'
          document.getElementById("proveedor").value="sulion"
        }
        if( img == "datos-otro" ){
          document.getElementById("sku").value=""
          document.getElementById("stock").value=""
          document.getElementById("pvpventa").value=""
          document.getElementById("eancode").value=""
          document.getElementById("del").value=";"
          document.getElementById("faro-inf").style.display='none'
          document.getElementById("leds-inf").style.display='none'
          document.getElementById("mantra-inf").style.display='none'
          document.getElementById("ajp-inf").style.display='none'
          document.getElementById("sulion-inf").style.display='none'
          document.getElementById("otro-inf").style.display=''
          document.getElementById("proveedor").value='otro'
        }
    }

    </script>


<body>

<?php include 'conexion.php'; ?>
<?php include 'header.php'; ?>


<section id="main-content">

  <article>
    <header style="min-height: 280px; display: grid; align-items: center">
      <h1><img src="img/amazon-logo.jpg" alt="logo-amazon" width="300"></h1>
    </header>

    <div class="content">
    <?php if (!$_POST) { ?>
      <form action="amazon1.php" method="post" style=" padding: 0 3%">
        <input type="hidden" name="proveedor" value="" id="proveedor">
        <div class="card mb-3 justify-content-center">
          <div class="card-header text-white bg-dark">
            <h5>Autocompletado Proveedores</h5>
          </div>
          <div class="row justify-content-center" style="width: auto">
            <div class="col-md-12">
              <div class="card-body">
                <button type="button" class="img-thumbnail mr-2 mb-2" name="button"><img src="img/logo-faro-sunaca.jpg"  alt="logo-faro" style="height: 80px" id="img-faro" value="datos-faro" onclick="predefinir(this)"></button>
                <button type="button" class="img-thumbnail mr-2 mb-2" name="button2"><img src="img/logo-ledsc4.jpg"  alt="logo-LedsC4" style="height: 80px" id="img-leds" value="datos-leds" onclick="predefinir(this)"></button>
                <button type="button" class="img-thumbnail mr-2 mb-2" name="button3"><img src="img/mantra-logo.jpg" alt="logo-Mantra" style="height: 80px" id="img-mantra" value="datos-mantra" onclick="predefinir(this)"></button>
                <button type="button" class="img-thumbnail mr-2 mb-2" name="button4"><img src="img/ajp-logo.png" alt="logo-ajp" style="height: 80px" id="img-ajp" value="datos-ajp" onclick="predefinir(this)"></button>
                <button type="button" class="img-thumbnail mr-2 mb-2" name="button5"><img src="img/sulion-logo.png" alt="logo-sulion" style="height: 80px" id="img-sulion" value="datos-sulion" onclick="predefinir(this)"></button>
                <button type="button" class="img-thumbnail mr-2 mb-2" name="button6"><img src="img/otro-logo.png" alt="logo-otro"  alt="logo-ajp" style="height: 80px" id="img-otro" value="datos-otro" onclick="predefinir(this)"></button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header text-white bg-dark">
            <h5>TXT Amazon Proveedor</h5>
          </div>
          <div class="card-body row justify-content-center">
            <div class="form-inline justify-content-center" style="width: 100%">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Prefijo
                      </div>
                    </div>
                    <input type="text" class="form-control mr-sm-2" name="prefijo" id="prefijo" value=";" style="width: 40px" required>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Días para enviarlo</span>
                    </div>
                    <input type="text" class="form-control mr-sm-2" name="dias" id="dias" style="width: 130px">
                  </div>
              </div>
            <div class="input-group mb-3">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="myInput" name="fileamazon" value="" required>
                  <label class="custom-file-label" for="myInput">TXT Amazon - PROVEEDOR</label>
                </div>
              </div>
            </div>
            <div class="alert alert-secondary" role="alert" style="max-width: 50rem; color: #7d7d7d">
              Aqui tienes que enviar el fichero TXT de Amazon, introduce el prefijo que hay que concatenar con el codigo SKU
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
                      <span class="input-group-text">PVP Venta</span>
                    </div>
                    <input type="text" class="form-control mr-sm-2" name="pvpventa" id="pvpventa" style="width: 130px">
                  </div>
                </div>
                <div class="col-md-6">
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
              <li type="disc">Para AJP basta con hacer click en el logo para cargar los nombres de las colmnas disponibles por defecto, si se quiere meter el precio debe de ser manual metiendo el nombre de la columna en "pvpventa"</li>
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

    if ($_POST) {
        /************************************************************************* RECOGER DATOS FORM */

        $nombreFaro=false;
        $nombreMantra=false;
        $nombreLedsC4=false;
        $nombreAjp=false;
        $nombreSulion=false;

        if ($_POST["prefijo"]) {
            $prefijoAmazon=$_POST["prefijo"];
        } else {
            $prefijoAmazon=0;
        }
        if ($_POST["dias"]) {
            $diasEnvio=$_POST["dias"];
        } else {
            $diasEnvio=0;
        }
        if ($_POST["sku"]) {
            $cabeceraSku=$_POST["sku"];
        } else {
            $cabeceraSku=0;
        }
        if ($_POST["stock"]) {
            $cabeceraStock=$_POST["stock"];
        } else {
            $cabeceraStock=0;
        }
        if ($_POST["pvpventa"]) {
            $cabeceraPvpVenta=$_POST["pvpventa"];
        } else {
            $cabeceraPvpVenta=0;
        }
        if ($_POST["eancode"]) {
            $cabeceraEanCode=$_POST["eancode"];
        } else {
            $cabeceraEanCode=0;
        }
        if ($_POST["del"]) {
            $delimitador=$_POST["del"];
        } else {
            $delimitador=";";
        }
        if ($_POST["proveedor"]) {
            if ($_POST["proveedor"] == "faro") {
                $nombreFaro=true;
                $fileTxt = "Amazon/Faro/".$_POST["fileamazon"];
                $fileCsv = "Amazon/Faro/".$_POST["filestock"];
            }
            if ($_POST["proveedor"] == "mantra") {
                $nombreMantra=true;
                $fileTxt = "Amazon/Mantra/".$_POST["fileamazon"];
                $fileCsv = "Amazon/Mantra/".$_POST["filestock"];
            }
            if ($_POST["proveedor"] == "ledsc4") {
                $nombreLedsC4=true;
                $fileTxt = "Amazon/LedsC4/".$_POST["fileamazon"];
                $fileCsv = "Amazon/LedsC4/".$_POST["filestock"];
            }
            if ($_POST["proveedor"] == "ajp") {
                $nombreAjp=true;
                $fileTxt = "Amazon/Ajp/".$_POST["fileamazon"];
                $fileCsv = "Amazon/Ajp/".$_POST["filestock"];
            }
            if ($_POST["proveedor"] == "sulion") {
                $nombreSulion=true;
                $fileTxt = "Amazon/Sulion/".$_POST["fileamazon"];
                $fileCsv = "Amazon/Sulion/".$_POST["filestock"];
            }
            if ($_POST["proveedor"] == "otro") {
                $fileTxt = "Amazon/".$_POST["fileamazon"];
                $fileCsv = "Amazon/".$_POST["filestock"];
            }
        }





        /************************************************************************* LEER TXT Y ALMACENAR DATOS AMAZON */

        $archivo = fopen($fileTxt, "rb");
        $numlinea=0;
        if ($archivo == false) {
            echo "Error al abrir el archivo";
        } else {
            while ($linea = fgets($archivo)) {
                if (trim($linea) !== "") {
                    //echo $linea.'<br/>';
                    $aux[] = utf8_encode($linea);
                    $numlinea++;
                }
            }
            //echo count($aux)."</br>";
            $s=0;
            for ($i=3; $i<count($aux); $i++) {
                $arrayAmazon[$s] = explode("	", $aux[$i]);
                if (strpos($arrayAmazon[$s][0], "-")) {
                    $arrayAmazon_aux=explode("-", $arrayAmazon[$s][0]);
                    $arrayAmazon_aux[0] = $prefijoAmazon;
                    $arrayAmazon[$s][0]=implode("-", $arrayAmazon_aux);
                }
                $s++;
            }
            $totalColumnasAmazon=count($arrayAmazon[3])-1;
            $totalAmazon=count($arrayAmazon);
            echo "</br>"."Se han introducido " . $totalAmazon . " filas del TXT de Amazon con ".$totalColumnasAmazon." columnas</br>"."</br>";
            // echo '<pre>';
            // print_r($arrayAmazon);
            // echo '</pre>';
        }

        /************************************************************************* LEER CSV Y ALMACENAR DATOS DE PROVEEDOR */
        $fila=0;
        $sku=-1;
        $stock=-1;
        $pvpventa=-1;
        $ean=-1;
        $total=0;
        if (($gestor0 = fopen($fileCsv, "r")) !== false) {
            while (($datos0 = fgetcsv($gestor0, 0, $delimitador)) !== false) {
                $numero0 = count($datos0);
                for ($c=0; $c < $numero0; $c++) {
                    if ($datos0[$c] == $cabeceraSku) {
                        $sku = $c;
                    } elseif ($datos0[$c] == $cabeceraStock && $cabeceraStock!==0) {
                        $stock = $c;
                    } elseif (trim($datos0[$c]) == trim($cabeceraPvpVenta) && $cabeceraPvpVenta!==0) {
                        $pvpventa = $c;
                    } elseif ($datos0[$c] == $cabeceraEanCode && $cabeceraEanCode!==0) {
                        $ean = $c;
                    }
                }

                if ($fila > 0) {
                    if ($stock !== -1) {
                        if (trim($datos0[$stock]) == "Available") {
                            $stock_aux=30;
                            $nombreFaro=true;
                        } elseif (trim($datos0[$stock]) == "Low Stock" || trim($datos0[$stock]) == "Not Available") {
                            $stock_aux=0;
                        } elseif (trim($datos0[$stock]) == "N") {
                            $stock_aux = 0;
                        } elseif (trim($datos0[$stock]) == "S") {
                            $stock_aux = 4;
                        } elseif (trim($datos0[$stock]) == "Y") {
                            $stock_aux = 10;
                        } elseif (trim($datos0[$stock]) == "L") {
                            $stock_aux = 30;
                        } elseif ($nombreAjp == true) {
                            if (trim($datos0[$stock]) == "0" || trim($datos0[$stock]) == "5") {
                                $stock_aux = 0;
                            }
                            if (trim($datos0[$stock]) == "20") {
                                $stock_aux = 5;
                            }
                            if (trim($datos0[$stock]) == "30") {
                                $stock_aux = 20;
                            }
                        } elseif ($nombreSulion == true) {
                            $num_aux = number_format($datos0[$stock]);
                            if ($num_aux < 10) {
                                $stock_aux = 0;
                            }
                            if ($num_aux >= 10 || $num_aux <= 20) {
                                $stock_aux = 5;
                            }
                            if ($num_aux > 20) {
                                $stock_aux = 20;
                            }
                        } else {
                            $NUM_AUX = floatval($datos0[$stock]);
                            $stock_aux = $NUM_AUX;
                        }
                    }


                    // SOLO PARA LEDSC4
                    if ($cabeceraSku == "article") {
                        $nombreLedsC4=true;
                        if (substr($datos0[$sku], 0, 1) == "_") {
                            $datos0[$sku] = substr($datos0[$sku], 1);
                        }
                        $datos0[$sku] = strtoupper($datos0[$sku]);
                        //$sku_Ledc4 = explode($datos0[$sku]);
                    }

                    if ($sku !== -1) {
                        $datoStock[$fila][0] = $prefijoAmazon."-".trim($datos0[$sku]);
                    } else {
                        $datoStock[$fila][0] = "";
                    }
                    if ($stock !== -1) {
                        $datoStock[$fila][1] = $stock_aux;
                    } else {
                        $datoStock[$fila][1] = "";
                    }
                    if ($pvpventa !== -1) {
                        $datoStock[$fila][2] = str_replace(",",".",$datos0[$pvpventa]);
                    } else {
                        $datoStock[$fila][2] = "";
                    }
                    if ($ean !== -1) {
                        $datoStock[$fila][3] = trim($datos0[$ean]);
                    } else {
                        $datoStock[$fila][3] = "";
                    }
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
        /* FOR ARRAYS STOCK BIDIMENSIONALES */
        for ($w=1; $w<=$totalProveedor ; $w++) {
            $SiEsta=false;
            /* FOR ARRAYS AMAZON BIDIMENSIONALES */
            for ($x=0; $x<$totalAmazon ; $x++) {
                $arrayAmazon[$x][14] = $diasEnvio;
                if ($datoStock[$w][0] == trim($arrayAmazon[$x][0])) {
                    if ($cabeceraStock !== 0) {
                        $arrayAmazon[$x][2] = $datoStock[$w][1];
                    }
                    if ($cabeceraPvpVenta !== 0) {
                        $arrayAmazon[$x][1] = $datoStock[$w][2];
                    }
                }
            }
        }
        /********* PRODUCTOS DE AMAZON DESCATALOGADOS */
        /* FOR ARRAYS STOCK BIDIMENSIONALES */
        $NoSku=array();
        $NoStock=array();
        $filaNo=0;
        for ($w=0; $w<$totalAmazon ; $w++) {
            $SiEsta=false;
            /* FOR ARRAYS AMAZON BIDIMENSIONALES */
            for ($x=1; $x<=$totalProveedor ; $x++) {
                if ($datoStock[$x][0] == trim($arrayAmazon[$w][0])) {
                    $SiEsta=true;
                }
            }
            if ($SiEsta == false) {
                $NoSku[$filaNo] = $arrayAmazon[$w][0];
                $NoStock[$filaNo] = $arrayAmazon[$w][2];
                $filaNo++;
            }
        }

        // echo '<pre>';
        // print_r($arrayAmazon);
        // echo '</pre>';


        /************************************************************************* ESCRIBIR RESULTADOS EN EL TXT */
        $tab = "
";
        $lineaTxt = $aux[0];
        $lineaTxt .= $aux[1];
        $lineaTxt .= $aux[2];
        for ($j=0; $j < count($aux)-3 ; $j++) {
            $lineaTxt .= $arrayAmazon[$j][0]."	";
            for ($z=1; $z < count($arrayAmazon[$j]) ; $z++) {
                $lineaTxt.=trim($arrayAmazon[$j][$z])."	";
            }
            $lineaTxt .= $tab;
        }
        $fechahoy = date('d-m-y');
        $nombreTxt = "volcar-Amazon-Proveedor-".$fechahoy.".txt";
        if ($nombreFaro === true) {
            $nombreTxt = "volcar-Amazon-Faro-".$fechahoy.".txt";
        }
        if ($nombreLedsC4 === true) {
            $nombreTxt = "volcar-Amazon-LedsC4-".$fechahoy.".txt";
        }
        if ($nombreAjp === true) {
            $nombreTxt = "volcar-Amazon-Ajp-".$fechahoy.".txt";
        }
        if ($nombreMantra === true) {
            $nombreTxt = "volcar-Amazon-Mantra-".$fechahoy.".txt";
        }
        if ($nombreSulion === true) {
            $nombreTxt = "volcar-Amazon-Sulion-".$fechahoy.".txt";
        }
        if (!$handle = fopen($nombreTxt, "w")) {
            echo "<div class='mensajeError'>El fichero txt no se puede abrir</div>"."</br>";
            exit;
        } else {
            echo "<div class='mensajeBueno'>¡El fichero txt se ha generado correctamente!</div>"."</br>";
        }
        if (fwrite($handle, utf8_decode($lineaTxt)) === false) {
            echo "<div class='mensajeError'>No se puede escribir en el fichero</div>"."</br>";
            exit;
        }
        fclose($handle); ?>
  </br>
    <table align="center" id="tableNo">
      <caption>ARTÍCULOS DE AMAZON QUE NO ESTAN EN EL PROVEEDOR - <?php echo count($NoSku); ?> artículos<caption>
      <tr>
        <th scope="col"><b>Sku</b></td>
        <th scope="col"><b>Stock</b></td>
      </tr>
      <?php
      for ($p=0; $p < count($NoSku); $p++) {
          ?>
          <tr>
            <td><?php print $NoSku[$p]; ?></td>
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
