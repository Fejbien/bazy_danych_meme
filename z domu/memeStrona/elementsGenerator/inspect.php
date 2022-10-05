<?php
$conn = new mysqli("localhost", "root", "", "memes");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT
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
            m.deleted_at IS NULL AND m.id=". $_GET['memeID'] .";";

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
                </div>
            </div>";
    }
}

$sql = "SELECT
            u.user_name,
            c.content,
            c.created_at,
            c.modified_at,
            c.deleted_at
        FROM
            comments as c
        JOIN
            users as u
        ON	u.id = c.users_id
        WHERE
            deleted_at IS NULL AND c.memes_id = ". $_GET['memeID'] .";";

$result = $conn->query($sql);

echo "<div class='commentsSection'>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='commentDiv'>
                <div class='commentData'>                
                    <p><b>". $row['user_name'] ."</b> · ". $row['created_at'] ."</p>
                </div>
                <div class='commentText'>
                    <p>". $row['content'] ."</p>
                </div>
            </div>";
    }
}
else{
    echo "<div class='noComments'><p>No comments!</p></div>";
}
echo "</div>";

$conn->close();
?>