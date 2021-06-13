<html>
<body>
<?php 

 $length=39;
 $width=20;

$Perimeter= 2*$length+2*$width;
$area=$length*$width;

echo "Perimeter is ".$Perimeter;
echo "<br>Area is ".$area;

if ($length==$width)
{
    echo "<br>The Shape is a Squre";
}
else
    echo "<br>The Shape is not a Squre";

?>

</body>
</html>