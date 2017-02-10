<?php

namespace slapper;

use pocketmine\{Server, scheduler\PluginTask, plugin\PluginBase, event\Listener, utils\Config, utils\TextFormat as TF};

class Task extends PluginTask{
  public function __construct($plugin){
    $this->plugin = $plugin;
    parent::__construct($plugin);
  }
  
  public function onRun($tick){
    $pl = $this->plugin->getServer()->getOnlinePlayers();
    $cfg = $this->plugin->getConfig();
      foreach($pl as $p){
        if(!$p->getInventory()->getItemInHand()->hasEnchantments()){
          $p->sendPopup(TF::GRAY."You are playing on ".TF::BOLD.TF::BLUE."CubeCraft PE".TF::RESET."\n".TF::DARK_GRAY."[".TF::LIGHT_PURPLE.count($this->plugin->getServer()->getOnlinePlayers()).TF::DARK_GRAY."/".TF::LIGHT_PURPLE.$this->plugin->getServer()->getMaxPlayers().TF::DARK_GRAY."] | ".TF::YELLOW."$".$this->plugin->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($p).TF::DARK_GRAY." | ".TF::BOLD.TF::AQUA."Vote: ".TF::RESET.TF::GREEN."gamecraftvote.tk");
        }
      }
  }
}  