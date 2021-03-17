<?php
declare(strict_types=1);

namespace brokiem\customentity;

use brokiem\snpc\entity\BaseNPC;

class CustomVillager extends BaseNPC /* Make sure your entity class extends to \brokiem\snpc\entity\BaseNPC */
{
    protected $gravity = 0.1; // u can edit anything here
}