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

    function returnError($code, $msg = null)
    {
        $result['code'] = $code;
        if ($msg) {
            $result['msg'] = $msg;
        } else {
            $result['msg'] = \Constants::$msg_map[$code];
        }
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
            //获取推荐食物
            $recommend_food = $mPoint->getByIds($data['recommend_food']);
            $data['recommend_food'] = $recommend_food;
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
        foreach ($list as &$item) {
            if ($item['imgs']) {
                $imgs = json_decode($item['imgs'], 1);
                foreach ($imgs as &$img) {
                    $img = WEBROOT . "/local/" . $img;
                }
                $item['imgs'] = $imgs;
            }
        }
        $this->returnSucceed($list);
    }

    function cityHome()
    {
        $id = getRequest('id');
        if ($id) {
            $mCity = model('City');
            $list = $mCity->get($id)->get();
            if ($list['imgs']) {
                $imgs = json_decode($list['imgs'], 1);
                foreach ($imgs as &$img) {
                    $img = WEBROOT . "/local/" . $img;
                }
                $list['imgs'] = $imgs;
            }
            //获取美食
            $mPoint = model('Point');
            $must_food = $mPoint->getByIds($list['must_food']);
            $list['must_food'] = $must_food;
            //获取必去景点
            $must_view = $mPoint->getByIds($list['must_view']);
            $list['must_view'] = $must_view;
            $this->returnSucceed($list);
        } else {
            $this->returnError(\Constants::ERROR_PARAMS);
        }
    }

    function getAllSpecialty()
    {
        $city_id = getRequest('city_id');
        $pos = getRequest('pos');
        $pointModel = model('Point');
        $params['limit'] = 10;
        $params['where'] = [
            'city_id=' . $city_id,
            'type="specialty"'
        ];
        if ($pos) {
            $params['where'][] = 'id < ' . $pos;
        }
        $list = $pointModel->gets($params);
        $ids = array_column($list, 'id');
        $result = [];
        if ($ids) {
            $result = $pointModel->getByIds(implode(',', $ids));
        }
        $this->returnSucceed($result);
    }

    function getAllView()
    {
        $city_id = getRequest('city_id');
        $pos = getRequest('pos');
        $pointModel = model('Point');
        $params['limit'] = 10;
        $params['where'] = [
            'city_id=' . $city_id,
            'type="view"',
            'is_son=0'
        ];
        if ($pos) {
            $params['where'][] = 'id < ' . $pos;
        }
        $list = $pointModel->gets($params);
        $ids = array_column($list, 'id');
        $result = [];
        if ($ids) {
            $result = $pointModel->getByIds(implode(',', $ids));
        }
        $this->returnSucceed($result);
    }

    function getAllFood()
    {
        $city_id = getRequest('city_id');
        $pos = getRequest('pos');
        $pointModel = model('Point');
        $params['limit'] = 10;
        $params['where'] = [
            'city_id=' . $city_id,
            'type="food"'
        ];
        if ($pos) {
            $params['where'][] = 'id < ' . $pos;
        }
        $list = $pointModel->gets($params);
        $ids = array_column($list, 'id');
        $result = [];
        if ($ids) {
            $result = $pointModel->getByIds(implode(',', $ids));
        }
        $this->returnSucceed($result);
    }

    function getPointDetail()
    {
        $id = getRequest('id');
        $pointModel = model('Point');
        $result = [];
        if ($id) {
            $result = $pointModel->getById($id);
            if ($result['son_views']) {
                $result['son_views'] = $pointModel->getByIds($result['son_views']);
            } else {
                $result['son_views'] = [];
            }
        }
        $this->returnSucceed($result);
    }

    function getPointPic()
    {
        $id = getRequest('id');
        $pointModel = model('Point');
        $result = [];
        if ($id) {
            $result = $pointModel->getById($id);
        }
        $this->returnSucceed($result['imgs']);
    }

    function getCityHtml()
    {
        $id = getRequest('id');
        $type = getRequest('type');
        if ($id) {
            $mCity = model('City');
            $list = $mCity->get($id)->get();
            $this->returnSucceed($list[$type]);
        } else {
            $this->returnError(\Constants::ERROR_PARAMS);
        }
    }

    function getCityPic()
    {
        $id = getRequest('id');
        if ($id) {
            $mCity = model('City');
            $list = $mCity->get($id)->get();
            if ($list['imgs']) {
                $imgs = json_decode($list['imgs'], 1);
                foreach ($imgs as &$img) {
                    $img = WEBROOT . "/local/" . $img;
                }
                $list['imgs'] = $imgs;
            }
            $this->returnSucceed($list['imgs']);
        } else {
            $this->returnError(\Constants::ERROR_PARAMS);
        }
    }
}