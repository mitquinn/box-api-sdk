<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class RecentItemResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class RecentItem extends Resource
{
    use HasType;

    /** @var string $interacted_at */
    protected string $interacted_at;

    /** @var string $interaction_shared_link */
    protected string $interaction_shared_link;

    /** @var string $interaction_type */
    protected string $interaction_type;

    /**
     * Todo: Add weblink here
     * @var File|Folder
     */
    protected File|Folder $item;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        if ($collection->has('type')) {
            $this->setType($collection->get('type'));
        }

        if ($collection->has('interacted_at')) {
            $this->setInteractedAt($collection->get('interacted_at'));
        }

        if ($collection->has('interaction_shared_link')) {
            $this->setInteractionSharedLink($collection->get('interaction_shared_link'));
        }

        if ($collection->has('interaction_type')) {
            $this->setInteractionType($collection->get('interaction_type'));
        }

        if ($collection->has('item')) {
            $item = $collection->get('item');

            if ($item['type'] === 'folder') {
                $this->setItem(new Folder($item));
            }

            if ($item['type'] === 'file') {
                $this->setItem(new File($item));
            }

            //Todo: Add Weblink
        }

        return $this;
    }


    /*** Start Getters and Setters ***/


    /**
     * @return string
     */
    public function getInteractedAt(): string
    {
        return $this->interacted_at;
    }

    /**
     * @param string $interacted_at
     * @return RecentItem
     */
    public function setInteractedAt(string $interacted_at): RecentItem
    {
        $this->interacted_at = $interacted_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getInteractionSharedLink(): string
    {
        return $this->interaction_shared_link;
    }

    /**
     * @param string $interaction_shared_link
     * @return RecentItem
     */
    public function setInteractionSharedLink(string $interaction_shared_link): RecentItem
    {
        $this->interaction_shared_link = $interaction_shared_link;
        return $this;
    }

    /**
     * @return string
     */
    public function getInteractionType(): string
    {
        return $this->interaction_type;
    }

    /**
     * @param string $interaction_type
     * @return RecentItem
     */
    public function setInteractionType(string $interaction_type): RecentItem
    {
        $this->interaction_type = $interaction_type;
        return $this;
    }

    /**
     * @return File|Folder
     */
    public function getItem(): File|Folder
    {
        return $this->item;
    }

    /**
     * @param File|Folder $item
     * @return RecentItem
     */
    public function setItem(File|Folder $item): RecentItem
    {
        $this->item = $item;
        return $this;
    }

    /*** End Getters and Setters ***/

}