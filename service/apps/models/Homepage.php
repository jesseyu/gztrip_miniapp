<?php
namespace App\Model;

use Swoole;

class Homepage extends Swoole\Model
{

    public $table = 'home_page';

    public $primary = 'id';

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slogan' => '首页标语',
            'video_url' => '视频链接',
            'banner' => 'bannner 图片',
            'season_view' => '当季景点',
            'recommend_view' => '推荐景点',
            'update_time' => '更新时间',
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

    public function getById($id)
    {
        $data = $this->get($id)->get();
        if ($data) {
            $imgs = explode(',', $data['banner']);
            if (count($imgs)) {
                foreach ($imgs as $img) {
                    if (strpos($img, WEBROOT) === false) {
                        $list[] = WEBROOT . "/local/" . $img;
                    } else {
                        $list[] = $img;
                    }
                }
                $data['banners'] = $list;
            } else {
                $data['banners'] = [];
            }
            return $data;
        } else {
            return [];
        }
    }

    public function getData($old = null)
    {
        $data = [];
        $att = $this->attributeLabels();
        foreach ($att as $key => $value) {
            if (getRequest($key)) {
                $data[$key] = getRequest($key);
            }
        }
        $data['update_time'] = time();
        //上传图片
        if (!empty($_FILES)) {
            $imgs = [];
            $uploadPath = WEBPATH . "/local/";
            $num = count($_FILES['imgs']['name']);
            for ($i = 0; $i < $num; $i++) {
                $path = $_FILES['imgs']['tmp_name'][$i];
                if (!$path) {
                    continue;
                }
                $file_name = md5($path . time()) . $_FILES['imgs']['name'][$i];
                if (!file_exists($uploadPath . $file_name)) {
                    move_uploaded_file($path, $uploadPath . $file_name);
                    $imgs[] = $file_name;
                }
            }
        }
        if (!empty($imgs)) {
            $data['banner'] = implode(',', $imgs);
        } else {
            $data['banner'] = $old['banner'];
        }
        return $data;
    }

}	
