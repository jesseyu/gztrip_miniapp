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
    console.log(data.data);
    this.setData({
      cityList:data.data
    })
  },
  onCitytap:function(event){
    var postid = event.currentTarget.dataset.id;
    wx.navigateTo({
      url: '../city/city?id=' + postid
    })
  }
})