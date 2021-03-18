## Documentation

<b>How to register your own entity to SimpleNPC plugin. You can also register custom entity geometry!</b><br>

On your Main Class plugin<br>

```php
<?php

use brokiem\snpc\SimpleNPC;
use MyCustomEntity\CustomVillager;

public function onEnable(): void {
    $entityName = "villager"; // this is used when using the SimpleNPC spawn command
    $force = false; // force register, if your entity not registered,  use true
    $saveNames = ["minecraft:villager"]; // save name (array)
    SimpleNPC::registerEntity(CustomVillager::class, $entityName, $force, $saveNames); // register the entity to SimpleNPC
    // NOTE: Use SimpleNPC::registerEntity();! NOT Entity::registerEntity();
}
```

On your Entity Class plugin<br>

```php
<?php

use brokiem\snpc\entity\BaseNPC;
use pocketmine\entity\Entity;

class CustomVillager extends BaseNPC /* Make sure your entity class extends to \brokiem\snpc\entity\BaseNPC */
{
    public const NETWORK_ID = Entity::VILLAGER; // Don't forget to add the network id of the entity

    public $height = 1.95; // don't forget to add height and width
    public $width = 0.6;
    protected $gravity = 0.1; // u can edit anything here
}
```

<br>

<b>And done! now just spawn the entity with the
command ```/snpc spawn <entityName|saveName> <nametag|null> <canWalk|false> <skinUrl|null>```/b>
<img src="https://github.com/brokiem/CustomEntity/blob/master/assets/img.png" alt="">