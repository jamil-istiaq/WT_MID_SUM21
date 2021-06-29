
<?php
 
    $name="";
    $err_name="";

    $email="";
    $err_email="";

    $pas="";
    $err_pass="";
    $char="'#','?'";
    $num="1,2,3,4,5,6,7,8,9,0";

    //$code="+880";
    $phn="";
    $err_phn="";

    $nid="";
    $err_nid="";

    $adrs="";
    $err_adrs="";

    $opsn="";
    $err_opsn="";

    $health="";

    $gender="";
    $err_gender="";

    
    $marray=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    $month="";
    $err_month="";

    $bdate="";
    $date = array();
    foreach(range(1, 31) as $i) {
    $date[] = "$i";}
    $err_date="";

    $year = array();
        foreach(range(1960, 2021) as $i) {
    $byear[] = "$i";}  
    $year="";
    $err_year="";

    $bgroup=array("A(+ve)","A(-ve)","B(+ve)","B(-ve)","O(+ve)","O(-ve)","AB(+ve)","AB(-ve)");
    $blood_group="";
    $err_blood_group="";

 $hasError=false;
 
 if(isset($_POST["submit"])){

    if(empty($_POST["name"])){
        $hasError = true;
        $err_name="Name required";
    }
    elseif((is_numeric($_POST["name"])==true)){
        $hasError = true;
        $err_name="Number not allowed";
    }

    else{
        htmlspecialchars($_POST["name"]);
			$name = $_POST["name"];
    }

    if(empty($_POST["email"])){
        $hasError = true;
        $err_email="Email Required";
    }

    else if (!stristr($_POST["email"],"@") and !stristr($_POST["email"],".")){
        $hasError = true;
        $err_email="Put Correct Email address";
    }
    else{
        htmlspecialchars($_POST["email"]);
        $email = $_POST["email"];
    }

    if(empty($_POST["password"])){
        $hasError = true;
        $err_pass="Password Required";
    }
    else if(strlen($_POST["password"]) <= 5){
        $hasError = true;
        $err_pass="Password must contain Five character";
    }
    else if(strpos($_POST["password"],$char)!==false){
        $hasError = true;
        $err_pass="Password must contain '#' or '?'";
    }
    else if((ctype_upper($_POST["password"]))==true){
        $hasError = true;
        $err_pass="Password must contain one Uppercase";
    }
    else if((ctype_lower($_POST["password"]))==true){
        $hasError = true;
        $err_pass="Password must contain one Lowercase";
    }
    else if(strpos($_POST["password"],$num)!==false){
        $hasError = true;
        $err_pass="Password must contain one Number";
    }
    
    else{
        htmlspecialchars($_POST["password"]);
        $pas = $_POST["password"];
    }

    if(empty($_POST["phn"])){
        $hasError = true;
        $err_phn="Phone number Required";
    }
    else if((strlen($_POST["phn"]))!== 11){
        $hasError = true;
        $err_phn="Enter correct 11 digit phone number";

    }
    elseif((is_numeric($_POST["phn"])==false)){
        $hasError = true;
        $err_phn="Only Number allowed";
    }
    else{
        htmlspecialchars($_POST["phn"]);
        $phn = $_POST["phn"];
    }

    if(empty($_POST["nid"])){
        $hasError = true;
        $err_nid="NID Required";
    }
    else if((strlen($_POST["nid"])!== 13)){
        $hasError = true;
        $err_nid="Enter correct 13 digit NID number";

    }
    elseif((is_numeric($_POST["nid"])==false)){
        $hasError = true;
        $err_nid="Only Number allowed";
    }
    else{
        htmlspecialchars($_POST["nid"]);
        $nid = $_POST["nid"];
    }
    

    if(empty($_POST["adrs"])){
        $hasError = true;
        $err_adrs="Address required";
    }

    else{
        htmlspecialchars($_POST["adrs"]);
			$adrs = $_POST["adrs"];
    }

    if (!isset($_POST["day"])){
        $hasError = true;
        $err_date="Day Required";
    }
    else{
        htmlspecialchars($_POST["day"]);
        $bdate = $_POST["day"];
    }

    if (!isset($_POST["month"])){
        $hasError = true;
        $err_month="Month Required";
    }
    else{
        htmlspecialchars($_POST["month"]);
        $month = $_POST["month"];
    }

    if (!isset($_POST["year"])){
        $hasError = true;
        $err_year="Year Required";
    }
    else{
        htmlspecialchars($_POST["year"]);
        $year = $_POST["year"];
    }

    if (!isset($_POST["group"])){
        $hasError = true;
        $err_blood_group="Blood Group Required";
    }
    else{
        htmlspecialchars($_POST["group"]);
        $blood_group = $_POST["group"];
    }

    if(!isset($_POST["gender"])){
        $hasError = true;
        $err_gender="Gender Required";
    }
    else{
        htmlspecialchars($_POST["gender"]);
        $gender = $_POST["gender"];
    }

    if(empty($_POST["opsn"])){
        $hasError = true;
        $err_opsn="Occupation required";
    }

    else{
        htmlspecialchars($_POST["opsn"]);
			$opsn = $_POST["opsn"];
    }

    ////////
    if(empty($_POST["health"])){
        $hasError = false;  
        htmlspecialchars($_POST["health"]);
		$health = $_POST["health"];
    }

    if(($hasError)!==true){
        echo "<h1>Submitted Info</h1>";
        echo $_POST["name"]."<br>";
        echo $_POST["email"]."<br>";
        echo $_POST["password"]."<br>";
        echo $_POST["phn"]."<br>";
        echo $_POST["nid"]."<br>";
        echo $_POST["adrs"]."<br>";
        //echo $_POST["day"]."";
        //echo $_POST["month"]."";
        //echo $_POST["year"]."";
        //echo $_POST["group"]."br";
        //echo $_POST["gender"]."br";
        echo $_POST["opsn"]."<br>";
        echo $_POST["health"]."<br>";
    }
}

    
    

 
 

