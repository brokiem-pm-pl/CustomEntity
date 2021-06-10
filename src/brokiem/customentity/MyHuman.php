<?php

declare(strict_types=1);

namespace brokiem\customentity;

use brokiem\snpc\entity\CustomHuman;
use brokiem\snpc\manager\emote\EmoteIds;
use pocketmine\network\mcpe\protocol\EmotePacket;
use pocketmine\Server;

class MyHuman extends CustomHuman {
    protected $gravity = 0; // u can edit anything here
    private float $lastEmote = 0.0;
    public array $emotes = [
        EmoteIds::THE_HAMMER,
        EmoteIds::BREAKDANCE,
        EmoteIds::DIAMONDS_TO_YOU,
        EmoteIds::THE_PICKAXE
    ];

    // free to want any code here, e.g onUpdate(), etc.
    public function onUpdate(int $currentTick): bool {
        if ((5.0 + $this->lastEmote) > microtime(true)) {
            return parent::onUpdate($currentTick);
        }

        $this->lastEmote = microtime(true);

        $pk = EmotePacket::create($this->getId(), $this->emotes[array_rand($this->emotes)], 0);
        Server::getInstance()->broadcastPackets($this->getViewers(), [$pk]);

        return parent::onUpdate($currentTick);
    }
}
