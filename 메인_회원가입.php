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
            <link rel = "stylesheet" type="text/css" href="./css/메인_회원가입.css">
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
                <span>회원가입</span>
                <div class="sign_in">

                    <form action="./action_php/회원가입.php" accept-charset="utf-8" name = "person_info" method = "post">
                        <label for="id">
                            ID 
                        </label>
                        <input type="text" name="id" id="id">
                    <button type="button" onclick="popup();">중복확인</button>
                        <br>
                        <label for="password">
                            Password  
                        </label>
                        <input type="password" name="password" id="password">
                        <br>
                        <label for="password_check">
                            Password 확인  
                        </label>
                        <input type="password" name="password_check" id="password_check">
                        <br>
                        <label for="name">
                            이름  
                        </label>
                        <input type="text" name="name" id="name">
                        <br>
                        <label>
                        성별 
                        </label>
                        <input type="radio" name="sex" id="sex" value="남"> 남자
                        <input type="radio" name="sex" id="sex" value="여"> 여자
                        <br>
                        <label for="phone_num">
                            핸드폰 번호   
                        </label>
                        <input type="number" name="phone_num" id="phone_num">
                        <br>
                        <label for="email">
                            E-mail  
                        </label>
                        <input type="text" name="email" id="email">
                        <br>
                        <label for="address">
                            주소  
                        </label>
                        <input type="text" name="address" id="address">
                        <br>
                        <input type="submit" value="회원가입" id="submit">
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