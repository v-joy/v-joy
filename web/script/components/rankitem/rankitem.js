/**
 * @file rankitem component
 * @author nosql@icloud.com
 * @date 2016-03-23
 */

import React from 'react';
import {Link} from 'react-router';
import './rank.css';

class Rankitem extends React.Component {
    clickHandler(e){
        window.location.href = '/product/'+ this.props.item.id;
    }
    render() {
        let {item,rankindex} = this.props;
        let productUrl = "/product/"+item.product.id;
        let picurl = '';
        if (item.product.icon) {
            picurl = item.product.icon.src;
        };
        return (
            <li className="rank-item-container">
                <Link to={productUrl}>
                    <div className="clear">
                        <img alt={item.product.name} src={picurl} className="f-left" />
                        <div className="rank-item-title">
                            <p className="rank-item-chinesename">{item.product.chinesename}</p>
                            <p className="rank-item-name"> {item.product.name}</p>
                        </div>
                    </div>
                    <p className="rank-item-desc">{item.reason}</p>
                    <span className="rank-item-index">{rankindex}</span> 
                </Link>
            </li>
        );
    }
}

export default Rankitem;