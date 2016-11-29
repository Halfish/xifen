$(function(){
	$('#btnSubmit').click(function(){

		$.ajax({
			url: '/team_create',
			data: $('form').serialize(),
			type: 'POST',
			success: function(response){
                console.log(response);
                if (response == 'success'){
                    alert('提交成功');
                }
                else if (response == 'team_name exists') {
                    alert('团队名已经存在！');
                }
                else if (response == 'input error') {
                    alert('输入有误！');
                }
                else {
                    alert('提交失败！');
                }
			},
			error: function(error){
				console.log(error);
			}
		});
	});
});
