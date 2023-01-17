<!DOCTYPE html>
<html lang="en">
<head>
<link rel='stylesheet' href='form-style.css' type='text/css' />
</head>
<body>
    <form action="{{route('verify.api',$user['id'])}}" method="POST">
        <div class="mail">
        <h2>Press Submit to verify email</h2>
        <li>&nbsp;</li>
        <li class="submit"><input type="submit" name="submit" value="Submit"></li>
    </div>
</form>
</body>
</html>
