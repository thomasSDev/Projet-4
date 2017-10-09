<?php
$urlUri = $_SERVER['REQUEST_URI'];  
?>
<!DOCTYPE html>
<html>
    <head>
    <?php include_once("head.php");?>
    </head>

    <body>
        <div id="container">
            <header id="header" class="row">
                <?php include_once("header.php");  ?>
            </header>


            <div id="wrap">
                <div id="content-wrap">
                  <section id="main" class="row">
                    <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

                    <?= $content ?>
                  </section>
                </div>
            </div>  

            <footer>
                <?php include_once("footer.php"); ?>
            </footer>
        </div>
    </body>

</html>