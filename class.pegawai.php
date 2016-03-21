<?php 
class pegawai
{
	private $db;

	function __construct($conn)
	{
		$this->db = $conn;	//define and run connection 
	}

	/*
		make function insert data to database
	*/
	public function create($id,$name,$alamat,$tglLahir)
	{
		try
		{
			// sql to insert 
			$jfqu = $this->db->prepare("INSERT INTO pegawai (id_peg,nm_peg,alamat,birthdate) VALUES(:idPeg,:nmPeg,:alamat,:birthDate)");
			$jfqu->bindparam(":idPeg",$id);
			$jfqu->bindparam(":nmPeg",$name);
			$jfqu->bindparam(":alamat",$alamat);
			$jfqu->bindparam(":birthDate",$tglLahir);
			// execute the sql
			$jfqu->execute();	
			return true;
		}catch(PDOException $ex){
			// if can not  print this code error
			echo $ex->getMessage();
			return false;
		}
		
	}

	/* function generate id */
	public function generateId($date)
	{
		$spldate = explode("-", $date); // explode date by -
        $years = substr($spldate[2], 2); 
        /* get years on date by last two number ex 2015 will get 15 */
        $month = $spldate[1]; //get month
        $date = $spldate[0]; //get date
        $rand = rand();		//run random code 
        $rand = substr($rand, 0 , 3); // get string from $rand and take letter start from 0 to 3
        $rand1 = rand(100, 999); 	  // make rand beetwen 100 until 99
        return $id = $years.$month.$date.$rand1.$rand;
	}

	/* Get All data from database*/
	public function getAllData()
	{
		$jfsql	= "SELECT * FROM pegawai";
		$jfqu	= $this->db->prepare($jfsql);
		$jfqu->execute();
		$jfData	= $jfqu->fetchAll(PDO::FETCH_OBJ);	// set fetch mode to object
		return $jfData;
	}

	/* Delete data from database */
	public function removeOne($id)
	{
		$jfsql	="DELETE FROM pegawai where id_peg =:id";
		$jfqu	= $this->db->prepare($jfsql);
		if ($jfqu->execute(array(":id"=> $id)))	// if code execute true 
		{
			header('location:index.php?removed'); //link to index 
		}else{
			header('location:index.php?re');	// link to index failure
		}
	}

	/* Get One Data from database */
	public function getOneData($id)
	{
		$jfsql	= "SELECT * FROM pegawai WHERE id_peg = :id";
		$jfqu	= $this->db->prepare($jfsql);
		$jfqu->execute(array(":id"=> $id));
		$jfData = $jfqu->fetch(PDO::FETCH_OBJ);
		return $jfData;
	}

	/* Function Edit data on database*/
	public function edit($id,$name,$alamat,$tglLahir)
	{
		try
		{
			$jfqu = $this->db->prepare("UPDATE pegawai SET nm_peg=:nmPeg,alamat=:alamat,birthdate=:birthDate WHERE id_peg=:idPeg ");
			$jfqu->bindparam(":idPeg",$id);
			$jfqu->bindparam(":nmPeg",$name);
			$jfqu->bindparam(":alamat",$alamat);
			$jfqu->bindparam(":birthDate",$tglLahir);
			$jfqu->execute();	
			return true;
		}catch(PDOException $ex){
			echo $ex->getMessage();
			return false;
		}
		
	}




}
?>