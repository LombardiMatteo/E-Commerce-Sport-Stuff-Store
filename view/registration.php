<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="registration.css">   
    </head>
    <body>
        <?php include('header.php'); ?>

        <div class="background">
            <div class="form-container">
                <h1>Registration Form</h1>

                <form enctype="multipart/form-data" id="registrationForm">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" pattern="^[a-zA-Z]+$" title="Must contain only alphabetic characters!">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" pattern="^[a-zA-Z]+$" title="Must contain only alphabetic characters!">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender">
                            <option value="no_gender">No Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" pattern="^[0-9]{10}$" title="Must contain 10 digits!">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
                        <label for="re_password">Retype Password</label>
                        <input type="password" id="re_password" name="re_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>
                    <div class="form-group">
                        <label for="question">Security Question</label> 
                        <select name="question" id="question">
                            <option value="">Question...</option>
                            <option>What is the name of your imaginary friend as a child?</option>
                            <option>What's the name of your first love?</option>
                            <option>What is the first exam you passed?</option>
                            <option>What is your favourite color?</option>
                            <option>What is your favourite fruit?</option>
                        </select> 
                        <input type="text" id="answer" name="answer" placeholder="Answer">
                    </div>
                    <button type="submit" name="submit">Register</button>
                    <!-- Errors -->                
                    <p class="err" id="pswdError" hidden>Passwords do not match!</p>
                    <p class="err" id="eMailUsedYet" hidden>Email not available!</p>
                    <p class="err" id="usernameUsedYet" hidden>Username not available!</p>
                    <p class="err" id="noData" hidden>You must fill in all fields!</p>
                </form>
            </div>
        </div>

        <script src="registration.js"></script>

        <?php include('footer.php'); ?>
    </body>
</html>