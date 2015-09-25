<html>
    <head>
        <title>Reg</title>
        <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css">
    </head>
    <body>
        <div class="container ">
         <a href="/" class="btn btn-primary btn-sm active" role="button">Sign In</a>
         <a class="btn btn-default btn-sm active" role="button">Registration</a>
        </div>
 <form action="" method="post" class="col-xs-4">
             <div class="form-group">
              <label for="exampleInputFirstName">First Name</label>
              <input type="text" name="first_name" class="form-control " id="exampleInputfirstName" placeholder="Enter First Name">
            </div>
             <div class="form-group">
              <label for="exampleInputLastName">Last Name</label>
              <input type="text" name="last_name" class="form-control " id="exampleInputLastName" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control " id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" name="reg" class="btn btn-default">Submit</button>
            <p class="text-warning"><?php echo $this->error ?></p>
          </form>
    
    
    
    
    
    </body>
</html>