<?php

namespace Application\Entity;

use Application\Entity\Elevador;

class Pessoa
{

	protected $andarAtualPessoa;

	public function __construct($andarAtualPessoa)
	{

		$this->andarAtualPessoa = $andarAtualPessoa;
	}

	public function entrarNoElevador()
	{

		Elevador::getInstance()->receberPessoa($this);
	}

	public function sairElevador()
	{
		Elevador::getInstance()->removerPessoa($this);
	}

	public function chamaElevador()
	{

		Elevador::getInstance()->irParaOAndar($this->andarAtualPessoa);
	}
}
