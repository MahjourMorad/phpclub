
<?php
require('Database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection();
class DbFunction{
	
	function login($loginid,$password){
	
      if(!ctype_alpha($loginid) || !ctype_alpha($password)){
      	
        echo "<script>alert('Either LoginId or Password is Missing')</script>";
      
      }		
   else{		
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT loginid, password FROM tbl_login where loginid=? and password=? ";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
		
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
		
		$stmt->bind_param('ss',$loginid,$password);
		$stmt->execute();
		$stmt -> bind_result($loginid,$password);
		$rs=$stmt->fetch();
		if(!$rs)
		{
			echo "<script>alert('Invalid Details')</script>";
			header('location:login.php');
		}
		else{
			
			header('location:add-projet.php');
		}
	}
	
	}
	
	}
	
	function create_projet($title,$description,$chefprojet){
		
				if($title==""){
			 
			echo "<script>alert('Select  Course Short Name')</script>";
		
		}
		
		
		else if($description==""){
			 
			echo "<script>alert('Select  Course Full Name')</script>";
		
		}
		
		else{
			
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into projet(title,description,chefprojet)values(?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('sss',$title,$description,$chefprojet);
				$stmt->execute();
				echo "<script>alert('Course Added Successfully')</script>";
					//header('location:login.php');
				
			}
		}				
	}

	function create_membre($nom,$prenom,$filiere){
		
		if($nom==""){
	 
	echo "<script>alert('Select  Course Short Name')</script>";

}


else if($prenom==""){
	 
	echo "<script>alert('Select  Course Full Name')</script>";

}

else{
	
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "insert into membre(nom,prenom,filiere)values(?,?,?)";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
	
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
	
		$stmt->bind_param('sss',$nom,$prenom,$filiere);
		$stmt->execute();
		echo "<script>alert('Membre Ajoutee Avec Succees')</script>";
			//header('location:login.php');
		
	}
}				
}




function showCourse(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM projet";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showCourse1($id){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM projet  where id='".$id."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showMembre(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM membre";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showMembre1($id){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM membre  where id='".$id."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showTache(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM taches ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}


function showSession(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM session  ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showTache1($id){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM taches where id='$id' ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}


function create_tache($titre,$description,$creele,$avantle){
		
				if($titre==""){
			 
			echo "<script>alert('Select  Course Short Name')</script>";
		
		}
		
		
		else if($description==""){
			 
			echo "<script>alert('Select  Course Full Name')</script>";
		
		}
		
		else{
			
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into taches(titre,description,creele,avantle)values(?,?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('ssss',$titre,$description,$creele,$avantle);
				$stmt->execute();
				echo "<script>alert('Course Added Successfully')</script>";
					
				
			}
		}				
	}

	
function showCountry(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM countries ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	
function showStudents(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM registration ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	

function showStudents1($id){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM registration  where id='".$id."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	

function register($cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,
                  $nation,$mobno,$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,
				   $pyear1,$pyear2,$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$session){
 			          
 			        $db = Database::getInstance();
		           	$mysqli = $db->getConnection();
		           	
		           //	echo $session;exit;
   $query = "INSERT INTO `registration` (`course`, `subject`, `fname`, `mname`, `lname`, `gender`, `gname`, `ocp`,
                     `income`, `category`, `pchal`, `nationality`, `mobno`, `emailid`, `country`, `state`, `dist`, 
					 `padd`, `cadd`, `board`, `board1`,`roll`,`roll1`,`pyear`,`yop1`,`sub`,`sub1`,`marks`,`marks1`,
					 `fmarks`,`fmarks1`,`session`,regno) 
                   VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			        $reg=rand();
			        $stmt= $mysqli->prepare($query);
			        if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }
			
			    else{
			
			$stmt->bind_param('sssssssssssssssssssssssssssssssss',
		         	$cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,$nation,$mobno,
					$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,$pyear1,$pyear2,
					$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$session,$reg);
			$stmt->execute();
		   	echo "<script>alert('Successfully Registered , your registration number is $reg')</script>";
		 	//header('location:login.php');
				
		  }
				


       }


function edit_projet($title,$description,$chefprojet,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	//echo $cshort.$cfull.$udate.$id;exit;
	$query = "update projet set title=?,description=? ,chefprojet=? where id=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('sssi',$title,$description,$chefprojet,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Projet Modifiee avec succes")'; 
    echo '</script>';

}

function edit_membre($nom,$prenom,$filiere,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	//echo $cshort.$cfull.$udate.$id;exit;
	$query = "update membre set nom=?,prenom=? ,filiere=? where id=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('sssi',$nom,$prenom,$filiere,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Membre Modifiee avec succes")'; 
    echo '</script>';

}


function edit_tache($titre,$description,$creele,$avantle,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update taches set titre=?,description=? ,creele=?,avantle=? where id=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('ssssi',$titre,$description,$creele,$avantle,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Tache modifiee avec succees")'; 
    echo '</script>';

}

function edit_std($cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,
                  $nation,$mobno,$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,
				   $pyear1,$pyear2,$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$id){
  // echo $id;exit;
    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update registration set course=?,subject=?,fname=?,mname=?,lname=?,gender=?,gname=?,ocp=?
              , income=?,category=?,pchal=?,nationality=?,mobno=?,emailid=?,country=?,state=?,dist=?
         	 ,padd=?,cadd=?,board=?,roll=?,pyear=?,sub=?,marks=?,fmarks=?,board1=?,roll1=?,yop1=?,sub1=?
              ,marks1=?,fmarks1=? where id=?" ;
    //echo $query;
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }

	$rc=$stmt->bind_param('sssssssssssssssssssssssssssssssi',$cshort,$cfull,$fname,$mname,$lname,$gender,$gname,$ocp,$income,$category,$ph,
                  $nation,$mobno,$email,$country,$state,$city,$padd,$cadd,$board1,$board2,$roll1,$roll2,
				   $pyear1,$pyear2,$sub1,$sub2,$marks1,$marks2,$fmarks1,$fmarks2,$id);
				   
    //echo $rc;
 if ( false===$rc ) {
 
            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
  }		   
	$rc=$stmt->execute();
	
	if ( false==$rc ) {
          die('execute() failed: ' . htmlspecialchars($stmt->error));
    }
	else{
         echo '<script>'; 
         echo 'alert(" Successfully Updated")'; 
          echo '</script>';
		}  
  
}


function del_course($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from projet where id=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Projet has been deleted')</script>";
    echo "<script>window.location.href='view-projet.php'</script>";
}

function del_tache($id){

   $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from taches where id=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('i',$id);
	$stmt->execute();
    echo "<script>alert('Tache has been deleted')</script>";
    echo "<script>window.location.href='view-tache.php'</script>";

}

 function del_subject($id){

     //echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from subject where subid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('i',$id);
	$stmt->execute();
    echo "<script>alert('Subject has been deleted')</script>";
   // echo "<script>window.location.href='view-course.php'</script>";
}

}

?>



