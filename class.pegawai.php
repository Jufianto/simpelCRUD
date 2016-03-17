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




}
?>