<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'Gestión de Tickets - Iniciar Sesión';
?>
<body class="login">
<div class="space-container">
    <a class="hiddenanchor" id="signup"></a>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <?php Pjax::begin(['options' => ['data-pjax' => true]]); ?>
                <?php $form = ActiveForm::begin(); ?>
                <h1>Gestión de Tickets</h1>
                <div>
                    <?= $form->field($model, 'username')->textInput([
                        'class' => 'form-control ',
                        'placeholder' => 'Usuario',
                    ])->label(false) ?>
                </div>
                <div>
                    <?= $form->field($model, 'password')->passwordInput([
                        'class' => 'form-control',
                        'placeholder' => 'Contraseña',
                    ])->label(false) ?>
                </div>
                <div>
                    <?= Html::submitButton('Iniciar Sesión',
                        [
                            'class' => 'btn btn-default submit',
                            'name' => 'login-button',
                        ]) ?>
                    <a class="reset_pass" href="/">Recuperar Contraseña</a>
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <div class="clearfix"></div>
                    <div>
                        <p>©2017 Todos los Derechos Reservador por Sistema de Ticket.</p>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <?php Pjax::end(); ?>
            </section>
        </div>
    </div>
</div>
</body>