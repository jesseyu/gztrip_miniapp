var util = require("../../utils/util.js");
var app = getApp();
Page({
  data: {
    cityInfo:{}
  },
  onLoad: function (options) {
    var homeUrl = app.globalData.g_gzTripBase + "/cityHome?id=" + options.id;
    util.http(homeUrl, this.processCityData)
  },
  processCityData:function(data){
    console.log(data);
    this.setData({
      cityInfo: data.data
    })
  },
  oncdTap:function(event){
      var typeIndex = event.currentTarget.dataset.current;
      wx.navigateTo({
        url: './details/details?typeIndex=' + typeIndex
      })
  },
})