function adR_txt(str){
	str = str.replace(/</g,"&lt;");
	str = str.replace(/>/g,"&gt;");
	str = str.replace(/&/g,"&amp;");
    str = str.replace(/"/g,"&quot;");
    str = str.replace(/'/g,"&#x27;");
	return str;
}

function adSearchCheck() {
    search_input = document.getElementById('search');
    search_value = search_input.value.trim();
    
    searchlim_length = 10;
    //회원 글자수 10자 이내

    if (!search_value){
        alert('찾고싶은 회원을 입력하세요.');
        search_input.focus();
        return false;
    }

    if (search_value.length > searchlim_length){
        alert("회원은 " + searchlim_length + "자 이하입니다.");
        search_input.focus();
        return false;
    }

    search_value = adR_txt(search_value);

    search_input.value = search_value;

    return true;
};
