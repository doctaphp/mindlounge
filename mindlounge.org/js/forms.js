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
	   
			if ($(window).height() < 1250) {
				$('footer').toggleClass("footRelative");
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
 /////////////////////////////////////////////////////////////////////////////
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

	$('#contact').validate({ // initialize the plugin
        rules: {
            fname: {
                required: true,    
            },
            lname: {
                required: true,
                
            },
			form1email: {
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

// ||||||||||||||||||||||||||||||||||||||||| profile picture 
	document.getElementById('image').addEventListener('click',function(){
			document.getElementById('profilePic').click();
	});
	window.pressed = function(){
		var a = document.getElementById('profilePic');
		if(a.value == "")
			{
				fileLabel.innerHTML = "Choose a Profile Picture";
			}
			else
				{
					var file = $('#profilePic')[0].files[0];
					var reader = new FileReader();
					reader.readAsDataURL(file);
					reader.onload = function(e){
						var img = $('#target');
						img.attr('src', this.result);
						}
					var theSplit = a.value.split('\\');
					fileLabel.innerHTML = theSplit[theSplit.length-1];
				}
	};								

							
	
});

  
