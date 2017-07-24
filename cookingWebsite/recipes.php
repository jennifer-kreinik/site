 <?php
 include('config/init.php');
 echo echoCookingHeaderHtml("Recipes");
  $recipeTagName = $_REQUEST['recipeTagId'];
  if ($recipeTagName == 1){
      $styleChoice='tag1';
      echo echoRecipeLinkHtml($recipeTagName, $styleChoice);

  };
  if ($recipeTagName == 2){
      $styleChoice='tag2';
      echo echoRecipeLinkHtml($recipeTagName, $styleChoice);

  };
  if ($recipeTagName == 3){
      $styleChoice='tag3';
      echo echoRecipeLinkHtml($recipeTagName, $styleChoice);

  };
  if ($recipeTagName == 4){
      $styleChoice='tag4';
      echo echoRecipeLinkHtml($recipeTagName, $styleChoice);

  };
  if ($recipeTagName == 5){
      $styleChoice='tag5';
      echo echoRecipeLinkHtml($recipeTagName, $styleChoice);

  };
  if ($recipeTagName == 6){
      $styleChoice='tag6';
      echo echoRecipeLinkHtml($recipeTagName, $styleChoice);

  };
  if ($recipeTagName == 7){
      $styleChoice='tag7';
      echo echoRecipeLinkHtml($recipeTagName, $styleChoice);

  };
  if ($recipeTagName == 8){
      $styleChoice='tag8';
      echo echoALLRecipeLinkHtml($styleChoice);
  }

  ?>
</h2><br/></div>
