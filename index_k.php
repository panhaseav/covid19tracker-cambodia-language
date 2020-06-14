<?php include "logic_k.php"; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>តាមដានជំងីកូវីដ</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d5bb9eeccc.js" crossorigin="anonymous"></script>
    <script src= "https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src= "https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
    <script src= "https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"></script>
    
     <script>

         
    dTable = $('#myTable').DataTable({
        "bLengthChange": false,
        "lengthMenu": [20],
        "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }
            ]
             
    });
        $('#mySearchButton').on( 'keyup click', function () {
    dTable.search($('#mySearchText').val()).draw();
  } );
} );
        
    </script>
    <style>
        .p1{
            text-align: center;
            font-size: 20px;  
        }
        #navbar{
            background-color: aqua; 
        }
    </style>
    
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-dark" id = "navbar">
  <a class="navbar-brand" href="#">
សូមស្វាគមន៍</a>
  <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
        <a class="nav-link" href="index.php">ទំព័រដើម <span class="sr-only">(current)</span></a>
      </li>
    </ul>
</nav>
<body>
    

    <div class = "container-fluid bg-light p-5 text-center my-3">
        <h1>វេបសាយតាមដានជំងឺកូវីដ១៩</h1>
        <h5 class = "text-muted">ប្រព័ន្ធអាប់ដេតរាល់ថ្ងែ</h5>
    </div>
<!--  DATA FOR THE TOTAL RECOVERY IN CAMBODIA  -->

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
        <p class = "text-info">តាមការណែនាំរបស់ក្រសួងសុខាភិបាល</p>
    </div>
    <div class = "container-fluid">
      <div class = "p1">
       <p1><?php echo "ថែ្ង/ខែ/ឆ្នាំ :" .  $value[$days_count]['date']; ?></p1>
       </div>
<!-- For yesterday      -->
<!--
       <div class = "search-button">
            <a href="index_yesterday.php">
ម្សិលមិញ</a>
       </div>
-->
        <div class = "table-responsive">
            <table class = "table" id= "myTable">
            <thead class ="thead-dark">
                <tr>
                    <th scope = "col">ទីក្រុង</th>
                    <th scope = "col">ចំនួនអ្នកឆ្លង</th>
                    <th scope = "col">ចំនួនអ្នកជាសះស្បើយ</th>
                    <th scope = "col">ចំនួនអ្នកស្លាប់</th>
                    <th scope = "col">ករណីសកម្ម</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                foreach($data as $key => $value){
                    $increase = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
                    $increase_recover = $value[$days_count]['recovered'] - $value[$days_count_prev]['recovered'];
                    $increase_deaths = $value[$days_count]['deaths'] - $value[$days_count_prev]['deaths'];
                    //for active case
                   $active_cases = $value[$days_count]['confirmed'] - $value[$days_count]['recovered'] - $value[$days_count]['deaths'] ;

                ?>
                <!-- Search form -->

                <tr>
                    <th><?php echo $key ?></th>
                    <td>
                        <?php echo $value[$days_count]['confirmed']; ?>
                        <?php if ($increase !=0){ ?>
                        <small class = "text-danger" pl-5><i class = "fas fa-arrow-up"></i><?php echo $increase; ?></small>
                        <?php } ?>
                    </td> 
                    <td>
                       
                        <?php echo $value[$days_count]['recovered']; ?>
                        <?php if ($increase_recover !=0){ ?>
                        <small class = "text-danger" pl-5><i class = "fas fa-arrow-up"></i><?php echo $increase_recover; ?></small>
                        <?php } ?>
                    </td>
                    <td>
                        <?php echo $value[$days_count]['deaths']; ?>
                        <?php if ($increase_deaths != 0 ){ ?>
                        <small class = "text-danger" pl-5><i class = "fas fa-arrow-up"></i><?php echo $increase_deaths; ?></small>
                        <?php } ?>
                    </td>

                    <td>
                       <?php echo $active_cases; ?>
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