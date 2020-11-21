<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:8080/lab-03/public/user/CSS/home.css" >
    <title>News</title>
</head>
<body>
    <div class="header">
        <div class="quangcao_top">
            Chỗ này để ảnh quảng cáo
        </div>
        <div class="menubar">
            <div class="container">
                <div class="logo"><a href="#">LOGO</a></div>
                <div class="menu">
                    <ul>
                        <li><a href="#">Xã hội</a></li>
                        <li><a href="#">Thế giới</a></li>
                        <li><a href="#">Kinh doanh</a></li>
                        <li><a href="#">Công Nghệ</a></li>
                        <li><a href="#">Thể thao</a></li>
                        <li><a href="#">Sức khoẻ</a></li>
                        <li><a href="#">Giải trí</a></li>
                        <li><a href="#">Đời Sống</a></li>
                    </ul>
                </div>
                <div class="search">
                    <form action="search.php" method="post">
                        <div class="container-search">
                            <input class="txt-search"type="text" placeholder="search"></input>
                            <input class="btn-search" type="submit" value></input>
                        </div>
                    </form>
                </div>
                <div class="login">
                   <a href="#">login</a>
                </div>
                </div>
            </div>
            </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="tinnoibat">
                <div class = "colum-2-news width_3">
                   <?php
                        $array = $data["tintuc"];
                        $num = count($array);
                        $num2 = ($num >= 3) ? 3 : $num; 
                        for($row = 0; $row < $num2; $row++){
                            echo '
                            <div class="text">
                            <div class="left width_4">
                               <div class="img-news">
                                     <img src="http://localhost:8080/lab-03/public/user/images/image.JPG">
                                     <!-- nay de source url hinh anh tren DB ve-->
                                </div>
                            </div>
                            <div class="right width_6">
                                <div class="text-title">
                                    '.$array[$row][0].'
                                </div>
                            </div>
                        </div>
                            ';
                        }
                   ?>
                </div>
                <div class = "big-news width_5">
                    <div class="container">
                        <div class="img-big">
                            ảnh bự chà bá
                        </div>
                        <div class="tin giới thiệu">
                            <h1>
                                <?php 
                                    $array = $data["ds"];
                                
                                        echo $array[0];
                                    
                                ?>
                            </h1>
                            dòng giới thiệu
                        </div>
                    </div>
                </div>
                <div class = "colum-1-news width_2">
                    <div class="img-medium">
                        ảnh bự vừa
                    </div>
                    <div class="introduce">
                        <h4>Strong</h4>
                        dòng giới thiệu
                    </div>
                    <div class="img-medium">
                        ảnh bự vừa
                    </div>
                    <div class="introduce">
                        <h4>Strong</h4>
                        dòng giới thiệu
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="muctieu">
        <div class="tintuc">
            <div class="container">
            <div class = "colum-2-news width_7">
           
            <?php
                        $array = $data["tintuc"];
                        $num = count($array);
                        $num2 = ($num >= 3) ? 3 : $num; 
                        for($row = 0; $row < $num2; $row++){
                            echo ' 
                            <a href="#">
                                <div class="text">
                                <div class="left width_4">
                                    <div class="img-news-2">
                                        <img src="http://localhost:8080/lab-03/public/user/images/image.JPG">
                                        <!-- nay de source url hinh anh tren DB ve-->
                                    </div>
                                </div>
                                    <div class="right width_6">
                                        <div class="text-title">
                                        '.$array[$row][0].'
                                        </div>
                                        <div class="text-content">
                                        '.$array[$row][1].'
                                        </div>
                                    </div>
                                </div>
                            </a>
                            ';
                        }
            ?>
                    <!--2-->
                    
                     <!--3-->
                     
                     <!--4-->
                     
                     <!--5-->
                    
                     <!--6-->
                     <!--7-->
                </div>
            </div>
            <div class = "width_3">
                <a href="#">
                    <div class="img-qc">
                        quản cáo
                    </div>
                    <div class="img-qc">
                        quản cáo
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="contact_us">
                Liên hệ tại: <a href="#"> MinhNhutStudio.com </a>
            </div>
        </div>
    </div>
</body>
</html>