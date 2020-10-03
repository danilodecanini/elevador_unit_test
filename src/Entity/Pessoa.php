<?php

namespace Application\Entity;

use Application\Entity\Elevador;

class Pessoa
{

	protected $andarAtualPessoa;

	public function __construct($andarAtualPessoa)
	{
		$this->andarAtualPessoa = $andarAtualPessoa;
		echo "\nPessoa está no " . $andarAtualPessoa . " andar. Elevador está no " . Elevador::getInstance()->andarAtual() . " andar. \n";
	}

	public function andarAtualPessoa(){
		return $this->andarAtualPessoa;
	}

	public function entrarNoElevador()
	{
		Elevador::getInstance()->entraPessoa($this);
	}

	public function sairElevador()
	{
		Elevador::getInstance()->removerPessoa($this);
		echo "Pessoa sai do elevador. Elevador está no " . Elevador::getInstance()->andarAtual() . " andar. \n";
		echo "Pessoa está no " . Elevador::getInstance()->andarAtual() . " andar. Elevador está no " . Elevador::getInstance()->andarAtual() . " andar. \n";
	}

	public function chamaElevador($andarAtualPessoa)
	{		
		echo "Pessoa chama elevador. Elevador está no " . Elevador::getInstance()->andarAtual() . " andar. \n";
		Elevador::getInstance()->elevadorChamado($this->andarAtualPessoa);		
 	}
	
	public function irParaAndar($andarDesejado){
		Elevador::getInstance()->irParaOAndar($andarDesejado);
	}
}
