<?php
   include('../src/session.php');
   include('../src/config.php');
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/js/scripts.js"></script>
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
              <li class="nav-item active">
                <a class="nav-link" href="http://localhost/general/book_database.php">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/contact.php">Contact</a>
              </li>
            </ul>
            <?php
              if(!isset($_SESSION['Id'])) {
                echo '<div class="mydropdown">';
                  echo '<button class="dropbtn" style="width: 110px;">Login</button>';
                  echo '<div class="mydropdown-content" style="width: 110px;">';
                    echo '<a href="http://localhost/general/login.php?id=1">Student</a>';
                    echo '<a href="http://localhost/general/login.php?id=2">Publisher</a>';
                    echo '<a href="">Secretary</a>';
                    echo '<a href="">Distributor</a>';
                    echo '<a href="">Professor</a>';
                  echo '</div>';
                echo '</div>';
                echo '<div class="mydropdown" style="margin-left:10px">';
                  echo '<button class="dropbtn" style="width: 110px;">Sign Up</button>';
                  echo '<div class="mydropdown-content" style="width: 110px;">';
                    echo '<a href="http://localhost/general/signup.php?id=1">Student</a>';
                    echo '<a href="http://localhost/general/signup.php?id=2">Publisher</a>';
                    echo '<a href="">Secretary</a>';
                    echo '<a href="">Distributor</a>';
                    echo '<a href="">Professor</a>';
                  echo '</div>';
                echo '</div>';
              }else{
                echo '<a href="http://localhost/general/logout.php">';
                  echo '<button class="dropbtn">Logout</button>';
                echo '</a>';
              }
            ?>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item active">Book Database</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- Item 1 on grid2 -->
    <?php
    if (isset($_SESSION['Id'])){
      if ($_SESSION['Id'] == 1){
        echo '
        <ul class="nav nav-pills flex-column">
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student/student_home.php">Home</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student/student_book_sel.php">Book Selection</a>
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
        </ul>';
      }else if ($_SESSION['Id'] == 2){
        echo '
        <ul class="nav nav-pills flex-column">
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher/publisher_home.php">Home</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher/publisher_book_man.php">Book Management</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher/publisher_courier.php">Courier Service</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher/publisher_faq.php">FAQ</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher/publisher_manual.php">Manual</a>
          </li>
        </ul>';
      }
    }else{
      echo '
      <ul class="nav nav-pills flex-column">
      </ul>';
    }
    ?>
    <!-- Item 2 on grid2 -->
    <div class="bs-grid">
      <!-- Item 3 on grid -->
      <h1 style="text-align:center">Search for book in Eudoxus database</h1>
      <!-- Item 4 on grid -->
      <div class="container">
        <form action="http://localhost/general/book_database.php" method="POST">
          <div class="form-group">
            <input type="text" name="search" class="form-control" id="search" placeholder="Search" aria-describedby="search">
            <small id="emailHelp" class="form-text text-muted">Search books by author, title, publications, isbn.</small>
            <small id="emailHelp" class="form-text text-muted">Example search: Algo -> Results: Introduction to Algorithms. Kleidarithmos -> Results: All books of Kleidarithmos publications</small>
          </div>
          <div class="search-bn-container">
            <button type="submit" name="submit-search" class="btn btn-primary btn-lg">Search</button>
          </div>
        </form>
      </div>
      <!-- Item 5 on grid -->
      <div class="results-container">
        <?php
        if (isset($_POST['submit-search'])){
          $search = mysqli_real_escape_string($conn, $_POST['search']);
          $query = "SELECT * FROM book WHERE Title LIKE '%$search%' OR Author LIKE '%$search%'
                    OR ISBN LIKE '%$search%' OR Publications LIKE '%$search%'";
          $result = $conn->query($query);
          if ($result){
            if (!empty($_POST['search'])){
              echo '<h1>Results</h1>';
            }else{
              echo '<h1>All books</h1>';
            }
            echo '<div class="book-row">';
            while($row = $result->fetch_assoc()){
              echo '<div class="btn">';
              echo '<input class="myButton view_data" title="Click to view book preview" type="submit" data-toggle="modal" data-target="#myModal" id="'.$row['ISBN'].'" value="'.$row['Title'].'">';
              echo '</div>';
              echo '<!-- Modal -->
                    <div class="modal fade" id="dataModal" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header" id="book_header">
                          </div>
                          <div class="modal-body" id="book_details">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>';
            }
            echo '</div>';
          }else{
            echo "<h1>There are no results matching your search.</h1>";
          }
        } else {
          $query = "SELECT * FROM book";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
          echo '<h1>All books</h1>';
          echo '<div class="book-row">';
          while($row = $result->fetch_assoc()){
            echo '<div class="btn">';
            echo '<input class="myButton view_data" title="Click to view book preview" type="submit" data-toggle="modal" data-target="#myModal" id="'.$row['ISBN'].'" value="'.$row['Title'].'">';
            echo '</div>';
            echo '<!-- Modal -->
                  <div class="modal fade" id="dataModal" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header" id="book_header">
                        </div>
                        <div class="modal-body" id="book_details">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
