<?php

    $username="";
	$err_username="";
	$password="";
	$err_password="";
    $url="";

    $hasError=false;

    function validuser(){
        global $hasError;
        if(!$hasError){
            if((($_POST["uname"])=="jamil@gmail.com") and (($_POST["pswrd"])=="1234567"))
            {
                echo "Valid User";
                return true;
            }

            else
            echo "Invalid User";
            return false;
        }
    }

    if(isset($_POST["submit"])){

        if(empty($_POST["uname"])){
			$hasError = true;
			$err_username="User id or email required";
		}
		elseif(!stristr($_POST["uname"],"@") OR !stristr($_POST["uname"],".")){
			$hasError = true;
			$err_username="Enter Valid Email";
		}
        elseif(is_numeric($_POST["uname"])){
            $hasError = true;
			$err_username="Enter Valid User id";    
        }
		else{
            htmlspecialchars($_POST["uname"]);
			$username = $_POST["uname"];
		}

        if(empty($_POST["pswrd"])){
			$hasError = true;
			$err_password="Password Required";
		}
        else if(strlen($_POST["pswrd"]) <= 5){
			$hasError = true;
			$err_password="Password must contain Five character";
		}
        else{
			htmlspecialchars($_POST["pswrd"]);
            $password = $_POST["pswrd"];
		}

        if(validuser()===true){
           $url="home_page.html"; 
        }
        else
        $url="";

    }

?>


<html>
    <head></head>
    <body>
        <form action="<?php echo $url;  ?>" method="post">
            <fieldset>
                <b><h1>Welcome To Metro Automation</h1></b>
                    <table align="left">
                        <tr>
                            <td>
                                <img src="metro.jpg">
                            </td>
                        </tr> 
                    </table>
                
                    
                <table align="center">
                    <tr>
                        <td>
                            User Id or Email
                        </td>
                        <td>
                            :<input type="text"  name="uname" value="<?php echo $username; ?>" placeholder="Enter user id or email">
                        </td>
                        <td>
                            <span><?php echo $err_username;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password
                        </td>
                        <td>
                            :<input type="password" name="pswrd" value="<?php echo $password;?>" placeholder="Enter password">
                        </td>
                        <td>
                            <span>
                                <?php echo $err_password;?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    
					    <td> 
                            <!--<a href="home_page.html">-->
                            <input type="submit" name="submit" value = "Login" ></a>
                        </td>
				    </tr>

                </table>
            
        </form>
        <table align="center">
            <tr>
                <td>
                    <a href="user_sign_up.php">  
                    <input type="button" value="Signup">  
                    </a>
                </td>
                <td>
                    <a href="reset.html">  
                    <input type="button" value="Forget Password">  
                    </a>
                </td>
            </tr>
        </table>
        </fieldset>
     </body>
</html>