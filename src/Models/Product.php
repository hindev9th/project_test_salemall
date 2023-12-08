<?php
declare(strict_types=1);
namespace Src\Models;

use Config\Config;
use PDO;

class Product
{
    /**
     * Get products
     *
     * @param int $page
     * @return array|false
     */
    public function index(int $page)
    {
        $show = 24;
        $start = $page * $show;
        $conn = Config::gI()->connect();
        $sql = /** @lang text */
            "SELECT * FROM products LIMIT {$start},{$show}";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_CLASS,\Src\Entities\Product::class);
        return $results;
    }

    /**
     * Get list product
     *
     * @param int $page
     * @return array|false
     */
    public function list(int $page)
    {
        $show = 24;
        $start = $page * $show;
        $conn = Config::gI()->connect();
        $sql = /** @lang text */
            "SELECT * FROM products LIMIT {$start},{$show}";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    /**
     * Get product by id
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        $conn = Config::gI()->connect();
        $sql = /** @lang text */
            "SELECT * FROM products WHERE id = '$id'";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_CLASS,\Src\Entities\Product::class);
        return $results[0];
    }

    /**
     * Get product by id
     *
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        $conn = Config::gI()->connect();
        $sql = /** @lang text */
            "SELECT * FROM products WHERE id = '$id'";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results[0];
    }

    /**
     * Create a new product
     *
     * @param string $name
     * @param int $price
     * @param string $description
     * @param string $image
     * @return int
     */
    public function store(string $name, int $price, string $description, string $image)
    {
        $conn = Config::gI()->connect();
        $sql = /** @lang text */
            "INSERT INTO products(name,price,description,image) 
            VALUES ('$name','$price','$description','$image')";
        $query = $conn->prepare($sql);
        $query->execute();
        return 200;
    }

    /**
     * Update product by id
     *
     * @param int $id
     * @param string $name
     * @param int $price
     * @param string $description
     * @param string $image
     * @return int
     */
    public function update(int $id, string $name, int $price, string $description, string $image)
    {
        $conn = Config::gI()->connect();
        $sql = /** @lang text */
            "UPDATE products SET name='$name',price='$price',description='$description',image='$image' WHERE id = '$id'";
        $query = $conn->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }

    /**
     * Delete product by id
     *
     * @param int $id
     * @return int
     */
    public function destroy(int $id)
    {
        $conn = Config::gI()->connect();
        $sql = /** @lang text */
            "DELETE FROM products WHERE id = '$id'";
        $query = $conn->prepare($sql);
        $query->execute();
        return 200;
    }

    /**
     * Count products
     *
     * @return mixed
     */
    public function count()
    {
        $conn = Config::gI()->connect();

        $count = $conn->query(/** @lang text */"SELECT COUNT(*) FROM products");
        $count = $count->fetchColumn();
        return $count;
    }
}