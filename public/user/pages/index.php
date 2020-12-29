 
    <!-----Body------>
<section calss="body-absolute">
    <div class="container-fluid2 padding mb-5" >
        <div class="row mx-0">
            <div class="col-md-8 col-12 padding animate-box" data-animate-effect="fadeIn">
                        <?php
                            if(isset($data['dsnoidung'])){
                                $count = 0;
                                foreach($data['dsnoidung'] as $dsnoidung){
                                    if($dsnoidung->HotNews == 1 && $dsnoidung->NewsAppear == 1){
                                        echo ' <div class="all_suceeall_height"><img src="./'.$dsnoidung->UrlPics.'" alt="img"/>
                                                <div class="all_suceeall_height_position_absolute"></div>
                                                <div class="all_suceeall_height_position_absolute_font">
                                                <div class=""><a href="#" class="color_fff"></a></div>';
                                        echo '<div class=""><a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_good_font">'.$dsnoidung->Title.'</a></div>';
                                        $id = $dsnoidung->IdNews;
                                        break;
                                    }
                                }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                <?php
                        $count = 0;
                        foreach($data['dsnoidung'] as $dsnoidung){
                            if($dsnoidung->HotNews == 1 && $dsnoidung->NewsAppear == 1 &&  $id != $dsnoidung->IdNews){
                            echo '<div class="col-md-12 col-12 paddding animate-box" data-animate-effect="fadeIn">
                            <div class="all_suceeall_height_2"><img src="./'.$dsnoidung->UrlPics.'" alt="img"/>
                                <div class="all_suceeall_height_position_absolute"></div>
                                <div class="all_suceeall_height_position_absolute_font_2">
                                    <div class=""><a href="#" class="color_fff"></a></div>';
                            echo '<div class=""><a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_good_font_2"> '.$dsnoidung->Title.'</a></div>';
                            echo '
                            </div>
                            </div>';
                            if($count >= 1) break;
                            $count++;
                        }
                    }    
                }                     
                ?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div class="all_heading all_heading_border_bottom py-2 mb-4">Trending</div>
            <div class="owl-carousel owl-theme js" id="slider1">
                <?php
                     foreach($data['dsnoidung_view'] as $dsnoidung){
                        if($dsnoidung->Views != 0){
                         echo '     <div class="item px-2">
                         <div class="all_latest_trading_img_position_relative">
                             <div class="all_latest_trading_img"><img src="./'.$dsnoidung->UrlPics.'" alt=""class="all_img_special_relative"/></div>
                             <div class="all_latest_trading_img_position_absolute"></div>
                             <div class="all_latest_trading_img_position_absolute_1">
                                 <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="text-white">'.$dsnoidung->Title.' </a>
                             </div>
                         </div>
                     </div>';
                     }
                 }   
                ?> 
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div class="all_heading all_heading_border_bottom py-2 mb-4">Tin tức</div>
            <div class="owl-carousel owl-theme" id="slider2">
                
                <!-- <div class="item px-2">
                    <div class="all_hover_news_img">
                        <div class="all_news_img"><img src="img/home/ip12.png" alt=""/></div>
                        <div>
                            <a href="single_hot.html" class="d-block all_small_post_heading"><span class="">The top 10</span></a>
                            <div class="c_g"> bbv</div>
                        </div>
                    </div>
                </div> -->
                <?php
                            if(isset($data['dsnoidung'])){
                                foreach($data['dsnoidung'] as $dsnoidung){
                                    if($dsnoidung->NewsAppear == 1){
                                        echo ' <div class="item px-2">
                                                <div class="all_hover_news_img">
                                                    <div class="all_news_img"><img src="'.$dsnoidung->UrlPics.'" alt=""/></div>
                                                    <div>
                                                        <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="d-block all_small_post_heading"><span class="">'.$dsnoidung->Title.'</span></a>
                                                    </div>
                                                </div>
                                            </div> ';
                                    }
                                }
                            }
                        ?>

            </div>
            
        </div>
    </div>

    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="row mx-0">
            <div class="col-md-10 animate-box" data-animate-effect="InLeft">
                <div class="container paddding">
                    <div class="row mx-0">
                        <div class="col-md-8 animate-box" data-animate-effect="InLeft">
                            <h3>Hot</h3>
                            <?php
                                foreach($data['dsnoidung_view'] as $dsnoidung){
                                    if($dsnoidung->HotNews == 1){
                                echo '<div class="row pb-4">
                                    <div class="col-md-5">
                                        <div class="all_hover_news_img">
                                            <div class="all_news_img"><img src="./'.$dsnoidung->UrlPics.'" alt=""/></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 animate-box">
                                        <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_magna py-2">'.$dsnoidung->Title.'</a> <a href="#" class="all_mini_time py-3"> '.$dsnoidung->Overview.'</a>
                                        <div class="most_all_treding_font_123"> '.$dsnoidung->Day.'</div>
                                    </div>
                                    </div>';
                                }
                            }   
                            ?> 
                            <h3>New</h3>
                            <?php
                                foreach($data['dsnoidung'] as $dsnoidung){
                                echo '<div class="row pb-4">
                                        <div class="col-md-5">
                                            <div class="all_hover_news_img">
                                                <div class="all_news_img"><img src="./'.$dsnoidung->UrlPics.'" alt=""/></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 animate-box">
                                            <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_magna py-2">'.$dsnoidung->Title.'</a> <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_mini_time py-3">'.$dsnoidung->Overview.'</a>
                                            <div class="most_all_treding_font_123 align="right">'.$dsnoidung->Day.'</div>
                                        </div>
                                    </div> ';
                                }     
                            ?> 
                        </div>
                        <div class="col-md-4 animate-box" data-animate-effect="InRight">
                            <div>
                                <div class="all_heading all_heading_border_bottom py-2 mb-4">Tags</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="all_tags_all">
                                <!-- <a href="#" class="all_tagg">Business</a> -->
                                <?php
                                foreach($data['ds_loaitin'] as $dsloaitin){
                                echo '<a href="#" class="all_tagg">'.$dsloaitin->NewsTypeName.'</a>';
                                }     
                            ?> 
                            </div>
                            <div>
                                <div class="all_heading all_heading_border_bottom pt-3 py-2 mb-4">Tin đã xem</div>
                            </div>
                            <div class="row pb-3">
                                <?php
                                     if(!isset($data['dsview'])){
                                         echo "<h5> Chưa có mục nào </h5>";
                                     }
                                     else{
                                         foreach($data['dsview'] as $dsview){
                                          foreach($dsview as $viewed)
                                             echo '<div class="col-5 align-self-center">
                                                    <img src="./'.$dsview->UrlPics.'" alt="img" class="all_most_trading"/>
                                                            </div>
                                                            <div class="col-7 paddding">
                                                                <div class="most_all_treding_font">'.$dsview->Title.'</div>
                                                                <div class="most_all_treding_font_123">'.$dsview->Day.'</div>
                                                            </div> 
                                                            </br>';
                                         }
                                      } 
                                ?>
                                </div>
                        </div>
                    </div>
                    <div class="row mx-0 animate-box" data-animate-effect="InUp">
                        <div class="col-12 text-center pb-4 pt-4">
                            <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                            <a href="#" class="btn_pagging">1</a>
                            <a href="#" class="btn_pagging">2</a>
                            <a href="#" class="btn_pagging">3</a>
                            <a href="#" class="btn_pagging">...</a>
                            <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 animate-box" data-animate-effect="InRight">
                <div class="container paddding">
                    <div class="row mx-0" id="adv">
                        <div class="col-md-8 animate-box list-adv" data-animate-effect="InLeft">
                            <p>addd</p>
                            <img src="img/home/dai.png">
                            <img src="img/home/dai.png">
                            <img src="img/home/dai.png">
                        </div>
                        <div class="col-md-3 animate-box" data-animate-effect="InRight"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
