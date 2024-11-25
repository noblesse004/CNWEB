<!--admin.php-->
<?php include('products.php'); ?>
<?php include('header.php'); ?>

<?php
session_start();

// Mảng hoa (có thể thay thế bằng cơ sở dữ liệu)
$flowers = [
    ['name' => 'Hoa dạ yến thảo ', 'description' => 'Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay cả những ngày nắng nóng cao điểm của mùa hè. Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.', 'image' => 'images/hoadayenthao.jpg'],
    ['name' => 'Hoa đồng tiền', 'description' => 'Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.', 'image' => 'images/hoadongtien.jpg'],
    ['name' => 'Hoa giấy', 'description' => 'Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.', 'image' => 'images/hoagiay.jpg'],
    ['name' => 'Hoa thanh tú', 'description' => 'Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.', 'image' => 'images/hoathanhtu.jpg'],
    ['name' => 'Hoa đèn lồng', 'description' => 'Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội. Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.', 'image' => 'images/hoadenlong.jpg'],
    ['name' => 'Hoa cẩm chướng', 'description' => 'Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông. Hoa có phần thân mảnh, các đốt ngắn mang lá kép cùng nhiều màu sắc như hồng, vàng, đỏ, tím,… thậm chí có thể pha lẫn màu để tạo nên đường viền xinh xắn. Đặt một chậu hoa cẩm chướng trên bàn sẽ khiến căn phòng của bạn đẹp mắt hơn rất nhiều.', 'image' => 'images/hoacamchuong.jpg'],
    ['name' => 'Hoa huỳnh anh', 'description' => 'Nếu bạn đang đi tìm một loài hoa tô điểm cho khu vực ban công hoặc hàng rào ngôi nhà thì huỳnh anh là một lựa chọn thích hợp trong mùa này hơn cả. Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao… Huỳnh Anh rất thích nắng, ánh nắng giúp hoa tỏa sáng rực rỡ, nếu ở nơi bóng râm thì chúng sẽ nhạt màu, kém sắc.', 'image' => 'images/hoahuynhanh.jpg'],
    ['name' => 'Hoa Păng-xê', 'description' => 'Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt. Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư,… Păng-xê thường được trồng trong chậu nhỏ, với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có làn gió thổi qua. Đây cũng là loài hoa tinh tế và sức sống bền bỉ. ', 'image' => 'images/hoapangxe.jpg'],
    ['name' => 'Hoa sen', 'description' => 'Khi những tia nắng ấm áp của mùa hè bắt đầu xuất hiện thì cũng là lúc mùa sen lại về trên những cánh đồng bạt ngàn. Hoa sen tượng trưng cho vẻ đẹp trắng trong, tao nhã của tâm hồn. Hoa có thể được trồng trong chiếc ao vườn nhà, có thể được trồng trong chậu trang trí đều đẹp cả. Những bông hoa đẹp nở rộ như báo hiệu một mùa hè tuyệt đẹp hiện hữu trong ngôi nhà của bạn.', 'image' => 'images/hoasen.jpg'],
    ['name' => 'Hoa dừa cạn ', 'description' => 'Hoa dừa cạn còn có các tên gọi như trường xuân hoa, dương giác, bông dừa, mỹ miều hơn thì là Hải Đằng. Hoa nở không ngừng từ mùa xuân sang mùa hè cho đến tận mùa thu. Hoa có 3 màu cơ bản là trắng, hồng nhạt và tím nhạt, lá và hoa cùng nhau vươn lên khiến cho khóm dừa cạn tuy nhỏ bé nhưng luôn tràn đầy sức sống. Loài hoa này còn tượng trưng cho sự thành đạt và có khả năng trừ tà.', 'image' => 'images/hoaduacan.jpg'],
    ['name' => 'Hoa sử quân tử', 'description' => 'Sử quân tử là loài cây leo, hoa có cánh nhỏ xinh, màu hồng pha trắng hoặc đỏ tươi, mọc thành từng chùm khoe sắc trong nắng sớm, rung rinh trong gió. Hoa toát lên một vẻ đẹp vô cùng giản dị kèm theo mùi hương nồng đượm. Tuy nhẹ nhàng là thế nhưng sử quân tử lại có khả năng chịu được nắng nóng khắc nghiệt nên có thể trồng trong cả mùa hè.', 'image' => 'images/hoasuquantu.jpg'],
    ['name' => 'Cúc lá nho', 'description' => 'Cúc lá nho thuộc họ nhà Cúc, được biết đến với những bông hoa nhiều màu sắc phong phú, tươi sáng: nào là trắng, hồng cho đến tím, xanh dương,… và những chiếc lá to với hình dáng răng cưa độc đáo. Hạt cúc lá nho nảy mầm nhanh vào mùa xuân, nở hoa sang tận mùa hè lẫn mùa thu. Đây là loại hoa biểu trưng cho sự giàu có và trường thọ..', 'image' => 'images/cuclanho.jpg'],
    ['name' => 'Cẩm tú cầu','description' => 'Cẩm tú cầu là loại cây thường mọc thành bụi có hoa nở to thành từng chùm và đặc biệt thích hợp với mùa hè..','image' => 'images/camtucau.jpg'],
    ['name' => 'Hoa cúc dại', 'description' => 'Với phần thân mảnh mai nhưng luôn vươn lên mạnh mẽ, lại chịu được nhiệt độ cao, thậm chí là khi tiết trời hạn hán nên hoa cúc dại cực kỳ thích hợp trồng từ mùa xuân cho đến tận mùa hè nắng gắt. Hoa có màu trắng, hồng tươi sáng hay vàng cam nổi bật, không kiêu sa nhưng sức sống bền bỉ. Thậm chí khi hoa tàn, hạt rụng xuống đất lại tiếp tục phát triển vào mùa thu.', 'image' => 'images/hoacucdai.jpg'],
];

