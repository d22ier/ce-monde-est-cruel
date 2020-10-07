<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TaanabPlayers
 * @package Hackathon\PlayerIA
 * @author Didier Muhire
 * @commentaire Je m'adapte au coup le plus joué du joueur adverse. Puis si je joue trop de fois la même chose je joue le même coup que le joueur
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
		$mscores =  $this->result->getStatsFor($this->mySide);

		$fScore = $scores['paper'];
		$cScore = $scores['scissors'];
		$pScore = $scores['rock'];


		$mfScore = $mscores['paper'];
		$mcScore = $mscores['scissors'];
		$mpScore = $mscores['rock'];
			

		$maxi = max($pScore,$cScore,$fScore);
		$mini = min($pScore,$cScore,$fScore);
		
		$mmaxi = max($mpScore,$mcScore,$mfScore);
		$mmini = min($mpScore,$mcScore,$mfScore);

		if($fScore == $maxi)
		{
			if($mmaxi == $c)
			{
				return $f;
			}
			return $c;
		}
		if ($pScore == $maxi)
		{
			if($mmaxi == $f)
			{
				return $p;
			}
			return $f;
		}
		if ($cScore == $maxi)
		{
			if($mmaxi == $p)
			{
				return $c;
			}
			return $p;
		}
		return $p;
	}
};
