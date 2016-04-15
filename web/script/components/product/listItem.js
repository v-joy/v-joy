/**
 * @file 页面左侧导航栏，包括导航树及相关组件操作
 * @author nosql@icloud.com
 * @date 2016-03-20
 */

import React from 'react';

import {Treebeard} from 'react-treebeard';

class listitem extends React.Component {
    constructor(props) {
        super(props);
        this.onTreeToggle = this.onTreeToggle.bind(this);
    }

    onSideBarToggle() {

    }

    onTreeToggle(node, toggled) {
        node.active = true;
        this.props.expandCallback(node.id);
    }

    render() {
        let {treeTitle, data} = this.props;
        let treeNode = data.map((item) => {
            return (<Treebeard style={treeStyle} onToggle={this.onTreeToggle} data={item}/>);
        });

        return (
            <div>
                <div>
                    <h5>
                        <Button bsSize="xsmall" onClick={this.onSideBarToggle}>&nbsp;&lt;&lt;&nbsp;</Button>
                    </h5>
                </div>
                <div>
                    {treeNode}
                </div>
            </div>
        );
    }
}

export default listitem;