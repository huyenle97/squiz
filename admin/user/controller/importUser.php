<?php


require('../../../libs/spreadsheet-reader/php-excel-reader/excel_reader2.php');
require('../../../libs/spreadsheet-reader/SpreadsheetReader.php');
include_once "../../../config/database.php";
include_once '../../../objects/user.php';
include_once "../../../config/core.php";

if(isset($_POST['Submit'])){
  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePath = 'C:/xampp/htdocs/squiz/uploads/'.basename($_FILES['file']['name']);
    var_dump($_FILES['file']['tmp_name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);

    $totalSheet = count($Reader->sheets());


    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){


        $Reader->ChangeSheet($i);


        foreach ($Reader as $key => $Row)
        {
            if($key !== 0) {
                $database = new Database();
                $db = $database->getConnection();
                $users = new User($db);
                
                $users->firstname = isset($Row[0]) ? $Row[0] : '';
                $users->lastname = isset($Row[1]) ? $Row[1] : '';
                $users->email = isset($Row[2]) ? $Row[2] : '';
                $users->contact_number = isset($Row[3]) ? $Row[3] : '';
                $users->address = isset($Row[4]) ? $Row[4] : '';
                $users->password = isset($Row[5]) ? htmlspecialchars($Row[5]) : htmlspecialchars('123456');
                $users->access_level = 'Student';
                $users->status = 1;
    
                $stmt = $users->createUser();
                echo $stmt;
            }
        }

    }
    header("Location: {$home_url}admin/read_users.php?action=import_success");

  } else { 
    header("Location: {$home_url}admin/read_users.php?action=import_fail"); 
  }


}


?>