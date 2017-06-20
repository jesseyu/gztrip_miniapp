## 接口
1. 首页接口
* api/homePage
* 参数:无
2. 获取城市接口
* api/getAllCity
* 参数:
    * isSimple:true/false   是否获取详细信息
    * limit:  获取几个数据
3. 城市首页接口
* api/cityHome
* 参数:
    * id 城市id
4. 城市下景点
* api/getAllView
* 参数:
    * city_id 城市id
    * pos 最后一个元素id
5. 城市下特产
* api/getAllSpecialty
* 参数:
    * city_id 城市id
    * pos 最后一个元素id
6. 景点,美食详情接口
* api/getAllSpecialty
* 参数:
    * id
