<!-- log_out_do2022.12.03 　初版　-->
<!-- log_out_do2022.12.13　acount表記をaccountに変更 -->
<!-- log_out_do2022.12.22　user情報の受け渡しをsessionに変更 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>C.O.N. Log out</title>
    <meta name="desgription" content="自然は様々な色にあふれています。写真を通して豊かな色の世界を紹介します。">
    <link rel="icon" type="image/png" href="./images/favicon.png">
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
全コンテンツページ共通のメニュー部分
-------------------------------------------------------------------->
<header class="page-header wrapper" id="top">
    <h1><a href="./index.php"><img class="logo" src="./images/title.gif" title="C.O.N.logo"></a></h1>
    <nav>
        <ul class="main-nav">
            <li><a href="log_in.php">Log_in</a></li>
            <li><a href="./photo_index.php">photos</a></li>
            <div>
                <ul class="main-nav-insta">
                    <li><img src="./images/Instagram_Glyph_Gradient_RGB.png" width="30px"></li>
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

<div class="page-header menu wrapper">
    <div class="jump-address">
        <h2 class="wrapper" id="photos">
            Log_out
        </h2>
    </div>
</div>

<div class="wrapper">
<?php
        $account = "" ;
        session_unset() ;
        echo 'ログアウトしました。<br>';
        echo '<p><a class="button" href="photo_index.php">戻る</a></p>' ;
?>
</div>

<div class="page-header menu wrapper">
        <div class="jump-address">
        </div>

        <ul class="menu-nav">
            <li><a href="#top">to Top</a></li>
            <li><a href="#photos">to Photos</a></li>
        </ul>
    </div>
</body>
</html>