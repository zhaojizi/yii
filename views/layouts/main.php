<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
</head>
<body>

<?php $this->beginBody()?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => '某某网站',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top'
            ]
        ]);
        echo Nav::widget([
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ],
            'items' => [
                [
                    'label' => '首页',
                    'url' => [
                        '/site/index'
                    ]
                ],
                [
                    'label' => '关于我们',
                    'url' => [
                        '/site/about'
                    ]
                ],
                [
                    'label' => '联系方式',
                    'url' => [
                        '/site/contact'
                    ]
                ],
                Yii::$app->user->isGuest ? [
                    'label' => '注册',
                    'url' => [
                        '/user/account/signup'
                    ]
                ] :'',
                Yii::$app->user->isGuest ? [
                    'label' => '登录',
                    'url' => [
                        '/user/account/login'
                    ]
                ] :'',
            [
                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->username,
                'visible' => ! Yii::$app->user->isGuest,
                'items' => [
                    [
                        'label' => '设置',
                        'url' => [
                            '/user/default/index'
                        ]
                    ],
                    [
                        'label' => '我的订单',
                        'url' => [
                            '/order/default/index'
                        ]
                    ],
//                     [
//                         'label' => Yii::t('frontend', '后台管理'),
//                         'url' => Yii::getAlias('@backendUrl'),
//                         'visible' => Yii::$app->user->can('manager')
//                     ],
                    [
                        'label' => '退出',
                        'url' => [
                            '/user/account/logout'
                        ],
                        'linkOptions' => [
                            'data-method' => 'post'
                        ]
                    ]
                ]
            ],
            ]
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
            <?= $content?>
        </div>
	</div>

	<footer class="footer">
		<div class="container">
			<p class="pull-left">&copy; My Company <?= date('Y') ?></p>
			<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
