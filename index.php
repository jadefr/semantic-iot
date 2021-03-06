<?php
// Mecanismo básico de rotas
$page = $_REQUEST['page'] ?? 'home'; // faz um isset na variável 'page'; caso ela exista, retorna-se ela; caso nao, retorna-se home

$pagesList = [
    'home' => 'home.php',
    'data-integration' => 'data-integration-table.php',
    'community' => 'community.php',
    'data-sources' => 'data-sources.php',
    'documentation' => 'documentation.php',
    'get-started' => 'get-started.php',
];

$pagesJavascriptsList = [
    'data-integration' => 'data-integration-table.js',
    'home' => 'home.js',
    'get-started' => 'get-started.js'
];

$pagesCssList = [
    'home' => 'home.css',
    'data-integration' => 'data-integration-table.css',
    'community' => 'community.css',
    'data-sources' => 'data-sources.css',
    'documentation' => 'documentation.css',
    'get-started' => 'get-started.css'
];

$contentList = [
    'home' => "Semantic IoT",
    'community' => "Community",
    'documentation' => "Documentation",
    'data-sources' => "Data Sources",
    'get-started' => "Get Started",
    'data-integration' => "Data Integration"
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
    <!--title>Semantic IoT</title-->

    <?php if (isset($pagesCssList[$page])) { ?>
        <title><?php echo $contentList[$page]; ?></title>
    <?php } ?>

    <meta name="description" content="Semantic IoT">
    <meta name="author" content="Jade">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">

    <?php if (isset($pagesCssList[$page])) { ?>
        <link rel="stylesheet" href="css/<?php echo $pagesCssList[$page]; ?>"/>
    <?php } ?>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">Semantic IoT</a>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=data-sources">Data Sources</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=documentation">Documentation</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=community">Community</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <?php include('views/' . $pagesList[$page]); ?>
</div>

<footer class="page-footer font-small">
    <div class="footer-inner">
        <div class="footer-copyright text-center">
            <p class="m-0">
                <a class="btn" href="http://www.ufjf.br">Universidade Federal de Juiz de Fora</a>
                <br>2019
            </p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<?php if (isset($pagesJavascriptsList[$page])) { ?>
    <script src="js/pages/<?php echo $pagesJavascriptsList[$page]; ?>"></script>
<?php } ?>


</body>
</html>