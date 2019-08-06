<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- the above "meta" tags always comes first in html, the rest follow -->

      <!-- Favicon -->
      <link rel="shortcut icon" href="" type="image/x-icon"/>
    
      <title><?= $this->siteTitle(); ?></title>
      <!-- Below are the CSS Links (Bootstrap css) -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
      <!-- Bootstrap core CSS -->
      <link type="text/css" href="<?=PROOT?>css/bootstrap.min.css" rel="stylesheet">
      <!-- Material Design Bootstrap -->
      <link type="text/css" href="<?=PROOT?>css/mdb.min.css" rel="stylesheet">
      <!-- Your custom styles (optional) -->
      <link type="text/css" href="<?=PROOT?>css/style.css" rel="stylesheet">
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

      <?= $this->content('head'); ?>
  </head>
  <body>
<!--    --><?php //include 'main_menu.php'?>
    <div class="space" style="min-height: 75px;"></div>
    <div class="container-fluid" style="min-height:85%;">
      <?= $this->content('body'); ?>
    <?= $this->content('source'); ?>
        <!-- SCRIPTS -->

        <!-- JQuery -->
        <script type="text/javascript" src="<?=PROOT?>js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="<?=PROOT?>js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?=PROOT?>js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="<?=PROOT?>js/mdb.min.js"></script>
  </body>
</html>