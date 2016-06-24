<?php

use DesignPatterns\Interpreter\Bar;
use DesignPatterns\Interpreter\Duration;
use DesignPatterns\Interpreter\Note;
use DesignPatterns\Interpreter\Pitch;
use DesignPatterns\Interpreter\Score;
use DesignPatterns\Mediator\Channel;
use DesignPatterns\Mediator\Outputs\Speakers;
use DesignPatterns\Mediator\MixingDesk;
use DesignPatterns\Mediator\Outputs\Monitor;
use DesignPatterns\Mediator\Instruments\Bass;
use DesignPatterns\Mediator\Instruments\Drums;
use DesignPatterns\Mediator\Instruments\Guitar;
use DesignPatterns\Mediator\Instruments\Vocals;
use DesignPatterns\Mediator\Musicians\Bassist;
use DesignPatterns\Mediator\Musicians\Drummer;
use DesignPatterns\Mediator\Musicians\Guitarist;
use DesignPatterns\Mediator\SoundEngineer;
use DesignPatterns\Mediator\Musicians\Vocalist;
use DesignPatterns\Mediator\Requests\TurnDownInMyMonitor;
use DesignPatterns\Mediator\Requests\TurnUpInMyMonitor;
use DesignPatterns\Visitor\DirectoryNode;
use DesignPatterns\Visitor\DirectoryPrinterVisitor;
use DesignPatterns\Visitor\FileNode;

include_once __DIR__ . '/vendor/autoload.php';
//
//$dir = new DirectoryNode('Dir1');
//$dir->append(new FileNode('text.txt'));
//$dir->append(new FileNode('bar.txt'));
//$dir2 = new DirectoryNode('Dir2');
//$dir2->append(new FileNode('file3'));
//$dir->append($dir2);
//$dir3 = new DirectoryNode('Dir3');
//$dir->append($dir3);
//$dir3->append(new DirectoryNode('src'));
//$dir4 = new DirectoryNode('spec');
//$dir4->append(new FileNode('foo.php'));
//$dir2->append($dir4);
//
//
//$printer = new DirectoryPrinterVisitor();
////$dir->accept(AlphabeticSorter);
//$dir->accept($printer);
//
//print $printer->getOutput();


//$handlers = [
//    new \DesignPatterns\Command\PlayGuitarHandler(),
//    new \DesignPatterns\Command\BuyGuitarHandler()
//];
//
//array_walk($handlers, function (\DesignPatterns\Command\Handler $handler) {
//    var_dump($handler->handle(new \DesignPatterns\Command\BuyGuitarCommand('fender')));
//});


//$c = Pitch::fromPitch('C3');
//$d = Pitch::fromPitch('D3');
//$e = Pitch::fromPitch('E3');
//$f = Pitch::fromPitch('F3');
//$g = Pitch::fromPitch('G3');
//$crotchet = Duration::crotchet();
//$minim = Duration::minim();
//
//$bar1 = new Bar(
//    new Note($c, $crotchet),
//    new Note($d, $crotchet),
//    new Note($e, $crotchet),
//    new Note($c, $crotchet)
//);
//
//$bar2 = new Bar(
//    new Note($e, $crotchet),
//    new Note($f, $crotchet),
//    new Note($g, $minim)
//);
//
//$score = new Score($bar1, $bar1, $bar2, $bar2);
//
//$score->play();


$drummer = new Drummer();
$bassist = new Bassist();
$guitarist = new Guitarist();
$vocalist = new Vocalist();

$engineer = new SoundEngineer(new MixingDesk(
    new Speakers(),
    Monitor::labeled('vocals'),
    Monitor::labeled('drums'),
    Monitor::labeled('bass'),
    Monitor::labeled('guitar')
));

$engineer->plugin($drummer);
$engineer->plugin($bassist);
$engineer->plugin($guitarist);
$engineer->plugin($vocalist);

$drummer->asks($engineer, TurnDownInMyMonitor::channel('bass'));
$bassist->asks($engineer, TurnUpInMyMonitor::channel('drums'));

$engineer->adjustLevelOfChannel(Channel::labeled('vocals'), +3);
$engineer->adjustLevelOfChannel(Channel::labeled('bass'), +3);

$engineer->adjustMasterLevel(-3);

var_dump($engineer);