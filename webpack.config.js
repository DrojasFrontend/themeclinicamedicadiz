const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

module.exports = [
  {
    entry: {
      main: ["./js/src/main.js", "./css/src/main.scss"],
    },
    output: {
      filename: "./js/build/[name].min.[fullhash].js",
      path: path.resolve(__dirname),
    },
    resolve: {
      alias: {
        '~': path.resolve(__dirname, 'node_modules'),
        '@uploads': path.resolve(__dirname, '../../uploads')
      }
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          loader: "babel-loader",
        },
        {
          test: /\.(sass|scss)$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: "css-loader",
              options: {
                importLoaders: 2
              }
            },
            {
              loader: 'postcss-loader',
              options: {
                postcssOptions: {
                  plugins: [
                    require('autoprefixer')
                  ]
                }
              }
            },
            {
              loader: "sass-loader",
              options: {
                sassOptions: {
                  includePaths: [path.resolve(__dirname, 'node_modules')]
                }
              }
            }
          ],
        },
        {
          test: /\.css$/,
          use: [MiniCssExtractPlugin.loader, "css-loader"],
        },
        // Resto de tus loaders...
      ],
    },
    plugins: [
      new CleanWebpackPlugin({
        cleanOnceBeforeBuildPatterns: ["./js/build/*", "./css/build/*"],
      }),
      new MiniCssExtractPlugin({
        filename: "./css/build/main.min.[fullhash].css",
      }),
    ],
    optimization: {
      minimizer: [
        `...`,
        new CssMinimizerPlugin(),
      ],
    },
  },
];