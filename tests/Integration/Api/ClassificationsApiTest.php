<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Requests\Classifications\AddInitialClassificationsRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\DeleteAllClassificationsRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\ListAllClassificationsRequest;
use Mitquinn\BoxApiSdk\Resources\ClassificationTemplate;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class ClassificationsCollectionTest
 * @package Api\Collections
 * Todo: This API doesnt seem to work. I do not understand it.
 */
class ClassificationsApiTest extends BaseTest
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