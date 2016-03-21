<?php include "header.php"; 
require_once "config.php";
require_once "class.pegawai.php";
$peg = new pegawai($conn);
?>

<div class="container">
	
	<div class="row">
	<!-- start row -->

	<?php 
            $id = $_GET['id'];
            $targetDir  = 'foto/';               /* Target Directory*/
            $targetFile = $targetDir . $id;     /* Nama file yang akan disimpan */
            $jfData     = $peg->getOneData($id);

            if ($jfData == false)
            {
                print_r($jfData);
                echo "ada";
            }else
            {
                echo "string";
                echo $jfData->foto;
                echo "1";
                print_r($jfData);
            }

     ?>




    <!-- end row -->
	</div>
	</div>
   
<?php include "footer.php"; ?>