<?php

namespace Amit\Learning\Handler;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

class Custom extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/debug_custom.log';
    
    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}