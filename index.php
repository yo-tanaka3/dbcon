<!-- index2022.11.27　データベースとの接続実験用トップページ -->
<!-- index2022.12.05　データベースとの接続用に拡張子をphpに変更し、account情報保持やrequireの機能を追加 -->
<!-- index2022.12.13　acount表記をaccountに変更 -->
<!-- index2022.12.22　sessionの導入に伴ってurlプロパティの利用を停止。 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Color of Nature</title>
        <meta name="desgription" content="自然は様々な色にあふれています。その豊かな色の世界を紹介します。">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&family=Source+Serif+Pro:ital@1&display=swap" rel="stylesheet">

    <!-- CSS -->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link rel="stylesheet" href="css/style3.css">
        
    </head>

    <body>
        <!----------------------------------------------------------------
            全ページ共通のメニュー部分
        -------------------------------------------------------------------->
        <div id="home" class="big-bg">
            <header class="page-header wrapper">
                <h1><a href="photo_index.php"><img class="logo" src="images/title.gif" alt="C.O.N.logo"></a></h1>
                <nav>
                    <ul class="main-nav">
                        <!-- <li><a href="whats_new/whats_new.html?account=<?php echo $account ;?>&a_id=<?php echo $a_id ;?>">What's_new</a></li> -->
                        <li><a href="photo_index.php">Photos</a></li>
                        <!-- <li><a href="about_me/about_me.html?account=<?php echo $account ;?>&a_id=<?php echo $a_id ;?>">About_This_Site</a></li> -->
                        <div>
                            <ul class="main-nav-insta">
                                <li><img src="images/Instagram_Glyph_Gradient_RGB.png" width="30px"></li>
                                <li>
                                    <ul class="insta-link" >
                                        <li><a href="https://z-p15.www.instagram.com/p/CilWUoRvnDi/?utm_source=ig_web_copy_link">love_dive_and_drive</a></li>
                                        <li><a href="https://z-p15.www.instagram.com/p/Ci6JtBRvEzA/?utm_source=ig_web_copy_link">haigamine_walking</a></li>
                                        <li><a href="https://z-p15.www.instagram.com/p/Ci6L0A_PBtj/?utm_source=ig_web_copy_link">yoshikazu3979</a></li>
                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                    </ul>
                </nav>
            </header>
            
            <div class="home-content wrapper">
                <a class="page-title" href="photo_index.php">
                <h2>Color Of Nature Makes You Happy</h2>
                <p>自然は様々な色にあふれています。その豊かな色の世界を紹介します。</p></a>
            </div><!--  /.home-content  -->

            <!--　　フッター（画面右下）に問い合わせ先を表示するための仕組み　　-->
            <!--  
            <div class="footer wrapper" >
                <div  class="contact" >
                    お問い合わせはこちらから（インスタグラム）<br>
                    <a href="https://z-p15.www.instagram.com/p/CilWUoRvnDi/?utm_source=ig_web_copy_link">love_dive_and_drive</a></li>
                    <a href="https://z-p15.www.instagram.com/p/Ci6JtBRvEzA/?utm_source=ig_web_copy_link">haigamine_walking</a></li>
                    <a href="https://z-p15.www.instagram.com/p/Ci6L0A_PBtj/?utm_source=ig_web_copy_link">yoshikazu3979</a></li>
                </div>
            </div>
            -->
        </div>
    </body>
</html>