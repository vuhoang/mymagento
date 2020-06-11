<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mastering\SampleModule\Model;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

class DebugHandle extends Base
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

