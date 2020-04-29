<?php session_start(); 

$id=$_SESSION['id'];

if ($id !=NULL) {
    echo "<script>
            alert('잘못된 접근 입니다.');
            location.href='메인.php';
        </script>";
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
            <link rel = "stylesheet" type="text/css" href="./css/reset.css">
            <link rel = "stylesheet" type="text/css" href="./css/메인_login.css">
        <meta charset="UTF-8">
        <title>EVERY KY</title>
        <script src="./logincheck.js"></script>
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
                <span>로그인</span>
                    <div class="login_form">
                        <form action="./action_php/로그인.php" enctype="multipart/form-data" method = "post" onsubmit = "return loginCheck();">
                            <label for="id" class="id">
                               ID : 
                            </label>
                            <input type="text" name="id" id="id"><br>
                            <label for="password">
                                PW  : 
                            </label>
                            <input type="password" name="password" id="password"><br>
                            <input type="submit" value="Login" id="login_button"><br>
                            <a href="./메인_회원가입.php">회원가입</a>
                            <a href="#">아이디/비밀번호찾기</a>
                        </form>
                    </div>
                
        </div>
        <footer>
            <div class="footer_wrap">    
            <span class="footer_text"><span>제작 : 건양대학교 정보보호학과 16학번 동기들</span> 총괄 : 이진송 </span>
            </div>
        </footer>
        
</body>
</html>