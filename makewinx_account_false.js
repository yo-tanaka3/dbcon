// makewinx2022.11.27.js　画像をランダムに表示するホームページに対応するjavascript
// makewinx_account_false2022.12.13　acount表記をaccountに変更 -->

  function makephotoimgpage_account_false(img,message,title,a_id,p_id){
    var wwidth  = 866;
    var wheight = 650 + 40; //40はメッセージとcloseボタンの分の追加
    var nwin = window.open("", "sub2", "width=" + wwidth + ",height=" + wheight);

    nwin.document.open();
    nwin.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"\n');
    nwin.document.write('    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">\n');
    nwin.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">\n');
    nwin.document.write('<head>\n');
    nwin.document.write('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\n');
  
    nwin.document.write('<style type="text/css">\n');
    nwin.document.write('body {background-color:rgb(12, 12, 12);\n');
    nwin.document.write('color: aliceblue;}\n');
    nwin.document.write('span {cursor:pointer;padding:0 4px;background-color:rgb(12, 12, 12); border:outset;}\n');
    nwin.document.write('p.close {text-align:right;width:5em;float:right;margin:6;}\n');
    nwin.document.write('p.delete {text-align:right;width:5em;float:right;margin:0;}\n');
    nwin.document.write('</style>\n');
  
    nwin.document.write('<title>'+title+'</title>\n</head>\n<body>\n');
    nwin.document.write('<p><img src="user_img/'+img+'" width=830 title='+title+' /></p>\n');
    nwin.document.write('<p class="close" onclick="window.close();">');
    nwin.document.write('<span>close</span></p>\n'); 
    nwin.document.write('<p>'+message+'</p>');
    nwin.document.write('</body>\n');
    nwin.document.write('</html>\n');
    nwin.document.close();
    nwin.focus();
  }