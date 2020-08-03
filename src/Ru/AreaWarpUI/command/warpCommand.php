<?php


namespace Ru\AreaWarpUI\command;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use Ru\AreaAPI\AreaAPI;
use Ru\AreaWarpUI\AreaWarpUI;
use Ru\AreaWarpUI\form\warpToAreaForm;

class warpCommand extends Command
{
    /**@var AreaWarpUI*/
    public $plugin;

    public function __construct(AreaWarpUI $plugin)
    {
        $this->plugin = $plugin;
        parent::__construct('영역워프', '영역 워프 UI를 엽니다', '/영역워프', ['areawarp']);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender instanceof Player){
            $sender->sendMessage(AreaAPI::$sy."인게임에서 실행해주세요!");
            return;
        }
        if ($sender->hasPermission("Warp.area")){
            $sender->sendForm(new warpToAreaForm());
        }
    }

}