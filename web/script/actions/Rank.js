/**
 * @file 静态导航树相关actions
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import actionType from '../constants/actionTypes';
import fetch from '../utils/fetch';

export function fetchRank() {
    // body...
    return (dispatch, getState) => {
        return fetch.query('/ranklist').then(data =>{
            dispatch(formatData(data));
        });
    };
}

function formatData(rankList) {
    return {
        type: actionType.RECV_RANK_DATA,
        data: rankList
    };
}