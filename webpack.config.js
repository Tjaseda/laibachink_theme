var path = require('path');

module.exports = {
  entry: "./assets/js/dev/app.js",
  output: {
    path: path.resolve(__dirname, "./assets/js/dist"),
    filename: "app.min.js"
  },
  module: {
    rules: [
      {
        loader: 'babel-loader',
        query: {
          presets: ['es2015']
        },
        test: /\.js$/,
        exclude: /node_modules/
      }
    ]
  }
}
