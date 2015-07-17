<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
/* @var $form ActiveForm */
$this->title = '注册';
?>
<div class="modules-user-views-account-signup">
	<h1><?php echo Html::encode($this->title) ?></h1>

	<div class="row">
		<div class="col-lg-5">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'email')?>
        <?= $form->field($model, 'username')?>
        <?= $form->field($model, 'password')->passwordInput()?>
        <?= $form->field($model, 'password_confirm')->passwordInput()?>
			<div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
        </div>
    <?php ActiveForm::end(); ?>
        </div>
	</div>
</div>
<!-- modules-user-views-account-signup -->
