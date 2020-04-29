//비밀번호 특수문자로 바르지 않은것을 모두 없애는 함수
function loginR_txt(str){
	str = str.replace(/</g,"");
	str = str.replace(/>/g,"");
    str = str.replace(/"/g,"");
    str = str.replace(/\s/gi, "");
    str = str.replace(/'/g,"");
    str = str.replace(/-/g,"");
	return str;
}

function loginCheck() {
    id_input = document.getElementById('id');
    id_value = id_input.value.trim();
    password_input = document.getElementById('password');
    password_value = password_input.value.trim();

    if (!id_value){
        alert('ID를 입력하시오.');
        id_input.focus();
        return false;
    }
    if (!password_value){
        alert("비밀번호를 입력하세요.");
        password_input.focus();
        return false;
    }

    id_value = loginR_txt(id_value);
    password_value = loginR_txt(password_value);

    id_input.value = id_value;
    password_input.value = password_value;
    
    return true;
};