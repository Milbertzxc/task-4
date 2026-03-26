<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Post System</title>
    <script src="js/script.js"></script>
</head>
<body>

<h2>Posts</h2>

<?php
$result = $conn->query("SELECT * FROM posts");

while($row = $result->fetch_assoc()) {
?>
    <div style="border:1px solid #000; padding:10px; margin:10px;">
        
        <!-- POST -->
        <p><?php echo $row['content']; ?></p>

        <!-- LIKE -->
        <button onclick="likePost(<?php echo $row['id']; ?>)">Like</button>
        <span id="like-count-<?php echo $row['id']; ?>">0</span>

        <!-- COMMENT INPUT -->
        <br><br>
        <input type="text" id="comment-<?php echo $row['id']; ?>" placeholder="Write comment">
        <button onclick="addComment(<?php echo $row['id']; ?>)">Comment</button>

        <hr>

        <!-- COMMENTS -->
        <?php
        $comments = $conn->query("SELECT * FROM comments WHERE post_id=".$row['id']);

        while($c = $comments->fetch_assoc()) {
        ?>
            <div>
                <span id="comment-text-<?php echo $c['id']; ?>">
                    <?php echo $c['comment']; ?>
                </span>

                <button onclick="editComment(<?php echo $c['id']; ?>)">Edit</button>
                <button onclick="deleteComment(<?php echo $c['id']; ?>)">Delete</button>
            </div>
        <?php } ?>

    </div>
<?php } ?>

</body>
</html>