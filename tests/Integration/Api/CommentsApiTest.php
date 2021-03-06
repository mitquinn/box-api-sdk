<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Requests\Comments\CreateCommentRequest;
use Mitquinn\BoxApiSdk\Requests\Comments\GetCommentRequest;
use Mitquinn\BoxApiSdk\Requests\Comments\RemoveCommentRequest;
use Mitquinn\BoxApiSdk\Requests\Comments\UpdateCommentRequest;
use Mitquinn\BoxApiSdk\Resources\Comment;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class CommentsApiTest
 * @package Mitquinn\BoxApiSdk\Tests\Integration\Api
 */
class CommentsApiTest extends BaseTest
{

    public function removeComment(string $id)
    {
        $request = new RemoveCommentRequest($id);
        $noContentResource = $this->getBoxService()->comments()->removeComment($request);
        static::assertInstanceOf(NoContent::class, $noContentResource);
    }

    public function testCreateComment()
    {
        $fileResource = $this->uploadFile();
        $body = [
            'item' => [
                'id' => $fileResource->getId(),
                'type' => 'file'
            ],
            'message' => 'Test Comment'
        ];
        $request = new CreateCommentRequest($body);
        $commentResource = $this->getBoxService()->comments()->createComment($request);
        static::assertInstanceOf(Comment::class, $commentResource);
        $this->removeComment($commentResource->getId());
        $this->deleteFile($fileResource->getId());
    }

    public function testGetComment()
    {
        $fileResource = $this->uploadFile();
        $body = [
            'item' => [
                'id' => $fileResource->getId(),
                'type' => 'file'
            ],
            'message' => 'Test Comment'
        ];
        $request = new CreateCommentRequest($body);
        $commentResource = $this->getBoxService()->comments()->createComment($request);
        static::assertInstanceOf(Comment::class, $commentResource);

        $request2 = new GetCommentRequest($commentResource->getId());
        $newCommentResource = $this->getBoxService()->comments()->getComment($request2);
        static::assertInstanceOf(Comment::class, $newCommentResource);

        $this->removeComment($commentResource->getId());
        $this->deleteFile($fileResource->getId());
    }

    public function testUpdateComment()
    {
        $fileResource = $this->uploadFile();
        $body = [
            'item' => [
                'id' => $fileResource->getId(),
                'type' => 'file'
            ],
            'message' => 'Test Comment'
        ];
        $request = new CreateCommentRequest($body);
        $commentResource = $this->getBoxService()->comments()->createComment($request);
        static::assertInstanceOf(Comment::class, $commentResource);

        $body2 = [
            'message' => 'updated message'
        ];

        $request2 = new UpdateCommentRequest($commentResource->getId(), body: $body2);
        $newCommentResource = $this->getBoxService()->comments()->updateComment($request2);
        static::assertInstanceOf(Comment::class, $newCommentResource);
        static::assertEquals('updated message', $newCommentResource->getMessage());

        $this->removeComment($commentResource->getId());
        $this->deleteFile($fileResource->getId());
    }

}