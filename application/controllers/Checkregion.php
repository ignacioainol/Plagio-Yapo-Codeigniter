<?

class Checkregion extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$regionId   = $this->input->get('reg');
		$textToFind = $this->input->get('q');
		$category = "''";
		$checkCategory   = $this->input->get('cat');
		if($checkCategory !== "xxx"){
			$category = $this->input->get('cat');
		}
		$comunas[]  = $this->input->get('cm');

		foreach ($comunas[0] as $key => $val) {
			$comns .= "&cm=".$val;
		}

		$toFind = str_replace(' ','+', $textToFind);
		if($regionId == 1){
			redirect('region_metropolitana/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns );
		}else if($regionId == 2){
			redirect('arica_y_parinacota/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns );
		}else if($regionId == 3){
			redirect('tarapaca/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 4){
			redirect('antofagasta/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 5){
			redirect('atacama/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 6){
			redirect('coquimbo/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 7){
			redirect('valparaiso/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 8){
			redirect('ohiggins/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 9){
			redirect('maule/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 10){
			redirect('biobio/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 11){
			redirect('araucania/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 12){
			redirect('los_rios/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 13){
			redirect('los_lagos/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 14){
			redirect('aisen/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}else if($regionId == 15){
			redirect('magallanes/avisos?q='.$toFind.'&cat='.$category.'&reg='.$regionId.$comns);
		}
	}
}