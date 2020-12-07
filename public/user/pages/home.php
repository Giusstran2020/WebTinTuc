<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/public/user/CSS/home.css" >
    <title>News</title>
</head>
<body>
    <div class="header">
        <div class="quangcao_top">
            Chỗ này để ảnh quảng cáo
        </div>
        <div class="menubar">
            <div class="container">
            <?php
                    if(isset($data["infoUser"])){
                        foreach($data["infoUser"] as $user){
                         echo "<div class= 'logo '><p>Chào ".$user->Username." </p></div>";
                        }
                    }
                    else{
                        echo "<div class= 'logo '><a href='".URLROOT."/home'>LOGO</a></div>";
                    }
            ?>
                
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
                    <form action="" method="post">
                        <div class="container-search">
                            <input class="txt-search"type="text" placeholder="Tìm kiếm"></input>
                            <input class="btn-search" type="submit" value></input>
                        </div>
                    </form>
                </div>
                <div class="login">
                <?php
                    if(isset($_SESSION['username_0'])){
                         echo "<a href='".URLROOT."/user/logout'>Đăng xuất</a>";
                    }
                    else{
                        echo "<a href='".URLROOT."/user/login'>Đăng nhập</a>";
                    }
                ?>
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
                    $viewd = 0;
                    $i = 0;
                       foreach($data["dsnoidung"] as $list){  
                            if($list->HotNews == "1"){
                                $i++;
                                echo '
                                <a class="link" href="'.URLROOT.'/home/viewed/'.$list->IdNews.'">
                                <div class="text">
                                <div class="left width_4">
                                <div class="img-news">
                                        <img src="http://localhost:8080/lab-03/public/user/images/image.JPG">
                                        <!-- nay de source url hinh anh tren DB ve-->
                                    </div>
                                </div>
                                <div class="right width_6">
                                    <div class="text-title">
                                        '.$list->Title.'
                                    </div>
                                </div>
                            </div>
                            </a>
                                ';
                            if(!isset($_SESSION['username_0'])){
                                if(!isset($_SESSION['view'] ))
                                    $_SESSION['view'] = array();
                                else{
                                    $_SESSION['view'][$viewd++] = $list->IdNews;
                                }
                            }
                            else{

                            }
                        }
                        if($i == 3){
                            break;
                        }
                    }
                    
                   ?>
                </div>
                <div class = "big-news width_5">
                    <div class="container">
                        <a href="#" class="link">
                            <div class="img-big">
                                <?php
                                    echo '
                                            <img src="http://localhost:8080/lab-03/public/user/images/image.JPG">
                                    ';
                                ?>
                            </div>
                            <div class="tin giới thiệu">
                                
                                    <?php
                                    foreach($data["dsnoidung"] as $list){  
                                        if($list->HotNews == "1"){
                                            echo '<h1>'.$list->Title.'</h1>'.'
                                            <p>'.$list->Overview.' </p>
                                            ';
                                        break;
                                        }
                                    }
                                    ?>
                            </div>
                        </a>

                    </div>
                </div>
                <div class = "colum-1-news width_2">
                   
                        <?php
                            $n = 0;
                            foreach($data["dsnoidung"] as $list){  
                                if($list->HotNews == "1"){
                                    if($n >= $i && $n < $i + 2){
                                        echo '
                                        <a href="'.URLROOT.'/home/viewed/'.$list->IdNews.'" class="link">
                                                
                                                    <div class="img-medium">
                                                    <img src="http://localhost:8080/lab-03/public/user/images/image.JPG">
                                                    </div>
                                                    <div class="introduce">
                                                        <h4>'.$list->Title.'</h4>
                                                        <p>'.$list->Overview.'</p>
                                                    </div>  

                                            </a>    
                                        ';
                                    }
                                    $n++;
                                }
                            }
                        ?>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="muctieu">
        <div class="tintuc">
            <div class="container">
            <div class = "colum-2-news width_7">
           
            <?php
            foreach($data["dsnoidung"] as $list){  
                if($list->HotNews == "0"){
                            echo ' 
                            <a class="link" href="'.URLROOT.'/home/viewed/'.$list->IdNews.'">
                                <div class="text">
                                <div class="left width_4">
                                    <div class="img-news-2">
                                        <img src="http://localhost:8080/lab-03/public/user/images/image.JPG">
                                        <!-- nay de source url hinh anh tren DB ve-->
                                    </div>
                                </div>
                                    <div class="right width_6">
                                        <div class="text-title">
                                        '.$list->Title.'
                                        </div>
                                        <div class="text-content">
                                        '.$list->Overview.'
                                        </div>
                                    </div>
                                </div>
                            </a>
                            ';}
                        }
            ?>
            <div>
                <h1>
                    Danh mục đã xem
                </h1>
                <?php
                   if(!isset($data['dsview'])){
                       echo "<h3> Chưa có mục nào </h3>";
                   }
                   else{
                       foreach($data['dsview'] as $dsview){
                        foreach($dsview as $viewed)
                           echo '
                           <div class="text-title">
                           '.$viewed->Title.'
                           </div>
                           <div class="text-content">
                           '.$viewed->Overview.'
                           </div>';
                       }
                    }
                ?>
            </div>
                    
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