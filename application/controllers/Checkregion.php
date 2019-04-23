<?

class Checkregion extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$regionId = $this->input->get('reg');
		$textToFind = $this->input->get('q');
		echo $regionId;
		$toFind = str_replace(' ','+', $textToFind);
		if($regionId == 5){
			redirect('atacama/avisos?q='.$toFind.'&cat=4&reg='.$regionId);
		}else if($regionId == 10){
			redirect('biobio/avisos?q='.$toFind.'&cat=4&reg='.$regionId);
		}
	}
}