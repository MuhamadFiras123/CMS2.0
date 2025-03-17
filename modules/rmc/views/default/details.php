<?php

use app\models\tblprogram;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use app\models\tblrmcstatus;

$this->title = Yii::t('app', 'Project Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    table#cmstable1 tbody td div {

        word-wrap: break-word;
    }
</style>
<div class="tblrmc-index">
    <div class="row">
        <class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex text-white bg-primary">
                    <h4 class="card-title mb-0 flex-grow-1  ">
                        <?= $this->title ?>
                    </h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <!-- <button id="New" class="showModal_New btn btn-success btn-sm" type="button"> New <i
                                    class="icon-file"></i></button> -->
                            <!-- <button id="Edit" class="showModal_Update btn btn-success btn-sm" type="button"> Edit Title<i
                                    class="icon-file"></i></button> -->
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row col-xl-12"><label>Project Title: <?= $data['RMCTitle'];
                    ; ?></label></div>
                    <div class="row col-xl-12"><label>Status: <?= $data['Status'];
                    ; ?></label></div>
                </div>
            </div>

            <div class="card">
                <div class="card-header align-items-center d-flex text-white bg-primary">
                    <h4 class="card-title mb-0 flex-grow-1  ">
                        Project Leader & Team Members
                    </h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <button id="New" class="showModal_NewMember btn btn-success btn-sm" type="button"> New <i
                                    class="icon-file"></i></button>
                            <!-- <button id="Edit" class="showModal_Update btn btn-success btn-sm" type="button"> Edit Title<i
                                    class="icon-file"></i></button> -->
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class='col-12 .col-sm-12'>
                            <div class="box-body">
                                <table id="cmstableMember" class="table table-bordered table-hover" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>No. MyKad/Passport No./Matric No.</th>
                                            <th>Department/Faculty/School</th>
                                            <th>Academic Qualification/Designation/Field of Study</th>
                                            <th>Staff/Student</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header align-items-center d-flex text-white bg-primary">
                    <h4 class="card-title mb-0 flex-grow-1">
                        Research Information
                    </h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <?php if (!$hasResearch): ?>
                                <!-- Show New button if no research exists -->
                                <button id="New" class="showModal_Researchinfo btn btn-success btn-sm" type="button">
                                    New <i class="icon-file"></i>
                                </button>
                            <?php else: ?>
                                <!-- Change button to Edit if research exists -->
                                <button id="Edit" class="editModal_Researchinfo btn btn-warning btn-sm" type="button">
                                    Edit <i class="icon-edit"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php if ($research): ?>
                        <div class="row" id="refreshresearch">
                            <div class="col-md-6">
                                <label><strong>Cluster of Research:</strong>
                                    <?= $research['RMCCluster'] ?? 'N/A'; ?></label><br>
                                <label><strong>Field of Research:</strong>
                                    <?= $research['RMCInformationFieldOfResearch'] ?? 'N/A'; ?></label><br>
                                <label><strong>Duration:</strong>
                                    <?= $research['RMCInformationResearchDuration'] ?? 'N/A'; ?></label><br>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Start Date:</strong>
                                    <?= $research['RMCInformationStartDate'] ?? 'N/A'; ?></label><br>
                                <label><strong>End Date:</strong>
                                    <?= $research['RMCInformationEndDate'] ?? 'N/A'; ?></label><br>
                                <label><strong>Location:</strong>
                                    <?= $research['RMCInformationResearchLocation'] ?? 'N/A'; ?></label><br>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label>No research details found..</label>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <div class="card">
                <div class="card-header align-items-center d-flex text-white bg-primary">
                    <h4 class="card-title mb-0 flex-grow-1">
                        Executive Summary
                    </h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <?php if (!$hasSummary): ?>
                                <button id="New" class="showModal_Createexecutive btn btn-success btn-sm" type="button">
                                    New <i class="icon-file"></i>
                                </button>
                            <?php else: ?>
                                <button id="Edit" class="showModal_Editexecutive btn btn-warning btn-sm" type="button">
                                    Edit <i class="icon-file"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <?php if ($summary): ?>
                        <div class="row" id="refreshexecutive">
                            <!-- Left Column - Executive Summary -->
                            <div class="col-md-6">
                                <p><strong style="font-size: 18px;">Executive Summary of Research Proposal</strong></p>
                                <p><strong>Research Background :</strong>
                                    <?= $summary['RMCSummaryBackground'] ?? 'N/A' ?>
                                </p>

                                <p><strong>General Objective :</strong>
                                    <?= $summary['RMCSummaryResearchObjective'] ?? 'N/A' ?>
                                </p>

                                <div style="display: flex; align-items: flex-start; gap: 10px;">
                                    <p><strong>Specific Objectives :</strong></p>
                                    <div style="display: inline-block;">
                                        <p>1. <?= $summary['RMCSummarySpecificObjective1'] ?? 'N/A' ?></p>
                                        <p>2. <?= $summary['RMCSummarySpecificObjective2'] ?? 'N/A' ?></p>
                                        <p>3. <?= $summary['RMCSummarySpecificObjective3'] ?? 'N/A' ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Expected Results -->
                            <div class="col-md-6 mt-5">
                                <p><strong style="font-size: 14px;">Expected Results/Benefit</strong></p>

                                <p><strong>Research Publications :</strong>
                                    <?= $summary['RMCSummaryReseachPublication'] ?? 'N/A' ?>
                                </p>

                                <p><strong>Novel Theories/New Findings/Knowledge :</strong>
                                    <?= $summary['RMCSummaryFinding'] ?? 'N/A' ?>
                                </p>

                                <p><strong>Potential Application :</strong>
                                    <?= $summary['RMCSummaryPotentialApplication'] ?? 'N/A' ?>
                                </p>

                                <p><strong>Number of PhD and Masters Graduated :</strong>
                                    <?= $summary['RMCSummaryNoOfGraduate'] ?? 'N/A' ?>
                                </p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label>No summary details found.</label>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    </div>

    <div class="card">
        <div class="card-header align-items-center d-flex text-white bg-primary">
            <h4 class="card-title mb-0 flex-grow-1  ">
                Budget
            </h4>
            <div class="flex-shrink-0">
                <div class="form-check form-switch form-switch-right form-switch-md">
                    <button id="New" class="showModal_Upload btn btn-success btn-sm" type="button"> Upload<i
                                    class="icon-file"></i></button>
                            <!-- <button id="Edit" class="showModal_Update btn btn-success btn-sm" type="button"> Edit Title<i
                                    class="icon-file"></i></button> --> 
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Add View and Download buttons -->
            <div class="row">
                <div class="col-md-6">
                    <button id="View" class="btn btn-info btn-sm" type="button">View</button>
                    <button id="Download" class="btn btn-primary btn-sm" type="button">Download</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
