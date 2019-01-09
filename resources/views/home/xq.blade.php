@extends('layout.home')

<link rel="stylesheet" type="text/css" href="/home/css/top.css"/>
<link rel="stylesheet" type="text/css" href="/home/css/lunbo.css">
<link rel="stylesheet" type="text/css" href="/home/css/zhanshi.css">
<link rel="stylesheet" type="text/css" href="/home/css/footer.css">
<style>
    .xuanzcolor .active{
        border:solid 1px #f00;
    }

</style>
@section('content')
</div>
<div class="nowweizhi">
    <span>你当前的位置</span>
    <b>></b>
    <a href="#">分类</a>
    <b>></b>
    <a href="#">商品</a>
</div>
<!--商品展示区域-->
@foreach($goods as $vg)
<div class="theshopshow">
    <!--left-->
        <!-- 帝云商品展示 -->
            <div id="preview">
                <div class="jqzoom" id="spec-n1" onClick="window.open('/')"><IMG height="350" src="{{$vg->gimg}}" jqimg="{{$vg->gimg}}" width="350px">
                    </div>
                    <div id="spec-n5">
                        <div class=control id="spec-left">
                            <img src="/home/img/left.gif" />
                        </div>
                        <div id="spec-list">
                            <ul class="list-h">
                                @foreach ($photoer as $vm)
                                @if($vg->id == $vm->gid)
                                <li><img src="{{$vm->small}}"> </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class=control id="spec-right">
                            <img src="/home/img/right.gif" />
                        </div>
                    </div>
                </div>
                
            <!-- 帝云商品展示 End -->                                    
    <!--right-->
    <div class="shoppnum">
        <!--n1-->
        <div class="shanpmai">
            <h1 class="spdname">{{$vg->gname}}</h1>
            <div class="hotspeak">
                全场免邮，满200-20,400-40，支持货到付款
            </div>
            <div class="shoujiap">
                <span>商品价格</span>

                <i>{{$vg->price}}</i>￥
            </div>
            <div class="chuxinxi">
                <span>促销信息</span><i>满200.00减20.00，满400.00减40.00</i>
            </div>
            <div class="shoujigm">
                <span>APP独享打折</span>
                <div class="sjapp">用手机购买
                    <!-- <b><img src="/home/img/erweima.jpg"/></b> -->
                </div>
            </div>
            <div class="peisongzhi">
                <span>配送至</span>
                <div class="choosecity">
                    <input type="text" id="city" value="点击选择地区"/ style=" height:20px; font-size:12px; margin-top:5px; border:1px solid #cacace">
                </div>
                <span style=" font-weight:bold; color:#333">
                    @if($vg->gnum >= 10)
                    有货
                    @else
                    库存不足
                    @endif
                </span>
                <a href="#">支持货到付款</a>
            </div>
            <div class="xuanzcolor">
                <span>选择颜色</span>
                <div class="morecolor">
                    <ul>
                        @foreach($middle as $vp)
                        @if($vg->id == $vp->gid)
                        <li pid="{{$vp->id}}"><a href="#"><img src="{{$vp->middle}}"/></a></li>
                        @endif
                        @endforeach
                    </ul>
                    
                </div>
                <div class="choosecm">
                    <span>选择尺码</span>
                    <div class="morecm">
                        <ul>
                            @foreach($gattr as $va)
                            <li><a href="#">{{$va}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--购买数量-->
                <div class="goumaijiajian">
                    <span>购买数量</span>
                    <input id="min" name="" type="button" value="-" / style=" width:30px; height:30px; font-size:12px; line-height:30px; color:#333; float:left; cursor:pointer">  
                    <input id="text_box" name="" type="text" value="1" style="width:60px;height:30px; font-size:12px; text-align:center; float:left"/>【库存{{$vg->gnum}}】  
                    <input id="add" name="" type="button" value="+" / style=" width:30px; height:30px; font-size:12px; line-height:30px; color:#333; float:left; cursor:pointer">
                </div>
                 <!--加入购物车与收藏商品-->
                 <div class="joinspadsp">
                    <a href="#" style=" margin-left:67px">立即购买</a>
                    <a href="javascript:void(0)" class="gouwuche" style=" margin-left:6px" >加入购物车</a>
                    <!-- <a href="#" style=" margin-left:6px">收藏该商品</a> 1163-->
                 </div>
            </div>
        </div>
        <!--n2-->
        <div class="daitianc">
            <span class="lkadlk">更多商品</span>
            <div class="lklksp">
                <ul>
                @foreach($gd as $vd)
                @if($vd->gtype == 1)                    
                    <li>
                        <a href="/home/xq/{{$vg->id}}">
                            <b>
                                <img src="{{$vd->gimg}}"/>
                            </b>
                            <p>{{$vd->gname}}</p>
                            <p></p>
                            <span>{{$vd->price}}</span>
                        </a>
                    </li>
                @endif
                @endforeach
                </ul>
            </div>
            <!--上去下来的按钮-->
            <div class="ananniu shangfan" style=" background: url(/home/img/__sprite.png) no-repeat 0 0; margin-left:70px"></div>
            <div class="ananniu xiafan" style=" background:url(/home/img/__sprite.png) no-repeat -28px 0; margin-left:50px"></div>
        </div>
        
    </div>
</div>
<!--商品介绍东西有点多-->
<div class="spjsmore">
    <!--左-->
    <div class="theleftkz">
        <div class="drxgs">
            达人选购
        </div>
        <div class="drxgsp">
            <ul>
                @foreach($gd as $vd)
                @if($vd->id == 102 || $vd->id == 17)
                <li>
                    <a href="/home/xq/{{$vg->id}}">
                        <b>
                            <img src="{{$vd->gimg}}"/>
                        </b>
                        <h5>{{$vg->gname}}</h5>
                        <p>{{$vg->price}}</p>
                    </a>
                    <a href="#" style=" display:block; width:100%; height:20px; text-align:center; color:#666; font-size:12px; line-height:12px">官方自营店</a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!--右-->
    <div class="therightnrs">
        <div class="threespa">
            <ul>
                <li class="oncolors" mt-floors="1" mt-cts="1" id="spencals1">商品介绍</li>
                <li mt-floors="2" mt-cts="1" id="spencals2">商品评价<s>(1297)</s></li>
                <li mt-floors="3" mt-cts="1" id="spencals3">售后保障</li>
                
            </ul>
        </div>
        
        <!--大容器里面放若干内容-->
        <div class="drqlmfrgnr">
        <!--商品自诩-->
            <div class="bigcakes c-1-1">
                    {!!$vg->content!!}
            </div>
        <!--售后保障-->
            <div class="bigcakes c-3-1">
                <div class="maijiacnqs">
                    <span>卖家承诺</span>
                    <p>帝云平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！
注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>
                </div>
                <div class="maijiacnqs">
                    <span>帝云承诺</span>
                    <p>帝云商城向您保证所售商品均为正品行货，帝云自营商品开具机打发票或电子发票。</p>
                </div>
                <div class="maijiacnqs">
                    <span>全国联保</span>
                    <p>凭质保证书及帝云商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由帝云联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。帝云商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！ 

注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>
                </div>
                <div class="maijiacnqs">
                    <span>无忧退换货</span>
                    <p>客户购买帝云自营商品7日内（含7日，自客户收到商品之日起计算），在保证商品完好的前提下，可无理由退货。（部分商品除外，详情请见各商品细则）</p>
                </div>
                <div class="maijiacnqs">
                    <span>权利声明</span>
                    <p>帝云商城上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东重要的经营资源，未经许可，禁止非法转载使用。<br>

注：本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。</p>
                </div>
                <div class="maijiacnqs">
                    <span>价格说明</span>
                    <p><strong>京东价：</strong>京东价为商品的销售价，是您最终决定是否购买商品的依据。<br>

<strong>划线价：</strong>商品展示的划横线价格为参考价，该价格可能是品牌专柜标价、商品吊牌价或由品牌供应商提供的正品零售价（如厂商指导价、建议零售价等）或该商品在京东平台上曾经展示过的销售价；由于地区、时间的差异性和市场行情波动，品牌专柜标价、商品吊牌价等可能会与您购物时展示的不一致，该价格仅供您参考。
折扣：如无特殊说明，折扣指销售商在原价、或划线价（如品牌专柜标价、商品吊牌价、厂商指导价、厂商建议零售价）等某一价格基础上计算出的优惠比例或优惠金额；如有疑问，您可在购买前联系销售商进行咨询。<br>

<strong>异常问题：</strong>商品促销信息以商品详情页“促销”栏中的信息为准；商品的具体售价以订单结算页价格为准；如您发现活动商品售价或促销信息有异常，建议购买前先联系销售商咨询。</p>
                </div>
            </div>
        <!--商品评价-->
            <div class="bigcakes c-2-1">
                <!--对该商品的综合评分-->
                <div class="duigaispdzhpfs">
                    <!--left-->
                    <div class="goodhpd">
                        <span><i>99</i>%</span>
                        <p>好评度</p>
                    </div>
                    <!--right-->
                    <div class="haopingjdts">
                        <!--好评-->
                        <div class="gdpjbf">
                            <em>好评<i>99%</i></em>
                            <span>
                                <p style=" width:50%"></p>
                            </span>
                        </div>
                        <!--中评-->
                        <div class="gdpjbf">
                            <em>中评<i>99%</i></em>
                            <span>
                                <p style=" width:50%"></p>
                            </span>
                        </div>
                        <!--差评-->
                        <div class="gdpjbf">
                            <em>差评<i>99%</i></em>
                            <span>
                                <p style=" width:50%"></p>
                            </span>
                        </div>
                        <!--差评结束-->
                    </div>
                    <!--right结束-->  
                </div>
                <!--评分结束-->
                <div class="quanbupinglun">
                    <a href="#" class="nocolors" mt-floord="1" mt-ctd="1">全部评论<em>(1010)</em></a>
                    <a href="#" mt-floord="2" mt-ctd="1">好评<em>(600)</em></a>
                    <a href="#" mt-floord="3" mt-ctd="1">中评<em>(300)</em></a>
                    <a href="#" mt-floord="4" mt-ctd="1">差评<em>(10)</em></a>
                </div>
                <!--这个容器里面放了全部评论、好评、中评、差评、-->
                <div class="qbpltyf123">
                <!--全部评论-->
                    <div class="smallcake d-1-1" style="display:block">
                    <!--一条评论开始-->
                        <div class="thepcpls">
                        <!--左-->
                            <div class="zuileftop">
                                <!--改变星级只需要改" no-repeat X 0"里面的X即可，一次是17像素-->
                                <div class="thstar" style=" background:url(/home/img/commentsListIcons1.png) no-repeat 0 0"></div>
                                <div class="shdltpl">收货1天后评论</div>
                                <div class="shdplsj">2016-6-6&nbsp;16:28</div>
                            </div>
                        <!--中-->
                            <div class="zuicenterop">
                                尺码标准，面料舒适，买给爸爸的，穿上很合身，非常感谢卖家诚信善良用心经营店铺，全5分支持!值得推荐购买！
                            </div>
                        <!--右-->
                            <div class="zuirightop">
                                <div class="touxadmz">
                                    <b>
                                        <img src="/home/img/touxiang.png"/>
                                    </b>
                                    <em>小******明</em>
                                </div>
                                <div class="zgrsndra">山东</div>
                            </div>
                            <!--购买的商品信息-->
                            <div class="gmdspxinxisz">
                                <a href="#">商品的名字什么商品</a>
                                <em>9999元</em>
                            </div>
                        </div>
                    <!-- 一条评论结束-->    
                    </div>
                <!--好评-->
                    <div class="smallcake d-2-1">
                    <!--一条评论开始-->
                        <div class="thepcpls">
                        <!--左-->
                            <div class="zuileftop">
                                <!--改变星级只需要改" no-repeat X 0"里面的X即可，一次是17像素-->
                                <div class="thstar" style=" background:url(/home/img/commentsListIcons1.png) no-repeat 0 0"></div>
                                <div class="shdltpl">收货1天后评论</div>
                                <div class="shdplsj">2016-6-6&nbsp;16:28</div>
                            </div>
                        <!--中-->
                            <div class="zuicenterop">
                                尺码标准，面料舒适，买给爸爸的，穿上很合身，非常感谢卖家诚信善良用心经营店铺，全5分支持!值得推荐购买！
                            </div>
                        <!--右-->
                            <div class="zuirightop">
                                <div class="touxadmz">
                                    <b>
                                        <img src="/home/img/touxiang.png"/>
                                    </b>
                                    <em>小******明</em>
                                </div>
                                <div class="zgrsndra">山东</div>
                            </div>
                            <!--购买的商品信息-->
                            <div class="gmdspxinxisz">
                                <a href="#">商品的名字什么商品</a>
                                <em>9999元</em>
                            </div>
                        </div>
                    <!-- 一条评论结束-->
                    </div>
                <!--中评-->
                    <div class="smallcake d-3-1">
                    <!--一条评论开始-->
                        <div class="thepcpls">
                        <!--左-->
                            <div class="zuileftop">
                                <!--改变星级只需要改" no-repeat X 0"里面的X即可，一次是17像素-->
                                <div class="thstar" style=" background:url(/home/img/commentsListIcons1.png) no-repeat 0 0"></div>
                                <div class="shdltpl">收货1天后评论</div>
                                <div class="shdplsj">2016-6-6&nbsp;16:28</div>
                            </div>
                        <!--中-->
                            <div class="zuicenterop">
                                尺码标准，面料舒适，买给爸爸的，穿上很合身，非常感谢卖家诚信善良用心经营店铺，全5分支持!值得推荐购买！
                            </div>
                        <!--右-->
                            <div class="zuirightop">
                                <div class="touxadmz">
                                    <b>
                                        <img src="/home/img/touxiang.png"/>
                                    </b>
                                    <em>小******明</em>
                                </div>
                                <div class="zgrsndra">山东</div>
                            </div>
                            <!--购买的商品信息-->
                            <div class="gmdspxinxisz">
                                <a href="#">商品的名字什么商品</a>
                                <em>9999元</em>
                            </div>
                        </div>
                    <!-- 一条评论结束-->
                    </div>
                <!--差评-->
                    <div class="smallcake d-4-1">
                    <!--一条评论开始-->
                        <div class="thepcpls">
                        <!--左-->
                            <div class="zuileftop">
                                <!--改变星级只需要改" no-repeat X 0"里面的X即可，一次是17像素-->
                                <div class="thstar" style=" background:url(/home/img/commentsListIcons1.png) no-repeat 0 0"></div>
                                <div class="shdltpl">收货1天后评论</div>
                                <div class="shdplsj">2016-6-6&nbsp;16:28</div>
                            </div>
                        <!--中-->
                            <div class="zuicenterop">
                                尺码标准，面料舒适，买给爸爸的，穿上很合身，非常感谢卖家诚信善良用心经营店铺，全5分支持!值得推荐购买！
                            </div>
                        <!--右-->
                            <div class="zuirightop">
                                <div class="touxadmz">
                                    <b>
                                        <img src="/home/img/touxiang.png"/>
                                    </b>
                                    <em>小******明</em>
                                </div>
                                <div class="zgrsndra">山东</div>
                            </div>
                            <!--购买的商品信息-->
                            <div class="gmdspxinxisz">
                                <a href="#">商品的名字什么商品</a>
                                <em>9999元</em>
                            </div>
                        </div>
                    <!-- 一条评论结束-->
                    </div>
                <!--差评结束-->
                </div>
            </div>    
        </div>
        
        
    </div>
    
</div>
@endforeach
@stop
<!--页脚-->
<!--footer-->
@section('myJs')

<!-- 全局 -->
<script src="/home/js/jquery-3.2.1.min.js"></script>
<script src="/home/js/public.js"></script>

<!-- 下拉商品分类 -->
<script>
    // $('#big_banner_wrap').css({position:'absolute',top:'177px',left:'50%',margin-left:'-613px'});
    $('#big_banner_wrap').css('position','absolute');
    $('#big_banner_wrap').css('top','177px');
    $('#big_banner_wrap').css('left','50%');
    $('#big_banner_wrap').css('margin-left','-613px');
</script>
<script>
$(function(){
    $("#banner_menu_wrap").mouseleave(function(){
        $(this).hide()
        $("#big_banner_wrap").hide()
        });
    $(".djfl").mouseenter(function(){
        $("#big_banner_wrap").show()
        $("#banner_menu_wrap").show()
        }); 
    })
</script>    
<!-- 商品展示 -->
<script src="/home/js/163css.js"></script>
<script src="/home/js/lib.js"></script>

<SCRIPT type=text/javascript>
    $(function(){           
           $(".jqzoom").jqueryzoom({
                xzoom:400,
                yzoom:400,
                offset:10,
                position:"right",
                preload:1,
                lens:1
            });
            $("#spec-list").jdMarquee({
                deriction:"left",
                width:350,
                height:56,
                step:2,
                speed:4,
                delay:10,
                control:true,
                _front:"#spec-right",
                _back:"#spec-left"
            });
            $("#spec-list img").bind("mouseover",function(){
                var src=$(this).attr("src");
                $("#spec-n1 img").eq(0).attr({
                    src:src.replace("\/n5\/","\/n1\/"),
                    jqimg:src.replace("\/n5\/","\/n0\/")
                });
                $(this).css({
                    "border":"2px solid #ff6600",
                    "padding":"1px"
                });
            }).bind("mouseout",function(){
                $(this).css({
                    "border":"1px solid #ccc",
                    "padding":"2px"
                });
            });             
        })

</SCRIPT>

<!-- 配送省市县 -->
<script src="/home/js/city.js/cityJson.js"></script>
<script src="/home/js/city.js/citySet.js"></script>
<script src="/home/js/city.js/Popt.js"></script>

<script type="text/javascript">
    $("#city").click(function (e) {
    SelCity(this,e);
    });
</script>

<!-- 选择颜色 -->
<script>
$(function(){
    $(".morecolor img").bind("click",function(){
                var src=$(this).attr("src");
                $("#spec-n1 img").eq(0).attr({
                    src:src.replace("\/n5\/","\/n1\/"),
                    jqimg:src.replace("\/n5\/","\/n0\/")
                });
            }).bind("",function(){
                $(this).css({
                    "border":"1px solid #ccc",
                    "padding":"2px"
                });
            }); 

    $(".morecolor ul li").click(function(){
        $(this).addClass('active').siblings().removeClass('active');

        return false;
    })
    

    $(".morecm ul li").click(function(){
        
        $(this).addClass('active').siblings().removeClass('active');

        return false;
    })

    $('.gouwuche').click(function(){
        //获取大小
            var size = $('.morecm .active').text();
        //获取图片
            var pic_id = $('.morecolor .active').attr('pid');
            // console.log(pic_id);
        //获取数量
            var num = $('#text_box').val();
            var city = $('#city').val();
            // console.log(city);
            $.ajax({
                url:'/home/cate',
                type:'GET',
                data:{size:size,pic_id:pic_id,num:num,city:city},
                success:function(data){

                    // alert(data);
                    if(data == 1)
                    {
                        alert('添加购物车成功');
                    }else{
                        alert('您还未登录,请先登录');
                    }
                },
                async:true,
                timeout:3000
            })

        })
})
</script>

<!-- 商品数量 -->
<script>

$(document).ready(function(){
//获得文本框对象
   var t = $("#text_box");
    //初化始数量为1,并失效减
    $('#min').attr('disabled',true);
        //数量增加操作
        $("#add").click(function(){    
            t.val(parseInt(t.val())+1)
            if (parseInt(t.val())!=1){
                $('#min').attr('disabled',false);
            }
          
        }) 
        //数量减少操作
        $("#min").click(function(){
            t.val(parseInt(t.val())-1);
            if (parseInt(t.val())==1){
                $('#min').attr('disabled',true);
            }
          
        })
});
</script>
<script>
$(function(){
    /*控制商品详情、商品评价、售后保障的出现或消失*/
    $(".threespa ul li").mouseenter(function(){
        $(this).addClass("oncolors").siblings().removeClass("oncolors")
        })
    /*控制商品评价里面导航块的添加颜色或减去颜色*/   
    $(".quanbupinglun a").click(function(){
                $(this).addClass("nocolors").siblings().removeClass("nocolors")
                })  
    })
</script>

<script>
/*控制商品详情、商品评价、售后保障的出现或消失*/
    $(function(){
            $(".threespa ul li").mouseenter(function(){
            var frs=$(this).attr("mt-floors");
            var cats=$(this).attr("mt-cts");
            $(".c-"+frs+"-"+cats+"").show().siblings().hide();
            })
            /*这个有点特殊*/
            $("#spencals1").mouseenter(function(){
                $(".c-1-1").show();
                $(".c-2-1").show();
                $(".c-3-1").show();
                })
            /*$("#spencals2").mouseenter(function(){
                $(".c-2-1").show();
                $(".c-3-1").show();
                })*/
            $("#spencals3").mouseenter(function(){
                $(".c-3-1").show();
                $(".c-2-1").show();
                })      
                
/*控制全部评论、好评、中评、差评的块的出现或消失*/
            $(".quanbupinglun a").click(function(){
            var frd=$(this).attr("mt-floord");
            var catd=$(this).attr("mt-ctd");
            $(".d-"+frd+"-"+catd+"").show().siblings().hide();
            })
        })
</script>
<!--这里一切测试正常，现在我去掉容器里面各个div的颜色-->
<script>
$(function(){
    var i=0
    var size=$(".lklksp ul li").size()
    $(".shangfan").click(function(){
        i++
        if(i==size-1){
            i=0;
            }
        $(".lklksp ul").animate({top:-i*218})
        })
    $(".xiafan").click(function(){
        i--
        if(i==-1){
            i=size-2
            }
        $(".lklksp ul").animate({top:-i*218})
        })
    })
</script>
@stop  