<?php
  include 'resources/fragments/frag-nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Index TR</title>

  <?php require \tsrc\Util\Constants::INCOMMON_LINKS; ?>
  <link rel="stylesheet" type="text/css" href="../../resources/css/index.css" />

<!--  <script type="text/javascript"-->
<!--          src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<!--  <script type="text/javascript"-->
<!--          src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>-->



</head>
<body>

<div class="page-wrap">
  <div class="text-wrap">
    <header>
      <h1>Tasty Recipes</h1>
      <p>A place for recipes that are tasty</p>
    </header>

    <section>
      <div class="new-recipe">
        <h2>Pancake party!!!</h2>
        <p>Check out our latest recipe: Pancakes, a treat as breakfast
          , lunch, dinner, and anything in between!<br />
          <a href="Pancakes">Go to recipe for pancakes</a>!</p>
      </div>

      <div class="calendar-promo">
        <h2>Featuring planned eating</h2>
        <p>Struggling to decide what to eat on a daily basis, maybe you need some inspiration?
        Check out our calendar filled with the best Tasty Recipes has to offer!<br />
        <a href="Calendar">Go to calendar</a>!</p>
      </div>
      <figure><img src="../../resources/images/manyfood.jpg" alt="A cornucopia of delicious food" /> </figure>
    </section>
  </div>
</div>

</body>
</html>