var util = require("../../utils/util.js");
var app = getApp();

Page({
  data: {
    cityList:{}
  },
  onLoad: function (options) {
    var allCityUrl = app.globalData.g_gzTripBase + "/getAllCity";
    util.http(allCityUrl,this.processAllCityData);
  },
  processAllCityData:function(data){
    console.log(data);
    this.setData({
      cityList:data.data
    })
  },
  onCitytap:function(event){
    wx.navigateTo({
      url: '../city/city',
    })
  }
})