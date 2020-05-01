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

function EmailCk(){
    email_input = document.getElementById('email');
    email_value = email_input.value.trim();

    if (!email_value){
        alert('E-mail를 입력하세요.');
        email_input.focus();
        return false;
    }

    if (CheckEmail(email_value)==2){
        alert('E-mail형식으로 작성하시오');
        email_input.focus();
        return false;
    }
}