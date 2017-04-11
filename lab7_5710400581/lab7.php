<!-- Group by 11 -->
<html>
<head>
<style type="text/css">
    /* Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://demos.w3lessons.info/assets/js/tableexport/tableExport.js"></script>
<script type="text/javascript" src="http://demos.w3lessons.info/assets/js/tableexport/jquery.base64.js"></script>
<script type="text/javascript" src="http://demos.w3lessons.info/assets/js/tableexport/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="http://demos.w3lessons.info/assets/js/tableexport/jspdf/jspdf.js"></script>
<script type="text/javascript" src="http://demos.w3lessons.info/assets/js/tableexport/jspdf/libs/base64.js"></script>
<meta charset="utf-8">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dreamhome";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT type,avg(rent) FROM `dreamhome`.`propertyforrent` GROUP BY type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $string = '';
    $string .="<table border='1'><tr><th>Type</th><th>Avg(Rent)</th></tr>";
    while($row = $result->fetch_assoc()) {    	
        $string .= "<tr><td>".$row["type"]."</td><td>".$row["avg(rent)"]."</td></tr>";
    }
    $string .= "</table>";
}
    
 else {
    echo "0 results";
}
$conn->close();
?>
<div id ="tableID">
    <?php echo $string;?>
</div>

<br>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Select Download Type</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#" onClick ="$('#tableID').tableExport({type:'pdf',escape:'false'});">PDF</a>
    <a href="#" onClick ="$('#tableID').tableExport({type:'excel',escape:'false'});">EXCEL</a>
    <a href="#" onClick ="$('#tableID').tableExport({type:'csv',escape:'false'});">CSV</a>
  </div>
</div>

</body>
</html>