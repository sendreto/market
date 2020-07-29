<?php

include_once('../DAO/Database.php');
include_once('../model/Product.php');
include_once('../model/ProductType.php');
include_once('../DAO/ProductDAO.php');

$productName = $_POST['product-name'];
$productPrice = $_POST['product-price'];
$productManufacturingDate = $_POST['product-manufacturing-date'];
$productDueDate = $_POST['product-due-date'];
$productEan = $_POST['product-ean'];
$productType = $_POST['product-type'];

var_dump($productType);

$product = new Product($productName, $productPrice, $productManufacturingDate, $productDueDate, $productEan, $productType);

$database = new Database();

$productDAO = new ProductDAO();
$productDAO->save($database, $product);

header("Location: http://localhost/market/view/productList.php");
