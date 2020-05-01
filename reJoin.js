function plzno(str) {
    var special_pattern = /<>-"'/gi; 
    if(special_pattern.test(str) == true) { 
        return 2;
        //특수문자 있음 
    } 
    else { 
        return 1; 
        //특수문자 없음
    }
}

function plzno2(address_value) {
    var special_pattern = /<>"'/gi; 
    if(special_pattern.test(address_value) == true) { 
        address_input.focus();
        return 2;
    }
    else { 
        return 1; 
        //특수문자 없음
    }
}

function checkSpace(str) { 
    if(str.search(/\s/) != -1) { 
        return 2; 
        //공백이 있음
    } 
    else { 
        return 1; 
        //공백이 없음
    } 
}

function CheckEmail(str)
{                                                 
     var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
     if(!reg_email.test(str)) {                            
          return 2;         
     }                            
     else {                       
          return 1;         
     }                            

}


function rejoinCheck() {
    password_input = document.getElementById('password');
    password_value = password_input.value.trim();
    passwordCk_input = document.getElementById('password2');
    passwordCk_value = passwordCk_input.value.trim();
    name_input = document.getElementById('nickname');
    name_value = name_input.value.trim();
    sex_input = document.getElementById('sex');
    sex_value = sex_input.value.trim();
    phone_input = document.getElementById('phone');
    phone_value = phone_input.value.trim();
    email_input = document.getElementById('email');
    email_value = email_input.value.trim();
    address_input = document.getElementById('address');
    address_value = address_input.value.trim();

    minpwd_length = 8;
    maxpwd_length = 15;

    if(minpwd_length > password_value.length || maxpwd_length < password_value.length){
        alert('Password는 8자 이상 15자 이하입니다.');
        password_input.focus();
        return false;
    }
    //password글자수 검사

    if(password_value != passwordCk_value){
        alert('Password와 Password 확인이 같지 않습니다.');
        passwordCk_input.focus();
        return false;
    }
    //passwrod와 password확인 같은지 검사


    if (CheckEmail(email_value)==2){
        alert('E-mail형식으로 작성하시오');
        email_input.focus();
        return false;
    }
    //email형식 검사

    if (!password_value){
        alert('Password를 입력하세요.');
        password_input.focus();
        return false;
    }
    if (!passwordCk_value){
        alert('Password 확인을 입력하세요.');
        passwordCk_input.focus();
        return false;
    }
    if (!name_value){
        alert('이름을 입력하세요.');
        name_input.focus();
        return false;
    }
    if (!sex_value){
        alert('성별을 체크하세요.');
        return false;
    }
    if (!phone_value){
        alert('핸드폰 번호를 입력하세요.');
        phone_input.focus();
        return false;
    }
    if (!email_value){
        alert('E-mail를 입력하세요.');
        email_input.focus();
        return false;
    }
    if (!address_value){
        alert('주소를 입력하세요.');
        address_input.focus();
        return false;
    }
    //빈칸 검사

    if (plzno(password_value)==2){
        alert('PASSWORD에 \", \', -, <, > 를 쓸수 없습니다.');
        password_input.focus();
        return false;
    }
    if (plzno(passwordCk_value)==2){
        alert('PASSWORD 확인에 \", \', -, <, > 를 쓸수 없습니다.');
        passwordCk_input.focus();
        return false;
    }
    if (plzno(name_value)==2){
        alert('이름에 \", \', -, <, > 를 쓸수 없습니다.');
        name_input.focus();
        return false;
    }
    if (plzno(phone_value)==2){
        alert('핸드폰번호에 \", \', -, <, > 를 쓸수 없습니다.');
        phone_input.focus();
        return false;
    }
    if (plzno(email_value)==2){
        alert('E-mail에 \", \', -, <, > 를 쓸수 없습니다.');
        email_input.focus();
        return false;
    }
    if (plzno2(address_value)==2){
        alert('주소에 \", \', <, > 를 쓸수 없습니다.');
        address_input.focus();
        return false;
    }
    //특수문자 검사
    
    if (checkSpace(password_value)==2){
        alert('PASSWORD에 빈칸을 쓸수 없습니다.');
        password_input.focus();
        return false;
    }
    if (checkSpace(passwordCk_value)==2){
        alert('PASSWORD확인에 빈칸을 쓸수 없습니다.');
        passwordCk_input.focus();
        return false;
    }
    if (checkSpace(name_value)==2){
        alert('이름에 빈칸을 쓸수 없습니다.');
        name_input.focus();
        return false;
    }
    if (checkSpace(phone_value)==2){
        alert('핸드폰 번호에 빈칸을 쓸수 없습니다.');
        phone_input.focus();
        return false;
    }
    if (checkSpace(email_value)==2){
        alert('E-mail에 빈칸을 쓸수 없습니다.');
        email_input.focus();
        return false;
    }


    
    return true;
};
