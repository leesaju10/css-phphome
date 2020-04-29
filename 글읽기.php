<?php session_start(); 

$id=$_SESSION['id'];?>
<?php
session_start();
$id=$_SESSION['id'];
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
mysqli_query($conn,"set session character_set_client=utf8");
mysqli_query($conn,"set session character_set_results=utf8");
mysqli_query($conn,"set session character_set_connection=utf8");
?>

<?php 
   		$num = $_GET["idx"];
	        $sql = 'SELECT * FROM `board` WHERE num ='.$num;
                $result =  mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$title = $row['title'];
		$writer = $row['writer'];
		$content = $row['content'];
		$file = $row['image'];
		$view = $row['view'];

		$sql2 = 'UPDATE `board` SET `view` = '.$view.'+1 WHERE `board`.`num` ='.$num.' ';
		$result2 = mysqli_query($conn,$sql2);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
            <link rel = "stylesheet" type="text/css" href="./css/reset.css">
            <link rel = "stylesheet" type="text/css" href="./css/글읽기.css">
        <meta charset="UTF-8">
        <title>EVERY KY</title>
</head>
<body>
        <header>
            <div class="menu_wrap">
                <ul class="menu">
                    <li><a href="./메인.php">메인</a></li>
                    <li><a href="./공지사항.php">공지사항</a></li>
                    <li><a href="./커뮤니티.php">커뮤니티</a></li>
                    <li><a href="./메인_학식.php">학식</a></li>
                </ul>
            </div>
        </header>
        <div class="main_wrap">
            <div calss="logo_section">
                <div class="main_back">
                </div>
                <div class="main_back_over">
                    <span class="main_logo"></span>
                </div>
            </div>
            <div class="main_section">

                <div class='left'>
                    <?php
                    if($id==NULL){
                    echo "<div class='login_form'>
                        <form action='./action_php/로그인.php' enctype='multipart/form-data' method = 'post'>
                            <label for='id' class='id'>
                               ID : 
                            </label>
                            <input type='text' name='id' id='id'><br>
                            <label for='password'>
                                PW  : 
                            </label>
                            <input type='password' name='password' id='password'>
                            <input type='submit' value='Login' id='login_button'><br>
                            <a href='./메인_회원가입.php'>회원가입</a>
                            <a href='#'>아이디/비밀번호찾기</a>
                        </form>
                    </div>";}
                    
                    else {
                    echo "<div class='logined_form'>
                        <span>닉네임 : </span><sapn class='name'>$id</sapn>
                        <br><br>
                            <a href='#'>회원정보관리 가기</a>
                            <br><br>
                            <a href='./action_php/로그아웃.php'>로그아웃</a>
                    </div>";}
                    ?>
                </div>
                
                <div class="right">
                    <div class="read">
                    <table>
                        <tr>
                            <td style="width: 500px;">
                                <?php echo $title;?>
                            </td>
                            <td>
                                작성자
                            </td>
                            <td style="width: 90px;">
                                <?php echo $writer;?>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="3" style="text-align: left; padding : 20px 20px;">
                                <?php echo $content?>
                                <br><br>
				첨부파일 : 
                                <a href="./action_php/download.php?idx=<?php echo $num?>" target='_blank' style="color: black;"><?php echo $file?></a>
                            </td>
                        </tr>
                    </table>
                    <a href="./action_php/글삭제.php?idx=<?php echo $num?>">삭제</a>
                    <a href="./메인_글수정.php?idx=<?php echo $num?>">수정</a>
                    <a href="커뮤니티.php">글목록으로 돌아가기</a>
                    </div>
                    <div class="reply">
                        <table>
                            <tr>
                            <form action="./action_php/댓글달기.php" method="POST">
                                <input type="hidden" value="<?php echo $id ?>" name = "id" id="id">
                                <input type="hidden" value="<?php echo $num ?>" name = "idx" id="idx">
                                <td><?php echo $id;?></td>
                                <td><input type="text" name="content" id="content" style="width: 540px;"></td>
                                <td><button type="submit">댓글달기</button></td>
                            </form>
                            </tr>
                        </table>
                        <table class="reply">
                            <?php 

                            $sql2 = 'SELECT * FROM `reply_board` WHERE article_num ='.$num;	
                                $result2 =  mysqli_query($conn, $sql2);

                            while($row2 = mysqli_fetch_array($result2)){
                            $id = $row2['writer'];
                            $content = $row2['content'];
                            $date = $row2['date'];
                            $idx = $row2['idx'];
                            echo "<tr>

<td>$id</td>
<td>$content</td>
<td>$date</td>
<td style='width: 90px;'><a href='./댓글수정.php?idx=$idx&article=$num' >수정</a> <a href='./action_php/댓글삭제.php?idx=$idx&article=$num'>삭제</a></td>
</tr>";
                            
                            };
                            ?>
                        </table>
                    </div>
                </div>
        </div>
        <footer>
            <div class="footer_wrap">    
            <span class="footer_text"><span>제작 : 건양대학교 정보보호학과 16학번 동기들</span> 총괄 : 이진송 </span>
            </div>
        </footer>
        
</body>
</html>
