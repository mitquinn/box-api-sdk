<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class CommentResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class Comment extends Resource
{
    use HasId, HasType, HasCreatedAt, HasCreatedBy, HasModifiedAt;

    /** @var bool $is_reply_comment */
    protected bool $is_reply_comment;

    /** @var array $item */
    protected array $item;

    /** @var string $message */
    protected string $message;

    /** @var string $tagged_message */
    protected string $tagged_message;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        if ($collection->has('id')) {
            $this->setId($collection->get('id'));
        }

        if ($collection->has('type')) {
            $this->setType($collection->get('type'));
        }

        if ($collection->has('created_at')) {
            $this->setCreatedAt($collection->get('created_at'));
        }

        if ($collection->has('created_by')) {
            $this->setCreatedBy(new User($collection->get('created_by')));
        }

        if ($collection->has('is_reply_comment')) {
            $this->setIsReplyComment($collection->get('is_reply_comment'));
        }

        if ($collection->has('item')) {
            $this->setItem($collection->get('item'));
        }

        if ($collection->has('message')) {
            $this->setMessage($collection->get('message'));
        }

        if ($collection->has('modified_at')) {
            $this->setModifiedAt($collection->get('modified_at'));
        }

        if ($collection->has('tagged_message')) {
            $this->setTaggedMessage($collection->get('tagged_message'));
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return bool
     */
    public function isIsReplyComment(): bool
    {
        return $this->is_reply_comment;
    }

    /**
     * @param bool $is_reply_comment
     * @return Comment
     */
    public function setIsReplyComment(bool $is_reply_comment): Comment
    {
        $this->is_reply_comment = $is_reply_comment;
        return $this;
    }

    /**
     * @return array
     */
    public function getItem(): array
    {
        return $this->item;
    }

    /**
     * @param array $item
     * @return Comment
     */
    public function setItem(array $item): Comment
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Comment
     */
    public function setMessage(string $message): Comment
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaggedMessage(): string
    {
        return $this->tagged_message;
    }

    /**
     * @param string $tagged_message
     * @return Comment
     */
    public function setTaggedMessage(string $tagged_message): Comment
    {
        $this->tagged_message = $tagged_message;
        return $this;
    }

    /*** End Getters and Setters ***/

}