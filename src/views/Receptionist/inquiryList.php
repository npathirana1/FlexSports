<?php
include("../../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inquiries</title>


    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
    <style>
        .home-section .home-content {
            padding-top: 8%;
            position: relative;
        }

        .modal {
            width: 30%;
            height: 75%;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;

            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        .form_btn {
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 30%;
        }

        .form-footer {
            margin-top: 8px;
        }
        #searchNameN,
        #searchNameR {
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

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item" style="color:#fff;">Inquiries /</li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="home-content">
            <h2 class="table_topic">Inquiries</h2>
            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'Upcoming')" id="defaultOpen">Open Inquiries</button>
                <button class="tablinks" onclick="openTable(event, 'Past')">Responded Inquiries</button>
            </div>

            <div id="Upcoming" class="tabcontent">

                <input type="text" id="searchNameN" placeholder="Search by sender name.." title="senderName" onkeyup="searchNameN()">


                <table style="width:95%; margin-left:-7%" class="table_view" id="inqN">
                    <thead>
                        <tr>
                            <th>Sender Name</th>
                            <th style="width:25%;">Sender Email</th>
                            <th style="width:30%;">Inquiry</th>
                            <th style="width:15%;">Category</th>
                            <th style="width: 5%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $viewInquiry = "SELECT * FROM inquiry WHERE InquiryType ='Facility' OR InquiryType ='Other' AND InquiryStatus = 'Not Responded'";
                        $result = mysqli_query($conn, $viewInquiry);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row["SenderName"]; ?></td>
                                <td><?php echo $row["SenderEmail"]; ?></td>
                                <td><?php echo $row["Description"]; ?></td>
                                <td><?php echo $row["InquiryType"]; ?></td>

                                <td>
                                    <a href="replyInquiry.php?sendername=<?php echo $row["SenderName"]; ?>&email=<?php echo $row["SenderEmail"]; ?>&inquiry=<?php echo $row["Description"]; ?>&no=<?php echo $row["InquiryNo"]; ?>"><button class='action update'><i class='fa fa-envelope-o RepImage' aria-hidden='true'></i></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

            <div id="Past" class="tabcontent">

            <input type="text" id="searchNameR" placeholder="Search by sender name.." title="senderName" onkeyup="searchNameR()">


                <table style="width:95%; margin-left:-7%" class="table_view" id="inqR">
                    <thead>
                        <tr>
                            <th>Sender Name</th>
                            <th style="width:20%;">Sender Email</th>
                            <th style="width:30%;">Inquiry</th>
                            <th style="width:25%;">Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $viewInquiry = "SELECT * FROM inquiry WHERE InquiryType ='Facility' OR InquiryType ='Other' AND InquiryStatus = 'Responded'";
                        $result = mysqli_query($conn, $viewInquiry);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row["SenderName"]; ?></td>
                                <td><?php echo $row["SenderEmail"]; ?></td>
                                <td><?php echo $row["Description"]; ?></td>
                                <td><?php echo $row["Reply"]; ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>


</body>

</html>

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

<script>
    function searchNameN() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchNameN");
        filter = input.value.toUpperCase();
        table = document.getElementById("inqN");
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
    function searchNameR() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchNameR");
        filter = input.value.toUpperCase();
        table = document.getElementById("inqR");
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
</script>