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

<div id="form-product-list" class="container">
    <div>
        <table class="table table-striped table-bordered">
            <thead class="uppercase">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Data de fabricação</th>
                    <th scope="col">Data de validade</th>
                    <th scope="col">EAN do produto</th>
                    <th scope="col">Tipo do produto</th>
                    <th scope="col">Imposto em %</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $value): ?>
                <tr>
                    <td><?php echo $value['name'] ?></td>
                    <td>R$<?php echo $value['price'] ?></td>
                    <td><?php echo $value['manufacturing_date'] ?></td>
                    <td><?php echo $value['due_date'] ?></td>
                    <td><?php echo $value['ean'] ?></td>
                    <?php foreach ($productTypes as $type): ?>
                        <?php if ($value['product_type_id'] == $type['product_type_id']): ?>
                            <td><?php echo $type['name'] ?></td>
                            <td><?php echo $type['tax'] ?>%</td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    include_once('partials/footer.php');
?>