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

<div class="container">
    <div class="row">
        <div>
            <form class="form-product" method="POST" action="../service/ProductCreate.php">
                <div class="form-group">
                    <label for="product-name">Nome do produto</label>
                    <input type="text" size="50" id="product-name" name="product-name" placeholder="Ex.: Geladeira"
                           required>
                </div>
                <div class="form-group">
                    <label for="product-price">Preço do produto</label>
                    <input type="number" size="50" min="0.1" step="any" id="product-price" name="product-price"
                           placeholder="Ex.: 99,90"
                           required>
                </div>
                <div class="form-group">
                    <label for="product-manufacturing-date">Data de fabricação</label>
                    <input type="date" size="50" id="product-manufacturing-date" name="product-manufacturing-date"
                           placeholder="Ex.: 10/01/2018"
                           required>
                </div>
                <div class="form-group">
                    <label for="product-due-date">Data de validade</label>
                    <input type="date" size="50" id="product-due-date" name="product-due-date"
                           placeholder="Ex.: 31/10/2030"
                           required>
                </div>
                <div class="form-group">
                    <label for="product-ean">EAN do produto</label>
                    <input type="text" maxlength="13" min="1" size="50" id="product-ean" name="product-ean"
                           placeholder="Ex.: 7898577791253"
                           required>
                </div>
                <div class="form-group">
                    <label for="instrumento">Escolha um tipo de produto</label>
                    <select class="form-control" name="product-type">
                        <?php foreach ($productTypes as $value): ?>
                            <option required
                                    value="<?php echo $value['product_type_id'] ?>"><?php echo $value['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button id="cadastrar" type="submit" value="Cadastrar" class="btn btn-primary">Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include_once('partials/footer.php');
?>