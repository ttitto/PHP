<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV Generator</title>
    <script src="js/CVGenerator.js" type="text/javascript"></script>
</head>
<body>
<?php
//define and initialize variables with empty values
$fname = $lname = $email = $phone = $gender = $b_date = $nationality = "";
$err_fname = $err_lname = $err_email = $err_phone = $err_gender = $err_b_date = $err_nationality = "";
$last_company = $l_comp_begin = $l_comp_end = "";
$err_last_company = $err_l_comp_begin = $err_l_comp_end = "";
$driver_B = $driver_A = $driver_C = "";

if($_SERVER['REQUEST_METHOD']=="POST"){

    if(empty($_POST['fname'])){
        $err_fname="First name field is required. ";

    }else{
        $fname=secure_input($_POST['fname']);
        if(strlen($fname)<2 || strlen($fname)>20 ){
            $err_fname.="First name field must have 2 to 20 characters. ";
        }
        if(!preg_match("/^[a-zA-Z]*$/",$fname)){
            $err_fname.="First name field must contain only letters! ";
        }
    }

    if(empty($_POST['lname'])){
        $err_lname="Last name field is required.";
    } else{
        $lname=secure_input($_POST['lname']);
        if(strlen($lname)<2 || strlen($lname)>20){
            $err_lname.="Last name field must have 2 to 20 characters. ";
        }
        if(!preg_match("/^[a-zA-Z]*$/",$lname)){
            $err_lname.="Last name field must contain only letters! ";
        }
    }

    if(!empty($_POST['email'])){
        $email=secure_input($_POST['email']);
        if(!preg_match("/^[a-zA-Z0-9]*@[a-zA-Z0-9]*\.[a-zA-Z]*$/",$email)){
            $err_email.="Email field must contain only letters and numbers, only one @ and only one point(.). ";
        }
    }

    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
        if(!preg_match("/^[0-9\+\- ]*$/",$phone)){
            $err_phone.="Phone number must contain only digits, '+', '-' and space. ";
        }
    }

    if(isset($_POST['gender'])){
        $gender=$_POST['gender'];
    }

    if(isset($_POST['b-date'])){
        $b_date=$_POST['b-date'];
    }

    if(isset($_POST['nationality'])){
        $nationality=$_POST['nationality'];
    }

    if(!empty($_POST['company'])){
        $last_company=$_POST['company'];
        if(strlen($last_company)<2 || strlen($last_company)>20){
            $err_last_company.="Company name must contain from 2 to 20 characters! ";
        }
        if(!preg_match("/^[a-zA-Z0-9 ]*$/",$last_company)){
            $err_last_company.="Company name must contain only numbers and letters! ";
        }

    }

    if(!empty($_POST['l-comp-begin'])){
        $l_comp_begin=$_POST['l-comp-begin'];
    }
    if(!empty($_POST['l-comp-end'])){
        $l_comp_end=$_POST['l-comp-end'];
    }

    if(isset($_POST['driver-B'])){
        $driver_B=$_POST['driver-B'];
    }
    if(isset($_POST['driver-A'])){
        $driver_A=$_POST['driver-A'];
    }
    if(isset($_POST['driver-C'])){
        $driver_C=$_POST['driver-C'];
    }

}


