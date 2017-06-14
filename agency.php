<?php

include_once 'header.php';
include_once 'database.php';

$agency_id = $_GET['id'];

$query = "SELECT * FROM agencies WHERE id = $agency_id";
$result = mysqli_query($link, $query);
$agency = mysqli_fetch_array($result);
    
?>

<p><?php echo $agency['title'];?></p>
<form method="post" action="agency_comment_insert.php">
    <input type="hidden" name="agency_id"
               value="<?php echo $agency_id; ?>" />
    <textarea rows="5" cols="5" name="comment"></textarea>
    <input type="submit" name="submit">
    
</form>
<?php
$query = "SELECT *, ac.id AS acid 
                FROM agency_comments ac INNER JOIN
                users u ON ac.user_id=u.id     
                WHERE ac.agency_id = $agency_id
                ORDER BY ac.date_add DESC";
$result = mysqli_query($link, $query);
$st = 1;
    while ($row = mysqli_fetch_array($result)) {
        if ($st%2==0) {
            echo '<div class="soda">';
        }
        else {
            echo '<div class="liha">';
        }
                echo '<span class="username">'.
                $row['first_name'].' '.
                $row['last_name'].
                '</span> ';
            
                echo '<span class="commentdate">'.
                $row['date_add'].'
                </span>';
            
                echo '<hr />';
                echo $row['content'];
                
                if ($row['user_id'] == $_SESSION['user_id']) {
                echo '<a href="agency_comment_delete.php?id='.$row['acid'].'" onclick="return confirm(\'Ste prepričani?\')">
                Briši</a>';   
                }
        echo '</div>';
        $st ++;
    }
    
    ?>    
        
<?php 
include_once 'footer.php';
?>
