<?php session_start(); 

$id=$_SESSION['id'];?>

<!DOCTYPE html>
<html lang="ko">
<head>
            <link rel = "stylesheet" type="text/css" href="./css/reset.css">
            <link rel = "stylesheet" type="text/css" href="./css/메인_학식.css">
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
                    ";}
if($id == "admin"){echo "<br><br><a href='./메인_관리자페이지.php'>관리자페이지</a></div>";}
else{echo "</div>";}
                    ?>
                </div>
                                
                <div class="right">
                    <span>5월 이달의 학식</span>
                    <div class="diet">
                        <table>
                            <thead>
                                <td>월</td>
                                <td>화</td>
                                <td>수</td>
                                <td>목</td>
                                <td>금</td>
                                <td>토</td>
                                <td>일</td>
                            </thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span>1</span>예시식단식단식단</td>
                                <td><span>2</span>예시식단식단식단</td>
                            </tr>
                            <tr>
                                <td><span>3</span>예시식단식단식단</td>
                                <td><span>4</span>예시식단식단식단</td>
                                <td><span>5</span>예시식단식단식단</td>
                                <td><span>6</span>예시식단식단식단</td>
                                <td><span>7</span>예시식단식단식단</td>
                                <td><span>8</span>예시</td>
                                <td><span>9</span>예시</td>
                            </tr>
                            <tr>
                                <td><span>10</span>예시</td>
                                <td><span>11</span>예시</td>
                                <td><span>12</span>예시</td>
                                <td><span>13</span>예시</td>
                                <td><span>14</span>예시</td>
                                <td><span>15</span>예시</td>
                                <td><span>16</span>예시</td>
                            </tr>
                            <tr>
                                <td><span>17</span>예시</td>
                                <td><span>18</span>예시</td>
                                <td><span>19</span>예시</td>
                                <td><span>20</span>예시</td>
                                <td><span>21</span>예시</td>
                                <td><span>22</span>예시</td>
                                <td><span>23</span>예시</td>
                            </tr>
                            <tr>
                                <td><span>24</span>예시</td>
                                <td><span>25</span>예시</td>
                                <td><span>26</span>예시</td>
                                <td><span>27</span>예시</td>
                                <td><span>28</span>예시</td>
                                <td><span>29</span>예시</td>
                                <td><span>30</span>예시</td>
                            </tr>
                            <tr>
                                <td><span>31</span>예시</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
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
