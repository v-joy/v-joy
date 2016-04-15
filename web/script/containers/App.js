/**
 * @file 系统页面总容器
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import React from 'react';

import Header from '../components/Header/Header';
import Footer from '../components/Footer/Footer';

class App extends React.Component {
    render() {
        return (
            <div>
                <Header />
                {this.props.children}
                <Footer />
            </div>
        );
    }
}

export default App;