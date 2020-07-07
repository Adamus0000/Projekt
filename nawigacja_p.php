
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<header>

    <nav class="navbar bg-secondary navbar-dark navbar-expand-md navbar-default">

        <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#namemenu" aria-controls="namemenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="namemenu">
            <a class="navbar-brand" href="dane_i_formularz.php">Strona główna</a>
            <!--<ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"> HELO </a>
                </li>


                <li class="nav-item-dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="tree"> Lista </a>

                    <div class="dropdown-menu bg-primary" aria-labelledby="submenu">
                        <a class="dropdown-item nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="">hahaha</a>
                        <div class="dropdown-menu bg-primary" aria-labelledby="submenu">  <a class="dropdown-item nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">hahaha</a>

                            <div class="dropdown-menu bg-primary" aria-labelledby="submenu">
                                <a class="dropdown-item nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">haxdddddddd</a>
                            </div>


                        </div>
                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="opis.php"> xD </a>
                </li>-->
                <div class="navbar-default navbar-fixed-top" role="navigation">

                            <ul class="nav navbar-nav">
                                <?php listabar($tab) ?>

                            </ul>

                </div>
            </ul>
            <!--<div class="navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <?php /*listabar($tab) */?>

                        </ul>
                    </div>
                </div>
            </div>-->

        </div>

        <div class="btn-group" >
        <ul class=" navbar-nav navbar-right "><?php
            if(isset($_SESSION['wybor']) && $_SESSION['wybor']!=5){

            ?>
            <div class=" collapse navbar-collapse"  >
                <li class="nav-item dropdown" >
                    <a class=" dropdown-toggle navbar-brand" href="#" data-toggle="dropdown" data-target="#nameme" >Menu </a>
                    <div class="dropdown-menu dropdown-menu-right bg-secondary" id="nameme" >
                        <a class="dropdown-item bg-secondary" style="color: white" href="profil.php"> Mój profil</a>
                        <?php if($_SESSION['wybor']==1) {?><a class="dropdown-item bg-secondary" style="color: white" href="grups.php"> Zarządzaj grupami</a><?php } ?>
                        <a class="dropdown-item bg-secondary" style="color: white" href="logout.php"> Wyloguj Się</a></li>

                    </div>

                </li>
            </div>

<!--
                <a class="navbar-brand" href="profil.php" style="color: white;">Witaj <?php /*echo $_SESSION['username'] */?></a>



                <a class="navbar-brand" href="logout.php"> Wyloguj Się</a></li>-->
                <?php } else {?>

            <div class="btn-group">
            <a class=" navbar-brand" href="login.php"> Zaloguj się / Zarejestruj się</a></div><?php }; ?>

        </ul>
        </div>
    </nav>


</header>

