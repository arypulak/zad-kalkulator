<?php

namespace spec\aarypulak\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PolekwadratuSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('aarypulak\Tools\Polekwadratu');
    }
    function it_should_have_setter_and_gettter()
    {
        $this->setA(123)->getA()->shouldReturn(123);
    }
    function it_should_calculate_polekwadratu()
{
    $this->setA(3)->polekwadratu()->shouldReturn(9);
}
}
