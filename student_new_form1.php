<?php
   include('./src/session.php');
   include('./src/config.php');
   $class_ids = array();
   //Implementation similar to shoping cart

   if(filter_input(INPUT_POST, 'add_to_selected')) {
     if(isset($_SESSION['selected_class'])){
       //counter for classes inside
       $count = count($_SESSION['selected_class']);
       //to match array keys and class ids
       $class_ids = array_column($_SESSION['selected_class'], 'id');

       //check if it already exists inside array
       if (!in_array(filter_input(INPUT_GET, 'id'), $class_ids)) {
         $_SESSION['selected_class'][$count] = array
         (
           'id' => filter_input(INPUT_GET, 'id'),
           'name' => filter_input(INPUT_POST, 'Name'),
           'professor' => filter_input(INPUT_POST, 'Professor'),
           'semester' => filter_input(INPUT_POST, 'Semester')
         );
       }else{
         //if it already exists possibly print an error message.
       }
     }else{ //if selected doesnt exist, create first product with array key 0
       $_SESSION['selected_class'][0] = array
       (
         'id' => filter_input(INPUT_GET, 'id'),
         'name' => filter_input(INPUT_POST, 'Name'),
         'professor' => filter_input(INPUT_POST, 'Professor'),
         'semester' => filter_input(INPUT_POST, 'Semester')
       );
     }
   }

   /*echo '<pre>';
   print_r($class_ids);
   echo '</pre>';*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="images/icon.png">
    <title>Eudoxus</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/scripts.js"></script>
  <!-- grid class containing all items -->
  <div class="bs1-grid">
    <div class="logo">
      <a href="index.php"><img src="images/eudoxus.png"/></a>
    </div>
    <div class="bs-grid">
      <!-- Item 1 on grid -->
      <div class="bs-item1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/announcements.php">Announcements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/book_database.php">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/contact.php">Contact</a>
              </li>
            </ul>
            <a href="http://localhost/logout.php">
              <button class="dropbtn">Logout</button>
            </a>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="http://localhost/student_home.php">Student</a></li>
          <li class="breadcrumb-item"><a href="http://localhost/student_book_sel.php">Select</a></li>
          <li class="breadcrumb-item active">New Form</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- item 1 on bs2 grid - side bar -->
    <ul class="nav nav-pills flex-column">
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student_home.php">Home</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link active" href="http://localhost/student_book_sel.php">Book selection</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student_book_list.php">Book List</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student_faq.php">FAQ</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="https://eudoxus.gr/Files/User%20Manual%20Foitites.pdf" target="_blank">Manual</a>
      </li>
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="Book-Selection-Forms">
      <ul class="nav nav-tabs" style="margin-bottom: 2em; display: grid; grid-template-columns: auto auto auto auto auto;">
        <li class="nav-item">
          <a class="nav-link active" href="" style="padding-left: 2em; padding-right: 2em;">Class Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form2.php" style="padding-left: 2em; padding-right: 2em;">Book Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form3.php" style="padding-left: 2em; padding-right: 2em;">Pickup Point</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form4.php" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
        </li>
        <li class="nav-item" style="margin-right: 0px; float: right;">
          <a href="http://localhost/selected_classes.php" style="float: right;">
            <button type="button" class="btn btn-primary btn-lg">
              <i class="fa fa-book"></i>
              <span class="text">Selected Classes</span>
            </button>
          </a>
        </li>
      </ul>

      <div class="class-select">
        <?php
        echo '<div class="panel-group" id="accordion" style="display:grid;">';
        echo '<div class="panel panel-default">
              <div class="panel-heading" style="margin-top: 2em;">
                <h4 class="panel-title">
                  <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h3><b>Winter Period:</b></h3></button>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">';
        for ($semid = 1; $semid <=7; $semid+=2) {
          $query = "SELECT * FROM class,student WHERE student.Username = '".$_SESSION['Username']."' AND student.Department_id = class.Department_id
                    AND Period = 'Winter' AND Semester='".$semid."' ORDER BY class.Name ASC";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
          echo '<div class="panel panel-default">
                <div class="panel-heading" style="margin-top: 2em;">
                  <h4 class="panel-title">
                    <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapsew1'.$semid.'"><h3><b>Semester '.$semid.':</b></h3></button>
                  </h4>
                </div>
                <div id="collapsew1'.$semid.'" class="panel-collapse collapse in">
                <div class="cart-container">';
          if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()){
              echo '<div class="myshop-item">
                    <div class="btn">
                      <input class="myButton view_info" type="submit" data-toggle="modal" data-target="#myModal" id="'.$row['Id'].'" value="'.$row['Name'].'">
                    </div>
                    <form method="post" action="http://localhost/student_new_form1.php?action=add&id='.$row['Id'].'">
                    <input type="hidden" name="Name" value="'.$row['Name'].'"/>
                    <input type="hidden" name="Professor" value="'.$row['Professor'].'"/>
                    <input type="hidden" name="Semester" value="'.$row['Semester'].'"/>
                    <input type="submit" name="add_to_selected" class="button-hover-addcart button" value="Add to selected"/>
                    </form>
                    </div>';
              echo '<!-- Modal -->
                    <div class="modal fade" id="dataModal" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header" id="class_header">
                          </div>
                          <div class="modal-body" id="class_details">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>';
            }
          }else{
            echo '<p>No classes available.<p>';
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="panel-group" id="accordion" style="display:grid;">';
        echo '<div class="panel panel-default">
              <div class="panel-heading" style="margin-top: 2em;">
                <h4 class="panel-title">
                  <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><h3><b>Summer Period:</b></h3></button>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse in">';
        for ($semid = 2; $semid <=8; $semid+=2) {
          $query = "SELECT * FROM class,student WHERE student.Username = '".$_SESSION['Username']."' AND student.Department_id = class.Department_id
                    AND Period = 'Summer' AND Semester='".$semid."' ORDER BY class.Name ASC";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
          echo '<div class="panel panel-default">
                <div class="panel-heading" style="margin-top: 2em;">
                  <h4 class="panel-title">
                    <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapses1'.$semid.'"><h3><b>Semester '.$semid.':</b></h3></button>
                  </h4>
                </div>
                <div id="collapses1'.$semid.'" class="panel-collapse collapse in">
                <div class="cart-container">';
          if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()){
              echo '<div class="myshop-item">
                    <div class="btn">
                      <input class="myButton view_info" type="submit" data-toggle="modal" data-target="#myModal" id="'.$row['Id'].'" value="'.$row['Name'].'">
                    </div>
                    <form method="post" action="http://localhost/student_new_form1.php?action=add&id='.$row['Id'].'">
                    <input type="hidden" name="Name" value="'.$row['Name'].'">
                    <input type="hidden" name="Professor" value="'.$row['Professor'].'"/>
                    <input type="hidden" name="Semester" value="'.$row['Semester'].'"/>
                    <input type="submit" name="add_to_selected" class="button-hover-addcart button" value="Add to selected"/>
                    </form>
                    </div>';
              echo '<!-- Modal -->
                    <div class="modal fade" id="dataModal" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header" id="class_header">
                          </div>
                          <div class="modal-body" id="class_details">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>';
            }
          }else{
            echo 'No classes available.';
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        ?>
      </div>
      <a role="button" class="btn btn-primary btn-lg" style="margin-top: 2em;" href="http://localhost/student_new_form2.php">Proceed</a>
    </div>
  </div>
</body>
</html>