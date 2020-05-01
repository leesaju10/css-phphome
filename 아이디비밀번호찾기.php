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
            <link rel = "stylesheet" type="text/css" href="./css/아이디비밀번호찾기.css">
        <meta charset="UTF-8">
        <title>EVERY KY</title>
        <script src="./Emailcheck.js"></script>
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
                <span>아이디/비밀번호 찾기</span>
                <div class="IdPwSearch">
                    <form action="./action_php/메일전송.php" enctype="multipart/form-data" method = "post" onsubmit="return EmailCk()">
                        <input type="text" name="email" id="email" placeholder="이메일을 입력해주세요.">
                        <br>
                        <input type="submit" id="submit" value="클릭시 정보 전송">
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
