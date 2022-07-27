<?php  

/*
	##function name : check_cnt_date : used to check center certified date and sholud finish after 1 year
	##param : $id , $date
	## $adminid : id number of center admin
	## $date : certified center date to calculate end date
	## $is_cert : to identify if center is certified or not 
*/
function check_cnt_date($adminID,$date,$is_cert){
	global $con;
	
	$stmt = $con->prepare("SELECT cert_date FROM basic_data WHERE adminID = ?");
	$stmt->execute(array($adminID));
	$count = $con->rowCount();
	$row = $stmt->fetch();
	if($count > 0){
		if($is_cert == 1){
			$date = $row['cert_date'];
			$datetostr = strtotime($date); // confert date to string
			$end_date = strtotime("next year",$datetostr); // add one year to date
			$strtodate = date("Y-m-d",$end_date);
			echo $strtodate;
		}else{
			echo 0;
		}
	}
}


  
// filter data function
function test_input($data){
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
	}				
	
/*
		##function name : rowcount();
		##function parameter 3
		#fisrt param is $column 
		#second $table
		#third $value
	
	*/

function rowcount($column,$table,$value){
	
	global $con;
	$stmt = $con->prepare("SELECT $column FROM $table WHERE $column = ?");
	$stmt->execute(array($value));
	$count = $stmt->rowCount();
	return $count;
	
}	
/*
	##function name : tableCount()
	##parameter : 1
	##parameter name $table : table name we need to count its elements

*/
function tableCount($table){
	global $con;
	$stmt = $con->prepare("SELECT * FROM $table");
	$stmt->execute();
	$count = $stmt->rowCount();
	return $count;
}
/*
        ** page title function thet used to add page title to page
        ** that have variable page tile 
    */

    function pageTitle(){
        global $pageTitle;
        if(isset($pageTitle)){
            echo $pageTitle;
        }else{
            
            echo 'الرخصة السودانية لتشغيل الحاسوب';
        }
        
    }


?>