<?php

include 'config.php';
session_start();

// page redirect
$usermail = "";
$usermail = $_SESSION['usermail'];
if ($usermail == true) {
} else {
  header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/home.css">
  <title>Hotel blue bird</title>
  <!-- boot -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- fontowesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="./admin/css/roombook.css">
  <style>
    /* ===== FORM CONTAINER ===== */
    .guestdetailpanelform {
      background: #ffffff;
      width: 700px;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      animation: fadeIn 0.4s ease-in-out;
    }

    /* ===== STEP TITLE ===== */
    .guestdetailpanelform h4 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 20px;
      color: #1a1a1a;
    }

    /* ===== INPUT FIELDS ===== */
    .guestdetailpanelform input,
    .guestdetailpanelform select {
      width: 100%;
      padding: 12px 14px;
      margin-bottom: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    /* ===== INPUT FOCUS EFFECT ===== */
    .guestdetailpanelform input:focus,
    .guestdetailpanelform select:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 6px rgba(13, 110, 253, 0.3);
      outline: none;
    }

    /* ===== TWO COLUMN LAYOUT ===== */
    .form-row {
      display: flex;
      gap: 10px;
    }

    .form-row input,
    .form-row select {
      flex: 1;
    }

    /* ===== BUTTONS ===== */
    .guestdetailpanelform button {
      padding: 10px 25px;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 500;
    }

    .guestdetailpanelform .btn-primary {
      background: linear-gradient(45deg, #0d6efd, #4f9cff);
      border: none;
    }

    .guestdetailpanelform .btn-success {
      background: linear-gradient(45deg, #198754, #32c28b);
      border: none;
    }

    /* ===== STEP INDICATOR ===== */
    .step-indicator {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .step {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      background: #ccc;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 10px;
      font-weight: bold;
    }

    .step.active {
      background: #0d6efd;
    }

    /* ===== FORM STEP VISIBILITY ===== */
    .form-step {
      display: none;
    }

    .form-step.active {
      display: block;
    }

    /* ===== ANIMATION ===== */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(15px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .guestdetailpanelform {
      background: #ffffff;
      width: 700px;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      animation: fadeIn 0.4s ease-in-out;
    }

    .form-step {
      display: none;
    }

    .form-step.active {
      display: block;
    }

    /* ===== SCROLLABLE GUEST INFO STEP ===== */
    #step1 {
      max-height: 560px;
      /* control height */
      overflow-y: auto;
      /* enable vertical scroll */
      padding-right: 10px;
      /* space for scrollbar */
    }

    /* nicer scrollbar (optional but looks good) */
    #step1::-webkit-scrollbar {
      width: 6px;
    }

    #step1::-webkit-scrollbar-thumb {
      background: #0d6efd;
      border-radius: 10px;
    }

    #step1::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    #step2 {
      max-height: 560px;
      /* control height */
      overflow-y: auto;
      /* enable vertical scroll */
      padding-right: 10px;
      /* space for scrollbar */
    }

    /* nicer scrollbar (optional but looks good) */
    #step2::-webkit-scrollbar {
      width: 6px;
    }

    #step2::-webkit-scrollbar-thumb {
      background: #0d6efd;
      border-radius: 10px;
    }

    #step2::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
  </style>
</head>

