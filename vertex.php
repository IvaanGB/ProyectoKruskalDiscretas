<?php
$v = 0;
if (isset($_POST['send']))
{
    $v=$_POST['v'];
    $e=$_POST['e'];
}
?> 
<!doctype html>
<html>
<head>
<?php include 'template/include.php';?>
</head>
<body>
    <?php include 'template/header.php';?>
    <div class="container">
        <div class="row">
            <div class="col-xs-4  col-xs-offset-4  text-center">
                <?php
                if($v)
                {
                    echo '<div class="form-top">';
                    echo '<h3 class="text-center">Ingrese cada nombre de <b>Torre Eléctrica</b></h3>';
                    echo '</div>';
                    echo '<div class="form-bottom">';
                    echo '<form role="form" action="edge.php" method="post">';
                    for($i = 1; $i <= $v; $i++)
                    {
                        echo '<div class="form-group">';
                        echo '<label for="vertex['.$i.']">Nombre de Torre: ' . $i . '</label>';
                        echo '<input type="text" name="vertex['.$i.']" placeholder="-" class="form-control">';
                        echo '</div>';
                    }
                    echo '<input type="hidden" name="v" value="'.$v.'">';
                    echo '<input type="hidden" name="e" value="'.$e.'">';
                    echo '<button type="submit" name="send" class="btn btn-primary">Next</button><br><br>';
                    echo '</form>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
