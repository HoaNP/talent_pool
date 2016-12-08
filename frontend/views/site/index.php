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
    <div class="jumbotron">

        <p><a class="btn btn-lg btn-success" href="?r=project">Project</a></p>
    </div>

    <div class="row">

        <a href="?r=project">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo 4; ?></h3>
                        <p>Project</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-signal logo">
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <a href="?r=user">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3><?php echo 3; ?></h3>
                        <p>User</p>
                    </div>
                    <div class="icon inner">
                        <span class="glyphicon glyphicon-globe logo"></span>
                    </div>
                </div>
            </div>
        </a>
        </div>
</div>
