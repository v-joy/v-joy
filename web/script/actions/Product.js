/**
 * @file 静态导航树相关actions
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import actionType from '../constants/actionTypes';
import fetch from '../utils/fetch';

export function fetchProduct(id) {
    return (dispatch, getState) => {
        return fetch.query('/product/'+id).then(data =>{
            dispatch(format(data));
        });
    };
}

function format(product) {
    return {
        type: actionType.RECV_PRODUCTS_DATA,
        data: product
    };
}




