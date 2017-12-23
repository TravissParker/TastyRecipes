<?php
  include 'resources/fragments/frag-nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calendar</title>

  <?php require \tsrc\Util\Constants::INCOMMON_LINKS; ?>

  <link rel="stylesheet" type="text/css" href="../../resources/css/calendar.css" />
</head>
<body>
  <div class="page-wrap">
    <!--https://responsivedesign.is/patterns/calendar/-->
    <header class="month-label">
          <h3>November</h3>
    </header>
    <div id="calendar">
      <ul class="weekdays">
        <li>Mo</li>
        <li>Tu</li>
        <li>We</li>
        <li>Th</li>
        <li>Fr</li>
        <li>Sa</li>
        <li>Su</li>
      </ul>
      <!-- Row 1 -->
      <ul class="days">
        <li class="day other-month">
          <div class="date">30</div>
        </li>
        <li class="day other-month">
          <div class="date">31</div>
        </li>
        <li class="day"><div class="date">1</div></li>
        <li class="day"><div class="date">2</div></li>
        <li class="day"><div class="date">3</div></li>
        <li class="day"><div class="date">4</div></li>
        <li class="day"><div class="date">5</div></li>
      </ul>
      <!-- Row 2 -->
      <ul class="days">
        <li class="day"><div class="date">6</div></li>
        <li class="day"><div class="date">7</div></li>
        <li class="day"><div class="date">8</div></li>
        <li class="day"><div class="date">9</div></li>
        <li class="day"><div class="date">10</div></li>
        <li class="day"><div class="date">11</div>
          <a href="Meatballs">
            <img class="img-link" src="../../resources/images/img_meatballs.jpg" alt="Food of the day: meatballs"/>
          </a>
        </li>
        <li class="day"><div class="date">12</div></li>
      </ul>
      <!-- Row 3 -->
      <ul class="days">
        <li class="day">
          <div class="date">13</div>
        </li>
        <li class="day"><div class="date">14</div></li>
        <li class="day"><div class="date">15</div></li>
        <li class="day"><div class="date">16</div></li>
        <li class="day"><div class="date">17</div></li>
        <li class="day"><div class="date">18</div></li>
        <li class="day"><div class="date">19</div></li>
      </ul>
      <!-- Row 4 -->
      <ul class="days">
        <li class="day"><div class="date">20</div></li>
        <li class="day"><div class="date">21</div>
          <a href="Pancakes">
            <img class="img-link" src="../../resources/images/img_pancakes.jpg" alt="Food of the day: pancakes"/>
          </a>
        </li>
        <li class="day"><div class="date">22</div></li>
        <li class="day"><div class="date">23</div></li>
        <li class="day"><div class="date">24</div></li>
        <li class="day"><div class="date">25</div></li>
        <li class="day"><div class="date">26</div></li>
      </ul>
      <!-- Row 5 -->
      <ul class="days">
        <li class="day"><div class="date">27</div></li>
        <li class="day"><div class="date">28</div></li>
        <li class="day"><div class="date">29</div></li>
        <li class="day"><div class="date">30</div></li>
        <li class="day other-month"><div class="date">1</div></li>
        <li class="day other-month"><div class="date">2</div></li>
        <li class="day other-month"><div class="date">3</div></li>
      </ul>
    </div>
  </div>
</body>
</html>