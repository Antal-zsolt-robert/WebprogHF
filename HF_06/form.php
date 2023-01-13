<?php
$firstNameErrorMessage = "";
$firstName = "";
$lastNameErrorMessage = "";
$lastName = "";
$emailErrorMessage = "";
$email = "";
$attendErrorMessage = "";
$fileErrorMessage = "";
$termsErrorMessage = "";
$valid_formats = array("application/pdf");
$valid = true;
if (isset($_POST['submit'])) {
    empty($_POST['firstName']) ? $firstNameErrorMessage = "First name is required!" : $firstName = $_POST['firstName'];
    empty($_POST['lastName']) ? $lastNameErrorMessage = "First name is required!" : $lastName = $_POST['lastName'];

    if(empty($_POST["email"])){
        $emailErrorMessage = "Email is required!";
    }
    else{
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErrorMessage = "Invalid email format!";
        }
        else{
            $email = $_POST["email"];
        }
    }
    if (empty($_POST['attend'])) {
        $valid = false;
        $attendErrorMessage = "Please select attend!";
    }
    if (!(isset($_POST['terms']))) {
        $valid = false;
        $termsErrorMessage = "Did not accept the terms and conditions!";
    }
    if(!($_FILES['abstract']['size'] > 3000000)) {
        $valid = false;
        $termsErrorMessage = "File size must be less than 3MB.";
    }
    if ($valid) {
        echo "<label class='result'>" . "First name: " . $_POST['firstName'] . "<label>" . "<br>";
        echo "<label class='result'>" . "Last name: " . $_POST['lastName'] . "<br>";
        echo "<label class='result'>" . "Email: " . $_POST['email'] . "<br>";
        echo "<label class='result'>Attend(s): <label>";
        foreach ($_POST['attend'] as $attend) {
            echo "<label class='result'>" . $attend . "<label>";
        }
        echo "<br>";
        if (isset($_POST['tshirt'])) {
            if ($_POST['tshirt'] == "P")
                echo "<label class='result'>" . "T-Shirt size: Not selected<label><br>";
            else
                echo "<label class='result'>" . "T-Shirt size: " . $_POST['tshirt'] . "<label>" . "<br>";
        }
    }
}
?>

<h3>Online conference registration</h3>

<form method="post" action="form.php">
    <label for="fname"> First name:
        <input type="text" name="firstName" value="<?php echo $firstName ?>">
    </label>
    <span class="error" style="color:red;">* <?php echo $firstNameErrorMessage; ?></span>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName" value="<?php echo $lastName ?>">
    </label>
    <span class="error" style="color:red;">* <?php echo $lastNameErrorMessage; ?></span>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email ?>">
    </label>
    <span class="error" style="color:red;">* <?php echo $emailErrorMessage; ?></span>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event 2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event 3<br>
        <input type="checkbox" name="attend[]" value="Event4">Event 4<br>
    </label>
    <label style="color:red;"><?php echo $attendErrorMessage; ?></label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <label style="color:red;"><?php echo $fileErrorMessage; ?></label>
    <br><br>
    <input type="checkbox" name="terms" value="1" <?php if (isset($_POST['terms'])) echo "checked='checked'"; ?>>I agree
    to terms & conditions.<br>
    <label style="color:red;"><?php echo $termsErrorMessage; ?></label>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>