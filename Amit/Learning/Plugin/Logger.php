<?php

namespace Amit\Learning\Plugin;

use Amit\Learning\Controller\Index\Index;
//use Symfony\Component\Console\Output\OutputInterface;

class Logger
{
    /**
     * @var OutputInterface
     */
    private $output;

    public function beforeSum(Index $subject , $a, $b) {
        echo "Before execute plugin";
        $a= 20;
        $b= 30;
       // return [$a,$b];
    }


    public function afterSum(Index $subject, $result)
    {
        echo '----------afterExecute plugin';
        echo "result = ".$result;
        $result = 100;
        return $result;
    }
}