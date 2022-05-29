var app = angular.module("testApp",  ['bsTable']);
app.controller("resultCtl", function($scope,$http) {
    $scope.Results=[];
    $scope.check=false;
    $scope.result=null;
    $scope.result={};
    $scope.examples=[];
    $scope.example=null;

    $scope.getResults=function(){
        $http.get("http://localhost/squiz/admin/result/controller/getResult.php?method=load_Results").then(function (response) {
        $scope.Results = response.data.records;
        $scope.bsTableResultControl.options.data = $scope.Results;
        $scope.bsTableResultControl.options.totalRows = $scope.Results.length; 
    });
    }
    $scope.getResults();  
    $scope.getExamples=function(){
            $http.get("http://localhost/squiz/admin/exam_config/controller/getExam.php?method=load_Exams").then(function (response) {
            $scope.examples = response.data.records;
            $scope.examples.unshift({
                Name: 'Tất cả',
                ID_ExamConfig: ''
            })
            $scope.example= $scope.examples[0];
        });
    }
    $scope.getExamples();
    $scope.loadResult=function(data){
        $http.get("http://localhost/squiz/admin/result/controller/getResult.php?method=load_Results&id_example="+data.ID_ExamConfig).then(function (response) {
            $scope.Results = response.data.records;
            $scope.bsTableResultControl.options.data = $scope.Results;
            $scope.bsTableResultControl.options.totalRows = $scope.Results.length; 
        });
    };
    $scope.bsTableResultControl = {
        options: {
            data: $scope.Result,
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
            onCheck: function (row, $element) {
                $scope.$apply(function () {
                    $scope.check=true;
                    $scope.result=row;
                });
            },
            onUncheck: function (row, $element) {
                $scope.check=false;
               $scope.result={};
               console.log($scope.check);
            },
            columns: [{
                field: 'state',
                checkbox: true
            }
            , {
                field: 'ID_User',
                title: 'Mã thí sinh',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            , {
                field: 'firstname',
                title: 'Họ',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            , {
                field: 'lastname',
                title: 'Tên',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            , {
                field: 'name',
                title: 'Tên bài kiểm tra',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            ,
            {
                field: 'score',
                title: 'Điểm số',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
        ]
        }
    };
    
});
