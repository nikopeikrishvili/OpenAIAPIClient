<?php

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses;

final class Permission extends Response
{

    private bool $allowCreateEngine;
    private bool $allowSampling;
    private bool $allowLogprobs;
    private bool $allowSearchIndices;
    private bool $allowView;
    private bool $allowFineTuning;
    private ?string $organization;
    private ?string $group;
    private bool $isBlocking;

    /**
     * @param  array  $data
     *
     * @return void
     */
    public  function __construct(array $data)
    {
        parent::__construct($data);
        $this->allowCreateEngine  = $this->getBool('allow_create_engine', $data);
        $this->allowSampling      = $this->getBool('allow_sampling', $data);
        $this->allowLogprobs      = $this->getBool('allow_logprobs', $data);
        $this->allowSearchIndices = $this->getBool('allow_search_indices', $data);
        $this->allowView          = $this->getBool('allow_view', $data);
        $this->allowFineTuning    = $this->getBool('allow_fine_tuning', $data);
        $this->organization       = $data['organization'];
        $this->isBlocking         = $this->getBool('is_blocking', $data);
        $this->group              = $data['group'];
    }

    /**
     * @return bool
     */
    public function isAllowCreateEngine(): bool
    {
        return $this->allowCreateEngine;
    }

    /**
     * @return bool
     */
    public function isAllowSampling(): bool
    {
        return $this->allowSampling;
    }

    /**
     * @return bool
     */
    public function isAllowLogprobs(): bool
    {
        return $this->allowLogprobs;
    }

    /**
     * @return bool
     */
    public function isAllowSearchIndices(): bool
    {
        return $this->allowSearchIndices;
    }

    /**
     * @return bool
     */
    public function isAllowView(): bool
    {
        return $this->allowView;
    }

    /**
     * @return bool
     */
    public function isAllowFineTuning(): bool
    {
        return $this->allowFineTuning;
    }

    /**
     * @return mixed|string|null
     */
    public function getOrganization(): mixed
    {
        return $this->organization;
    }

    /**
     * @return string|null
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }

    /**
     * @return bool
     */
    public function isBlocking(): bool
    {
        return $this->isBlocking;
    }


}