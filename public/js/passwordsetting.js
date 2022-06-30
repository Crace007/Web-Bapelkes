document.getElementById('showPassword1').onclick = function(){
    if(this.checked){
      document.getElementById('password1').type = "text";
    } else {
      document.getElementById('password1').type = "password";
    }
  };
  
  document.getElementById('showPassword2').onclick = function(){
    if(this.checked){
      document.getElementById('password2').type = "text";
    } else {
      document.getElementById('password2').type = "password";
    }
  };
  
  document.getElementById('showPassword3').onclick = function(){
    if(this.checked){
      document.getElementById('password3').type = "text";
    } else {
      document.getElementById('password3').type = "password";
    }
  };