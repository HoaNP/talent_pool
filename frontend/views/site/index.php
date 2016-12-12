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
