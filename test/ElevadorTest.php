<?php

use PHPUnit\Framework\TestCase;
use Application\Entity\Pessoa;

class ChamarElevadorTest extends TestCase
{

  public function testChamarElevador()
  {
    $pessoa = new Pessoa(0);
    $pessoa->chamaElevador();
    $pessoa->entrarNoElevador();
    // $pessoa->sobe(8);

    $this->assertEquals(1, $pessoa->chamaElevador());
  }

  public function testLimiteDoElevador()
  {
    $pessoa = new Pessoa(0);
    $pessoa->chamaElevador();
    $pessoa->entrarNoElevador();

    $pessoa2 = new Pessoa(2);
    $pessoa2->chamaElevador();
    $pessoa2->entrarNoElevador();

    $this->expectException(Exception::class);
  }
}
