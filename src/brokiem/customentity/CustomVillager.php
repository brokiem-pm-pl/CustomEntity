<?php

declare(strict_types=1);

namespace brokiem\customentity;

use brokiem\snpc\entity\BaseNPC;
use pocketmine\entity\Entity;

class CustomVillager extends BaseNPC /* Make sure your entity class extends to \brokiem\snpc\entity\BaseNPC */
{
    public const NETWORK_ID = Entity::VILLAGER; // Don't forget to add the network id of the entity

    protected $gravity = 0.1; // u can edit anything here
}