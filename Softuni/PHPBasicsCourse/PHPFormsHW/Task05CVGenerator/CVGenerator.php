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
$driver_lic = array();
$is_err = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['fname'])) {
        $err_fname = "First name field is required. ";
        $is_err = true;
    } else {
        $fname = secure_input($_POST['fname']);
        if (strlen($fname) < 2 || strlen($fname) > 20) {
            $err_fname .= "First name field must have 2 to 20 characters. ";
            $is_err = true;
        }
        if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
            $err_fname .= "First name field must contain only letters! ";
            $is_err = true;
        }
    }

    if (empty($_POST['lname'])) {
        $err_lname = "Last name field is required.";
        $is_err = true;
    } else {
        $lname = secure_input($_POST['lname']);
        if (strlen($lname) < 2 || strlen($lname) > 20) {
            $err_lname .= "Last name field must have 2 to 20 characters. ";
            $is_err = true;
        }
        if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
            $err_lname .= "Last name field must contain only letters! ";
            $is_err = true;
        }
    }

    if (!empty($_POST['email'])) {
        $email = secure_input($_POST['email']);
        if (!preg_match("/^[a-zA-Z0-9]*@[a-zA-Z0-9]*\.[a-zA-Z]*$/", $email)) {
            $err_email .= "Email field must contain only letters and numbers, only one @ and only one point(.). ";
            $is_err = true;
        }
    }

    if (!empty($_POST['phone'])) {
        $phone = secure_input($_POST['phone']);
        if (!preg_match("/^[0-9\+\- ]*$/", $phone)) {
            $err_phone .= "Phone number must contain only digits, '+', '-' and space. ";
            $is_err = true;
        }
    }

    if (isset($_POST['gender'])) {
        $gender = secure_input($_POST['gender']);
    }

    if (isset($_POST['b-date'])) {
        $b_date = secure_input($_POST['b-date']);
    }

    if (isset($_POST['nationality'])) {
        $nationality = secure_input($_POST['nationality']);
    }

    if (!empty($_POST['company'])) {
        $last_company = secure_input($_POST['company']);
        if (strlen($last_company) < 2 || strlen($last_company) > 20) {
            $err_last_company .= "Company name must contain from 2 to 20 characters! ";
            $is_err = true;
        }
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $last_company)) {
            $err_last_company .= "Company name must contain only numbers and letters! ";
            $is_err = true;
        }

    }

    if (!empty($_POST['l-comp-begin'])) {
        $l_comp_begin = secure_input($_POST['l-comp-begin']);
    }
    if (!empty($_POST['l-comp-end'])) {
        $l_comp_end = secure_input($_POST['l-comp-end']);
    }

    if (isset($_POST['driver-B'])) {
        $driver_B = secure_input($_POST['driver-B']);
        array_push($driver_lic, $driver_B);
    }
    if (isset($_POST['driver-A'])) {
        $driver_A = secure_input($_POST['driver-A']);
        array_push($driver_lic, $driver_A);
    }
    if (isset($_POST['driver-C'])) {
        $driver_C = secure_input($_POST['driver-C']);
        array_push($driver_lic, $driver_C);
    }

}


?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset id="pers-info">
        <legend>Personal Information</legend>
        <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo "$fname"; ?>"/>
        <span class="error"><?php echo "$err_fname"; ?></span><br/>
        <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo "$lname"; ?>"/>
        <span class="error"><?php echo "$err_lname"; ?></span><br/>
        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo "$email"; ?>"/>
        <span class="error"><?php echo "$err_email"; ?></span><br/>
        <input type="text" id="phone" name="phone" placeholder="Phone Number" value="<?php echo "$phone"; ?>"/>
        <span class="error"><?php echo "$err_phone"; ?></span><br/>
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
        <span class="error"><?php echo $err_last_company; ?></span> <br/>
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

            <input type="text" id="lang-0" name="lang[]" class="lang-input"/>
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
            'B'
        ) {
            echo 'checked';
        } ?> />
        <label for="driver-A">A</label>
        <input type="checkbox" id="driver-A" name="driver-A" value="A" <?php if (isset($driver_A) && $driver_A ==
            'A'
        ) {
            echo 'checked';
        } ?> />
        <label for="driver-C">C</label>
        <input type="checkbox" id="driver-C" name="driver-C" value="C" <?php if (isset($driver_C) && $driver_C ==
            'C'
        ) {
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

if (!$is_err === true) {
    ?>
    <table border="1">
        <thead>
        <tr>
            <th colspan="2">Personal Information</th>
        </tr>
        <tbody>
        <tr>
            <td>First Name</td>
            <td><?php echo $fname; ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $lname; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Phone number</td>
            <td><?php echo $phone; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $gender; ?></td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td><?php echo $b_date; ?></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><?php echo $nationality; ?></td>
        </tr>
        </tbody>
        </thead>
    </table>
    <br/>
    <table border="1">
        <thead>
        <tr>
            <th colspan="2">Last Work Position</th>
        </tr>
        <tr>
            <td> Company Name</td>
            <td><?php echo $last_company; ?></td>
        </tr>
        <tr>
            <td>From</td>
            <td><?php echo $l_comp_begin; ?></td>
        </tr>
        <tr>
            <td>To</td>
            <td><?php echo $l_comp_end; ?></td>
        </tr>
        </thead>
    </table>
    <br/>

    <table border="1">
        <thead>
        <tr>
            <th colspan="2">Computer Skills</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Programming Languages</td>
            <td>
                <table border="1">
                    <thead>
                    <tr>
                        <th>Language</th>
                        <th>Skill Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_POST['prog-lang'])) {
                        $prog_langs = $_POST['prog-lang'];
                        if ($prog_langs[0] !== "") {
                            $prog_lang_levels = $_POST['prog-lang-level'];
                            $cnt = 0;
                            foreach ($prog_langs as $prog_lang) {
                                echo "<tr><td>" . $prog_lang . "</td><td>" . $prog_lang_levels[$cnt] . "</td></tr>";
                                $cnt++;
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

    <table border="1">
        <thead>
        <tr>
            <th colspan="5">Other Skills</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Languages</td>
            <td colspan="4">
                <table border="1">
                    <thead>
                    <tr>
                        <th>Language</th>
                        <th>Comprehension</th>
                        <th>Reading</th>
                        <th>Writing</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_POST['lang'])) {
                        $langs = $_POST['lang'];
                        if ($langs[0] !== '') {
                            $lang_comprs = $_POST['lang-compr'];
                            $lang_reads = $_POST['lang-read'];
                            $lang_writes = $_POST['lang-write'];

                            $cnt = 0;
                            foreach ($langs as $lang) {
                                echo "<tr><td>" . $lang . "</td><td>" . $lang_comprs[$cnt]
                                    . "</td><td>" . $lang_reads[$cnt] . "</td><td>" . $lang_writes[$cnt]
                                    . "</td></tr>";
                                $cnt++;
                            }

                        }
                    }
                    ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>Driver's license</td>
            <td colspan="4"><?php echo implode(', ', $driver_lic); ?></td>
        </tr>
        </tbody>
    </table>
<?php
}

?>