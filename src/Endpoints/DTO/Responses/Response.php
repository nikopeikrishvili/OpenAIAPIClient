<?php

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses;

abstract class Response
{
    protected string $id;
    protected string $object;
    protected string $created;

    protected function __construct(array $data){
        $this->id = $data['id'];
        $this->object = $data['object'];
        $this->created = $data['created'];
    }
    protected function getBool(string $key, array $data): bool
    {
        if(!key_exists($key, $data)){
            return false;
        }
        return !empty($data[$key]);
    }

    /**
     * @return mixed|string
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getObject(): mixed
    {
        return $this->object;
    }

    /**
     * @return mixed|string
     */
    public function getCreated(): mixed
    {
        return $this->created;
    }

}