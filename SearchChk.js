function titleR_txt(str){
	str = str.replace(/</g,"&lt;");
	str = str.replace(/>/g,"&gt;");
	str = str.replace(/&/g,"&amp;");
    str = str.replace(/"/g,"&quot;");
    str = str.replace(/'/g,"&#x27;");
	return str;
}

function SearchCheck() {
    search_input = document.getElementById('search');
    search_value = search_input.value.trim();
    
    searchlim_length = 20;

    if (!search_value){
        alert('찾고싶은 글을 입력하세요.');
        search_input.focus();
        return false;
    }

    if (search_value.length > searchlim_length){
        alert("글 제목은 " + searchlim_length + "자 이하입니다.");
        search_input.focus();
        return false;
    }

    search_value = titleR_txt(search_value);

    search_input.value = search_value;

    return true;
};