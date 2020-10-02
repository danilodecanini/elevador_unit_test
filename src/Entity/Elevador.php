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


	private function __construct()
	{
		$this->andarAtualElevador = 5;
	}

	public static function getInstance()
	{
		if (self::$instance == NULL) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function receberPessoa(Pessoa $pessoa)
	{
		if (sizeof($this->pessoas) < 1) {
			$this->pessoas[] = $pessoa;
		} else {
			throw new Exception('O Elevador está cheio');
		}
	}

	public function removerPessoa(Pessoa $pessoa)
	{
		foreach ($this->pessoas as $index => $pessoaNoElevador) {
			if ($pessoaNoElevador === $pessoa) {
				unset($this->pessoas[$index]);
			}
		}
	}

	public function irParaOAndar($andarSolicitado)
	{
	}

	public function subir($andarDesejado)
	{
		for ($i = $this->andarAtualElevador; $i <= $andarDesejado; $i++) {
			echo "O Elevador esta no andar: " . $i . "<br>";
		}

		return $this->andarAtualElevador = $i;
	}

	public function descer($andarDesejado)
	{
		for ($i = $this->andarAtualElevador; $i >= $andarDesejado; $i--) {
			echo "O Elevador esta no andar: " . $i . "<br>";
		}

		return $this->andarAtualElevador = $i;
	}
}
