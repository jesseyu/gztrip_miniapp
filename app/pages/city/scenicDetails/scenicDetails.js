var util = require("../../../utils/util.js");
var WxParse = require('../../../plugin/wxParse/wxParse.js');
var app = getApp();

Page({
  data: {
  
  },
  onLoad: function (options) {
    console.log(options);
    var scenicDetailUrl = app.globalData.g_gzTripBase + "/getPointDetail?id=" + options.scenicId;
    util.http(scenicDetailUrl, this.processScenicDetail);
  },
  processScenicDetail:function(data){
      console.log(data);
      var that = this;
      this.setData({
        scenicDetail: data.data
      })
      var des = data.data.des;
      WxParse.wxParse('desContet', 'html', des, that, 5);
  },
  onChildScenicTap:function(event){
    console.log(event);
    var childScenicId = event.currentTarget.dataset.postid;
    wx.navigateTo({
      url: '/pages/city/scenicDetails/scenicDetails?scenicId=' + childScenicId
    })
  }
})