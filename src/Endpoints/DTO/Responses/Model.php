<?php

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses;

class Model extends Response
{
    private string $ownedBy;
    private PermissionCollection $permissionCollection;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->ownedBy = $data['owned_by'];
        $permissionsCollection = new PermissionCollection();
        foreach ($data['permission'] as $permissionData){
            $permission = new Permission($permissionData);
            $permissionsCollection->add($permission);
        }
        $this->permissionCollection = $permissionsCollection;
    }

    /**
     * @return mixed|string
     */
    public function getOwnedBy(): mixed
    {
        return $this->ownedBy;
    }

    /**
     * @return PermissionCollection
     */
    public function getPermissionCollection(): PermissionCollection
    {
        return $this->permissionCollection;
    }
}