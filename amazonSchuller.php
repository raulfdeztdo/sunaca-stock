<?php include 'head.php'; ?>

<body>

  <?php include 'conexion.php'; ?>
  <?php include 'header.php'; ?>


  <section id="main-content">

    <article>
      <header style="min-height: 280px; display: grid; align-items: center">
        <h1><img src="img/amazon-logo.jpg" alt="logo-amazon" width="300"><img src="img/logo-Schuller.png" alt="logo-schuller" width="150" id="img-schuller" value="datos-schuller" onclick="predefinir(this)"></h1>
      </header>

      <div class="content">
        <?php if(!$_POST) { ?>
        <form action="amazonSchuller.php" method="post" style=" padding: 0 5%">
          <div class="card mb-3">
            <div class="card-header text-white bg-dark">
              <h5>TXT Amazon Cabecera</h5>
            </div>
            <div class="card-body row justify-content-center">
              <div class="form-inline justify-content-center" style="width: 100%">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Prefijo
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" name="prefijo" id="prefijo" value="" style="width: 80px" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Dias para enviarlo</span>
                  </div>
                  <input type="text" class="form-control mr-sm-2" name="dias" id="dias" style="width: 130px">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input form-control-sm" name="todos" id="todos" value="yes" checked>
                        <label class="custom-control-label" for="todos"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="Todos en TXT resultante" style="background-color: white; width: 205px" disabled>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="myInput" name="fileamazon" value="" required>
                    <label class="custom-file-label" for="myInput">TXT Amazon Cabecera</label>
                  </div>
                </div>
              </div>
              <div class="alert alert-secondary" role="alert" style="max-width: 50rem; color: #7d7d7d">
                <li type="disc">De este archivo TXT solo coge las 3 primeras lineas de cabecera (no datos).</li>
                <li type="disc">Insertar en "Prefijo" el que tenga asignado Schuller en ese momento en Amazon y los dias de envío</li>
                <li type="disc">Marca la casilla "TODOS EN TXT" si quieres que salgan todos los articulos en el TXT (incluido los que ya no estan en el Stock de Schuller y SI en los Asines)</li>
                <li type="disc">El archivo tiene que estar en carpeta <b>Amazon amazon/Schuller-Titulos-NO-BORRAR</b></li>
              </div>
            </div>
          </div>
          <div class="card mb-3 justify-content-center">
            <div class="card-header text-white bg-dark">
              <h5>CSV Asines de Schuller y CSV Stock de Schuller</h5>
            </div>
            <div class="card-body justify-content-center">
              <div class="form-inline justify-content-center" style="width: 100%">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input form-control-sm" name="stock" id="stock" value="yes" checked>
                        <label class="custom-control-label" for="stock"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="Stock" style="background-color: white; width: 205px" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input form-control-sm" name="pvpventa" id="pvpventa" value="yes" checked>
                        <label class="custom-control-label" for="pvpventa"></label>
                      </div>
                    </div>
                  </div>
                  <input type="text" class="form-control mr-sm-2" value="PVP Venta" style="background-color: white; width: 205px" disabled>
                </div>
              </div>
              <div class="row" style="padding: 2%">
                <div class="col-md-6">
                  <div class="card-body row justify-content-center">
                    <div class="form-inline">
                      <div class="input-group mb-3">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="myInput2" name="filestockSchuller" value="" required>
                            <label class="custom-file-label" for="myInput2">CSV Asines Schuller</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body row justify-content-center">
                    <div class="form-inline">
                      <div class="input-group mb-3">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="myInput3" name="filestockSchuller2" value="" required>
                            <label class="custom-file-label" for="myInput3">CSV Stock Schuller</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="alert alert-secondary justify-content-center" role="alert" style="max-width: 50rem; color: #7d7d7d">
                    <li type="disc">Para estos Archivos los titulos de columna son:
                      <ul>
                        <li type="circle">ASINES: Columna1;ASIN1;ASIN2;ASIN3;ASIN4;ASIN5;ASIN6;ASIN7;PVP SPA</li>
                        <li type="circle">Stock: ITEMID;CONFIGID;Stock</li>
                      </ul>
                    </li>
                    <li type="disc">IMPORTANTE: Este fichero de Stock excel hay que modificarlo previamente, para dejar "CONFIGID" en una sola columna y grabado como CSV delimitado por ;</li>
                    <li type="disc">Si no marcas las casillas de Stock y PVP Venta, se quedaran vacias en el txt</li>
                    <li type="disc">Delimitador por defecto: ;</li>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <center><input type="submit" class="enviar" name="Submit" value="Enviar"></center>
        </form>
        <?php } ?>


        <?php

    if($_POST) {
      /************************************************************************* RECOGER DATOS FORM */
      $fileTxt = "Amazon/Schuller/".$_POST["fileamazon"];
      $fileCsvSchuller1 = "Amazon/Schuller/".$_POST["filestockSchuller"];
      $fileCsvSchuller2 = "Amazon/Schuller/".$_POST["filestockSchuller2"];

      if ($_POST["prefijo"]){ $prefijoAmazon=$_POST["prefijo"]; } else { $prefijoAmazon=0; }
      if ($_POST["dias"]){ $diasEnvio=$_POST["dias"]; } else { $diasEnvio=0; }
      if (isset($_POST["todos"])){ $todosTXT=$_POST["todos"]; } else { $todosTXT=0; }
      if (isset($_POST["stock"])){ $cabeceraStock=$_POST["stock"]; } else { $cabeceraStock=0; }
      if (isset($_POST["pvpventa"])){ $cabeceraPvpVenta=$_POST["pvpventa"]; } else { $cabeceraPvpVenta=0; }





      /************************************************************************* LEER TXT Y ALMACENAR DATOS AMAZON */

      $archivo = fopen($fileTxt,"rb");
      $numlinea=0;
      if($archivo == false){
        echo "Error al abrir el archivo";
      } else {
        while ($linea = fgets($archivo)) {
            if (trim($linea) !== ""){
                //echo $linea.'<br/>';
                $aux[] = utf8_encode($linea);
                $numlinea++;
            }
        }
        //echo count($aux)."</br>";
        $s=0;
        for($i=3; $i<count($aux); $i++){
              $arrayAmazon[$s] = explode("	",$aux[$i]);
              if(strpos($arrayAmazon[$s][0],"-")){
                $arrayAmazon_aux=explode("-",$arrayAmazon[$s][0]);
                $arrayAmazon_aux[0] = $prefijoAmazon;
                $arrayAmazon[$s][0]=implode("-",$arrayAmazon_aux);
              }
              $s++;
        }
        $totalColumnasAmazon=18;
        $totalAmazon=count($arrayAmazon);
        //echo "</br>"."Se han introducido " . $totalAmazon . " filas del TXT de Amazon con ".$totalColumnasAmazon." columnas</br>"."</br>";
        /*echo '<pre>';
        print_r($arrayAmazon);
        echo '</pre>';*/

      }
/**************************************************************************************** METER CSV DE SCHULLER STOCK */
        $fila=0;
        $itemid=-1;
        $configid=-1;
        $stock=-1;
        $fechaprox=-1;
        $total=0;
        if (($gestor0 = fopen($fileCsvSchuller2,"r")) !== FALSE){

          while (($datos0 = fgetcsv($gestor0,0,";")) !== FALSE){

            $numero0 = count ($datos0);

            for($c=0; $c < $numero0; $c++){
              if ($datos0[$c] == "ITEMID"){
                $itemid = $c;
              } elseif ($datos0[$c] == "CONFIGID"){
                $configid = $c;
              } elseif ($datos0[$c] == "STOCK" && $cabeceraStock==="yes"){
                $stock = $c;
              }

            }

            if ($fila > 0){


                if ($itemid !== -1) {
                  if( trim($datos0[$configid]) !== "") {
                      $datosSchullerStock[$fila][0]=trim($datos0[$itemid])."-".trim($datos0[$configid]);
                  } else {
                      $datosSchullerStock[$fila][0]=trim($datos0[$itemid]);
                  }
                }
                if ($stock !== -1) { $datosSchullerStock[$fila][1]=trim($datos0[$stock]); } else { $datosSchullerStock[$fila][1]= ""; }

            }
            $fila++;
          }
        /*  echo '<pre>';
          print_r($datosSchullerStock);
          echo '</pre>';*/
          $totalStockSchuller = $fila;
          echo "</br>"."Se han introducido " . $totalStockSchuller . " filas del Stock de Schuller"."</br>"."</br>";
        }

      /************************************************************************* LEER CSV Y ALMACENAR DATOS DE SCHULLER */
      $fila=0;
      $sku=-1;
      $stock=-1;
      $asin1=-1;
      $asin2=-1;
      $asin3=-1;
      $asin4=-1;
      $asin5=-1;
      $asin6=-1;
      $asin7=-1;
      $pvpventa=-1;
      $ean=-1;
      $total=0;

      if (($gestor0 = fopen($fileCsvSchuller1,"r")) !== FALSE){

        while (($datos0 = fgetcsv($gestor0,0,";")) !== FALSE){

          $numero0 = count ($datos0);

          for($c=0; $c < $numero0; $c++){
            if ($datos0[$c] == "Columna1"){
              $sku = $c;
            } elseif ($datos0[$c] == "Stock"){
              $stock = $c;
            } elseif ($datos0[$c] == "ASIN1"){
              $asin1 = $c;
            } elseif ($datos0[$c] == "ASIN2"){
              $asin2 = $c;
            } elseif ($datos0[$c] == "ASIN3"){
              $asin3 = $c;
            } elseif ($datos0[$c] == "ASIN4"){
              $asin4 = $c;
            } elseif ($datos0[$c] == "ASIN5"){
              $asin5 = $c;
            } elseif ($datos0[$c] == "ASIN6"){
              $asin6 = $c;
            } elseif ($datos0[$c] == "ASIN7"){
              $asin7 = $c;
            } elseif ($datos0[$c] == "PVP SPA" && $cabeceraPvpVenta==="yes"){
              $pvpventa = $c;
            }
          }

          if ($fila >= 0){

            $numAsin=0;


                  if (trim($datos0[$asin1]) !== ""){
                      if ($sku !== -1) { $datoStock[$fila][0] = $prefijoAmazon."-".trim($datos0[$sku])."-A"; } else { $datoStock[$fila][0] = ""; }
                      if ($stock !== -1) { $datoStock[$fila][1] = ""; } else { $datoStock[$fila][1] = "0"; }
                      if ($pvpventa !== -1) { $datoStock[$fila][2] = trim($datos0[$pvpventa]); } else { $datoStock[$fila][2] = ""; }
                      if ($asin1 !== -1) { $datoStock[$fila][3] = trim(utf8_encode($datos0[$asin1])); } else { $datoStock[$fila][3] = ""; }
                      if ($sku !== -1) { $datoStock[$fila][4] = trim($datos0[$sku]); } else { $datoStock[$fila][4] = ""; }
                      $numAsin++;
                      $fila++;
                  }
                  if (trim($datos0[$asin2]) !== "") {
                      if ($sku !== -1) { $datoStock[$fila][0] = $prefijoAmazon."-".trim($datos0[$sku])."-B"; } else { $datoStock[$fila][0] = ""; }
                      if ($stock !== -1) { $datoStock[$fila][1] = ""; } else { $datoStock[$fila][1] = "0"; }
                      if ($pvpventa !== -1) { $datoStock[$fila][2] = trim($datos0[$pvpventa]); } else { $datoStock[$fila][2] = ""; }
                      if ($asin2 !== -1) { $datoStock[$fila][3] = trim(utf8_encode($datos0[$asin2])); } else { $datoStock[$fila][3] = ""; }
                      if ($sku !== -1) { $datoStock[$fila][4] = trim($datos0[$sku]); } else { $datoStock[$fila][4] = ""; }
                      $numAsin++;
                      $fila++;
                  }
                  if (trim($datos0[$asin3]) !== "") {
                      if ($sku !== -1) { $datoStock[$fila][0] = $prefijoAmazon."-".trim($datos0[$sku])."-C"; } else { $datoStock[$fila][0] = ""; }
                      if ($stock !== -1) { $datoStock[$fila][1] = ""; } else { $datoStock[$fila][1] = "0"; }
                      if ($pvpventa !== -1) { $datoStock[$fila][2] = trim($datos0[$pvpventa]); } else { $datoStock[$fila][2] = ""; }
                      if ($asin3 !== -1) { $datoStock[$fila][3] = trim(utf8_encode($datos0[$asin3])); } else { $datoStock[$fila][3] = ""; }
                      if ($sku !== -1) { $datoStock[$fila][4] = trim($datos0[$sku]); } else { $datoStock[$fila][4] = ""; }
                      $numAsin++;
                      $fila++;
                  }
                  if (trim($datos0[$asin4]) !== "") {
                      if ($sku !== -1) { $datoStock[$fila][0] = $prefijoAmazon."-".trim($datos0[$sku])."-D"; } else { $datoStock[$fila][0] = ""; }
                      if ($stock !== -1) { $datoStock[$fila][1] = ""; } else { $datoStock[$fila][1] = "0"; }
                      if ($pvpventa !== -1) { $datoStock[$fila][2] = trim($datos0[$pvpventa]); } else { $datoStock[$fila][2] = ""; }
                      if ($asin4 !== -1) { $datoStock[$fila][3] = trim(utf8_encode($datos0[$asin4])); } else { $datoStock[$fila][3] = ""; }
                      if ($sku !== -1) { $datoStock[$fila][4] = trim($datos0[$sku]); } else { $datoStock[$fila][4] = ""; }
                      $numAsin++;
                      $fila++;
                  }
                  if (trim($datos0[$asin5]) !== "") {
                      if ($sku !== -1) { $datoStock[$fila][0] = $prefijoAmazon."-".trim($datos0[$sku])."-E"; } else { $datoStock[$fila][0] = ""; }
                      if ($stock !== -1) { $datoStock[$fila][1] = ""; } else { $datoStock[$fila][1] = "0"; }
                      if ($pvpventa !== -1) { $datoStock[$fila][2] = trim($datos0[$pvpventa]); } else { $datoStock[$fila][2] = ""; }
                      if ($asin5 !== -1) { $datoStock[$fila][3] = trim(utf8_encode($datos0[$asin5])); } else { $datoStock[$fila][3] = ""; }
                      if ($sku !== -1) { $datoStock[$fila][4] = trim($datos0[$sku]); } else { $datoStock[$fila][4] = ""; }
                      $numAsin++;
                      $fila++;
                  }
                  if (trim($datos0[$asin6]) !== "") {
                      if ($sku !== -1) { $datoStock[$fila][0] = $prefijoAmazon."-".trim($datos0[$sku])."-F"; } else { $datoStock[$fila][0] = ""; }
                      if ($stock !== -1) { $datoStock[$fila][1] = ""; } else { $datoStock[$fila][1] = "0"; }
                      if ($pvpventa !== -1) { $datoStock[$fila][2] = trim($datos0[$pvpventa]); } else { $datoStock[$fila][2] = ""; }
                      if ($asin6 !== -1) { $datoStock[$fila][3] = trim(utf8_encode($datos0[$asin6])); } else { $datoStock[$fila][3] = ""; }
                      if ($sku !== -1) { $datoStock[$fila][4] = trim($datos0[$sku]); } else { $datoStock[$fila][4] = ""; }
                      $numAsin++;
                      $fila++;
                  }
                  if (trim($datos0[$asin7]) !== "") {
                      if ($sku !== -1) { $datoStock[$fila][0] = $prefijoAmazon."-".trim($datos0[$sku])."-G"; } else { $datoStock[$fila][0] = ""; }
                      if ($stock !== -1) { $datoStock[$fila][1] = ""; } else { $datoStock[$fila][1] = "0"; }
                      if ($pvpventa !== -1) { $datoStock[$fila][2] = trim($datos0[$pvpventa]); } else { $datoStock[$fila][2] = ""; }
                      if ($asin7 !== -1) { $datoStock[$fila][3] = trim(utf8_encode($datos0[$asin7])); } else { $datoStock[$fila][3] = ""; }
                      if ($sku !== -1) { $datoStock[$fila][4] = trim($datos0[$sku]); } else { $datoStock[$fila][4] = ""; }
                      $numAsin++;
                      $fila++;
                  }


          }

        }
        for ($i=1; $i < $totalStockSchuller ; $i++) {
              for ($j=7; $j < count($datoStock); $j++) {
                  if ($datoStock[$j][4] == $datosSchullerStock[$i][0]) {
                    $datoStock[$j][1] = $datosSchullerStock[$i][1];
                  }
              }

        }
        $totalProveedor=count($datoStock);
        $totalColumnasProveedor=count($datoStock[1]);
        /*echo '<pre>';
        print_r($datoStock);
        echo '</pre>';*/
        echo "</br>"."Se han introducido " . $totalProveedor . " filas del Stock de Schuller ASINES con ".$totalColumnasProveedor." columnas</br>"."</br>";
      }


      /************************************************************************* ACTUALIZAR ESTRUCTURA DE DATOS DE AMAZON */

      /********* PRODUCTOS DESCATALOGADOS */
      /* FOR ARRAYS STOCK BIDIMENSIONALES */
      $NoSku=array();
      $NoStock=array();
      $filaNo=0;
      $q=0;
      for ($w=7; $w<$totalProveedor ; $w++) {
            $SiEsta=false;
            $SiEsta2[$w]=false;
        /* FOR ARRAYS AMAZON BIDIMENSIONALES */
            for ($x=1; $x<$totalStockSchuller ; $x++) {
                  if ($datoStock[$w][4] == $datosSchullerStock[$x][0]){
                    $SiEsta=true;
                    $SiEsta2[$w]=true;
                  }
            }
            if(($todosTXT !== "yes") && ($SiEsta2[$w]==true)){
                $new_amazon[$q][0]=$datoStock[$w][0];
                $new_amazon[$q][1]=$datoStock[$w][2];
                $new_amazon[$q][2]=$datoStock[$w][1];
                $new_amazon[$q][3]=$datoStock[$w][3];;
                $new_amazon[$q][4]="ASIN";
                $new_amazon[$q][5]="NEW";
                $new_amazon[$q][6]="  ";
                $new_amazon[$q][7]="  ";
                $new_amazon[$q][8]="  ";
                $new_amazon[$q][9]="  ";
                $new_amazon[$q][10]="  ";
                $new_amazon[$q][11]="  ";
                $new_amazon[$q][12]="  ";
                $new_amazon[$q][13]="  ";
                $new_amazon[$q][14]=$diasEnvio;
                $new_amazon[$q][15]="  ";
                $new_amazon[$q][16]="  ";
                $new_amazon[$q][17]="  ";
                $new_amazon[$q][18]="  ";
                $q++;



            }
            if($todosTXT === "yes"){
                $new_amazon[$q][0]=$datoStock[$w][0];
                $new_amazon[$q][1]=$datoStock[$w][2];
                $new_amazon[$q][2]=$datoStock[$w][1];
                $new_amazon[$q][3]=$datoStock[$w][3];;
                $new_amazon[$q][4]="ASIN";
                $new_amazon[$q][5]="NEW";
                $new_amazon[$q][6]="  ";
                $new_amazon[$q][7]="  ";
                $new_amazon[$q][8]="  ";
                $new_amazon[$q][9]="  ";
                $new_amazon[$q][10]="  ";
                $new_amazon[$q][11]="  ";
                $new_amazon[$q][12]="  ";
                $new_amazon[$q][13]="  ";
                $new_amazon[$q][14]=$diasEnvio;
                $new_amazon[$q][15]="  ";
                $new_amazon[$q][16]="  ";
                $new_amazon[$q][17]="  ";
                $new_amazon[$q][18]="  ";
                $q++;


            }
            if ($SiEsta == false){
                  $NoSku[$filaNo] = $datoStock[$w][0];
                  $NoStock[$filaNo] = "-10";
                  $filaNo++;
            }
      }

      /* FOR ARRAYS STOCK BIDIMENSIONALES */
      for ($w=7; $w<$totalProveedor ; $w++) {
            $SiEsta=false;
        /* FOR ARRAYS AMAZON BIDIMENSIONALES */
            for ($x=0; $x<$totalAmazon ; $x++) {
                  if ($datoStock[$w][0] == trim($arrayAmazon[$x][0])){
                    $arrayAmazon[$x][1] = $datoStock[$w][2];
                    $arrayAmazon[$x][2] = $datoStock[$w][1];
                  }

            }

      }

      echo "</br>"."Se han introducido " . count($new_amazon) . " filas del TXT resultante de Schuller Amazon"."</br>"."</br>";

      /*echo '<pre>';
      print_r($new_amazon);
      echo '</pre>';*/


      /************************************************************************* ESCRIBIR RESULTADOS EN EL TXT */
      $tab = "
";
      $lineaTxt = $aux[0];
      $lineaTxt .= $aux[1];
      $lineaTxt .= $aux[2];
      for ($j=0; $j < count($new_amazon)-3 ; $j++) {
            $lineaTxt .= $new_amazon[$j][0]."	";
            for ($z=1; $z < count($new_amazon[$j]) ; $z++) {
                  $lineaTxt.=trim($new_amazon[$j][$z])."	";
            }
        $lineaTxt .= $tab;
      }
      $fechahoy = date('d-m-y');
      $nombreTxt = "volcar-Amazon-Schuller-".$fechahoy.".txt";
      if (!$handle = fopen($nombreTxt, "w")) {
        echo "<div class='mensajeError'>El fichero txt no se puede abrir</div>"."</br>";
        exit;
      } else {
        echo "<div class='mensajeBueno'>¡El fichero txt se ha generado correctamente!</div>"."</br>";
      }
      if (fwrite($handle, utf8_decode($lineaTxt)) === FALSE) {
        echo "<div class='mensajeError'>No se puede escribir en el fichero</div>"."</br>";
        exit;
      }
      fclose($handle);



    ?>
        </br>
        <table align="center" id="tableNo">
          <caption>ARTÍCULOS DE ASINES QUE NO ESTAN EN EL STOCK de SCHULLER - <?php echo count($NoSku); ?> artículos<caption>
            <tr>
              <th scope="col"><b>Sku</b></td>
              <th scope="col"><b>Stock</b></td>
            </tr>
            <?php
    for($p=0; $p < count($NoSku); $p++){
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