/**********************************************************************************/


$RMCId = Yii::$app->request->get('RMCId');
$module = '/' . Yii::$app->controller->module->id;
// $url = Url::base() . $module . '/default/rmclist';
$newmember = Url::base() . $module . '/member/newmember';
$getmemberlist = Url::base() . $module . '/member/getmemberlist';
$_csrf = Yii::$app->request->getCsrfToken();

$url = Url::base() . $module . '/default/rmclist';
$researchinfo = Url::base() . $module . '/researchinfo/createresearchinfo';
$editresearchinfo = Url::base() . $module . '/researchinfo/editresearchinfo';

$createexecutive = url::base() . $module . '/executive/createexecutive';
$editexecutive = url::base() . $module . '/executive/editexecutive';

$upload = url::base() . $module . '/upload/upload';
$viewFileUrl = Url::base() . $module . '/upload/view-latest';
$downloadFileUrl = Url::base() . $module . '/upload/download-latest';

// $view = '';

$script = <<<JS

/**********************************************************************************/

function getMemberlist()
{
    $('#cmstableMember').dataTable().empty();
			    
	var table = $('#cmstableMember').DataTable({
	lengthChange:false,			processing: true,
	deferRender:true,			searching:false,
	responsive:true,			pageLength: 12,
	destroy:true,			    scrollY: true,  
	paging:true,			    
    autoWidth: true, 
	// dom: 'Bfrtip',                      
	ajax: { 
		url: '$getmemberlist',
		type: 'GET',
		data: {
            // txtSearch:$("#txtSearch").val(),        
            // txtStatusId:$("#txtStatusId").val(),                     
			}
		},
		"columns": [
            {
                "data": "RMCId", "width": '0.1%', class:"text-dark text-center",
                "render": function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
                }
            },	
            {"data":"RMCTitle", "width": '82.9%', class:"text-dark"},
            {"data":"Status", "width": '3.0%', class:"text-dark text-center"},
            {"data":"TransactionDate", "width": '15.0%', class:"text-dark text-center"},
		    {"data": "RMCId", "width": '6%', class:"text-center",
                "render": function ( data, type, row, meta ) { 
                    return '<button value='+JSON.stringify(data)+' class="btn btn-sm btn-secondary getDetails">Details</button>';
                }
            },	
		]
	});

    // $('#cmstable1 tbody').on('click', 'tr', function() {

	// 	var table = $('#cmstable1').DataTable();
	// 	console.log(table.row(this).data());

	// 	if ($(this).hasClass('row_selected1')) {
	// 		$(this).removeClass('row_selected1');
	// 	} else {
	// 		table.$('tr.row_selected1').removeClass('row_selected1');
	// 		$(this).addClass('row_selected1');
	// 	}
        
	// 	var d = table.row(this).data();
			
	// 	var x = d['RMCTitle'];
	// 	var y = d['RMCId'];
	
	// 	$('#select_data').html(x);
	// 	$('#select_id').val(y);
		
	// });
}

