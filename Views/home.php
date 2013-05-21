<?php
/**
 * File : home.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/
?>

<html>
<head></head>
<body>
<?=$data['header'];?>

...body stuff...
<? if (isset(Core::$config['debug'])) echo Core::$config['debug'];?>

<?=$data['footer'];?>
</body>
</html>