<?php

include_once('../model/Product.php');

class ProductDAO
{
    public function save(Database $database, Product $product)
    {
        $query = 'INSERT INTO product (name, price, manufacturing_date, due_date, ean, product_type_id) VALUES($1, $2, $3, $4, $5, $6);';

        $result = pg_prepare($database->getConnection(), "my_query", $query);

        $result = pg_execute(
            $database->getConnection(),
            "my_query",
            array(
                $product->getName(),
                $product->getPrice(),
                $product->getManufacturingDate(),
                $product->getDueDate(),
                $product->getEan(),
                $product->getProductType()
            )
        );
    }

    public function read($database)
    {
        $query = 'SELECT * FROM product;';

        $result = pg_query($database->getConnection(), $query);

        return pg_fetch_all($result);
    }

}
