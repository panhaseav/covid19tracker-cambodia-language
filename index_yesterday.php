<?php include "logic.php";?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COVID 19 TRACKER</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d5bb9eeccc.js" crossorigin="anonymous"></script>
    <script src= "https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src= "https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
     <script>
        $(document).ready(function() {
    $('#table').DataTable({
         // this gives option for changing the number of records shown in the UI table

    })
            ;
        } );
        
    </script>
    <style>    
        #table_filter input {
      border-radius: 5px;
            margin:center;
    </style>

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ណាវបារ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">ទំព័រដេីម<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search"aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ស្វែងរក</button>
    </form>
  </div>
</nav>
<body>
    <div class = "container-fluid bg-light p-5 text-center my-3">
        <h1>វេបសាយកំណត់ជំងីកូវីដ១៩</h1>
        <h5 class = "text-muted">ប្រព័ន្ធអាប់ដេតរាល់ថ្ងែ</h5>
    </div>
    <div class = "container my-5">
        <div class = "row text-center">
            <div class = "col-4 text-warning">
                <h5>ចំនួនអ្នកឆ្លងសរុប</h5>
                <?php echo $total_confirmed; ?>
            </div>
             <div class = "col-4 text-success">
                <h5>ចំនួនអ្នកជាសះស្បើយសរុប</h5>
                <?php echo $total_recovered; ?>
            </div>
             <div class = "col-4 text-danger">
                <h5>ចំនួនអ្នកស្លាប់សរុប</h5>
                <?php echo $total_deaths; ?>
            </div>
        </div>
    </div>
    <div class = "container bg-light p-3 my-3 text-center">
        <h5 class = "text-info">យេីងរួមគ្នាប្រឆាំងមេរេាគកូវីដ១៩</h5>
        <p class = "text-info">តាមការណែនាំរបស់ក្រសូងសុខាភិបាល</p>
    </div>
    <div class = "container-fluid">
       <p1><?php echo $value[$days_count_prev]['date']; ?></p1>
       <div class = "search-button">
            <a href="index.php">Currently</a>
       </div>

        <div class = "table-responsive">
            <table class = "table" id = "table">
            <thead class ="thead-dark">
                <tr>
                    <th scope = "col">ប្រទេស</th>
                    <th scope = "col">ចំនួនអ្នកឆ្លង</th>
                    <th scope = "col">ចំនួនអ្នកជាសះស្បើយ</th>
                    <th scope = "col">ចំនួនអ្នកស្លាប់</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($data as $key => $value){
                ?>
                <tr>
                    <th><?php echo $key ?></th>
                    <td>
                        <?php echo $value[$days_count_prev]['confirmed']; ?>

                    </td> 
                    <td>
                        <?php echo $value[$days_count_prev]['recovered']; ?>

                    </td>
                    <td>
                        <?php echo $value[$days_count_prev]['deaths']; ?>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
    <footer class = "footer mt-auto py-3">
        <div class = "container text-center bg-light">
            <span class = "text-muted">Website design by Panha Seav</span>
        </div>
    </footer>

</body>
</html>