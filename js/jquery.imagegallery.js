    var options = {
        maxWidth : 520, 
        thumbMaxWidth : 180,  
        thumbMinWidth : 180,
        fade : 500
    };
	
    $(function(){
		var thumbList = $('#thumbnail').find('a'),
            mainPhoto = $('#main_photo'),
            img = $('<img />'),
            imgHeight,
            
            // ↓ キャプションに関する変数を追加
            caption = $('#caption'), 
            captionText;
                
        $('#main_photo').css('maxWidth', options.maxWidth);
        
        var liWidth = Math.floor((options.thumbMaxWidth / options.maxWidth) * 100);
        $('#thumbnail li').css({
            width : liWidth + '%',
            maxWidth : options.thumbMaxWidth,
            minWidth : options.thumbMinWidth
        });
        
        img = img.attr({
                src: $(thumbList[0]).attr('href'),
                alt: $(thumbList[0]).find('img').attr('alt')
        });
        mainPhoto.append(img);
        
        // 最初のキャプション取得と挿入
        captionText = $(thumbList[0]).find('img').attr('data-caption');
        caption.text(captionText);
            
		$('#thumbnail li:first').addClass('current');
        
        for(var i = 0; i < thumbList.length; i++){
			$('<img />').attr({
                src: $(thumbList[i]).attr('href'),
                alt: $(thumbList[i]).find('img').attr('alt')
            });
		}
        
		thumbList.on('click', function(){ 
            var photo = $('<img />').attr({
                src: $(this).attr('href'),
                alt: $(this).find('img').attr('alt')
            });
            
            // キャプション入れ替える
            caption.text($(this).find('img').attr('data-caption'));

            mainPhoto.find('img').before(photo);
            mainPhoto.find('img:not(:first)').stop(true, true).fadeOut(options.fade, function(){
		        $(this).remove();
		    });
            
            $(this).parent().addClass('current').siblings().removeClass('current');
            mainPhoto.height(photo.outerHeight());
            return false;
		});	
        
        $(window).on('resize load', function(){
            mainPhoto.height(mainPhoto.find('img').outerHeight());
        });
	});
