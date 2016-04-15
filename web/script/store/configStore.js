/**
 * @file 配置store，并引入相关中间件
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import {createStore, applyMiddleware} from 'redux';
import thunk from 'redux-thunk';
import {syncHistory} from 'react-router-redux';
import {browserHistory} from 'react-router';

import rootReducer from '../reducers/index';


export default function configure(initialState) {
    const create = window.devToolsExtension
                   ? window.devToolsExtension()(createStore)
                   : createStore;

    const createStoreWithMiddleware
              = applyMiddleware(thunk, syncHistory(browserHistory))(create);

    const store = createStoreWithMiddleware(rootReducer, initialState);

    return store;
};
