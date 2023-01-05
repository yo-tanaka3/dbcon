<!-- common2022.12.03　初版 -->
<!-- common2022.12.05　画像削除がアカウントのidで投稿者と判断した時だけできるようにするために$a_idを追加 -->
<!-- common2022.12.13　acount表記をaccountに変更 -->
<!-- common2022.12.21　情報の受け渡しをセッションとurlパラメータとpostの利用のマルチ対応に変更 -->
<!-- common2022.12.22　情報の受け渡しをセッションとpostの利用のマルチ対応に変更 -->
<!-- common2022.12.28　画像表示用javascriptからphot_edit.phpへp_idを受け渡すため$_REQUESTを復活 -->
<?php
function h($a) {
    return htmlspecialchars($a) ;
}

session_start();
$p_id = "";
if (isset($_SESSION['p_id'])) {
    $p_id = h($_SESSION['p_id']) ; //写真登録コード
 }
if (isset($_REQUEST['p_id'])) {
     $p_id = h($_REQUEST['p_id']) ; //postされたデータがあればそちらが優先
 }

$p_name = "";
if (isset($_SESSION['p_name'])) {
    $p_name = h($_SESSION['p_name']) ; //写真ファイル名
}
if (isset($_REQUEST['p_name'])) {
    $p_name = h($_REQUEST['p_name']) ;
}

$a_code = "";
if (isset($_SESSION['login']['a_code'])) {
    $a_code = h($_SESSION['login']['a_code']) ; //会員登録コード
}

$a_id = "";
if (isset($_SESSION['login']['a_id'])) {
    $a_id = h($_SESSION['login']['a_id']) ; //ログイン名
}

$a_name = "";
if (isset($_SESSION['login']['a_name'])) {
    $a_name = h($_SESSION['login']['a_name']) ; //ハンドルネーム
}

$password = "";
if (isset($_SESSION['login']['password'])) {
    $password = h($_SESSION['login']['password']) ; //ログインパスワード
}

$title = "";
if (isset($_SESSION['title'])) {
    $title = h($_SESSION['title']) ; //写真タイトル
}
if (isset($_REQUEST['title'])) {
    $title = h($_REQUEST['title']) ;
}

$comment = "";
if (isset($_SESSION['comment'])) {
    $comment = h($_SESSION['comment']) ; //写真コメント
}
if (isset($_REQUEST['comment'])) {
    $comment = h($_REQUEST['comment']) ;
}

$keyword_numbers = "";
if (isset($_SESSION['keyword_numbers'])) {
    $keyword_numbers = h($_SESSION['keyword_numbers']) ; //キーワード該当番号
}
if (isset($_REQUEST['keyword_numbers'])) {
    $keyword_numbers = h($_REQUEST['keyword_numbers']) ;
}

$keyword_str = "";
if (isset($_SESSION['keyword_str'])) {
    $keyword_str = h($_SESSION['keyword_str']) ; //自由キーワード
}
if (isset($_REQUEST['keyword_str'])) {
    $keyword_str = h($_REQUEST['keyword_str']) ;
}

$delete = "";
if (isset($_REQUEST['delete'])) {
    $delete = h($_REQUEST['delete']) ;
}

$update = "";
if (isset($_REQUEST['update'])) {
    $update = h($_REQUEST['update']) ;
}
?>