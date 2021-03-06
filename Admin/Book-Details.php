<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="author" content="Neha Jha">
    <meta name="description" content="RDBMS Project">
    
    <!-- Icon -->
    <link rel="icon" href="Images/iiit-logo.png" sizes="35x35" type="image/png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Linked -->
    <link rel="stylesheet" href="CSS/navbar.css"/>

    <!-- Additional CSS -->
    <style type="text/css">
        .wrapper table.table-hover tbody tr:hover{
            background-color:#2e2d2d;
        }
        .wrapper table{
            background-color:#222121; 
            border-color:rgb(53, 51, 51); 
            font-size: 15px;
        }
        .wrapper table thead tr{
            color:rgb(211, 198, 241); 
            background-color:#1b1b1b; 
        }
        .wrapper table tbody tr{
            color:rgb(202, 199, 199);
            border-color:rgb(53, 51, 51);
        }
    </style>

    <title>IIIT Book-Shop</title>
</head>

<body class="book-details"  style="background-color:rgb(12, 12, 12);">

    <!-- Navigation -->
    <nav class="navbar-sticky navbar navbar-inverse navbar-static-top navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> 
                    <img style="width: 64px" src="Images/iiit-logo.png"alt="iiit logo"/>
                    <span class="iiitbookstore" style="font-family: 'Open Sans', sans-serif; font-weight:600; font-size: 21px;">IIIT Book-Shop</span>
                </a>
            </div>
            <div id="navbar6" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Admin-AHome.php"><i class="fa fa-home fa-fw" style="font-size: 20px;" aria-hidden="true"></i>Home</a></li>
                <li class="active"><a href="Book-Details.php">Books <i class="fa fa-bookmark-o" aria-hidden="true"></i> </a></li>
                <li><a href="User-Details.php">Users <i class="fa fa-address-book-o" aria-hidden="true"></i> </a> </li>
                <li><a href="Orders.php">Orders <i class="fa fa-shopping-bag" aria-hidden="true"></i> </a> </li>
                <li><a class="logout" href="Admin-Logout.php">Logout <i class="fa fa-sign-out" style="color: blue" aria-hidden="true"></i> </a> </li>
            </ul>
        </div>
      </div>
    </nav>

    <!-- Book Details Content -->
    <div class="wrapper" style="margin: 0px 45px 30px 45px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left" style='color:rgb(157, 115, 255);'>Available Books <i class="fa fa-bookmark" aria-hidden="true"></i></h2>
                        <a href="AddBooks.php" class="btn btn-success pull-right">Add New Book</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../connectserver.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM books";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-hover'>";
                                echo "<thead style='font-size: 17px;'>";
                                    echo "<tr>";
                                        echo "<th style='border-color:rgb(53, 51, 51);'>Book Id</th>";
                                        echo "<th style='border-color:rgb(53, 51, 51);'>Book Name</th>";
                                        echo "<th style='border-color:rgb(53, 51, 51);'>Author</th>";
                                        echo "<th style='border-color:rgb(53, 51, 51);'>Edition</th>";
                                        echo "<th style='border-color:rgb(53, 51, 51);'>Quantity</th>";
                                        echo "<th style='border-color:rgb(53, 51, 51);'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td style='border-color:rgb(53, 51, 51);'>" . $row['bookid'] . "</td>";
                                        echo "<td style='border-color:rgb(53, 51, 51);'>" . $row['name'] . "</td>";
                                        echo "<td style='border-color:rgb(53, 51, 51);'>" . $row['author'] . "</td>";
                                        echo "<td style='border-color:rgb(53, 51, 51);'>" . $row['edition'] . "</td>";
                                        echo "<td style='border-color:rgb(53, 51, 51);'>" . $row['quantity'] . "</td>";
                                        echo "<td style='border-color:rgb(53, 51, 51);'>";
                                            echo "<a style='margin-right: 17px; color:rgb(50, 165, 241);' href='ViewBook.php?bookid=". $row['bookid'] ."' title='Book Details' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a style='margin-right: 17px; color:rgb(50, 165, 241);' href='UpdateBook.php?bookid=". $row['bookid'] ."' title='Update Book' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a style='margin-right: 17px; color:rgb(50, 165, 241);' href='DeleteBook.php?bookid=". $row['bookid'] ."' title='Delete Book' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <!-- Footer  -->
    <footer id="footer" class="footer">
      <p class="text-center">
        Email: bookshop@iiit-bh.ac.in
        <br />Mobile: 0674-2653-321
      </p>
    </footer>

    <!-- Bootsrtap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <!-- JavaScript Linked-->
    <script src="Javascript/navbar.js"></script>
    <script src="Javascript/Book-Details.js"></script>

</body>
</html>
