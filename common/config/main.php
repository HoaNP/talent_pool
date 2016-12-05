<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'comment' => [
            'class' => 'yii2mod\comments\Module',
            // use comment controller event example
            'controllerMap' => [
                'default' => [
                    'class' => 'yii2mod\comments\controllers\DefaultController',
                    'on afterCreate' => function ($event) {
                        // get saved comment model
                        $event->getCommentModel();
                        // your custom code
                    }
                ]
            ]
        ]
    ],
];
