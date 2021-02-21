<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Adbar\Dot;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class EventResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class Event extends Resource
{
    use HasType, HasCreatedBy;

    /** @var array $additional_details */
    protected array $additional_details;

    /** @var string $event_id */
    protected string $event_id;

    /** @var string $event_type */
    protected string $event_type;

    /** @var string $session_id */
    protected string $session_id;

    /** @var User|EventSource $source */
    protected User|EventSource $source;

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $dot = new Dot($response);

        if ($dot->has('type')) {
            $this->setType($dot->get('type'));
        }

        if ($dot->has('additional_details')) {
            $this->setAdditionalDetails($dot->get('additional_details'));
        }

        if ($dot->has('created_by')) {
            $this->setCreatedBy( new User($dot->get('created_by')));
        }

        if ($dot->has('event_id')) {
            $this->setEventId($dot->get('event_id'));
        }

        if ($dot->has('event_type')) {
            $this->setEventType($dot->get('event_type'));
        }

        if ($dot->has('session_id')) {
            $this->setSessionId($dot->get('session_id'));
        }

        //Todo: add setting for event source here.
        if ($dot->has('source')) {
            $this->setSource(new User($dot->get('source')));
        }

        return $this;
    }



    /*** Start Getters and Setters ***/

    /**
     * @return array
     */
    public function getAdditionalDetails(): array
    {
        return $this->additional_details;
    }

    /**
     * @param array $additional_details
     * @return Event
     */
    public function setAdditionalDetails(array $additional_details): Event
    {
        $this->additional_details = $additional_details;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->event_id;
    }

    /**
     * @param string $event_id
     * @return Event
     */
    public function setEventId(string $event_id): Event
    {
        $this->event_id = $event_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->event_type;
    }

    /**
     * @param string $event_type
     * @return Event
     */
    public function setEventType(string $event_type): Event
    {
        $this->event_type = $event_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->session_id;
    }

    /**
     * @param string $session_id
     * @return Event
     */
    public function setSessionId(string $session_id): Event
    {
        $this->session_id = $session_id;
        return $this;
    }

    /**
     * @return EventSource|User
     */
    public function getSource(): User|EventSource
    {
        return $this->source;
    }

    /**
     * @param EventSource|User $source
     * @return Event
     */
    public function setSource(User|EventSource $source): Event
    {
        $this->source = $source;
        return $this;
    }

    /*** End Getters and Setters ***/

}