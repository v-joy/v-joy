/**
 * @file 系统所以路由的配置
 * @author nosql@icloud.com
 * @date 2016-03-19
 */

import React, {Component} from 'react';
import {Router, Route, browserHistory, IndexRoute} from 'react-router';

import App from '../containers/App';
import RankPage from '../containers/RankPage';
import ProductPage from '../containers/ProductPage';

class RouteMap extends Component {
    render() {
        return (
            <Router history={browserHistory}>
                <Route path="/" component={App}>
                    <IndexRoute component={RankPage}/>
                    <Route path="/product/:productId" component={ProductPage}/>
                </Route>
            </Router>
        );
    }
}

export default RouteMap;

/*
 <Route path="/static" component={StaticPage}>
    <Route path="/static/products" component={StaticProdsPage}/>
    <Route path="/static/products/:productId" component={StaticSingleProductPage}/>
    <Route path="/static/streams/:streamId" component={StaticSingleStreamPage}/>
    <Route path="/static/datasrc/:streamId" component={StreamDataSourcePage}/>
    <Route path="/static/datasink/:streamId" component={StreamDataSinkPage}/>
    <Route path="/static/hasmerge/:streamId" component={StreamHasMergePage}/>
    <Route path="/static/levels/:streamId" component={LevelListPage}/>
    <Route path="/static/level/:levelId" component={SingleLevelPage}/>
    <Route path="/static/lvlpkg/:streamId" component={LevelPackagePage}/>
    <Route path="/static/profiles/:streamId/:type" component={OfflineProfilesPage}/>
    <Route path="/static/profiles/:profileId" component={SingleProfilePage}/>
</Route>
<Route path="/dynamic" component={DynamicPage}>
    <Route path="/dynamic/products/:productId" component={DynamicSingleProductPage}/>
    <Route path="/dynamic/streams/:streamId" component={DynamicSingleStreamPage}/>
    <Route path="/dynamic/deploys/:streamId/:status" component={DeployListPage}/>
    <Route path="/dynamic/deploy/:deployId" component={SingleDeployPage}/>
    <Route path="/dynamic/instances/:streamId/:type" component={InstanceListPage}/>
</Route>
<Route path="/debug" component={RolePage}/>
<Route path="/container" component={RolePage}/>
<Route path="/role" component={RolePage}/>
*/
