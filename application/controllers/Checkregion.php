<?

class Checkregion extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$regionId   = $this->input->get('reg');
		$textToFind = $this->input->get('q');
		$category   = $this->input->get('cat');
		$comunas[]  = $this->input->get('cm');

		foreach ($comunas[0] as $key => $val) {
			$comns .= "&cm=".$val;
		}

		$toFind = str_replace(' ','+', $textToFind);
		if($regionId == 5){
			redirect('atacama/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns );
		}else if($regionId == 10){
			redirect('biobio/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}
	}
}