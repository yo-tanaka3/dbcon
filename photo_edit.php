<!-- photo_edit2022.12.06　初版 -->
<!-- photo_edit2022.12.13　acount表記をaccountに変更 -->
<!-- photo_edit2022.12.28　ジャンプ先をphoto_upd.phpからphoto_edit_do.phpに変更しセッションでファイル名を渡す仕様に変更 -->
<!-- photo_edit2022.12.28b　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<?php require('header.php'); ?>
<main>
<div class = "wrapper" >
<h2>Edit_Photo</h2>
<?php
    $photos = $db->prepare('SELECT * FROM accounts LEFT JOIN photos ON accounts.a_code = photos.account_code WHERE photos.p_id=? ;');
    $photos->bindParam(1, $p_id, PDO::PARAM_INT);
    $photos->execute();
    $photo = $photos->fetch();
    
    $a_id = $photo['account_code'];
    $a_name = $photo['name'];
    $p_id = $photo['p_id'];
    $p_name = $photo['photo_name'];
    $title = $photo['title'];
    $comment = str_replace("<br>","\n",$photo['comment']);
    $keyword_numbers = $photo['keyword_numbers'];
    $keyword_str = $photo['keyword_str'];

// とりあえずセッションに保存
    $_SESSION['edit']['p_id'] = $p_id ;
    $_SESSION['edit']['p_name'] = $p_name ;

?>
<form action="photo_edit_do.php" method="post">
    <input type="hidden" name="command" value="update" >
    <input type="hidden" name="p_id" value=<?php echo $p_id ;?> >
    <input type="hidden" name="a_id" value=<?php echo $a_id ;?> >
    <table border = 1>
        <tr>
            <td rowspan="5"><img src="<?php echo "user_img/", $p_name ;?>" ></td>
            <th>presenter</th>
            <td width=60%>
                <a readonly="readonly" class = "no_write"><?php echo $a_name ;?></a>
            </td>
        </tr>
        <tr>
            <th>Title</th>
            <td><input class="input" width=60% type="text" name="title" value=<?php echo $title ;?>></td>
        </tr>
        <tr>
            <th>Comment</th>
            <td>
                <textarea class="input" cols="100" rows="8" name="comment" ><?php echo $comment ;?></textarea>    
            </td>
        </tr>
        <tr>
            <th>Free<br>keyword</th>
            <td>
                <textarea class="input" cols="100" rows="2" name="keyword_str" ><?php echo $keyword_str ;?></textarea>
            </td>
        </tr>
        <tr>
            <th>keyword<br>number</th>
            <td><input width=60% class="input" width=100em cols="100" type="text" name="keyword_numbers" value=<?php echo $keyword_numbers ;?>></td>
        </tr>
    </table>
    <input class="input button" type = "submit" value="更新する">
</form>
<form action="photo_edit_do.php" method="post">
    <input type="hidden" name="command" value="delete" >
    <input type="hidden" name="p_id" value="<?php echo $p_id ;?>" >
    <input class="input button" type = "submit" value="削除する">
</form>
<p><a class="input button" href="photo_index.php">戻る</a></p>
</div>
</main>
</body>    
</html>