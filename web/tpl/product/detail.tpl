<div id="product-detail-wrapper">
    <!-- <p class="bread-crumb"><a href="#">首页</a><span>></span><a href="#">水果</a></p> -->
    <div class="clearfix">
        <div class="f-left detail-img-wrap">
            <div>
                <img src="/img/1.jpg" alt=""/>
            </div>
            <ul>
                <li>
                    <img src="" />
                </li>
            </ul>
        </div>
        <div class="product-msg">
            <h1 class="product-msg-title">{{item.name}}</h1>
            <p class="product-msg-create-time">发布时间：{{item.createTime}}</p>
            <p class="product-msg-desc">{{item.description}}</p>
            <dl>
                <dt class="f-left">价格</dt>
                <dd class="f-left"><span>{{item.price}}</span>元</dd>
            </dl>
            <dl>
                <dt class="f-left">商家地址</dt>
                <dd class="f-left">{{item.address}}</dd>
            </dl>
            <dl>
                <dt class="f-left">联系邮箱</dt>
                <dd class="f-left"><span>{{item.email}}</span></dd>
            </dl>
        </div>
    </div>
</div>

