<?php include 'head.php'; ?>

<body>

  <?php include 'conexion.php'; ?>
  <?php include 'header.php'; ?>


  <section id="main-content">
    <article>
      <header style="min-height: 280px; display: grid; align-items: center">
        <h1>Envios Faro</h1>
      </header>

      <div class="content">
        <?php if (!$_POST) { ?>
        <form action="enviosfaro.php" method="post" style=" padding: 0 5%">
          <input type="hidden" name="proveedor" value="" id="proveedor">
          <div class="card mb-3 justify-content-center">
            <div class="card-header text-white bg-dark">
              <h5>CSV Oxatis</h5>
            </div>
            <div class="row" style="padding: 2%">
              <div class="col-md-6">
                <div class="card-body row justify-content-center">
                  <div class="form-inline">
                    <div class="input-group mb-3">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="myInput" name="fileOxatisSunaca" value="" required>
                          <label class="custom-file-label" for="myInput">CSV Oxatis - SUNACA</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="alert alert-secondary justify-content-center" role="alert" style="max-width: 50rem; color: #7d7d7d">
                  Aqui hay que enviar el CSV de oxatis de VENTILADORES, para producir el CSV resultante para envíos.
                </div>
              </div>
            </div>
            <div class="row" style="padding: 2%">
              <div class="col-md-6">
                <div class="card-body row justify-content-center">
                  <div class="form-inline">
                    <div class="input-group mb-3">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="myInput2" name="fileOxatisVentiladores" value="" required>
                          <label class="custom-file-label" for="myInput2">CSV Oxatis - VENTILADORES</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="alert alert-secondary justify-content-center" role="alert" style="max-width: 50rem; color: #7d7d7d">
                  Aqui hay que enviar el CSV de oxatis de SUNACA, para producir el CSV resultante para envíos.
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3 justify-content-center">
            <div class="card-header text-white bg-dark">
              <h5>CSV Stock FARO</h5>
            </div>
            <div class="row" style="padding: 2%">
              <div class="col-md-6">
                <div class="card-body row justify-content-center">
                  <div class="form-inline">
                    <div class="input-group mb-3">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="myInput3" name="fileFaro" value="" required>
                          <label class="custom-file-label" for="myInput3">CSV Stock - FARO</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="alert alert-secondary justify-content-center" role="alert" style="max-width: 50rem; color: #7d7d7d">
                  Aqui hay que enviar el CSV del proveedor de faro para comprobar si los ariculos estan en stock.
                </div>
              </div>
            </div>
          </div>
        <center><input type="submit" class="enviar" name="Submit" value="Enviar"></center>
        </form>
        <?php } ?>


        <?php

    if ($_POST) {
        /************************************************************************* RECOGER DATOS FORM */

        if (isset($_POST["fileOxatisSunaca"]) !== "false") {
            $fileCsvSunaca = "Oxatis/EnvioFaro/".$_POST["fileOxatisSunaca"];
        } else {
            $fileCsvSunaca=0;
        }
        if (isset($_POST["fileOxatisVentiladores"]) !== "false") {
            $fileCsvVentiladores = "Oxatis/EnvioFaro/".$_POST["fileOxatisVentiladores"];
        } else {
            $fileCsvVentiladores=0;
        }
        if (isset($_POST["fileFaro"]) !== "false") {
            $fileCsvFaro = "Oxatis/EnvioFaro/".$_POST["fileFaro"];
        } else {
            $fileCsvFaro=0;
        }
        $delimitador=";";

        /************************************************************************* LEER DATOS CSV Y ALMACENARLOS */
        $totalSun=0;
        $totalVen=0;
        if ($fileCsvSunaca !== "Oxatis/EnvioFaro/") {
            $datosEnvio=array();
            $fila=0;
            $idOxatis=-1;

            $estadoProg=-1;
            $entrega=-1;
            $entreganombre=-1;
            $entregaTlfno=-1;
            $entregaTlfno2=-1;
            $email=-1;
            $nombrepais=-1;
            $cp = -1;
            $entregaCiudad=-1;
            $entregaDir1=-1;
            $entregaDir2=-1;
            $nombrearticulo=-1;
            $referencia=-1;
            $descripcion=-1;
            $observaciones=-1;
            $nombrepago=-1;
            $importe=-1;
            $contrareembolso=-1;
            $cantart=-1;
            $fechaped=-1;
            $total=0;
            if (($gestor0 = fopen($fileCsvSunaca, "r")) !== false) {
                while (($datos0 = fgetcsv($gestor0, 0, $delimitador)) !== false) {
                    $numero0 = count($datos0);

                    for ($c=0; $c < $numero0; $c++) {
                        if ($datos0[$c] == "Pedido.IdentificarOxatis") {
                            $idOxatis = $c;
                        } elseif ($datos0[$c] == "Entrega.NombrePais") {
                            $nombrepais = $c;
                        } elseif ($datos0[$c] == "Pedidos.EstadoProgreso") {
                            $estadoProg = $c;
                        } elseif ($datos0[$c] == "Pedido.Entregado") {
                            $entrega = $c;
                        } elseif ($datos0[$c] == "Pedido.ImporteTotal") {
                            $importe = $c;
                        } elseif ($datos0[$c] == "Pago.Nombre") {
                            $nombrepago = $c;
                        } elseif ($datos0[$c] == "Pedido.ContraReembolso") {
                            $contrareembolso = $c;
                        } elseif ($datos0[$c] == "Entrega.Empresa") {
                            $empresa = $c;
                        } elseif ($datos0[$c] == "Entrega.Nombre") {
                            $entreganombre = $c;
                        } elseif ($datos0[$c] == "Entrega.Apellidos") {
                            $entregaapellidos = $c;
                        } elseif ($datos0[$c] == "Entrega.Direccion") {
                            $entregaDir1 = $c;
                        } elseif ($datos0[$c] == "Entrega.CodigoPostal") {
                            $cp = $c;
                        } elseif ($datos0[$c] == "Entrega.Ciudad") {
                            $entregaCiudad = $c;
                        } elseif ($datos0[$c] == "Usuario.Email") {
                            $email = $c;
                        } elseif ($datos0[$c] == "Facturacion.TelSecundario") {
                            $entregaTlfno2 = $c;
                        } elseif ($datos0[$c] == "Entrega.Telefono") {
                            $entregaTlfno = $c;
                        } elseif ($datos0[$c] == "Articulo.Cantidad") {
                            $cantart = $c;
                        } elseif ($datos0[$c] == "Articulo.CodigoArticulo") {
                            $referencia = $c;
                        } elseif ($datos0[$c] == "Entrega.Informacion") {
                            $observaciones = $c;
                        } elseif ($datos0[$c] == "Articulo.Nombre") {
                            $nombrearticulo = $c;
                        } elseif ($datos0[$c] == "Pedido.Fecha") {
                            $fechaped = $c;
                        }
                    }

                    if ($fila >= 0) {
                        if ($idOxatis !== -1) {
                            $datosEnvio[$fila][0] = trim($datos0[$idOxatis]);
                        } else {
                            $datosEnvio[$fila][0] = "";
                        }
                        if ($nombrepais !== -1) {
                            if (utf8_encode($datos0[$nombrepais]) == "España (Península)" || utf8_encode($datos0[$nombrepais]) == "España (Islas Baleares)") {
                                $datosEnvio[$fila][1] = "ESP";
                            } else {
                                $datosEnvio[$fila][1] = $datos0[$nombrepais];
                            }
                        } else {
                            $datosEnvio[$fila][1] = "";
                        }
                        if ($estadoProg !== -1) {
                            if (trim($datos0[$estadoProg]) == "60907" || trim($datos0[$estadoProg]) == "60910") {
                                $datosEnvio[$fila][2] = trim($datos0[$estadoProg]);
                            } else {
                                $datosEnvio[$fila][2] = "";
                            }
                        } else {
                            $datosEnvio[$fila][2] = "";
                        }
                        if ($entrega !== -1) {
                            $datosEnvio[$fila][3] = $datos0[$entrega];
                        } else {
                            $datosEnvio[$fila][3]="";
                        }
                        if ($importe !== -1) {
                            $datosEnvio[$fila][4] = $datos0[$importe];
                        } else {
                            $datosEnvio[$fila][4] = "";
                        }
                        if ($nombrepago !== -1) {
                            $datosEnvio[$fila][5] = $datos0[$nombrepago];
                        } else {
                            $datosEnvio[$fila][5] = "";
                        }
                        if ($contrareembolso !== -1) {
                            $datosEnvio[$fila][6] = $datos0[$contrareembolso];
                        } else {
                            $datosEnvio[$fila][6]="";
                        }
                        $datosEnvio[$fila][7] = "15";
                        if ($empresa !== -1) {
                            $datosEnvio[$fila][8] = $datos0[$empresa];
                        } else {
                            $datosEnvio[$fila][8] = "";
                        }
                        if (($entreganombre !== -1) && ($entregaapellidos !== -1)) {
                            $datosEnvio[$fila][9] = $datos0[$entreganombre]." ".$datos0[$entregaapellidos];
                        } else {
                            $datosEnvio[$fila][9] = "";
                        }
                        if ($entregaDir1 !== -1) {
                            $datosEnvio[$fila][10] = $datos0[$entregaDir1];
                        } else {
                            $datosEnvio[$fila][10] = "";
                        }
                        if ($cp !== -1) {
                            if (strlen(trim($datos0[$cp])) == 4) {
                                $datosEnvio[$fila][11] = "0".trim($datos0[$cp]);
                            } else {
                                $datosEnvio[$fila][11] = trim($datos0[$cp]);
                            }
                        } else {
                            $datosEnvio[$fila][11] = "";
                        }
                        if ($entregaCiudad !== -1) {
                            $datosEnvio[$fila][12] = $datos0[$entregaCiudad];
                        } else {
                            $datosEnvio[$fila][12] = "";
                        }
                        if ($cp !== -1) {
                            $datosEnvio[$fila][13] = substr($datos0[$cp], 0, 2);
                        } else {
                            $datosEnvio[$fila][13] = "";
                        }
                        if ($nombrepais !== -1) {
                            if (utf8_encode($datos0[$nombrepais]) == "España (Península)" || utf8_encode($datos0[$nombrepais]) == "España (Islas Baleares)") {
                                $datosEnvio[$fila][14] = "ESP";
                            } else {
                                $datosEnvio[$fila][14] = $datos0[$nombrepais];
                            }
                        } else {
                            $datosEnvio[$fila][14] = "";
                        }
                        if ($email !== -1) {
                            $datosEnvio[$fila][15] = trim($datos0[$email]);
                        } else {
                            $datosEnvio[$fila][15] = "";
                        }
                        if ($entregaTlfno !== -1) {
                            $datosEnvio[$fila][16] = trim($datos0[$entregaTlfno]);
                        } else {
                            $datosEnvio[$fila][16] = "";
                        }
                        if ($entregaTlfno2 !== -1) {
                            $datosEnvio[$fila][17] = trim($datos0[$entregaTlfno2]);
                        } else {
                            $datosEnvio[$fila][17] = "";
                        }
                        $datosEnvio[$fila][18] = " ";
                        $datosEnvio[$fila][19] = "FARO";
                        if ($idOxatis !== -1) {
                            $datosEnvio[$fila][20] = trim($datos0[$idOxatis]);
                        } else {
                            $datosEnvio[$fila][20] = "";
                        }
                        $datosEnvio[$fila][21] = " ";
                        $datosEnvio[$fila][22] = " ";
                        if ($cantart !== -1) {
                            $cantArticulos = intval($datos0[$cantart]);
                        } else {
                            $cantArticulos = 0;
                        }
                        if ($referencia !== -1) {
                            $datosEnvio[$fila][23] = trim($datos0[$referencia]);
                        } else {
                            $datosEnvio[$fila][23] = "";
                        }
                        if ($cantart  !== -1) {
                            $datosEnvio[$fila][24] = intval($datos0[$cantart]);
                        } else {
                            $datosEnvio[$fila][24] = "";
                        }
                        if ($observaciones !== -1) {
                            $datosEnvio[$fila][25] = $datos0[$observaciones];
                        } else {
                            $datosEnvio[$fila][25] = "";
                        }
                        if ($nombrearticulo !== -1) {
                            $datosEnvio[$fila][26] = $datos0[$nombrearticulo];
                        } else {
                            $datosEnvio[$fila][26] = "";
                        }
                        if ($fechaped !== -1) {
                            $datosEnvio[$fila][27] = $datos0[$fechaped];
                        } else {
                            $datosEnvio[$fila][27] = "";
                        }
                    }
                    $fila++;
                }
                $total=count($datosEnvio);
                $totalColumnas=count($datosEnvio[1]);
                // echo '<pre>';
                // print_r($datosEnvio);
                // echo '</pre>';
            }


            /************************************************************************* UNIFICAR CLIENTES QUE REPITEN ARTICULOS */

            $datosEnvio_result=array();
            $aux = $datosEnvio;
            $fila_new=0;

            for ($j=0; $j < $total ; $j++) {
                if ($datosEnvio[$j][0] == $aux[$j][0]) {
                    $datosEnvio_result[$fila_new][0]=$datosEnvio[$j][0];
                    $datosEnvio_result[$fila_new][1]=$datosEnvio[$j][27];
                    $datosEnvio_result[$fila_new][2]=$datosEnvio[$j][1];
                    $datosEnvio_result[$fila_new][3]=$datosEnvio[$j][2];
                    $datosEnvio_result[$fila_new][4]=$datosEnvio[$j][3];
                    $datosEnvio_result[$fila_new][5]=$datosEnvio[$j][4];
                    $datosEnvio_result[$fila_new][6]=$datosEnvio[$j][5];
                    $datosEnvio_result[$fila_new][7]=$datosEnvio[$j][6];
                    $datosEnvio_result[$fila_new][8]=$datosEnvio[$j][7];
                    $datosEnvio_result[$fila_new][9]=$datosEnvio[$j][8];
                    $datosEnvio_result[$fila_new][10]=$datosEnvio[$j][9];
                    $datosEnvio_result[$fila_new][11]=$datosEnvio[$j][10];
                    $datosEnvio_result[$fila_new][12]=$datosEnvio[$j][11];
                    $datosEnvio_result[$fila_new][13]=$datosEnvio[$j][12];
                    $datosEnvio_result[$fila_new][14]=$datosEnvio[$j][13];
                    $datosEnvio_result[$fila_new][15]=$datosEnvio[$j][14];
                    $datosEnvio_result[$fila_new][16]=$datosEnvio[$j][15];
                    $datosEnvio_result[$fila_new][17]=$datosEnvio[$j][16];
                    $datosEnvio_result[$fila_new][18]=$datosEnvio[$j][17];
                    $datosEnvio_result[$fila_new][19]=$datosEnvio[$j][18];
                    $datosEnvio_result[$fila_new][20]=$datosEnvio[$j][19];
                    $datosEnvio_result[$fila_new][21]=$datosEnvio[$j][20];
                    $datosEnvio_result[$fila_new][22]=$datosEnvio[$j][21];
                    $datosEnvio_result[$fila_new][23]=$datosEnvio[$j][22];
                    $datosEnvio_result[$fila_new][24]=$datosEnvio[$j][23];
                    $datosEnvio_result[$fila_new][25]=$datosEnvio[$j][24];
                    $datosEnvio_result[$fila_new][26]=$datosEnvio[$j][25];
                    $datosEnvio_result[$fila_new][27]=$datosEnvio[$j][26];
                    $fila_new++;
                }
            }


            // echo '<pre>';
            // print_r($datosEnvio_result);
            // echo '</pre>';
            $totalSun = count($datosEnvio_result);
            print "Hay ".count($datosEnvio_result)." filas en la importacion de datos de SUNACA<br><br>";
        }

        if ($fileCsvVentiladores !== "Oxatis/EnvioFaro/") {
            $datosEnvio=array();
            $fila=0;
            $idOxatis=-1;

            $estadoProg=-1;
            $entrega=-1;
            $entreganombre=-1;
            $entregaTlfno=-1;
            $entregaTlfno2=-1;
            $email=-1;
            $nombrepais=-1;
            $cp = -1;
            $entregaCiudad=-1;
            $entregaDir1=-1;
            $entregaDir2=-1;
            $nombrearticulo=-1;
            $referencia=-1;
            $descripcion=-1;
            $observaciones=-1;
            $nombrepago=-1;
            $importe=-1;
            $contrareembolso=-1;
            $cantart=-1;
            $total=0;
            if (($gestor0 = fopen($fileCsvVentiladores, "r")) !== false) {
                while (($datos0 = fgetcsv($gestor0, 0, $delimitador)) !== false) {
                    $numero0 = count($datos0);

                    for ($c=0; $c < $numero0; $c++) {
                        if ($datos0[$c] == "Pedido.IdentificarOxatis") {
                            $idOxatis = $c;
                        } elseif ($datos0[$c] == "Entrega.NombrePais") {
                            $nombrepais = $c;
                        } elseif ($datos0[$c] == "Pedidos.EstadoProgreso") {
                            $estadoProg = $c;
                        } elseif ($datos0[$c] == "Pedido.Entregado") {
                            $entrega = $c;
                        } elseif ($datos0[$c] == "Pedido.ImporteTotal") {
                            $importe = $c;
                        } elseif ($datos0[$c] == "Pago.Nombre") {
                            $nombrepago = $c;
                        } elseif ($datos0[$c] == "Pedido.ContraReembolso") {
                            $contrareembolso = $c;
                        } elseif ($datos0[$c] == "Entrega.Empresa") {
                            $empresa = $c;
                        } elseif ($datos0[$c] == "Entrega.Nombre") {
                            $entreganombre = $c;
                        } elseif ($datos0[$c] == "Entrega.Apellidos") {
                            $entregaapellidos = $c;
                        } elseif ($datos0[$c] == "Entrega.Direccion") {
                            $entregaDir1 = $c;
                        } elseif ($datos0[$c] == "Entrega.CodigoPostal") {
                            $cp = $c;
                        } elseif ($datos0[$c] == "Entrega.Ciudad") {
                            $entregaCiudad = $c;
                        } elseif ($datos0[$c] == "Usuario.Email") {
                            $email = $c;
                        } elseif ($datos0[$c] == "Facturacion.TelSecundario") {
                            $entregaTlfno2 = $c;
                        } elseif ($datos0[$c] == "Entrega.Telefono") {
                            $entregaTlfno = $c;
                        } elseif ($datos0[$c] == "Articulo.Cantidad") {
                            $cantart = $c;
                        } elseif ($datos0[$c] == "Articulo.CodigoArticulo") {
                            $referencia = $c;
                        } elseif ($datos0[$c] == "Entrega.Informacion") {
                            $observaciones = $c;
                        } elseif ($datos0[$c] == "Articulo.Nombre") {
                            $nombrearticulo = $c;
                        } elseif ($datos0[$c] == "Pedido.Fecha") {
                            $fechaped = $c;
                        }
                    }

                    if ($fila >= 0) {
                        if ($idOxatis !== -1) {
                            $datosEnvio[$fila][0] = trim($datos0[$idOxatis]);
                        } else {
                            $datosEnvio[$fila][0] = "";
                        }
                        if ($nombrepais !== -1) {
                            if (utf8_encode($datos0[$nombrepais]) == "España (Península)" || utf8_encode($datos0[$nombrepais]) == "España (Islas Baleares)") {
                                $datosEnvio[$fila][1] = "ESP";
                            } else {
                                $datosEnvio[$fila][1] = $datos0[$nombrepais];
                            }
                        } else {
                            $datosEnvio[$fila][1] = "";
                        }
                        if ($estadoProg !== -1) {
                            if (trim($datos0[$estadoProg]) == "60907" || trim($datos0[$estadoProg]) == "60910") {
                                $datosEnvio[$fila][2] = trim($datos0[$estadoProg]);
                            } else {
                                $datosEnvio[$fila][2] = "";
                            }
                        } else {
                            $datosEnvio[$fila][2] = "";
                        }
                        if ($entrega !== -1) {
                            $datosEnvio[$fila][3] = $datos0[$entrega];
                        } else {
                            $datosEnvio[$fila][3]="";
                        }
                        if ($importe !== -1) {
                            $datosEnvio[$fila][4] = $datos0[$importe];
                        } else {
                            $datosEnvio[$fila][4] = "";
                        }
                        if ($nombrepago !== -1) {
                            $datosEnvio[$fila][5] = $datos0[$nombrepago];
                        } else {
                            $datosEnvio[$fila][5] = "";
                        }
                        if ($contrareembolso !== -1) {
                            $datosEnvio[$fila][6] = $datos0[$contrareembolso];
                        } else {
                            $datosEnvio[$fila][6]="";
                        }
                        $datosEnvio[$fila][7] = "15";
                        if ($empresa !== -1) {
                            $datosEnvio[$fila][8] = $datos0[$empresa];
                        } else {
                            $datosEnvio[$fila][8] = "";
                        }
                        if (($entreganombre !== -1) && ($entregaapellidos !== -1)) {
                            $datosEnvio[$fila][9] = $datos0[$entreganombre]." ".$datos0[$entregaapellidos];
                        } else {
                            $datosEnvio[$fila][9] = "";
                        }
                        if ($entregaDir1 !== -1) {
                            $datosEnvio[$fila][10] = $datos0[$entregaDir1];
                        } else {
                            $datosEnvio[$fila][10] = "";
                        }
                        if ($cp !== -1) {
                            if (strlen(trim($datos0[$cp])) == 4) {
                                $datosEnvio[$fila][11] = "0".trim($datos0[$cp]);
                            } else {
                                $datosEnvio[$fila][11] = trim($datos0[$cp]);
                            }
                        } else {
                            $datosEnvio[$fila][11] = "";
                        }
                        if ($entregaCiudad !== -1) {
                            $datosEnvio[$fila][12] = $datos0[$entregaCiudad];
                        } else {
                            $datosEnvio[$fila][12] = "";
                        }
                        if ($cp !== -1) {
                            $datosEnvio[$fila][13] = substr($datos0[$cp], 0, 2);
                        } else {
                            $datosEnvio[$fila][13] = "";
                        }
                        if ($nombrepais !== -1) {
                            if (utf8_encode($datos0[$nombrepais]) == "España (Península)" || utf8_encode($datos0[$nombrepais]) == "España (Islas Baleares)") {
                                $datosEnvio[$fila][14] = "ESP";
                            } else {
                                $datosEnvio[$fila][14] = $datos0[$nombrepais];
                            }
                        } else {
                            $datosEnvio[$fila][14] = "";
                        }
                        if ($email !== -1) {
                            $datosEnvio[$fila][15] = trim($datos0[$email]);
                        } else {
                            $datosEnvio[$fila][15] = "";
                        }
                        if ($entregaTlfno !== -1) {
                            $datosEnvio[$fila][16] = trim($datos0[$entregaTlfno]);
                        } else {
                            $datosEnvio[$fila][16] = "";
                        }
                        if ($entregaTlfno2 !== -1) {
                            $datosEnvio[$fila][17] = trim($datos0[$entregaTlfno2]);
                        } else {
                            $datosEnvio[$fila][17] = "";
                        }
                        $datosEnvio[$fila][18] = " ";
                        $datosEnvio[$fila][19] = "FARO";
                        if ($idOxatis !== -1) {
                            $datosEnvio[$fila][20] = trim($datos0[$idOxatis]);
                        } else {
                            $datosEnvio[$fila][20] = "";
                        }
                        $datosEnvio[$fila][21] = " ";
                        $datosEnvio[$fila][22] = " ";
                        if ($cantart !== -1) {
                            $cantArticulos = intval($datos0[$cantart]);
                        } else {
                            $cantArticulos = 0;
                        }
                        if ($referencia !== -1) {
                            $datosEnvio[$fila][23] = trim($datos0[$referencia]);
                        } else {
                            $datosEnvio[$fila][23] = "";
                        }
                        if ($cantart  !== -1) {
                            $datosEnvio[$fila][24] = intval($datos0[$cantart]);
                        } else {
                            $datosEnvio[$fila][24] = "";
                        }
                        if ($observaciones !== -1) {
                            $datosEnvio[$fila][25] = $datos0[$observaciones];
                        } else {
                            $datosEnvio[$fila][25] = "";
                        }
                        if ($nombrearticulo !== -1) {
                            $datosEnvio[$fila][26] = $datos0[$nombrearticulo];
                        } else {
                            $datosEnvio[$fila][26] = "";
                        }
                        if ($fechaped !== -1) {
                            $datosEnvio[$fila][27] = $datos0[$fechaped];
                        } else {
                            $datosEnvio[$fila][27] = "";
                        }
                    }
                    $fila++;
                }
                $total=count($datosEnvio);
                $totalColumnas=count($datosEnvio[1]);
                // echo '<pre>';
              // print_r($datosEnvio);
              // echo '</pre>';
            }


            /************************************************************************* UNIFICAR CLIENTES QUE REPITEN ARTICULOS */

            $datosEnvio_result_vent=array();
            $aux = $datosEnvio;
            $fila_new=0;

            for ($j=0; $j < $total ; $j++) {
                if ($datosEnvio[$j][0] == $aux[$j][0]) {
                    $datosEnvio_result_vent[$fila_new][0]=$datosEnvio[$j][0];
                    $datosEnvio_result_vent[$fila_new][1]=$datosEnvio[$j][27];
                    $datosEnvio_result_vent[$fila_new][2]=$datosEnvio[$j][1];
                    $datosEnvio_result_vent[$fila_new][3]=$datosEnvio[$j][2];
                    $datosEnvio_result_vent[$fila_new][4]=$datosEnvio[$j][3];
                    $datosEnvio_result_vent[$fila_new][5]=$datosEnvio[$j][4];
                    $datosEnvio_result_vent[$fila_new][6]=$datosEnvio[$j][5];
                    $datosEnvio_result_vent[$fila_new][7]=$datosEnvio[$j][6];
                    $datosEnvio_result_vent[$fila_new][8]=$datosEnvio[$j][7];
                    $datosEnvio_result_vent[$fila_new][9]=$datosEnvio[$j][8];
                    $datosEnvio_result_vent[$fila_new][10]=$datosEnvio[$j][9];
                    $datosEnvio_result_vent[$fila_new][11]=$datosEnvio[$j][10];
                    $datosEnvio_result_vent[$fila_new][12]=$datosEnvio[$j][11];
                    $datosEnvio_result_vent[$fila_new][13]=$datosEnvio[$j][12];
                    $datosEnvio_result_vent[$fila_new][14]=$datosEnvio[$j][13];
                    $datosEnvio_result_vent[$fila_new][15]=$datosEnvio[$j][14];
                    $datosEnvio_result_vent[$fila_new][16]=$datosEnvio[$j][15];
                    $datosEnvio_result_vent[$fila_new][17]=$datosEnvio[$j][16];
                    $datosEnvio_result_vent[$fila_new][18]=$datosEnvio[$j][17];
                    $datosEnvio_result_vent[$fila_new][19]=$datosEnvio[$j][18];
                    $datosEnvio_result_vent[$fila_new][20]=$datosEnvio[$j][19];
                    $datosEnvio_result_vent[$fila_new][21]=$datosEnvio[$j][20];
                    $datosEnvio_result_vent[$fila_new][22]=$datosEnvio[$j][21];
                    $datosEnvio_result_vent[$fila_new][23]=$datosEnvio[$j][22];
                    $datosEnvio_result_vent[$fila_new][24]=$datosEnvio[$j][23];
                    $datosEnvio_result_vent[$fila_new][25]=$datosEnvio[$j][24];
                    $datosEnvio_result_vent[$fila_new][26]=$datosEnvio[$j][25];
                    $datosEnvio_result_vent[$fila_new][27]=$datosEnvio[$j][26];
                    $fila_new++;
                }
            }


            // echo '<pre>';
            // print_r($datosEnvio_result_vent);
            // echo '</pre>';

            $totalVen=count($datosEnvio_result_vent);
            print "Hay ".count($datosEnvio_result_vent)." filas en la importacion de datos de VENTILACION<br><br>";
        }

        if ($fileCsvFaro !== "Oxatis/EnvioFaro/") {
            $datosFaro=array();
            $fila=0;
            $reference=-1;
            $total=0;
            if (($gestor0 = fopen($fileCsvFaro, "r")) !== false) {
                while (($datos0 = fgetcsv($gestor0, 0, "|")) !== false) {
                    $numero0 = count($datos0);

                    for ($c=0; $c < $numero0; $c++) {
                        if ($datos0[$c] == "Reference") {
                            $reference = $c;
                        }
                    }

                    if ($fila >= 0) {
                        if ($reference !== -1) {
                            $datosFaro[$fila] = trim($datos0[$reference]);
                        } else {
                            $datosFaro[$fila] = "";
                        }
                    }
                    $fila++;
                }
            }


            // echo '<pre>';
            // print_r($datosFaro);
            // echo '</pre>';
            $totalFaro = count($datosFaro);
            print "Hay ".count($datosFaro)." filas en la importacion de datos de Faro<br><br>";
        }

        $datosCSV_final[0][0]="(BO)PEDIDO OXATIS";
        $datosCSV_final[0][1]="(BO)WEB";
        $datosCSV_final[0][2]="(BO)FECHA PEDIDO";
        $datosCSV_final[0][3]="(BO)NOMBRE PAIS";
        $datosCSV_final[0][4]="(BO)ESTADO PROGRESO";
        $datosCSV_final[0][5]="(BO)ENTREGADO";
        $datosCSV_final[0][6]="(BO)IMPORTE TOTAL";
        $datosCSV_final[0][7]="(BO)NOMBRE PAGO";
        $datosCSV_final[0][8]="(BO)CONTRAREEMBOLSO";
        $datosCSV_final[0][9]="ID DE ORIGEN";
        $datosCSV_final[0][10]="NOMBRE";
        $datosCSV_final[0][11]="DIRECCION ENTREGA";
        $datosCSV_final[0][12]="CODIGO POSTAL";
        $datosCSV_final[0][13]="POBLACION";
        $datosCSV_final[0][14]="PROVINCIA";
        $datosCSV_final[0][15]="PAIS DE ENTREGA";
        $datosCSV_final[0][16]="EMAIL";
        $datosCSV_final[0][17]="TELEFONO";
        $datosCSV_final[0][18]="(BO)TELEFONO ALTERNATIVO";
        $datosCSV_final[0][19]="FAX";
        $datosCSV_final[0][20]="COD. TRANSPORTISTA";
        $datosCSV_final[0][21]="NUMERO PEDIDO";
        $datosCSV_final[0][22]="REFERENCIA";
        $datosCSV_final[0][23]="CANTIDAD";
        $datosCSV_final[0][24]="OBSERVACIONES";
        $datosCSV_final[0][25]="(BO)DESCRIPCION";
        $datosCSV_final[0][26]="(BO)FARO";


        $totalFinal=0;
        if ($totalSun > 0) {
            for ($i=1; $i < $totalSun ; $i++) {
                if ($datosEnvio_result[$i][3] == "60907" || $datosEnvio_result[$i][3] == "60910") {
                    if (strpos($datosEnvio_result[$i][24],'+')) {
                      $refDoble = explode('+', $datosEnvio_result[$i][24]);
                      for ($q=0; $q < count($refDoble) ; $q++) {
                        $totalFinal++;
                        $datosCSV_final[$totalFinal][0] = $datosEnvio_result[$i][0];
                        $datosCSV_final[$totalFinal][1] = "SUNACA";
                        $datosCSV_final[$totalFinal][2] = $datosEnvio_result[$i][1];
                        $datosCSV_final[$totalFinal][3] = $datosEnvio_result[$i][2];
                        $datosCSV_final[$totalFinal][4] = $datosEnvio_result[$i][3];
                        $datosCSV_final[$totalFinal][5] = $datosEnvio_result[$i][4];
                        $datosCSV_final[$totalFinal][6] = $datosEnvio_result[$i][5];
                        $datosCSV_final[$totalFinal][7] = $datosEnvio_result[$i][6];
                        $datosCSV_final[$totalFinal][8] = $datosEnvio_result[$i][7];
                        $datosCSV_final[$totalFinal][9] = $datosEnvio_result[$i][8];
                        $datosCSV_final[$totalFinal][10] = $datosEnvio_result[$i][10];
                        if ($datosEnvio_result[$i][9] !== ""){
                          $datosCSV_final[$totalFinal][10] = $datosEnvio_result[$i][9]." - ".$datosEnvio_result[$i][10];
                        }
                        $datosCSV_final[$totalFinal][11] = $datosEnvio_result[$i][11];
                        $datosCSV_final[$totalFinal][12] = $datosEnvio_result[$i][12];
                        $datosCSV_final[$totalFinal][13] = $datosEnvio_result[$i][13];
                        $datosCSV_final[$totalFinal][14] = $datosEnvio_result[$i][14];
                        $datosCSV_final[$totalFinal][15] = $datosEnvio_result[$i][15];
                        $datosCSV_final[$totalFinal][16] = $datosEnvio_result[$i][16];
                        $datosCSV_final[$totalFinal][17] = str_replace(" ", "", $datosEnvio_result[$i][17]);
                        $datosCSV_final[$totalFinal][17] = str_replace('.', '', $datosCSV_final[$totalFinal][17]);
                        $datosCSV_final[$totalFinal][17] = str_replace('+34', '', $datosCSV_final[$totalFinal][17]);
                        $datosCSV_final[$totalFinal][18] = str_replace(" ", "", $datosEnvio_result[$i][18]);
                        $datosCSV_final[$totalFinal][18] = str_replace('.', '', $datosCSV_final[$totalFinal][18]);
                        $datosCSV_final[$totalFinal][18] = str_replace('+34', '', $datosCSV_final[$totalFinal][18]);
                        $datosCSV_final[$totalFinal][19] = $datosEnvio_result[$i][19];
                        $datosCSV_final[$totalFinal][20] = "";
                        $datosCSV_final[$totalFinal][21] = $datosEnvio_result[$i][21];
                        $datosCSV_final[$totalFinal][22] = $refDoble[$q];
                        $datosCSV_final[$totalFinal][23] = $datosEnvio_result[$i][25];
                        $datosCSV_final[$totalFinal][24] = $datosEnvio_result[$i][26];
                        $datosCSV_final[$totalFinal][25] = $datosEnvio_result[$i][27];
                        $datosCSV_final[$totalFinal][26] = "NO";

                      }
                    } else {
                      $totalFinal++;
                      $datosCSV_final[$totalFinal][0] = $datosEnvio_result[$i][0];
                      $datosCSV_final[$totalFinal][1] = "SUNACA";
                      $datosCSV_final[$totalFinal][2] = $datosEnvio_result[$i][1];
                      $datosCSV_final[$totalFinal][3] = $datosEnvio_result[$i][2];
                      $datosCSV_final[$totalFinal][4] = $datosEnvio_result[$i][3];
                      $datosCSV_final[$totalFinal][5] = $datosEnvio_result[$i][4];
                      $datosCSV_final[$totalFinal][6] = $datosEnvio_result[$i][5];
                      $datosCSV_final[$totalFinal][7] = $datosEnvio_result[$i][6];
                      $datosCSV_final[$totalFinal][8] = $datosEnvio_result[$i][7];
                      $datosCSV_final[$totalFinal][9] = $datosEnvio_result[$i][8];
                      $datosCSV_final[$totalFinal][10] = $datosEnvio_result[$i][10];
                      if ($datosEnvio_result[$i][9] !== ""){
                        $datosCSV_final[$totalFinal][10] = $datosEnvio_result[$i][9]." - ".$datosEnvio_result[$i][10];
                      }
                      $datosCSV_final[$totalFinal][11] = $datosEnvio_result[$i][11];
                      $datosCSV_final[$totalFinal][12] = $datosEnvio_result[$i][12];
                      $datosCSV_final[$totalFinal][13] = $datosEnvio_result[$i][13];
                      $datosCSV_final[$totalFinal][14] = $datosEnvio_result[$i][14];
                      $datosCSV_final[$totalFinal][15] = $datosEnvio_result[$i][15];
                      $datosCSV_final[$totalFinal][16] = $datosEnvio_result[$i][16];
                      $datosCSV_final[$totalFinal][17] = str_replace(" ", "", $datosEnvio_result[$i][17]);
                      $datosCSV_final[$totalFinal][17] = str_replace('.', '', $datosCSV_final[$totalFinal][17]);
                      $datosCSV_final[$totalFinal][17] = str_replace('+34', '', $datosCSV_final[$totalFinal][17]);
                      $datosCSV_final[$totalFinal][18] = str_replace(" ", "", $datosEnvio_result[$i][18]);
                      $datosCSV_final[$totalFinal][18] = str_replace('.', '', $datosCSV_final[$totalFinal][18]);
                      $datosCSV_final[$totalFinal][18] = str_replace('+34', '', $datosCSV_final[$totalFinal][18]);
                      $datosCSV_final[$totalFinal][19] = $datosEnvio_result[$i][19];
                      $datosCSV_final[$totalFinal][20] = "";
                      $datosCSV_final[$totalFinal][21] = $datosEnvio_result[$i][21];
                      $datosCSV_final[$totalFinal][22] = $datosEnvio_result[$i][24];
                      $datosCSV_final[$totalFinal][23] = $datosEnvio_result[$i][25];
                      $datosCSV_final[$totalFinal][24] = $datosEnvio_result[$i][26];
                      $datosCSV_final[$totalFinal][25] = $datosEnvio_result[$i][27];
                      $datosCSV_final[$totalFinal][26] = "NO";
                    }

                }
            }
        }
        if ($totalVen > 0) {
            for ($i=1; $i < $totalVen ; $i++) {
                if ($datosEnvio_result_vent[$i][3] == "60907" || $datosEnvio_result_vent[$i][3] == "60910") {
                    if (strpos($datosEnvio_result_vent[$i][24],'+')) {
                      $refDoble = explode('+', $datosEnvio_result_vent[$i][24]);
                      for ($q=0; $q < count($refDoble) ; $q++) {
                        $totalFinal++;
                        $datosCSV_final[$totalFinal][0] = $datosEnvio_result_vent[$i][0];
                        $datosCSV_final[$totalFinal][1] = "VENTILADORES";
                        $datosCSV_final[$totalFinal][2] = $datosEnvio_result_vent[$i][1];
                        $datosCSV_final[$totalFinal][3] = $datosEnvio_result_vent[$i][2];
                        $datosCSV_final[$totalFinal][4] = $datosEnvio_result_vent[$i][3];
                        $datosCSV_final[$totalFinal][5] = $datosEnvio_result_vent[$i][4];
                        $datosCSV_final[$totalFinal][6] = $datosEnvio_result_vent[$i][5];
                        $datosCSV_final[$totalFinal][7] = $datosEnvio_result_vent[$i][6];
                        $datosCSV_final[$totalFinal][8] = $datosEnvio_result_vent[$i][7];
                        $datosCSV_final[$totalFinal][9] = $datosEnvio_result_vent[$i][8];
                        $datosCSV_final[$totalFinal][10] = $datosEnvio_result_vent[$i][10];
                        if ($datosEnvio_result_vent[$i][9] !== ""){
                          $datosCSV_final[$totalFinal][10] = $datosEnvio_result_vent[$i][9]." - ".$datosEnvio_result_vent[$i][10];
                        }
                        $datosCSV_final[$totalFinal][11] = $datosEnvio_result_vent[$i][11];
                        $datosCSV_final[$totalFinal][12] = $datosEnvio_result_vent[$i][12];
                        $datosCSV_final[$totalFinal][13] = $datosEnvio_result_vent[$i][13];
                        $datosCSV_final[$totalFinal][14] = $datosEnvio_result_vent[$i][14];
                        $datosCSV_final[$totalFinal][15] = $datosEnvio_result_vent[$i][15];
                        $datosCSV_final[$totalFinal][16] = $datosEnvio_result_vent[$i][16];
                        $datosCSV_final[$totalFinal][17] = str_replace(" ", "", $datosEnvio_result_vent[$i][17]);
                        $datosCSV_final[$totalFinal][17] = str_replace('.', '', $datosCSV_final[$totalFinal][17]);
                        $datosCSV_final[$totalFinal][17] = str_replace('+34', '', $datosCSV_final[$totalFinal][17]);
                        $datosCSV_final[$totalFinal][18] = str_replace(" ", "", $datosEnvio_result_vent[$i][18]);
                        $datosCSV_final[$totalFinal][18] = str_replace('.', '', $datosCSV_final[$totalFinal][18]);
                        $datosCSV_final[$totalFinal][18] = str_replace('+34', '', $datosCSV_final[$totalFinal][18]);
                        $datosCSV_final[$totalFinal][19] = $datosEnvio_result_vent[$i][19];
                        $datosCSV_final[$totalFinal][20] = "";
                        $datosCSV_final[$totalFinal][21] = $datosEnvio_result_vent[$i][21];
                        $datosCSV_final[$totalFinal][22] = $refDoble[$q];
                        $datosCSV_final[$totalFinal][23] = $datosEnvio_result_vent[$i][25];
                        $datosCSV_final[$totalFinal][24] = $datosEnvio_result_vent[$i][26];
                        $datosCSV_final[$totalFinal][25] = $datosEnvio_result_vent[$i][27];
                        $datosCSV_final[$totalFinal][26] = "NO";
                      }
                    } else {
                      $totalFinal++;
                      $datosCSV_final[$totalFinal][0] = $datosEnvio_result_vent[$i][0];
                      $datosCSV_final[$totalFinal][1] = "VENTILADORES";
                      $datosCSV_final[$totalFinal][2] = $datosEnvio_result_vent[$i][1];
                      $datosCSV_final[$totalFinal][3] = $datosEnvio_result_vent[$i][2];
                      $datosCSV_final[$totalFinal][4] = $datosEnvio_result_vent[$i][3];
                      $datosCSV_final[$totalFinal][5] = $datosEnvio_result_vent[$i][4];
                      $datosCSV_final[$totalFinal][6] = $datosEnvio_result_vent[$i][5];
                      $datosCSV_final[$totalFinal][7] = $datosEnvio_result_vent[$i][6];
                      $datosCSV_final[$totalFinal][8] = $datosEnvio_result_vent[$i][7];
                      $datosCSV_final[$totalFinal][9] = $datosEnvio_result_vent[$i][8];
                      $datosCSV_final[$totalFinal][10] = $datosEnvio_result_vent[$i][10];
                      if ($datosEnvio_result_vent[$i][9] !== ""){
                        $datosCSV_final[$totalFinal][10] = $datosEnvio_result_vent[$i][9]." - ".$datosEnvio_result_vent[$i][10];
                      }
                      $datosCSV_final[$totalFinal][11] = $datosEnvio_result_vent[$i][11];
                      $datosCSV_final[$totalFinal][12] = $datosEnvio_result_vent[$i][12];
                      $datosCSV_final[$totalFinal][13] = $datosEnvio_result_vent[$i][13];
                      $datosCSV_final[$totalFinal][14] = $datosEnvio_result_vent[$i][14];
                      $datosCSV_final[$totalFinal][15] = $datosEnvio_result_vent[$i][15];
                      $datosCSV_final[$totalFinal][16] = $datosEnvio_result_vent[$i][16];
                      $datosCSV_final[$totalFinal][17] = str_replace(" ", "", $datosEnvio_result_vent[$i][17]);
                      $datosCSV_final[$totalFinal][17] = str_replace('.', '', $datosCSV_final[$totalFinal][17]);
                      $datosCSV_final[$totalFinal][17] = str_replace('+34', '', $datosCSV_final[$totalFinal][17]);
                      $datosCSV_final[$totalFinal][18] = str_replace(" ", "", $datosEnvio_result_vent[$i][18]);
                      $datosCSV_final[$totalFinal][18] = str_replace('.', '', $datosCSV_final[$totalFinal][18]);
                      $datosCSV_final[$totalFinal][18] = str_replace('+34', '', $datosCSV_final[$totalFinal][18]);
                      $datosCSV_final[$totalFinal][19] = $datosEnvio_result_vent[$i][19];
                      $datosCSV_final[$totalFinal][20] = "";
                      $datosCSV_final[$totalFinal][21] = $datosEnvio_result_vent[$i][21];
                      $datosCSV_final[$totalFinal][22] = $datosEnvio_result_vent[$i][24];
                      $datosCSV_final[$totalFinal][23] = $datosEnvio_result_vent[$i][25];
                      $datosCSV_final[$totalFinal][24] = $datosEnvio_result_vent[$i][26];
                      $datosCSV_final[$totalFinal][25] = $datosEnvio_result_vent[$i][27];
                      $datosCSV_final[$totalFinal][26] = "NO";
                    }

                }
            }
        }

        print "Hay ".count($datosCSV_final)." filas en el vector FINAL que se escribiran en el CSV<br><br>";


        for ($i=0; $i < $totalFaro ; $i++) {
            for ($c=1; $c < count($datosCSV_final); $c++) {
                if ($datosFaro[$i] == $datosCSV_final[$c][22]) {
                    $datosCSV_final[$c][26] = "SI";
                }
            }
        }
        // echo '<pre>';
        // print_r($datosCSV_final);
        // echo '</pre>';



        /************************************************************************* ESCRIBIR RESULTADOS EN EL CSV */

        $fechahoy = date('d-m-y');
        $nombreCsv = "pedidofaro".$fechahoy.".csv";
        if (!$handle = fopen($nombreCsv, "w")) {
            echo "<div class='mensajeError'>El fichero CSV no se puede abrir</div>"."</br>";
            exit;
        } else {
            for ($i=0; $i < count($datosCSV_final) ; $i++) {
                fputcsv($handle, $datosCSV_final[$i], ';');
            }
            echo "<div class='mensajeBueno'>¡El fichero CSV se ha generado correctamente!</div>"."</br>";
        }

        fclose($handle); ?>
        </br>
        <table align="center" id="tableNo">
          <caption>Clientes que han realizado los pedidos - Clientes: <?php print $totalFinal; ?> <caption>
            <tr>
              <th scope="col"><b>Cod Oxatis</b></th>
              <th scope="col"><b>Nombre</b></th>
              <th scope="col"><b>Cantidad Articulos</b></th>
              <th scope="col"><b>Faro</b></th>
              <th scope="col"><b>Web</b></th>
            </tr>
            <?php
      if (count($datosCSV_final) > 0) {
          for ($p=1; $p < count($datosCSV_final); $p++) {
                  ?>
          <tr>
            <td><?php print utf8_encode($datosCSV_final[$p][0]); ?></td>
            <td><?php print utf8_encode($datosCSV_final[$p][10]); ?></td>
            <td><?php print utf8_encode($datosCSV_final[$p][23]); ?></td>
            <td><?php print utf8_encode($datosCSV_final[$p][26]); ?></td>
            <td><?php print utf8_encode($datosCSV_final[$p][1]); ?></td>
          </tr>
          <?php
          }
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
