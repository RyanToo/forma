<?php 
include_once 'config.php';
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Библиотека</title>
</head>
<body>
	<h1>Библиотека успе[f</h1>
	<div class="form">
	    <form method="GET">
            <input type="text" name="isbn" placeholder="ISB" value="" />
            <input type="text" name="name" placeholder="Название книги" value="" />
            <input type="text" name="author" placeholder="Автор книги" value="" />
            <input type="submit" value="Поиск" />
        </form>
    </div>

	<table>
    <tr>
    	<th>№</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISB</th>
    </tr>

    <?php 
    $where = [];
    if (isset($_GET['author'])) {
    	$where[] = "`author` LIKE '%{$_GET['author']}%'";
    }

    if (isset($_GET['name'])) { 
    	$where[] = "`name` LIKE '%{$_GET['name']}%'";
    }
    	
    if (isset($_GET['isb'])) { 
    	$where[] = "`isb` LIKE '%{$_GET['isb']}%'";
    }

    $where_str = (COUNT($where)>0) ? implode(" && ",$where) : "";
        
    if ($where_str == null) {
    	$sql = "SELECT * FROM books";
    }else {
    	$sql = "SELECT * FROM books WHERE $where_str";
    }
 foreach ($db->query($sql) as $row) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['author'] ?></td>
          <td><?= $row['year'] ?></td>
          <td><?= $row['genre'] ?></td>
          <td><?= $row['isb'] ?></td>
        </tr>
     <?php } ?> 	
</body>
</html>



