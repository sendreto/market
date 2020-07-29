<?php

include_once('ProductType.php');

class Product
{

    private int $id;
    private string $name;
    private float $price;
    private $manufacturingDate;
    private $dueDate;
    private int $ean;
    private int $productType;

    /**
     * Product constructor.
     * @param string $name
     * @param float $price
     * @param $manufacturingDate
     * @param $dueDate
     * @param int $ean
     * @param int $productType
     */
    public function __construct(string $name, float $price, $manufacturingDate, $dueDate, int $ean, int $productType)
    {
        $this->name = $name;
        $this->price = $price;
        $this->manufacturingDate = $manufacturingDate;
        $this->dueDate = $dueDate;
        $this->ean = $ean;
        $this->productType = $productType;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice() : float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getManufacturingDate()
    {
        return $this->manufacturingDate;
    }

    /**
     * @param mixed $manufacturingDate
     */
    public function setManufacturingDate($manufacturingDate)
    {
        $this->manufacturingDate = $manufacturingDate;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return int
     */
    public function getEan() : int
    {
        return $this->ean;
    }

    /**
     * @param int $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @return int
     */
    public function getProductType() : int
    {
        return $this->productType;
    }

    /**
     * @param int $productType
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

}

