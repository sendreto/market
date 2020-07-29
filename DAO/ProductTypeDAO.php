<?php

include_once('../model/ProductType.php');

class ProductTypeDAO
{

    public function save($database, ProductType $productType)
    {
        $query = 'INSERT INTO product_type (name, tax) VALUES($1, $2);';

        $result = pg_prepare($database->getConnection(), "my_query", $query);

        $result = pg_execute(
            $database->getConnection(),
            "my_query",
            array($productType->getName(), $productType->getTax())
        );
    }

    public function read($database)
    {
        $query = 'SELECT * FROM product_type;';

        $result = pg_query($database->getConnection(), $query);

        return pg_fetch_all($result);
    }

}

