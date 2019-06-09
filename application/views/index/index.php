<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h5>视图</h5>
<?php
    foreach ($list as $val){
        echo "<h2>".$val['prescription_name']."</h2>";
    }
?>
</body>
</html>