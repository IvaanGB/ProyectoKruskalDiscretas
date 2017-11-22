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
          <h3 class="text-center">Spesifikasi <b>jaringan listrik</b></h3>
        </div>
        <div class="form-bottom">
          <form role="form" action="vertex.php" method="post">
            <div class="form-group">
              <label for="v">Banyak tower listrik</label>
              <input type="number" name="v" class="form-control">
            </div>
            <div class="form-group">
              <label for="e">Banyak sambungan</label>
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
