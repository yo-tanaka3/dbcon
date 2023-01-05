<!-- sign_up_do2022.12.03 　初版　-->
<!-- sign_up_do2022.12.04 　登録日時の保存機能追加　-->
<!-- sign_up_do2022.12.13　acount表記をaccountに変更 -->
<!-- sign_up_do2022.12.14　表示名の登録機能を追加 -->
<!-- sign_up_do2022.12.27　セッションの利用に仕様を変更 -->
<!-- sign_up_do2022.12.28　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更 -->
<!-- sign_up_do2022_12_28b　account表記をa_idに変更 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<?php require('header.php'); ?>
<body>
<div class="page-header menu wrapper">
    <div class="jump-address">
        <h2 class="wrapper" id="photos">
            Log_in
        </h2>
    </div>
</div>

<div class="wrapper">
<?php
// ポストされたデータの受け取り
$a_id = h($_REQUEST['a_id']);
$password = h($_REQUEST['password']);
$a_name = h($_REQUEST['a_name']);

// とりあえずセッションに保存


// エラーチェック
if ($a_id != "" && $password != "" && $a_name != "" ) {
    // アカウントが登録済みかをチェック
    $statement = $db->prepare('SELECT * FROM accounts WHERE a_id=? ;');
    $statement->bindParam(1, $a_id, PDO::PARAM_STR);
    $statement->execute() ;
    $row_a_id = $statement->fetch();
    
    // 表示名が登録済みかをチェック
    $statement = $db->prepare('SELECT * FROM accounts WHERE name=? ;');
    $statement->bindParam(1, $a_name, PDO::PARAM_STR);
    $statement->execute() ;
    $row_a_name = $statement->fetch();

    if ($row_a_id != 0 ) {
        echo '<a>ご希望のログインID"', $a_id, '"はすでに登録されています。</a><br>';
        echo '<a class="input button" href="sign_up_in.php">戻る</a>' ;
    } elseif ($row_a_name != 0 ) {
        echo '<a>ご希望の表示名"', $a_name, '"はすでに使用されています。</a><br>';
        echo '<a class="input button" href="sign_up_in.php">戻る</a>' ;
    } else {
        $date = date('Y-m-d H:i:s');
        $statement = $db->prepare('INSERT INTO accounts SET a_id=?, password=?, name=?, register_date=? ;');
        $statement->bindParam(1, $a_id, PDO::PARAM_STR);
        $statement->bindParam(2, $password, PDO::PARAM_STR);
        $statement->bindParam(3, $a_name, PDO::PARAM_STR);
        $statement->bindParam(4, $date, PDO::PARAM_STR);
        $statement->execute() ;
    echo '<a>ログインIDを登録しました</a><br>';
    echo '<a class="input button" href="photo_index.php">戻る</a>' ;
    }

} else {
    echo '空欄があります' ;
    echo '<p><a class="input button" href="sign_up_in.php">戻る</a></p>' ;
}
?>
</div>
</body>
</html>