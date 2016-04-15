/**
 * @file 处理静态信息导航树相关state的reudcers
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import actionType from '../constants/actionTypes';

const initRank = {};

export default function rank(state = initRank, action) {
    switch (action.type) {
        case actionType.RECV_RANK_DATA:
            return action.data;
        default:
            return state;
    }
}
