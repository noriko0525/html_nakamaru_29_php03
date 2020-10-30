<?php
require_once('funcs.php');
session_start();

$sid0 = $_SESSION['sid'];//ログイン時のセッションID
$sid1 = session_id();//現在のセッションID
if($sid0 !== $sid1){
    redirect("login.php");
    exit;
};

$pdo = db_conn();
$mailaddress = $_POST['mailaddress'];
$family = $_SESSION['family'];
$grade = $_SESSION['grade'];

$view="";
$view2="";
$view3="";
$stmt = $pdo->prepare("SELECT * FROM gs_item_table");
$status = $stmt->execute();//実行
// $result = $stmt->fetch();//結果取り出し
if($family == 1){
    $view2 .= '<div id="itemAdd">追加する</div>';
}
if($grade == 3){
    $view3 .= '<a href="member.php"><div id="invite">管理者</div></a>';
}
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);//処理を止めてエラーの文字列が出る
 }else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<div class="grid" id="'.$result["id"].'">';
        $view .= '<div class="close">×</div>';
        $view .= '<img src="' .$result["image"] .'"class="imgId" width="500" ';
        $view .= ' data1="'.$result["title"].'"';
        $view .= ' data2="'.$result["age"].'"';
        $view .= ' data3="'.$result["place"].'"';
        $view .= ' data4="'.$result["image"].'"';
        $view .= ' data5="'.$result["comment"].'"';
        $view .= ' data6="'.$result["secretmesto"].'"';
        $view .= ' data7="'.$result["secretmes"].'"';
        $view .= ' data8="'.$result["inputdate"].'"';
        $view .= '>';
        $view .= '<p class="itamTitle">' .$result["title"] .'</p>';
        $view .= '</div>';
    }

}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>マイページ</title>
</head>
<body>
    <div id="wrapper">
        <div class="sheets-wrapper">
            <!--fixed-->
           <div id="header">
                <div id="header-wrapper">
                    <!-- <div id="item-left">
                        <figure class="pictrim">
                            <img src="file/IMG_1258.JPG" width="50" height="50">
                        </figure>
                    </div> -->
                    <div id="item-middle">
                        <form method="get" action="#" class="search_container">
                            <input type="text" size="70" placeholder="　キーワード検索">
                            <input type="submit" value="&#xf002">
                        </form>
                    </div>
                    <div id="item-right">
                    <a href="logout.php"><input class="btn" type="submit" value="ログアウト"></a>
                        <!-- <button class="btn btn--logout btn--radius" type="submit" value="Log Out"></button> -->
                    </div>
                </div>
            </div>
            </div>
            <div id="memberAdd">
                <?=$view2?>
                <?=$view3?>
            </div>
           <!--//fixed-->
           <!--item-->
           <div id="item">
                <div class="item grid-container">
                    <?=$view?>
                </div>
            </div>
            <!--//item-->
    </div>
    <form method="post" action="iteminsert.php" enctype="multipart/form-data">
    <div class="bg_item"></div>
    <div id="modal_wrapper">
        <div class="phote"></div>
        <div class="image-box" style="display:none;">
            <input type="file" accept="image/*" name="up_file" required="required">
        </div>
        <div id="detail">
           <table>
               <tr>
                   <th>タイトル</th>
                   <td><input class="detail-form-txt" type="text" name="title" required="required"></td>
               </tr>
               <tr>
                    <th>年齢</th>
                    <td><input class="detail-form-txt" type="text" name="age" required="required"></td>
                </tr>
                <tr>
                    <th>場所</th>
                    <td><input class="detail-form-txt" type="text" name="place" required="required"></td>
                </tr>
                <tr>
                    <th>コメント</th>
                    <td><textarea class="detail-form-comment" name="comment" id="" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td class="seacret" colspan="2">
                        <div class="seacret-title">秘密メッセージ</div>
                        <div class="seacret-pull cp_ipselect cp_sl05">
                            <select name="secretmesto">
                              <option value="choix-2">Inception</option>
                              <option value="choix-3">Godzilla</option>
                              <option value="choix-4">Back to the future</option>
                              <option value="choix-5">Shutter Island</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><textarea class="detail-form-comment" name="secretmes" id="" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" class="Itemcenter">
                    <input class="Itemcenter" id="btn-addItem" type="submit" value="追加する">
                </td>
                </tr>
           </table>
        </div>
    </div>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
        function openitem(){
            let className = $(this).attr('class');
            $('#modal_wrapper .phote img').remove();
            if (className == 'imgId') {
                let title = $(this).attr('data1');
                let age = $(this).attr('data2');
                let place = $(this).attr('data3');
                let image = $(this).attr('data4');
                let comment = $(this).attr('data5');
                let secretmesto = $(this).attr('data6');
                let secretmes = $(this).attr('data7');
                $('#modal_wrapper #detail input[name="title"]').val(title);
                $('#modal_wrapper #detail input[name="age"]').val(age);
                $('#modal_wrapper #detail input[name="place"]').val(place);
                $('#modal_wrapper .phote').append('<img src="'+image+'" width="500">');
                $('#modal_wrapper #detail textarea[name="comment"]').val(comment);
                $('#modal_wrapper #detail select[name="secretmesto"]').val(secretmesto);
                $('#modal_wrapper #detail textarea[name="secretmes"]').val(secretmes);
            } else {
                $('#modal_wrapper #detail input[name="title"]').val('');
                $('#modal_wrapper #detail input[name="age"]').val('');
                $('#modal_wrapper #detail input[name="place"]').val('');
                $('#modal_wrapper .phote img').remove();
                $('#modal_wrapper #detail textarea[name="comment"]').val('');
                $('#modal_wrapper #detail select[name="secretmesto"]').val('');
                $('#modal_wrapper #detail textarea[name="secretmes"]').val('');
            }

            $(".bg_item").css({
                'z-index':"99",
                opacity:"0.7"
            }).addClass('open');
            $("#modal_wrapper").css({
                'z-index':"100",
                opacity:"1"
            }).addClass('open');
            $(".close").css({
                'z-index':"3",
                opacity:"1"
            }).addClass('open');
            $(".phote").removeClass('do').addClass('done');
        }
        function closeitem(){
            $(".bg_item").css({
           'z-index':"-10",
           opacity:"0"
            }).removeClass('open');
            $("#modal_wrapper").css({
            'z-index':"-9",
            opacity:"0"
            }).removeClass('open');
        }
    $(".imgId").on('click',openitem);
    $("#itemAdd").on('click',openitem);
    $(".bg_item").on('click',closeitem);
    // $("#itemAdd").on('click',function(){
    //     $(".phote").removeClass('done').addClass('do');
    //     $(".image-box").css('display','block');
    // })

 //jsで画像表示
    // $(".imgId").on('click',function(){
    //     var imgId = $(this).attr('src');
    //     console.log(imgId);
    //     $(".phote").append('<img src="<?php $result["id"]; ?>">')
    // });

});

</script>
</body>
</html>