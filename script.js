var validform=false;
try
{
	var click_submit = document.getElementById("submit");
	click_submit.addEventListener("click", formValidation);
	function formValidation(){
			var name = document.getElementById("name").value;
			var email = document.getElementById("email").value;
			var psw = document.getElementById("psw").value;
			var psw_repeat = document.getElementsById("psw_repeat").value;
			var mobno = document.getElementsById("mobno").value;
			
			if((name.length != 0  && email.length != 0 && mobno.length != 0)) 
			{
				if(validName(name))
				{
					if(validEmail(email))
					{

						if(validMobno(mobno))
						{
							validform=true;
						}
						else
						{
							alert("Number Invalid!");
						}
					}
					else{
						alert("Invalid Email ID!");
					}
				}
				else
				{
					alert("Enter valid Name!");
				}
			}	
			else{
				alert("Please fill all the Values.");
			}
			
			if(validform)
			{
				var name = document.getElementById("name").value;
				alert("Welcome "+name);
				var line1 = "Name :" + name + "<br>";
				var line2 = "Email :" + email + "<br>";
				var line3 = "Mobile No." + mobno + "<br>";
				document.getElementById("output").innerHTML = line1 + line2 + line3;
				document.write(document.getElementById("output").innerHTML);
			}

			function validName(name)
			{
				var letters = /^[A-Za-z ]+$/;
				if((name.match(letters).length > 0 )|| !(name.match(letters)==null))
					{
						return true;
					}
				else
					{
						return false;
					}
			}

			function validEmail(email)
			{
 				if (email = /^([a-zA-Z0-9\.-]+)@([a-z 0-9 -]+)\.([a-z]{2,8})$/.test(myForm.email.value))
  					{
    					return (true)
  					}
    				alert("You have entered an invalid email address!")
    				return (false)
			}	
			
			function validMobno(mobno)
			{
  				phoneno = /^\d{10}$/;
  				if((mobno.value.match(phoneno)))
        			{
      					return true;
        			}
      			else
        			{
        				alert("Number Invalid!");
        				return false;
        			}
			}
	}
}	
catch(err)
	{
		console.log(err.message);
    }
    	