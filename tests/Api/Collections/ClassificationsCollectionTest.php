<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Mitquinn\BoxApiSdk\Requests\Classifications\AddInitialClassificationsRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\DeleteAllClassificationsRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\ListAllClassificationsRequest;
use Mitquinn\BoxApiSdk\Resources\ClassificationTemplateResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Tests\Api\BaseTest;

/**
 * Class ClassificationsCollectionTest
 * @package Api\Collections
 * Todo: This API doesnt seem to work. I do not understand it.
 */
class ClassificationsCollectionTest extends BaseTest
{

//    public function testAddInitialClassificationRequest()
//    {
//        $body = [
//            'displayName' => 'Test',
//            'scope' => 'enterprise'
//        ];
//
//        $request = new AddInitialClassificationsRequest($body);
//
//        $classificationTemplateResource = $this->getBoxService()->classifications()->addInitialClassifications($request);
//        static::assertInstanceOf(ClassificationTemplateResource::class, $classificationTemplateResource);
//    }
//
//    public function testDeleteAllClassifications()
//    {
//        $request = new DeleteAllClassificationsRequest();
//        $noContentResource = $this->getBoxService()->classifications()->deleteAllClassifications($request);
//        static::assertInstanceOf(NoContentResource::class, $noContentResource);
//    }
//
//    public function testListAllClassifications()
//    {
//        $request = new ListAllClassificationsRequest();
//        $classificationTemplateResource = $this->getBoxService()->classifications()->listAllClassifications($request);
//        static::assertInstanceOf(ClassificationTemplateResource::class, $classificationTemplateResource);
//    }

}