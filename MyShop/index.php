<?php
include 'db.php';
include 'header.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<center><h1>Apple Store</h1></center>
<center><table>
    <tr>
        <?php
                 $count = 0;
        while ($row = $result->fetch_assoc()) { 
            if ($count % 4 == 0) {
                if ($count > 0) {
                    echo '</tr>';
                }
                echo '<tr>';
            } ?>
            <td>
                <a href="products.php?cId=<?php echo $row['cid']; ?>"class="inda">
                    <img src="images/categories/<?php echo $row['imageName']; ?>" alt="<?php echo $row['cName']; ?>" width="100">
                    <center><p style="color: #333;"><?php echo $row['cName']; ?></p></center>
                </a>
            </td>
        <?php  $count++;
        } 
        
        if ($count % 4 != 0) {
            echo '</tr>';
        } ?>
    </tr>
</table></center>

<?php include 'footer.php'; ?>