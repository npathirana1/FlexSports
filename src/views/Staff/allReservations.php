<?php
include "../../config/db.php";
?>

<?php if (isset($_SESSION['managerID'])) {
    $userEmail = $_SESSION['managerID'];
}

if (isset($_SESSION['receptionistID'])) {
    $userEmail = $_SESSION['receptionistID'];
}

// function getTS($date){
//     if (false ===preg_match('/\d{4}-\d{2}-\d{2}/i', $date))
//         return 0;
//     list($year,$month,$day) = explode('-',$date);
//     return mktime(0,0,0,$month,$day,$year);
// }
//Get Today and Yesterday Timestamp.
$today = date('Y-m-d');
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Reservations</title>

    <style>
        .reserve {
            width: 150px;
            font-weight: bold;
            background-color: #0F305B;
        }

        .box-1,
        .box-2 {
            display: inline-block;
            width: 50%;
            height: 10px;
        }

        .box-2 {
            text-align: right;
        }

        #searchDate,
        #searchName,
        #searchFacP,
        #searchNameP,
        #searchNameC {
            background-image: url('../../assets/Images/searchIcon.png');
            background-size: 30px 30px;
            background-position: 5px 5px;
            background-repeat: no-repeat;
            width: 25%;
            height: 40px;
            font-size: 14px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin-bottom: 12px;
            margin-right: 120px;
            float: right;
        }
    </style>

</head>

