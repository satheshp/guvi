function submitForm() {
  var n = $("input[name=username]").val();
  var p= $("input[name=password]").val();
  var f = {  username: n, password: p  };

    $.ajax({
      url: "/qwerty/php/login.php",
      type: "POST",
      data: f,
      success: function (response) {
        console.log("Response from server:", response);
        if(response == "register")
         {
            console.log("Redirecting to profile.html");
          window.location.href= './profile.html';
         
        }
       else if(response == "Incorrectpassword") {
          
          alert('Incorrect password');
        }
        else{
          alert('Email not found');
        }

      },
      error: function(xhr, status, error) {
        // Handle errors
        alert('Error: ' + error);
      }
    });
  }