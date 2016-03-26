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
	public function create($id,$name,$alamat,$tglLahir,$jk,$foto)
	{
		try
		{
			// sql to insert 
			$jfqu = $this->db->prepare("INSERT INTO pegawai (id_peg,nm_peg,alamat,birthdate,jk,foto) VALUES(:idPeg,:nmPeg,:alamat,:birthDate,:jk,:foto)");
			$jfqu->bindparam(":idPeg",$id);
			$jfqu->bindparam(":nmPeg",$name);
			$jfqu->bindparam(":alamat",$alamat);
			$jfqu->bindparam(":birthDate",$tglLahir);
			$jfqu->bindparam(":jk",$jk);
			$jfqu->bindparam(":foto",$foto);
			// execute the sql
			if ($this->uploadFile($id)) {
			$jfqu->execute();
			return true;
			}
				
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
	public function edit($id,$name,$alamat,$tglLahir,$jk)
	{
		try
		{
			$jfqu = $this->db->prepare("UPDATE pegawai SET nm_peg=:nmPeg,alamat=:alamat,birthdate=:birthDate, jk=:jk WHERE id_peg=:idPeg ");
			$jfqu->bindparam(":idPeg",$id);
			$jfqu->bindparam(":nmPeg",$name);
			$jfqu->bindparam(":alamat",$alamat);
			$jfqu->bindparam(":birthDate",$tglLahir);
			$jfqu->bindparam(":jk",$jk);


			if ($this->uploadFile($id)) { 			/* Jika upload file berhasil*/
			$jfqu->execute();
			return true;
			}
		}catch(PDOException $ex){
			echo $ex->getMessage();
			return false;
		}
		
	}

	/* Function to Upload File*/

	public function uploadFile($id)
	{
            $targetDir  = 'foto/';               		 /* Target Directory*/		 	 
            $jfData     = $this->getOneData($id);
		 	$namaFoto = basename($_FILES["foto"]["name"]);
		 	$uploadOk = 0;
		 	if($jfData) { $targetFile 	= $targetDir . $jfData->foto; }
		 	$newFoto 	= $this->generateNameFoto($namaFoto,$id);
		if ($jfData == false)						/* jika data pegawai belum ada */
            {
                
                
                $targetFile 	= $targetDir . $newFoto;		/* Membuat nama foto baru*/
              	$uploadOk 	= 1;

                
            }else									/* Jika data pegawai telah ada */
            {
                if(file_exists($targetFile))
                {
                	unlink($targetFile);			/* Hapus foto yang telah ada */
                }
				
				$targetFile	= $targetDir . $newFoto;
				
					$uploadOk	= 1;
				
            }
            $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);  /* Get info extension file*/
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
            {
    			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    			$uploadOk = 0;
			}

			if ($uploadOk == 0) {
   			 	echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} else {
				/* Start Upload */
    			if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {

         			return true;
    			} else {
        			echo "Sorry, there was an error uploading your file.";
    				return false;
    			}
			}			




	}

	public function generateNameFoto($namaFoto,$id)
	{
		/* Memecahkan file dalam format " . " dan dibagi berdasarkan array*/
		$splitData	= explode('.', $namaFoto);			
		$newName	= "$id.$splitData[1]";
		return $newName;
	}




}
?>