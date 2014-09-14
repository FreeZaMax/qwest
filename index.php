<?
// подключаем все необходимое для квеста

include('qwest.php');
include('npc.php');
include('player.php');

/////////////////////////////////////////////////////////
class qwest_1 extends qwest_core{
	

//задаем переменные для квеста	
	var $IVAN = 1;
	var $LENA = 2;
	var $BOX = 250;

//инициализируем квест
	function qwest_d(){
		addStartNpc($this->IVAN);
		addTalkId($this->IVAN);
		addTalkId($this->LENA);
		addQuestItem($this->BOX);
	}

//Евенты квеста, ДЕЙСТВИЯ ВО ВРЕМЯ РАЗГОВОРОВ (минимум 2 "начало и конец")
	
	function event($event){
		
		if($event == 'start'){
			$this->startQwest();
			$this->giveItems($this->BOX, 1);
			$this->playSound('ADD_QWEST');
		}
		
		if($event == 'finish'){
			$this->setCond(1);
			$this->giveItems('money', 1000000);
			$this->exitQuest(true);
			$this->playSound('FINISH_QWEST');
		}
		
	}
	
	
//Диалоги если квест запущен
	
	function talk($id_npc){ //данный метод не должен принимать параметров, но для примера мы его передаем
		$player = new player;
		//этот код до следующего комента мусорный, но нужен для работы в примере
		
		$target_npc = $id_npc;
		
		
		/*   ТАКИМ ОБРАЗОМ ПОЛУЧАЕМ ID NPC
 		$npc = new NPC;
		$target_npc = $npc->get_npc_id();
		*/
		
		if($target_npc == $this->IVAN){
			if($this->COND == 0){
				if($player->get_lvl() >= 50){
					echo '<strong>ИВАН</strong> Твой уровень подходит, ты можешь взять квест - даем ссылку на евент event(start); 
					"Этот евент должен запускать игрок, тут я его сам запускаю, типа мы согласились выполнять квест"<br><hr>';
					$this->event('start');
					return;
				}
				else{
					echo '<strong>ИВАН</strong> Твой уровень не подходит, ты не можешь взять этот квест<br>';
					return;
				}
			}
			if($this->COND == 1){
				echo '<strong>ИВАН</strong> я тебе уже дал это задание, иди выполняй его!<br>';
				return;
			}
		}
		
		
		if($target_npc == $this->LENA){
			if($this->COND == 1){
				echo '<strong>ЕЛЕНА</strong> О ты принес мою коробку! - даем ссылку на евент event(finish)<br><hr>';
				$this->event('finish');
				return;
			}

		}
		
		

		
	}
	

	
}


$qwest = new qwest_1; // создаем квест

echo '<span style="color:red;">подходим к Ивану, выбираем qwest_1 (наш уровень выставляется рандомно в классе player, 
минимальный уровень для квеста 50, rand(49,51)</span>';
echo '<hr>';
$qwest->talk(1);//параметр в этот метод не нужно передавать, я его передаю только для того чтобы обозначить NPC к которому обращаюсь
echo '<hr>';
echo '<span style="color:red;">еще раз подходим к Ивану и кликаем на этот же квест (qwest_1)</span>';
echo '<hr>';
$qwest->talk(1);//параметр в этот метод не нужно передавать, я его передаю только для того чтобы обозначить NPC к которому обращаюсь
echo '<hr>';
echo '<span style="color:red;">Подходим к Елене, кликаем на квест qwest_1</span>';
echo '<hr>';
$qwest->talk(2);//параметр в этот метод не нужно передавать, я его передаю только для того чтобы обозначить NPC к которому обращаюсь







