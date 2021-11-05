function validate()
        {
         var Name=document.getElementById("name").value;
         reg=/^([a-zA-Z' ]+)$/
         //check name string contains empty or not
         if(Name=="")
         {
             //alert("please entera nane");
            error("nameError","please enter a name");
             return false;
         }
         
         // check wheather name string contains only letters or not
         else if( reg.test(Name)===false)
         {
            error("nameError","please enter only letters");
             return false;
         }
         else
         {
            error("nameError","");
         }
         // taking value of the email
         var Email=document.getElementById("email").value;
        
   		 Reg=/^\S+@\S+\.\S+$/
            //check the email is empty or not
		if(Email=="")
		{
			error("emailerror","please enter a mail");
			return false;
		}
        //email format checking by the regular expreesion
			else if(Reg.test(Email)===false)
			{
				error("emailerror","please enetr a valid email");
				return false;
			}
				else{
					error("emailerror","");
				}
                var salary =document.getElementById('salary').value;
                if(salary="")
                {
                    error("salaryerror","please enter the salary");
			        return false;
                }
                else
                {
                    error("salaryerror","");
                }
        }
    function error(elementid,message)
    {
	    document.getElementById(elementid).innerHTML=message;
    }