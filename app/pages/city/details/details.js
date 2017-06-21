var util = require("../../../utils/util.js");
var app = getApp();

Page({
  data: {
    currentTab: 0,
    cityId:null
  },
  onLoad: function (options) {
    var typeindex = options.typeIndex;
    this.data.cityId = options.cityid;
    this.swichNavType(typeindex);
    this.setData({
      currentTab: typeindex
    })
  },
  swichNav: function (e) {
    var that = this;
    if (this.data.currentTab === e.target.dataset.current) {
      return false;
    } else {
      that.swichNavType(e.target.dataset.current);
      that.setData({
        currentTab: e.target.dataset.current
      })
    }
  },
  swichNavType: function (typeIndex) {
    console.log(typeIndex);
    if (typeIndex == 0) {
      var getAllViewUrl = app.globalData.g_gzTripBase + "/getAllView?city_id=" + this.data.cityId;
      util.http(getAllViewUrl, this.prcessAllView);
    } else if (typeIndex == 1) {
      // var getFoodsUrl = app.globalData.g_gzTripBase + "/"
      console.log("美食");
    } else if (typeIndex == 2) {
      console.log("特产");
    } else if (typeIndex == 3) {
      console.log("指南");
    } else if (typeIndex == 4){
      console.log("攻略");
    }
  },
  prcessAllView: function (data) {
    this.setData({
      viewList: data.data
    })
  },
  onScenicTap: function (e) {
    wx.navigateTo({
      url: '../scenicDetails/scenicDetails'
    })
  },
  onfoodTap: function (e) {
    wx.navigateTo({
      url: '../foodDetails/foodDetails'
    })
  }
})