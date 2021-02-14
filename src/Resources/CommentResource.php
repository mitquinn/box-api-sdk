<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Adbar\Dot;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class CommentResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class CommentResource extends BaseResource
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
        $dot = new Dot($response);

        if ($dot->has('id')) {
            $this->setId($dot->get('id'));
        }

        if ($dot->has('type')) {
            $this->setType($dot->get('type'));
        }

        if ($dot->has('created_at')) {
            $this->setCreatedAt($dot->get('created_at'));
        }

        if ($dot->has('created_by')) {
            $this->setCreatedBy(new UserResource($dot->get('created_by')));
        }

        if ($dot->has('is_reply_comment')) {
            $this->setIsReplyComment($dot->get('is_reply_comment'));
        }

        if ($dot->has('item')) {
            $this->setItem($dot->get('item'));
        }

        if ($dot->has('message')) {
            $this->setMessage($dot->get('message'));
        }

        if ($dot->has('modified_at')) {
            $this->setModifiedAt($dot->get('modified_at'));
        }

        if ($dot->has('tagged_message')) {
            $this->setTaggedMessage($dot->get('tagged_message'));
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
     * @return CommentResource
     */
    public function setIsReplyComment(bool $is_reply_comment): CommentResource
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
     * @return CommentResource
     */
    public function setItem(array $item): CommentResource
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
     * @return CommentResource
     */
    public function setMessage(string $message): CommentResource
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
     * @return CommentResource
     */
    public function setTaggedMessage(string $tagged_message): CommentResource
    {
        $this->tagged_message = $tagged_message;
        return $this;
    }

    /*** End Getters and Setters ***/

}