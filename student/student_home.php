<?php
   include('../src/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="http://localhost/images/icon.png">
    <title>Eudoxus</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
  <!-- grid class containing all items -->
  <div class="bs1-grid">
    <div class="logo">
      <a href="http://localhost/index.php"><img src="http://localhost/images/eudoxus.png"/></a>
    </div>
    <div class="bs-grid">
      <!-- Item 1 on grid -->
      <div class="bs-item1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/announcements.php">Announcements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/book_database.php">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/contact.php">Contact</a>
              </li>
            </ul>
            <a href="http://localhost/general/logout.php">
              <button class="dropbtn">Logout</button>
            </a>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item active">Student</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- item 1 on bs2 grid - side bar -->
    <ul class="nav nav-pills flex-column">
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link active" href="http://localhost/student/student_home.php">Home</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student/student_book_sel.php">Book selection</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student/student_book_list.php">Book List</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student/student_faq.php">FAQ</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student/student_manual.php">Manual</a>
      </li>
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="bs-item3">
      <div class="jumbotron2">
        <div class="separator" style="margin-bottom:2em">
          <div class="Headers">
            <h2 style="margin-bottom:1em;">Full Name</h2>
            <h5>Username</h5>
            <h5>Email</h5>
            <h5>Phone</h5>
            <h5>University</h5>
            <h5>Department</h5>
            <h5>Since</h5>
          </div>
          <div class="Info">
            <h2 style="margin-bottom:1em;"><?php echo $_SESSION['FullName'];?></h2>
            <h5><?php echo $_SESSION['Username'];?></h5>
            <h5><?php echo $_SESSION['Email'];?></h5>
            <h5><?php echo $_SESSION['Phone'];?></h5>
            <h5><?php echo $_SESSION['University'];?></h5>
            <h5><?php echo $_SESSION['Department'];?></h5>
            <h5><?php echo $_SESSION['Date'];?></h5>
          </div>
          <div class="card border-primary mb-3" style="max-width: 20rem;">
            <div class="card-header">Book selection Deadline</div>
            <div class="card-body">
              <h4 class="card-title"><?php echo $_SESSION['Deadline'] ?></h4>
              <p class="card-text">Students have until then to select and pick all books.</p>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <p>If you wish to change any of your info.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="http://localhost/student/student_settings.php" role="button"><i class="fas fa-cogs"></i> Settings</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
