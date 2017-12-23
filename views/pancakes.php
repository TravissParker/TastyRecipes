<?php
  include 'resources/fragments/frag-nav.php';
  include 'resources/function/func-reset-errors.php';
  include 'resources/function/func-fetch-xml.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tasty Recipes | Pancakes</title>

    <?php require \tsrc\Util\Constants::INCOMMON_LINKS; ?>
    <link rel="stylesheet" type="text/css" href="../../resources/css/recipe.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/css/comments.css" />
  
  

    <script type="text/javascript" src="../../../jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../../../knockout-3.4.2.js"></script>
    <script type="text/javascript" src="../../resources/jsscript/ViewModel.js"></script>

</head>
<body>
  <div class="page-wrap ">
    <div class="text-wrap">
      <header>
        <h2>
          <?php getTitle(1) ?>
        </h2>
      </header>
      <figure class="figure-dish">
        <img src="../../resources/images/img_pancakes.jpg" alt="Delicious pancakes" />
        <figcaption>Fresh pancakes served with berries and cream.</figcaption>
      </figure>
      <section class="description">
        <p>
            <?php getDescription(1) ?>
        </p>
      </section>
      <section>
        <h3>Ingredients</h3>
        <ul>
            <?php getIngredients(1) ?>
        </ul>
      </section>
      <section id="instructions">
          <h3>Instructions</h3>
          <ol>
              <?php getInstructions(1) ?>
          </ol>
      </section>
      </div>

<!--    //Fixme: is comment content binded with html that is formated in css?-->
    <div id="comment-include">
    <?php include 'resources/fragments/frag-comment-section.php' ?>
    </div>



</div>
</body>
</html>