<body>

    <?php
    if (isset($_SESSION['managerID'])) {
        include "../Manager/managerIncludes/ManagerNavigation.php";
    } elseif (isset($_SESSION['receptionistID'])) {
        include "../Receptionist/receptionistIncludes/receptionistNavigation.php";
    }
    ?>

    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item" style="color: #fff;">Reservations</li>
                        <li class="breadcrumb-item"><a href="allReservations.php" style="color: #42ecf5;">Reservation List</a></li>
                        <!-- <li class="breadcrumb-item"><a href="../StaffReservation/addReservation.php">Add Reservation</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="home-content">
            <div class="header"></br></br></br>
                <div class="box-1 table_topic">
                    <h2>Customer Reservations</h2>
                </div>
                <!-- <div class="box-2" style="float: right;"><button class="button reserve" onClick="window.location.href='addReservation.php';" style="padding:10px;">Add new reservation</button></div> -->
            </div>
            </br>
            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'Upcoming')" id="defaultOpen">Upcoming Reservations</button>
                <button class="tablinks" onclick="openTable(event, 'Past')">Past Reservations</button>
                <button class="tablinks" onclick="openTable(event, 'Cancelled')">Cancelled Reservations</button>
            </div>
            <div id="Upcoming" class="tabcontent">

                <div class="grid-container" style="margin-left: 110px;">
                    <div class="grid-item item1"><input type="text" id="searchDate" placeholder="Search by date.." title="facility" onkeyup="searchDate()"></div>
                    <div class="grid-item item2"><input type="text" id="searchName" placeholder="Search by Name.." title="date" onkeyup="searchName()"></div>
                </div>

                <table style="width:95%; margin-left:-7%" class="table_view" id="upcomingRes">
                    <thead>
                        <tr>
                            <th style="width: 9%;">Reservation date</th>
                            <th style="width: 20%;">Time</th>
                            <th style="width: 8%;">Facility</th>
                            <th style="width: 14%;">Customer Name</th>
                            <th style="width: 10%;">Contact No</th>
                            <th style="width: 8%;">Reservation Status</th>
                            <th style="width: 8%;">Payment Status</th>
                            <th style="text-align:center;width: 12%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $today = date('Y-m-d', time());
                        $viewRes = "SELECT * FROM reservation WHERE date >= '$today' AND NOT ReservationStatus = 'Cancelled' ORDER BY date ASC ";
                        $rResult = mysqli_query($conn, $viewRes);
                        while ($rowRes = mysqli_fetch_assoc($rResult)) { ?>
                            <tr>
                                <td><?php echo $rowRes["date"]; ?></td>
                                <td><?php echo $rowRes["timeslot"]; ?></td>
                                <td><?php echo $rowRes["FacilityName"]; ?></td>
                                <td><?php echo $rowRes["CustName"]; ?></td>
                                <td><?php echo $rowRes["TelNo"]; ?></td>
                                <td><?php echo $rowRes["ReservationStatus"]; ?></td>
                                <td><?php echo $rowRes["PaymentStatus"]; ?></td>
                                <!-- <td><a href="#modal-update"><button id="myBtn" class="button update">Update</button></a></td>
                                <td><button class="button remove">Delete</button></td> -->
                                <td>

                                    <a href="calendarIndexUpdate.php?id=<?php echo $rowRes["ReservationNo"]; ?>&facility=<?php echo $rowRes["FacilityName"]; ?>"><button class='action update edit_data' type="button" name="edit" value="Edit" id="<?php echo $row["CustomerID"]; ?>" data-toggle="modal"><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i></button></a>
                                    <a href="#modal-delete"><button class='action remove delete_data' type="button" name="delete" value="Delete" id="<?php echo $rowRes["ReservationNo"]; ?>" data-toggle="modal"><i class='fa fa-trash RepImage' aria-hidden='true'></i></button></a>

                                </td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


            <div id="Past" class="tabcontent" id="past">

                <div class="grid-container" style="margin-left: 110px;">
                    <div class="grid-item item1"><input type="text" id="searchFacP" placeholder="Search by facility.." title="facility" onkeyup="searchFacilityP()"></div>
                    <div class="grid-item item2"><input type="text" id="searchNameP" placeholder="Search by Name.." title="date" onkeyup="searchNameP()"></div>
                </div>

                <table style="width:95%; margin-left:-7%" class="table_view" id="pastRes">
                    <thead>
                        <tr>
                            <th>Reservation date</th>
                            <th>Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $today = date('Y-m-d', time());
                        $viewRes = "SELECT * FROM reservation WHERE date < '$today' AND NOT ReservationStatus = 'Cancelled' ";
                        $rResult = mysqli_query($conn, $viewRes);
                        while ($rowRes = mysqli_fetch_assoc($rResult)) { ?>
                            <tr>
                                <td><?php echo $rowRes["date"]; ?></td>
                                <td><?php echo $rowRes["timeslot"]; ?></td>
                                <td><?php echo $rowRes["FacilityName"]; ?></td>
                                <td><?php echo $rowRes["CustName"]; ?></td>
                                <td><?php echo $rowRes["PaymentStatus"]; ?></td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div id="Cancelled" class="tabcontent">

                <div class="grid-container" style="margin-left: 110px;">
                    <div class="grid-item item2"><input type="text" id="searchNameC" placeholder="Search by Name.." title="date" onkeyup="searchNameC()"></div>
                </div>

                <table style="width:95%; margin-left:-7%" class="table_view" id="cancelled">
                    <thead>
                        <tr>
                            <th>Reservation date</th>
                            <th>Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $today = date('Y-m-d', time());
                        $viewRes = "SELECT * FROM reservation WHERE ReservationStatus = 'Cancelled' ";
                        $rResult = mysqli_query($conn, $viewRes);
                        while ($rowRes = mysqli_fetch_assoc($rResult)) { ?>
                            <tr>
                                <td><?php echo $rowRes["date"]; ?></td>
                                <td><?php echo $rowRes["timeslotx"]; ?></td>
                                <td><?php echo $rowRes["FacilityName"]; ?></td>
                                <td><?php echo $rowRes["CustName"]; ?></td>
                                <td><?php echo $rowRes["ReservationStatus"]; ?></td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="wrapper">
            <div class="icon add">
                <div class="tooltip">Add Reservation</div>
                <span><a href="../Staff/addReservation.php" class="link-1" id="modal-closed"><i class="fas fa-plus" style="font-size: 25px;"></i></a></span>
            </div>
        </div>

        <script>
            function openTable(evt, Period) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Period).style.display = "block";
                evt.currentTarget.className += " active";
            }

            document.getElementById("defaultOpen").click();
        </script>

    </section>
</body>

</html>

<!-- delete confirmation-->
<div class="modal-body">
    <div class="modal-container" id="modal-delete">
        <div class="modal">

            <form action="./staffIncludes/cancelReservation.inc.php" method="post" id="insert_form">
                <div class="form-body">
                    <div class="horizontal-group">
                        <h3>Are you sure you want to cancel this reservation?</h3>
                    </div>
                    <div class="form-group">
                        <br>
                        <p>The reservation you are trying to cancel will be permanantly removed and you will have to make a new reservation to use the facility.</p>
                        <br>
                    </div>
                </div>
                <input type="hidden" name="res_id" id="res_id" />
                <div class="form-footer-d ">
                    <a href="allReservations.php" class="cancel_btn">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-primary form_btn_dlt">Delete</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- <script>
    $(document).ready(function() {

        $(document).on('click', '.edit_data', function() {
            var customer_id = $(this).attr("id");
            $.ajax({
                url: "managerIncludes/fetchCustomer.inc.php",
                method: "POST",
                data: {
                    customer_id: customer_id
                },
                dataType: "json",
                success: function(data) {
                    $('#fname').val(data.FName);
                    $('#lname').val(data.LName);
                    $('#email').val(data.Email);
                    $('#telNo').val(data.TelephoneNo);
                    $('#nic').val(data.NIC);
                    $('#customer_id').val(data.CustomerID);
                }
            });
        }); 
    });
</script> -->

<script>
    $(document).ready(function() {
        $(document).on('click', '.delete_data', function() {
            var res_id = $(this).attr("id");
            if (res_id != '') {

                $.ajax({
                    url: "./staffIncludes/fetchReservation.inc.php",
                    method: "POST",
                    data: {
                        res_id: res_id
                    },
                    dataType: "json",
                    success: function(value) {

                        $('#res_id').val(value.ReservationNo);

                    }
                });
            }

        });
    });
</script>

<script>
    function searchDate() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchDate");
        filter = input.value.toUpperCase();
        table = document.getElementById("upcomingRes");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchName() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchName");
        filter = input.value.toUpperCase();
        table = document.getElementById("upcomingRes");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchFacilityP() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchFacP");
        filter = input.value.toUpperCase();
        table = document.getElementById("pastRes");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchNameP() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchNameP");
        filter = input.value.toUpperCase();
        table = document.getElementById("pastRes");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchNameC() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchNameC");
        filter = input.value.toUpperCase();
        table = document.getElementById("cancelled");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>