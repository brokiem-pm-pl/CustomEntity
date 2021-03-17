<?php

declare(strict_types=1);

namespace brokiem\customentity;

use brokiem\snpc\SimpleNPC;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public function onEnable(): void
    {
        $entityName = "villager"; // this is used when using the SimpleNPC spawn command
        SimpleNPC::registerEntity(CustomVillager::class, $entityName); // register the entity to SimpleNPC
        // NOTE: Use SimpleNPC::registerEntity();! NOT Entity::registerEntity();
    }
}