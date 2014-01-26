$(function() {
  $('.error').hide();
  $('#success').hide();

  $(".button").click(function() {
		// validate and process form
		// first hide any error messages
    $('.error').hide();
		
	  var name = $("input#name").val();
		if (name == "") {
      $("label#name_error").show();
      $("input#name").focus();
      return false;
    }
		var email = $("input#email").val();
		if (email == "") {
      $("label#email_error").show();
      $("input#email").focus();
      return false;
    }
		var message = $("textarea#message").val();
		if (message == "") {
      $("label#message_error").show();
      $("textarea#message").focus();
      return false;
    }
		
		var dataString = 'name='+ name + '&email=' + email + '&message=' + message;
		//alert (dataString);return false;
		
		$.ajax({
      type: "POST",
      url: "bin/process.php",
      data: dataString,
      success: function() {
        $('#contact-form').hide();
        $('#success').hide()
        .fadeIn(500, function() {
          $('#success');
        });
      }
     });
    return false;
	});
});
runOnLoad(function(){
  $("input#name").select().focus();
});
