<?php
/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 9/11/2021
 * Time: 2:27 PM
 */

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\StringInput;

class BaseWebTestCase extends WebTestCase
{
    protected static $application;
    public static $container;
    public $client;
    public function setUp(): void
    {
        parent::setUp();
        $this->client = self::createClient();
        self::bootKernel();


        // (2) use static::getContainer() to access the service container
        self::$container = static::getContainer();
        self::runCommand('doctrine:fixtures:load --env=test --no-interaction');

    }

    protected static function getApplication()
    {
        if (null === self::$application) {
            self::ensureKernelShutdown();
            $client = static::createClient();

            self::$application = new Application($client->getKernel());
            self::$application->setAutoExit(false);
            self::bootKernel();
        }

        return self::$application;
    }


    protected static function runCommand($command)
    {
        $command = sprintf('%s --quiet', $command);

        return self::getApplication()->run(new StringInput($command));
    }

}