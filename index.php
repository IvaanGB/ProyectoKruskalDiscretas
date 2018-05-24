<!doctype html>
<html>
<head>
<?php include 'template/include.php';?>
</head>
<body>
  <?php include 'template/header.php';?>
  <div class="container">
    <div class="row">
      <div class="col-xs-4 col-xs-offset-4 text-center">        
        <div class="form-top">
          <h3 class="text-center">Especificaciones de la <b>Red Eléctrica</b></h3>
        </div>
        <div class="form-bottom">
          <form role="form" action="vertex.php" method="post">
            <div class="form-group">
              <label for="v">Ingrese cuántas torres eléctricas quiere.</label>
              <input type="number" name="v" class="form-control">
            </div>
            <div class="form-group">
              <label for="e">Ingrese cuántas conexiones quiere</label>
              <input type="number" name="e" class="form-control">
            </div>
            <button type="submit" name="send" class="btn btn-primary">Next</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
