<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tbltrainingattandance $model */

$this->title = Yii::t('app', 'Create Tbltrainingattandance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbltrainingattandances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbltrainingattandance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
