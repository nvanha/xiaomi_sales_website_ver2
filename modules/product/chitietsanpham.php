<?php
    include 'admincp/modules/config.php';
    $query_chitiet = mysqli_query($conn, "CALL chi_tiet_sp('$_GET[id]');");
    $row_chitiet = mysqli_fetch_array($query_chitiet);
?>
<div class="main-detail" id="main-detail">
    <p class="main-detail__link"><a href="index.php">Trang chủ</a> / <a href="index.php?xem=chitietloaisanpham&id=<?php echo $row_chitiet['MaNhom'] ?>#line"><?php echo $row_chitiet['TenNhom'] ?></a> / <a href="#main-detail"><?php echo $row_chitiet['TenHH'] ?></a></p>
    <p class="main-detail__name"><?php echo $row_chitiet['TenHH'] ?><span>(<?php echo $row_chitiet['MSHH'] ?>)</span></p>
    <div class="main-detail__container">
        <div class="main-detail__left">
            <img src="admincp/modules/quanlychitietsp/uploads/<?php echo $row_chitiet['Hinh'] ?>" alt="image" />
            <p><span>Thông tin sản phẩm</span><?php echo $row_chitiet['MoTaHH'] ?></p>
        </div>
        <div class="main-detail__right">
            <div class="main-detail__information-product">
                <p><?php echo number_format($row_chitiet['Gia']) ?>đ<span><?php echo number_format($row_chitiet['Gia'] + 780000) ?>đ</span></p>
                <p>Số lượng:<span><?php echo $row_chitiet['SoLuongHang'] ?></span></p>
            </div>
            <div class="main-detail__information-pay">
                <div class="main-preferential">
                    <p>Ưu đãi thêm</p>
                    <p><i class="fa fa-check-circle"></i>Thu cũ đổi mới - Trợ giá ngay 15%</p>
                    <p><i class="fa fa-check-circle"></i>Giảm ngay 35% khi mua kèm 2 điện thoại Samsung</p>
                </div>
                <div class="main-formality">
                    <ul>
                        <li>
                            <img src="image/pay/smartpay.png" alt="Hình">
                            <p><span>Thanh toán SmartPay</span>Giảm ngay 20% tối đa 500.000đ khi thanh toán qua Smartpay Tại quầy</p>
                        </li>
                        <li>
                            <img src="image/pay/moca.png" alt="Hình">
                            <p><span>Thanh toán ví Moca trên ứng dụng Grab</span>Nhập MOCA400 Giảm/Hoàn tiền 10% tối đa 400.000đ khi thanh toán Online bằng ví Moca</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-pay">
                <div class="main-buy">
                    <a href="index.php?xem=giohang&add=<?php echo $row_chitiet['MSHH'] ?>#cart"><span>Mua ngay</span>Giao hàng trong 1 giờ hoặc nhận tại shop</a>
                </div>
                <div class="main-installment">
                    <p><span>Trả góp 0%</span>Duyệt nhanh qua điện thoại</p>
                    <p><span>Trả góp qua thẻ</span>Visa, Master Card, JCB</p>
                </div>
            </div>
        </div>
    </div>    
</div>
<?php
    mysqli_close($conn);
?>