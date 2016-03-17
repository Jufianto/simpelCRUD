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




}
?>