<?php

namespace NikoPeikrishvili\OpenAIAPIClient\Tests;

use Laminas\Diactoros\Response\JsonResponse;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses\Model;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses\ModelCollection;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses\Models;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses\Permission;
use NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses\PermissionCollection;

class ModelsEndpointTest extends TestCase
{
    public array  $data = [
        'id'         => 'test',
        'object'     => 'test',
        'created'    => 9999,
        'owned_by'   => 'system',
        'permission' => [
            [
                'id'                   => 'modelperm-kOLsgLs7IgI9PTPI245IRWZH',
                'object'               => 'model_permission',
                'created'              => 1676585871,
                'allow_create_engine'  => null,
                'allow_sampling'       => 1,
                'allow_logprobs'       => 1,
                'allow_search_indices' => null,
                'allow_view'           => 1,
                'allow_fine_tuning'    => null,
                'organization'         => '*',
                'group'                => null,
            ]
        ]
    ];
    private function getValidResponseForSingleModel(): JsonResponse
    {
        return new JsonResponse(
            $this->data,
            200,
            ['Content-Type' => ['application/json']]
        );
    }
    private function getValidResponseForAllModels(): JsonResponse
    {
        return new JsonResponse(
            ['object'=>'list','data'=>[$this->data]],
            200,
            ['Content-Type' => ['application/json']]
        );
    }
    public function testThatModelTypeIsReturnedForSingleModel()
    {
        $apiClient = $this->givenAPIClient();
        $this->mockClient->addResponse($this->getValidResponseForSingleModel());
        $model = $apiClient->models()->get('test');
        $this->assertInstanceOf(Model::class, $model);
    }

    public function testThatSingleModelHasPermissionCollection()
    {
        $apiClient = $this->givenAPIClient();
        $this->mockClient->addResponse($this->getValidResponseForSingleModel());
        $model = $apiClient->models()->get('test');

        $this->assertInstanceOf(PermissionCollection::class, $model->getPermissionCollection());
        $this->assertCount(1, $model->getPermissionCollection());
    }

    public function testDataIsProperlyAssignedForSingleModel()
    {
        $apiClient = $this->givenAPIClient();
        $this->mockClient->addResponse($this->getValidResponseForSingleModel());
        $model = $apiClient->models()->get('test');
        $this->assertEquals($this->data['id'], $model->getId());
        $this->assertEquals($this->data['object'], $model->getObject());
        $this->assertEquals($this->data['created'], $model->getCreated());
        $permission = new Permission($this->data['permission']['0']);
        $this->assertEquals($permission, $model->getPermissionCollection()['0']);
    }

    public function testThatModelsTypeIsReturnedForAllModelsCall()
    {
        $apiClient = $this->givenAPIClient();
        $this->mockClient->addResponse($this->getValidResponseForAllModels());
        $model = $apiClient->models()->all();
        $this->assertInstanceOf(Models::class, $model);
    }

    public function testThatAllModelHasModelCollection()
    {
        $apiClient = $this->givenAPIClient();
        $this->mockClient->addResponse($this->getValidResponseForAllModels());
        $model = $apiClient->models()->all();

        $this->assertInstanceOf(ModelCollection::class, $model->getData());
        $this->assertCount(1, $model->getData());
    }

    public function testDataIsProperlyAssignedForAllModelsCall()
    {
        $apiClient = $this->givenAPIClient();
        $this->mockClient->addResponse($this->getValidResponseForAllModels());
        $model = $apiClient->models()->all();
        $this->assertEquals('list', $model->getObject());
    }
}