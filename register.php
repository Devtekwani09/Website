<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>registration</title>
</head>
<body>
  <div class="con">
    <div class="container">
        <h3 style="color: white;">Registration form</h3>
        <p style="color: white;">Enter your details</p>

        <form action="reg.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="username" id="username" placeholder="enter username">
            <input type="text" name="email" id="email" placeholder="enter your email">
            <input type="password" name="password" id="password" placeholder="enter password">
            <button type = "Submit" class="btn">register</button>
            <button><a href="login.html"> login</a></button>
        </form>
    </div>
    
    </div>
</body>
</html>