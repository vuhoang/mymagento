<?php

namespace Mastering\SampleModule\Cron;

use Mastering\SampleModule\Model\ItemFactory;
use Mastering\SampleModule\Model\Config;
use Psr\Log\LoggerInterface;

class AddItem
{
    private $itemFactory;

    private $config;

    protected $logger;

    public function __construct(ItemFactory $itemFactory,
                                Config $config,
                                LoggerInterface $logger)
    {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
        $this->logger = $logger;
    }

    public function logHello(){
        $this->logger->info('Hello from cron job!');
        return $this;
    }
    public function execute()
    {
        if ($this->config->isEnabled()) {
            $this->itemFactory->create()
                ->setName('Scheduled item')
                ->setDescription('Created at ' . time())
                ->save();
        }
    }
}
