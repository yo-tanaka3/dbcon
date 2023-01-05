<!-- sign_up_edit2022_12_28　初版 -->
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
                    Sign_up_edit
                </h2>
            </div>
        </div>

<?php
// セッションに編集用データがあれば読み込み
$a_id = "" ;
if (isset($_SESSION['login']['a_id'])) {
    $a_id = $_SESSION['login']['a_id'] ;
} 
$password = "" ;
if (isset($_SESSION['login']['a_password'])) {
    $password = $_SESSION['login']['a_password'] ;
}
$a_name = "" ;
if (isset($_SESSION['login']['a_name'])) {
    $a_name = $_SESSION['login']['a_name'] ;
}

?>

<!-- 入力欄の画面表示 -->
        <form class="wrapper input" action="sign_up_edit_do.php" method="post" enctype="multipart/form-data">
            <p>ログインID：<input readonly="readonly" class = "no_write textlines" type="text" name="a_id" value="<?php echo $a_id ;?>"></p>
            <br>
            <p>パスワード：<input class="textlines" type="text" name="password" value="<?php echo $password ;?>"></p>
            <br>
            <p>表示名　　：<input class="textlines" type="text" name="a_name" value="<?php echo $a_name ;?>"></p>
            <br>
            <p><input type="submit" class="button" value="送信する"></p>
        </form>

    </body>
</html>