<?php

declare(strict_types=1);

namespace App\DTO\UserGroup;

use App\Entity\Role as RoleEntity;
use App\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserGroupUpdate
 *
 * @package App\DTO\UserGroup
 */
class UserGroupUpdate extends UserGroup
{
    /**
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @AppAssert\EntityReferenceExists(entityClass=RoleEntity::class)
     */
    protected ?RoleEntity $role = null;
}
