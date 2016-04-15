/**
 * @file 排行榜页面
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import React, {Component} from 'react';
import {bindActionCreators} from 'redux';
import {connect} from 'react-redux';
import Rankitem from '../components/rankitem/rankitem';
import './RankPage.css';

// 导入相关的actions
import * as rankActionCreators from '../actions/rank';

class RankPage extends Component {
    constructor(props) {
        super(props);
    }

    componentWillMount() {
        const {rankActions} = this.props;
        rankActions.fetchRank();
    }

    render() {
        let {rank} = this.props;
        rank.rankitems = rank.rankitems || [];
        let rankItems = [];
        rank.rankitems.map((item,i) => {
            return rankItems.push(
                <Rankitem key={item.id} item={item} rankindex={i}></Rankitem>
            );
        });
        return (
            <div>
                <h2 className="text-center rank-title">{rank.name}</h2>
                <div className="clear rank-subtitle"><h6 className="f-right">{rank.subname}</h6></div>
                <ul>
                    {rankItems}
                </ul>
            </div>
        );
    }
}

function mapStateToProps(state) {
    return {
        rank: state.rank,
    };
}

function mapDispatchToProps(dispatch) {
    return {
        rankActions: bindActionCreators(rankActionCreators, dispatch)
    };
}

export default connect(mapStateToProps, mapDispatchToProps)(RankPage);
