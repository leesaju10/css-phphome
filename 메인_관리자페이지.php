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
<?php 



	$page = 1;

	if($_GET['page']!=NULL){

	$page = $_GET['page'];}

	

	$list = 5; // 한 페이지에 보여줄 게시글 갯수

	$block = 5; // 한 페이지에 보여줄 블록 갯수 



        $sql = 'select count(*) as total from Profile';

        $result =  mysqli_query($conn, $sql);

	$tmp = mysqli_fetch_array($result); 

	$num = $tmp['total'];//총 게시글 갯수 

	$pageNum = ceil($num/$list);//총 페이지 갯수 



	$blockNum = ceil($pageNum/$block);//총 블록 갯수 

	$nowBlock = ceil($page/$block);//현재 페이지가 위치한 블록 번호 (현재 페이지랑 보여줄 블록 갯수를 나누면 현재 블록 값이 나온다.)

	$s_page = ($nowBlock*$block)-($block-1);//현재 위치한 블록 * 보여줄 블록 수 는 블록에서 마지막 페이지 이므로, 보여줄 블록 수 - 1 을 거기서 빼줘야 현재 블록의 첫번째 페이지다

	$e_page = ($nowBlock*$block);

	if($s_page <1){ $s_page = 1;}

	if($e_page >=$pageNum){ $e_page = $pageNum;}



?>

<?php

	

	$start = 0;

	if($page !=NULL){

	$start = $_GET['page'];

	}	

	echo $start;

	$board_num = $start*$list-$list;

	if($start==0){$board_num=0;}

        $sql2 = "select * from Profile order by num desc limit $board_num, $list";

        $result2 =  mysqli_query($conn, $sql2);



?>
<!DOCTYPE html>
<html lang="ko">
<head>
            <link rel = "stylesheet" type="text/css" href="./css/reset.css">
            <link rel = "stylesheet" type="text/css" href="./css/메인_관리자페이지.css">
        <meta charset="UTF-8">
        <title>EVERY KY</title>
        <script src="./logincheck.js"></script>
        <script src="./adsrc.js"></script>
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


                                    while($row2 = mysqli_fetch_array($result2)){            
                                    $num = $row2['num'];
                                    $id = $row2['id'];
                                    $nickname = $row2['name'];
                                    $email = $row2['email'];
                                    $phone = $row2['phone_num'];
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

			<div class="list_num">

			                    <a href="메인_관리자페이지.php?page=<?php if($s_page==1){echo 1;}else{echo $s_page-1;}?>">이전</a>

	                <?php 

	                //이전은 스타트 아래로 가면 이전 블록이 되고, 다음은 엔드 위로 가면 다음 블록이 된다.

	                 for($p=$s_page; $p<=$e_page; $p++){//페이지는 시작 페이지부터 마지막 페이지 까지만 나오게 한다.

	                 echo"<a href='메인_관리자페이지.php?page=$p'>$p</a> ";

	                 }

	                ?>

                      <a href="메인_관리자페이지.php?page=<?php if($e_page<$pageNum){echo $e_page+1;} else if($e_page==$pageNum){echo $pageNum;} ?>">다음</a>			
			
			</div>
                        <form action="./메인_관리자페이지_search.php" enctype="multipart/form-data" method = "get" onsubmit="return adSearchCheck();">
                            회원 검색 : 
                            <input type="text" id ="search" name ="search">
                        <input type="submit" value="검색" onsubmit="adSearchCheck();">
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
