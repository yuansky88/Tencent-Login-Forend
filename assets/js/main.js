// 修复手机输入法将底部顶起

var winHeight = $(window).height();   //获取当前页面高度
$(window).resize(function () {
    var thisHeight = $(this).height();
    if (winHeight - thisHeight > 50) {
        //当软键盘弹出，在这里操作消失
        $('.login-other').css('display', 'none');
    } else {
        //当软键盘收起，在此处操作显示
        $('.login-other').css('display', 'block');
    }
});

//删除按钮事件监听

$('#username-clear').click(
    function () {
        $('#username').val('');
    }
)
$('#password-clear').click(
    function () {
        $('#password').val('');
    }
)

//判断提交

$('#login-button').click(
    function () {
        // 获取相关input的值
        var username = $('#username').val();
        var password = $('#password').val();
        // 打印在控制台以供查询和报错
        console.log("账号为" + username);
        console.log("密码为" + password);
        //空值提示
        if (username == '' && password == '') {
            $('#tips-texts').text('你还没有输入账号和密码！')
            $(".tips-content").show().delay(5000).fadeOut();
        } else if (username == '') {
            $('#tips-texts').text('你还没有输入账号！')
            $(".tips-content").show().delay(5000).fadeOut();
        } else if (password == '') {
            $('#tips-texts').text('你还没有输入密码！')
            $(".tips-content").show().delay(5000).fadeOut();
        } else {
            //非空值传值
            $.post("assets/script/login.php",
                {
                    username,
                    password
                },
                function (data) {
                    $('#tips-texts').text('密码错误，请尝试重新登录！')
                    $(".tips-content").show().delay(5000).fadeOut();
                    $('#datalook').text(data)
                });
        }
    }
)