<?php
// Mecanismo básico de rotas
$page = $_REQUEST['page'] ?? 'home'; // faz um isset na variável 'page'; caso ela exista, retorna-se ela; caso nao, retorna-se home

$pagesList = [
    'home' => 'home.php',
    'darksky' => 'data-integration-solcast-darksky.php',
    'solcast' => 'data-integration-solcast-darksky.php'
];

$pagesJavascriptsList = [
    'darksky' => 'darksky.js',
    'solcast' => 'darksky.js'
];

$pagesCssList = [
        'home' => 'home.css',
        'darksky' => 'data-integration-table.css',
        'solcast' => 'data-integration-table.css'
];

if (!isset($pagesList[$page])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semantic IoT</title>
    <meta name="description" content="Semantic IoT">
    <meta name="author" content="Jade">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <?php if(isset($pagesCssList[$page])) { ?>
            <link rel="stylesheet" href="css/<?php echo $pagesCssList[$page]; ?>"/>
        <?php } ?>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Semantic IoT</a>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="navbar-nav">
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                   data-toggle="dropdown">Data Sources</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?page=darksky">Dark Sky</a>
                    <a class="dropdown-item" href="index.php?page=solcast">Solcast</a>
                    <a class="dropdown-item" href="#">Open Weather</a>
                    <a class="dropdown-item" href="#">Weather Station</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Documentation</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Community</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Profile<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Settings<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <?php include('views/'.$pagesList[$page]); ?>

    <div class="row mt-5">
        <footer class="page-footer font-small">
            <div class="footer-copyright text-center py-3">
                <p>
                    <a class="btn" href="http://www.ufjf.br">Universidade Federal de Juiz de Fora</a>
                    <br>2019
                </p>

            </div>
        </footer>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<?php if(isset($pagesJavascriptsList[$page])) { ?>
    <script src="js/pages/<?php echo $pagesJavascriptsList[$page]; ?>"></script>
<?php } ?>



</body>
</html>