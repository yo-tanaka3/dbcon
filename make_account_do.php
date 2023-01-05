<!-- make_account_do2022.11.28 　初版　-->
<!-- make_account_do2022.12.13　acount表記をaccountに変更 -->
<?php require('dbconnect.php'); ?>
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
    <link rel="stylesheet" href="../css/style3.css">

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
            <li><a href="./whats_new/whats_new.html">What's_new</a></li>
            <li><a href="./photo_index.php">photos</a></li>
            <li><a href="./about_me/about_me.html">About_This_Site</a></li>
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

<?php
// log_in.phpから情報の受け取り
function h($a) {
    return htmlspecialchars($a) ;
}
$account = h($_REQUEST['account']);
$password = h($_REQUEST['password']);

// エラーチェック
if ($account != "" && $password != "" ) {
    // アカウントが登録済みではないか
    try {
        $statement = $db->prepare('SELECT * FROM accounts WHERE account=? ;');
        $statement->bindParam(1, $account, PDO::PARAM_INT);
        $statement->execute() ;
    } catch (PDOException $e) {
        echo 'accountが見つかりません： '. $e->getMessage();
        echo '<p><a href="log_in.php">戻る</a></p>' ;
    } 
    $statement = $db->prepare('INSERT INTO accounts SET account=?, password=? ;');
    $statement->bindParam(1, $account, PDO::PARAM_STR);
    $statement->bindParam(2, $password, PDO::PARAM_STR);
    $statement->execute() ;

} else {
    echo '空欄があります' ;
    echo '<p><a href="log_in.php">戻る</a></p>' ;
}
?>
    <div class="page-header", "menu", "wrapper">
        <div class="jump-address">
        </div>

        <ul class="menu-nav">
            <li><a href="#top">to Top</a></li>
            <li><a href="#photos">to Photos</a></li>
        </ul>
    </div>
</body>
</html>