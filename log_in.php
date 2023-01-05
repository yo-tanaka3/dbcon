<!-- log_in2022.11.28 　初版　-->
<!-- log_in2022.12.02 　input枠のデザインをstyle3.cssで調整するためにclass="textlines"を追加　-->
<!-- log_in2022.12.03 　ログインに失敗して戻ってきたときに前回の文字列を表示する仕様に変更　-->
<!-- log_in2022.12.13　acount表記をaccountに変更 -->
<!-- log_in2022.12.22　変数名を一部変更 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>C.O.N. Log in</title>
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
<!--
    javascriptで画像を別ウインドウに表示する実験
     参考　https://seiai.ed.jp/sys/text/htm4/chp09/h09a10.html
-->

    <!----------------------------------------------------------------
            LOG IN 専用部分 
    -------------------------------------------------------------------->
        <div class="page-header menu wrapper">
            <div class="jump-address">
                <h2 class="wrapper" id="photos">
                    Log_in
                </h2>
            </div>
        </div>
<!-- <?php echo '$a_id=', $a_id,"<br>",'$password=',$password,"<br>" ; ?> -->
        <form class="wrapper input" method="post" action = "log_in_do.php" enctype="multipart/form-data">
            <p>ユーザー名：<input class="textlines" type="text" name="a_id" value="<?php echo $a_id ;?>"></p>
            <br>
            <p>パスワード：<input class="textlines" type="text" name="password"></p>
            <br>
            <p><input type="submit" class="button" name ="action" value="ログインする"></p>
        </form>
<?php
//  if (isset($_REQUEST['action'])) {
//     $_SESSION['a_name'] = filter_input(INPUT_POST, "a_name");
//     // $_SESSION['name'] = filter_input(INPUT_POST, "name");
//     $_SESSION['password'] = filter_input(INPUT_POST, "password");
//     header( "Location: ./log_in_do.php" ) ;
//  }
?>
    </body>
</html>