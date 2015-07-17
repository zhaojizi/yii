<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
/* @var $form ActiveForm */
?>
<div class="modules-user-views-account-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'auth_key') ?>
        <?= $form->field($model, 'password_hash') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'logged_at') ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password_reset_token') ?>
        <?= $form->field($model, 'oauth_client') ?>
        <?= $form->field($model, 'oauth_client_user_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- modules-user-views-account-index -->
