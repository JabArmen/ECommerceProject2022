<?php
class Product extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('productModel');
    }

    public function index()
    {
        $this->view('Product/Home', $this->productModel->getProducts());
    }
}
?>