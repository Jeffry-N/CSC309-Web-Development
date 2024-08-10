<?php
include 'db.php';
include 'header.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$categoryId = isset($_GET['cId']) ? $_GET['cId'] : '';

$sql = "SELECT * FROM Products WHERE 1=1";

if (!empty($categoryId)) {
    $sql .= " AND categoryId = $categoryId";
}

if (!empty($search)) {
    $sql .= " AND (title LIKE '%$search%' OR description LIKE '%$search%')";
}

$result = $conn->query($sql);
?>

<center><h1>Product List</h1></center>
<center>
    <table>
        <?php 
        $count = 0;
        while ($row = $result->fetch_assoc()) { 
            if ($count % 4 == 0) {
                if ($count > 0) {
                    echo '</tr>';
                }
                echo '<tr>';
            }
            ?>
            <td>
                <a href="productDetails.php?id=<?php echo $row['id']; ?>" class="inda">
                    <img src="images/products/<?php echo $row['imgename']; ?>" alt="<?php echo $row['title']; ?>" width="100">
                    <center><p><?php echo $row['title'];?> - <?php echo $row['price']; ?></p></center>
                </a>
            </td>
            <?php 
            $count++;
        } 

        if ($count % 4 != 0) {
            echo '</tr>';
        }
        ?>
    </table>
</center>

<?php include 'footer.php'; ?>