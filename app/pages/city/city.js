// pages/city/city.js
Page({
  data: {
  
  },
  onLoad: function (options) {
  
  },
  oncdTap:function(event){
      var typeIndex = event.currentTarget.dataset.current;
      wx.navigateTo({
        url: './details/details?typeIndex=' + typeIndex
      })
  },
})