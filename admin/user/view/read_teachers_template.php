
<div ng-app="testApp" ng-controller="userCtrl">
<?php

    // get parameter values, and to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
?>  

<div id="modalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="mydivheader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Quản lý tài khoản</h4>
            </div>
            <div class="modal-body create-account">
                <p>Bạn chắc chắn muốn xóa giảng viên này ?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" name="Submit" data-dismiss="modal" ng-click="deleteUser()" class="btn btn-primary" >Xóa</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
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
                <h4 class="modal-title"> Quản lý tài khoản</h4>
            </div>
            <div class="modal-body create-account">

            <div class="row">
                <div class="col-xs-6">
                    <label class="bold">Họ</label>
                    <input type="text" required oninvalid="setCustomValidity('Vui lòng không bỏ trống!')" oninput="setCustomValidity('')" class="form-control" ng-model="user.firstname" />
                </div>
                    <div class="col-xs-6">
                    <label class="bold">Tên</label>
                <input type="text" required oninvalid="setCustomValidity('Vui lòng không bỏ trống!')" oninput="setCustomValidity('')"  class="form-control" ng-model="user.lastname" />
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-6">
                    <label class="bold">Email</label>
                    <input type="text"  class="form-control" ng-model="user.email" />
                </div>
                    <div class="col-xs-6">
                    <label class="bold">Số điện thoại</label>
                <input type="text" class="form-control" ng-model="user.contact_number" />
                </div>
            </div>
     
            <div class="row">
                <div class="col-xs-12">
                    <label class="bold">Mã giảng viên</label>
                    <input type="text" class="form-control"  ng-required="valid" ng-model="user.MSSV" />
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <label class="bold">Địa chỉ</label>
                    <input type="text" class="form-control" ng-model="user.address" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label class="bold">Trạng thái </label>
                    <select class="form-control" ng-model="user.status">
                        <option value='1'>Đang hoạt động</option>
                        <option value='0'>Chưa hoạt động</option>
                    </select>
                </div>
            </div>


            </div>
            <div class="modal-footer">
                <button type="button" ng-click="saveUser()" class="btn btn-primary" ng-disabled="(!user.firstname || !user.MSSV || (user.status == ''))" data-dismiss="modal">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="myModall" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"  ng-form="myForm">
            <div class="modal-header" id="mydivheader">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Quản lý tài khoản</h4>
            </div>
            <div class="modal-body create-account">

            <div class="row">
                <div class="col-xs-6" >
                    <label class="bold">Họ</label>
                    <input type="text" required ng-required="valid"  class="form-control" ng-model="user.firstname" />
                </div>
                    <div class="col-xs-6">
                    <label class="bold">Tên</label>
                <input type="text" ng-required="valid" class="form-control" ng-model="user.lastname" />
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-6">
                    <label class="bold">Email</label>
                    <input type="text"  class="form-control" ng-model="user.email" />
                </div>
                    <div class="col-xs-6">
                    <label class="bold">Số điện thoại</label>
                <input type="text" class="form-control" ng-model="user.contact_number" />
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <label class="bold">Mã giảng viên</label>
                    <input type="text" class="form-control"  ng-required="valid" ng-model="user.MSSV" />
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <label class="bold">Địa chỉ</label>
                    <input type="text"  class="form-control" ng-model="user.address" />
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <label class="bold">Mật khẩu</label>
                    <input type="text"  class="form-control"  ng-required="valid" ng-model="user.password" />
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12">
                    <label class="bold">Trạng thái </label>
                    <select class="form-control" ng-model="user.status">
                        <option value=1 selected>Đang hoạt động</option>
                        <option value=0>Chưa hoạt động</option>
                    </select>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" ng-click="createUser()" class="btn btn-primary" data-dismiss="modal" ng-disabled="(!user.firstname || !user.MSSV || !user.password || (user.status == ''))">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<button class="btn btn-success margin-10" style="margin:10px;"data-ng-click="opencreateUser()"data-toggle="modal" data-target="#myModall"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span></i> Thêm mới</button>
<button class="btn btn-primary margin-10" style="margin:10px;"data-ng-click="editUser()" data-ng-disabled="!check" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Chỉnh sửa</button>
<button class="btn btn-danger margin-10" style="margin:10px;" data-toggle="modal" data-target="#modalDelete" data-ng-disabled="!check"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
<div>

    <div class="alert alert-success alert-dismissible" style="position:fixed; z-index:1000; right:10px; bottom:10px; height:100px;" ng-if="result==1">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công!</strong> Bạn đã cập nhật thành công.
    </div>

    <div class="alert alert-danger" style="position:fixed; z-index:1000; right:10px; bottom:10px; height:100px;" ng-if="result==0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Lỗi!</strong> Có Lỗi xảy ra trong quá trình cập nhật.
    </div>

    <table bs-table-control="bsTableControl"></table>
    <script src="user/controller/teacher.js"></script>

</div>
  
<?php
// display the table if the number of users retrieved was greater than zero

 
    $page_url="read_teachers.php?";
    $total_rows = $user->countAll();
 
    // actual paging buttons
   

 
// tell the user there are no selfies

?>

</div>
