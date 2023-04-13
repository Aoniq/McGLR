<!DOCTYPE html>
<html>
<head>
    <title>MacMedia Cash Register</title>
    <script src="./cash_register.js" defer></script>
</head>

<body>
    <h1>Welcome to MacMedia</h1>
    <?php
        //Connect to database
        $db = new SQLite3("./dbMacMedia.db");
        $db->busyTimeout(5000);
        
        //Create query and execute query
        $query = "SELECT * FROM snacks";
        $result = $db->query($query);
    ?>
    <table>
    <?php
        //Read results from query and create the button, number and price field for each result
        while($snack = $result->fetchArray(SQLITE3_ASSOC)) {?>
            <tr>
                <td><button type="button" onclick="addSnack('<?php echo $snack['snackName']?>', <?php echo $snack['snackPrice']?>, '<?php echo $snack['ID']?>')">
                    <?php echo $snack['snackName']?> <br> <?php echo $snack['snackPrice'];?></button></td>
                <td>How many: <input type="text" id="howMany<?php echo $snack['ID']?>" disabled></td>
                <td>Price: <input type="text" id="totalPrice<?php echo $snack['ID']?>" disabled></td>
            </tr>
    <?php }; ?>
    </table>
    <p>
        <strong>Total amount for this order:</strong>
        <input type="text" id="totalOrderAmount" disabled>
        <button type="button">Check out</button>
    </p>
 </body>

</body>
</html>
