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
        $entityName = "customvillager_snpc"; // this is used when using the SimpleNPC spawn command
        $saveNames = ["customnpc:customvillager"]; // save name (array)
        SimpleNPC::registerEntity(CustomVillager::class, $entityName, $saveNames); // register the entity to SimpleNPC
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
```

<br>

<b>And done! now just spawn the entity with the
command ```/snpc spawn <entityName|saveName> <nametag|null> <canWalk|false> <skinUrl|null>```
<br>
<img src="https://github.com/brokiem/CustomEntity/blob/master/assets/img.png" alt="">