<body>
  <nav>
    <div class="logo">
      <img class="bluebirdlogo" src="./image/bluebirdlogo.png" alt="logo">
      <p>BLUEBIRD</p>
    </div>
    <ul>
      <li><a href="#firstsection">Home</a></li>
      <li><a href="#secondsection">Rooms</a></li>
      <li><a href="#thirdsection">Facilites</a></li>
      <li><a href="#contactus">contact us</a></li>
      <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
    </ul>
  </nav>

  <section id="firstsection" class="carousel slide carousel_section" data-bs-ride="carousel">
    <div class="carousl-inner">
      <div class="carousel-item active">
        <img class="carousel-image" src="./image/hotel1.jpg">
      </div>
      <div class="carousel-item">
        <img class="carousel-image" src="./image/hotel2.jpg">
      </div>
      <div class="carousel-item">
        <img class="carousel-image" src="./image/hotel3.jpg">
      </div>
      <div class="carousel-item">
        <img class="carousel-image" src="./image/hotel4.jpg">
      </div>

      <div class="welcomeline">
        <h1 class="welcometag">Welcome to heaven on earth</h1>
      </div>

      <!-- bookbox -->
      <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">

          <!-- ================= STEP 1: GUEST INFORMATION ================= -->
          <div class="form-step active" id="step1">
            <h4>Guest Information</h4>
            <button type="button" class="btn btn-outline-secondary w-100 mt-2" onclick="closeForm()">
              Back to Home
            </button>

            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="text" name="icnumber" placeholder="IC / Passport Number">
            <input type="date" name="dob" placeholder="Date of Birth">
            <input type="text" name="Country" placeholder="Country">
            <input type="text" name="occupation" placeholder="Occupation">
            <input type="email" name="Email" placeholder="Email" required>
            <input type="text" name="Phone" placeholder="Phone Number">
            <input type="text" name="address" placeholder="Home Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="state" placeholder="State">
            <input type="text" name="postcode" placeholder="Postcode">
            <input type="text" name="Emergcontname" placeholder="Emergency Contact Name">
            <input type="text" name="Emergcontphone" placeholder="Emergency Contact Phone">

            <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
          </div>

          <!-- ================= STEP 2: RESERVATION INFORMATION ================= -->
          <div class="form-step" id="step2">
            <h4>Reservation Information</h4>



            <input type="number" name="adult" placeholder="Number of Adults">
            <input type="number" name="children" placeholder="Number of Children">

            <select name="RoomType" class="selectinput">
              <option selected>Room Type</option>
              <option>Superior</option>
              <option>Deluxe</option>
              <option>Single</option>
            </select>

            <select name="Bed" class="selectinput">
              <option selected>Bed Type</option>
              <option>Single</option>
              <option>Double</option>
              <option>Queen</option>
            </select>

            <input type="number" name="NoofRoom" placeholder="Number of Rooms">


            <select name="Meal" class="selectinput">
              <option value selected>Meal</option>
              <option value="Room only">Room only</option>
              <option value="Breakfast">Breakfast</option>
              <option value="Half Board">Half Board</option>
              <option value="Full Board">Full Board</option>
            </select>

            <select name="smoke" class="selectinput">
              <option selected>Smoking Preference</option>
              <option>Yes</option>
              <option>No</option>
            </select>

            <input type="text" name="arrival_time" placeholder="Expected Arrival Time">
            <input type="text" name="departure_time" placeholder="Expected Departure Time">
            <input type="text" name="special_request" placeholder="Special Requests">
            <input type="text" name="promo_code" placeholder="Promo Code">

            <label>Check-in</label>
            <input type="date" name="cin">

            <label>Check-out</label>
            <input type="date" name="cout">

            <button type="button" class="btn btn-secondary" onclick="prevStep()">Back</button>
            <div class="footer">
              <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
            </div>
          </div>
        </form>

        <!-- ==== room book php ====-->
        <?php if (isset($_POST['guestdetailsubmit'])) {
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $icnumber = $_POST['icnumber'];
          $dob = $_POST['dob'];
          $Country = $_POST['Country'];
          $occupation = $_POST['occupation'];
          $Email = $_POST['Email'];
          $Phone = $_POST['Phone'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $postcode = $_POST['postcode'];
          $Emergcontname = $_POST['Emergcontname'];
          $Emergcontphone = $_POST['Emergcontphone'];

          $adult = $_POST['adult'];
          $children = $_POST['children'];
          $RoomType = $_POST['RoomType'];
          $Bed = $_POST['Bed'];
          $NoofRoom = $_POST['NoofRoom'];
          $Meal = $_POST['Meal'];
          $smoke = $_POST['smoke'];
          $arrival_time = $_POST['arrival_time'];
          $departure_time = $_POST['departure_time'];
          $special_request = $_POST['special_request'];
          $promo_code = $_POST['promo_code'];
          $cin = $_POST['cin'];
          $cout = $_POST['cout'];

          if ($firstname == "" || $Email == "" || $Country == "") {
            echo "<script>swal({ title: 'Fill the proper details', icon: 'error', }); </script>";
          } else {
            $sta = "NotConfirm";
            $sql = "INSERT INTO `roombook`(`firstname`, `lastname`, `icnumber`, `dob`, `Country`, `occupation`, `Email`, `Phone`, `address`, `city`, `state`, `postcode`, `Emergcontname`, `Emergcontphone`, 
            `adult`, `children`, `RoomType`, `Bed`, `NoofRoom`, `Meal`, `smoke`, `arrival_time`, `departure_time`, `special_request`, `promo_code`, `cin`, `cout`, `nodays`, `stat`) 
            VALUES ('$firstname','$lastname','$icnumber','$dob','$Country','$occupation','$Email','$Phone','$address','$city','$state','$postcode','$Emergcontname','$Emergcontphone',
            '$adult','$children','$RoomType','$Bed','$NoofRoom','$Meal','$smoke','$arrival_time','$departure_time','$special_request','$promo_code','$cin','$cout',datediff('$cout','$cin'),'$sta')";


            $result = mysqli_query($conn, $sql);
            if ($result) {
              echo "<script>swal({ title: 'Reservation successful', icon: 'success', }); </script>";
            } else {
              echo "<script>swal({ title: 'Something went wrong', icon: 'error', }); </script>";
            }
          }
        } ?>

      </div>

    </div>
  </section>

  <section id="secondsection">
    <img src="./image/homeanimatebg.svg">
    <div class="ourroom">
      <h1 class="head">≼ Our room ≽</h1>

      <div class="roomselect">
        <div class="roombox">
          <div class="hotelphoto h1"></div>

          <div class="roomdata">
            <h2>Superior Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
              <i class="fa-solid fa-dumbbell"></i>
              <i class="fa-solid fa-person-swimming"></i>
            </div>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>

        </div>

        <div class="roombox">
          <div class="hotelphoto h2"></div>
          <div class="roomdata">
            <h2>Deluxe Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
              <i class="fa-solid fa-dumbbell"></i>
            </div>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>

        <div class="roombox">
          <div class="hotelphoto h3"></div>
          <div class="roomdata">
            <h2>Guest Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
            </div>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>

        <div class="roombox">
          <div class="hotelphoto h4"></div>
          <div class="roomdata">
            <h2>Single Room</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
            </div>
            <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="thirdsection">
    <h1 class="head">≼ Facilities ≽</h1>
    <div class="facility">
      <div class="box">
        <h2>Swiming pool</h2>
      </div>
      <div class="box">
        <h2>Spa</h2>
      </div>
      <div class="box">
        <h2>24*7 Restaurants</h2>
      </div>
      <div class="box">
        <h2>24*7 Gym</h2>
      </div>
      <div class="box">
        <h2>Helicopter service</h2>
      </div>
    </div>
  </section>

  <section id="contactus">
    <div class="social">
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-solid fa-envelope"></i>
    </div>
    <div class="createdby">
      <h5>Created by AZD</h5>
    </div>
  </section>

</body>

<script>
  var bookbox = document.getElementById("guestdetailpanel");

  openbookbox = () => {
    bookbox.style.display = "flex";
  }
  closebox = () => {
    bookbox.style.display = "none";
  }

  function nextStep() {
    document.getElementById("step1").classList.remove("active");
    document.getElementById("step2").classList.add("active");
  }

  function prevStep() {
    document.getElementById("step2").classList.remove("active");
    document.getElementById("step1").classList.add("active");
  }

  function closeForm() {
    // hide the booking panel
    document.getElementById("guestdetailpanel").style.display = "none";



    // always return to step 1
    document.getElementById("step2").classList.remove("active");
    document.getElementById("step1").classList.add("active");
  }
</script>

</html>