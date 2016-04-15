/**
 * @file 系统顶部，主导航菜单
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import React from 'react';

import NavLink from './NavLink';
import './style.css';

class TopNavMenu extends React.Component {
    render() {
        return (
            <div className="topNavMenu">
                <ul role="nav">
                    <li><NavLink to="/">排行榜</NavLink></li>
                    <li><NavLink to="/item">详情页</NavLink></li>
                </ul>
            </div>
        );
    }
}


export default TopNavMenu;
