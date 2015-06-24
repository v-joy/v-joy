<ul class="list-wrapper clearfix">
    <li ng-repeat="item in items">
        <div>
            <div class="list-img-box">
                <a href="#/detail/{{item.id}}">
                    <img src="/web/img/1.jpg" alt=""/>
                </a>
            </div>
            <div class="list-detail">
                <a href="#/detail/{{item.id}}">
                    <span class="list-title">{{item.name}}</span>
                    <span class="list-title-desc">{{item.desc}}</span>
                </a>
                <p class="list-price">
                    <span>{{item.price}}</span>
                </p>
            </div>
        </div>
    </li>
</ul>