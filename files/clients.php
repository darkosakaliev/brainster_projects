<?php
error_reporting(0);
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "project01";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query = "SELECT * FROM `type_of_students`";

$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Project 1 - Brainster Labs</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="First Project for Brainster Full-Stack Academy" />
    <meta name="author" content="Darko Sakaliev" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid px-0 bg-yellow">
        <nav class="navbar anim navbar-expand-lg navbar-light py-3 shadow">
            <a class="navbar-brand" href="./index.html">
                <img class="logo" src="../Design/Logo.png" alt="">
                <span class="logo-text text-uppercase">brainster</span>
            </a>
            <button onclick="openNav()" class="navbar-toggler" type="button">
                <i class="fas fa-stream"></i>
            </button>
            <div id="mobileNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlayContent">
                    <ul class="navbar-nav ml-3">
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-bold" href="https://brainster.co/marketing/">Академија за маркетинг</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-bold" href="https://brainster.co/full-stack/">Академија за програмирање</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-bold" href="https://brainster.co/data-science/">Академија за data science</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-bold" href="https://brainster.co/graphic-design/">Академија за дизајн</a>
                        </li>
                    </ul>
                    <a href="./clients.php" class="btn d-inline-block text-white btn-danger mt-3 ml-3">Вработи наш студент</a>
                </div>

            </div>
            <ul class="navbar-nav d-none d-lg-flex mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="https://brainster.co/marketing/">Академија за маркетинг</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="https://brainster.co/full-stack/">Академија за програмирање</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="https://brainster.co/data-science/">Академија за data science</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="https://brainster.co/graphic-design/">Академија за дизајн</a>
                </li>
            </ul>
            <a href="./clients.php" class="btn btn-danger  d-none d-lg-flex">Вработи наш студент</a>
        </nav>
    </div>
    <div class="container-fluid bg-yellow">
        <div class="container">
            <p class="display-4 font-weight-bold text-center py-5">Вработи Студенти</p>
            <form id="studentForm" name="studentForm" method="POST" action="" class="py-5" target="succModal">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fullName" class="font-weight-bold">Име и Презиме</label>
                        <input type="text" class="form-control form-control-lg py-2" id="fullName" name="fullName" placeholder="Вашето име и презиме" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="companyName" class="font-weight-bold">Име на компанија</label>
                        <input type="text" class="form-control form-control-lg py-2" id="companyName" name="companyName" placeholder="Име на вашата компанија" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email" class="font-weight-bold">Контакт имејл</label>
                        <input type="email" class="form-control form-control-lg py-2" id="email" name="email" placeholder="Контакт имејл на вашата компанија" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone" class="font-weight-bold">Контакт телефон</label>
                        <input type="tel" class="form-control form-control-lg py-2" id="phone" name="phone" placeholder="Контакт телефон на вашата компанија" required>
                    </div>
                </div>
                <div class="form-row pb-5">
                    <div class="form-group col-md-6">
                        <label for="typeOfStudents" class="font-weight-bold">Тип на студенти</label>
                        <select class="form-control form-control-lg py-2" id="typeOfStudents" name="typeOfStudents" required>
                            <?php while ($row1 = mysqli_fetch_array($result)) :; ?>
                                <option class="py-2" value="" disabled selected hidden>Изберете тип на студент</option>
                                <option class="py-2" value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="typeOfStudents" class="font-weight-bold invisible">Тип на студенти</label>
                        <button type="submit" class="btn btn-block btn-danger text-uppercase py-2">Испрати</button>

                        <div class="modal fade" id="succModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bg-yellow">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Form sent successfully.
                                    </div>
                                    <div class="modal-footer border-0">
                                        <a href="./index.html" class="btn btn-danger">Return to home page</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid p-0 bg-gray text-white">
        <p class="m-0 py-3 text-center">Изработено со &#128151 од студентите на Brainster</p>
    </div>

    <script>
        function openNav() {
            document.getElementById("mobileNav").style.display = "block";
        }

        function closeNav() {
            document.getElementById("mobileNav").style.display = "none";
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


    <?php 
    
    if (isset($_POST['fullName']) && isset($_POST['companyName']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['typeOfStudents'])) {
        $formName = $_POST['fullName'];
        $formCompany = $_POST['companyName'];
        $formMail = $_POST['email'];
        $formPhone = $_POST['phone'];
        $formType = $_POST['typeOfStudents'];
    
        $insert = "INSERT INTO students(fullname, companyname, email, phone, type_id) VALUES('$formName', '$formCompany', '$formMail', '$formPhone', '$formType')";
    
        $send = mysqli_query($connect, $insert);

        if($send) {
            echo '<script type="text/javascript">
			$(document).ready(function(){
				$("#succModal").modal("show");
			});
		</script>';
        }
    }

    ?>


    <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>