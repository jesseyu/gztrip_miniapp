var util = require("../../utils/util.js");
var app = getApp();

Page({
  data: {
    playStatus:false,
    homeData:{},
    allCity:{}
  },
  onLoad: function (options) {
    var homeUrl = app.globalData.g_gzTripBase + "/homePage";
    var allCityUrl = app.globalData.g_gzTripBase + "/getAllCity?isSimple=1&limit=8";
    util.http(homeUrl, this.processIndexData); //获取主页数据
    util.http(allCityUrl,this.processGetAllCityData) //获取所有城市
  },
  processIndexData:function(data){
      this.setData({
        homeData: data.data
      })
  },
  processGetAllCityData:function(data){
    this.setData({
      allCity:data.data
    })
  },
  onCitytap:function(event){
    var postid = event.currentTarget.dataset.id;
    wx.navigateTo({
      url: '../city/city?id=' + postid
    })
  },
  onMorePlacetap:function(event){
    wx.navigateTo({
      url: '../place/place',
    })
  },
  onAboutTeamTap:function(event){
    wx.navigateTo({
      url: '../aboutTeam/aboutTeam',
    })
  },
  playAboutGzVideo:function(evnet){
    // this.data.playStatus = true;
    this.setData({
      playStatus:true
    })
  },
  closeVideoLayer:function(evnet){
    if(this.data.playStatus == true){
      this.setData({
        playStatus: false
      })
    }
  }
})