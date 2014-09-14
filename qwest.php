<?

class qwest_core{

var $StartNpc;
var $TalkId = array();
var $KillId = array();
var $COND;


// квестовые функции
	
	function setCond($temp){
		$this->COND = $temp;
		echo '"setCond($temp):" UPDATE строки в базе, задаем cond='.$temp.'<br> ';
	}
	
	function addStartNpc($id){
		$this->StartNpc = $id;
		echo '"addStartNpc($id):" Создать кноку квест для NPS с id = '.$id.'<br>';
	}
	
	function addTalkId($id){
		$this->TalkId[] = $id;
		echo '"addTalkId($id):" Создать диалок для квеста, для NPS с id = '.$id.', если этот квест находится в режиме прохождения<br>';
	}
	
	function addKillId(){
		$this->KillId[] = $id;
	}
	
	function startQwest(){
			echo '"startQwest():" проверяе есть ли в базе строки, если нет, то<br>';
			echo '"startQwest():" INSERT строки в базу с state=STARTED и cond=1<br>';
			echo '"startQwest():" COND = 1;<br>';
			$this->COND = 1;
	}
	
	function exitQuest($temp){
		if($temp == true){
			echo '"exitQuest(true):" DELETE строки из базы (если true, то есть возможность повторять квест) <br>';
		}
		
		if($temp == false){
			echo '"exitQuest(false):" UPDATE строки в базе, задаем state=FINISHED (если false, то квест одноразовай)<br> 
			"exitQuest(false):" Данный метод с false можно использовать и для отмены квеста, чтобы после отмены можно было его повторить
			';
		}
	}
	
	
	
// работа с юзером
	
	function addQuestItem($item, $count){
		echo '"addQuestItem($item, $count):" добавляем квестовый итем "'.$item.'"(колво) "'.$count.'" игроку<br>';
	}
	
	function takeItems($item, $count){
		echo '"takeItems($item, $count):" Забираем итем "'.$item.'" (колво) "'.$count.'" у игрока<br>';
	}
	
	function giveItems($item, $count){
		echo '"giveItems($item, $count):" добавляем итем "'.$item.'" (колво) "'.$count.'" игроку<br>';
	}
	
	function addExpAndSp($exp, $sp){
		echo '"addExpAndSp($exp, $sp):" добавляем експу "'.$exp.'" и сп "'.$sp.'" игроку<br>';
	}
	

// работа со звуком
	
	function playSound($sound){
		echo '"playSound($sound):" ЗАПУСК ЗВУКА - '.$sound.'<br>';		
	}
	
	
	
	


}
