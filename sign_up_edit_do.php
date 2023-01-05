<!-- sign_up_do2022.12.03 　初版　-->
<!-- sign_up_do2022.12.04 　登録日時の保存機能追加　-->
<!-- sign_up_do2022.12.13　acount表記をaccountに変更 -->
<!-- sign_up_do2022.12.14　表示名の登録機能を追加 -->
<!-- sign_up_do2022.12.27　セッションの利用に仕様を変更 -->
<!-- sign_up_do2022.12.28　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<?php require('header.php'); ?>
<main>
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

// sessionには保存しない。

// 一度登録すると，写真の投稿との整合性を保つために登録取り消しはできない。

// 表示名が登録済みかをチェック
    $statement = $db->prepare('SELECT * FROM accounts WHERE name=? ;');
    $statement->bindParam(1, $a_name, PDO::PARAM_STR);
    $statement->execute() ;
    $row_a_name = $statement->fetch();

if ($row_a_name != 0 ) {
    echo '<a>ご希望の表示名"', $a_name, '"はすでに使用されています。</a><br>';
    echo '<a class="input button" href="sign_up_edit.php">戻る</a>' ;
} else {
// データベースを更新
        $date = date('Y-m-d H:i:s');
        $statement = $db->prepare('UPDATE accounts SET password=?, name=?, updata_date=? WHERE a_id=? ;');
        $statement->bindParam(1, $password, PDO::PARAM_STR);
        $statement->bindParam(2, $a_name, PDO::PARAM_STR);
        $statement->bindParam(3, $date, PDO::PARAM_STR);
        $statement->bindParam(4, $a_id, PDO::PARAM_STR);
        $statement->execute() ;

// セッションの更新
        $_SESSION['login']['a_name'] = $a_name ;
        $_SESSION['login']['password'] = $password ;

        echo '<a>プロフィールを更新しました</a><br>';
    echo '<a class="input button" href="photo_index.php">戻る</a>' ;
}
?>
</div>
</main>
</body>
</html>