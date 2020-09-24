<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/donor/css/style.css">
    <title>Donor Login</title>
</head>

<body>
    <div class="wrapper">
        <center>
            <form method="post" name="myForm" class="form-signin" onsubmit="return validateForm()" action="../php/SignupController.php" enctype="multipart/form-data">
                <h2 class="form-signin-heading">Registration Panel</h2>
                <input type="text" class="form-control" name="fullname" placeholder="Full Name" autofocus="" /><br>
                <h5 id="nameMsg"></h5>
                <input type="email" class="form-control" name="email" placeholder="Email" />
                <h6></h6>
                <input type="text" class="form-control" name="address" placeholder="Address" />
                <h6></h6>
                <input type="text" class="form-control" name="phoneno" placeholder="Phone No" />
                <h6></h6>
                <input type="password" class="form-control" name="password" placeholder="Password" />
                <h6 id="passMsg"></h6>
                <button style="display:block;width:231px; height:30px; margin-bottom: 20px; font-size: 16px; border: 1px solid; background: transparent;" onclick="document.getElementById('getFile').click()">Select Profile picture</button>
                <input type='file' class="form-control" name="photo" id="getFile" style="display:none">
                <div class="custom-select">
                    <select name="type" class="form-control" style="width:231px;font-size: 16px; height:41px;">
                        <option name="type" value="raiser">Fund Raiser</option>
                        <option name="type" value="donor">Fund Donor</option>
                        <option name="type" value="admin">Admin</option>
                    </select>
                </div><br>
                <button class=" myButton" name="submit" type="submit">Registration</button>
            </form>
        </center>
    </div>
</body>
<script type="text/javascript">
    function validName(x) {
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }
        if (x.length < 2) {
            alert("Name has to be at least 2 characters");
            return false;
        }
    }

    function validEmail(x) {
        if (x.indexOf('@') == -1) {
            alert("Not a valid email");
            return false;
        }
    }

    function validateForm() {
        var a = document.forms["myForm"]["fullname"].value;
        validName(a);
        var b = document.forms["myForm"]["email"].value;
        validEmail(b);
        var c = document.forms["myForm"]["address"].value;
        if (!c.length) {
            alert('You must enter your address');
            return false;
        }
        var e = document.forms["myForm"]["phoneno"].value;
        if (!e.length) {
            alert('You must enter your Contact number');
            return false;
        }
        var f = document.forms["myForm"]["password"].value;
        if (!f.length) {
            alert('You must enter your password');
            return false;
        }
        if (f.length < 4) {
            alert('Password must be more than 4 characters');
            return false;
        }
        var d = document.forms["myForm"].querySelector('input[type="file"]');
        if (d.value == '') {
            alert('You must select your profile picture');
            return false;
        }
    }
</script>

</html>