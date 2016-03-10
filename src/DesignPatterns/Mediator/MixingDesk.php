<?php declare(strict_types = 1);

namespace DesignPatterns\Mediator;

use DesignPatterns\Mediator\Instruments\Instrument;
use DesignPatterns\Mediator\Outputs\Monitor;
use DesignPatterns\Mediator\Outputs\Output;

class MixingDesk
{
    /**
     * @var Channel[]
     */
    private $channels = [];

    /**
     * @var Output
     */
    private $output;

    /**
     * @var float
     */
    private $masterLevel = 0.0;

    /**
     * @var Monitor
     */
    private $monitor1;

    /**
     * @var Monitor
     */
    private $monitor2;

    /**
     * @var Monitor
     */
    private $monitor3;

    /**
     * @var Monitor
     */
    private $monitor4;

    /**
     * @param Output       $output
     * @param Monitor|null $monitor1
     * @param Monitor|null $monitor2
     * @param Monitor|null $monitor3
     * @param Monitor|null $monitor4
     */
    public function __construct(Output $output, Monitor $monitor1 = null, Monitor $monitor2 = null, Monitor $monitor3 = null, Monitor $monitor4 = null)
    {
        $this->channels = array_map(function ($i) {
            return Channel::labeled((string)$i);
        }, range(1, 8));

        $this->output = $output;

        $this->monitor1 = $monitor1;
        $this->monitor2 = $monitor2;
        $this->monitor3 = $monitor3;
        $this->monitor4 = $monitor4;
    }

    /**
     * @return Channel[]
     */
    public function channels(): array
    {
        return $this->channels;
    }

    /**
     * @return Output
     */
    public function output(): Output
    {
        return $this->output;
    }

    /**
     * @return float
     */
    public function masterLevel(): float
    {
        return $this->masterLevel;
    }

    /**
     * @return Monitor
     */
    public function monitor1(): Monitor
    {
        return $this->monitor1;
    }

    /**
     * @return Monitor
     */
    public function monitor2(): Monitor
    {
        return $this->monitor2;
    }

    /**
     * @return Monitor
     */
    public function monitor3(): Monitor
    {
        return $this->monitor3;
    }

    /**
     * @return Monitor
     */
    public function monitor4(): Monitor
    {
        return $this->monitor4;
    }

    /**
     * @param Instrument $input
     * @param Channel    $channel
     */
    public function pluginInputToChannelNumbered(Instrument $input, Channel $channel)
    {
        $this->findChannelLabeled($channel)->plugIn($input);
    }

    /**
     * @param Instrument $input
     */
    public function pluginNextAvailableChannel(Instrument $input)
    {
        $this->findNextAvailableChannel()->plugIn($input);
    }

    /**
     * @param Instrument $input
     * @param string     $label
     */
    public function pluginNextAvailableChannelAndLabel(Instrument $input, string $label)
    {
        $channel = $this->findNextAvailableChannel();
        $channel->plugIn($input);
        $channel->relabel($label);
    }

    /**
     * @param Channel $channel
     * @param float   $levelAdjustment
     */
    public function adjustLevelOfChannel(Channel $channel, float $levelAdjustment)
    {
        $this->findChannelLabeled($channel)->adjustLevel($levelAdjustment);
    }

    /**
     * @param float $adjustment
     */
    public function adjustMasterLevel(float $adjustment)
    {
        $this->masterLevel += $adjustment;
    }

    /**
     * @param Channel $channel
     * @param string  $label
     */
    public function labelChannel(Channel $channel, string $label)
    {
        $this->findChannelLabeled($channel)->relabel($label);
    }

    /**
     * @param Channel $channel
     * @param Monitor $monitor
     * @param float   $adjustment
     */
    public function adjustMonitorSendForChannel(Channel $channel, Monitor $monitor, float $adjustment)
    {
        $this->findChannelLabeled($channel)->adjustMonitorSend($this->findMonitorIndexByLabel($monitor), $adjustment);
    }

    /**
     * @return Channel
     */
    private function findNextAvailableChannel(): Channel
    {
        foreach ($this->channels as $channel) {
            if (is_null($channel->input())) {
                return $channel;
            }
        }
        throw new \DomainException('No free channels');
    }

    /**
     * @param Channel $channelStrip
     * @return Channel
     */
    private function findChannelLabeled(Channel $channelStrip): Channel
    {
        foreach ($this->channels as $channel) {
            if ($channel->label() == $channelStrip->label()) {
                return $channel;
            }
        }
        throw new \OutOfRangeException('No channel exists with label: ' . $channelStrip->label());
    }

    /**
     * @param Monitor $monitor
     *
     * @return int
     */
    private function findMonitorIndexByLabel(Monitor $monitor): int
    {
        if (!is_null($this->monitor1) && $this->monitor1->label() == $monitor->label()) {
            return 1;
        }
        if (!is_null($this->monitor2) && $this->monitor2->label() == $monitor->label()) {
            return 2;
        }
        if (!is_null($this->monitor3) && $this->monitor3->label() == $monitor->label()) {
            return 3;
        }
        if (!is_null($this->monitor4) && $this->monitor4->label() == $monitor->label()) {
            return 4;
        }

        throw new \OutOfRangeException('No monitor found with label: ' . $monitor->label());
    }
}
