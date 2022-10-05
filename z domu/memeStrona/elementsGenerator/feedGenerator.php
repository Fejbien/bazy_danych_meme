<?php
$conn = new mysqli("localhost", "root", "", "memes");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$row_count = 10;
$offset = 0;

if (isset($_GET['page']) && $_GET['page'] > 1) {
    $offset = $row_count * ($_GET['page'] - 1);
}

$sql = "SELECT
            m.id,
            m.title,
            m.file,
            m.likes,
            m.created_at AS 'date',
            u1.user_name AS 'author',
            u2.user_name AS 'admin'
        FROM
            memes as m
        JOIN users as u1 ON
            m.users_id = u1.id
        JOIN users as u2 ON
            m.admin_id = u2.id
        WHERE
            m.deleted_at IS NULL
        LIMIT " . $row_count . " OFFSET " . $offset . ";";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='panel'>
                <div class='panelBar'>
                    <button>&#9650;</button>
                    <p>" . $row['likes'] . "</p>
                    <button>&#9660;</button>
                </div>
                <div class='panelMeme'>
                    <div class='panelCreation'>
                        <p>Posted by " . $row['author'] . "  •  At " . $row['date'] . "</p>
                    </div>
                    <div class='panelTitle'>
                            <h1>" . $row['title'] . "</h1>
                    </div>
        
                    <div class='panelImg'>
                        <img src='memesImages/" . $row['file'] . "'>
                    </div>
        
                    <div class='panelComments'>
                        <form action='memeInspect.php' method='GET'>
                            <input type='number' id='memeID' name='memeID' value=". $row['id'] ." hidden/>
                            <input type='submit' value='Comments section' class='arrowsInput'>
                        </form>
                    </div>
                </div>
            </div>";
    }
}
else{
    echo "<div class='panel' style='align-items: center; justify-content: center; font-size: 300%;'><p>No memes at this page!</p></div>";
}

$conn->close();
?>