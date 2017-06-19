function http(url, callBack) {
  wx.request({
    url: url,
    method: "GET",
    header: {
      'Content-Type': 'json'
    },
    success: function (resp) {
      callBack(resp.data)
    },
    fail: function (error) {
      console.log(error);
    }
  })
}
module.exports = {
  http: http
}