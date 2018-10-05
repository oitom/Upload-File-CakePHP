<?php 
	class UploadController extends AppController
	{
		var $name = "upload";
		var $uses = array();

		public $components = array('Upload');

		public function index()
		{
			if (!empty($_FILES)) {
				if($this->Upload->do_upload($_FILES["arquivo"]))
					echo "Sucesso!";
			}		
		}
	}
 ?>