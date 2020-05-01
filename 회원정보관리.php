<?php session_start(); 

$id=$_SESSION['id'];

if ($id ==NULL) {
    echo "<script>
            alert('잘못된 접근 입니다.');
            location.href='메인.php';
        </script>";
}

?>

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
$sql = 'SELECT * FROM `Profile` WHERE id ="'.$id.'"';
$result =  mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$sex = $row['sex'];
$email =$row['email'];
$phone = $row['phone_num'];
$address=$row['address'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
            <link rel = "stylesheet" type="text/css" href="./css/reset.css">
            <link rel = "stylesheet" type="text/css" href="./css/회원정보관리.css">
        <meta charset="UTF-8">
        <title>EVERY KY</title>
        <script src="./logincheck.js"></script>
        <script src="./reJoin.js"></script>
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
                    <span>회원정보관리</span>
                    <div class = "form">
                    <form action="./action_php/회원정보수정.php" method = "post" onsubmit = "return rejoinCheck();">
                       <span> 아이디 : </span> <?php echo "$id";?>
                        <br>
                        <label for="password">
                            패스워드  : 
                        </label>
                        <input type="password" name="password" id="password">
                        <br>
                        <label for="password2">
                            패스워드 확인 : 
                        </label>
                        <input type="password" name="password2" id="password2">
                        <br>
                        <label for="nickname">
                            닉네임 : 
                        </label>
                        <input type="text" name="nickname" id="nickname" value="<?php echo "$name";?>">
                        <br>
                           <span> 성별 :</span> 
                        <input type="radio" name="sex" id="sex" value="남" <?php if($sex=="남"){echo 'checked="checked" ';}?>>남
                        <input type="radio" name="sex" id="sex" value="여" <?php if($sex=="여"){echo 'checked="checked" ';}?>>여
                        <br>
                        <label for="email">
                            이메일 : 
                        </label>
                        <input type="text" name="email" id="email" value="<?php echo $email;?>">
                        <br>
                        <label for="phone">
                            핸드폰번호 : 
                        </label>
                        <input type="text" name="phone" id="phone" value="<?php echo $phone;?>">
                        <br>
                        <label for="address">
                            주소 : 
                        </label>
                        <input type="text" name="address" id="address" value="<?php echo $address;?>" >
                        <br>
                        <input type="submit" id="submit" value="저장">
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
