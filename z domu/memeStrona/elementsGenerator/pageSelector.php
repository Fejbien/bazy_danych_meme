<?php
$conn = new mysqli("localhost", "root", "", "memes");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(id) as memesCount FROM `memes` WHERE 1;";
$result = $conn->query($sql);
$memesCount = $result->fetch_assoc()["memesCount"];

$currentPage = 1;

if (isset($_GET['page']) && $_GET['page'] > 1) {
    $currentPage = $_GET['page'];
}

if($currentPage - 1 > 0)
    echo "<form method='GET'>
            <input type='number' id='page' name='page' value=". ($currentPage - 1) ." hidden/>
            <input type='submit' value='&#9664;' class='arrowsInput'>
        </form>";

echo "<form method='GET'>
        <input type='number' id='page' name='page' placeholder=". $currentPage .">
        <input type='submit' hidden/>
    </form>";

if($memesCount > $currentPage * $GLOBALS['row_count'])
    echo "<form method='GET'>
            <input type='number' id='page' name='page' value=". ($currentPage + 1) ." hidden/>
            <input type='submit' value='&#9654;' class='arrowsInput'>
        </form>";

$conn->close();
?>