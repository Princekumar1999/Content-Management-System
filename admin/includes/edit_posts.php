<?php
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }
// Set a query that will fetch the data from posts table
// according to requested post_id.
$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_posts_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title"  value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <select name="post_category" id="">
        <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);

            confirmQuery($select_categories);

            while($row = mysqli_fetch_assoc($select_categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";}
        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author"  value="<?php echo $post_author; ?>">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status"  value="<?php echo $post_status; ?>">
    </div>
    <div class="form-group">
        
    <img src="../images/<?php echo $post_image; ?>" width="100" alt="">
    </div>

    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" class="form-control" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Publish Post" name="create_post">
    </div>
</form>