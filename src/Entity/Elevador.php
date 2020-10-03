<?php

namespace Application\Entity;

use Exception;

use function PHPUnit\Framework\throwException;

class Elevador
{

	protected $andarAtualElevador;
	protected $pessoas = array();
	protected $andarDesejado;
	protected static $instance = NULL;
	protected $status;
	protected $andarSolicido;

	private function __construct()
	{
		$this->andarAtualElevador = 5;
		$this->status = 'Vazio';
	}

	public static function getInstance()
	{
		if (self::$instance == NULL) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function andarAtual(){
		return $this->andarAtualElevador;
	}

	public function entraPessoa(Pessoa $pessoa)
	{
		$this->pessoas[] = $pessoa;
		$this->status = "Ocupado";
		echo "Pessoa entra no elevador. Elevador está no " . $this->andarAtualElevador . " andar \n";
	}

	public function removerPessoa(Pessoa $pessoa)
	{
		foreach ($this->pessoas as $index => $pessoaNoElevador) {
			if ($pessoaNoElevador === $pessoa) {
				unset($this->pessoas[$index]);
			}
		}
	}

	public function elevadorChamado($andarSolicitado)
	{
		$this->andarSolicitado = $andarSolicitado;
		$this->irParaOAndar($andarSolicitado);
	}

	public function irParaOAndar($andarDesejado)
	{
		if($this->status === "Ocupado"){
			echo "Pessoa aperta " . $andarDesejado . " andar. Elevador está no " . $this->andarAtualElevador . " andar \n";
		}
		if($this->andarAtualElevador > $andarDesejado){
			$this->descer($andarDesejado);
		} else {
			$this->subir($andarDesejado);
		}
	}

	public function subir($andarDesejado)
	{
		for ($i = $this->andarAtualElevador+1; $i <= $andarDesejado; $i++) {
			if($this->status === "Vazio"){
				echo "Pessoa está no " . $this->andarSolicitado . ". O Elevador esta no andar: " . $i . "\n";
			} elseif ($this->status === "Ocupado"){
				echo "Pessoa está no elevador. O Elevador esta no andar: " . $i . "\n";
			}
			$this->andarAtualElevador = $i;
		}

	}

	public function descer($andarDesejado)
	{
		for ($i = $this->andarAtualElevador-1; $i >= $andarDesejado; $i--) {
			if($this->status === "Vazio"){
				echo "Pessoa está no " . $this->andarSolicitado . ". O Elevador esta no andar: " . $i . "\n";
			} elseif ($this->status === "Ocupado"){
				echo "Pessoa está no elevador. O Elevador esta no andar: " . $i . "\n";
			}
			$this->andarAtualElevador = $i;
		}
	}
}
