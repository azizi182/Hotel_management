<?php

include '../config.php';

// fetch room data
$id = $_GET['id'];

$sql = "SELECT * from roombook where id = '$id'";
$re = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($re)) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $icnumber = $row['icnumber'];
    $dob = $row['dob'];
    $Country = $row['Country'];
    $occupation = $row['occupation'];
    $Email = $row['Email'];
    $Phone = $row['Phone'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $postcode = $row['postcode'];
    $Emergcontname = $row['Emergcontname'];
    $Emergcontphone = $row['Emergcontphone'];

    $adult = $row['adult'];
    $children = $row['children'];
    $RoomType = $row['RoomType'];
    $Bed = $row['Bed'];
    $NoofRoom = $row['NoofRoom'];
    $Meal = $row['Meal'];
    $smoke = $row['smoke'];
    $arrival_time = $row['arrival_time'];
    $departure_time = $row['departure_time'];
    $special_request = $row['special_request'];
    $promo_code = $row['promo_code'];
    $cin = $row['cin'];
    $cout = $row['cout'];
}

if (isset($_POST['guestdetailedit'])) {
    $efirstname = $_POST['firstname'];
    $elastname = $_POST['lastname'];
    $eicnumber = $_POST['icnumber'];
    $edob = $_POST['dob'];
    $eCountry = $_POST['Country'];
    $eoccupation = $_POST['occupation'];
    $eEmail = $_POST['Email'];
    $ePhone = $_POST['Phone'];
    $eaddress = $_POST['address'];
    $ecity = $_POST['city'];
    $estate = $_POST['state'];
    $epostcode = $_POST['postcode'];
    $eEmergcontname = $_POST['Emergcontname'];
    $eEmergcontphone = $_POST['Emergcontphone'];

    $eadult = $_POST['adult'];
    $echildren = $_POST['children'];
    $eRoomType = $_POST['RoomType'];
    $eBed = $_POST['Bed'];
    $eNoofRoom = $_POST['NoofRoom'];
    $eMeal = $_POST['Meal'];
    $esmoke = $_POST['smoke'];
    $earrival_time = $_POST['arrival_time'];
    $edeparture_time = $_POST['departure_time'];
    $especial_request = $_POST['special_request'];
    $epromo_code = $_POST['promo_code'];
    $ecin = $_POST['cin'];
    $ecout = $_POST['cout'];


    $sql = "UPDATE `roombook` SET `firstname`='$efirstname',`lastname`='$elastname',`icnumber`='$eicnumber',`dob`='$edob',
    `Country`='$eCountry',`occupation`='$eoccupation',`Email`='$eEmail',`Phone`='$ePhone',`address`='$eaddress',`city`='$eaddress',`state`='$estate',
    `postcode`='$epostcode',`Emergcontname`='$eEmergcontname',`Emergcontphone`='$eEmergcontphone',`adult`='$eadult',`children`='$echildren',`RoomType`='$eRoomType',
    `Bed`='$eBed',`NoofRoom`='$eNoofRoom',`Meal`='$eMeal',`smoke`='$esmoke',`arrival_time`='$earrival_time',`departure_time`='$edeparture_time',
    `special_request`='$especial_request',`promo_code`='$epromo_code',`cin`='$ecin',`cout`='$ecout' WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    $type_of_room = 0;
    if ($EditRoomType == "Superior Room") {
        $type_of_room = 3000;
    } else if ($EditRoomType == "Deluxe Room") {
        $type_of_room = 2000;
    } else if ($EditRoomType == "Guest House") {
        $type_of_room = 1500;
    } else if ($EditRoomType == "Single Room") {
        $type_of_room = 1000;
    }


    if ($EditBed == "Single") {
        $type_of_bed = $type_of_room * 1 / 100;
    } else if ($EditBed == "Double") {
        $type_of_bed = $type_of_room * 2 / 100;
    } else if ($EditBed == "Triple") {
        $type_of_bed = $type_of_room * 3 / 100;
    } else if ($EditBed == "Quad") {
        $type_of_bed = $type_of_room * 4 / 100;
    } else if ($EditBed == "None") {
        $type_of_bed = $type_of_room * 0 / 100;
    }

    if ($EditMeal == "Room only") {
        $type_of_meal = $type_of_bed * 0;
    } else if ($EditMeal == "Breakfast") {
        $type_of_meal = $type_of_bed * 2;
    } else if ($EditMeal == "Half Board") {
        $type_of_meal = $type_of_bed * 3;
    } else if ($EditMeal == "Full Board") {
        $type_of_meal = $type_of_bed * 4;
    }

    // noofday update
    $psql = "SELECT * from roombook where id = '$id'";
    $presult = mysqli_query($conn, $psql);
    $prow = mysqli_fetch_array($presult);
    $Editnoofday = $prow['nodays'];

    $editttot = $type_of_room * $Editnoofday * $EditNoofRoom;
    $editmepr = $type_of_meal * $Editnoofday;
    $editbtot = $type_of_bed * $Editnoofday;

    $editfintot = $editttot + $editmepr + $editbtot;

    $psql = "UPDATE payment SET Name = '$EditName',Email = '$EditEmail',RoomType='$EditRoomType',Bed='$EditBed',NoofRoom='$EditNoofRoom',Meal='$EditMeal',cin='$Editcin',cout='$Editcout',noofdays = '$Editnoofday',roomtotal = '$editttot',bedtotal = '$editbtot',mealtotal = '$editmepr',finaltotal = '$editfintot' WHERE id = '$id'";

    $paymentresult = mysqli_query($conn, $psql);

    if ($paymentresult) {
        header("Location:roombook.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./css/roombook.css">
    <style>
        #editpanel {
            position: fixed;
            z-index: 1000;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            /* align-items: center; */
            background-color: #00000079;
        }

        #editpanel .guestdetailpanelform {
            height: 620px;
            width: 1170px;
            background-color: #ccdff4;
            border-radius: 10px;
            /* temp */
            position: relative;
            top: 20px;
            animation: guestinfoform .3s ease;
        }

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
    <title>Document</title>
</head>

<body>
    <div id="editpanel">
        <form method="POST" class="guestdetailpanelform">
            <div class="head">
                <h3>EDIT RESERVATION</h3>
                <a href="./roombook.php"><i class="fa-solid fa-circle-xmark"></i></a>
            </div>

            <!-- ================= STEP 1: GUEST INFORMATION ================= -->
            <div class="form-step active" id="step1">
                <h4>Guest Information</h4>
                <button type="button" class="btn btn-outline-secondary w-100 mt-2" onclick="closeForm()">
                    Back to Home
                </button>

                <input type="text" name="firstname" placeholder="First Name" value = "<?php echo $firstname ?>" required>
                <input type="text" name="lastname" placeholder="Last Name" value = "<?php echo $lastname ?>" required>
                <input type="text" name="icnumber" placeholder="IC / Passport Number " value = "<?php echo $icnumber ?>" required>
                <input type="date" name="dob" placeholder="Date of Birth" value = "<?php echo $dob ?>" required>
                <input type="text" name="Country" placeholder="Country" value = "<?php echo $Country ?>" required>
                <input type="text" name="occupation" placeholder="Occupation" value = "<?php echo $occupation ?>" required>
                <input type="email" name="Email" placeholder="Email" value = "<?php echo $Email ?>" required>
                <input type="text" name="Phone" placeholder="Phone Number" value = "<?php echo $Phone ?>" required>
                <input type="text" name="address" placeholder="Home Address" value = "<?php echo $address ?>" required>
                <input type="text" name="city" placeholder="City" value = "<?php echo $city ?>" required>
                <input type="text" name="state" placeholder="State" value = "<?php echo $state ?>" required>
                <input type="text" name="postcode" placeholder="Postcode" value = "<?php echo $postcode ?>" required>
                <input type="text" name="Emergcontname" placeholder="Emergency Contact Name" value = "<?php echo $Emergcontname ?>" required>
                <input type="text" name="Emergcontphone" placeholder="Emergency Contact Phone" value = "<?php echo $Emergcontphone ?>" required>

                <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
            </div>

            <!-- ================= STEP 2: RESERVATION INFORMATION ================= -->
            <div class="form-step" id="step2">
                <h4>Reservation Information</h4>



                <input type="number" name="adult" placeholder="Number of Adults" value = "<?php echo $adult ?>" required>
                <input type="number" name="children" placeholder="Number of Children" value = "<?php echo $children ?>" required>

                <select name="RoomType" class="selectinput">
                    <option selected>Room Type</option>
                    <option value="Superior Room">Superior Room</option>
                    <option value="Deluxe Room">Deluxe Room</option>
                    <option value="Single Room">Single Room</option>
                    <option value="Guest House">Guest House</option>
                </select>

                <select name="Bed" class="selectinput">
                    <option selected>Bed Type</option>
                    <option value="Single">Single</option>
                    <option value="Double">Double</option>
                    <option value="Queen">Queen</option>
                    <option value="Triple">Triple</option>
                    <option value="Quad">Quad</option>
                </select>

                <input type="number" name="NoofRoom" placeholder="Number of Rooms" value = "<?php echo $NoofRoom ?>" required>


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

                <input type="text" name="arrival_time" placeholder="Expected Arrival Time" value = "<?php echo $arrival_time ?>" required>
                <input type="text" name="departure_time" placeholder="Expected Departure Time" value = "<?php echo $departure_time ?>" required>
                <input type="text" name="special_request" placeholder="Special Requests" value = "<?php echo $special_request ?>" required>
                <input type="text" name="promo_code" placeholder="Promo Code" value = "<?php echo $promo_code ?>" required>

                <label>Check-in</label>
                <input type="date" name="cin" value = "<?php echo $cin ?>">

                <label>Check-out</label>
                <input type="date" name="cout" value = "<?php echo $cout ?>"    >

                <button type="button" class="btn btn-secondary" onclick="prevStep()">Back</button>
                <div class="footer">
                    <button class="btn btn-success" name="guestdetailedit">Edit</button>
                </div>
        </form>
    </div>
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