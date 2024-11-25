<?php
session_start();

if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = [
        [
            'name' => 'Hoa dạ yến thảo ',
            'description' => 'Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.',
            'image' => 'images/hoadayenthao.jpg'
        ],
        [
            'name' => 'Hoa đồng tiền',
            'description' => 'Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh.',
            'image' => 'images/hoadongtien.jpg'
        ],
        [
            'name' => 'Hoa Giấy',
            'description' => 'Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng.',
            'image' => 'images/hoagiay.jpg'
        ],
        [
            'name' => 'Hoa thanh tú ',
            'description' => 'Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm.',
            'image' => 'images/hoathanhtu.jpg'
        ],
        [
            'name' => 'Hoa đèn lồng ',
            'description' => 'Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao.',
            'image' => 'images/hoadenlong.jpg'
        ],
        [
            'name' => ' Hoa cẩm chướng ',
            'description' => 'Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông.',
            'image' => 'images/hoacamchuong.jpg'
        ],
        [
            'name' => 'Hoa huỳnh anh ',
            'description' => ' Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao…',
            'image' => 'images/hoahuynhanh.jpg'
        ],
        [
            'name' => 'Hoa Păng-xê',
            'description' => 'Păng-xê thường được trồng trong chậu nhỏ, với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có làn gió thổi qua',
            'image' => 'images/hoapangxe.jpg'
        ],
        [
            'name' => ' Hoa sen ',
            'description' => 'Hoa sen tượng trưng cho vẻ đẹp trắng trong, tao nhã của tâm hồn.',
            'image' => 'images/hoasen.jpg'
        ],
        [
            'name' => ' Hoa dừa cạn ',
            'description' => 'Hoa dừa cạn còn có các tên gọi như trường xuân hoa, dương giác, bông dừa, mỹ miều hơn thì là Hải Đằng.',
            'image' => 'images/hoaduacan.jpg'
        ],
        [
            'name' => ' Hoa sử quân tử',
            'description' => 'Sử quân tử là loài cây leo, hoa có cánh nhỏ xinh, màu hồng pha trắng hoặc đỏ tươi, mọc thành từng chùm khoe sắc trong nắng sớm, rung rinh trong gió. ',
            'image' => 'images/hoasuquantu.jpg'
        ],
        [
            'name' => 'Cúc lá nho',
            'description' => 'Cúc lá nho thuộc họ nhà Cúc, được biết đến với những bông hoa nhiều màu sắc phong phú, tươi sáng: nào là trắng, hồng cho đến tím, xanh dương,… và những chiếc lá to với hình dáng răng cưa độc đáo.',
            'image' => 'images/cuclanho.jpg'
        ],
        [
            'name' => 'Cẩm tú cầu',
            'description' => 'Cẩm tú cầu là loại cây thường mọc thành bụi có hoa nở to thành từng chùm và đặc biệt thích hợp với mùa hè..',
            'image' => 'images/camtucau.jpg'
        ],
        [
            'name' => 'Hoa cúc dại ',
            'description' => 'Hoa có màu trắng, hồng tươi sáng hay vàng cam nổi bật, không kiêu sa nhưng sức sống bền bỉ.',
            'image' => 'images/hoacucdai.jpg'
        ],
    ];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Thêm hoa mới
    if (isset($_POST['addFlower'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        // Xử lý ảnh tải lên
        $imagePath = 'images/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

        // Lưu hoa vào session
        $_SESSION['flowers'][] = [
            'name' => $name,
            'description' => $description,
            'image' => $imagePath,
        ];
    }

    // Sửa thông tin hoa
    if (isset($_POST['editFlower'])) {
        $id = $_POST['id'];
        $_SESSION['flowers'][$id]['name'] = $_POST['name'];
        $_SESSION['flowers'][$id]['description'] = $_POST['description'];

        // Cập nhật ảnh nếu có thay đổi
        if (!empty($_FILES['image']['name'])) {
            $imagePath = 'images/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            $_SESSION['flowers'][$id]['image'] = $imagePath;
        }
    }

    // Xóa hoa
    if (isset($_POST['deleteFlower'])) {
        $id = $_POST['id'];
        unset($_SESSION['flowers'][$id]);
        $_SESSION['flowers'] = array_values($_SESSION['flowers']); // Đánh lại chỉ số
    }
 }