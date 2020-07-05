const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  entry: {
    app: ["@babel/polyfill", "./src/index.js"]
  },
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "app.bundle.js"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: "babel-loader"
      },
      {
        test: /\.(s*)css$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader", 
          "sass-loader"
        ]
      },
      {
        test: /\.(gif|png|jpe?g|svg)$/i,
        use: [
            {
                loader: "file-loader",
                options: {
                    name: '[name].[ext]',
                    outputPath: './images/',
                    esModule: false
                }
            },
            {
              loader: 'image-webpack-loader',
              options: {
                mozjpeg: {
                  progressive: true,
                  quality: 65
                },
                optipng: {
                  enabled: false,
                },
                pngquant: {
                  quality: [0.65, 0.90],
                  speed: 4
                },
                gifsicle: {
                  interlaced: false,
                },
                webp: {
                  quality: 75
                },
              }
            },
        ],
      },
      {
        test: /\.(woff(2)?||ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        use: [{
            loader: 'file-loader',
            options: {
                name: '[name].[ext]',
                outputPath: 'fonts/',
                esModule: false
            }
        }]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "app.bundle.css",
      chunkFilename: '[id].css',
      ignoreOrder: false
    })
  ],
  performance: {
    maxEntrypointSize: 400000,
    maxAssetSize: 100000,
    assetFilter: (asset) => {
      return asset.match('entrypoint1.js');
    }
  }
};