?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset id="pers-info">
        <legend>Personal Information</legend>
        <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo "$fname"; ?>"/>
        <span class="error"><?php echo "$err_fname";?></span><br/>
        <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo "$lname"; ?>"/>
        <span class="error"><?php echo "$err_lname";?></span><br/>
        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo "$email"; ?>"/>
        <span class="error"><?php echo "$err_email";?></span><br/>
        <input type="text" id="phone" name="phone" placeholder="Phone Number" value="<?php echo "$phone"; ?>"/>
        <span class="error"><?php echo "$err_phone";?></span><br/>
        <label for="female">Female</label>
        <input type="radio" id="female" name="gender" value="female" <?php if (isset($gender) && $gender == 'female') {
            echo "checked";
        }
        ?> />
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male" <?php if (isset($gender) && $gender == 'male') {
            echo "checked";
        } ?>/><br/>
        <label for="b-date">Birth Date</label><br/>
        <input type="date" id="b-date" name="b-date" value="<?php echo "$b_date"; ?>"/><br/>
        <label for="nationality">Nationality</label><br/>
        <select name="nationality" id="nationality">
            <option value="bg" <?php if (isset($nationality) && $nationality == "bg") echo "selected='selected'"; ?>
                >Bulgarian
            </option>
            <option value="usa" <?php if (isset($nationality) && $nationality == "usa") echo "selected='selected'"; ?>
                >USA
            </option>
            <option value="ru" <?php if (isset($nationality) && $nationality == "ru") echo "selected='selected'"; ?>
                >Russian
            </option>
        </select>
    </fieldset>
    <fieldset id="last-work">
        <legend>Last Work Position</legend>
        <label for="company">Company Name</label>
        <input type="text" id="company" name="company" value="<?php echo "$last_company" ?>"/>
        <span class="error"><?php echo $err_last_company;?></span> <br/>
        <label for="l-comp-begin">From</label>
        <input type="date" id="l-comp-begin" name="l-comp-begin" value="<?php echo $l_comp_begin; ?>"/><br/>
        <label for="l-comp-end">To</label>
        <input type="date" id="l-comp-end" name="l-comp-end" value="<?php echo $l_comp_end; ?>"/><br/>
    </fieldset>
    <fieldset id="it-skills">

        <legend>Computer skills</legend>
        <label for="prog-lang-0">Programming Languages</label>

        <div id="prog-langs">
            <input type="text" id="prog-lang-0" name="prog-lang[]" class="prog-lang-input"/>
            <select name="prog-lang-level[]" id="prog-lang-level-0" class="prog-lang-select">
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select><br/>
        </div>
        <input type="button" onclick="removeProgLanguage()" value="Remove Language"/>
        <input type="button" onclick="addProgLanguage()" value="Add Language"/>
    </fieldset>
    <fieldset id="other-skills">
        <legend>Other Skills</legend>
        <label for="lang-0">Languages</label>
        <div id="langs">

            <input type="text" id="lang-0" name="lang[]" class ="lang-input"/>
            <select name="lang-compr[]" id="lang-compr-0">
                <option disabled="disabled" selected="selected" hidden="hidden">-Comprehension-</option>
                <optgroup label="-Comprehension-">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </optgroup>
            </select>
            <select name="lang-read[]" id="lang-read-0">
                <option disabled="disabled" selected="selected" hidden="hidden">-Reading-</option>
                <optgroup label="-Reading-">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </optgroup>
            </select>
            <select name="lang-write[]" id="lang-write-0">
                <option disabled="disabled" selected="selected" hidden="hidden">-Writing-</option>
                <optgroup label="-Writing-">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </optgroup>
            </select><br/>
        </div>
        <input type="button" onclick="removeLanguage()" value="Remove Language"/>
        <input type="button" onclick="addLanguage()" value="Add Language"/><br/>

        <label for="driver-B">B</label>
        <input type="checkbox" id="driver-B" name="driver-B" value="B" <?php if (isset($driver_B) && $driver_B ==
            'B') {
            echo 'checked';
        } ?> />
        <label for="driver-A">A</label>
        <input type="checkbox" id="driver-A" name="driver-A" value="A" <?php if (isset($driver_A) && $driver_A ==
            'A') {
            echo 'checked';
        } ?> />
        <label for="driver-C">C</label>
        <input type="checkbox" id="driver-C" name="driver-C" value="C" <?php if (isset($driver_C) && $driver_C ==
            'C') {
            echo 'checked';
        } ?> />
    </fieldset>
    <input type="submit" value="Generate CV"/>
</form>
</body>
</html>
<?php



/** Secure the input against XSS attacks
 * @param $input
 * @return string
 */
function secure_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = stripcslashes($input);
    $input = htmlentities($input);
    return $input;
}

?>