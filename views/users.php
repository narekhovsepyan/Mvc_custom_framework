<html>
    <head>
        <title>LogIn</title>
        <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
             <a class="btn btn-default btn-sm active" role="button">Sign In</a>
            <a href="auth/reg" class="btn btn-primary btn-sm active" role="button">Registration</a>
        </div>  

        <form action="" method="post" class="col-xs-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control " id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" name="sign_in" class="btn btn-default">Sign In</button>
            <p class="text-warning"><?php echo $this->error ?></p>
          </form>

    </body>
</html>