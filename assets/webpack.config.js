const autoprefixer = require('autoprefixer');

module.exports = [{
    entry: 'app.scss',
    output: {
      filename: 'style-bundle.js',
    },
    module: {
      rules: [
        {
          test: /\.scss$/,
          use: [
            {
              loader: 'file-loader',
              options: {
                name: 'style.css',
              },
            },
            { loader: 'extract-loader' },
            { loader: 'css-loader' },
            {
                loader: 'postcss-loader',
                options: {
                    postcssOptions: {
                        plugins: [
                            autoprefixer()
                        ]
                    }
                }
            },
            {
              loader: 'sass-loader',
              options: {
                implementation: require('sass'),
  
                webpackImporter: false,
                sassOptions: {
                    includePaths: ['./node-modules']
                }
              },
            },
          ]
        }
      ]
    },
  }];

