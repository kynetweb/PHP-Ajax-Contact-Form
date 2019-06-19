<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact Form</title>
<link rel="stylesheet" href="css/style.css">
 <link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<section class="section section-login">
            <div class="valign-wrapper row login-box">
                <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
                    
                      <form action="" method="POST">
                        <div class="card-content">
                          <span class="card-title">Get in Touch</span>
                          <div class="row">
                                
                            <div class="input-field col s12">
                              <label for="text">Your Name <span class="requird">&#42;</span> </label>
                              <input type="text"  name="name" id="name" />
                            </div>
                            <div class="input-field col s12">
                              <label for="email">Email <span class="requird">&#42;</span> </label>
                              <input type="email" class="validate" name="email" id="email"/>
                            </div>
                            <div class="input-field col s12">
                                <label for="phone">Phone </label>
                                <input type="text"  name="phone" id="phone" />
                              </div>
                              <div class="input-field col s12">
                                <label for="subject">Subject <span class="requird">&#42;</span> </label>
                                <input type="text"  name="subject" id="subject"  />
                              </div>
                              <div class="input-field col s12">
                                <label for="message">Message <span class="requird">&#42;</span></label>
                                <textarea class=" materialize-textarea" name="message" id="message" rows="4" cols="50"></textarea>
                              </div>
                          </div>
                        </div>
                        <div class="card-action right-align">
                          <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
                          <input type="button" class="btn teal waves-effect waves-light" value="Login" id="submit">
                        </div>
                      </form>
                      <div class=" s10 pull-s1 m6 pull-m3 l4 pull-l4 result green lighten-2"></div>
                    </div>
                  </div>
      </section>
      </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script>
      $("#submit").click(function(){
	
    // Initiate Variables With Form Content\
	var name = $("#name").val();
	var email = $("#email").val(); 
	var phone = $("#phone").val();
    var msg_subject = $("#subject").val();
    var message = $("#message").val();
	var submitt = $("#submit").val();
   $.ajax({
        type: 'POST',
        url: 'form-process.php',
        data: { name: name, email: email, phone: phone, msg_subject: msg_subject, message: message, submit: submitt},
        success: function(response) {
			$('.result').show();
			 $('.result').html(response);
        }
    });
})
$("#reset").click(function(){
    $('.result').empty();
})
</script>
      