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
     <div class="container2">
    <div class="row">
      <div class="col-xs-3 text-center">
        
       
          
          <tbody>
            <?php
            for($i = 1; $i <= $v; $i++)
            {
              
              for($j = 1; $j <= $v; $j++)
              {
                $array[$i][$j] = 0;
                for($k = 1; $k <= $e; $k++)
                  if($sedge[$k] == $i && $dedge[$k] == $j) $array[$i][$j] += 1;
                for($k = 1; $k <= $e; $k++)
                  if($dedge[$k] == $i && $sedge[$k] == $j) $array[$i][$j] += 1;
                
              }
             
            }
            ?>
          </tbody>
     
      </div>
    </div>
      <div class="col-xs-3">
        <h3>Detalle</h3>
        <ul class="text-primary">
          <?php
          include 'template/function.php';
          if(sederhana($array, $v)) echo "<li>Grafo Simple</li>";
          else echo "<li>Grafo Sin Kruskal</li>";
          echo "<li>Grafo No Dirigido</li>";
          if(sederhana($array, $v) && complete($array, $v)) echo "<li>Grafo Completo</li>";
          if(sederhana($array, $v) && cycle($array, $v, $e)) echo "<li>Grafo Cíclico</li>";
          if(sederhana($array, $v) && wheel($array, $v, $e)) echo "<li>Circuito</li>";
          ?>
        </ul>
        <h3>Programa Kruskal</h3>
        <p class="text-primary">Para ver la forma de la red eléctrica después de ejecutar el Algoritmo de Kruskal haga click en Next</p>
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
        <h3>Red eléctrica sin Kruskal</h3>
        <div id="mynetwork" style="width: 600px; height: 400px; border: 1px solid lightgray;"></div>
        <script type="text/javascript">
        // creando array con nodos
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

        // crear array con vertices
        var edges = new vis.DataSet([
          // {from: 1, to: 3},
          // {from: 1, to: 2},
          // {from: 2, to: 4},
          // {from: 2, to: 5}
          <?php
          for($i = 1; $i < $e; $i++) echo "{from: ".$sedge[$i].", to: ".$dedge[$i].", label: ".$weight[$i].", font: {align: 'middle'}},";
            echo "{from: ".$sedge[$e].", to: ".$dedge[$e].", label: ".$weight[$e].", font: {align: 'middle'}}]);";
          ?>
        // crear una red
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
