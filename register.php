<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Register Now</h2>
    </div>

    <form method="post" action="register.php">
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="Fname" value="<?php echo $Fname; ?>">
        </div>
        <div class="input-group">
            <label>Last name</label>
            <input type="text" name="Lname" value="<?php echo $Lname; ?>">
        </div>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Age</label>
            <input type="number" name="age" value="<?php echo $age; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Contact Number</label>
            <input type="number" name="Contact_No" value="<?php echo $Contact_No; ?>">
        </div>

        <h4>Gender</h4>
        <div class="input-group">
            <table>
                <tr>
                    <th style="width: 200px;"></th>
                    <th style="width: 100px;"></th>
                </tr>
                <tr>
                    <td><label for="male">Male</label></td>
                    <td><input type="radio" name="gender" value="male" id="male" checked></td>
                </tr>
                <tr>
                    <td><label for="female">Female</label></td>
                    <td><input type="radio" name="gender" value="female" id="female"></td>
                </tr>
                <tr>
                    <td><label for="Prefer_not_to_say">Prefer not to say</label></td>
                    <td><input type="radio" name="gender" value="Prefer not to say" id="Prefer_not_to_say"></td>
                </tr>
            </table>
        </div>

        <h4>Type of the User</h4>
        <div class="input-group">
            <table>
                <tr>
                    <th style="width: 200px;"></th>
                    <th style="width: 100px;"></th>
                </tr>
                <tr>
                    <td><label for="Farmer">Farmer</label></td>
                    <td><input type="radio" name="Utype" value="Farmer" id="Farmer" checked></td>
                </tr>
                <tr>
                    <td><label for="fOfficer">Field Officer</label></td>
                    <td><input type="radio" name="Utype" value="Field Officer" id="fOfficer"></td>
                </tr>
            </table>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p class="endline">
            Already a member? <a href="login.php">Login in</a>
        </p>
    </form>

</body>

</html>