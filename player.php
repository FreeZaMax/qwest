<?

class player{

var $id = 33;
var $lvl;

//функции для плеера
	
	function get_id(){
		return $this->id;	
	}
	
	function get_lvl(){
		$this->lvl = rand(49,51);
		return $this->lvl;	
	}
	

}
