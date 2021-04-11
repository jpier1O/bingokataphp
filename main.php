<?php

require __DIR__.'/vendor/autoload.php';

use \Bingo\Bingo;
use \Bingo\Generator\PlayerGenerator;
use Bingo\Generator\USCardGenerator;
use \Bingo\BingoCaller;
use \Bingo\Config;
use \Monolog\Logger;

if ($argv[1] === '--help') {
    echo sprintf(
        'Usage php %s %s %s %s %s %s %s',
        $argv[0],
    );
    exit;
}

try {
    $logger = new Logger('Bingo');
    $config = Config::fromArgs($argv);
    $cardGenerator = new USCardGenerator($config->getMaxRange(), $config->getDimensions());

    $bingo = new Bingo(
        new BingoCaller($config->getMinRange(), $config->getMaxRange()),
        new PlayerGenerator($cardGenerator, $config->getcantPlayers()),
        $logger
    );

    $bingo->runGame();
} catch (\Exception $exception) {
    $logger->error($exception->getMessage());
}
