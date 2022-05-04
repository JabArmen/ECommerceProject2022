<?php
class Product extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('productModel');
        
        if (!isset($_SESSION['theme'])) {
            $_SESSION['theme'] = 'light-theme';
        }
    }

    public function index()
    {
        $this->view('Product/index', $this->productModel->getProducts());
    }

    public function theme()
    {
        if ($_SESSION['theme'] == 'light-theme') {
            $_SESSION['theme'] = 'dark-theme';
        } else {
            $_SESSION['theme'] = 'light-theme';
        }

        header("Location: " . URLROOT . "/Product/index");
    }

    public function addCart($product_id)
    {
        if (!isset($_SESSION['cart_products'])) {
            $_SESSION['cart_products'] = [];
        }
        if (isset($_SESSION['cart_products'][$product_id])) {
            $this->incrementProduct($product_id);
        } else {
            $_SESSION['cart_products'][$product_id] = 1;
        }
        header("Location: " . URLROOT . "/Product/index");
    }


    public function decrementProduct($product_id)
    {
        if ($_SESSION['cart_products'][$product_id] > 1) {
            $_SESSION['cart_products'][$product_id] = $_SESSION['cart_products'][$product_id] - 1;
        } else {
            unset($_SESSION['cart_products'][$product_id]);
        }
        header("Location: " . URLROOT . "/Cart/index");
    }

    public function incrementProduct($product_id)
    {
        $_SESSION['cart_products'][$product_id] = $_SESSION['cart_products'][$product_id] + 1;

        header("Location: " . URLROOT . "/Cart/index");
    }

    public function clearCart()
    {
        unset($_SESSION['cart_products']);
        header("Location: " . URLROOT . "/Cart/index");
    }
}
