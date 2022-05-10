<?php
// core configuration
include_once "../../../config/core.php";
$require_login=true;
include_once "../../../login_checker.php";
// set page title
$page_title="Thi trực tuyến";

 
// include page header HTML
include '../../../layout_head.php';

?>
<link rel="stylesheet" href="../../../../libs/clock/flipclock.css">


<div ng-app="testApp" ng-controller="ExamDetailCtl">

<div class="row">
	<div class="col-xs-12 col-sm-3" style="background:white;height:100%;    margin-top: 10px;">
		<div style="background:white;height:100%;"  id="sidebar">
			<div class="name" style="font-size:16px; margin-top:20px; border-bottom: 1px solid black;">
				<b>{{config.Name}} </b>
            </div>

            <div class="Subjectname" style="margin-top:10px;">
				<i class="fas fa-book-reader" style="margin-right:10px;"></i> Môn: {{config.subjectName}}
            </div>

            <div class="NumberQs" style="margin-top:10px;">
                <i class="fas fa-list-ol" style="margin-right:10px;"></i> Số lượng câu hỏi: {{config.Num_Question}} câu
        	</div>

			<div class="Totaltime" style="margin-top:10px;">
                <i class="far fa-clock" style="margin-right:10px;"></i> Thời gian làm bài: {{config.Totaltime}} phút
            </div>

			<div class="message"></div>
			<button type="button" ng-click="checkoptions(Questions)" ng-if="Isfinish==false" style="height:50px; width:100px; margin-left:30%; margin-bottom:10px;margin-top:20px" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nộp bài</button>
			<div style="font-size:18px;">
				<div>
					<p> Kết quả bài thi: </p>
				</div>
				<div style="margin-top:10px;" ng-if="Isfinish==true"> Bạn làm đúng <b style= "color:red">{{NumberCorecct}}/{{config.Num_Question}}</b> câu hỏi</div>
				<div style="margin-top:10px;" ng-if="Isfinish==true"> Điểm của bạn là:<b style= "color:red"> {{Score}}</b></div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-9" style="height: 100%;display: table-row;">

        <div class="col-xs-12 content " style="margin-top:10px;" ng-repeat="question in Questions" >
            <div class="col-xs-12 " style="font-weight: bold; font-size: 18px; margin-top:10px;">
                <b>Câu hỏi {{question.index}}:</b> {{question.ContentQs}}
            </div>
            
            <div class="clearfix"  ng-repeat="anwser in question.ListAnswer">
				<div class="col-xs-12 ">
					<div class="checkbox anwser">
						<label > <input type="checkbox" ng-model="anwser.checked" > 
							<span class="cr" style="margin-top: 4px;"><i class="cr-icon glyphicon glyphicon-ok"></i></span> 
							<span style="padding-left: 10px; font-size: 15px">{{anwser.ContentAs}}</span>
						</label>
					</div>
				</div>
			</div>
        </div>
        
	</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="mydivheader">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><b> Xác nhận </b></h4>
			</div>
			<div class="modal-body">

				<div class="panel panel-default" style="border: 0px ">
					<div class="panel-body" style="font-size: 18px;">
						<div class="row">
							<span class="col-xs-12 ">Bạn đã trả lời: <b style="color:red">{{numberAnswer}}/{{config.Num_Question}}</b> câu hỏi</span>
						</div>    
						<div class="row">
							<span class="col-xs-12 ">Bạn chắc chắn muốn nộp bài không?</span>
						</div>
					</div>     
				</div>
				<div class="modal-footer">
					<button type="button" ng-click="Submit(Questions)" class="btn btn-primary" data-dismiss="modal">Nộp bài</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
				</div>
			</div>
		</div>
	</div>
    <script src="../../controller/examDetail.js"></script>
	<script src="../../../../libs/clock/flipclock.js"></script>	
	<script type="text/javascript">
	$(window).scroll(function() {
		if($(window).scrollTop() > 300 && $(document).height() - $(window).height() - $(window).scrollTop() > 250) {
			$('#sidebar').addClass('fixed-sidebar')
		} else {
			$('#sidebar').removeClass('fixed-sidebar')
		}
	});
		
	</script>
</div>
<?php include '../../../layout_foot.php';?>



<style>
/* Note: Try to remove the following lines to see the effect of CSS positioning */
.fixed-sidebar {
    position: fixed;
    top: 10px;
	left: 0px;
	width: 25%;
}

#sidebar {
	padding-left: 20px
}
.content{
   background: rgb(255, 255, 255);
   height:100%;
   width:95%;
   margin-left:30px;
   margin-right:30px;
   margin-bottom:10px;
   border-radius: 1%;
}
.navbar {
   margin-bottom: 0px;
}
.affix {
	top: 0;
	width: 87%;
	z-index: 9999 !important;
}

.affix+.container-fluid {
	padding-top: 70px;
}

.menu-info {
	background-color: #fff;
	min-height: 70px;
}

.clear {
	
}

.nopadding {
	padding: 0px;
}

.text-menu {
	font-size: 18px;
	font-weight: bold;
	padding-top: 25px;
}

.label-question {
	font-weight: bold;
	font-size: 20px;
}

.lable-form-edit {
	font-weight: bold;
	margin-top: 5px;
	font-size: 18px;
}

.view-info {
	font-weight: bold;
	margin-top: 5px;
	font-size: 18px;
}

.anwser {
	font-weight: bold;
}

.checkbox label:after, .radio label:after {
	content: '';
	display: table;
	clear: both;
}

.checkbox .cr, .radio .cr {
	position: relative;
	display: inline-block;
	border: 1px solid #a9a9a9;
	border-radius: .25em;
	width: 1.3em;
	height: 1.3em;
	float: left;
	margin-right: .5em;
}

.radio .cr {
	border-radius: 50%;
}

.checkbox .cr .cr-icon, .radio .cr .cr-icon {
	position: absolute;
	font-size: .8em;
	line-height: 0;
	top: 50%;
	left: 20%;
}

.radio .cr .cr-icon {
	margin-left: 0.04em;
}

.checkbox label input[type="checkbox"], .radio label input[type="radio"]
	{
	display: none;
}

.checkbox label input[type="checkbox"]+.cr>.cr-icon, .radio label input[type="radio"]+.cr>.cr-icon
	{
	transform: scale(3) rotateZ(-20deg);
	opacity: 0;
	transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked+.cr>.cr-icon, .radio label input[type="radio"]:checked+.cr>.cr-icon
	{
	transform: scale(1) rotateZ(0deg);
	opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled+.cr, .radio label input[type="radio"]:disabled+.cr
	{
	opacity: .5;
}

.img-question img{
	width:auto;
	max-height: 400px;
}
</style>
