<?php

namespace Shuttle\Event;

use Shuttle\ShuttleAction;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class MigrateSkippedEvent
 * @package Shuttle\Event
 */
class MigrateSkippedEvent extends Event implements ActionResultInterface
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
    private $reason;

    /**
     * MigrateSkippedEvent constructor.
     * @param string $migratorName
     * @param string $sourceId
     * @param string $reason
     */
    public function __construct(string $migratorName, string $sourceId, string $reason)
    {
        $this->migratorName = $migratorName;
        $this->sourceId = $sourceId;
        $this->reason = $reason;
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
    public function getStatus(): string
    {
        return self::SKIPPED;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return ShuttleAction::MIGRATE;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
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
    public function getMessage(): string
    {
        return $this->getReason();
    }
}
