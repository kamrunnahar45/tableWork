<?php



function renderForm($first, $last, $error)

{

?>

<!DOCTYPE HTML>

<html>

<head>

<title>New Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<div>

<strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $first; ?>" /><br/>

<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $last; ?>" /><br/>



<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}









// connect to the database

include('connect-db.php');



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid

$firstname = $_POST['firstname'];

$lastname = $_POST['lastname'];



// check to make sure both fields are entered

if ($firstname == '' || $lastname == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($firstname, $lastname, $error);

}

else

{

// save the data to the database

mysqli_query($connection,"INSERT players SET firstname='$firstname', lastname='$lastname'");





// once saved, redirect back to the view page

header("Location: index.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','');

}

?>