$(document).on('click', '.showModal_NewMember', function () {
    var form = $(this);
    var RMCId = '$RMCId';

      $.ajax({
	    	url: '$newmember?RMCId='+RMCId,
            type   : 'GET',
			data: {
                // ProgramId: $("#select_id").val(),
                 },
             success: function (response) 
            {     
				$("#modal-lg").modal("show");
                $("#modalContent-lg").html(response).modal();							
				document.getElementById('modalHeader-lg').innerHTML = '<h4>New Member</h4>';    
				
				console.log(response);
            },
            error  : function (e) {
				    console.log(e);
            }
        });
    return false;        
  });

  $(document).on('click', '.showModal_Researchinfo', function () {
      var form = $(this);
      var RMCId = "$RMCId";
    //   alert(RMCId);
      $.ajax({
	    	url: '$researchinfo',
            type   : 'GET',
			data: { RMCId: RMCId }, // Pass the ID to fetch data
             success: function (response) 
            {     
				$("#modal-lg").modal("show");
                $("#modalContent-lg").html(response).modal();							
				document.getElementById('modalHeader-lg').innerHTML = '<h4>New Research</h4>';    
				
				console.log(response);
            },
            error  : function (e) {
				    console.log(e);
            }
        });
    return false;        
  });

  $(document).on('click', '.editModal_Researchinfo', function () {
    var RMCId = "$RMCId";

    $.ajax({
        url: '$editresearchinfo',
        type: 'GET',
        data: { RMCId: RMCId }, // Pass the ID to fetch data
        success: function (response) {     
            $("#modal-lg").modal("show");
            $("#modalContent-lg").html(response).modal();							
            document.getElementById('modalHeader-lg').innerHTML = '<h4>Edit Research</h4>';    

            console.log(response);
        },
        error: function (e) {
            console.log(e);
        }
    });

    return false;        
});


$(document).on('click', '.showModal_Createexecutive', function () {
var form = $(this);
var RMCId = "$RMCId";

$.ajax({
        url: '$createexecutive',
        type   : 'GET',
        data: { RMCId: RMCId }, // Pass the ID to fetch data
        success: function (response) 
        {     
            $("#modal-lg").modal("show");
            $("#modalContent-lg").html(response).modal();							
            document.getElementById('modalHeader-lg').innerHTML = '<h4>Executive Summary of Research Proposal</h4>';    
            
            console.log(response);
        },
        error  : function (e) {
                console.log(e);
        }
    });
return false;        
});


$(document).on('click', '.showModal_Editexecutive', function () {
var form = $(this);
var RMCId = "$RMCId";

$.ajax({
        url: '$editexecutive',
        type   : 'GET',
        data: { RMCId: RMCId }, // Pass the ID to fetch data
        success: function (response) 
        {     
            $("#modal-lg").modal("show");
            $("#modalContent-lg").html(response).modal();							
            document.getElementById('modalHeader-lg').innerHTML = '<h4>Executive Summary of Research Proposal</h4>';    
            
            console.log(response);
        },
        error  : function (e) {
                console.log(e);
        }
    });
return false;        
});


$(document).on('click', '.showModal_Upload', function () {
var form = $(this);
var RMCId = "$RMCId";

$.ajax({
        url: '$upload',
        type   : 'GET',
        data: { RMCId: RMCId }, // Pass the ID to fetch data
        success: function (response) 
        {     
            $("#modal-lg").modal("show");
            $("#modalContent-lg").html(response).modal();							
            document.getElementById('modalHeader-lg').innerHTML = '<h4>Upload</h4>';    
            
            console.log(response);
        },
        error  : function (e) {
                console.log(e);
        }
    });
return false;        
});

$(document).on('click', '#View', function () {
    window.open('$viewFileUrl', '_blank');
});

$(document).on('click', '#Download', function () {
    window.location.href = '$downloadFileUrl';
});

JS;
$this->registerJs($script);
 

?>