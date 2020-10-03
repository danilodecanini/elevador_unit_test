<?php

use PHPUnit\Framework\TestCase;
use Application\Entity\Pessoa;

class ChamarElevadorTest extends TestCase
{

  public function testChamarElevador()
  {
    $pessoa = new Pessoa(3);
    $pessoa->chamaElevador($pessoa->andarAtualPessoa());
    $pessoa->entrarNoElevador();
    $pessoa->irParaAndar(8);
    $pessoa->sairElevador();

    $this->assertEquals(3, $pessoa->andarAtualPessoa());
  }
}
