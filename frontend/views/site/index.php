<?php
defined('YII_DEBUG') or define('YII_DEBUG',true );
/* @var $this yii\web\View */

$this->title = 'Talent Pool';
?>
<div class="site-index">

    <div class="jumbotron">
        <table align="center">
            <tr>
                <td>
                    <h1>
                        Talent Pool
                    </h1>
                </td>
                <td>
                    &nbsp;
                </td>
                <td>
                    <img src='icon.ico' height="100px">
                </td>
            </tr>
        </table>
    </div>
    <div class="row">

        <a href="?r=project">
            <div class="col-lg-6 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $numberOfProject; ?></h3>
                        <p>Project</p>
                    </div>
                    <div class="icon inner">
                        <span class="glyphicon glyphicon-th-list">
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <a href="?r=site/user">
            <div class="col-lg-6 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $numberOfStaff; ?></h3>
                        <p>User</p>
                    </div>
                    <div class="icon inner">
                        <span class="glyphicon glyphicon-user logo"></span>
                    </div>
                </div>
            </div>
        </a>
        </div>
</div>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Network | node as icon</title>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.17.0/vis.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.17.0/vis.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <style>
        #mynetworkFA,
        #mynetworkIO {
            height: 300px;
            width: 700px;
            border:1px solid lightgrey;
        }

        p {
            max-width:700px;
        }
    </style>

    <script language="JavaScript">
        function draw() {
            /*
             * Example for FontAwesome
             */
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

            // create an array with nodes
            var nodesFA = [{
                id: 1,
                label: 'User 1',
                group: 'users'
            }, {
                id: 2,
                label: 'User 2',
                group: 'users'
            }, {
                id: 3,
                label: 'C/C++',
                group: 'skills'
            }, {
                id: 4,
                label: 'Java',
                group: 'skills'
            }, {
                id: 5,
                label: 'Android',
                group: 'skills'
            }, {
                id: 6,
                label: 'Web Design',
                group: 'skills'
            }, {
                id: 7,
                label: 'MVC',
                group: 'skills'
            }, {
                id: 8,
                label: 'HTML5',
                group: 'skills'
            }
            ];

            // create an array with edges
            var edges = [{
                from: 1,
                to: 3
            }, {
                from: 1,
                to: 4
            }, {
                from: 2,
                to: 4
            }, {
                from: 2,
                to: 5
            }, {
                from: 1,
                to: 5
            },{
                from: 1,
                to: 6
            },{
                from: 1,
                to: 7
            },{
                from: 1,
                to: 8
            },{
                from: 2,
                to: 8
            },{
                from: 2,
                to: 7
            }
            ];

            // create a network
            var containerFA = document.getElementById('mynetworkFA');
            var dataFA = {
                nodes: nodesFA,
                edges: edges
            };

            var networkFA = new vis.Network(containerFA, dataFA, optionsFA);


            
        }
    </script>

</head>
<body onload="draw()">
<h2>
 <div id="mynetworkFA"></div>

</body>

</html>
