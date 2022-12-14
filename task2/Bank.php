<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

<?php

$title = "Bank Loan";



if ($_SERVER["REQUEST_METHOD"] == "POST"  && !empty($_POST) ){

    $errors=[];
    if(empty($_POST['username'])){

        $errors['usernameError']="<p class='text-danger font-weight-bold'>* Email Is Requierd</p>";
    }
    if(empty($_POST['loanamount'])){

        $errors['loanamountError']="<p class='text-danger font-weight-bold'>*Loan Amount Requierd</p>";
    }
    if(empty($_POST['loanyears'])) {
        $errors['loanyersError']="<p class='text-danger font-weight-bold'>*Loan Years IS Requierd</p>";
    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST"  && !empty($_POST['username']) && !empty($_POST['loanamount']) && !empty($_POST['loanyears'])) {

    define("lowRate", 0.1);
    define("heighRate", 0.15);
    $username = $_POST['username'];
    $loanamount = $_POST['loanamount'];
    $loanyear = $_POST['loanyears'];

    if ($loanyear <= 3 && $loanyear > 0) {

        $interestrate = $loanamount * lowRate * $loanyear;
        $loanafterrate = $interestrate + $loanamount;
        $monthlyrate = $loanafterrate / ($loanyear * 12);
    }

    if ($loanyear > 3) {

        $interestrate = $loanamount * heighRate * $loanyear;
        $loanafterrate = $interestrate + $loanamount;
        $monthlyrate = $loanafterrate / ($loanyear * 12);
    }


    $result = "
    
    <div class='col-md-12 mt-5 border-bottom'>
    <div class='d-flex justify-content-between'>
       
        <div class='d-flex justify-content-around   text-center   col-md-12'>
            <h2>User Name</h2>
            <h2>Interest Rate</h2>
            <h2>Loan After Rate</h2>
            <h2>Monthly</h2>
        </div>
    </div>
    </div>
    
   <br> ";

    $result .= "
    <div class='col-md-12 '>
    <div class='d-flex justify-content-between'>
       
        <div class='d-flex justify-content-around pl-3 bg-secondary text-white col-md-12 '>
            <h2>" . $username . "</h2>
            <h2 >" . $interestrate . "</h2>
            <h2>" . $loanafterrate . "</h2>
            <h2>" . $monthlyrate . "</h2>
        </div>
    </div>
    </div>
    
    ";
}

?>

<section class="container mt-5">

    <div class="col-md-12 h1 text-center font-weight-blod text-primary">
        Bank
    </div>

    <div class="row mt-5">
        
        <section class="col-md-12">
            <form class="border border-primary p-4 mt-5" method="post">

                <div class="form-group ">

                    <label for="exampleInputEmail1" class="font-weight-bold">User Name</label>
                    <input type="text" name="username" value="<?php echo $_POST['username'] ?? ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo $errors['usernameError']?? ""; ?>
                </div>
                <div class="form-group ">

                    <label for="exampleInputEmail1" class="font-weight-bold">Loan Amount</label>
                    <input type="number" name="loanamount" value="<?php echo $_POST['loanamount'] ?? ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo  $errors['loanamountError']?? ""; ?>

                </div>
                <div class="form-group ">

                    <label for="exampleInputEmail1" class="font-weight-bold">Loan Year</label>
                    <input type="number" name="loanyears" value="<?php echo $_POST['loanyears'] ?? ""; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo $errors['loanyersError']?? ""; ?>

                </div>
                <button type="submit" class="btn btn-outline-primary col-md-12 ">Details</button>

            </form>

        </section>



    </div>
</section>
<section class="container">
    <div class="row mt-5">
        <?php echo $result ?? ""; ?>
    </div>
</section>
<?php



?> 
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html> 