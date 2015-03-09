$(document).ready(function(){
	//////////////////////STEVE/////////////////////////////////////////////////////////////////// 

//////////////////////STEVE/////////////////////////////////////////////////////////////////// 
	$('#or').click(function(){
		$('#signUp, #logOn').toggle();
	
		if($(this).text() == 'Login'){
			   $(this).text('Sign up to become a member.');
		   }
		   else{
			   $(this).text('Login');
		   }	
		   
			if ($(window).height() < 850) {
				$('footer').toggleClass("foot");
				}
			return false;
    });
	
	$('input,textarea').focus(function(){
		   $(this).data('placeholder',$(this).attr('placeholder'))
		   $(this).attr('placeholder','');
		});
	$('input,textarea').blur(function(){
		   $(this).attr('placeholder',$(this).data('placeholder'));
		});
 
  $('#form1').validate({ // initialize the plugin
        rules: {
            
			form1email: {
                required: true,
                email: true
            },
			form1password: {
                required: true,   
            },
        },
		messages: {
            
			form1email: {
			required: "",
				form1email: ""
				},
			form1password: "",	
			}
    });
  
  
  
  
	$('#form2').validate({ // initialize the plugin
        rules: {
            fname: {
                required: true,    
            },
            lname: {
                required: true,
                
            },
			email: {
                required: true,
                email: true
            },
			reemail: {
                required: true,
                email: true,
				equalTo: "#email"
            },
			password: {
                required: true,
                
            },
			repassword: {
                required: true,
                equalTo: "#password"
            },
			
        },
		messages: {
            fname: "",
			lname: "",
			email: {
			required: "",
				email: ""
				},
			password: "",
			repassword: {
					required: "",
					equalTo: ""
			},
				reemail: {
					required: "",
					email: "",
						equalTo: ""
				}
			}
    });


	
});
  
