<?php

declare(strict_types=1);

namespace brokiem\customentity;

use brokiem\snpc\entity\BaseNPC;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class CustomVillager extends BaseNPC /* Make sure your entity class extends to \brokiem\snpc\entity\BaseNPC */
{
    public float $height = 1.95; // don't forget to add height and width
    public float $width = 0.6;

    protected $gravity = 0.1; // u can edit anything here

    // free to want any code here, e.g onUpdate(), etc.
    protected function getInitialSizeInfo(): EntitySizeInfo {
        return new EntitySizeInfo($this->height, $this->width);
    }

    public static function getNetworkTypeId(): string {
        return EntityIds::VILLAGER_V2;
    }
}