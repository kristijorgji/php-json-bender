<?php

namespace kristijorgji\PhpJsonBender\Console;

use kristijorgji\PhpJsonBender\JsonBender;

class PhpJsonBenderApplication
{
    /**
     * @return void
     */
    public function run()
    {
        $args = $this->getArgs();
        $app = new JsonBender();

        $input = file_get_contents($args[0]);
        $result = $app->toArrayDeclaration($input);

        file_put_contents(
            $args[1],
            $result
        );
    }

    /**
     * @return array
     */
    protected function getArgs() : array
    {
        $argv = $_SERVER['argv'];
        array_shift($argv);
        return $argv;
    }
}
