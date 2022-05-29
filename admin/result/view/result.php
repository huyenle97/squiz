<?php
// core configuration
include_once "../../../config/core.php";
include_once "../../login_checker.php";
// set page title
$page_title="Danh mục kết quả thi";
 
// include page header HTML
include '../../layout_head.php';
?>
<div ng-app="testApp" ng-controller="resultCtl">
    <div class="col-md-12">
        <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" id="mydivheader">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> <b>Quản lý điểm thi </b> </h4>
                        </div>
                    </div>
                </div>
        </div>
        <select class="form-control width-20-em" style="position: absolute;top: 10px;" data-ng-model="example" ng-change="loadResult(example)"  ng-options="ex.Name for ex in examples"></select>
        <table bs-table-control="bsTableResultControl"></table>
        <script src="../controller/result.js"></script>
    </div>
</div>
                    


 <?php
// include page footer HTML
include_once '../../layout_foot.php';
?>