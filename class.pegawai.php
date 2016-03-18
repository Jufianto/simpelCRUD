<?php 
class pegawai
{
	private $db;

	function __construct($conn)
	{
		$this->db = $conn;
	}

	public function create($id,$name,$alamat,$tglLahir)
	{
		try
		{
			$jfqu = $this->db->prepare("INSERT INTO pegawai (id_peg,nm_peg,alamat,birthdate) VALUES(:idPeg,:nmPeg,:alamat,:birthDate)");
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

	public function generateId($date)
	{
		$spldate = explode("-", $date); // explode date by -
        $years = substr($spldate[2], 2); 
        /* get years on date by last two number ex 2015 will get 15 */
        $month = $spldate[1]; //get month
        $date = $spldate[0]; //get date
        $rand = rand();
        $rand = substr($rand, 0 , 3);
        $rand1 = rand(100, 999);
        return $id = $years.$month.$date.$rand1.$rand;
	}

	public function getAllData()
	{
		$jfsql	= "SELECT * FROM pegawai";
		$jfqu	= $this->db->prepare($jfsql);
		$jfqu->execute();
		$jfData	= $jfqu->fetchAll(PDO::FETCH_OBJ);
		return $jfData;
	}

	public function removeOne($id)
	{
		$jfsql	="DELETE FROM pegawai where id_peg =:id";
		$jfqu	= $this->db->prepare($jfsql);
		if ($jfqu->execute(array(":id"=> $id)))
		{
			header('location:index.php?removed');
		}else{
			header('location:index.php?re');	
		}
	}

	public function getOneData($id)
	{
		$jfsql	= "SELECT * FROM pegawai WHERE id_peg = :id";
		$jfqu	= $this->db->prepare($jfsql);
		$jfqu->execute(array(":id"=> $id));
		$jfData = $jfqu->fetch(PDO::FETCH_OBJ);
		return $jfData;
	}

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