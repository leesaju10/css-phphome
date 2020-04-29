<?php
session_start();
ini_set("display_errors", "1");
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
    mysqli_query($conn,"set names utf8");  
    $idx = $_GET['idx'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $writer ="writer";
    $uploaddir = '../image/';
    $origin_name= $_FILES['image']['name'];
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

    $sql1  = "UPDATE `board2` SET `title` = '$title', `content` = '$content' WHERE `board2`.`num` = '$idx';";
$result = mysqli_query($conn, $sql1);
    $sql2 = "UPDATE `board2` SET `image` = '$origin_name', `image_change` = '$uploadfile' WHERE `board2`.`num` = '$idx';";
    
    if($origin_name!=NULL){
        $result2 = mysqli_query($conn, $sql2);
        echo '<pre>';
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
	    echo '<script>alert("파일이 유효하고, 성공적으로 업로드 되었습니다.");
		location.href="../공지사항.php";</script>';
        } 
        else {
            print "파일 업로드 공격의 가능성이 있습니다!\n";
        }
    }
	else {
	    echo '<script>alert("성공적으로 수정 되었습니다.");
		location.href="../공지사항.php";</script>';

}
?>
