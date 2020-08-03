<?php


namespace Ru\AreaWarpUI\form;


use pocketmine\form\Form;
use pocketmine\Player;
use Ru\AreaAPI\AreaAPI;
use Ru\AreaAPI\data\Area;

class warpToAreaForm implements Form
{
    /**@var Area[]*/
    private $areaA = [];

    public function jsonSerialize()
    {
        $areas = [];
        $button = [];
        if (!isset(AreaAPI::getInstance()->db)){
            return [
                'type' => 'form',
                'title' => '§l§fWARPUI',
                'content' => '영역이 존재하지 않습니다!',
                'buttons' => null
            ];
        }
        foreach (AreaAPI::getInstance()->db as $are){
            $area = Area::deSerialize($are);
            array_push($areas,$area);
        }
        $this->areaA = $areas;
        foreach ($areas as $ar){
            array_push($button,['text' => "§l".$ar->getName()."\n§r터치시 해당 영역으로 이동합니다!"]);
        }

        return [
            'type' => 'form',
            'title' => '§l§fWARPUI',
            'content' => '',
            'buttons' => $button
        ];
    }

    public function handleResponse(Player $player, $data): void
    {
        if ($data === null)return;
        $this->areaA[$data]->teleportToWarpPos($player);
        $player->sendMessage(AreaAPI::$sy."성공적으로 {$this->areaA[$data]->getName()} 영역으로 이동하였습니다!");
    }

}