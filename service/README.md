Slob框架
----
本框架基于Swoole Framework开发，后台模板使用DWZ JS前端框架，详情请参考如下

## Swoole参考
文档位置：(https://github.com/swoole/framework)
官方地址：(http://wiki.swoole.com/wiki/index/prid-2)

## DWZ参考
DWZ官方DEMO：(http://www.j-ui.com/)

特色
----
* 自动后台生成，可根据数据库表类型生成表单
* 后台完全JS实现交互，不用写一行JS

开发环境配置
----
* 数据库文件food.sql
* 登录用户名:test 密码:test
* 进入默认生器页面  开发时保留  上线删除
* 配置数据库文件参考apps/configs/dev/目录下（同时要在php.ini 中设置 env.name=dev）
* php 版本5.6+ 低版本暂不支持 因为其中  array  以都替换为 []
* 不需要niginx或者apache 利用自身php -s 实现web 服务器，windows直接执行start.bat 即可
* linux下请自行配置nginx 配置写了  相信用linux 的你比我熟

接口调用统计
----
参考：[接口调用统计](https://github.com/matyhtf/StatsCenter) 进行简化一边更好的进行二次开发。
使用方法：
* swoole 扩展当然必须有了，直接php 执行 StatusServer.php
* 在要调用的地方使用如下方法调用

```
$key="test1";
$tick = \App\StatsCenter::tick($key,123);
sleep(1);
$tick->report(true);
```

每调用一次便记录在对应的数据库中

总结
----
我就是懒，不一样的懒！为了懒人设计，完全解放双手。