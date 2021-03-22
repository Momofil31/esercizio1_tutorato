<?php
  include_once 'includes/config.inc.php';
?>

<html>

<head>
  <title>Esercizio 1 Tutorato</title>
  <style>
  .columns-div {
    column-count: 3;
    column-gap: 40px;
    width: 70%;
    margin: 0 auto;
  }

  table,
  th,
  td {
    border: solid 1px black;
  }
  </style>
</head>

<body>
  <a href="logout.php">Logout</a>
  <h1>Esercizio 1 Tutorato</h1>
  <div class="columns-div">
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto illum velit exercitationem non nobis est quia ipsa
    quis architecto ipsum harum quas officia nemo reprehenderit expedita, in optio dolorem! Ad, velit labore eveniet ab
    explicabo, molestias eum quasi repellendus incidunt aliquid sed aperiam error. Nobis voluptatum quae incidunt nemo
    quas obcaecati quis dolore hic neque mollitia assumenda ea quia ut sunt id asperiores error enim consequuntur
    dolores, nisi corporis debitis aliquid perspiciatis deleniti. Doloribus ipsa distinctio eius? Maxime totam facilis
    maiores voluptatem ducimus architecto distinctio, fuga eos nesciunt minima voluptates magnam officiis facere?
    Molestiae esse rerum sequi modi fugit nulla.
  </div>
  <br>

  <div class="search-form">
    <form action="index.php" method="get">
      <input type="text" name="search" placeholder="Ricercare per nome o per riferimento">
      <select name="category" id="inputCategory">
        <option <?php if (!isset($_POST['category'])) echo 'selected'; ?> disabled value>Selezionare una categoria
        </option>
        <?php 
        $query = "SELECT DISTINCT category_name FROM categories";
        foreach($pdo->query($query) as $row) {
          ?>
        <option value="<?php echo $row["category_name"] ?>"
          <?php if (isset($_POST["category"]) && $_POST["category"] == $row["category_name"]) echo "selected" ?>>
          <?php echo $row["category_name"] ?></option>
        <?php
        }
        ?>
      </select>
      <button type="submit">Search</button>
    </form>
  </div>
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Category</th>
      <th>Image Url</th>
    </tr>
    <?php
      $query = "SELECT * FROM products INNER JOIN categories on product_category = category_id WHERE  product_name LIKE :search AND category_name LIKE :category";
      
      $search = !empty($_GET['search']) ? $_GET['search'] : '%';
      $category = !empty($_GET['category']) ? $_GET['category'] : '%';
      
      $param = array('search' => $search, 'category' => $category);
      $stmt = $pdo->prepare($query);
      $stmt->execute($param);
      $results = $stmt->fetchAll();
      if ($results == null) {
        ?>
    <tr>
      <td colspan="4" style="text-align: center">Nessun risultato</td>
    </tr>
    <?php
      } else {
        foreach ($results as $row) { ?>
    <tr>
      <td><?php echo $row['product_id']; ?></td>
      <td><?php echo $row['product_name']; ?></td>
      <td><?php echo $row['category_name']; ?></td>
      <td><a href="<?php echo $row['product_imgurl']; ?>" target="_blank"><?php echo $row['product_imgurl']; ?></a></td>
    </tr>
    <?php
        }
      }
     ?>
  </table>
</body>

</html>