<!-- submit2022.11.25　sample28初版 -->
<!-- submit2022.11.25b　仮想画像投稿サイト作成のためirfanviewを外部起動して画像を加工する仕組みに挑戦 -->
<!-- submit2022.11.26　仮想画像投稿サイト作成のためirfanviewを外部起動してサムネイル画像を作成する機能を実装 -->
<!-- submit2022.11.26b　irfanviewを外部起動して1600px画像を作成し中間ファイルを削除する機能を実装 -->
<!-- submit2022.11.27　データベース登録機能仮実装 -->
<!-- upload_do2022.11.27　index.php導入に伴って，ファイル名をupload_do.phpに変更 -->
<!-- upload_do2022.11.27b　写真の見出しをデータベースに保存できる仕様に変更 -->
<!-- upload_do2022.11.28　photo_index.phpで，コメントに改行コードがあるとjavascriptが正常に動かない不具合に対応 -->
<!-- upload_do2022.12.02　photo_indexからのリンクに対応し，戻り先を設定 -->
<!-- upload_do2022.12.04　ログイン機能追加に対応 -->
<!-- upload_do2022.12.13　acount表記をaccountに変更 -->
<!-- upload_do2022.12.14　cssとの連結に合わせて画面表示を修正し，他のファイルに合わせて変数$p_idを使用するコードに修正 -->
<!-- upload_do2022.12.20　ボタン「戻る」にclass="input button"を設定 -->
<!-- upload_do2022.12.27　データベースのカラム変更に伴って記述修正 -->
<!-- upload_do2022.12.28　photos共通部分を別ファイルにしてrequire文で呼び出す仕様に変更 -->
<!-- upload_do2022.12.28b　class = "wrapper" で見かけを修正-->
<?php require('dbconnect.php'); ?>
<?php require('common.php'); ?>
<?php require('header.php'); ?>
<body>

<main>
<div class = "wrapper" >
<?php
$file = $_FILES['picture'];
$ext = substr($file['name'], -4);
if ($ext == '.gif' || 
    $ext == '.GIF' || 
    $ext == '.jpg' || 
    $ext == '.JPG' || 
    $ext == '.png' || 
    $ext == '.PNG' || 
    $ext == '.bmp' || 
    $ext == '.BMP' ) :
    $image = date('YmdHis') ;
    $file_path = "\\user_img\\" ;
    $file_name =  date('YmdHis'). $file['name'];
    $success = move_uploaded_file($file['tmp_name'], './temp/'. $file_name );

    if ($success) : 
        // サムネイル画像の作成
        $current_dir = __DIR__ ;
        $exe = 'i_view64.exe ' ;
        $temp_dir = "\\temp\\" ;
        $in_file = $current_dir. $temp_dir. $file_name ;
        $option_crop = ' /crop=(-100, -100, 600, 600, 4) ' ;
        $option_resize = '/resize_long=500 ' ;
        $option_aspect =  '/aspectratio ' ;
        $option_resample = '/resample ' ;
        $option_convert = '/convert='. $current_dir. $file_path. $file_name. '_thum.jpg' ; 
        $command = $exe. $current_dir. $temp_dir. $file_name. $option_crop. $option_resize. $option_aspect. $option_resample. $option_convert ; 
        exec($command) ;
        
        // 1600px画像の作成
        $option_resize = '/resize_long=1600 ' ;
        $option_convert = '/convert='. $current_dir. $file_path. $file_name ; 
        $command = $exe. $current_dir. $temp_dir. $file_name. $option_resize. $option_aspect. $option_resample. $option_convert ; 
        exec($command) ;

// データベース登録処理

        // アカウントの確認
        $statement = $db->prepare("SELECT a_code FROM accounts WHERE a_id=? ;");
        $statement->bindParam(1,$a_id, PDO::PARAM_STR);
        $statement->execute();
        $accounts = $statement->fetch() ;
        $a_code = $accounts['a_code'] ;
        // データベース登録の準備
        $keyword_numbers = '1,2,3' ;
        $keyword_str = htmlspecialchars($_REQUEST['keywords']); 
        $comment = str_replace("\r\n", '<br>', htmlspecialchars($_REQUEST['comment']));      //改行コードとhtmlタグを取り除く
        $date = date('Y-m-d H:i:s');
        $title = htmlspecialchars($_REQUEST['title']);
        // データベース登録
        $statement = $db->prepare("INSERT INTO `photos`(`account_code`, `photo_name`, `title`, `comment`, `keyword_numbers`, `keyword_str`, `upload_time`) VALUES (?,?,?,?,?,?,?);");
        $statement->bindParam(1,$a_code, PDO::PARAM_INT);
        $statement->bindParam(2,$file_name, PDO::PARAM_STR);
        $statement->bindParam(3,$title, PDO::PARAM_STR);
        $statement->bindParam(4,$comment, PDO::PARAM_STR);
        $statement->bindParam(5,$keyword_numbers, PDO::PARAM_STR);
        $statement->bindParam(6,$keyword_str, PDO::PARAM_STR);
        $statement->bindParam(7,$date, PDO::PARAM_STR);
        $statement->execute();
        
        // 最終処理
        exec('del '.$in_file );
        echo '画像を登録しました。' ;
        echo '<p><a class="input button" href="photo_index.php">戻る</a></p>' ;


    else :  
        echo '※　ファイルのアップロードに失敗しました' ;
        echo '<p><a class="input button" href="upload_in.php">戻る</a></p>' ;
    endif;

else :  
    echo '<p>※　拡張子が.gif, .jpg, .png, .bmpのいずれかのファイルをアップロードしてください</p>' ;
    echo '<p><a class="input button" href="upload_in.php">戻る</a></p>' ;
endif; ?>
<!------------------------- ここまで入力　---------------------------->
<div class="page-header menu wrapper">
    <div class="jump-address">
    </div>
    <ul class="menu-nav">
        <li><a href="#top">to Top</a></li>
        <li><a href="./photo_index.php">photos</a></li>
    </ul>
</div>
</div>
</main>
</body>
</html>
