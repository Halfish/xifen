$(function(){
	$('#btnSubmit').click(function(){

		$.ajax({
			url: '/user_checked',
			data: $('form').serialize(),
			type: 'POST',
			success: function(response){
                if (response == 'success'){
                    console.log('success');
                    alert('提交成功')
                    window.location = '/user_manage';
                }
                else {
                    alert('提交失败');
                }
			},
			error: function(error){
				console.log(error);
			}
		});
	});
});
