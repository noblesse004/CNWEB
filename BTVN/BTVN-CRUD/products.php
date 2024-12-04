<?php
session_start();

// Nếu chưa có sản phẩm trong session, khởi tạo dữ liệu mặc định
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Sản phẩm A', 'quantity' => 100, 'price' => 500],
        ['id' => 2, 'name' => 'Sản phẩm B', 'quantity' => 150, 'price' => 300],
        ['id' => 3, 'name' => 'Sản phẩm C', 'quantity' => 200, 'price' => 150],
        ['id' => 4, 'name' => 'Sản phẩm D', 'quantity' => 50, 'price' => 1200],
        ['id' => 5, 'name' => 'Sản phẩm E', 'quantity' => 75, 'price' => 800],
    ];
}

// Lấy danh sách sản phẩm từ session
$products = $_SESSION['products'];

// Thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProduct'])) {
    $newProduct = [
        'id' => end($products)['id'] + 1, // Tự động tăng ID
        'name' => $_POST['name'],
        'quantity' => $_POST['quantity'],
        'price' => $_POST['price'],
    ];
    $products[] = $newProduct;
    $_SESSION['products'] = $products; // Cập nhật session
}

// Chỉnh sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editProduct'])) {
    $id = intval($_POST['id']); // Chuyển ID thành số nguyên
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $_POST['name'];
            $product['quantity'] = $_POST['quantity'];
            $product['price'] = $_POST['price'];
        }
    }
    $_SESSION['products'] = $products; // Cập nhật session
}

// Xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteProduct'])) {
    $id = intval($_POST['id']); // Chuyển ID thành số nguyên
    foreach ($products as $key => $product) {
        if ($product['id'] == $id) {
            unset($products[$key]);
        }
    }
    $_SESSION['products'] = array_values($products); // Cập nhật session và sắp xếp lại chỉ mục
}

// Cập nhật lại danh sách sản phẩm
$products = $_SESSION['products'];
?>