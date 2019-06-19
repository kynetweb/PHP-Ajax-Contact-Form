$("#submit").click(function(){
	
    // Initiate Variables With Form Content\
	var name = $("#name").val();
	var email = $("#email").val(); 
	var phone = $("#phone").val();
    var msg_subject = $("#subject").val();
    var message = $("#message").val();
	var submitt = $("#submit").val();

    $.ajax({
        type: "POST",
        url: "form-process.php",
		data: {'name': name, 'email': email, 'phone':phone, 'msg_subject': msg_subject, 'message': message, 'submit': submitt},
       success : function(text){
            $(".result").html(text);
        }
    });
})