<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet"
          type="text/css"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<!-- Przycisk uruchamiający modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#przykladowyModal3">
    Wyświetl modal
</button>
<!-- END Przycisk uruchamiający modal -->

<div class="modal" id="przykladowyModal3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="login-box">

                        <div class="row">

                            <div class="col-md-12 login-left">
            <span style='color: white'>
            <h2 style="color: black">Logowanie</h2>
            <form action="validation.php" method="post">
                <div class="form-group ">
                    <label style="color: black">Login</label>
                    <p class="text-primary"><input id="formularz" type="text" name="user" class="form-control" required></p>
                </div>
                <div class="form-group">
                    <label style="color: black">Hasło</label>
                    <p class="text-primary"> <input type="password" name="password" class="form-control" required></p>
                </div>
                <button type="submit" class="btn btn-primary">Zaloguj się</button>


            </form>
</span>
                            </div>



                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


</body>
</html>