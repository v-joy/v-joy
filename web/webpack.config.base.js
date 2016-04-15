/* eslint-disable */
/**
 * @file webpac的基础配置文件
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

var webpack = require('webpack');
var path = require('path');

// 配置
var webpackConfig = {
    entry: './script/main.js',
    output: {
        path: path.join(__dirname, 'dist'),
        publicPath: '/static/',
        filename: 'bundle.js'
    },
    module: {
        loaders: [
            {
                test: /\.jsx?$/,
                exclude: /node_modules|deprecated|mockups/,
                loaders: ['react-hot', 'babel']
            },
            {
                test: /\.css$/,
                loader: 'style!css'
            },
            {
               test: /\.(woff|woff2|svg|eot|ttf)$/,
               loader: 'url-loader?limit=10000&name=[name]-[hash].[ext]'
            }
        ]
    },
    resolve: {
        fallback: [path.join(__dirname, 'node_modules')],
        extensions: ['', '.js', '.jsx','.css']
    },
    resolveLoader: {
        root: [path.join(__dirname, 'node_modules')]
    }
};
module.exports = webpackConfig;
/* eslint-enable */
