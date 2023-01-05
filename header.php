<!-- header2022_12_28　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更するために作成 -->
<!-- header2022_12_28b　各ページ共通メニューも合体 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>C.O.N. Photos</title>
    <meta name="desgription" content="自然は様々な色にあふれています。写真を通して豊かな色の世界を紹介します。">
    <link rel="icon" type="image/png" href="./images/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&family=Source+Serif+Pro:ital@1&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="css/style3.css">

    <!--　拡大画像と説明文を別ウインドウで表示するためのjavascriptの呼び出し。　-->
    <script type="text/javascript" src="makewinx_account_true.js"></script>
    <script type="text/javascript" src="makewinx_account_false.js"></script>

    <!-- 画像アップロード時にプレビュー表示 -->
    <script>
    $('#picture').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $("#tl_img").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    });
    </script>

</head>
    
<body>
    <!----------------------------------------------------------------
        全コンテンツページ共通のメニュー部分
    -------------------------------------------------------------------->
<header class="page-header wrapper" id="top">
    <h1><a href="./index.php"><img class="logo" src="./images/title.gif" title="C.O.N.logo"></a></h1>
    <nav>
        <ul class="main-nav">
        <?php
        if ($a_name != "") {
            echo '<li>User = ', $a_name, '</li>' ;
            echo '<li><a href="sign_up_edit.php">change_profile</a></li>';
            echo '<li><a href="log_out.php">logout</a></li>';
            echo '<li><a href="upload_in.php">upload</a></li>';
        } else {
            echo '<li><a href="sign_up_in.php">sign_up</a></li>' ;
            echo '<li><a href="log_in.php">Log_in</a></li>' ;
        } ?>
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
    <!----     部分サムネイルをクリックすると全体画像を表示させる仕組み  jqueryを利用　----->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
</header>
