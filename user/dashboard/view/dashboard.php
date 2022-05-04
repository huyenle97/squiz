<div ng-app="testApp" ng-controller="dashboardCtl">
    <div class="col-md-12">
        <div class="col-xs-12 d-flex">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <img src='images/anh-websquiz/img-test.png' width="100%">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="col-xs-12 exam" ng-repeat="examconfig in Exam_Configs" >
                    <a href="#" ng-click="open(examconfig)" data-toggle="modal" data-target="#myModal">
                    <!-- user/exam/view/exam.php/{{examconfig.ID_ExamConfig}} -->
                        <div class="examName">
                            {{examconfig.Name}}
                        </div>
                        <div class="examSubjectname">
                            <span class="glyphicon glyphicon-th-list subjectName"></span> {{examconfig.subjectName}}
                        </div>
                        <div class="examTotaltime">
                            <span class="glyphicon glyphicon-time totalTime"></span> Thời gian làm bài: {{examconfig.Totaltime}} phút
                        </div>
                        <div class="examNumberQs">
                            <span class="glyphicon glyphicon-check numQuestion"></span> Số lượng câu hỏi: {{examconfig.Num_Question}} câu
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Modal content detail exam-->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><b> Thông tin </b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-default" style="border: 0px ">
                            <div class="panel-body" style="font-size: 18px;">
                                <div class="row">
                                    <span class="col-xs-12 "><i class="fas fa-address-card" style="margin-right:10px;"></i> Tên đề thi: {{Config.Name}}</span>
                                </div>    
                                
                                <div class="row">
                                    <span class="col-xs-12 "><i class="fas fa-book-reader" style="margin-right:10px;"></i> Tên môn học: {{Config.subjectName}}</span>
                                </div> 
                                
                                <div class="row">
                                    <span class="col-xs-12 "><i class="fas fa-list-ol" style="margin-right:10px;"></i> Số lượng câu hỏi: {{Config.Num_Question}}</span>
                                </div>

                                <div class="row">
                                    <span class="col-xs-12 "><i class="far fa-clock" style="margin-right:10px;"></i> Thời gian làm bài: {{Config.Totaltime}} phút</span>
                                </div>
                            </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" ng-click= <?php echo isset($_SESSION['user_id']) ? "check($_SESSION[user_id],Config.ID_ExamConfig)" : "login()"; ?> class="btn btn-success" data-dismiss="modal">Bắt đầu làm bài</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="user/dashboard/controller/dashboard.js"></script>
    </div>
</div>
<style>
    .container{
        height:1000px;
        padding-left:100px;
        padding-right:100px;
    }
    .navbar{
    margin-bottom: 0px;

    }
</style>
  
