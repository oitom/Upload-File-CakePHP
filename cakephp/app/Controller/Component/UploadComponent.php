<?php 
App::uses('Component', 'Controller');

Class UploadComponent extends Component{

	public $max_files = 5;

	public function do_upload($data = null)
	{
		if(!empty($data)){
			if(count($data) > $this->max_files){
				throw new NotFoundException("Error Processing Request, Max number files accepted is {$this->max_files}", 1);
			}

			$filename = $data["name"];
			$file_tmp_name = $data["tmp_name"];
			$dir = WWW_ROOT.'img'.DS.'uploads';
			$allowed = array('png', 'jpg', 'jpeg', 'bmp', 'pdf');

			if(!in_array(substr(strrchr($filename, '.'), 1), $allowed)){
				throw new NotFoundException("Error Processing Request", 1);
			}
			elseif(is_uploaded_file($file_tmp_name)){
				move_uploaded_file($file_tmp_name, WWW_ROOT . '/uploads/' . $filename);
				return TRUE;
			}		
		}
	}
}
?>