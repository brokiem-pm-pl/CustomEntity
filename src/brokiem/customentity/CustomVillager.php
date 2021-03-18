<?php

declare(strict_types=1);

namespace brokiem\customentity;

use brokiem\snpc\entity\BaseNPC;
use pocketmine\entity\Entity;

class CustomVillager extends BaseNPC /* Make sure your entity class extends to \brokiem\snpc\entity\BaseNPC */
{
    public const NETWORK_ID = Entity::VILLAGER; // Don't forget to add the network id of the entity

    public $height = 1.95; // don't forget to add height and width
    public $width = 0.6;

    protected $gravity = 0.1; // u can edit anything here

    // free to want any code here, e.g onUpdate(), etc.
}