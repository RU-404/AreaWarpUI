<?php


namespace Ru\AreaWarpUI;

/*
 *  _____                _____
 * |_   _|              |  __ \
 *   | |  __ _ _ __ ___ | |__) |   _
 *   | | / _` | '_ ` _ \|  _  / | | |
 *  _| || (_| | | | | | | | \ \ |_| | ___
 * |_____\__,_|_| |_| |_|_|  \_\__,_|(___)


 *
 * @author : IamRu_
 * @api : 3.x.x
 * @github : github.com/RU-404
 */

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Ru\AreaWarpUI\command\warpCommand;

class AreaWarpUI extends PluginBase implements Listener
{

    public function onEnable()
    {
        Server::getInstance()->getCommandMap()->register('areawarp',new warpCommand($this));
    }

}