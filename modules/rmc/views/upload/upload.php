<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;

$this->title = 'Upload File';
?>

<div class="upload-form">
    <h4>Upload File</h4>

    <?php $form = ActiveForm::begin([
        'id' => 'upload-form',
        'options' => ['enctype' => 'multipart/form-data'],
        'action' => ['upload/handle-upload'],
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'file')->fileInput(['id' => 'file-input']) ?>

    <div class="form-group">
        <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php

$uploadUrl = Url::to(['upload/handle-upload']);

$script = <<<JS

    $(document).ready(function () {
        $('#upload-form').on('submit', function(e) {
        e.preventDefault();
        
        var fileInput = $('#file-input')[0].files.length;
        
        if (fileInput === 0) {
            Swal.fire({
                title: "No file selected!",
                icon: "error",
                confirmButtonColor: "#f46a6a",
                confirmButtonText: "OK"
            });
            return;
        }

        var desc = "Are you sure you want to upload this file?";
        var successDesc = "You have successfully uploaded the file!";

        Swal.fire({
            title: desc,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Confirm",
            cancelButtonText: "Cancel"
        }).then(function(result) {
            if (result.value) {
                var formData = new FormData($('#upload-form')[0]);

                $.ajax({
                    url: '$uploadUrl',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            title: successDesc,
                            icon: "success",
                            confirmButtonColor: "#34c38f",
                            confirmButtonText: "Confirm"
                        }).then(function() {

                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: "Upload failed!",
                            icon: "error",
                            confirmButtonColor: "#f46a6a",
                            confirmButtonText: "OK"
                        });
                    }
                });
            }
        });
    });
});

JS;
$this->registerJs($script);
?>