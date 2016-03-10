<?php declare(strict_types = 1);

namespace DesignPatterns\Mediator;

use DesignPatterns\Mediator\Instruments\Instrument;

class Channel
{
    /**
     * @var string
     */
    private $label = '';

    /**
     * @var Instrument
     */
    private $input;

    /**
     * @var float
     */
    private $level = 0.0;

    /**
     * @var array
     */
    private $monitorSendLevels = [
        1 => -127,
        2 => -127,
        3 => -127,
        4 => -127,
    ];

    private function __construct(string $label)
    {
        $this->label = $label;
    }

    /**
     * @param string $label
     *
     * @return Channel
     */
    public static function labeled(string $label): Channel
    {
        return new Channel($label);
    }

    /**
     * @param string $label
     */
    public function relabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function label(): string
    {
        return $this->label;
    }

    /**
     * @param Instrument $input
     */
    public function plugIn(Instrument $input)
    {
        $this->input = $input;
    }

    /**
     * @return Instrument|null
     */
    public function input()
    {
        return $this->input;
    }

    /**
     * @return float
     */
    public function level(): float
    {
        return $this->level;
    }

    /**
     * @param float $adjustment
     */
    public function adjustLevel(float $adjustment)
    {
        $this->level += $adjustment;
    }

    /**
     * @param int $monitorNumber
     *
     * @return float
     */
    public function monitorSendLevel(int $monitorNumber): float
    {
        $index = $this->findMonitorSendLevelIndex($monitorNumber);
        return $this->monitorSendLevels[$index];
    }

    /**
     * @param int   $monitorNumber
     * @param float $adjustment
     */
    public function adjustMonitorSend(int $monitorNumber, float $adjustment)
    {
        $index = $this->findMonitorSendLevelIndex($monitorNumber);
        $this->monitorSendLevels[$index] += $adjustment;
    }

    /**
     * @param int $monitorNumber
     *
     * @return int
     */
    private function findMonitorSendLevelIndex(int $monitorNumber): int
    {
        if (!array_key_exists($monitorNumber, $this->monitorSendLevels)) {
            throw new \OutOfRangeException('No monitor numbered: ' . $monitorNumber);
        }
        return $monitorNumber;
    }
}
