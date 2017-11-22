<?php
if (isset($_POST['send']))
{
  $vertex=$_POST['vertex'];
  $v=$_POST['v'];
  $old_edge=$edge=$_POST['e'];
  $old_sedge=$sedge=$_POST['sedge'];
  $old_dedge=$dedge=$_POST['dedge'];
  $old_label=$label=$_POST['weight'];
  include 'template/kruskal.php';
}
// $vertex=['','A','B','C','D','E','F','G','H','I','J'];
// $v=10;
// $edge=17;
// $sedge=['','1','1','2','2','3','3','4','4','5','5','5','5','6','7','8','8','9'];
// $dedge=['','2','6','3','4','4','9','5','9','6','7','8','9','7','8','9','10','10'];
// $label=['','3','2','17','16','8','18','11','14','1','6','5','10','7','15','12','13','9'];
// include 'template/kruskal.php';
?>
<!doctype html>
<html>
<head>
    <?php include 'template/include.php';?>
    <script type="text/javascript">
        var nodes, edges, network;
        function toJSON(obj) {
            return JSON.stringify(obj, null, 4);
        }
        function addEdge(num) {
            try {
                edges.add({
                    id: document.getElementById('edge-id '+num).value,
                    from: document.getElementById('edge-from '+num).value,
                    to: document.getElementById('edge-to '+num).value,
                    label: document.getElementById('edge-label '+num).value,
                    font: {align: 'middle'}
                });
            }
            catch (err) {
                alert(err);
            }
        }
        function draw() {
            nodes = new vis.DataSet();
            nodes.on('*', function () {
                document.getElementById('nodes').innerHTML = toJSON(nodes.get());
            });
            nodes.add([
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
                edges = new vis.DataSet();
                edges.on('*', function () {
                    document.getElementById('edges').innerHTML = toJSON(edges.get());
                });
                var container = document.getElementById('network');
                var data = {
                    nodes: nodes,
                    edges: edges
                };
                var options = {
                    // groups: {
                    //     tower: {
                    //         shape: 'icon',
                    //         icon: {
                    //             face: 'Glyphicons Halflings',
                    //             code: '\ue162',
                    //             size: 50,
                    //             color: '#5bc0de'
                    //         }
                    //     },
                    // }
                };
                network = new vis.Network(container, data, options);
            }
        </script>
    </head>
    <body onload="draw();">
        <?php include 'template/header.php';?>
        <div class="container">
            <div class="row">
                <div class="col-xs-3 text-center">
                    <h3 class="text-center">Keterangan</h3>
                    <p class="text-justify">Untuk melihat implementasi <i>kruskal's algorithm step by step</i>, silahkan klik tautan di bawah:</p>
                    <div id="demo"><button type="button" class="btn btn-info">Next</button></div>
                    <?php
                    for($i = 1; $i <= $edge; $i++)
                    {
                        echo '<input id="edge-id '.$i.'" type="hidden" value="'.$i.'">';
                        echo '<input id="edge-from '.$i.'" type="hidden" value="'.$sedge[$i].'">';
                        echo '<input id="edge-to '.$i.'" type="hidden" value="'.$dedge[$i].'">';
                        echo '<input id="edge-label '.$i.'" type="hidden" value="'.$label[$i].'">';
                    }
                    ?>
                    <script>
                        var x = 1;
                        var e = <?php echo $edge;?>;
                        document.getElementById("demo").onclick = function() {myFunction()};
                        function myFunction()
                        {
                            if(x<=e)
                            {
                                addEdge(x);
                                x++;
                            }
                            else document.getElementById("demo").innerHTML = '<div class="alert alert-info"><b>Thx for using this app</b></div>';
                        }
                    </script>
                    <pre id="nodes" hidden></pre>
                    <pre id="edges" hidden></pre>
                </div>
                <div class="col-xs-5 text-center">
                    <div id="network" style="width: 600px; height: 400px; border: 1px solid lightgray;"></div>
                </div>
                <div class="col-xs-2 col-xs-offset-2">
                    <h3 class="text-center">Detail Edge</h3>
                    <ul class="text-primary">
                    <?php
                    for($i = 1; $i <= $edge; $i++) $terpilih[$i] = 0;
                    for($i = 1; $i <= $old_edge; $i++)
                    {
                        echo '<li>';
                        echo $vertex[$old_sedge[$i]];
                        echo ' -> ';
                        echo $vertex[$old_dedge[$i]];
                        echo ' = ';
                        echo $old_label[$i];
                        for($j = 1; $j <= $edge; $j++)
                        {
                            if($old_sedge[$i] == $sedge[$j] && $old_dedge[$i] == $dedge[$j] && $old_label[$i] == $label[$j] && $terpilih[$j] == 0)
                            {
                                $terpilih[$j] = 1;
                                echo  ' <span class="label label-success">OK</span>';
                            }
                        }
                        echo '</li>';
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    </html>
