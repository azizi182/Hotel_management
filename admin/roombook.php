<?php
session_start();
include '../config.php';

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
    <title>BlueBird - Admin</title>

    <style>
        #guestdetailpanel {
    display: none;
    justify-content: center;
    align-items: center;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    z-index: 999;
}

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
    <!-- guestdetailpanel -->

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

        <?php
        // <!-- room availablity start-->

        $rsql = "SELECT * from room";
        $rre = mysqli_query($conn, $rsql);
        $r = 0;
        $sc = 0;
        $gh = 0;
        $sr = 0;
        $dr = 0;

        while ($rrow = mysqli_fetch_array($rre)) {
            $r = $r + 1;
            $s = $rrow['type'];
            if ($s == "Superior Room") {
                $sc = $sc + 1;
            }
            if ($s == "Guest House") {
                $gh = $gh + 1;
            }
            if ($s == "Single Room") {
                $sr = $sr + 1;
            }
            if ($s == "Deluxe Room") {
                $dr = $dr + 1;
            }
        }

        $csql = "SELECT * from payment";
        $cre = mysqli_query($conn, $csql);
        $cr = 0;
        $csc = 0;
        $cgh = 0;
        $csr = 0;
        $cdr = 0;
        while ($crow = mysqli_fetch_array($cre)) {
            $cr = $cr + 1;
            $cs = $crow['RoomType'];

            if ($cs == "Superior Room") {
                $csc = $csc + 1;
            }

            if ($cs == "Guest House") {
                $cgh = $cgh + 1;
            }
            if ($cs == "Single Room") {
                $csr = $csr + 1;
            }
            if ($cs == "Deluxe Room") {
                $cdr = $cdr + 1;
            }
        }
        // room availablity
        // Superior Room =>
        $f1 = $sc - $csc;
        if ($f1 <= 0) {
            $f1 = "NO";
        }
        // Guest House =>
        $f2 =  $gh - $cgh;
        if ($f2 <= 0) {
            $f2 = "NO";
        }
        // Single Room =>
        $f3 = $sr - $csr;
        if ($f3 <= 0) {
            $f3 = "NO";
        }
        // Deluxe Room =>
        $f4 = $dr - $cdr;
        if ($f4 <= 0) {
            $f4 = "NO";
        }
        //total available room =>
        $f5 = $r - $cr;
        if ($f5 <= 0) {
            $f5 = "NO";
        }
        ?>
        <!-- room availablity end-->

        <!-- ==== room book php ====-->
        <?php
        if (isset($_POST['guestdetailsubmit'])) {
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
                    echo "<script>swal({
                                title: 'Reservation successful',
                                icon: 'success',
                            });
                        </script>";
                } else {
                    echo "<script>swal({
                                    title: 'Something went wrong',
                                    icon: 'error',
                                });
                        </script>";
                }
                // }
            }
        }
        ?>
    </div>


    <!-- ================================================= -->
    <div class="searchsection">
        <input type="text" name="search_bar" id="search_bar" placeholder="search..." onkeyup="searchFun()">
        <button class="adduser" id="adduser" onclick="adduseropen()"><i class="fa-solid fa-bookmark"></i> Add</button>
        <form action="./exportdata.php" method="post">
            <button class="exportexcel" id="exportexcel" name="exportexcel" type="submit"><i class="fa-solid fa-file-arrow-down"></i></button>
        </form>
    </div>

    <div class="roombooktable" class="table-responsive-xl">
        <?php
        $roombooktablesql = "SELECT * FROM roombook";
        $roombookresult = mysqli_query($conn, $roombooktablesql);
        $nums = mysqli_num_rows($roombookresult);
        ?>
        <table class="table table-bordered" id="table-data">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Country</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Type of Room</th>
                    <th scope="col">Type of Bed</th>
                    <th scope="col">No of Room</th>
                    <th scope="col">Meal</th>
                    <th scope="col">Check-In</th>
                    <th scope="col">Check-Out</th>
                    <th scope="col">No of Day</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="action">Action</th>
                    <!-- <th>Delete</th> -->
                </tr>
            </thead>

            <tbody>
                <?php
                while ($res = mysqli_fetch_array($roombookresult)) {
                ?>
                    <tr>
                        <td><?php echo $res['id'] ?></td>
                        <td><?php echo $res['firstname'] . " " . $res['lastname'] ?></td>
                        <td><?php echo $res['Email'] ?></td>
                        <td><?php echo $res['Country'] ?></td>
                        <td><?php echo $res['Phone'] ?></td>
                        <td><?php echo $res['RoomType'] ?></td>
                        <td><?php echo $res['Bed'] ?></td>
                        <td><?php echo $res['NoofRoom'] ?></td>
                        <td><?php echo $res['Meal'] ?></td>
                        <td><?php echo $res['cin'] ?></td>
                        <td><?php echo $res['cout'] ?></td>
                        <td><?php echo $res['nodays'] ?></td>
                        <td><?php echo $res['stat'] ?></td>
                        <td class="action">
                            <?php
                            if ($res['stat'] == "Confirm") {
                                echo " ";
                            } else {
                                echo "<a href='roomconfirm.php?id=" . $res['id'] . "'><button class='btn btn-success'>Confirm</button></a>";
                            }
                            ?>
                            <a href="roombookedit.php?id=<?php echo $res['id'] ?>"><button class="btn btn-primary">Edit</button></a>
                            <a href="roombookdelete.php?id=<?php echo $res['id'] ?>"><button class='btn btn-danger'>Delete</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    var detailpanel = document.getElementById("guestdetailpanel");

adduseropen = () => {
    detailpanel.style.display = "flex";
}
adduserclose = () => {
    detailpanel.style.display = "none";
}

//search bar logic using js
const searchFun = () =>{
    let filter = document.getElementById('search_bar').value.toUpperCase();

    let myTable = document.getElementById("table-data");

    let tr = myTable.getElementsByTagName('tr');

    for(var i = 0; i< tr.length;i++){
        let td = tr[i].getElementsByTagName('td')[1];

        if(td){
            let textvalue = td.textContent || td.innerHTML;

            if(textvalue.toUpperCase().indexOf(filter) > -1){
                tr[i].style.display = "";
            }else{
                tr[i].style.display = "none";
            }
        }
    }

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
    detailpanel.style.display = "none";
    document.getElementById("step2").classList.remove("active");
    document.getElementById("step1").classList.add("active");
}
</script>



</html>