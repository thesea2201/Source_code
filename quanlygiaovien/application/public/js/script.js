$(document).ready(function() {
    $('#add_form').submit(function(e){
                        alert("test");
			e.preventDefault();
                    	var magv=$('#magv').val();
			var tengv=$('#tengv').val();
                        var gioitinh=$('#gioitinh').val();
                        var mabm=$('#mabm').val();
                        
				$.ajax({
					type: "POST",
					url: 'http://localhost/quanlygiaovien/index.php/home/themgiaovien',
					data: {
						magv: magv,
						tengv: tengv,
                                                gioitinh:gioitinh,
                                                mabm:mabm
					},
					success: function(data) {
						$("#grid").show();
						$('#giaovien_list').append(data);
						$('#add_form').hide();

						
					}
				});  
			
			
		});	
    
    
	   $('.edit-link').click(function(e) {
			e.preventDefault();
			var macs=$(this).attr("href");
			$.ajax({
				type: "POST",
				url: 'http://localhost/showbiz/index.php/home/view_edit_singer',
				data: {
					macs: macs              
				},
				success: function(data) {
					$("#grid").hide();
					$("#edit_form").html(data);
					$("#edit_form").toggle('slow');
				}
			});     
			
		}); 
		
	   $('.add-link').click(function(e) {
			e.preventDefault();
			$("#grid").hide();
			$("#add_form").toggle('slow');
			
		}); 
		
	   $('.delete-link').click(function(e) {
			e.preventDefault();
			var macs=$(this).attr("href");
			if (confirm('Bạn có muốn xóa ca sĩ này?')){
				$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/delete_singer',
					data: {
						macs: macs              
					},
					success: function(data) {
						$('#row'+macs).hide();
					}
				});  
			}			
			
		}); 		

	   $('#edit_form').submit(function(e){
			e.preventDefault();
			var macs=$('#macs').val();
			var tencs=$('#tencs').val();
				$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/update_singer',
					data: {
						macs: macs,
						tencs: tencs
					},
					success: function(data) {
						$("#grid").show();
						$('#row'+macs).html(data);
						$('#edit_form').hide();

						
					}
				});  		
			
		});	

		

		$('#macs').blur(function() {
			$.ajax({
				type: "POST",
				url: 'http://localhost/showbiz/index.php/home/exist_singer',
				data: {
					macs: $('#macs').val()
				},
				success: function(data) {
					if (data.indexOf("true") > 0)
					{
						$("#macs_hint").html('Mã CS đã tồn tại!');
						$("#macs_hint").show();
						$("#macs").focus();
					}
					else
					{
						$("#macs_hint").html('');
						$("#macs_hint").hide();
					}


				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError);
				}
			});
		});		
		
		
		$('#ma_album').blur(function() {
			$.ajax({
				type: "POST",
				url: 'http://localhost/showbiz/index.php/home/exist_album',
				data: {
					ma_album: $('#ma_album').val()
				},
				success: function(data) {
					if (data.indexOf("true") > 0)
					{
						$("#ma_album_hint").html('Mã Album đã tồn tại!');
						$("#ma_album_hint").show();
						$("#macs").focus();
					}
					else
					{
						$("#ma_album_hint").html('');
						$("#ma_album_hint").hide();
					}


				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError);
				}
			});
		});		
		
		
		$('#add_album_form').submit(function(e){
			e.preventDefault();
			var ma_album=$('#ma_album').val();
			var ten_album=$('#ten_album').val();
			var macs= sel_singer.options[sel_singer.selectedIndex].value; 
			if($("#ma_album").is( ":disabled" ))
			{
				$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/update_album',
					data: {
						ma_album: ma_album,
						ten_album: ten_album,
						macs: macs
						
					},
					success: function(data) {
						$('#row'+ma_album).html(data);						
					}
				});  
			}
			else
			{
				$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/add_album',
					data: {
						ma_album: ma_album,
						ten_album: ten_album,
						macs: macs
						
					},
					success: function(data) {
						$('#album_list').append(data);						
					}
				});  
			}
			
		});	


	   $('.edit-album').click(function(e) {
			e.preventDefault();
			var ma_album=$(this).attr("href");
			var ten_album=$(this).attr("name");
			var macs=$(this).attr("hreflang");
			$("#ma_album").val(ma_album);
			$("#ten_album").val(ten_album);
			$("#sel_singer").val(macs);
			$("#ma_album").prop('disabled', true);
			
		}); 

	   $('.add-album').click(function(e) {
			e.preventDefault();
			$("#ma_album").prop('disabled', false);
			$("#ma_album").val('');
			$("#ten_album").val('');
			
		}); 

	   $('.delete-album').click(function(e) {
			e.preventDefault();
			var ma_album=$(this).attr("href");
			if (confirm('Bạn có muốn xóa album này?')){
				$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/delete_album',
					data: {
						ma_album: ma_album           
					},
					success: function(data) {
						$('#row'+ma_album).hide();
					}
				});  
			}			
			
		}); 

		$("#sel_singer").change(function() {
			var macs= sel_singer.options[sel_singer.selectedIndex].value; 
			$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/select_album',
					data: {
						macs: macs
						
					},
					success: function(data) {
						$('#album_list').html(data);						
					}
				});  			
		
		});
		
		$("#sel_album").change(function()
		{
			var ma_album= sel_album.options[sel_album.selectedIndex].value; 
			$.ajax({
				type: "POST",
				url: 'http://localhost/showbiz/index.php/home/select_song',
				data: {
					ma_album: ma_album
								
				},
				success: function(data) {
					$('#song_list').html(data);						
				}
				}); 		
		});


		$('.edit-song').click(function(e) {
			e.preventDefault();
			var ma_baihat=$(this).attr("href");
			var ten_baihat=$(this).attr("name");
			var ma_album=$(this).attr("hreflang");
			var macs=$(this).attr("rev");
			$("#ma_baihat").val(ma_baihat);
			$("#ten_baihat").val(ten_baihat);
			$("#sel_singer_song").val(macs);
			$("#sel_singer_song").change(select_singer_change()); //Gọi lại hàm select_singer_change để đỗ dữ liệu vào select album
			$("#sel_album").val(ma_album);
			$("#ma_baihat").prop('disabled', true);
			
		}); 

		$('#add_song_form').submit(function(e){
			e.preventDefault();
			var ma_baihat=$('#ma_baihat').val();
			var ten_baihat=$('#ten_baihat').val();
			var ma_album= sel_album.options[sel_album.selectedIndex].value; 
			
			if($("#ma_baihat").is( ":disabled" )) //Chế độ chỉnh sửa
			{
				$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/update_song',
					data: {
						ma_baihat: ma_baihat,
						ten_baihat: ten_baihat,
						ma_album: ma_album
						
					},
					success: function(data) {
						$('#row'+ma_baihat).html(data);						
					}
				});  
			}
			else // Chế độ thêm mới
			{
				$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/add_song',
					data: {
						ma_baihat: ma_baihat,
						ten_baihat: ten_baihat,
						ma_album: ma_album
						
					},
					success: function(data) {
						$('#song_list').append(data);						
					}
				});  
			}
			
		});	


	   $('.delete-song').click(function(e) {
			e.preventDefault();
			var ma_baihat=$(this).attr("href");
			if (confirm('Bạn có muốn xóa bài hát này?')){
				$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/delete_song',
					data: {
						ma_baihat: ma_baihat           
					},
					success: function(data) {
						$('#row'+ma_baihat).hide();
					}
				});  
			}			
			
		}); 


		$('#ma_baihat').blur(function() {
			$.ajax({
				type: "POST",
				url: 'http://localhost/showbiz/index.php/home/exist_song',
				data: {
					ma_baihat: $('#ma_baihat').val()
				},
				success: function(data) {
					if (data.indexOf("true") > 0)
					{
						$("#ma_baihat_hint").html('Mã Bài hát đã tồn tại!');
						$("#ma_baihat_hint").show();
						$("#ma_baihat").focus();
					}
					else
					{
						$("#ma_baihat_hint").html('');
						$("#ma_baihat_hint").hide();
					}


				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError);
				}
			});
		});				
});



function select_singer_change()
{
			var macs= sel_singer_song.options[sel_singer_song.selectedIndex].value; 
			$.ajax({
					type: "POST",
					url: 'http://localhost/showbiz/index.php/home/select_album_singer',
					data: {
						macs: macs
						
					},
					success: function(data) {
						var arr = data.split('split');
						$('#sel_album').html(arr[0]);	
						$('#song_list').html(arr[1]);						
					}
				});  
}