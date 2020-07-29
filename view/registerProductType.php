<?php
    include_once('partials/header.php');
    include_once('partials/navbar.php');

    include_once('../DAO/Database.php');
    include_once('../DAO/ProductTypeDAO.php');

    $database = new Database();
    $productTypeDAO = new ProductTypeDAO();
    $productTypes = $productTypeDAO->read($database);

?>

<div class="container">
    <div class="row">
        <div>
            <form class="product-type-form" method="POST" action="../service/ProductTypeCreate.php">
                <div class="form-group">
                    <label for="product-type-name">Tipo de produto:</label>
                    <input type="text" size="30" id="product-type-name" name="product-type-name"
                           placeholder="Ex.: Alimentício" required>
                </div>
                <div class="form-group">
                    <label for="product-type-tax">Porcentagem de imposto:</label>
                    <input type="number" size="30" step="any" id="product-type-tax" name="product-type-tax"
                           placeholder="Ex.: 2,5" required>
                </div>
                <div class="form-group">
                    <button type="submit" value="Cadastrar" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
        <div class="table-tax">
            <div class="row">
                <table class="table table-striped table-bordered">
                    <thead class="uppercase">
                        <tr>
                            <th>Nome</th>
                            <th>Imposto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($productTypes as $value): ?>
                        <tr>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['tax'] ?>%</td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    include_once('partials/footer.php');
?>