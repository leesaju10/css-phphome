<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
?>

<?php 
    $idx = $_GET['idx'];
    $num = $_GET['article'];
    $id=$_SESSION['id'];
    $sql = "SELECT writer FROM `reply_board2` WHERE article_num =$num && idx=$idx ";
    $result =  mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $sql2 = "UPDATE `board2` SET `reply` = reply-1 WHERE `board2`.`num` = $num";
    $result2 = mysqli_query($conn,$sql2);
echo $sql2;
    $writer = $row['writer'];
	if($id==$writer || $id=="admin"){
	    $sql2 = "DELETE FROM `reply_board2` WHERE article_num =$num && idx=$idx ";
            $result2 =  mysqli_query($conn, $sql2);
            if($result){
                	echo "<script>
			   alert( '삭제되었습니다.' );
			     history.back();
		      </script>
		     ";
            }
            else{
                echo 'fail';
            }
			

    }
	else{
	echo "<script>
			   alert( '작성자가 아니면 삭제하실 수 없습니다.' );
			   history.back();
		      </script>
		     ";
}
?>
