$(document).ready(function()
{
  
  $('#searchField').focus(function()
  {
    if ($(this).val() == 'Search...')
    {
      $(this).val('');
    }
  });
  
  $('#searchField').blur(function()
  {
    if ($(this).val() == false)
    {
      $(this).val('Search...');
    }
  });
  
  $('#searchButton').click(function()
  {
    if ($(this).val() != 'Search...')
    {
	  $('#searchForm').submit();
    }
  });

  $(document).on('click', '#btnAddComment', function(event)
  {
    if ($('#commentDescription').val() != false)
    {
      $.post('comments/addComment',
	    
	    $("#frmComment").serialize(),
        function(response)
        {
    	  var response = $.parseJSON(response);
    	  
    	  if (response.error != undefined && response.error != '')
    	  {
    		$('#loginMessage').show().addClass('highlight');
    	  }
    	  else
    	  {
    		$('#commentMsg').html('<p>' + response.msg + '</p>').show().addClass('highlight').fadeOut(1000);
    		$('#commentDescription').val('');
    		
    		var comment  = '<p><span class="profilename">' + response.data.User.name + '</span>';
    		    comment += '<br />' + response.data.Comment.description + '<br />';
    		    comment += '<span class="profile-post-time">' + response.data.Comment.created + '</span></p>';
    			            
    		$('.reviews').prepend(comment);
    	  }
	    }
      ).error(function()
        {
	      $('#loginMessage').show().addClass('highlight');
        }
      );
    }
  });

  // On click of video links from navigation
  $('.cat-list').on("click", "a",
			function(event)
			{
			  event.preventDefault();
			  event.stopPropagation();
			  $.ajax({
				url: 'videos/getVideoDetails/' + $(this).attr('id'),
				success: function(data)
				{
				  $('#side-content').html(data);
				  event.preventDefault();
				  event.stopPropagation();
				}
			  });  
		   });
  
  
});