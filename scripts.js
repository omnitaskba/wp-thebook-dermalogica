(function ($, root, undefined) {


    // 
    $('header').on('click','a.open', function(e){ 
        e.preventDefault();
        if($('.mainNavigation').hasClass('active')===false){
            $('.mainNavigation').addClass('active');
        }
    })

    $('.mainNavigation').on('click','a.close', function(e){
        e.preventDefault();
        if($('.mainNavigation').hasClass('active')===true){
            $('.mainNavigation').removeClass('active');
        }
    })



    // 
    function _topPage(){
        let _wW = $(window).width()
        let _wC = $('.topPage .container').width()
        if(_wW>1023){
            $('.topPage .bg').css('width', ((_wW-_wC)/2)+(_wC/3)+'px')
            $('.topPage .image').css('width', ((_wW-_wC)/2)+((_wC/3)*2)+'px')
        }
    }
    if($('div').hasClass('topPage')===true){
        _topPage();
        $(window).resize(function(){
            _topPage();
        })
    }



    // 
    if($('li').hasClass('sf-field-taxonomy-product_use')===true){

        function _isChecked_productUse(_el){
            let _selected = _el.find('.sf-input-checkbox:checked').length
            if(_selected>0){
                _el.find('h4:first > span').html('Filter by: <span class="text-secondary underline">'+_selected+' selected</span>')
            }else{
                _el.find('h4:first > span').html('Filter by')
            }
        }

        let _el = $('li.sf-field-taxonomy-product_use');
        _el.find('h4:first').html('<span>Filter by</span>')
        _el.find('h4:first').append('<button type="button" class="open"><i class="icon-chevron-down"></i></button>');

        _isChecked_productUse(_el)

        _el.on('click','button.open',function(e){
            e.preventDefault();
            if(_el.find('ul:first').hasClass('show')===true){
                _el.find('ul:first').removeClass('show');
                _el.find('button.open').html('<i class="icon-chevron-down"></i>');
            }else{
                _el.find('ul:first').addClass('show');
                _el.find('button.open').html('<i class="icon-chevron-up"></i>');
            }
        })

        _el.find('.sf-input-checkbox').change(function(){
            _isChecked_productUse(_el)
        })

        $(document).mouseup(function(e) {
            if (!_el.is(e.target) && _el.has(e.target).length === 0){
                _el.find('ul:first').removeClass('show');
                _el.find('button.open').html('<i class="icon-chevron-down"></i>');
            }
        });
    }


    if($('li').hasClass('sf-field-taxonomy-product_system')===true){

        function _isChecked_productUse(_el){
            let _selected = _el.find('.sf-input-checkbox:checked').length
            if(_selected>0){
                _el.find('h4:first > span').html('Filter by: <span class="text-secondary underline">'+_selected+' selected</span>')
            }else{
                _el.find('h4:first > span').html('Filter by')
            }
        }

        let _el = $('li.sf-field-taxonomy-product_system');
        _el.find('h4:first').html('<span>Filter by</span>')
        _el.find('h4:first').append('<button type="button" class="open"><i class="icon-chevron-down"></i></button>');

        _isChecked_productUse(_el)

        _el.on('click','button.open',function(e){
            e.preventDefault();
            if(_el.find('ul:first').hasClass('show')===true){
                _el.find('ul:first').removeClass('show');
                _el.find('button.open').html('<i class="icon-chevron-down"></i>');
            }else{
                _el.find('ul:first').addClass('show');
                _el.find('button.open').html('<i class="icon-chevron-up"></i>');
            }
        })

        _el.find('.sf-input-checkbox').change(function(){
            _isChecked_productUse(_el)
        })

        $(document).mouseup(function(e) {
            if (!_el.is(e.target) && _el.has(e.target).length === 0){
                _el.find('ul:first').removeClass('show');
                _el.find('button.open').html('<i class="icon-chevron-down"></i>');
            }
        });
    }



    // 
    $('.accordions').on('click','a.title',function(e){
        e.preventDefault()
        let _el = $(this).parent();
        if(_el.hasClass('active')){
            _el.removeClass('active');
        }else{
            _el.addClass('active');
        }
    })


    // 
    $(".navs").on('click','a',function() {
        let _div = $(this).attr('href')
        $('html, body').animate({
            scrollTop: $(_div).offset().top - 30
        }, 2000);
    });
  
  
  })(jQuery, this);
  