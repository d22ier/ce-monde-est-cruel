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
		$my_move = $this->result->getLastChoiceFor($this->mySide);
		$his_move =  $this->result->getLastChoiceFor($this->opponentSide);
		if ($his_move == $c)
		{
			$rand = rand(0, 1);
			if ($rand)
			{
				return $f;
			}else{
				return $c;
			}
		}else if ($his_move == $p){

			$rand = rand(0, 1);
			if ($rand)
			{
				return $f;
			}
			return $p;
		} else if ($his_move == $f){

			$rand = rand(0, 1);
			if ($rand)
			{
				return $c;
			}
			return $f;
		}
		return $p;
	}
};
