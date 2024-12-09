<?php include('products.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Danh sách sản phẩm</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Số Lượng</th>
                    <th>Giá Cả</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['quantity']) ?></td>
                        <td><?= htmlspecialchars($product['price']) ?> VNĐ</td>
                        <td>
                            <a href="#editProductModal" class="btn btn-warning btn-sm" data-toggle="modal"
                               data-id="<?= $product['id'] ?>"
                               data-name="<?= htmlspecialchars($product['name']) ?>"
                               data-quantity="<?= htmlspecialchars($product['quantity']) ?>"
                               data-price="<?= htmlspecialchars($product['price']) ?>">Sửa</a>
                            <a href="#deleteProductModal" class="btn btn-danger btn-sm" data-toggle="modal"
                               data-id="<?= $product['id'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Thêm sản phẩm mới -->
        <button class="btn btn-success" data-toggle="modal" data-target="#addProductModal">Thêm sản phẩm</button>
    </div>

    <!-- Modal Thêm Sản Phẩm -->
    <div id="addProductModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số Lượng</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá Cả</label>
                            <input type="text" class="form-control" name="price" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" name="addProduct" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Sửa Sản Phẩm -->
    <div id="editProductModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" name="name" id="edit-name" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số Lượng</label>
                            <input type="number" class="form-control" name="quantity" id="edit-quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá Cả</label>
                            <input type="text" class="form-control" name="price" id="edit-price" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" name="editProduct" class="btn btn-info">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Xóa Sản Phẩm -->
    <div id="deleteProductModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="delete-id">
                        <p>Bạn có chắc chắn muốn xóa sản phẩm này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" name="deleteProduct" class="btn btn-danger">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Truyền dữ liệu vào modal sửa
        $('#editProductModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            $('#edit-id').val(button.data('id'));
            $('#edit-name').val(button.data('name'));
            $('#edit-quantity').val(button.data('quantity'));
            $('#edit-price').val(button.data('price'));
        });

        // Truyền dữ liệu vào modal xóa
        $('#deleteProductModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            $('#delete-id').val(button.data('id'));
        });
    </script>
</body>
</html>
