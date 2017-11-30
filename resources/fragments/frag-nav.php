<?php
//  session_start(); //Nav is the first thing on each page.
?>

<div id="top-wrap">
  <nav>
    <?php include 'frag-signin-notifier.php' ?>
    <ul>
      <li><a href="FirstPage">Index</a></li>
      <li><a href="Calendar">Calendar</a></li>
      <li><a href="Meatballs">Meatballs</a></li>
      <li><a href="Pancakes">Pancakes</a></li>
    </ul>
    <div class="dropdown">
      <button class="dropbtn">Navigation</button>
      <div class="dropdown-content">
        <a href="FirstPage">Index</a>
        <a href="Calendar">Calendar</a>
        <a href="Meatballs">Meatballs</a>
        <a href="Pancakes">Pancakes</a>
      </div>
    </div>
  </nav>
</div>