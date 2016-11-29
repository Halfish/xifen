// Apache server ip config
var apache_ip = 'http://172.18.217.120'

$(function(){
	$('#btnLogin').click(function(){
    
		$.ajax({
			url: '/login',
			data: $('form').serialize(),
			type: 'POST',
			success: function(response){
                console.log(response);
                if (response == 'super_admin'){
                    window.location = '/user_manage';
                }
                else if (response.length >= 5 && response.substr(0,5) == 'admin'){
                    $.redirect(apache_ip + '/xifen/webpage/login_check.php', {id:response.substr(5,response.length)});
                }
                else if (response == 'permission denied'){
                    alert('用户无权限');
                }
                else {
                    alert('登录失败');
                }
			},
			error: function(error){
				console.log(error);
			}
		});
	});
});
