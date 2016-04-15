/**
 * @file 导航菜单的菜单项
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import React from 'react';
import {Link} from 'react-router';

import './style.css';

class NavLink extends React.Component {
    render() {
        return (<Link {...this.props} activeClassName="active"/>);
    }
}


export default NavLink;