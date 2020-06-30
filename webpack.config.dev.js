const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const URL = "https://noticias.dev"

module.exports = {
  entry: [
    "webpack-dev-server/client?" + URL + ':5001',
    "./src/index.js"
  ],
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist'),
    publicPath: URL + ":5001/"
  },
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: "babel-loader"
      },
      {
        test: /\.(scss|sass)$/,
        exclude: /module\.s?css$/,
        use: [
            'style-loader',
            'css-loader',
            'sass-loader',
        ]
      },
      {
        test: /\.css$/,
        use: ['style-loader', 'css-loader']
      },
      {
        test: /\.(gif|png|jpe?g|svg)$/i,
        use: [
          "file-loader",
          {
            loader: "image-webpack-loader",
            options: {
              bypassOnDebug: true,
              disable: true,
              output: 'images/public'
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "css/app.bundle.css"
    })
  ],
  devServer: {
    contentBase: path.resolve(__dirname, "dist"),
    publicPath: URL + ":5001/",
    port: 3001,
    hot: true,
    headers: {
      'Access-Control-Allow-Origin': '*',
      'Access-Control-Allow-Methods': 'GET,OPTIONS,HEAD,PUT,POST,DELETE,PATCH',
      'Access-Control-Allow-Headers': 'Origin, Content-Type, Accept, Authorization, X-Request-With',
      'Access-Control-Allow-Credentials': 'true',
    },
  },
};
