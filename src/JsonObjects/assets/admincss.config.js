const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = env => {
  let config = {};

  config.entry = [
      './src/dir/json-objects-dir.scss',
      './src/item/json-objects-item.scss'
  ];

  config.module = {
    rules: [
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader'],
      },
      {
        test: /\.(scss)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '../../../../public/admin-css/[name].css'
            }
          },
          {
            loader: 'extract-loader'
          },
          {
            loader: 'css-loader',
            options: {
              url: false
            }
          },
          {
            loader: 'postcss-loader',
            options: {
              plugins: function () {
                return [
                  require('precss'),
                  require('autoprefixer')
                ];
              }
            }
          }
          , {
            loader: 'sass-loader', options: {
              sourceMap: (env === undefined || !env.production)
            }
          }]
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2)$/,
        loader: 'file-loader'
      }
    ]
  };
  config.resolve = {
    alias: {
      'common': path.resolve(__dirname, '../../Common/assets'),
    },
  };
  config.output = {
    filename: '[name].js',
    path: path.resolve(__dirname, './garbitch')
  }

  if (process.env.NODE_ENV === 'production') {
    config.optimization = {
      minimize: true,
      minimizer: [
        new CssMinimizerPlugin(),
      ],
    }
  }

  return config;
}
