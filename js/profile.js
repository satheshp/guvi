function submitForm() {
  var n = $("input[name=username]").val();
  var p= $("input[name=dob]").val();
  var m= $("input[name=gender]").val();

  var f = {  username: n, dob: p  ,gender : m};

    $.ajax({
      url: "/qwerty/php/profile.php",
      type: "POST",
      data: f,
      success: function (response) {
        if(response == "register") {
        
          alert('Register Sucessfully');
        }
       else if(response == "Someone already register using this email") {
          
          alert('Incorrect password');
        }
        else{
          alert('REGISTERED SUCCESSFULLY');
        }

      },
      error: function(xhr, status, error) {
        // Handle errors
        alert('Error: ' + error);
      }
    });
  }