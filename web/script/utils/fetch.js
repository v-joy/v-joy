/**
 * @file 封装调用ajax的fetch模块
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import es6Promise from 'es6-promise';
import rawFetch from 'isomorphic-fetch';

es6Promise.polyfill();

const BASE_URL = '';
// 默认的一些配置
const BASE_OPTIONS = {
    method: 'post',
    credentials: 'same-origin',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({})
};

function fetch(path, httpMethod, params, options) {
    if (!path) {
        throw new Error('path is required for ajax request.');
    }

    let config;
    let url = BASE_URL + path;

    if (FLAG_DEV) {
        if(path === '/roles' ){
            url = '/mockups' + path + '.json';
//            url = '/ajax' + path;
        } else {
            url = '/ajax' + path;
        }
    }

    if (httpMethod === 'get') {
        if (params) {
            url = [url, makeQueryString(params)].join('');
        }
    } else {
        config = Object.assign({body: ''}, BASE_OPTIONS, {method: httpMethod}, options || {});
        if (params) {
            config.body = JSON.stringify(params);
        }
    }

    return rawFetch(url, config)
            .then(checkStatus)
            .then(parseJSON)
            .then(function (res) {
                console.log(res.data)
                return res.data;
            })
            .catch(function (errRes) {
                console.log('ajax failed:', errRes);
            });
}

// 工具方法

function makeQueryString(jsonParams) {
    return Object.keys(jsonParams).map((k) => {
        return k + '=' + jsonParams[k];
    }).join('&');
}

function checkStatus(response) {
    if (response.status >= 200 && response.status < 300) {
        return response;
    } else {
        var error = new Error(response.statusText);
        error.response = response;
        throw error;
    }
}

function parseJSON(response) {
    return response.json();
}

// get, post, put, delete

function getByFetch(path, params, options) {
    return fetch(path, 'get', params, options);
}


function postByFetch(path, params, options) {
    return fetch(path, 'post', params, options);
}


function putByFetch(path, params, options) {
    return fetch(path, 'put', params, options);
}


function deleteByFetch(path, params, options) {
    return fetch(path, 'delete', params, options);
}

// 增删改查
export default {
    query: getByFetch,
    create: postByFetch,
    update: putByFetch,
    remove: deleteByFetch
};