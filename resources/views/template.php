<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$data['title'] ?></title>
    <meta name="description" content="<?=$data['description']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <!--[if lt IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]--> 
    <header>
        <?= $this->insert('inc/header', ['data' => $data]) ?>
    </header>
    <main class="page-body">
        <div class="container">
            <?=$this->section('content')?>
        </div><!-- /.container -->
    </main>
    <footer class="page-footer">
        <div class="container">
            <?= $this->insert('inc/footer') ?>
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
