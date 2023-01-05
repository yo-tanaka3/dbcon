<!-- log_in_do2022.11.28 　初版　-->
<!-- log_in_do2022.12.03 　想定されるエラーに対する表示機能を追加　-->
<!-- log_in_do2022.12.05 　画像削除がアカウントのidで投稿者と判断した時だけできるようにするために
                            $a_idをurlパラメータに追加　-->
<!-- log_in_do2022.12.13　acount表記をaccountに変更 -->
<!-- log_in_do2022.12.22　log_inからheader( "Location: " )でsessionに要素を送れないので，
                            $_REQUESTで要素を受け取り，送信はsessionに入れる仕様に変更 -->
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
            <!-- <li><a href="log_in.php?account=<?php echo $account ;?>&a_id=<?php echo $a_id ;?>">Log_in</a></li> -->
            <!-- <li><a href="./whats_new/whats_new.html?account=<?php echo $account ;?>&a_id=<?php echo $a_id ;?>">What's_new</a></li> -->
            <!-- <li><a href="./photo_index.php?account=<?php echo $account ;?>&a_id=<?php echo $a_id ;?>">photos</a></li> -->
            <!-- <li><a href="./about_me/about_me.html?account=<?php echo $account ;?>&a_id=<?php echo $a_id ;?>">About_This_Site</a></li> -->
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
            Log_in
        </h2>
    </div>
</div>

<div class="wrapper">
<?php
// エラーチェック
$a_id = h($_REQUEST['a_id']) ;
$password = h($_REQUEST['password']) ;

// echo '$a_id=',$a_id,"<br>" ;
// echo '$password=',$password,"<br>" ;
if ($a_id != "" && $password != "" ) {
    // アカウントが登録済みではないか
    // $count = $db->query('SELECT * FROM accounts WHERE account=aaa ;');
    $statement = $db->prepare('SELECT * FROM accounts WHERE a_id=? ;');
    $statement->bindParam(1, $a_id, PDO::PARAM_STR);
    $statement->execute() ;
    $row = $statement->fetch();
    // var_dump($row);

    // public function test($bool) {
    if ($row != 0 ) {

        if($password == $row['password']) {
            $a_id = $row['a_id'] ;
            $a_name = $row['name'] ;
            $a_code = $row['a_code'] ;
        echo 'ログインしました。<br>';
        $_SESSION['login']['a_id'] = $a_id ;
        $_SESSION['login']['a_code'] = $a_code ;
        $_SESSION['login']['a_name'] = $a_name ;
        $_SESSION['login']['a_password'] = $password ;
        // $_SESSION['h_name'] = $h_name ;

        echo '<p><a class="input button" href="photo_index.php">戻る</a></p>' ;
        } else {
            echo 'パスワードが違います。<br>' ;
            echo '<p><a class="input button" href="log_in.php">戻る</a></p>' ;
        }

    } else {   
        echo '<a>accountが見つかりません</a><br>';
        echo '<a class="input button" href="log_in.php">戻る</a>' ;
    }

} else {
    echo '空欄があります' ;
    echo '<p><a class="input button" href="log_in.php">戻る</a></p>' ;
}
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