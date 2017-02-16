<html>

<body>
<select name="sss">
    <option value="">Select</option>
    <?php

    echo $q="select * from im_class";
    $s=mysql_query($q);
    while($e=mysql_fetch_array($s))
    {
        echo "<option value='".$e["class_id"]."'>".$e["name"]."</option>";
    }

    ?>
</select>
</body>
</html>