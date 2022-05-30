var app = angular.module("testApp",  ['bsTable']);

app.controller("examCtl", function($scope,$http,$timeout) {
    $scope.Exams=[];
    $scope.check=false;
    $scope.check2=false;
    $scope.result=null;
    $scope.exam={};
    $scope.exam.user=[];
    $scope.Users=[];
    $scope.user={};
    $scope.selectedUser=[];

    $scope.getExams=function(){
        $http.get("http://localhost/squiz/admin/exam_config/controller/getExam.php?method=load_Exams").then(function (response) {
            console.log(response);
        $scope.Exams = response.data.records;
        $scope.bsTableExamControl.options.data = $scope.Exams;
        $scope.bsTableExamControl.options.totalRows = $scope.Exams.length; 
    });
    }
    $scope.getExams();  
    $scope.createExam= function(){
        $scope.exam={};
        $scope.exam.user=[];
        $scope.bsTableSelectedUserControl.options.data = [];
        $scope.bsTableSelectedUserControl.options.totalRows = 0 ;
    }
    $scope.saveExam=function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/squiz/admin/exam_config/controller/postExam.php?method=post_question",
            data: {
                exam: $scope.exam
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.result=response.data;
                $scope.getExams();
                $scope.exam={};
                $scope.exam.user=[];
                $timeout($scope.autoHide, 5000);
                
        });
    }
    $scope.confirmDeleteExam=function(){
        var r = confirm("Xác nhận xóa");
        if (r == true) {
           $scope.deleteExam();
        } else {
           
        }
    }
    $scope.deleteExam= function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/squiz/admin/exam_config/controller/deleteExam_config.php?method=del_exam",
            data: {
                examID: $scope.exam.ID_ExamConfig
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.result=response.data;
                $scope.getExams();
                $scope.exam={};
                $scope.exam.user=[];
                $timeout($scope.autoHide, 5000);
        });
    }
    $scope.getSubjects=function(){
        $http.get("http://localhost/squiz/admin/subject/controller/getSubject.php?method=load_subjects").then(function (response) {
            console.log(response);
        $scope.Subjects = response.data.records;
    });
    } 
    $scope.getUsers=function(){
        $http.get("http://localhost/squiz/admin/user/controller/getUsers.php?method=load_users").then(function (response) {
        $scope.Users = response.data.records;
        $scope.bsTableUserControl.options.data =  $scope.Users;
        $scope.bsTableUserControl.options.totalRows = $scope.Users.length; 
    });
    }

    $scope.getUserbyExID =function(){
        
        var request = $http({
            method: "POST",
            url: "http://localhost/squiz/admin/exam_config/controller/getUserbyExamID.php?method=load_users",
            data: {
                examID: $scope.exam.ID_ExamConfig
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.exam.user = response.data.records;
                console.log("🚀 ~ file: exam_config.js ~ line 104 ~ $scope.exam", $scope.exam)
                $scope.bsTableSelectedUserControl.options.data = $scope.exam.user;
                $scope.bsTableSelectedUserControl.options.totalRows = $scope.exam.user.length; 
        });
    

}
    $scope.editExam=function(){
        $scope.getUserbyExID();
    }
    $scope.getUsers();  
    $scope.getSubjects();
    $scope.openUser=function(){
        $scope.getUsers();  
    }
    $scope.addUser= function(){
        if ($scope.selectedUser.length > 0) {
            for(var i=0; i<$scope.selectedUser.length;i++){
                var check=true;
              for(var j=0; j<$scope.exam.user.length;j++)
              {
                  if($scope.selectedUser[i].ID_User==$scope.exam.user[j].ID_User){
                      check=false;
                  } 
              }
              if(check==true) 
              {
                $scope.exam.user.push($scope.selectedUser[i]);
              }
            }
          }
          $scope.bsTableUserControl.options.data = [];
          $scope.bsTableUserControl.options.totalRows = 0;
          $scope.bsTableSelectedUserControl.options.data=$scope.exam.user;
          $scope.bsTableSelectedUserControl.options.totalRows=$scope.exam.user.length;
          $scope.selectedUser=[];
    }
    $scope.deleteUser=function(){
        for(var i=0; i<$scope.exam.user.length;i++)
        {
            if($scope.user.ID_User==$scope.exam.user[i].ID_User){
                $scope.exam.user.splice(i,1)
            } 
        }
        $scope.bsTableSelectedUserControl.options.data=$scope.exam.user;
        $scope.bsTableSelectedUserControl.options.totalRows=$scope.exam.user.length;
    }
    $scope.autoHide= function(){
        $scope.result=null;
    }
    $scope.bsTableExamControl = {
        options: {
            data: $scope.Exams,
            idField: 'id',
            sortable: true,
            striped: true,
            search: true,
            maintainSelected: true,
            clickToSelect: true,
            showColumns: false,
            singleSelect: true,
            showToggle: true,
            pagination: true,
            pageSize: 10,
            pageList: [5, 10, 25, 50, 100],
            onCheck: async function (row, $element) {
                $scope.$apply(function () {
                    $scope.check=true;
                    $scope.exam=row;  
                    $scope.exam.subject = $scope.Subjects.find(item => {
                        return item.ID_Subject ==  $scope.exam.subject.ID_Subject
                    });
      
                    console.log($scope.exam);
                });
            },
            onUncheck: function (row, $element) {
                $scope.check=false;
               $scope.exam={};
               $scope.exam.user=[];
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'ID_ExamConfig',
                title: 'ID đề thi',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'Name',
                title: 'Tên đề thi',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            ,{
                field: 'Num_Question',
                title: 'Số lượng câu hỏi',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            ,{
                field: 'Totaltime',
                title: 'Thời gian làm bài',
                align: 'center',
                valign: 'bottom',
                sortable: true
            },{
                field: 'subjectName',
                title: 'Môn học',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            
        ]
        }
    };
    $scope.bsTableUserControl = {
        options: {
            data: $scope.Users,
            idField: 'id',
            sortable: true,
            striped: true,
            search:true,
            maintainSelected: true,
            clickToSelect: true,
            showColumns: false,
            singleSelect: false,
            showToggle: false,
            pagination: true,
            pageSize: 10,
            pageList: [5, 10, 25, 50, 100],
            onCheck: function (row, $element) {
                $scope.$apply(function () {
                    $scope.selectedUser.push(row);
                });
                console.log($scope.selectedUser);
            },
            onCheckAll: function (rows) {
                $scope.selectedUser=[];
                $scope.$apply(function () {
                    for(var i=0; i<rows.length; i++){
                        $scope.selectedUser.push(rows[i]);
                    }
                });
                console.log($scope.selectedUser);
            },
            onUncheck: function (row, $element) {
                var id = row.ID_User;
               for(var i=0; i<$scope.selectedUser.length; i++){
                   if(id==$scope.selectedUser[i].ID_User){
                    $scope.selectedUser.splice(i,1);
                   }
               }
                console.log($scope.selectedUser);
            },
            onUncheckAll: function (rows) {
                $scope.$apply(function () {
                    $scope.selectedUser.splice($scope.selectedUser.length-rows.length,rows.length);
                });
                console.log($scope.selectedUser);
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'firstname',
                title: 'Họ',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'lastname',
                title: 'Tên',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'email',
                title: 'Email',
                align: 'center',
                valign: 'middle',
                sortable: true
            }]
        }
    };

    $scope.bsTableSelectedUserControl = {
        options: {
            data:$scope.exam.user,
            idField: 'id',
            sortable: true,
            striped: true,
            search:true,
            maintainSelected: true,
            clickToSelect: true,
            showColumns: false,
            singleSelect: true,
            showToggle: false,
            pagination: true,
            pageSize: 10,
            pageList: [5, 10, 25, 50, 100],
            onCheck: function (row, $element) {
                $scope.$apply(function () {
                    $scope.check2=true;
                    $scope.user=row;
                });
            },
            onUncheck: function (row, $element) {
                $scope.check2=false;
               $scope.user={};
               console.log($scope.check);
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'firstname',
                title: 'Họ',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'lastname',
                title: 'Tên',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'email',
                title: 'Email',
                align: 'center',
                valign: 'middle',
                sortable: true
            }]
        }
    };
});