<?php
    session_start();
    require_once("session.php");

    require_once("config.php");
    require_once("functions/globals.php");

    req("functions", "backendLive");
    req("functions", "login");

    req("html-factories", "LinkFactory");
    req("html-factories", "CardFactory");
    req("html-factories", "BoxFactory");
    req("html-factories", "FormFactory");

?>
<!doctype html>
    <html lang="se">
        <head>
            <meta charset="utf-8"/>
            <link rel="shortcut icon" href="favicon.ico"/>
            <meta name="viewport" content="width=device-width,initial-scale=1"/>
            <meta name="theme-color" content="#000000"/>
            <meta name="description" content="BOSTR Admin tools"/>
            <title>BOSTR Admin</title>

            <!-- Bootstrap -->
            <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
            <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cyborg/bootstrap.min.css" rel="stylesheet" integrity="sha384-mtS696VnV9qeIoC8w/PrPoRzJ5gwydRVn0oQ9b+RJOPxE1Z1jXuuJcyeNxvNZhdx" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            <!-- Font Awesome -->
            <script src="https://kit.fontawesome.com/b762ab48ab.js" crossorigin="anonymous"></script>

            <!-- Mina stilmallar och Materialize overrides -->
            <link rel="stylesheet" href="styles.css">


        </head>
        <body>
            <div id="app">
                <?php incV("aside"); ?>
                <main>
                    <header>

                    </header>

                    <article>
                    <?php include("routing.php"); ?>
                    </article>

                    <footer class="page-footer">
                        <?php incV("debug"); ?>
                    </footer>

                </main>
            </div>
        </body>
</html>