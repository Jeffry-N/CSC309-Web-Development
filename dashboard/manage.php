<?php 
include 'db.php';
include 'header.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
  header("Location: index.php");
  exit();
}
?>
<table style="text-align: center; width: 100%;">
  <tr>
    <td style="display: inline-block;">
      <a href="manageCategory.php">
        <img src="images/managecategory.png" alt="Manage Categories">
        <br>
        <span class="inda">Manage Categories</span>
      </a>
    </td>
    <td style="display: inline-block;">
      <a href="manageProduct.php">
        <img src="images/manageproducts.png" alt="Manage Products">
        <br>
        <span class="inda">Manage Products</span>
      </a>
    </td>
    <td style="display: inline-block;">
      <a href="manageUsers.php">
        <img src="images/manageusers.png" alt="Manage Users">
        <br>
        <span class="inda">Manage Users</span>
      </a>
    </td>
  </tr>
</table>
<?php
include 'footer.php';
?>