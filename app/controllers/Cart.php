<?php
class Cart extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('productModel');
    }

    public function index()
    {
        $this->view('Cart/home',$this->productModel);
    }

    
}
?>