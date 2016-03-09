<?php

namespace DesignPatterns\Interpreter;

class Pitch
{
    private $note;
    private $adjustment;
    private $octave;
    private $chromaticScale = ['A', 'A#', 'B', 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#'];

    private function __construct()
    {
    }

    public static function fromPitch(string $pitch): Pitch
    {
        if (!preg_match('/([A-G])(#|b)?(\d+)/', $pitch, $matches)) {
            throw new \InvalidArgumentException(sprintf('Invalid pitch %s', $pitch));
        }
        $pitch = new self;
        $pitch->note = $matches[1];
        $pitch->adjustment = $matches[2];
        $pitch->octave = $matches[3];

        return $pitch;
    }

    public function addSemiTones(int $semiTones): Pitch
    {
        $pitch = $this;
        while ($semiTones > 0) {
            $semiTones--;
            $pitch = $pitch->next();
        }
        return $pitch;
    }

    public function next(): Pitch
    {
        $nextPitch = new self;
        $octave = $this->octave;
        $index = array_search($this->note . $this->adjustment, $this->chromaticScale);
        if ($index == 11) {
            $nextNoteIndex = 0;
            ++$octave;
        } else {
            $nextNoteIndex = $index + 1;
        }
        preg_match('/([A-G])(#)?/', $this->chromaticScale[$nextNoteIndex], $matches);
        $nextPitch->note = $matches[1];
        $nextPitch->adjustment = isset($matches[2]) ? $matches[2] : '';
        $nextPitch->octave = $octave;

        return $nextPitch;
    }

    public function __toString(): string
    {
        return $this->note . $this->adjustment . $this->octave;
    }

}
