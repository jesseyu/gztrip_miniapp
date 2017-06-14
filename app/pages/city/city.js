// pages/city/city.js
Page({
  data: {
  
  },
  onLoad: function (options) {
  
  },
  onSpotsTap:function(event){
      wx.navigateTo({
        url: './spots/spots',
      })
  },
  onFoodsTap:function(event){
    wx.navigateTo({
      url: './foods/foods',
    })
  },
  onSpecialtyTap:function(event){
    wx.navigateTo({
      url: './specialty/specialty',
    })
  },
  onTravelGuidesTap:function(event){
    wx.navigateTo({
      url: './travelGuides/travelGuides',
    })
  },
  onCityGuidesTap:function(event){
    wx.navigateTo({
      url: './cityGuides/cityGuides',
    })
  }
})