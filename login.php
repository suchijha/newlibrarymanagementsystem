<?php

// Start the session
session_start();

include 'connection.php';


 
 if(isset($_POST['email'])){
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myUsername = $_POST['email'];
      $myPassword = $_POST['password'];
      $password=SHA1($_POST['password']);
      $_SESSION["email"]=$_POST['email'];
   if(empty($myUsername)){
       echo "empty";
   }else{
       echo $_SESSION["email"];
   }
      
      

      $sql = "SELECT  user_id  FROM users WHERE email = '$myUsername'";
      $result = mysqli_query($conn,$sql);
     
      
      $count = mysqli_num_rows($result);
      
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count >= 1) {
       // $row=mysqli_fetch_assoc($result);
        $row = $result -> fetch_assoc();

        $id=$row["user_id"];
       
      $sql = "SELECT * FROM users WHERE password= '$password'";
      
      $result = mysqli_query($conn,$sql);
    
      
      $count1 = mysqli_num_rows($result);
      
         if($count1>=1)
        { 
         // $result=mysqli_query($conn,$sql);
          
          $SQL="SELECT role from Roles where Roleid='$id'";
          $result = mysqli_query($conn,$SQL);
          $row=mysqli_fetch_assoc($result);
        $id=$row['role'];
        echo $id;
        if($id=='admin')
         {$_SESSION['login_user'] = $myUsername;
         echo "hi";
         echo "<script>window.location.href='dbs.php';</script>";}
        else{
           
            
            echo "<script>window.location.href='student1.php';</script>"; 
     
        }
        
        }
         else{
             $error1="<span style=color:red;font-size:14px>invalid password</span>";
         }
      }
      else {
         $error = "<span style=color:red;font-size:14px ;visibility:visible> email not found</span>";
         
      }
      
   }}
   ?>
   <html>
   <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">

    <!-- below we are including the jQuery and jQuery plugin .js files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  
       
   
   
   
   <script>
        $(document).ready(function() {

            $("#signupForm").validate({

                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                    // firstname: "required",
                    //  lastname: "required",
                    // username: {
                    // required: true,
                    //for length of lastname
                    // },
                    password: {
                        // required: true,
                        // minlength: 8
                    },
                    confirm_password: {


                        equalTo: "#password" //for checking both passwords are same or not
                    },
                    // email: {
                    //  required: true,

                    // },
                    //ujk: {required:true},
                    //  role:{required:true}
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                   
                    password: {
                        required: "<br/><span style=color:red;font-size:14px;margin-top:5px>Please enter a password </span>",
                        minlength: "<br/><span style=color:red;font-size:14px;margin-top:5px>your password must atleast of 8 characters</span>"
                    },
                    confirm_password: {
                        //required : "</br><span style=color:red;font-size:12px>Please enter a password</span>",
                        //minlength : "</br><span style=color:red;font-size:12px>Your password must be consist of at least 8 characters</span>",
                        equalTo: "</br>"
                    },




                    email: {
                        required: "</br><span style=color:red;font-size:14px;margin-top:5px;visibility:visible> please enter email</span>",
                        email: "</br><span style=color:red;font-size:14px;margin-top:5px> please enter valid email</span>"
                    },
                    // ujk: {required:"<span style=color:red;font-size:12px>Please accept our policy</span>"},
                   
                },



            });
        });
    </script>
</head>
<?php include 'header.php'?>


<div class="form-3">

    <body>
        <form name="myForm" class="cmxform3" id="signupForm" method="post" autocomplete="off" onsubmit="  validateForm(event)">
            <div class="h1">
                <h1>Login Form </h1>
            </div>
          

          



            <fieldset style="width:400px;padding:20px">


                <span>

                    <div class="my-label required"> <i class="fa fa-envelope" style="font-size:18px;padding-top:3%"></i>
                        <input id="email" name="email" placeholder="Email" value="<?php echo $_POST['email']; ?>" oninput="myFun8(this.value)"
                      ></input>
                    </div>
                  
                    <div id="demo20"><div id="demo75"><?php echo $error;echo "<span style=font-size:14px;margin-top:5px;visibility:hidden;>hii</span>"?></div></div>
               
              

                </span>
                <script>
      
                    function myFun8(val) {
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; {
                            if (!emailReg.test(val)) {
                                document.getElementById("demo20").style.visibility = "visible"
                                document.getElementById("demo20").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter valid email</span>";
                            } else {
                                
                                
                                
                                document.getElementById("demo20").style.visibility = "hidden"
                                document.getElementById("demo20").innerHTML = "hello "
                            }
                               
                        }
                    }
                </script>


                <span>
                    <div class="my-label required"> <i class="fa fa-lock" style="font-size:22px;padding-top:2%"></i>
                        <input  type="password" id="password1" placeholder="Password" name="password" oninput="myFun82(this.value)" value="<?php echo $_POST['password']?>">   <i class="bi bi-eye-slash" 
                    id="togglePassword"style=" margin-top:3%;margin-left: -30px; cursor: pointer;"></i>
                  
                    
                    </div>

                    <div id="demo15"><div id="demo25"><?php echo $error1;echo "<span style= font-size:14px;visibility:hidden;margin-top:5px>hii</span>";?></div></div>
                    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password1");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle('bi-eye');
        });
</script>
                    

                    
               
               
                </span>
                <script> 
               function myFun82(val){
                  var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
                  var regex2 = /^\s*$/;
                  if (regex2.test(val)) {
                            document.getElementById("demo15").style.visibility = "hidden";
                            document.getElementById("demo15").innerHTML = "hello ";
                        } 
             else  {  if (!regex.test(val)) {
                                document.getElementById("demo15").style.visibility = "visible"
                                document.getElementById("demo15").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px> enter valid password upto 8 characters including uppercase and lowercase letters with numbers</span>";
                            } else {
                                document.getElementById("demo15").style.visibility = "hidden"
                                document.getElementById("demo15").innerHTML = "hello "
                            }}
                }
                    </script>






                
             


             



                <div class="sub">
                    <input class="submit1" type="submit" value="Submit" style="margin-right:20px;height:30px; width:80px">
                </div>
                </span>
       
                 
            </fieldset>
        </form>
</div>
</body>

</html>

<script>
    function validateForm(event) {

        let x4 = document.forms["myForm"]["email"].value;
        let x5 = document.forms["myForm"]["password"].value;
        // let x6=document.forms["myForm"]["role"].value;
        
        var regex = /^\s*$/;
        var regex2=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/

        if (regex.test(x4)) {
            document.getElementById("demo20").style.visibility = "visible";
            document.getElementById("demo20").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter email </span>";
            event.preventDefault();
        }
        if (regex.test(x5)) {
            document.getElementById("demo15").style.visibility = "visible";
            document.getElementById("demo15").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter password </span>";
            event.preventDefault();
        } else  {  if (!regex2.test(x5)) {
                                document.getElementById("demo15").style.visibility = "visible"
                         document.getElementById("demo15").innerHTML = "<span style=color:red;font-size:12px;margin-top:5px>please enter valid password consisting of uppercase letters, lowercase letters and number and upto 8 characters</span>";
                        event.preventDefault();    } else {
                                document.getElementById("demo15").style.visibility = "hidden"
                                document.getElementById("demo15").innerHTML = "hello "
                            }}



                        }

    //if(regex.test(x6)){document.getElementById("demo14").style.visibility="visible";
    //document.getElementById("demo14").innerHTML = "<span style=color:red;font-size:12px>please enter role </span>";

    //event.preventDefault();  }
    
</script>



