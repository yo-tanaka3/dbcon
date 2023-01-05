<!-- upload_in2022.11.27　トップ画面（index.php)導入に伴ってファイル名をindex.phpから変更 -->
<!-- upload_in2022.11.27b　写真表示で写真の見出しが表示されるようにその入力欄を作成 -->
<!-- upload_in2022.12.03　画面のデザインをcssと接続して修正 -->
<!-- upload_in2022.12.13　acount表記をaccountに変更 -->
<!-- upload_in2022.12.14　upload_do.phpで変数$a_idを使用する仕様に変更したのに合わせてコードを変更 -->
<!-- upload_in2022.12.27　データの受け渡しを基本的にセッションの利用に仕様を変更 -->
<!-- upload_in2022.12.28　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更 -->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<?php require('header.php'); ?>

<main>
    <!----------------------------------------------------------------
            upload 専用部分 
    -------------------------------------------------------------------->
        <div class="page-header menu wrapper">
            <div class="jump-address">
                <h2 class="wrapper" id="photos">
                    Upload_photo
                </h2>
            </div>
        </div>
<!------------------------- ここから入力　---------------------------->
<div class="wrapper">
<form action="upload_do.php" method="post" enctype="multipart/form-data">
    <p>写真：　<input cols="100" type="file" name="picture" id="picture" color="black"></p>
    <img src="" id="tl_img" class="img_preview" width="300">
    <p>見出し：　<br>
                <input class="textlines_title" type="text" name="title"></p>
    <p>コメント：　<br>
                <textarea class="textlines_enter" cols="100" rows="8" name="comment"></textarea>
                </p>
    <p>自由キーワード：　<br>
                <textarea class="textlines_enter" cols="100" rows="8" name="keywords"></textarea>
                </p>
    <input type="hidden" name ="a_name" value=<?php echo $a_name ;?> >
    <input type="hidden" name ="a_id" value=<?php echo $a_id ;?> >
    <input class="button" type="submit" value="送信する">
</form>
</div>
<!------------------------- ここまで入力　---------------------------->

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