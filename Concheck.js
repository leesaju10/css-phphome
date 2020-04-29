//특수문자들 변환하는 부분
function ConR_txt(str){
	str = str.replace(/</g,"&lt;");
	str = str.replace(/>/g,"&gt;");
	str = str.replace(/&/g,"&amp;");
    str = str.replace(/"/g,"&quot;");
    str = str.replace(/'/g,"&#x27;");
	return str;
}

function conCheck() {
    content_input = document.getElementById('content');
    content_value = content_input.value.trim();
    //댓글 길이제한 500자
    content_length = 500;

    if (!content_value){
        alert('댓글을 입력하세요.');
        content_input.focus();
        return false;
    }

    if (content_value.length > content_length){
        alert("댓글은 " + content_length + "자 이하입니다.");
        content_input.focus();
        return false;
    }

    content_value = ConR_txt(content_value);

    content_input.value = content_value;

    return true;
};