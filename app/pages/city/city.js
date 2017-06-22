var util = require("../../utils/util.js");
var app = getApp();
Page({
  data: {
    cityInfo: {}
  },
  onLoad: function (options) {
    this.data.cityid = options.id;
    var homeUrl = app.globalData.g_gzTripBase + "/cityHome?id=" + options.id;
    util.http(homeUrl, this.processCityData);
  },
  processCityData: function (data) {
    this.setData({
      cityInfo: data.data
    })
  },
  oncdTap: function (event) {
    var typeIndex = event.currentTarget.dataset.current;
    wx.navigateTo({
      url: './details/details?typeIndex=' + typeIndex + "&cityid=" + this.data.cityid
    })
  },
  onScenicTap: function (event) {
    wx.navigateTo({
      url: '/pages/city/scenicDetails/scenicDetails?scenicId=' + event.currentTarget.dataset.postid
    })
  }
})

