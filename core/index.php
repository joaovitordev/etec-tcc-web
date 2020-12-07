<?php

// Conexão
include_once 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Dashboard Template · Bootstrap</title>
  <script src="https://kit.fontawesome.com/54e963f008.js" crossorigin="anonymous"></script>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/styles.css" rel="stylesheet">
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark navbar-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse itens-menu navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z" />
              <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
            </svg>Imóveis <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
            </svg>Usuários</a>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-second">
    <div class="row second-navbar-itens">
      <h1 class="title-home-page">Imóveis</h1>
      <a href="pages/property/create-property.php">
        <button type="button" class="btn btn-sm btn-novo-imovel">Novo imóvel</button>
      </a>
    </div>
  </nav>


  <div class="container">

    <br>
    <form>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="text" placeholder="Buscar..." class="form-control" id="inputPassword">
        </div>
      </div>
    </form>

    <br>
    <div class="row">
      <?php
      $sql = "SELECT *, GROUP_CONCAT(images.url SEPARATOR ',') AS 'images-property' FROM property 
        inner JOIN owner ON (property.id_owner = owner.id_owner) 
        inner JOIN address ON (property.id_address = address.id_address)  
        inner JOIN images ON (images.id_property = property.id_property)
        GROUP BY PROPERTY.ID_PROPERTY;
        ";
      $resultado = mysqli_query($connect, $sql);

      if (mysqli_num_rows($resultado) > 0) :

        while ($dados = mysqli_fetch_array($resultado)) :
      ?>


          <div class="col-3">
            <div class="card-deck">
              <div class="card" style="width: 18rem; margin-bottom: 20px;">

                <img style="width: 100%; height: 150px" src="images/<?php
                                                                    $values = explode(',', $dados['images-property']);
                                                                    echo $values[0];
                                                                    ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $dados['title']; ?></h5>
                  <p class="card-text"><i class="fas fa-map-marker-alt card-icon-list-map"></i> <?php echo $dados['street'] . ', ' . $dados['address_number'] . ', ' . $dados['neighborhood']; ?></p>
                  <p class="card-text"><i class="fas fa-user-alt card-icon-list-person"></i> <?php echo $dados['full_name']; ?></p>

                  <hr>
                  <center>
                    <div class="row">
                      <div class="col-4">
                        <button type="button" data-toggle="modal" data-target="#property<?php echo $dados['id_property']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-expand"></i></button>
                      </div>
                      <div class="col-4">
                        <button type="button" class="btn btn-warning btn-sm"><i style="color: #fff;" class="far fa-edit"></i></button>
                      </div>
                      <div class="col-4">
                        <button type="button" data-toggle="modal" data-target="#propertyDelete<?php echo $dados['id_property']; ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                      </div>
                    </div>
                  </center>

                </div>

              </div>
            </div>
          </div>


          <!-- Modal delete -->
          <div class="modal fade" id="propertyDelete<?php echo $dados['id_property']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">IMÓVEL #<?php echo $dados['id_property']; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="actions/property/delete-property.php" method="POST">
                    <input type="hidden" name="id_property" value="<?php echo $dados['id_property']; ?>">
                    <p>Deseja realmente deletar o imóvel?</p>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-deletar" class="btn btn-sm btn-modal-delete-primary">Sim, quero deletar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal view -->
          <div class="modal fade" id="property<?php echo $dados['id_property']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">IMÓVEL #<?php echo $dados['id_property']; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row justify-content-md-center">
                    <div class="col-sm card-carrousel">
                      <h2 class="title-profile"><?php echo $dados['title']; ?></h2>
                      <img class="img-profile" src="images/<?php $values = explode(',', $dados['images-property']);
                                                            echo $values[0]; ?>">
                    </div>
                    <div class="col-sm card-maps">
                      <h2 class="title-profile"><?php echo $dados['street'] . ', ' . $dados['address_number'] . ', ' . $dados['neighborhood']; ?></h2>
                      <div id="mapid" style="width: 600px; height: 400px;"></div>
                      <script>
                        var mymap = L.map('mapid').setView([-23.7259572, -46.7580792], 13);

                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                          maxZoom: 18,
                          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                          id: 'mapbox/streets-v11',
                          tileSize: 512,
                          zoomOffset: -1
                        }).addTo(mymap);

                        L.marker([-23.7259572, -46.7580792]).addTo(mymap)


                        var popup = L.popup();

                        function onMapClick(e) {
                          popup
                            .setLatLng(e.latlng)
                            .setContent("You clicked the map at " + e.latlng.toString())
                            .openOn(mymap);
                        }

                        mymap.on('click', onMapClick);
                      </script>
                    </div>
                  </div>
                  <br>
                  <center>
                    <div class="row justify-content-md-center">
                      <div class="col-2 background">
                        <i class="fas fa-bed icons-grid"></i>
                        <p><?php echo $dados['bedroom']; ?> Quartos</p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-couch icons-grid"></i>
                        <p><?php echo $dados['room']; ?> Salas</p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-utensils icons-grid"></i>
                        <p><?php echo $dados['kitchen']; ?> Cozinhas</p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-shower icons-grid"></i>
                        <p><?php echo $dados['bathroom']; ?> Banheiros</p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-car icons-grid"></i>
                        <p><?php echo $dados['garage']; ?> Garagem</p>
                      </div>
                    </div>
                  </center>

                  <center>
                    <div class="row justify-content-md-center">
                      <div class="col-2 background">
                        <i class="fas fa-file-contract icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['property_contract'] === 1) {
                            echo 'Tem contrato';
                          } else {
                            echo 'Não tem contrato';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-baby icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['children'] === 1) {
                            echo 'É permitido crianças';
                          } else {
                            echo 'Não é permitido crianças';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-paw icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['pets'] === 1) {
                            echo 'É permitido animais';
                          } else {
                            echo 'Não é permitido animais';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-users icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['individual'] === 1) {
                            echo 'A casa é individual';
                          } else {
                            echo 'A casa não é individual';
                          }
                          ?>
                        </p>
                      </div>
                    </div>
                  </center>

                  <center>
                    <div class="row justify-content-md-center">
                      <div class="col-2 background">
                        <i class="fas fa-faucet icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['energy'] === 1) {
                            echo 'A energia está inclusa na mensalidade';
                          } else {
                            echo 'A energia não está inclusa na mensalidade';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-lightbulb icons-grid"></i>
                        <p>
                          <?php
                          if ($dados['water'] === 1) {
                            echo 'A água está inclusa na mensalidade';
                          } else {
                            echo 'A água não está inclusa na mensalidade';
                          }
                          ?>
                        </p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-money-check-alt icons-grid"></i>
                        <p><?php echo 'R$ ' . $dados['deposit'] . ' de depósito'; ?></p>
                      </div>
                      <div class="col-2 background">
                        <i class="fas fa-calendar-day icons-grid"></i>
                        <p><?php echo 'R$ ' . $dados['monthly_payment'] . ' de mensalidade'; ?></p>
                      </div>
                    </div>
                  </center>


                </div>
              </div>
            </div>
          </div>


        <?php
        endwhile;
      else : ?>


      <?php
      endif;
      ?>



    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>