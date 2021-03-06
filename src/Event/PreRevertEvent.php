<?php

namespace Shuttle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class PreRevertEvent
 * @package Shuttle\Event
 */
class PreRevertEvent extends Event
{
    /**
     * @var string
     */
    private $migratorName;
    /**
     * @var string
     */
    private $sourceId;
    /**
     * @var string
     */
    private $destinationId;

    /**
     * PreRevertEvent constructor.
     *
     * @param string $migratorName
     * @param string $sourceId
     * @param string $destinationId
     */
    public function __construct(string $migratorName, string $sourceId, string $destinationId)
    {
        $this->migratorName = $migratorName;
        $this->sourceId = $sourceId;
        $this->destinationId = $destinationId;
    }

    /**
     * @return string
     */
    public function getMigratorName(): string
    {
        return $this->migratorName;
    }

    /**
     * @return string
     */
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * @return string
     */
    public function getDestinationId(): string
    {
        return $this->destinationId;
    }
}
