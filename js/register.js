$(document).ready(function() {
  $('#signup-form').submit(function(event) {
    // Prevent the form from submitting normally
    event.preventDefault();

    // Get the form data
    var formData = $(this).serialize();

    // Send an AJAX request to the PHP script
    $.ajax({
      type: 'POST',
      url: '/qwerty/php/register.php',
      data: formData,
      success: function(response) {
        if(response == "New record inserted sucessfully") {
          alert('Register Sucessfully');
        }
        else if(response == "Someone already register using this email") {
          alert('Email already exist');
        }
        else{
          alert('Enter email and password');
        }
      },
      error: function(xhr, status, error) {
        // Handle errors
        alert('Error: ' + error);
      }
    });
  });
});
