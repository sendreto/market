<?php

include_once('../DAO/Database.php');

$database = new Database();

if (isset($_GET["txtnome"])) {
    $name = $_GET["txtnome"];

    if (empty($name)) {
        $sql = "
            SELECT products.\"name\" as \"name\", products.price, products.manufacturing_date, products.due_date, products.ean, product_types.\"name\" as product_type_name, product_types.tax
            from product as products
            inner join product_type as product_types
            on products.product_type_id =  product_types.product_type_id     
        ";
    } else {
        $name .= "%";
        $sql = "
            SELECT products.\"name\" as \"name\", products.price, products.manufacturing_date, products.due_date, products.ean, product_types.\"name\" as product_type_name, product_types.tax
            from product as products
            inner join product_type as product_types
            on products.product_type_id =  product_types.product_type_id
            where products.name like '$name';
        ";
    }

    sleep(1);
    $result = pg_query($sql);
    $cont = pg_affected_rows($result);

    if ($cont > 0) {

        $table = "<table class=\"table table-striped table-bordered\">
                        <thead class='uppercase'>
                            <tr>
                                <th scope=\"col\">Nome</th>
                                <th scope=\"col\">Preço</th>
                                <th scope=\"col\">Data de fabricação</th>
                                <th scope=\"col\">Data de validade</th>
                                <th scope=\"col\">EAN do produto</th>
                                <th scope=\"col\">Tipo do produto</th>
                                <th scope=\"col\">Imposto em %</th>
                                <th scope=\"col\">Quantidade</th>
                                <th scope=\"col\">Total valor</th>
                                <th scope=\"col\">Total imposto</th>
                                <th scope=\"col\">Calcular</th>
                            </tr>
                        </thead>
                        <tbody id=\"market-table\">
                        <tr>";
        $return = "$table";

        while ($row = pg_fetch_array($result)) {
            $return .= "<td>" . ($row["name"]) . "</td>";
            $return .= "<td class=\"table-price\">R$" . ($row["price"]) . "</td>";
            $return .= "<td>" . ($row["manufacturing_date"]) . "</td>";
            $return .= "<td>" . ($row["due_date"]) . "</td>";
            $return .= "<td>" . ($row["ean"]) . "</td>";
            $return .= "<td>" . ($row["product_type_name"]) . "</td>";
            $return .= "<td class=\"table-tax\">" . ($row["tax"]) . "%</td>";
            $return .= "<td>" . "<input type='number' min='1' value='1'>" . "</td>";
            $return .= "<td class=\"table-total-price\"></td>";
            $return .= "<td class=\"table-total-tax\"></td>";
            $return .= "<td>" . "<button id=\"add-cart\" type=\"button\" onclick=\"totalCalc(this);\" class=\"btn btn-secondary\">+</button>" . "</td>";
            $return .= "</tr>";
        }

        echo $return .= "</tbody></table>";
    } else {

        echo "<div  class=\"alert alert-danger search-center\" role=\"alert\">
                <p>Não foram encontrados produtos com o nome: " . substr($name, 0, -1) . "</p>
              </div>";
    }
}
?>