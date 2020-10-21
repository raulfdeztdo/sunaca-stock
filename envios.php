<?php include 'head.php'; ?>

<body>

  <?php include 'conexion.php'; ?>
  <?php include 'header.php'; ?>


  <section id="main-content">

    <article>
      <header style="min-height: 280px; display: grid; align-items: center">
        <h1>Envios</h1>
      </header>

      <div class="content">
        <?php if (!$_POST) { ?>
        <form action="envios.php" method="post"  style=" padding: 0 5%">
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
          <input type="hidden" name="proveedor" value="" id="proveedor">
          <center><input type="submit" class="enviar" name="Submit" value="Enviar"></center>

        </form>
      </div>
      <?php } ?>


      <?php

    if ($_POST) {
        /************************************************************************* RECOGER DATOS FORM */

        if (isset($_POST["fileOxatisSunaca"]) !== "false") {
            $fileCsvSunaca = "Oxatis/Envio/".$_POST["fileOxatisSunaca"];
        } else {
            $fileCsvSunaca=0;
        }
        if (isset($_POST["fileOxatisVentiladores"]) !== "false") {
            $fileCsvVentiladores = "Oxatis/Envio/".$_POST["fileOxatisVentiladores"];
        } else {
            $fileCsvVentiladores=0;
        }
        $delimitador=";";

        /************************************************************************* LEER DATOS CSV Y ALMACENARLOS */
        $totalSun=0;
        $totalVen=0;
        if ($fileCsvSunaca !== "Oxatis/Envio/") {
            $datosEnvio=array();
            $fila=0;
            $idOxatis=-1;
            $estadoProg=-1;
            $entrega=-1;
            $entreganombre=-1;
            $entregaTlfno=-1;
            $email=-1;
            $nombrepais=-1;
            $cp = -1;
            $entregaCiudad=-1;
            $entregaDir1=-1;
            $entregaDir2=-1;
            $bulto=-1;
            $referencia=-1;
            $descripcion=-1;
            $observaciones=-1;
            $observaciones2=-1;
            $nombrepago=-1;
            $importe=-1;
            $contrareembolso=-1;
            $cantart=-1;
            $total=0;
            if (($gestor0 = fopen($fileCsvSunaca, "r")) !== false) {
                while (($datos0 = fgetcsv($gestor0, 0, $delimitador)) !== false) {
                    $numero0 = count($datos0);

                    for ($c=0; $c < $numero0; $c++) {
                        if ($datos0[$c] == "Pedido.IdentificarOxatis") {
                            $idOxatis = $c;
                        } elseif ($datos0[$c] == "Pedidos.EstadoProgreso") {
                            $estadoProg = $c;
                        } elseif ($datos0[$c] == "Entrega.Empresa") {
                            $entrega = $c;
                        } elseif ($datos0[$c] == "Entrega.Nombre") {
                            $entreganombre = $c;
                        } elseif ($datos0[$c] == "Entrega.Apellidos") {
                            $entregaapellidos = $c;
                        } elseif ($datos0[$c] == "Entrega.Telefono") {
                            $entregaTlfno = $c;
                        } elseif ($datos0[$c] == "Usuario.Email") {
                            $email = $c;
                        } elseif ($datos0[$c] == "Entrega.NombrePais") {
                            $nombrepais = $c;
                        } elseif ($datos0[$c] == "Entrega.CodigoPostal") {
                            $cp = $c;
                        } elseif ($datos0[$c] == "Entrega.Ciudad") {
                            $entregaCiudad = $c;
                        } elseif ($datos0[$c] == "Entrega.DireccionLinea1") {
                            $entregaDir1 = $c;
                        } elseif ($datos0[$c] == "Entrega.DireccionLinea2") {
                            $entregaDir2 = $c;
                        } elseif ($datos0[$c] == "Articulo.Cantidad") {
                            $cantart = $c;
                        } elseif ($datos0[$c] == "UserTypology") {
                            $bulto = $c;
                        } elseif ($datos0[$c] == "Articulo.CodigoArticulo") {
                            $referencia = $c;
                        } elseif ($datos0[$c] == "Articulo.Nombre") {
                            $descripcion = $c;
                        } elseif ($datos0[$c] == "Entrega.Informacion") {
                            $observaciones = $c;
                        } elseif ($datos0[$c] == "Pedido.Instrucciones") {
                            $observaciones2 = $c;
                        } elseif ($datos0[$c] == "Pago.Nombre") {
                            $nombrepago = $c;
                        } elseif ($datos0[$c] == "Pedido.ImporteTotal") {
                            $importe = $c;
                        } elseif ($datos0[$c] == "Pedido.ContraReembolso") {
                            $contrareembolso = $c;
                        }
                    }

                    if ($fila >= 0) {
                        if ($idOxatis !== -1) {
                            $datosEnvio[$fila][0] = trim($datos0[$idOxatis]);
                        } else {
                            $datosEnvio[$fila][0] = "";
                        }
                        if ($estadoProg !== -1) {
                            if (trim($datos0[$estadoProg]) == "36031" || trim($datos0[$estadoProg]) == "40100") {
                                $datosEnvio[$fila][1] = trim($datos0[$estadoProg]);
                            } else {
                                $datosEnvio[$fila][1] = "";
                            }
                        } else {
                            $datosEnvio[$fila][1] = "";
                        }
                        if ($importe !== -1) {
                            $datosEnvio[$fila][2] = $datos0[$importe];
                        } else {
                            $datosEnvio[$fila][2]="";
                        }
                        if ($contrareembolso !== -1) {
                            $datosEnvio[$fila][3] = $datos0[$contrareembolso];
                        } else {
                            $datosEnvio[$fila][3]="";
                        }
                        $datosEnvio[$fila][4] = "R";
                        $datosEnvio[$fila][5] = "786120001";
                        $datosEnvio[$fila][6] = "SUNACA";
                        $datosEnvio[$fila][7] = "SUNACA";
                        $datosEnvio[$fila][8] = "953907003";
                        $datosEnvio[$fila][9] = "info@sunaca.es";
                        $datosEnvio[$fila][10] = "ES";
                        $datosEnvio[$fila][11] = "23700";
                        $datosEnvio[$fila][12] = "Plgo. Los Jarales";
                        $datosEnvio[$fila][13] = "S/N";
                        $datosEnvio[$fila][14] = " ";
                        if ($entrega !== -1) {
                            $datosEnvio[$fila][15] = $datos0[$entrega];
                        } else {
                            $datosEnvio[$fila][15] = "";
                        }
                        if (($entreganombre !== -1) && ($entregaapellidos !== -1)) {
                            $datosEnvio[$fila][16] = $datos0[$entreganombre]." ".$datos0[$entregaapellidos];
                        } else {
                            $datosEnvio[$fila][16] = "";
                        }
                        if (($entreganombre !== -1) && ($entregaapellidos !== -1)) {
                            $datosEnvio[$fila][17] = $datos0[$entreganombre]." ".$datos0[$entregaapellidos];
                        } else {
                            $datosEnvio[$fila][17] = "";
                        }
                        if ($entregaTlfno !== -1) {
                            if (trim($datos0[$entregaTlfno]) == "") {
                                $datosEnvio[$fila][18] = "625625190";
                            } else {
                                $datosEnvio[$fila][18] = trim($datos0[$entregaTlfno]);
                            }
                        } else {
                            $datosEnvio[$fila][18] = "";
                        }
                        if ($email !== -1) {
                            $datosEnvio[$fila][19] = trim($datos0[$email]);
                        } else {
                            $datosEnvio[$fila][19] = "";
                        }
                        if ($nombrepais !== -1) {
                            if (utf8_encode($datos0[$nombrepais]) == "España (Península)") {
                                $datosEnvio[$fila][20] = "ES";
                            } else {
                                $datosEnvio[$fila][20] = $datos0[$nombrepais];
                            }
                        } else {
                            $datosEnvio[$fila][20] = "";
                        }
                        if ($cp !== -1) {
                            if (strlen(trim($datos0[$cp])) == 4) {
                                $datosEnvio[$fila][21] = "0".trim($datos0[$cp]);
                            } else {
                                $datosEnvio[$fila][21] = trim($datos0[$cp]);
                            }
                        } else {
                            $datosEnvio[$fila][21] = "";
                        }
                        if ($entregaCiudad !== -1) {
                            $datosEnvio[$fila][22] = $datos0[$entregaCiudad];
                        } else {
                            $datosEnvio[$fila][22] = "";
                        }
                        if ($entregaDir1 !== -1) {
                            $datosEnvio[$fila][23] = $datos0[$entregaDir1];
                        } else {
                            $datosEnvio[$fila][23] = "";
                        }
                        if ($entregaDir1 !== -1) {
                            $datosEnvio[$fila][24] = "";
                        } else {
                            $datosEnvio[$fila][24] = "";
                        } // NUMERO
                        if ($entregaDir2 !== -1) {
                            $datosEnvio[$fila][25] = $datos0[$entregaDir2];
                        } else {
                            $datosEnvio[$fila][25] = "";
                        }
                        $datosEnvio[$fila][26] = "9";
                        if ($cantart !== -1) {
                            $cantArticulos = intval($datos0[$cantart]);
                        } else {
                            $cantArticulos = 0;
                        }
                        if ($bulto !== -1) {
                            $datosEnvio[$fila][27] = $cantArticulos;
                        } else {
                            $datosEnvio[$fila][27] = "";
                        }
                        $datosEnvio[$fila][28] = "";
                        if ($referencia !== -1) {
                            if ($cantArticulos > 1) {
                                $datosEnvio[$fila][29] = $cantArticulos."-".trim($datos0[$referencia]);
                            } else {
                                $datosEnvio[$fila][29] = trim($datos0[$referencia]);
                            }
                        } else {
                            $datosEnvio[$fila][29] = "";
                        }
                        if ($idOxatis !== -1) {
                            $datosEnvio[$fila][30] = trim($datos0[$idOxatis]);
                        } else {
                            $datosEnvio[$fila][30] = "";
                        }
                        $datosEnvio[$fila][31] = "3";
                        if ($descripcion !== -1) {
                            if ($cantArticulos > 1) {
                                $datosEnvio[$fila][32] = $cantArticulos."-".$datos0[$descripcion];
                            } else {
                                $datosEnvio[$fila][32] = $datos0[$descripcion];
                            }
                        } else {
                            $datosEnvio[$fila][32] = "";
                        }
                        $datosEnvio[$fila][33] = "";
                        if ($observaciones !== -1) {
                            $datosEnvio[$fila][34] = $datos0[$observaciones];
                        } else {
                            $datosEnvio[$fila][34] = "";
                        }
                        if ($observaciones2 !== -1) {
                            $datosEnvio[$fila][35] = $datos0[$observaciones2];
                        } else {
                            $datosEnvio[$fila][35] = "";
                        }
                        if ($nombrepago !== -1) {
                            if ($datos0[$nombrepago]=="Contra reembolso" || $datos0[$nombrepago] == "Contrareembolso") {
                                if ($importe !== -1) {
                                    $datosEnvio[$fila][36] = $datos0[$importe];
                                }
                            } else {
                                $datosEnvio[$fila][36] = "";
                            }
                        } else {
                            $datosEnvio[$fila][36] = "";
                        }
                        $datosEnvio[$fila][37] = "";
                        $datosEnvio[$fila][38] = "";
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
                $rep[$j]=0;
                for ($z=0; $z < $total ; $z++) {
                    if ($datosEnvio[$j][0] == $aux[$z][0]) {
                        $rep[$j]++;
                    }
                }
            }
            for ($j=0; $j < $total ; $j++) {
                for ($z=0; $z < $total ; $z++) {
                    if (($datosEnvio[$j][0] == $aux[$z][0]) && ($rep[$j] == 1)) {
                        $datosEnvio_result[$fila_new][0]=$datosEnvio[$j][0];
                        $datosEnvio_result[$fila_new][1]=$datosEnvio[$j][1];
                        $datosEnvio_result[$fila_new][2]=$datosEnvio[$j][2];
                        $datosEnvio_result[$fila_new][3]=$datosEnvio[$j][3];
                        $datosEnvio_result[$fila_new][4]=$datosEnvio[$j][4];
                        $datosEnvio_result[$fila_new][5]=$datosEnvio[$j][5];
                        $datosEnvio_result[$fila_new][6]=$datosEnvio[$j][6];
                        $datosEnvio_result[$fila_new][7]=$datosEnvio[$j][7];
                        $datosEnvio_result[$fila_new][8]=$datosEnvio[$j][8];
                        $datosEnvio_result[$fila_new][9]=$datosEnvio[$j][9];
                        $datosEnvio_result[$fila_new][10]=$datosEnvio[$j][10];
                        $datosEnvio_result[$fila_new][11]=$datosEnvio[$j][11];
                        $datosEnvio_result[$fila_new][12]=$datosEnvio[$j][12];
                        $datosEnvio_result[$fila_new][13]=$datosEnvio[$j][13];
                        $datosEnvio_result[$fila_new][14]=$datosEnvio[$j][14];
                        $datosEnvio_result[$fila_new][15]=$datosEnvio[$j][15];
                        $datosEnvio_result[$fila_new][16]=$datosEnvio[$j][16];
                        $datosEnvio_result[$fila_new][17]=$datosEnvio[$j][17];
                        $datosEnvio_result[$fila_new][18]=str_replace(' ', '', $datosEnvio[$j][18]);
                        $datosEnvio_result[$fila_new][18]=str_replace('.', '', $datosEnvio_result[$fila_new][18]);
                        $datosEnvio_result[$fila_new][18]=str_replace('+34', '', $datosEnvio_result[$fila_new][18]);
                        $datosEnvio_result[$fila_new][19]=$datosEnvio[$j][19];
                        $datosEnvio_result[$fila_new][20]=$datosEnvio[$j][20];
                        $datosEnvio_result[$fila_new][21]=$datosEnvio[$j][21];
                        $datosEnvio_result[$fila_new][22]=$datosEnvio[$j][22];
                        $datosEnvio_result[$fila_new][23]=$datosEnvio[$j][23];
                        $datosEnvio_result[$fila_new][24]=$datosEnvio[$j][24];
                        $datosEnvio_result[$fila_new][25]=$datosEnvio[$j][25];
                        $datosEnvio_result[$fila_new][26]=$datosEnvio[$j][26];
                        $datosEnvio_result[$fila_new][27]=$datosEnvio[$j][27];
                        $datosEnvio_result[$fila_new][28]=$datosEnvio[$j][28];
                        $datosEnvio_result[$fila_new][29]=$datosEnvio[$j][29];
                        $datosEnvio_result[$fila_new][30]=$datosEnvio[$j][30];
                        $datosEnvio_result[$fila_new][31]=$datosEnvio[$j][31];
                        $datosEnvio_result[$fila_new][32]=$datosEnvio[$j][32];
                        $datosEnvio_result[$fila_new][33]=$datosEnvio[$j][33];
                        $datosEnvio_result[$fila_new][34]=$datosEnvio[$j][34];
                        $datosEnvio_result[$fila_new][35]=$datosEnvio[$j][35];
                        $datosEnvio_result[$fila_new][36]=$datosEnvio[$j][36];
                        $datosEnvio_result[$fila_new][37]=$datosEnvio[$j][37];
                        $datosEnvio_result[$fila_new][38]=$datosEnvio[$j][38];
                        $fila_new++;
                    }
                    if (($datosEnvio[$j][0] == $aux[$z][0]) && ($rep[$j] > 1)) {
                        for ($h=0; $h < $total ; $h++) {
                            if ($datosEnvio[$j][0] == $aux[$h][0]) {
                                $datosEnvio_result[$fila_new][0]=$datosEnvio[$j][0];
                                $datosEnvio_result[$fila_new][1]=$datosEnvio[$j][1];
                                $datosEnvio_result[$fila_new][2]=$datosEnvio[$j][2];
                                $datosEnvio_result[$fila_new][3]=$datosEnvio[$j][3];
                                $datosEnvio_result[$fila_new][4]=$datosEnvio[$j][4];
                                $datosEnvio_result[$fila_new][5]=$datosEnvio[$j][5];
                                $datosEnvio_result[$fila_new][6]=$datosEnvio[$j][6];
                                $datosEnvio_result[$fila_new][7]=$datosEnvio[$j][7];
                                $datosEnvio_result[$fila_new][8]=$datosEnvio[$j][8];
                                $datosEnvio_result[$fila_new][9]=$datosEnvio[$j][9];
                                $datosEnvio_result[$fila_new][10]=$datosEnvio[$j][10];
                                $datosEnvio_result[$fila_new][11]=$datosEnvio[$j][11];
                                $datosEnvio_result[$fila_new][12]=$datosEnvio[$j][12];
                                $datosEnvio_result[$fila_new][13]=$datosEnvio[$j][13];
                                $datosEnvio_result[$fila_new][14]=$datosEnvio[$j][14];
                                $datosEnvio_result[$fila_new][15]=$datosEnvio[$j][15];
                                $datosEnvio_result[$fila_new][16]=$datosEnvio[$j][16];
                                $datosEnvio_result[$fila_new][17]=$datosEnvio[$j][17];
                                $datosEnvio_result[$fila_new][18]=str_replace(' ', '', $datosEnvio[$j][18]);
                                $datosEnvio_result[$fila_new][18]=str_replace('.', '', $datosEnvio_result[$fila_new][18]);
                                $datosEnvio_result[$fila_new][18]=str_replace('+34', '', $datosEnvio_result[$fila_new][18]);
                                $datosEnvio_result[$fila_new][19]=$datosEnvio[$j][19];
                                $datosEnvio_result[$fila_new][20]=$datosEnvio[$j][20];
                                $datosEnvio_result[$fila_new][21]=$datosEnvio[$j][21];
                                $datosEnvio_result[$fila_new][22]=$datosEnvio[$j][22];
                                $datosEnvio_result[$fila_new][23]=$datosEnvio[$j][23];
                                $datosEnvio_result[$fila_new][24]=$datosEnvio[$j][24];
                                $datosEnvio_result[$fila_new][25]=$datosEnvio[$j][25];
                                $datosEnvio_result[$fila_new][26]=$datosEnvio[$j][26];
                                if (isset($datosEnvio_result[$fila_new][27])=="") {
                                    $datosEnvio_result[$fila_new][27]=$aux[$h][27];
                                } else {
                                    $datosEnvio_result[$fila_new][27]+=$aux[$h][27];
                                }
                                $datosEnvio_result[$fila_new][28]=$datosEnvio[$j][28];
                                if (isset($datosEnvio_result[$fila_new][29])=="") {
                                    $datosEnvio_result[$fila_new][29]=$aux[$h][29];
                                } else {
                                    $datosEnvio_result[$fila_new][29].="+".$aux[$h][29];
                                }
                                $datosEnvio_result[$fila_new][30]=$datosEnvio[$j][30];
                                $datosEnvio_result[$fila_new][31]=$datosEnvio[$j][31];
                                if (isset($datosEnvio_result[$fila_new][32])=="") {
                                    $datosEnvio_result[$fila_new][32]=$aux[$h][32];
                                } else {
                                    $datosEnvio_result[$fila_new][32].=" + ".$aux[$h][32];
                                }
                                $datosEnvio_result[$fila_new][33]=$datosEnvio[$j][33];
                                $datosEnvio_result[$fila_new][34]=$datosEnvio[$j][34];
                                $datosEnvio_result[$fila_new][35]=$datosEnvio[$j][35];
                                $datosEnvio_result[$fila_new][36]=$datosEnvio[$j][36];
                                $datosEnvio_result[$fila_new][37]=$datosEnvio[$j][37];
                                $datosEnvio_result[$fila_new][38]=$datosEnvio[$j][38];
                                $rep[$h]=-1;
                            }
                        }
                        $fila_new++;
                    }
                }
            }


            // echo '<pre>';
            // print_r($datosEnvio_result);
            // echo '</pre>';
            $totalSun = count($datosEnvio_result);
            print "Hay ".count($datosEnvio_result)." filas en la importacion de datos de SUNACA<br><br>";
        }

        if ($fileCsvVentiladores !== "Oxatis/Envio/") {
            $datosEnvio=array();
            $fila=0;
            $idOxatis=-1;
            $estadoProg=-1;
            $entrega=-1;
            $entreganombre=-1;
            $entregaTlfno=-1;
            $email=-1;
            $nombrepais=-1;
            $cp = -1;
            $entregaCiudad=-1;
            $entregaDir1=-1;
            $entregaDir2=-1;
            $bulto=-1;
            $referencia=-1;
            $descripcion=-1;
            $observaciones=-1;
            $observaciones2=-1;
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
                        } elseif ($datos0[$c] == "Pedidos.EstadoProgreso") {
                            $estadoProg = $c;
                        } elseif ($datos0[$c] == "Entrega.Empresa") {
                            $entrega = $c;
                        } elseif ($datos0[$c] == "Entrega.Nombre") {
                            $entreganombre = $c;
                        } elseif ($datos0[$c] == "Entrega.Apellidos") {
                            $entregaapellidos = $c;
                        } elseif ($datos0[$c] == "Entrega.Telefono") {
                            $entregaTlfno = $c;
                        } elseif ($datos0[$c] == "Usuario.Email") {
                            $email = $c;
                        } elseif ($datos0[$c] == "Entrega.NombrePais") {
                            $nombrepais = $c;
                        } elseif ($datos0[$c] == "Entrega.CodigoPostal") {
                            $cp = $c;
                        } elseif ($datos0[$c] == "Entrega.Ciudad") {
                            $entregaCiudad = $c;
                        } elseif ($datos0[$c] == "Entrega.DireccionLinea1") {
                            $entregaDir1 = $c;
                        } elseif ($datos0[$c] == "Entrega.DireccionLinea2") {
                            $entregaDir2 = $c;
                        } elseif ($datos0[$c] == "Articulo.Cantidad") {
                            $cantart = $c;
                        } elseif ($datos0[$c] == "UserTypology") {
                            $bulto = $c;
                        } elseif ($datos0[$c] == "Articulo.CodigoArticulo") {
                            $referencia = $c;
                        } elseif ($datos0[$c] == "Articulo.Nombre") {
                            $descripcion = $c;
                        } elseif ($datos0[$c] == "Entrega.Informacion") {
                            $observaciones = $c;
                        } elseif ($datos0[$c] == "Pedido.Instrucciones") {
                            $observaciones2 = $c;
                        } elseif ($datos0[$c] == "Pago.Nombre") {
                            $nombrepago = $c;
                        } elseif ($datos0[$c] == "Pedido.ImporteTotal") {
                            $importe = $c;
                        } elseif ($datos0[$c] == "Pedido.ContraReembolso") {
                            $contrareembolso = $c;
                        }
                    }

                    if ($fila >= 0) {
                        if ($idOxatis !== -1) {
                            $datosEnvio[$fila][0] = trim($datos0[$idOxatis]);
                        } else {
                            $datosEnvio[$fila][0] = "";
                        }
                        if ($estadoProg !== -1) {
                            if (trim($datos0[$estadoProg]) == "36031" || trim($datos0[$estadoProg]) == "40100") {
                                $datosEnvio[$fila][1] = trim($datos0[$estadoProg]);
                            } else {
                                $datosEnvio[$fila][1] = "";
                            }
                        } else {
                            $datosEnvio[$fila][1] = "";
                        }
                        if ($importe !== -1) {
                            $datosEnvio[$fila][2] = $datos0[$importe];
                        } else {
                            $datosEnvio[$fila][2]="";
                        }
                        if ($contrareembolso !== -1) {
                            $datosEnvio[$fila][3] = $datos0[$contrareembolso];
                        } else {
                            $datosEnvio[$fila][3]="";
                        }
                        $datosEnvio[$fila][4] = "R";
                        $datosEnvio[$fila][5] = "786120001";
                        $datosEnvio[$fila][6] = "SUNACA";
                        $datosEnvio[$fila][7] = "SUNACA";
                        $datosEnvio[$fila][8] = "953907003";
                        $datosEnvio[$fila][9] = "info@sunaca.es";
                        $datosEnvio[$fila][10] = "ES";
                        $datosEnvio[$fila][11] = "23700";
                        $datosEnvio[$fila][12] = "Plgo. Los Jarales";
                        $datosEnvio[$fila][13] = "S/N";
                        $datosEnvio[$fila][14] = " ";
                        if ($entrega !== -1) {
                            $datosEnvio[$fila][15] = $datos0[$entrega];
                        } else {
                            $datosEnvio[$fila][15] = "";
                        }
                        if (($entreganombre !== -1) && ($entregaapellidos !== -1)) {
                            $datosEnvio[$fila][16] = $datos0[$entreganombre]." ".$datos0[$entregaapellidos];
                        } else {
                            $datosEnvio[$fila][16] = "";
                        }
                        if (($entreganombre !== -1) && ($entregaapellidos !== -1)) {
                            $datosEnvio[$fila][17] = $datos0[$entreganombre]." ".$datos0[$entregaapellidos];
                        } else {
                            $datosEnvio[$fila][17] = "";
                        }
                        if ($entregaTlfno !== -1) {
                            if (trim($datos0[$entregaTlfno]) == "") {
                                $datosEnvio[$fila][18] = "625625190";
                            } else {
                                $datosEnvio[$fila][18] = trim($datos0[$entregaTlfno]);
                            }
                        } else {
                            $datosEnvio[$fila][18] = "";
                        }
                        if ($email !== -1) {
                            $datosEnvio[$fila][19] = trim($datos0[$email]);
                        } else {
                            $datosEnvio[$fila][19] = "";
                        }
                        if ($nombrepais !== -1) {
                            if (utf8_encode($datos0[$nombrepais]) == "España (Península)") {
                                $datosEnvio[$fila][20] = "ES";
                            } else {
                                $datosEnvio[$fila][20] = $datos0[$nombrepais];
                            }
                        } else {
                            $datosEnvio[$fila][20] = "";
                        }
                        if ($cp !== -1) {
                            if (strlen(trim($datos0[$cp])) == 4) {
                                $datosEnvio[$fila][21] = "0".trim($datos0[$cp]);
                            } else {
                                $datosEnvio[$fila][21] = trim($datos0[$cp]);
                            }
                        } else {
                            $datosEnvio[$fila][21] = "";
                        }
                        if ($entregaCiudad !== -1) {
                            $datosEnvio[$fila][22] = $datos0[$entregaCiudad];
                        } else {
                            $datosEnvio[$fila][22] = "";
                        }
                        if ($entregaDir1 !== -1) {
                            $datosEnvio[$fila][23] = $datos0[$entregaDir1];
                        } else {
                            $datosEnvio[$fila][23] = "";
                        }
                        if ($entregaDir1 !== -1) {
                            $datosEnvio[$fila][24] = "";
                        } else {
                            $datosEnvio[$fila][24] = "";
                        } // NUMERO
                        if ($entregaDir2 !== -1) {
                            $datosEnvio[$fila][25] = $datos0[$entregaDir2];
                        } else {
                            $datosEnvio[$fila][25] = "";
                        }
                        $datosEnvio[$fila][26] = "9";
                        if ($cantart !== -1) {
                            $cantArticulos = intval($datos0[$cantart]);
                        } else {
                            $cantArticulos = 0;
                        }
                        if ($bulto !== -1) {
                            $datosEnvio[$fila][27] = $cantArticulos;
                        } else {
                            $datosEnvio[$fila][27] = "";
                        }
                        $datosEnvio[$fila][28] = "";
                        if ($referencia !== -1) {
                            if ($cantArticulos > 1) {
                                $datosEnvio[$fila][29] = $cantArticulos."-".trim($datos0[$referencia]);
                            } else {
                                $datosEnvio[$fila][29] = trim($datos0[$referencia]);
                            }
                        } else {
                            $datosEnvio[$fila][29] = "";
                        }
                        if ($idOxatis !== -1) {
                            $datosEnvio[$fila][30] = trim($datos0[$idOxatis]);
                        } else {
                            $datosEnvio[$fila][30] = "";
                        }
                        $datosEnvio[$fila][31] = "3";
                        if ($descripcion !== -1) {
                            if ($cantArticulos > 1) {
                                $datosEnvio[$fila][32] = $cantArticulos."-".$datos0[$descripcion];
                            } else {
                                $datosEnvio[$fila][32] = $datos0[$descripcion];
                            }
                        } else {
                            $datosEnvio[$fila][32] = "";
                        }
                        $datosEnvio[$fila][33] = "";
                        if ($observaciones !== -1) {
                            $datosEnvio[$fila][34] = $datos0[$observaciones];
                        } else {
                            $datosEnvio[$fila][34] = "";
                        }
                        if ($observaciones2 !== -1) {
                            $datosEnvio[$fila][35] = $datos0[$observaciones2];
                        } else {
                            $datosEnvio[$fila][35] = "";
                        }
                        if ($nombrepago !== -1) {
                            if ($datos0[$nombrepago]=="Contra reembolso" || $datos0[$nombrepago] == "Contrareembolso") {
                                if ($importe !== -1) {
                                    $datosEnvio[$fila][36] = $datos0[$importe];
                                }
                            } else {
                                $datosEnvio[$fila][36] = "";
                            }
                        } else {
                            $datosEnvio[$fila][36] = "";
                        }
                        $datosEnvio[$fila][37] = "";
                        $datosEnvio[$fila][38] = "";
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
                $rep[$j]=0;
                for ($z=0; $z < $total ; $z++) {
                    if ($datosEnvio[$j][0] == $aux[$z][0]) {
                        $rep[$j]++;
                    }
                }
            }
            for ($j=0; $j < $total ; $j++) {
                for ($z=0; $z < $total ; $z++) {
                    if (($datosEnvio[$j][0] == $aux[$z][0]) && ($rep[$j] == 1)) {
                        $datosEnvio_result_vent[$fila_new][0]=$datosEnvio[$j][0];
                        $datosEnvio_result_vent[$fila_new][1]=$datosEnvio[$j][1];
                        $datosEnvio_result_vent[$fila_new][2]=$datosEnvio[$j][2];
                        $datosEnvio_result_vent[$fila_new][3]=$datosEnvio[$j][3];
                        $datosEnvio_result_vent[$fila_new][4]=$datosEnvio[$j][4];
                        $datosEnvio_result_vent[$fila_new][5]=$datosEnvio[$j][5];
                        $datosEnvio_result_vent[$fila_new][6]=$datosEnvio[$j][6];
                        $datosEnvio_result_vent[$fila_new][7]=$datosEnvio[$j][7];
                        $datosEnvio_result_vent[$fila_new][8]=$datosEnvio[$j][8];
                        $datosEnvio_result_vent[$fila_new][9]=$datosEnvio[$j][9];
                        $datosEnvio_result_vent[$fila_new][10]=$datosEnvio[$j][10];
                        $datosEnvio_result_vent[$fila_new][11]=$datosEnvio[$j][11];
                        $datosEnvio_result_vent[$fila_new][12]=$datosEnvio[$j][12];
                        $datosEnvio_result_vent[$fila_new][13]=$datosEnvio[$j][13];
                        $datosEnvio_result_vent[$fila_new][14]=$datosEnvio[$j][14];
                        $datosEnvio_result_vent[$fila_new][15]=$datosEnvio[$j][15];
                        $datosEnvio_result_vent[$fila_new][16]=$datosEnvio[$j][16];
                        $datosEnvio_result_vent[$fila_new][17]=$datosEnvio[$j][17];
                        $datosEnvio_result_vent[$fila_new][18]=str_replace(' ', '', $datosEnvio[$j][18]);
                        $datosEnvio_result_vent[$fila_new][18]=str_replace('.', '', $datosEnvio_result_vent[$fila_new][18]);
                        $datosEnvio_result_vent[$fila_new][18]=str_replace('+34', '', $datosEnvio_result_vent[$fila_new][18]);
                        $datosEnvio_result_vent[$fila_new][19]=$datosEnvio[$j][19];
                        $datosEnvio_result_vent[$fila_new][20]=$datosEnvio[$j][20];
                        $datosEnvio_result_vent[$fila_new][21]=$datosEnvio[$j][21];
                        $datosEnvio_result_vent[$fila_new][22]=$datosEnvio[$j][22];
                        $datosEnvio_result_vent[$fila_new][23]=$datosEnvio[$j][23];
                        $datosEnvio_result_vent[$fila_new][24]=$datosEnvio[$j][24];
                        $datosEnvio_result_vent[$fila_new][25]=$datosEnvio[$j][25];
                        $datosEnvio_result_vent[$fila_new][26]=$datosEnvio[$j][26];
                        $datosEnvio_result_vent[$fila_new][27]=$datosEnvio[$j][27];
                        $datosEnvio_result_vent[$fila_new][28]=$datosEnvio[$j][28];
                        $datosEnvio_result_vent[$fila_new][29]=$datosEnvio[$j][29];
                        $datosEnvio_result_vent[$fila_new][30]=$datosEnvio[$j][30];
                        $datosEnvio_result_vent[$fila_new][31]=$datosEnvio[$j][31];
                        $datosEnvio_result_vent[$fila_new][32]=$datosEnvio[$j][32];
                        $datosEnvio_result_vent[$fila_new][33]=$datosEnvio[$j][33];
                        $datosEnvio_result_vent[$fila_new][34]=$datosEnvio[$j][34];
                        $datosEnvio_result_vent[$fila_new][35]=$datosEnvio[$j][35];
                        $datosEnvio_result_vent[$fila_new][36]=$datosEnvio[$j][36];
                        $datosEnvio_result_vent[$fila_new][37]=$datosEnvio[$j][37];
                        $datosEnvio_result_vent[$fila_new][38]=$datosEnvio[$j][38];
                        $fila_new++;
                    }
                    if (($datosEnvio[$j][0] == $aux[$z][0]) && ($rep[$j] > 1)) {
                        for ($h=0; $h < $total ; $h++) {
                            if ($datosEnvio[$j][0] == $aux[$h][0]) {
                                $datosEnvio_result_vent[$fila_new][0]=$datosEnvio[$j][0];
                                $datosEnvio_result_vent[$fila_new][1]=$datosEnvio[$j][1];
                                $datosEnvio_result_vent[$fila_new][2]=$datosEnvio[$j][2];
                                $datosEnvio_result_vent[$fila_new][3]=$datosEnvio[$j][3];
                                $datosEnvio_result_vent[$fila_new][4]=$datosEnvio[$j][4];
                                $datosEnvio_result_vent[$fila_new][5]=$datosEnvio[$j][5];
                                $datosEnvio_result_vent[$fila_new][6]=$datosEnvio[$j][6];
                                $datosEnvio_result_vent[$fila_new][7]=$datosEnvio[$j][7];
                                $datosEnvio_result_vent[$fila_new][8]=$datosEnvio[$j][8];
                                $datosEnvio_result_vent[$fila_new][9]=$datosEnvio[$j][9];
                                $datosEnvio_result_vent[$fila_new][10]=$datosEnvio[$j][10];
                                $datosEnvio_result_vent[$fila_new][11]=$datosEnvio[$j][11];
                                $datosEnvio_result_vent[$fila_new][12]=$datosEnvio[$j][12];
                                $datosEnvio_result_vent[$fila_new][13]=$datosEnvio[$j][13];
                                $datosEnvio_result_vent[$fila_new][14]=$datosEnvio[$j][14];
                                $datosEnvio_result_vent[$fila_new][15]=$datosEnvio[$j][15];
                                $datosEnvio_result_vent[$fila_new][16]=$datosEnvio[$j][16];
                                $datosEnvio_result_vent[$fila_new][17]=$datosEnvio[$j][17];
                                $datosEnvio_result_vent[$fila_new][18]=str_replace(' ', '', $datosEnvio[$j][18]);
                                $datosEnvio_result_vent[$fila_new][18]=str_replace('.', '', $datosEnvio_result_vent[$fila_new][18]);
                                $datosEnvio_result_vent[$fila_new][18]=str_replace('+34', '', $datosEnvio_result_vent[$fila_new][18]);
                                $datosEnvio_result_vent[$fila_new][19]=$datosEnvio[$j][19];
                                $datosEnvio_result_vent[$fila_new][20]=$datosEnvio[$j][20];
                                $datosEnvio_result_vent[$fila_new][21]=$datosEnvio[$j][21];
                                $datosEnvio_result_vent[$fila_new][22]=$datosEnvio[$j][22];
                                $datosEnvio_result_vent[$fila_new][23]=$datosEnvio[$j][23];
                                $datosEnvio_result_vent[$fila_new][24]=$datosEnvio[$j][24];
                                $datosEnvio_result_vent[$fila_new][25]=$datosEnvio[$j][25];
                                $datosEnvio_result_vent[$fila_new][26]=$datosEnvio[$j][26];
                                if (isset($datosEnvio_result_vent[$fila_new][27])=="") {
                                    $datosEnvio_result_vent[$fila_new][27]=$aux[$h][27];
                                } else {
                                    $datosEnvio_result_vent[$fila_new][27]+=$aux[$h][27];
                                }
                                $datosEnvio_result_vent[$fila_new][28]=$datosEnvio[$j][28];
                                if (isset($datosEnvio_result_vent[$fila_new][29])=="") {
                                    $datosEnvio_result_vent[$fila_new][29]=$aux[$h][29];
                                } else {
                                    $datosEnvio_result_vent[$fila_new][29].="+".$aux[$h][29];
                                }
                                $datosEnvio_result_vent[$fila_new][30]=$datosEnvio[$j][30];
                                $datosEnvio_result_vent[$fila_new][31]=$datosEnvio[$j][31];
                                if (isset($datosEnvio_result_vent[$fila_new][32])=="") {
                                    $datosEnvio_result_vent[$fila_new][32]=$aux[$h][32];
                                } else {
                                    $datosEnvio_result_vent[$fila_new][32].=" + ".$aux[$h][32];
                                }
                                $datosEnvio_result_vent[$fila_new][33]=$datosEnvio[$j][33];
                                $datosEnvio_result_vent[$fila_new][34]=$datosEnvio[$j][34];
                                $datosEnvio_result_vent[$fila_new][35]=$datosEnvio[$j][35];
                                $datosEnvio_result_vent[$fila_new][36]=$datosEnvio[$j][36];
                                $datosEnvio_result_vent[$fila_new][37]=$datosEnvio[$j][37];
                                $datosEnvio_result_vent[$fila_new][38]=$datosEnvio[$j][38];
                                $rep[$h]=-1;
                            }
                        }
                        $fila_new++;
                    }
                }
            }

            // echo '<pre>';
            // print_r($datosEnvio_result_vent);
            // echo '</pre>';

            $totalVen=count($datosEnvio_result_vent);
            print "Hay ".count($datosEnvio_result_vent)." filas en la importacion de datos de VENTILACION<br><br>";
        }


        $datosCSV_final[0][0]="(BO)CODIGO CLIENTES";
        $datosCSV_final[0][1]="(BO)SITUACION DE PEDIDO";
        $datosCSV_final[0][2]="(BO)IMPORTE PEDIDO";
        $datosCSV_final[0][3]="(BO)CONTRAREEMBOLSO";
        $datosCSV_final[0][4]="ES CLIENTE";
        $datosCSV_final[0][5]="CODIGO CLIENTE";
        $datosCSV_final[0][6]="NOMBRE REMITENTE";
        $datosCSV_final[0][7]="CONTACTO REMITENTE";
        $datosCSV_final[0][8]="TELEFONO REMITENTE";
        $datosCSV_final[0][9]="EMAIL REMITENTE";
        $datosCSV_final[0][10]="PAIS REMITENTE";
        $datosCSV_final[0][11]="CODIGO POSTAL REMITENTE";
        $datosCSV_final[0][12]="DIRECCION REMITENTE";
        $datosCSV_final[0][13]="NUMERO REMITENTE";
        $datosCSV_final[0][14]="RESTO DIRECCION REMITENTE";
        $datosCSV_final[0][15]="NOMBRE DESTINATARIO";
        $datosCSV_final[0][16]="CONTACTO DESTINATARIO";
        $datosCSV_final[0][17]="TELEFONO DESTINATARIO";
        $datosCSV_final[0][18]="EMAIL DESTINATARIO";
        $datosCSV_final[0][19]="PAIS DESTINATARIO";
        $datosCSV_final[0][20]="CODIGO POSTAL DESTINATARIO";
        $datosCSV_final[0][21]="LOCALIDAD DESTINATARIO";
        $datosCSV_final[0][22]="DIRECCION DESTINATARIO";
        $datosCSV_final[0][23]="NUMERO DESTINATARIO";
        $datosCSV_final[0][24]="RESTO DIRECCION DESTINATARIO";
        $datosCSV_final[0][25]="CODIGO PRODUCTO";
        $datosCSV_final[0][26]="BULTOS";
        $datosCSV_final[0][27]="PESO";
        $datosCSV_final[0][28]="REFERENCIA";
        $datosCSV_final[0][29]="NUMERO ENVIO CLIENTE";
        $datosCSV_final[0][30]="TIPO MERCANCIA";
        $datosCSV_final[0][31]="DESCRIPCION MERCANCIA";
        $datosCSV_final[0][32]="IMPORTE ASEGURADO";
        $datosCSV_final[0][33]="OBSERVACIONES";
        $datosCSV_final[0][34]="(BO)OBSERVACIONES 2";
        $datosCSV_final[0][35]="REEMBOLSO";
        $datosCSV_final[0][36]="SEGURO";
        $datosCSV_final[0][37]="SABADO";

        $totalFinal=0;
        if ($totalSun > 0) {
            for ($i=1; $i < $totalSun ; $i++) {
                if ($datosEnvio_result[$i][1] == "36031" || $datosEnvio_result[$i][1] == "40100") {
                    $totalFinal++;
                    $datosCSV_final[$totalFinal][0] = $datosEnvio_result[$i][0];
                    $datosCSV_final[$totalFinal][1] = $datosEnvio_result[$i][1];
                    $datosCSV_final[$totalFinal][2] = $datosEnvio_result[$i][2];
                    $datosCSV_final[$totalFinal][3] = $datosEnvio_result[$i][3];
                    $datosCSV_final[$totalFinal][4] = $datosEnvio_result[$i][4];
                    $datosCSV_final[$totalFinal][5] = $datosEnvio_result[$i][5];
                    $datosCSV_final[$totalFinal][6] = $datosEnvio_result[$i][6];
                    $datosCSV_final[$totalFinal][7] = $datosEnvio_result[$i][7];
                    $datosCSV_final[$totalFinal][8] = $datosEnvio_result[$i][8];
                    $datosCSV_final[$totalFinal][9] = $datosEnvio_result[$i][9];
                    $datosCSV_final[$totalFinal][10] = $datosEnvio_result[$i][10];
                    $datosCSV_final[$totalFinal][11] = $datosEnvio_result[$i][11];
                    $datosCSV_final[$totalFinal][12] = $datosEnvio_result[$i][12];
                    $datosCSV_final[$totalFinal][13] = $datosEnvio_result[$i][13];
                    $datosCSV_final[$totalFinal][14] = $datosEnvio_result[$i][14];
                    $datosCSV_final[$totalFinal][15] = $datosEnvio_result[$i][16];
                    if ($datosEnvio_result[$i][15] !== ""){
                      $datosCSV_final[$totalFinal][15] = $datosEnvio_result[$i][15]." - ".$datosEnvio_result[$i][16];
                    }
                    $datosCSV_final[$totalFinal][16] = $datosEnvio_result[$i][17];
                    $datosCSV_final[$totalFinal][17] = $datosEnvio_result[$i][18];
                    $datosCSV_final[$totalFinal][18] = $datosEnvio_result[$i][19];
                    $datosCSV_final[$totalFinal][19] = $datosEnvio_result[$i][20];
                    $datosCSV_final[$totalFinal][20] = $datosEnvio_result[$i][21];
                    $datosCSV_final[$totalFinal][21] = $datosEnvio_result[$i][22];
                    $datosCSV_final[$totalFinal][22] = $datosEnvio_result[$i][23];
                    $datosCSV_final[$totalFinal][23] = $datosEnvio_result[$i][24];
                    $datosCSV_final[$totalFinal][24] = $datosEnvio_result[$i][25];
                    $datosCSV_final[$totalFinal][25] = $datosEnvio_result[$i][26];
                    $datosCSV_final[$totalFinal][26] = $datosEnvio_result[$i][27];
                    $datosCSV_final[$totalFinal][27] = $datosEnvio_result[$i][28];
                    $datosCSV_final[$totalFinal][28] = $datosEnvio_result[$i][29];
                    $datosCSV_final[$totalFinal][29] = $datosEnvio_result[$i][30];
                    $datosCSV_final[$totalFinal][30] = $datosEnvio_result[$i][31];
                    $datosCSV_final[$totalFinal][31] = $datosEnvio_result[$i][32];
                    $datosCSV_final[$totalFinal][32] = $datosEnvio_result[$i][33];
                    $datosCSV_final[$totalFinal][33] = $datosEnvio_result[$i][34];
                    $datosCSV_final[$totalFinal][34] = $datosEnvio_result[$i][35];
                    $datosCSV_final[$totalFinal][35] = $datosEnvio_result[$i][36];
                    $datosCSV_final[$totalFinal][36] = $datosEnvio_result[$i][37];
                    $datosCSV_final[$totalFinal][37] = $datosEnvio_result[$i][38];
                }
            }
        }
        if ($totalVen > 0) {
            for ($i=1; $i < $totalVen ; $i++) {
                if ($datosEnvio_result_vent[$i][1] == "36031" || $datosEnvio_result_vent[$i][1] == "40100") {
                    $totalFinal++;
                    $datosCSV_final[$totalFinal][0] = $datosEnvio_result_vent[$i][0];
                    $datosCSV_final[$totalFinal][1] = $datosEnvio_result_vent[$i][1];
                    $datosCSV_final[$totalFinal][2] = $datosEnvio_result_vent[$i][2];
                    $datosCSV_final[$totalFinal][3] = $datosEnvio_result_vent[$i][3];
                    $datosCSV_final[$totalFinal][4] = $datosEnvio_result_vent[$i][4];
                    $datosCSV_final[$totalFinal][5] = $datosEnvio_result_vent[$i][5];
                    $datosCSV_final[$totalFinal][6] = $datosEnvio_result_vent[$i][6];
                    $datosCSV_final[$totalFinal][7] = $datosEnvio_result_vent[$i][7];
                    $datosCSV_final[$totalFinal][8] = $datosEnvio_result_vent[$i][8];
                    $datosCSV_final[$totalFinal][9] = $datosEnvio_result_vent[$i][9];
                    $datosCSV_final[$totalFinal][10] = $datosEnvio_result_vent[$i][10];
                    $datosCSV_final[$totalFinal][11] = $datosEnvio_result_vent[$i][11];
                    $datosCSV_final[$totalFinal][12] = $datosEnvio_result_vent[$i][12];
                    $datosCSV_final[$totalFinal][13] = $datosEnvio_result_vent[$i][13];
                    $datosCSV_final[$totalFinal][14] = $datosEnvio_result_vent[$i][14];
                    $datosCSV_final[$totalFinal][15] = $datosEnvio_result_vent[$i][16];
                    if ($datosEnvio_result_vent[$i][15] !== ""){
                      $datosCSV_final[$totalFinal][15] = $datosEnvio_result_vent[$i][15]." - ".$datosEnvio_result_vent[$i][16];
                    }
                    $datosCSV_final[$totalFinal][16] = $datosEnvio_result_vent[$i][17];
                    $datosCSV_final[$totalFinal][17] = $datosEnvio_result_vent[$i][18];
                    $datosCSV_final[$totalFinal][18] = $datosEnvio_result_vent[$i][19];
                    $datosCSV_final[$totalFinal][19] = $datosEnvio_result_vent[$i][20];
                    $datosCSV_final[$totalFinal][20] = $datosEnvio_result_vent[$i][21];
                    $datosCSV_final[$totalFinal][21] = $datosEnvio_result_vent[$i][22];
                    $datosCSV_final[$totalFinal][22] = $datosEnvio_result_vent[$i][23];
                    $datosCSV_final[$totalFinal][23] = $datosEnvio_result_vent[$i][24];
                    $datosCSV_final[$totalFinal][24] = $datosEnvio_result_vent[$i][25];
                    $datosCSV_final[$totalFinal][25] = $datosEnvio_result_vent[$i][26];
                    $datosCSV_final[$totalFinal][26] = $datosEnvio_result_vent[$i][27];
                    $datosCSV_final[$totalFinal][27] = $datosEnvio_result_vent[$i][28];
                    $datosCSV_final[$totalFinal][28] = $datosEnvio_result_vent[$i][29];
                    $datosCSV_final[$totalFinal][29] = $datosEnvio_result_vent[$i][30];
                    $datosCSV_final[$totalFinal][30] = $datosEnvio_result_vent[$i][31];
                    $datosCSV_final[$totalFinal][31] = $datosEnvio_result_vent[$i][32];
                    $datosCSV_final[$totalFinal][32] = $datosEnvio_result_vent[$i][33];
                    $datosCSV_final[$totalFinal][33] = $datosEnvio_result_vent[$i][34];
                    $datosCSV_final[$totalFinal][34] = $datosEnvio_result_vent[$i][35];
                    $datosCSV_final[$totalFinal][35] = $datosEnvio_result_vent[$i][36];
                    $datosCSV_final[$totalFinal][36] = $datosEnvio_result_vent[$i][37];
                    $datosCSV_final[$totalFinal][37] = $datosEnvio_result_vent[$i][38];
                }
            }
        }

        print "Hay ".count($datosCSV_final)." filas en el vector FINAL que se escribiran en el CSV<br><br>";

        // echo '<pre>';
        // print_r($datosCSV_final);
        // echo '</pre>';

        /************************************************************************* ESCRIBIR RESULTADOS EN EL CSV */

        $fechahoy = date('d-m-y');
        $nombreCsv = "oxatis-Envios-".$fechahoy.".csv";
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
            <th scope="col"><b>Bultos</b></th>
            <th scope="col"><b>Web</b></th>
          </tr>
          <?php
      if ($totalSun > 0) {
          for ($p=1; $p < count($datosEnvio_result); $p++) {
              if ($datosEnvio_result[$p][1] == "36031" || $datosEnvio_result[$p][1] == "40100") {
                  ?>
        <tr>
          <td><?php print utf8_encode($datosEnvio_result[$p][0]); ?></td>
          <td><?php print utf8_encode($datosEnvio_result[$p][16]); ?></td>
          <td><?php print utf8_encode($datosEnvio_result[$p][27]); ?></td>
          <td>SUNACA</td>
        </tr>
        <?php
              }
          }
      }
        if ($totalVen > 0) {
            for ($p=1; $p < count($datosEnvio_result_vent); $p++) {
                if ($datosEnvio_result_vent[$p][1] == "36031" || $datosEnvio_result_vent[$p][1] == "40100") {
                    ?>
        <tr>
          <td><?php print utf8_encode($datosEnvio_result_vent[$p][0]); ?></td>
          <td><?php print utf8_encode($datosEnvio_result_vent[$p][16]); ?></td>
          <td><?php print utf8_encode($datosEnvio_result_vent[$p][27]); ?></td>
          <td>VENTILACION</td>
        </tr>
        <?php
                }
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
