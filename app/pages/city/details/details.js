var util = require("../../../utils/util.js");
var WxParse = require('../../../plugin/wxParse/wxParse.js');
var app = getApp();

Page({
  data: {
    currentTab: 0,
    cityId:null
  },
  onLoad: function (options) {
    var typeindex = options.typeIndex;
    this.data.cityId = options.cityid;
    this.swichNavPullData(typeindex);
    this.setData({
      currentTab: typeindex
    })
  },
  swichNav: function (e) {
    var that = this;
    if (this.data.currentTab === e.target.dataset.current) {
      return false;
    } else {
      that.swichNavPullData(e.target.dataset.current);
      that.setData({
        currentTab: e.target.dataset.current
      })
    }
  },
  swichNavPullData: function (typeIndex) {
    if (typeIndex == 0) { //景点
      var getAllViewUrl = app.globalData.g_gzTripBase + "/getAllView?city_id=" + this.data.cityId;
      util.http(getAllViewUrl, this.processCityView);
    } else if (typeIndex == 1) {  //美食
      var getFoodsUrl = app.globalData.g_gzTripBase + "/getAllFood?city_id=" + this.data.cityId;
      util.http(getFoodsUrl,this.processFoods);
    } else if (typeIndex == 2) { // 特产
      var specialtysUrl = app.globalData.g_gzTripBase + "/getAllSpecialty?city_id=" + this.data.cityId;
      util.http(specialtysUrl, this.processSpecialtys);
    } else if (typeIndex == 3) { // 指南
      var guideUrl = app.globalData.g_gzTripBase + "/getCityHtml?id=" + this.data.cityId + "&type=guide" 
      util.http(guideUrl, this.processGuide);
    } else if (typeIndex == 4){ //  攻略
      var playUrl = app.globalData.g_gzTripBase + "/getCityHtml?id=" + this.data.cityId + "&type=play" 
      util.http(playUrl,this.processPlay);
    }
  },
  processCityView: function (data) {
    console.log(data);
    this.setData({
      viewList: data.data
    })
  },
  processFoods:function(data){
    this.setData({
      foods:data.data
    })
  },
  processSpecialtys:function(data){
    this.setData({
      specialtys:data.data
    })
  },
  processGuide:function(data){
    var that = this;
    var guideArticle = data.data;
    WxParse.wxParse('guideArticle', 'html', guideArticle, that, 5); 
  },
  processPlay:function(data){
    var that = this;
    var playArticle = data.data;
    WxParse.wxParse('playArticle', 'html', playArticle, that, 5); 
  },
  onScenicTap: function (e) {
    var scenicId = e.currentTarget.dataset.scenicid;
    console.log(scenicId);
    wx.navigateTo({
      url: '../scenicDetails/scenicDetails?scenicId=' + scenicId
    })
  },
  onfoodTap: function (e) {
    wx.navigateTo({
      url: '../foodDetails/foodDetails'
    })
  }
})