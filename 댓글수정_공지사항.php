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
$idx = $_GET["idx"];
$num = $_GET["article"];
$sql = "SELECT * FROM `reply_board2` WHERE idx=$idx && article_num=$num";
$result =  mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$writer = $row['writer'];
$content = $row['content'];
$id=$_SESSION['id'];
	if($id!=$writer){

		echo "<script>
			   alert( '작성자가 아니면 수정하실 수 없습니다.' );
			   history.back();
		      </script>
		     ";
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>글수정</title>
        <script src="./Concheck.js"></script>
    </head>
    <body>

    </body>
</html>

<!DOCTYPE html>
<html lang="ko">
<head>
            <link rel = "stylesheet" type="text/css" href="./css/reset.css">
            <link rel = "stylesheet" type="text/css" href="./css/reply.css">
        <meta charset="UTF-8">
        <title>EVERY KY</title>
        <script src="./logincheck.js"></script>
        <script src="./Check.js"></script>
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
                        <form action='./action_php/로그인.php' enctype='multipart/form-data' method = 'post' onsubmit = 'return loginCheck();'>
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
                            <a href='./아이디비밀번호찾기.php'>아이디/비밀번호찾기</a>
                        </form>
                    </div>";}
                    
                    else {
                    echo "<div class='logined_form'>
                        <span>닉네임 : </span><sapn class='name'>$id</sapn>
                        <br><br>
                            <a href='./회원정보관리.php'>회원정보관리 가기</a>
                            <br><br>
                            <a href='./action_php/로그아웃.php'>로그아웃</a>
                    ";}
if($id == "admin"){echo "<br><br><a href='./메인_관리자페이지.php'>관리자페이지</a></div>";}
else{ if($id!=NULL){echo "</div>";}}
                    ?>
                </div>
                
                <div class="right">
                    <span>댓글수정</span>
                    <div class = "reply">
                        <form action="./action_php/댓글진짜수정_공지사항.php?idx=<?php echo $idx; ?>&article=<?php echo $num; ?>" method = "post" onsubmit="return conCheck();">
	                        <?php echo $writer;?>
                            <input type="text" name="content" id="content" value="<?php echo $content; ?>">
                            <input type="submit" value="수정" id="submit">
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
