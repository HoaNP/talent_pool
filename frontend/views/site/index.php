<?php
defined('YII_DEBUG') or define('YII_DEBUG',true );
/* @var $this yii\web\View */

$this->title = 'Talent Pool';
?>
<head>
    <title>Demo</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.17.0/vis.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.17.0/vis.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        #mynetwork {
            width: 1200px;
            height:700px;
            border: 1px solid lightgray;
        }
    </style>
</head>
<div class="site-index">

    <div class="jumbotron">
        <table align="center">
            <tr>
                <td>
                    <h2>
                        Talent Pool
                    </h2>
                </td>
                <td>
                    <img src='icon.ico' height="70px">
                </td>
            </tr>
        </table>
    </div>
<!--    <div class="row">-->
<!---->
<!--        <a href="?r=project">-->
<!--            <div class="col-lg-6 col-xs-6">-->
<!--                <div class="small-box bg-red">-->
<!--                    <div class="inner">-->
<!--                        <h3>--><?php //echo $numberOfProject; ?><!--</h3>-->
<!--                        <p>Project</p>-->
<!--                    </div>-->
<!--                    <div class="icon inner">-->
<!--                        <span class="glyphicon glyphicon-th-list">-->
<!--                        </span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--        <a href="?r=site/user">-->
<!--            <div class="col-lg-6 col-xs-6">-->
<!--                <div class="small-box bg-green">-->
<!--                    <div class="inner">-->
<!--                        <h3>--><?php //echo $numberOfStaff; ?><!--</h3>-->
<!--                        <p>User</p>-->
<!--                    </div>-->
<!--                    <div class="icon inner">-->
<!--                        <span class="glyphicon glyphicon-user logo"></span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--        </div>-->
<!--</div>-->
<body>
    <a href="?r=site/user">
        <?php echo "User: " . $numberOfStaff; ?>
        <span class="glyphicon glyphicon-user logo"></span>
    </a>
    <a href="?r=project">
        <?php echo "Project: " . $numberOfProject; ?>
        <span class="glyphicon glyphicon-th-list"></span>
    </a>
    <div id="mynetwork"></div>

    <!-- this adds an invisible <div> element to the document to hold the JSON data -->
    <div id="networkJSON-results" class="results" style="display:none"></div>
<!--    <div id="mynetwork1"></div>-->
<!---->
<!--    <div id="networkJSON-results1" class="results" style="display:none"></div>-->
   
</body>
<script type="text/javascript">
      $.ajax({
        async: false,
        url: 'project.json',
        dataType: "json",
        success: function(data) {
        $('#networkJSON-results').html(JSON.stringify(data)); 
        }
    });


    var optionsFA = {
                groups: {
                    skills: {
                        shape: 'icon',
                        icon: {
                            face: 'FontAwesome',
                            code: '\uf219',
                            size: 50,
                            color: '#57169a'
                        }
                    },
                    users: {
                        shape: 'icon',
                        icon: {
                            face: 'FontAwesome',
                            code: '\uf007',
                            size: 50,
                            color: '#aa00ff'
                        }
                    }
                }
            };
      var options = {
          groups: {
              tags: {
                  shape: 'icon',
                  icon: {
                      face: 'FontAwesome',
                      code: '\uf206',
                      size: 50,
                      color: '#114043'
                  }
              },
              projects: {
                  shape: 'icon',
                  icon: {
                      face: 'FontAwesome',
                      code: '\uf135',
                      size: 50,
                      color: '#aa00ff'
                  }
              }
          }
      };
    var gephiJsonDOM = document.getElementById('networkJSON-results');


    if (gephiJsonDOM.firstChild == null) {
        window.alert('Error loading network file.')
    }

    var gephiJSON = JSON.parse(gephiJsonDOM.firstChild.data);
      //var gephiJSON1 = JSON.parse(gephiJsonDOM.firstChild.data);

  // create a network
  var container = document.getElementById('mynetwork');
  var data = {
    nodes: gephiJSON.nodes,
    edges: gephiJSON.edges
  };

  //var options = {};
  var network = new vis.Network(container, data, options);
//      $.ajax({
//          async: false,
//          url: 'demo.json',
//          dataType: "json",
//          success: function(data) {
//              $('#networkJSON-results1').html(JSON.stringify(data));
//          }
//      });
//      var gephiJsonDOM = document.getElementById('networkJSON-results1');
//      var container = document.getElementById('mynetwork1');
//      var data = {
//          nodes: gephiJSON.nodes,
//          edges: gephiJSON.edges
//      };
//      //var options = {};
//      var network = new vis.Network(container, data, options);
</script>

