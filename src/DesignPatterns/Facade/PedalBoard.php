<?php

namespace DesignPatterns\Facade;

use DesignPatterns\Facade\Pedals\CryBaby;
use DesignPatterns\Facade\Pedals\DelayPedal;
use DesignPatterns\Facade\Pedals\FuzzFace;
use DesignPatterns\Facade\Pedals\Pedal;
use DesignPatterns\Facade\Pedals\TubeScreamer;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class PedalBoard
{
    /**
     * @var Pedal[]
     */
    private $pedals = [];

    /**
     * @param Pedal[] ...$pedals
     */
    public function __construct(Pedal ...$pedals)
    {
        $this->pedals = $pedals;
    }

    /**
     * @param Pedal $pedal
     */
    public function add(Pedal $pedal)
    {
        $this->pedals[] = $pedal;
    }

    /**
     * @return Pedal[]
     */
    public function pedals()
    {
        return $this->pedals;
    }

    public function rhythmMode()
    {
        $this->findByName(TubeScreamer::class)->off();
        $this->findByName(FuzzFace::class)->on();
        $this->findByName(CryBaby::class)->off();
        $this->findByName(DelayPedal::class)->off();
    }

    public function leadMode()
    {
        $this->findByName(TubeScreamer::class)->on();
        $this->findByName(FuzzFace::class)->off();
        $this->findByName(CryBaby::class)->off();
        $this->findByName(DelayPedal::class)->on();
    }

    public function wahMode($rockSpeed)
    {
        $this->findByName(TubeScreamer::class)->off();
        $this->findByName(FuzzFace::class)->off();
        $cryBaby = $this->findByName(CryBaby::class);
        $cryBaby->on();
        $cryBaby->rock($rockSpeed);
        $this->findByName(DelayPedal::class)->on();
    }

    /**
     * @param string $class
     *
     * @return Pedal
     */
    private function findByName($class)
    {
        foreach ($this->pedals as $pedal) {
            if ($pedal instanceof $class) {
                return $pedal;
            }
        }
        throw new InvalidArgumentException(sprintf('Pedal %s not found in pedal board.', $class));
    }
}
