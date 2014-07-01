@section('content')

<div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span> 登录 <span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h5><strong>欢迎来到未知的世界!</strong></h5>
                    <ul>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> 全新布局</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> 功能齐全</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> 自动化</li>
                    </ul>
                    <div class="mb20"></div>
                    <strong>没有账号？<a href="{{route('signup')}}">注册</a></strong>
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <form method="post" action="<?php echo Request::server('REQUEST_URI');?>" onsubmit="return bindSubmitEvent(this);">
                    <h4 class="nomargin">登录</h4>
                    <p class="mt5 mb20">登录到你的账户.</p>
                    <input type="hidden" value="{{Input::get('redirect_uri')}}" name="redirect_uri" />
                    <input type="text" class="form-control uname" name="username" placeholder="用户名" />
                    <input type="password" class="form-control pword" name="password" placeholder="密码" />
<!--                     <a href=""><small>忘记密码 ?</small></a> -->
                    <button data-content="" data-container="body" class="btn btn-success btn-block" data-placement="right" type="submit">登录</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved.
            </div>
            <div class="pull-right">
            </div>
        </div>
        
    </div><!-- signin -->
    
@stop
    
@section('footer')
<script type="text/javascript">
    function bindSubmitEvent(obj)
    {
        if (obj.username.value == '') {
            return false;
        }
        if (obj.password.value == '') {
            return false;
        }
        return true;
    }
</script>
@stop