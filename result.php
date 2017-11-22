<?php
if (isset($_POST['send']))
{
  $vertex=$_POST['vertex'];
  $v=$_POST['v'];
  $e=$_POST['e'];
  $sedge=$_POST['sedge'];
  $dedge=$_POST['dedge'];
  $weight=$_POST['weight'];
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
      <div class="col-xs-3 text-center">
        <h3>Tabel Adjacency</h3>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <?php
              for($i = 1; $i <= $v; $i++) echo "<th>".$vertex[$i]."</th>";
                ?>
            </tr>
          </thead>
          <tbody>
            <?php
            for($i = 1; $i <= $v; $i++)
            {
              echo "<tr>";
              echo "<th>".$vertex[$i]."</th>";
              for($j = 1; $j <= $v; $j++)
              {
                $array[$i][$j] = 0;
                for($k = 1; $k <= $e; $k++)
                  if($sedge[$k] == $i && $dedge[$k] == $j) $array[$i][$j] += 1;
                for($k = 1; $k <= $e; $k++)
                  if($dedge[$k] == $i && $sedge[$k] == $j) $array[$i][$j] += 1;
                echo "<th>".$array[$i][$j]."</th>";
              }
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-xs-3">
        <h3>Detail</h3>
        <ul class="text-primary">
          <?php
          include 'template/function.php';
          if(sederhana($array, $v)) echo "<li>Simple Graph</li>";
          else echo "<li>Non-simple Graph</li>";
          echo "<li>Undirected Graph</li>";
          if(sederhana($array, $v) && complete($array, $v)) echo "<li>Complete Graph</li>";
          if(sederhana($array, $v) && cycle($array, $v, $e)) echo "<li>Cycle Graph</li>";
          if(sederhana($array, $v) && wheel($array, $v, $e)) echo "<li>Wheel Graph</li>";
          ?>
        </ul>
        <h3>Program MST-Kruskal's</h3>
        <p class="text-primary">Untuk melihat bentuk jaringan listrik setelah menjalankan algoritma kruskal's, silahkan klik tautan di bawah:</p>
        <form role="form" action="result2.php" method="post">
          <?php
          for($i = 1; $i <= $v; $i++)
          {
            echo '<input type="hidden" name="vertex['.$i.']" value="'.$vertex[$i].'">';
          }
          for ($i = 1; $i <= $e ; $i++)
          { 
            echo '<input type="hidden" name="sedge['.$i.']" value="'.$sedge[$i].'">';
            echo '<input type="hidden" name="dedge['.$i.']" value="'.$dedge[$i].'">';
            echo '<input type="hidden" name="weight['.$i.']" value="'.$weight[$i].'">';
          }
          echo '<input type="hidden" name="v" value="'.$v.'">';
          echo '<input type="hidden" name="e" value="'.$e.'">';
          ?>
          <button type="submit" name="send" class="btn btn-primary">Next</button><br><br>
        </form>
      </div>
      <div class="col-xs-6 text-center">
        <h3>Bentuk Jaringan Listrik Awal</h3>
        <div id="mynetwork" style="width: 600px; height: 400px; border: 1px solid lightgray;"></div>
        <script type="text/javascript">
        // create an array with nodes
        var nodes = new vis.DataSet([
          // {id: 1, label: 'Node 1'},
          // {id: 2, label: 'Node 2'},
          // {id: 3, label: 'Node 3'},
          // {id: 4, label: 'Node 4'},
          // {id: 5, label: 'Node 5'}
          <?php
          for($i = 1; $i < $v; $i++)
          {
            echo "{id: ".$i.", label: '";
            echo $vertex[$i];
            echo "'},";
            // echo "', group: 'tower'},";
          }
          echo "{id: ".$v.", label: '";
          echo $vertex[$v];
          echo "'}]);";
          // echo "', group: 'tower'}]);";
          ?>

        // create an array with edges
        var edges = new vis.DataSet([
          // {from: 1, to: 3},
          // {from: 1, to: 2},
          // {from: 2, to: 4},
          // {from: 2, to: 5}
          <?php
          for($i = 1; $i < $e; $i++) echo "{from: ".$sedge[$i].", to: ".$dedge[$i].", label: ".$weight[$i].", font: {align: 'middle'}},";
            echo "{from: ".$sedge[$e].", to: ".$dedge[$e].", label: ".$weight[$e].", font: {align: 'middle'}}]);";
          ?>
        // create a network
        var container = document.getElementById('mynetwork');
        var data = {
          nodes: nodes,
          edges: edges
        };
        var options = {
          // groups: {
          //   tower: {
          //     shape: 'icon',
          //     icon: {
          //       face: 'Glyphicons Halflings',
          //       code: '\ue162',
          //       size: 50,
          //       color: '#5bc0de'
          //     }
          //   },
          // }
        };
        var network = new vis.Network(container, data, options);
      </script>
    </div>
  </div>
</div>
</body>
</html>
