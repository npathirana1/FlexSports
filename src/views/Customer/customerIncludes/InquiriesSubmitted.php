<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inquiries</title>
    <link rel="stylesheet" type="text/css" href="../../../assets/CSS/viewTables.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/CSS/InquiriesSubmitted.css">

    
</head> 

<body>

  

    <section class="home-section-table">
        <h2 class="table_topic">Inquiries</h2>

        <!-- <input type="text" id="search" placeholder="Search by sender name.." title="senderName"> -->
       

        <table style="width:90%;" class="table_view">
            <thead>
                <tr>
                    <th>Sender Name</th>
                    <th>Sender Email</th>
                    <th>Inquiry</th>
                    <th>Response</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
            <?php
// $link = mysqli_connect("localhost", "root", "Amaya#Ashane2017", "FlexSports");

// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }
// $sql = "SELECT SenderName, SenderEmail, Description, Reply FROM inquiry";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {

// while($row = $result->fetch_assoc()) {
// echo "<tr><td>" . $row["SenderName"]. "</td><td>" . $row["SenderEmail"] . "</td><td>"
// . $row["Description"]."</td><td>" . $row["Reply"]. "</td></tr>";
// }
// echo "</tbody>";
// echo "</table>";
// } else { echo "0 results"; }
// $conn->close();
// ?>
                <tr>
                    <td>Nethmi Pathirana</td>
                    <td>nethmi.pathirana@gmail.com</td>
                    <td>Is the pool open after 9 p.m on Friday?</td>
                    <td>Unfortunately the pool will be closed after 7 p.m on Fridays for cleaning purposes.</td>
                    <td><button class="button remove">Withdraw</button></td>
                </tr>
                <tr>
                    <td>Sandali Boteju</td>
                    <td>sandali@yahoo.com</td>
                    <td>Are there any packages available to book the entire sport's facility</td>
                    <td>Kindly inquire us via the main line regarding this matter.</td>
                    <td><button class="button remove">Withdraw</button></td>
                </tr> -->
            <!-- </tbody>
        </table>
    </section>

    

</body>



</html>