<?php
session_start();
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
$sql = 'SELECT * FROM `board2` WHERE num ='.$num;
    $result =  mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$title = $row['title'];
$content = $row['content'];

    $id=$_SESSION['id'];
    $sql2 = 'SELECT writer FROM `board2` WHERE `num` = "'.$num.'"';
    $result2 =  mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $writer = $row2['writer'];

	if($id!=$writer){

		echo "<script>
			   alert( '작성자가 아니면 수정하실 수 없습니다.' );
			   history.back();
		      </script>
		     ";
    }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
            <link rel = "stylesheet" type="text/css" href="./css/reset.css">
            <link rel = "stylesheet" type="text/css" href="./css/메인_글수정.css">
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
                            <a href='../회원가입페이지/메인_회원가입.html'>회원가입</a>
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
                    <span>글수정</span>
                    <div class = "write">
                        <form action="./action_php/글수정_공지사항.php?idx=<?php echo $num ?>" enctype="multipart/form-data" method = "post">
                            <input type="text" name="title" id="title" placeholder="제목을 입력해주십시오." value="<?php echo $title ?>">
                            <br>
                            <textarea name="content" id="content" placeholder="내용을 입력해주십시오."><?php echo $content ?></textarea>
                            <br>
                            <input type="file" name="image">
                            <br>
                            <input type="submit" value="글쓰기" id="write">
                        </form>
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
