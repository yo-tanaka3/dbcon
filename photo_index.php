<!-- photo_index2022.11.27　初版　-->
<!-- photo_index2022.11.28　画像登録権を与えたユーザーを判断するためにログインリンクを作成。　-->
<!-- photo_index2022.12.02　upload_in.phpへのリンクを設定　-->
<!-- photo_index2022.12.03　log_in.phpへのリンクを設定しurlパラメータでaccount情報を受け渡す仕組みを追加　-->
<!-- photo_index2022.12.03b　ログアウトの機能を追加　-->
<!-- photo_index2022.12.13　acount表記をaccountに変更 -->
<!-- photo_index2022.12.14　管理者adminは全画像を編集消去できる仕様に変更 -->
<!-- photo_index2022.12.15　javascriptの拡大表示に投稿者名を表示する仕様に変更 -->
<!-- photo_index2022.12.22　sessionを利用する仕様に変更 -->
<!-- photo_index2022.12.28　javascriptからphoto_edit.phpへのp_idの受け渡しにurlプロパティを復活 -->
<!-- photo_index2022.12.28b　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更 -->
<!-- photo_index2022.12.28c　javascriptの拡大表示に画像タイトルを表示する仕様に変更 -->
<!-- photo_index2022_12_28d　require文で呼び出すとjavascriptが動かない不具合に対応してrequire仕様を廃止 -->

<?php require('dbconnect.php');?>
<?php require('common.php');?>
<?php require('header.php');?>

    
    
    <!----------------------------------------------------------------
            Photos 専用部分 
    -------------------------------------------------------------------->
        <div class="page-header wrapper">
            <div class="jump-address">
                <h2 class="wrapper" id="photos">
                    Photos
                </h2>
            </div>

            <ul class="menu-nav">
                <!-- <li><a href="#top">to Top</a></li> -->
                <li><a href="#bottom">to Bottom</a></li>
            </ul>
        </div>

<!-- データベース接続 -->
<?php
    $photos = $db->query('SELECT * FROM photos LEFT JOIN accounts ON photos.account_code = accounts.a_code ORDER BY p_id ;'); // SQLの実行
    $photo_count = 0 ;
    $current_dir = __DIR__ ;
    $file_path = "\\user_img\\" ;
    $id = [] ;
    $photo_id = [] ;
    $p_account_code = [] ;
    $h_name = [] ;// $a_nameが大領域で使われているので，ここでは照合の為に$h_nameに格納する。
    $photo_name = [] ;
    $title = [] ;
    $comment = [] ;
    $keyword_numbers = [] ;
    $keyword_str = [] ;
    $upload_time = [] ;

    while ($photo = $photos->fetch() ) {
        array_push($id , $photo_count );                    //写真に昇順に番号を割り振る
        array_push($photo_name , $photo['photo_name']);     //写真のファイル名を格納
        array_push($title , $photo['title']);               //写真のタイトルを格納
        array_push($comment , $photo['comment']);           //写真のコメント格納
        array_push($photo_id , $photo['p_id']);             //写真のID番号を格納
        array_push($p_account_code , $photo['account_code']);//投稿者のID番号を格納
        array_push($h_name , $photo['name']);               //投稿者のハンドルネームを格納
        $photo_count ++ ;
    }

    // 乱数発生
    $random_number = range(0, $photo_count-1 );

    //配列をシャッフルする
    shuffle($random_number);
    $i = 0 ;
?>

<!-- 画像表示 -->
<div class="container wrapper">
    <?php while ($i <= $photo_count-1 ) : ?>
        <?php $now = $random_number[$i] ;?>
            <div class="item">
                <img src="<?php echo "user_img/".$photo_name[$now]."_thum.jpg";?>" 
                <?php 
                // 写真の投稿者とログインIDを照合
                if ($p_account_code[$now] == $a_code || $a_id == 'admin') {
                    echo 'onclick="makephotoimgpage_account_true(',"'", $photo_name[$now] ;
                } else {
                    echo 'onclick="makephotoimgpage_account_false(',"'", $photo_name[$now] ;
                } 
                ?>',
                '<?php echo "（", $h_name[$now], "さんの投稿）「", $title[$now], "」<br>", $comment[$now] ;?>',
                '<?php echo $title[$now];?>',
                '<?php echo $photo_id[$now];?>')"
                title="<?php echo $title[$now];?>" />
            </div>
        <?php $i ++ ;?>
    <?php endwhile ;?>
</div>
        <div class="page-header wrapper" id="bottom">
            <div class="jump-address">
            </div>

            <ul class="menu-nav">
                <li><a href="#top" id = "bottom">to Top</a></li>
                <!-- <li><a href="#photos">to Photos</a></li> -->
            </ul>
        </div>
        </main>
    </body>
</html>