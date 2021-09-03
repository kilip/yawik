<?php

namespace Yawik\Job\Model;

class Coordinates
{
    protected string $type;
    protected array $coordinates;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getCoordinates(): array
    {
        return $this->coordinates;
    }

    /**
     * @param array $coordinates
     */
    public function setCoordinates(array $coordinates): void
    {
        $this->coordinates = $coordinates;
    }
}
