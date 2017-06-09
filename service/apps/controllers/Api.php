<?php
/**
 * Created by PhpStorm.
 * User: xiangdong
 * Date: 15/11/23
 * Time: 下午2:25
 */

namespace App\Controller;

use App\Model\Interfaces;
use Swoole;

class Api extends Swoole\Controller
{
    function returnSucceed($data)
    {
        $result['code'] = 200;
        $result['data'] = $data;
        echo json_encode($result);
        exit;
    }

    function getInterface()
    {
        if (!in_array($_SERVER["REMOTE_ADDR"], $this->swoole->config["common"]["sao_service"])) {
            exit("you are not my service !");
        }
        $interface_name = getRequest("name");
        $interfaces = new Interfaces(\Swoole::$php, "status_center");
        $params = array(
            "name" => $interface_name
        );
        $interface = $interfaces->exists($params);
        if ($interface) {
            $data = $interfaces->get($interface_name, "name")->get();
            return $data["id"];
        } else {
            $data = [
                'name' => $interface_name,
                'create_time' => time()
            ];
            $id = $interfaces->put($data);
            return $id;
        }

    }

    function homePage()
    {
        $home_page = model('Homepage');
        $data = $home_page->get(1)->get();
        if ($data) {
            $banners = explode(',', $data['banner']);
            foreach ($banners as $banner) {
                $imgs[] = WEBROOT . "/local/" . $banner;
            }
            $data['banner'] = $imgs;
            //获取当季景点
            $mPoint = model('Point');
            $season_view = $mPoint->getByIds($data['season_view']);
            $data['season_view'] = $season_view;
            //获取推荐景点
            $recommend_view = $mPoint->getByIds($data['recommend_view']);
            $data['recommend_view'] = $recommend_view;
        }
        $this->returnSucceed($data);
    }

    function getAllCity()
    {
        $isSimple = getRequest('isSimple', false);
        $limit = getRequest('limit', 8);
        $mCity = model('City');
        if ($isSimple) {
            $where['select'] = "id,name";
        }
        $where['limit'] = "0,$limit";
        $list = $mCity->gets($where);
        $this->returnSucceed($list);
    }

}