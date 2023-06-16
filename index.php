<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./view/style/login.css">

</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card my-5">

          <form action="model/buttonActions.php" method="POST" class="card-body cardbody-color p-lg-3">

            <div class="text-center">
              <img src="./view/img/Login-amico.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" name="username" aria-describedby="emailHelp"
                placeholder="Usuário" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password" placeholder="Senha" required>
            </div>
            <div class="text-center"><button type="submit" name="login" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
              Registered? <a href="#" class="text-dark fw-bold"> Create an
                Account</a>
            </div> 
          </form>
        </div>

      </div>
    </div>
  </div>
<!--    <form action="model/buttonActions.php" method="POST">
        <input type="text" name="username" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="submit" name="login" value="Entrar">
    </form>

-->
</body>
</html>