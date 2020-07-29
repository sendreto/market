<?php
include_once('partials/header.php');
include_once('partials/navbar.php');

include_once('../DAO/Database.php');
include_once('../DAO/ProductTypeDAO.php');
include_once('../DAO/ProductDAO.php');

$database = new Database();

$productTypeDAO = new ProductTypeDAO();
$productTypes = $productTypeDAO->read($database);

$productDAO = new ProductDAO();
$products = $productDAO->read($database);
?>

    <div class="Container">
        <hr>
        <form id="form-title" class="">
            <div class="form-group">
                <label class="uppercase" for="txtnome">Informe o nome do produto</label>
                <input class="form-control" placeholder="Ex.: Alcatra" type="text" name="txtnome" id="txtnome"/>
            </div>
        </form>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnPesquisar" value="Pesquisar"
                onclick="getDados();">Pesquisar
        </button>

    </div>
    <hr/>

    <h2 id="result-search">Resultados da pesquisa</h2>
    <div id="date"></div>
    <hr>
    </div>

<?php
include_once('partials/footer.php');
?>