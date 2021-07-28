<?php

declare(strict_types=1);

namespace App\Security\Interfaces;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Interface SecurityUserInterface
 *
 * @package App\Security\Interfaces
 */
interface SecurityUserInterface extends UserInterface
{
    /**
     * Returns security user UUID which is generated by application.
     */
    public function getUuid(): string;
}
