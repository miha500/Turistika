<?php
    include_once 'header.php';
?>
        <table border="3">
            <tr>
                <th>ime</th>
                <th>email</th>
            </tr> 
                <?php
                include 'database.php';
                $query = "SELECT first_name, email FROM users WHERE admin = 3";
                $result = mysqli_query($link, $query);
                while ($users = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $users;
                    echo "</td>";
                    echo "</tr>";                                   
                }
        
        ?>
        <input type="submit" value="Accept" />
        <input type="reset" value="Deny" />
        </table>
<?php
    include_once 'footer.php';
?>
