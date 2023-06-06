<!doctype html>
<html lang="en">

<head>
    <?php
require_once("externalFile.php");    
?>
    <title>jQuery UI Datepicker - Display month &amp; year menus</title>
</head>

<body>
    <?php
require_once("header.php");    
?>

    <p>Date: <input type="text" id="datepicker"></p>

    
    <?php
require_once("footer.php");    
?>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
</body>

</html>