// Hiển thị danh sách hoa cho người dùng khách
if (!isset($_GET['admin'])) {
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Hoa</title>
</head>
<body>
    <h1>Danh Sách Các Loài Hoa</h1>
    <?php foreach ($flowers as $flower): ?>
        <div class="flower">
            <h2><?php echo $flower['name']; ?></h2>
            <p><?php echo $flower['description']; ?></p>  <!-- Mô tả trước hình ảnh -->
            <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>" width="300">
        </div>
    <?php endforeach; ?>
</body>
</html>
<?php
} else {
    header("Location: admin.php"); // Chuyển hướng tới trang quản trị nếu là quản trị viên
}
?>
<div class="container-xl mt-5">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <a href="#addFlowerModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i> <span>Thêm Hoa Mới</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tên Hoa</th>
                        <th>Mô Tả</th>
                        <th>Ảnh</th>
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <th>Hành Động</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['flowers'] as $index => $flower): ?>
                        <tr>
                            <td><?= htmlspecialchars($flower['name']) ?></td>
                            <td><?= htmlspecialchars($flower['description']) ?></td>
                            <td><img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" width="50"></td>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <td>
                                    <a href="#editFlowerModal" class="edit" data-toggle="modal" data-id="<?= $index ?>" data-name="<?= htmlspecialchars($flower['name']) ?>" data-description="<?= htmlspecialchars($flower['description']) ?>" data-image="<?= htmlspecialchars($flower['image']) ?>">
                                        <i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i>
                                    </a>
                                    <a href="#deleteFlowerModal" class="delete" data-toggle="modal" data-id="<?= $index ?>">
                                        <i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i>
                                    </a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>

<!-- Add Employee Modal -->
<div id="addFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Hoa Mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên Hoa</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" class="form-control-file" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="addFlower" class="btn btn-success">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Employee Modal -->
<div id="editFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa Thông Tin Hoa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên Hoa</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea class="form-control" name="description" id="edit-description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh (tuỳ chọn)</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="editFlower" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Employee Modal -->
<div id="deleteFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <input type="hidden" name="id" id="delete-id">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa Hoa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa hoa này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="deleteFlower" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>