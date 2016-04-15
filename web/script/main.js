/**
 * @file 系统入口文件
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux';

import configStore from './store/configStore';
import Router from './routes/routes';

// 加载全局的CSS
// import '../asset/css/normalize.css';

// 系统store的基础结构
const initialSate = {
    // 当前登录用户的权限：admin or superAdmin
    // permission: 'admin',
    // 数据流静态信息相关
    product: [],
    rank:[]
    // staticSingleProdcut: {},
    // staticSingleStream: {},
    // streamSingleLevel: {},
    // streamLevelPackage: {},
    // streamSingleProfile: {},
    // // 数据流动态信息相关
    // dynamicTree: [],
    // dynamicSingleProduct: {},
    // dynamicSingleStream: {},
    // singleDeploy: {},
    // // 首页
    // home: null,
    // // 权限
    // role: null,
    // // 机器容器
    // container: null,
    // // 调试页面
    // debug: null
};

// 创建系统的sotre
const store = configStore(initialSate);

ReactDOM.render(
    <Provider store={store}>
        <Router/>
    </Provider>, document.getElementById('appRoot'));



/*
const initialSate = {
    // 当前登录用户的权限：admin or superAdmin
    permission: 'admin',
    // 数据流静态信息相关
    staticTree: [],
    //staticProductList: [],
    staticSingleProdcut: {},
    staticSingleStream: {},
    //streamDataSrource: {},
    //streamDataSink: {},
    //streamHasMerge: {},
    //streamLevelList: {},
    streamSingleLevel: {},
    streamLevelPackage: {},
    //streamProfileList: {},
    streamSingleProfile: {},
    // 数据流动态信息相关
    dynamicTree: [],
    dynamicSingleProduct: {},
    dynamicSingleStream: {},
    //dynamicDeployList: {},
    singleDeploy: {},
    //instanceList: {},
    // 首页
    home: null,
    // 权限
    role: null,
    // 机器容器
    container: null,
    // 调试页面
    debug: null
};
*/


