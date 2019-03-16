<?php require ('header.php'); ?>
<a class="navbar-brand" href="#"><img></a>
<ul id="nav" class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="/index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/login.php">Log In</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/signup.php">Sign Up</a>
  </li>
   <li class="nav-item">
    <a class="nav-link disabled" href="/explore.php">Genres</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="/dashboard.php">Dashboard</a>
  </li>

</ul>
<?php require ('search.php'); ?>
<?php require ('posts.php'); ?>
