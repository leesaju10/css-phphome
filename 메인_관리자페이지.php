<?php session_start(); 

$id=$_SESSION['id'];

if ($id !="admin") {
    echo "<script>
            alert('잘못된 접근 입니다.');
            location.href='메인.php';
        </script>";
}

?>

<?php
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

<!DOCTYPE html>
<html lang="ko">
<head>
            <link rel = "stylesheet" type="text/css" href="./css/reset.css">
            <link rel = "stylesheet" type="text/css" href="./css/메인_관리자페이지.css">
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
                    <span>관리자페이지</span>
                    <div class="admin_page">
                        <table>
                            <thead>
                                <td>
                                    번호
                                </td>
                                <td>
                                    아이디
                                </td>
                                <td>
                                    닉네임
                                </td>
                                <td>
                                    이메일주소
                                </td>
                                <td>
                                    휴대폰 번호
                                </td>
                                <td>
                                    탈퇴시키기
                                </td>
                            </thead>
                            <!-- while 문으로 적용 해야 한다.-->
                                <?php 

                                $sql = 'select * from Profile';
                                    $result =  mysqli_query($conn, $sql);
                                if($result) {
                                    echo "조회 성공";
                                } else {
                                    echo "결과 없음: ".mysqli_error($conn);
                                }
                                    while($row = $result->fetch_assoc()){            
                                    $num = $row['num'];
                                    $id = $row['id'];
                                    $nickname = $row['name'];
                                    $email = $row['email'];
                                    $phone = $row['phone_num'];
                                echo "
                                <tr>
                                <td>$num</td>
                                <td>$id</td>
                                <td>$nickname</td>
                                <td>$email</td>
                                <td>$phone</td>
                                <td><a style='color : black;'href='./action_php/회원탈퇴시키기.php?idx=$num'>탈퇴시키기</td>
                                </tr>
                                ";
                                }

                                ?>
                            <!-- 검색 기능 링크 연결 해야함..-->
                        </table>
                        <form action="./메인_관리자페이지_회원검색.html" enctype="multipart/form-data" method = "get">
                            회원 검색 : 
                            <input type="text" name ="search">
                        <input type="submit" value="검색">
                        </form>
                    </div>
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
