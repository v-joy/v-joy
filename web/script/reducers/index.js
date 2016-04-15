/**
 * @file combine所有的reducer
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import {routerReducer as routing} from 'react-router-redux';
import {combineReducers} from 'redux';

import product from './product';
import rank from './rank';


export default combineReducers({
    // routing,
    product,
    rank,
});