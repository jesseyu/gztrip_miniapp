<?php
namespace App\Model;

use Swoole;

class Point extends Swoole\Model
{

    public $table = 'point';

    public $primary = 'id';

    static $typeMap = [
        'view' => "景点",
        'food' => "美食",
        'specialty' => "特产",
    ];

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类型',
            'name' => '名称',
            'obj' => '字段内容',
            'city_id' => '城市id',
            'ctime' => '创建时间',
            'is_son' => '是否是子景点',
        ];
    }

    public function search($param)
    {
        return $this->gets($param);
    }

    public function create($data)
    {
        return $this->put($data);
    }

    public function update($id, $data)
    {
        return $this->set($id, $data);
    }

    public function delete($param)
    {
        return $this->dels($param);
    }

    public function getData()
    {
        $data = [];
        $att = $this->attributeLabels();
        foreach ($att as $key => $value) {
            if (getRequest($key)) {
                $data[$key] = getRequest($key);
            }
        }
        return $data;
    }

    public function getByIds($ids)
    {
        $params = ['in' => ['id', $ids]];
        $list = $this->gets($params);
        $result = [];
        foreach ($list as $one) {
            $xModel = model($one['type']);
            $xdata = $xModel->analyzeData($one['obj']);
            $result[] = $xdata + $one;
        }
        return $result;
    }

    public function getById($id)
    {
        $list = $this->get($id)->get();
        $result = [];
        if ($list) {
            $xModel = model($list['type']);
            $xdata = $xModel->analyzeData($list['obj']);
            $result = $xdata + $list;
        }
        return $result;
    }

    public function getPage($param)
    {
        $list = $this->gets($param);
        if ($list) {
            $cityIds = array_unique(array_column($list, 'city_id'));
            $mCity = model('City');
            $cityName = $mCity->getByIds($cityIds);
            foreach ($list as &$one) {
                $one['type_name'] = self::$typeMap[$one['type']];
                $one['ctime'] = date('Y-m-d H:i:s', $one['ctime']);
                if ($one['city_id']) {
                    $one['city_name'] = $cityName[$one['city_id']];
                } else {
                    $one['city_name'] = "暂无";
                }
            }
        }
        return $list;
    }
}	
