
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4888640421.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/admin/CSS/admin.css">
    <title>Admin</title>
</head>
<body>
    <div class="menu-left">
        <div class="menu-top">
            <a href="<?php echo URLROOT; ?>/admin" class="brand-link">
                <img src="<?php echo URLROOT; ?>/public/admin/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>
        </div>
        <div class="menu-home">
           <div class="menu-bar">
            <ul>
                <li class="icon icon-arrow-left" id="style-title" onclick="toggle_visibility('tieude','style-title');">
                    <div class="box"><a class="icon-phone" href="#"><span><i class="far fa-folder-open"></i></span> Thể Loại</a></div>
                    <div class="mp-level" id="tieude">
                        <ul>
                            <li><a href="<?php echo URLROOT; ?>/admin/theloai">Liệt kê thể loại</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/addtheloai">Thêm thể loại</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/theloai">Xoá thể loại</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/theloai">Sửa tiêu đề</a></li>
                        </ul>
                    </div>
                </li>
                <li class="icon icon-arrow-left" id="style-title2" onclick="toggle_visibility('thanhvien','style-title2');" >
                    <div class="box"><a class="icon-tv" href="#" ><span><i class="fas fa-address-card"></i></span> Thành viên</a></div>
                    <div class="mp-level" id="thanhvien">
                        <ul>
                            <li><a href="<?php echo URLROOT; ?>/admin/thanhvien">Liệt kê Thành viên</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/addthanhvien">Thêm Thành viên</a></li>
                            <li><a href="#">Xoá Thành viên</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/avatarthanhvien">Ảnh đại diện Thành viên</a></li>
                        </ul>
                    </div>
                </li>
                <li class="icon icon-arrow-left" id="style-title3" onclick="toggle_visibility('quangcao','style-title3');">
                    <div class="box"><a class="icon-camera" href="#" ><span><i class="fas fa-ad"></i></span>   Quảng cáo</a></div>
                    <div class="mp-level" id="quangcao">
                        <ul>
                            <li><a href="<?php echo URLROOT; ?>/admin/quangcao">Liệt kê Quảng cáo</a></li>
                            <li><a href="#">Thêm Quảng cáo</a></li>
                            <li><a href="#">Xoá Quảng cáo</a></li>
                            <li><a href="#">Sửa Quảng cáo</a></li>
                        </ul>
                    </div>
                </li>
                <li class="icon icon-arrow-left"  id="style-title4" onclick="toggle_visibility('noidung','style-title4');">
                    <div class="box"><a class="icon-camera" href="#" ><span><i class="fas fa-book-open"></i></span>  Nội dung</a></div>
                    <div class="mp-level" id="noidung">
                        <ul>
                            <li><a href="<?php echo URLROOT; ?>/admin/noidung">Liệt kê Nội dung</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/noidungpic">Hình ảnh của nội dung</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
           </div>
        </div>
    </div>
    <!--SANG phân bên tay phải-->
    <div class="header-right">
        <!--phan top header-->
        <div class="header">
            <div class="title_left">
                <div class="container">
                    <div class="logo_home">
                        <a class="logo" href="#">Logo-team</a>
                        <a class="home" href="#">Home</a>
                    </div>
                </div>
            </div>
            <div class="title_right">
                <div class="thongbao-message">
                        <a  href="#"><i class="fab fa-facebook-messenger"></i></a>
                        <a  href="#"><i class="far fa-bell"></i></a>
                    <form action="<?php echo URLROOT;?>/admin/logout" id="logout" method="POST">
                        <button name="btnLogout" form="logout" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>