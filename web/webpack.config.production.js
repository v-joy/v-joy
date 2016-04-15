/* eslint-disable */

/**
 * @file webpac的线上环境配置文件
 */

'use strict';

var webpack = require('webpack');
var baseConfig = require('./webpack.config.base');

var config = Object.create(baseConfig);

// 线上环境会用到的webpack插件
var releasePlugins = [
    new webpack.optimize.OccurenceOrderPlugin(),
    new webpack.DefinePlugin({
        "process.env.NODE_ENV": JSON.stringify('production')
    }),
    new webpack.optimize.UglifyJsPlugin({
        compressor: {
            screw_ie8: true,
            warnings: false
        }
    })
];

// 汇总
config.plugins = (config.plugins || []).concat(releasePlugins);

module.exports = config;
/* eslint-enable */
