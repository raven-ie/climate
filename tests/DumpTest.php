<?php

class DumpTest extends PHPUnit_Framework_TestCase
{
    public $cli;

    public function setUp()
    {
        $this->cli = new JoeTannenbaum\CLImate\CLImate;
    }

    /** @test */

    public function it_can_dump_a_variable()
    {
        ob_start();

        $this->cli->dump('This thing');

        $result = ob_get_contents();

        ob_end_clean();

        $should_be = [];

        $should_be[] = 'string(10) "This thing"';
        $should_be[] = '';

        $should_be = "\e[m" . implode( "\n", $should_be ) . "\e[0m\n";

        $this->assertSame( $should_be, $result );
    }

}