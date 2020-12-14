<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Novo imóvel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/new-property.css">
    <script src="../../js/validators.js"></script>
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
            <a class="btn-back" href="../../index.php">
                <svg width="1em" class="back-button" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
            </a>
            <h1 class="title-home-page">Novo imóvel</h1>

        </div>
    </nav>

    <form action="../../actions/property/create-property.php" method="POST" enctype="multipart/form-data">
        <div class="owner-section">
            <h4>Informações do propietário</h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Nome</label>
                    <input type="text" name="owner-name" class="form-control" id="inputPassword4" placeholder="Ronaldinho Gaucho">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">CPF</label>
                    <input type="text" name="owner-cpf" class="form-control" id="inputEmail4" placeholder="Número do CPF" onblur="validaCPF();">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Telefone</label>
                    <input type="text" name="owner-telephone" class="form-control" id="inputEmail4" placeholder="(11) 58964213">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">WhatsApp</label>
                    <input type="text" name="owner-whatsapp" class="form-control" id="inputPassword4" placeholder="(11) 975629553">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Email</label>
                    <input type="email" name="owner-email" class="form-control" id="inputPassword4" placeholder="ronaldinho@gmail.com">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Facebook</label>
                    <input type="text" name="owner-facebook" class="form-control" id="inputPassword4" placeholder="Link do Facebook">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Instagram</label>
                    <input type="text" name="owner-instagram" class="form-control" id="inputEmail4" placeholder="Link do Instagram">
                </div>
            </div>
        </div>
        <div class="property-section">
            <h4>Informações da casa</h4>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputTitle">Descrição</label>
                    <input type="text" class="form-control" id="title" name="property-title">
                </div>
            </div>

            <h6>Endereço</h6>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputCEP">CEP</label>
                    <input type="text" size="10" maxlength="9" onblur="pesquisacep(this.value);" class="form-control" id="cep" name="address-zipcode">
                </div>
                <div class="form-group col-md-8">
                    <label for="inputCity">Rua</label>
                    <input type="text" class="form-control" id="rua" name="address-street" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity">Número</label>
                    <input type="text" class="form-control" id="validationCustom03" name="address-number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="address-neighborhood" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="address-city" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity">Estado</label>
                    <input type="text" class="form-control" id="uf" name="address-state" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity">Latitude</label>
                    <input type="text" class="form-control" id="lat" name="address-lat" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity">Longitude</label>
                    <input type="text" class="form-control" id="lon" name="address-lon" readonly>
                </div>
            </div>
            <h6>Comodos</h6>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEstado">Sala</label>
                    <select id="inputEstado" class="form-control" name="property-room">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Quarto</label>
                    <select id="inputEstado" class="form-control" name="property-bedroom">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Cozinha</label>
                    <select id="inputEstado" class="form-control" name="property-kitchen">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Banheiro</label>
                    <select id="inputEstado" class="form-control" name="property-bathroom">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Garagem</label>
                    <select id="inputEstado" class="form-control" name="property-garage">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <h6>Outras informações</h6>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEstado">Crianças</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-children" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-children" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Animais</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-pets" id="inlineRadio3" value="1">
                        <label class="form-check-label" for="inlineRadio3">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-pets" id="inlineRadio4" value="0">
                        <label class="form-check-label" for="inlineRadio4">Não</label>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Individual</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-individual" id="inlineRadio5" value="1">
                        <label class="form-check-label" for="inlineRadio5">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-individual" id="inlineRadio6" value="0">
                        <label class="form-check-label" for="inlineRadio6">Não</label>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Energia</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-energy" id="inlineRadio7" value="1">
                        <label class="form-check-label" for="inlineRadio7">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-energy" id="inlineRadio8" value="0">
                        <label class="form-check-label" for="inlineRadio8">Não</label>
                    </div>

                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Água</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-water" id="inlineRadio9" value="1">
                        <label class="form-check-label" for="inlineRadio9">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-water" id="inlineRadio10" value="0">
                        <label class="form-check-label" for="inlineRadio10">Não</label>
                    </div>

                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Contrato</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-contract" id="inlineRadio11" value="1">
                        <label class="form-check-label" for="inlineRadio11">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="property-contract" id="inlineRadio12" value="0">
                        <label class="form-check-label" for="inlineRadio12">Não</label>
                    </div>
                </div>
            </div>
            <h6>Valores</h6>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputCEP">Mensalidade</label>
                    <input type="number" class="form-control" id="valor" name="property-monthly-payment">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEP">Deposito</label>
                    <input type="number" class="form-control" id="valor" name="property-deposit">
                </div>
            </div>
        </div>
        <div class="images-section">
            <div class="form-row">
                <div class="form-group col-md-10">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Imagens selecionadas</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="arquivo[]" accept="image/jpg, image/jpeg, image/png" multiple>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-new-property" name="btn-new-owner">Cadastrar imóvel</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</body>

</html>