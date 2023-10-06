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
  <div class="main-login">
    <div class="left-login">
      <img class="left-image" src="./view/img/Forgot password-rafiki.png" alt="tela-login">
    </div>
    <div class="rigth-login">
        <h1>Lab-Controller</h1>
        <form  class="card-login" action="model/buttonActions.php" method="POST">
          <h1>LOGIN</h1>
          <div class="textfield">
            <input type="text" name="username" aria-describedby="emailHelp"
                placeholder="Usuário" required>
          </div>
          <div class="textfield">
            <input type="password" name="password" placeholder="Senha" required>
          </div>
          <button class="btn-login" type="submit" name="login">Login</button>
        </form>
    </div>
  </div>














  <!-- <div>
      <div>
        <div>
          <form action="model/buttonActions.php" method="POST">
            <div>
              <input type="text" name="username" aria-describedby="emailHelp"
                placeholder="Usuário" required>
            </div>
            <div>
              <input type="password" name="password" placeholder="Senha" required>
            </div>
            <div>
              <button type="submit" name="login">Login</button>
            </div> 
          </form>
        </div>

      </div>
  </div> -->
<!--    <form action="model/buttonActions.php" method="POST">
        <input type="text" name="username" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="submit" name="login" value="Entrar">
    </form>

-->
</body>
</html>