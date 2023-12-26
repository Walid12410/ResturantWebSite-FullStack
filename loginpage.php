<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Resturant</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
   <section class="login p-5 bg-light">
        <div class="container">
          <div class="row g-0 ">
            <div class="col-md-5">
               <img src="https://images.unsplash.com/photo-1489528792647-46ec39027556?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid"  alt="">
            </div>
            <div class="col-md-7 text-center p-5 ">
              <h1>Welcome To Our Resturant Site</h1>
              <form action="logincode.php" method="post">
                <div class="form-row py-3 pt-5">
                  <?php if(isset($_GET['error'])){?>
                   <p class="errors"><?php echo $_GET['error']; ?></p>
                  <?php }?>
                  <div class="offset-1 col-lg-10">
                    <input type="text" name="uname" class="inp px-3" placeholder="UserName">
                  </div> 
                  <div class="form-row pt-4">
                  <div class="offset-1 col-lg-10">
                    <input type="password" name="password" class="inp px-3" placeholder="Password">
                  </div>
                  <div class="form-row py-3">
                  <div class="offset-1 col-lg-10">
                    <button type="submit" class="btn1">Login</button>
                  </div>
                </div>
              </form>
              <p>New Account? <a href="signuppage.php" >SignUp</a></p>
            </div>
          </div>
        </div>
    </section>
  </body>
</html>