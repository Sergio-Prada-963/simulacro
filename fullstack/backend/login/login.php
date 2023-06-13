<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="cajaLogin">
        <div class="welcome">
            <h2>Bienvenid@ al Login</h2>
        </div>
        <form action="ingresar.php" method="post">
            <div class="login">
                <label for="usuario">Nombre Usuario...</label>
                <input type="text" placeholder="Usuario" name="userName">
                <label for="contraseña">Contraseña...</label>
                <input type="password" placeholder="Contraseña" name="contraseña">
            </div>
            <div class="botones">
                <button type="submit" class="btn btn-secondary" name="ingresar">Ingresa</button>
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Registrate</button>
            </div>
        </form>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: #d0a9ff54;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Nuevo Usuario</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="registrar.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Registre su email <i class="bi bi-envelope-at withe"></i></label>
                    <input type="email" class="form-control" placeholder="email" style="background-color: transparent;" name="email">
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Nueva Cotraseña</label>
                    <input type="password" class="form-control" id="contraseña" placeholder="contraseña" style="background-color: transparent;" name="contraseña">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="userName" >Nombre de Usuario</label>
                    <input type="text" class="form-control" id="userName" placeholder="nombre usuario" style="background-color: transparent;" name="userName">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>