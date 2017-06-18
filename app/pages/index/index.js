// pages/index/index.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    playStatus:false
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
  
  },
  onCitytap:function(event){
    console.log("123");
    wx.navigateTo({
      url: '../city/city',
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