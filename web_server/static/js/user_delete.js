$(function(){
	$('#btnSubmit').click(function(){

		$.ajax({
			url: '/remove_user',
			data: $('form').serialize(),
			type: 'POST',
			success: function(response){
                if (response == 'success'){
                    console.log('success');
                    alert('提交成功')
                    window.location = '/user_delete';
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
