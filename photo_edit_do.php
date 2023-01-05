<!-- photo_upd2022.12.13　初版 -->
<!-- photo_upd2022.12.14　textareaに入力した文字の改行コードを変換してjavascriptでエラーが起きない仕組みを追加 -->
<!-- photo_edit_do2022.12.28　photo_upd.phpからphoto_edit_do.phpに名称変更し画像ファイル名をセッションからもらう仕様に変更 -->
<!-- photo_edit_do2022.12.28b　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<?php require('header.php'); ?>
<main>
<div class="wrapper">
<?php
if (isset($_REQUEST['command'])) {
    switch ($_REQUEST['command']) {
        case 'update':
            if (empty($title) || empty($comment) || empty($keyword_numbers) || empty($keyword_str)) {
                echo "入力項目が不足しています。<br>";
                echo '<p><a class="input button" href= "photo_edit.php">戻る</a></p>';
                break;}
            else {
                $comment = str_replace("\r\n", '<br>', htmlspecialchars($_REQUEST['comment']));      //改行コードとhtmlタグを取り除く
                $date = date('Y-m-d H:i:s');
                try {
                    $dbcon = $db->prepare('UPDATE `photos` SET title=?, comment=?, keyword_numbers=?, keyword_str=?, updata_date=? WHERE p_id=? ;');
                    $dbcon->bindParam(1, $title, PDO::PARAM_STR);    
                    $dbcon->bindParam(2, $comment, PDO::PARAM_STR);    
                    $dbcon->bindParam(3, $keyword_numbers, PDO::PARAM_STR);    
                    $dbcon->bindParam(4, $keyword_str, PDO::PARAM_STR);    
                    $dbcon->bindParam(5, $date, PDO::PARAM_STR);    
                    $dbcon->bindParam(6, $p_id, PDO::PARAM_INT);
                    $dbcon->execute();    
                } catch (PDOException $e) {
                    echo 'DB接続エラー： '. $e->getMessage();
                }
                echo 'データを更新しました。' ;
                echo '<p><a class="input button" href="photo_index.php">戻る</a></p>' ;
                break;}
        case 'delete':
            try {
                $dbcon = $db->prepare('DELETE FROM `photos` WHERE p_id=?;');
                $dbcon->bindParam(1, $p_id, PDO::PARAM_INT);
                $dbcon->execute();
            } catch (PDOException $e) {
                echo 'DB接続エラー： '. $e->getMessage();
            }
            $exe = 'del ' ;
            $current_dir = __DIR__ ;
            $file_path = "\\user_img\\" ;
            if (isset($_SESSION['edit']['p_name'])) {
                $file_name = $_SESSION['edit']['p_name'].'*' ;
            }
            $command = $exe. $current_dir. $file_path. $file_name ; 
            exec($command) ;
            echo '画像を削除しました。' ;
            echo '<p><a class="input button" href="photo_index.php">戻る</a></p>' ;
            break;
        case '':
            echo '処理を停止しました。' ;
            echo '<p><a class="input button" href="photo_index.php">戻る</a></p>' ;
            break;
    }
}
?>
</div>

<div class="page-header menu wrapper">
        <div class="jump-address">
        </div>

        <ul class="menu-nav">
            <li><a href="#top">to Top</a></li>
            <li><a href="./photo_index.php">photos</a></li>
        </ul>
    </div>
</main>
</body>
</html>