?>

<html>
	    <head></head>
    <body>
            <form action="" method="post">
                <fieldset>
                    <h1><b>User Sign Up</b></h1>
                <table align="center">	
                    <tr>    	
                        <td>
                            Name
                        </td>
                        <td>
                            :<input type="text" name="name" value="<?php echo $name;?>"  placeholder="Enter full name">
                        </td>
                        <td>
                        <span><?php echo $err_name;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            :<input type="text" name="email" value="<?php echo $email;?>" placeholder="Enter a valid email">
                        </td>
                        <td>
                        <span><?php echo $err_email;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            Password
                        </td>
                        <td>
                            :<input type="password" name="password" value="<?php echo $pas;?>" placeholder="Enter password">
                        </td>
                        <td>
                        <span><?php echo $err_pass;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Phone Number
                        </td>
                        <td>
                            :<input type="text" name="phn" value="<?php echo $phn;?>" placeholder="Valid phone number">
                        </td>
                        <td>
                        <span><?php echo $err_phn;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            National ID
                        </td>
                        <td>
                            :<input type="text" name="nid" value="<?php echo $nid;?>" placeholder=" 13 digit number">
                        </td>
                        <td>
                        <span><?php echo $err_nid;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Address
                        </td>
                        <td>
                            :<textarea name="adrs" value="<?php echo $adrs?>" placeholder="Enter full address"></textarea>
                        </td>
                        <td>
                        <span><?php echo $err_adrs;?></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Date of Birth
                        </td>
                        <td>
                            :<select name="day">
                                <option disabled selected >Day</option>
                                <option>
                                    <?php
                                    foreach($date as $d){
                                    if($d == $bdate) 
                                        echo "<option selected>$d</option>";
                                    else
                                        echo "<option>$d</option>";
                                    }
                                    ?>   
                                </option>
                            </select>
                        
                            <select name="month">
                                <option disabled selected >Month</option>
                                <option>
                                    <?php
                                    foreach($marray as $m){
                                    if($m == $month) 
                                        echo "<option selected>$m</option>";
                                    else
                                        echo "<option>$m</option>";
                                    }
                                    ?>
                                </option>
                            </select>

                            <select name="year">
                                <option disabled selected >Year</option>
                                <option>
                                <?php
                                    foreach($byear as $y){
                                    if($y == $year) 
                                        echo "<option selected>$y</option>";
                                    else
                                        echo "<option>$y</option>";
                                    }
                                    ?>  
                                </option>
                            </select>
                        </td>
                        <td>
                        <span> <?php echo $err_date;?> </span>
                        <span> <?php echo $err_month;?> </span>
                        <span> <?php echo $err_year;?> </span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Blood Group
                        </td>
                        <td>
                            :<select name="group">
                                <option disabled selected>Select Blood Group</option>
                                <option>
                                <?php
                                    foreach($bgroup as $b){
                                    if($b == $blood_group) 
                                        echo "<option selected>$b</option>";
                                    else
                                        echo "<option>$b</option>";
                                    }
                                    ?>
                                </option>
                            </select>
                        </td>
                        <td>
                        <span> <?php echo $err_blood_group;?> </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gender
                        </td>
                        <td>
                            :<input type="radio" value="Male" <?php if($gender=="Male") echo "checked"; ?> name="gender">Male
                            <input type="radio"  value="Female" <?php if($gender=="Female") echo "checked"; ?> name="gender">Female
                        </td>
                        <td>
                            <span> <?php echo $err_gender;?> </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Occupation
                        </td>
                        <td>
                            :<input type="text" name="opsn" value="<?php echo $opsn;?>" placeholder="Enter occupation">
                        </td>
                        <td>
                        <span><?php echo $err_opsn;?></span>
                        </td>
                    </tr>

                    
                    <tr>
                        <td>
                            Majore health Issue<br>
                            (if any)
                        </td>
                        <td>
                            :<textarea name="health" value="<?php echo $health?>" placeholder="Mention if any"></textarea>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td> 
                        <input type="submit" name="submit" value = "Submit">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>