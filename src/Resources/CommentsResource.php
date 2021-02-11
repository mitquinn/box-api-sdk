<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class CommentsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class CommentsResource extends EntriesResource
{

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        parent::mapResource($response);

        if (array_key_exists('entries', $response)) {
            $comments = [];
            foreach ($response['entries'] as $comment) {
                $comments[] = new CommentResource($comment);
            }
            $this->setEntries($comments);
        }

        return $this;
    }

    /**
     * @return CommentResource[]
     */
    public function getEntries(): array
    {
        return parent::getEntries();
    }

}