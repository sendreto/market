<?php

include_once('../DAO/Database.php');
include_once('../model/ProductType.php');
include_once('../DAO/ProductTypeDAO.php');

$productTypeName = $_POST['product-type-name'];
$productTypeTax = $_POST['product-type-tax'];

$productType = new ProductType($productTypeName, $productTypeTax);

$database = new Database();

$productTypeDAO = new ProductTypeDAO();
$productTypeDAO->save($database, $productType);

header("Location: http://localhost/market/view/registerProductType.php");
