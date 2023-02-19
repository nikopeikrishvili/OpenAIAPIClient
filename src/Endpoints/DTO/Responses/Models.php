<?php

declare(strict_types=1);

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses;

class Models
{
    private string $object;
    private ModelCollection $data;
    public function __construct(array $data)
    {
        $this->object = $data['object'];
        $this->data  = new ModelCollection();
        foreach ($data['data'] as $model){
            $model = new Model($model);
            $this->data->add($model);
        }
    }

    /**
     * @return string
     */
    public function getObject(): string
    {
        return $this->object;
    }

    /**
     * @return ModelCollection
     */
    public function getData(): ModelCollection
    {
        return $this->data;
    }
}