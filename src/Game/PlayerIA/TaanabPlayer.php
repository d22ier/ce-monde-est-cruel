<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TaanabPlayers
 * @package Hackathon\PlayerIA
 * @author Didier Muhire
 */
class TaanabPlayer extends Player
{
	protected $mySide;
	protected $opponentSide;
	protected $result;

	public function getChoice()
	{
		$turn = $this->result->getNbRound();
		$c =  parent::scissorsChoice();
		$f =  parent::paperChoice();
		$p = parent::rockChoice();
		for ($i = 1; $i < $turn; $i++) {
			$my_move = $this->result->getLastChoiceFor($this->mySide);
			$his_move =  $this->result->getLastChoiceFor($this->opponentSide);
			if ($his_move == $c)
			{
				return $f;
			}else if ($his_move == $p){
				return $f;
			} else if ($his_move == $f){
				return $c;
			}
		}
		return $p;
	}
};
