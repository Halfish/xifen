$(function(){
	$('#btnSignUp').click(function(){
		
		$.ajax({
			url: '/signup',
			data: $('form').serialize(),
			type: 'POST',
			success: function(response){
				console.log(response);
                if (response == 'success'){
                    alert("注册成功");
                }
                else if (response == 'user_name exists'){
                    console.log('test');
                    alert("用户名已注册");
                }
                else {
                    alert("输入有误");
                }
			},
			error: function(error){
				console.log(error);
			}
		});
	});
});
