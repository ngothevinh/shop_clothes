<?php

namespace App\Respositories\Product;

use Dotenv\Repository\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getRelatedProducts($product,$limit=4);
    public function getFeatureProductsByCategory($categoryId);
    public function getProductOnIndex($request);
    public function getProductsByCategory($categoryName, $request);
}
