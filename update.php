<?php
include("header.php");
$id=$_GET['editid'];
$sql="select * from contacts where id=$id";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
    <html>
        <body style="center">
            <div class="main-container">
                              
                <form  name="student" id="form" action="" method="POST" enctype="multipart/form-data">
                    <div>
                       <label> First_Name:</label>
                        <input type="text" name="name"id="name" value="<?php echo $row["name"];?> " ><br>
                        <span id="nameerror" class="error" ></span><br>
                    </div>
                    
                   <div>
                       <label> Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo $row["email"];?> " >
                        <span id="emailerror" class="error"></span><br><br>
                    </div>
                    <div>
                       <label> Gender:</label>
                        <input type="radio"  id="gender"name="gender" value="MALE" checked>MALE</input>
                        <input type="radio" id="gender" name="gender" value="FEMALE">FEMALE</input>
                        <input type="radio"  id="gender"name="gender" value="OTHER">OTHER</input>
                        <span id="gendererror" class="error"></span><br><br>
                    </div><br>
                    <div>
                        <label>languages:</label><br>
                        <input type="checkbox" id="check" name="check[]" value="Telugu">Telugu</input><br>
                        <input type="checkbox" id="check" name="check[]" value="Hindi">Hindi</input><br>
                        <input type="checkbox" id="check"  name="check[]" value="English">English</input><br>
                        <span id="checkboxerror" class="error"></span><br>
                    </div>
                            <div>
                                <label>Number</label>
                                <input type="number" id="number" name="number" value="<?php echo $row["number"];?> ">
                                <span id="numbererror" class="error"></span><br><br>
                            </div>
                            <div class="image">
                             <label for="image">Upload Image :</label>
                             <input type="file" name="Img" id="fileToUpload">
                
                              </div>
                       <div  style="width:600px;">
                         <select name="country" id="country" class="form-control">
                                <option value="<?php echo $row["country"];?> ">Select country</option>
                         </select>
                         
                         <select name="state" id="state" class="form-control " style="display:none">
                                 <option value="<?php echo $row["state"];?> ">Select state</option>
                        </select>
                            
                         <select name="city" id="city" class="form-control " style="display:none" multiple size="1">
                                 <option value="<?php echo $row["city"];?> ">Select city</option>
                        </select>
                            </div><br>
                    <div>
                        <label>Description:</label><br>
                        <textarea  rows="2" col="40"name="description"id="description" ></textarea>
                        <span id="descriptionerror" class="error"></span>
                    </div><br><br>
                    <input type="submit"  name="submit" value="sumbit"id="submit" style="background: rgb(153, 199, 153);">
                    <input type="reset" value="cancel" id="reset"style="background: rgb(218, 119, 119);">
                </form>
            </div>    
        </body>
    </html>
    <script>
         $(document).ready(function(){
            //$(".container").hide();
                $("#nameerror").hide();
                $("#emailerror").hide();
                $("#gendererror").hide();
                $("#checkboxerror").hide();
                $("#numbererror").hide();
                $("#descriptionerror").hide();
                var error_name=false;
                var error_email=false;
                var error_gender=false;
                var error_checkbox=false;
                var error_number=false;
                var error_description=false;
                $("#name").focusout(function(){
                    check_name();
                })
                $("#email").focusout(function(){
                    check_email();
                })
               
                $("#number").focusout(function(){
                    check_number();
                })
                $("#description").focusout(function(){
                    check_description();
                })
                $("#check").focusout(function(){
                    check_languages();
                })
                function check_languages()
                {
                    var lang=$("#check").val();
                    if(!lang=='')
                    {
                        $("#checkboxerror").hide();
                    }
                }
                function  check_name()
                {
                    var pattern=/^[a-zA-z]*$/;
                    var name=$("#name").val();
                    if(!name==''&&pattern.test(name))
                    {
                        $("#nameerror").hide();
                        $("#nameerror").css("color","2px sollid #green");
                    }
                    else if(name=="")
                    {
                        $("#nameerror").html("enter a name");
                        $("#nameerror").show();
                        $("#nameerror").css("color","red");
                    }
                    else
                    {
                        $("#nameerror").html("required only letters");
                        $("#nameerror").show();
                        $("#nameerror").css("color","red");
                        error_name=true;
                    }
                }
                    function  check_email()
                    {
                    var Reg=/^\S+@\S+\.\S+$/;
                    var email=$("#email").val();
                    if(!email==''&&Reg.test(email))
                    {
                        $("#emailerror").hide();
                        $("#emailerror").css("color","2px sollid #green");
                    }
                    else if(email=="")
                    {
                        $("#emailerror").html("enter a email");
                        $("#emailerror").show();
                        $("#emailerror").css("color","red");
                    }
                    else
                    {
                        $("#emailerror").html("please enter a valid email id");
                        $("#emailerror").show();
                        $("#emailerror").css("color","red");
                        error_email=true;
                    }
                }
                function  check_number()
                    {
                    var reg=/^[0-9]\d{9}$/;
                    var number=$("#number").val();
                    if(!number==''&&reg.test(number))
                    {
                        $("#numbererror").hide();
                        $("#numbererror").css("color","2px sollid #green");
                    }
                    else if(number=="")
                    {
                        $("#numbererror").html("enter a number");
                        $("#numbererror").show();
                        $("#numbererror").css("color","red");
                    }
                    else
                    {
                        $("#numbererror").html("please enter a valid number ");
                        $("#numbererror").show();
                        $("#numbererror").css("color","red");
                        error_number=true;
                    }
                }
                
                function  check_description()
                    {
                
                    var description=$("#description").val();
                    if(!description=='')
                    {
                        $("#descriptionerror").hide();
                        $("#descriptionrerror").css("color","2px sollid #green");
                    } 
                    else
                    {
                        $("#descriptionerror").html("please enter a valid description ");
                        $("#descriptionerror").show();
                        $("#descriptionerror").css("color","red");
                        error_description=true;
                    }
                } 
              
                $("#submit").click(function(){
                    error_name=false;
                 error_email=false;
                 error_checkbox=false;
                 error_number=false;
                 error_description=false;
                 check_name();
                 check_email();
                 check_number();
                 check_description();
                 $(".container").hide();
                 if($("input:checkbox").filter(":checked").length<1)
                    {
                        $("#checkboxerror").html("please select at least one language")
                        $("#checkboxerror").show();
                        $("#checkboxerror").css("color","red");
                        error_checkbox=true;
                    }
                    else
                    {
                        $("#checkboxerror").hide();
                        $("#checkboxrerror").css("color","green");
                    }
                 
                 if( error_name==false&& error_email==false&& error_checkbox==false&& error_number==false&& error_description==false)
                 {
                  
                    return true;
                   
                 }
                 else
                 { 
                     return false;
                 }
             });

                load_data('country');
                // passing parameters of id 
            function load_data(id, name)
            {
                 var html_code = '';
                 //getting json file
                $.getJSON('country.json', function(data){
                // adding values in a variable
                  html_code += '<option value="">Select '+id+'</option>';
                 $.each(data, function(key, value){
                 if(id == 'country')
                 {
                         if(value.parent_id == '0')
                        {
                             html_code += '<option value="'+value.name+'">'+value.name+'</option>';
                        }
                 }
                 else
                {
                    if(value.parent_id == name)
                    {
                        html_code += '<option value="'+value.name+'">'+value.name+'</option>';
                     }
                }
            });
                    $('#'+id).html(html_code);
        });        
     }
            
             $(document).on('change', '#country', function()
             {
                var country_id = $(this).val();
                    if(country_id != '')
                    {
                        $("#state").show();
                         load_data('state', country_id);
                    }
                     else
                     {
                            $('#state').html('<option value="">Select state</option>');
                             $('#city').html('<option value="">Select city</option>');
                    }
             });
               
                $(document).on('change', '#state', function(){
                var state_id = $(this).val();
                    if(state_id != '')
                     {
                            $("#city").show();
                            load_data('city', state_id);
                     }
                    else
                     {
                         $('#city').html('<option value="">Select city</option>');
                    }
            });
            
   
   });

        </script>
        <?php
         if(isset($_POST['submit']))
                {
                    //getting values from user by post method

                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $gender=$_POST['gender'];
                    $x=[];

                    foreach($_POST['check'] as $key=>$value)
                    {
                        $x=$_POST['check'];
                    }
                            $languages=implode(",",$x);
                            $number=$_POST['number'];
                            $country=$_POST['country'];
                            $state=$_POST['state'];
                            $city=$_POST['city'];
                            $description=$_POST['description'];
                            $file_name=time().'_'.$_FILES['Img']['name'];

                            $tmp_name=$_FILES['Img']['tmp_name'];
                   
                            $target_file='images/'.$file_name;
           
                    $move_file=move_uploaded_file($tmp_name,$target_file);
                       $date=date("Y-m-d");
        
    $sql="UPDATE contacts 
          SET name='$name',email='$email',gender='$gender',languages='$languages', country='$country',state='$state',city='$city',image='$target_file', modified_at='$date' where id=$id";
          
    if( mysqli_query($conn, $sql)===true){
         //alert( "updated successfully");
        echo "<script>window.location.href='contactslisting.php';</script>";
    }else{
        echo "failed";
    }
}

    