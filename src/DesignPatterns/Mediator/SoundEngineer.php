<?php

namespace DesignPatterns\Mediator;

use DesignPatterns\Mediator\Musicians\Musician;
use DesignPatterns\Mediator\Requests\Request;
use DesignPatterns\Mediator\Requests\TurnDownInMyMonitor;
use DesignPatterns\Mediator\Requests\TurnUpInMyMonitor;

class SoundEngineer
{
    private $mixingDesk;

    public function __construct(MixingDesk $mixingDesk = null)
    {
        $this->mixingDesk = $mixingDesk;
    }

    public function plugin(Musician $musician)
    {
        $this->mixingDesk->pluginNextAvailableChannelAndLabel($musician->instrument(), $musician->name());
    }

    public function adjustLevelOfChannel(Channel $channel, float $adjustment)
    {
        $this->mixingDesk->adjustLevelOfChannel($channel, $adjustment);
    }

    public function adjustMasterLevel(float $adjustment)
    {
        $this->mixingDesk->adjustMasterLevel($adjustment);
    }

    public function respondTo(Musician $musician, Request $request)
    {
        if ($request instanceof TurnDownInMyMonitor) {
            $this->mixingDesk->adjustMonitorSendForChannel(Channel::labeled($request->label()), $musician->monitor(), -6);
        }

        if ($request instanceof TurnUpInMyMonitor) {
            $this->mixingDesk->adjustMonitorSendForChannel(
                Channel::labeled($request->label()),
                $musician->monitor(),
                +6
            );
        }
    }
}
