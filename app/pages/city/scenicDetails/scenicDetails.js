var util = require("../../../utils/util.js");
var WxParse = require('../../../plugin/wxParse/wxParse.js');
var app = getApp();

Page({

  /**
   * 页面的初始数据
   */
  data: {
  
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    console.log(options.cityId);
    var scenicDetailUrl = app.globalData.g_gzTripBase + "/getPointDetail?id=" + options.cityId;
    util.http(scenicDetailUrl, this.processScenicDetail)
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
  onScenicMoreTap:function(e){
    wx.navigateTo({
      url: '../moreScenic/moreScenic',
    })
  }
})