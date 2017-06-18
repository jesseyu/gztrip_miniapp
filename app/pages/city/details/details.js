Page({
  data: {
    currentTab: 0
  },
  onLoad: function (options) {
    var typeindex = options.typeIndex;
    this.setData({
      currentTab: typeindex
    })
  },
  swichNav: function (e) {
    var that = this;
    if (this.data.currentTab === e.target.dataset.current) {
      return false;
    } else {
      that.setData({
        currentTab: e.target.dataset.current
      })
    }
  },
  onScenicTap:function(e){
      wx.navigateTo({
        url: '../scenicDetails/scenicDetails'
      })
  },
  onfoodTap:function(e){
    wx.navigateTo({
      url: '../foodDetails/foodDetails'
    })
  }
})