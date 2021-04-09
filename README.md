## Documentation

<b>How to register your own entity to SimpleNPC plugin. You can also register custom entity geometry!</b><br>

On your Main Class plugin<br>

```php
<?php

namespace your\namespace;
use brokiem\snpc\SimpleNPC;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public function onEnable(): void
    {
        $entityName = "villager_snpc"; // this is used when using the SimpleNPC spawn command. NOTE (must add _snpc)
        $force = false; // force register, if your entity not registered,  use true
        $saveNames = ["customnpc:villager"]; // save name (array)
        SimpleNPC::registerEntity(CustomVillager::class, $entityName, $force, $saveNames); // register the entity to SimpleNPC
        // NOTE: Use SimpleNPC::registerEntity();! NOT Entity::registerEntity();
    }
}
```

Add depend on your plugin.yml file<br>

```yaml
depend: [ "SimpleNPC" ] # add depend
```

On your Entity Class file<br>

```php
<?php

namespace your\namespace;
use brokiem\snpc\entity\BaseNPC;
use pocketmine\entity\Entity;
use brokiem\snpc\manager\emote\EmoteIds;
use pocketmine\network\mcpe\protocol\EmotePacket;
use pocketmine\Server;

class CustomVillager extends BaseNPC /* Make sure your entity class extends to \brokiem\snpc\entity\BaseNPC */
{
    public const SNPC_ENTITY_ID = Entity::VILLAGER; // Don't forget to add the network id of the entity

    public $height = 1.95; // don't forget to add height and width
    public $width = 0.6;
    protected $gravity = 0.1; // u can edit anything here
    /** @var float */
    private $lastEmote = 5.0;

    // free to want any code here, e.g onUpdate(), etc.
    
    // THIS IS HOW TO ADD EMOTE TO YOUR NPC (ONLY HUMAN NPC)
    public function onUpdate(int $currentTick): bool{
        if((5.0 + $this->lastEmote) > microtime(true)){
            return parent::onUpdate($currentTick);
        }

        $this->lastEmote = microtime(true);

        $pk = EmotePacket::create($this->getId(), EmoteIds::THE_HAMMER, 0);
        Server::getInstance()->broadcastPacket($this->getViewers(), $pk);

        return parent::onUpdate($currentTick);
    }
}
```

<br>

<b>And done! now just spawn the entity with the
command ```/snpc spawn <entityName|saveName> <nametag|null> <canWalk|false> <skinUrl|null>```
<br>
<img src="https://github.com/brokiem/CustomEntity/blob/master/assets/img.png" alt="">