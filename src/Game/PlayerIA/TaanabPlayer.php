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
		$scores =  $this->result->getStatsFor($this->opponentSide);
		$fScore = $scores['paper'];
		$cScore = $scores['scissors'];
		$pScore = $scores['rock'];
		$maxi = max($pScore,$cScore,$fScore);
		$mini = min($pScore,$cScore,$fScore);
		
		if($fScore == $maxi)
		{
			return $c;
		}
		if ($pScore == $maxi)
		{
			return $f;
		}
		if ($cScore == $maxi)
		{
			return $p;
		}
		return $p;
	}
};
