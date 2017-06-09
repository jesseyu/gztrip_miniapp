<?php
namespace App\Controller;

use App\BasicController;
use Swoole;

class Homepage extends BasicController
{

    function index()
    {
        $numPerPage = getRequest('numPerPage', 20, true);
        $pageNum = getRequest('pageNum', 1, true);
        $home_page = model('Homepage');
        $params = [
            'order' => 'id',
            'limit' => ($pageNum - 1) * $numPerPage . ',' . $numPerPage
        ];
        $total = $home_page->count(['where' => 1]);
        $page = [
            'numPerPage' => $numPerPage,
            'pageNum' => $pageNum,
            'total' => $total,
        ];

        $data = $home_page->gets($params);
        $this->assign('data', $data);
        $this->assign('page', $page);
        $this->display('home_page/index.php');
    }

    function addHomepage()
    {
        if (isPost()) {
            $home_page = model('Homepage');
            $data = $home_page->getData();
            if ($home_page->create($data)) {
                jsonReturn($this->ajaxFromReturn('添加成功', 200, 'closeCurrent', '', 'home_page'));
            } else {
                jsonReturn($this->ajaxFromReturn('添加失败', 300));
            }
        }
        $this->assign('title', '添加');
        $this->display("home_page/add_home_page.php");
    }

    function updateHomepage()
    {
        $home_page = model('Homepage');
        $id = getRequest('id');
        if (isPost()) {
            $old = $home_page->get($id);
            $data = $home_page->getData($old);
            if ($home_page->set($data['id'], $data)) {
                jsonReturn($this->ajaxFromReturn('修改成功', 200, 'closeCurrent', '', 'home_page'));
            } else {
                jsonReturn($this->ajaxFromReturn('修改失败', 300));
            }
        }
        $data = $home_page->getById($id);
        $this->assign('data', $data);
        $this->assign('title', '修改');
        $this->display("home_page/update_home_page.php");
    }

    function deleteHomepage()
    {
        $id = getRequest('id');
        $home_page = model('Homepage');
        if ($home_page->del($id)) {
            jsonReturn($this->ajaxFromReturn('删除成功', 200, '', '', 'home_page'));
        } else {
            jsonReturn($this->ajaxFromReturn('删除失败', 300));
        }
    }

    function searchHomepage()
    {

    }

}	
