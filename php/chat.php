<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On débute avec Ajax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <section class="container">
        <div class="row mt-3">
            <div class="col-12">
                <form action="" method="POST">
                    <button class="btn btn-outline-dark" type="submit" name='action' value='logout' id="logout">Log
                        Out</button>
                </form>
            </div>
        </div>
        <div class="col-12 my-1 d-flex justify-content-center">
            <div class="p-2" id="discussion"></div>
        </div>



        <main class="row">
            <div class="col-12 saisie">
                <form method="POST">
                    <div class="input-group">

                        <input type="text" class="form-control" id="texte" placeholder="Entrez votre texte">
                        <input type="submit" id="valid">
                    </div>
                </form>
            </div>
            <div id="reponse"></div>
        </main>
    </section>
    <script type="text/javascript" src="../js/script.js"></script>
</body>
<?php
if (isset($_POST['action'])&&($_POST['action']=='logout')){
session_destroy();
header('location: ../index.php');
}
?>

</html>