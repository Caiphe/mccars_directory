   // NEWSLETTER FORM VALIDATION
   
    var email = document.forms["myForm"]["email"];
    var email_error = document.getElementById("email_error");
    email.addEventListener("blur", emailVerify,true);

    function Validation()
    {
          if(email.value == "")
          {
               email.style.border = "solid 1px #7f0a0a";
               email_error.textContent = "Valid Email Required";
              email.focus();
              return false;
          }
     }
     function emailVerify()
     {
          if(email.value != "")
          {
               email.style.border = "solid 1px #1f6b2f";
               email_error.innerHTML ="";
               return true;
          }
     }
