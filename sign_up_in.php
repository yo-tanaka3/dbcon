<!-- sign_up_in2022.12.03 　初版　-->
<!-- sign_up_in2022.12.13　acount表記をaccountに変更 -->
<!-- sign_up_in2022.12.14　画面表示名の入力欄を新設 -->
<!-- sign_up_in2022.12.27　セッションを利用して入力やり直しの手間を削減 -->
<!-- sign_up_in2022.12.28　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更 -->
<!-- sign_up_in2022.12.28b　class "wrapper"で見た目を修正 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<?php require('header.php'); ?>
<body>
    <!----------------------------------------------------------------
            SIGN UP 専用部分 
    -------------------------------------------------------------------->
        <div class="page-header menu wrapper">
            <div class="jump-address">
                <h2 class="wrapper" id="photos">
                    Sign_up
                </h2>
            </div>
        </div>

<!-- セッションに編集用データがあれば読み込み -->
<?php
$a_id = "" ;
if (isset($_SESSION['a_id'])) {
    $a_id = $_SESSION['a_id'] ;
} 
$password = "" ;
if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'] ;
}
$a_name = "" ;
if (isset($_SESSION['a_name'])) {
    $a_name = $_SESSION['a_name'] ;
}
?>

<!-- 入力欄の画面表示 -->
        <form class="wrapper input" action="sign_up_do.php" method="post" enctype="multipart/form-data">
            <p>ログインID：<input class="textlines" type="text" name="a_id" value="<?php echo $a_id ;?>"></p>
            <br>
            <p>パスワード：<input class="textlines" type="text" name="password" value="<?php echo $password ;?>"></p>
            <br>
            <p>表示名　　：<input class="textlines" type="text" name="a_name" value="<?php echo $a_name ;?>"></p>
            <br>
            <p><input type="submit" class="button" value="送信する"></p>
        </form>

    </body>
</html>