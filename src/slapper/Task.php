<?php

namespace slapper;

use pocketmine\{Server, scheduler\PluginTask, plugin\PluginBase, event\Listener, utils\TextFormat as TF};

class Task extends PluginTask {
	public function __construct($plugin){
		$this->plugin = $plugin;
		parent::__construct($plugin);
	}

	public function onRun(int $tick) {
		$pl = $this->plugin->getServer()->getOnlinePlayers();
		foreach($pl as $p){
			if(!$p->getInventory()->getItemInHand()->hasEnchantments()){
				$p->sendPopup(TF::GRAY."You are playing on ".TF::BOLD.TF::BLUE."GameCraft PE".TF::RESET."\n".TF::BOLD.TF::AQUA."Vote: ".TF::RESET.TF::GREEN."gamecraftvote.tk");
			}
		}
	}
}
