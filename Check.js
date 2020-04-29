function R_txt(str){
	str = str.replace(/</g,"&lt;");
	str = str.replace(/>/g,"&gt;");
	str = str.replace(/&/g,"&amp;");
    str = str.replace(/"/g,"&quot;");
    str = str.replace(/'/g,"&#x27;");
	return str;
}

function formCheck() {
    title_input = document.getElementById('title');
    title_value = title_input.value.trim();
    content_input = document.getElementById('content');
    content_value = content_input.value.trim();

    title_length = 20;

    content_length = 500;

    if (!title_value){
        alert('제목을 입력하세요.');
        title_input.focus();
        return false;
    }
    if (title_value.length > title_length){
        alert("제목은 " + title_length + "자 이하입니다.");
        title_input.focus();
        return false;
    }

    if (!content_value){
        alert('내용을 입력하세요.');
        content_input.focus();
        return false;
    }

    if (content_value.length > content_length){
        alert("내용은 " + content_length + "자 이하입니다.");
        content_input.focus();
        return false;
    }

    title_value = R_txt(title_value);
    content_value = R_txt(content_value);
    
    /*
    alert("확인메시지 : " + title_value);
    alert("확인메시지 : " + content_value);
    */
    title_input.value = title_value;
    content_input.value = content_value;
    return true;
};