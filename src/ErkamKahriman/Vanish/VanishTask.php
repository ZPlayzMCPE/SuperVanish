<?php

namespace ErkamKahriman\Vanish;

use pocketmine\scheduler\Task;

class VanishTask extends Task {

    private $plugin;

    public function __construct(Vanish $plugin) {
        $this->plugin = $plugin;
        parent::__construct($plugin);
    }

    public function onRun(int $currentTick) : void {
        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player){
            if ($this->plugin->vanish[$player->getName()] == true){
                foreach ($this->plugin->getServer()->getOnlinePlayers() as $players){
                    $players->hidePlayer($player);
                }
            }
        }
    }
}
