/**
 * @file webpack的开发环境配置文件
 */

'use strict';

var webpack = require('webpack');
var baseConfig = require('./webpack.config.base');

// flag区分不同环境，可用于测试
var customFlagPlugin = new webpack.DefinePlugin({
    FLAG_DEV: JSON.stringify(JSON.parse(process.env.ENV_DEV || 'true')),
    FLAG_RC: JSON.stringify(JSON.parse(process.env.ENV_RC || 'false'))
});


var config = Object.create(baseConfig);

// 开发时会用到的webpack插件
var devPlugins = [
    new webpack.optimize.OccurenceOrderPlugin(),
    customFlagPlugin
];

// 如果是【预上线】环境 （需测试完善）
// if (process.env.ENV_RC) {
//     // 线上环境会用到的webpack插件
//     devPlugins = [
//         new webpack.optimize.OccurenceOrderPlugin(),
//         new webpack.DefinePlugin({
//             'process.env.NODE_ENV': JSON.stringify('production')
//         }),
//         new webpack.optimize.UglifyJsPlugin({
//             compressor: {
//                 screw_ie8: true,
//                 warnings: false
//             }
//         })
//     ];
// }

// 汇总
config.plugins = (config.plugins || []).concat(devPlugins);
console.log(config);
module.exports = config;
