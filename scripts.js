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
    $('.tabs > ul').on('click','a',function(e){
        e.preventDefault()
        let _el = $(this);
        let _div = $(this).attr('href');
        console.log('clicked')
        if(_el.hasClass('active')===true){}else{
            $('.tabs > ul > li > a').removeClass('active');
            $('.tabs > .content').removeClass('active');
            _el.addClass('active');
            $('.tabs > .content'+_div).addClass('active');
        }
    })



    // 
    $('.packageSwitch').on('click','a',function(e){
        e.preventDefault()
        let _el = $(this);
        let _id = $(this).data('id');
        if(_el.hasClass('active')===true){}else{
            _el.parent().find('a').removeClass('active');
            _el.addClass('active');
            $('.packageSwitchContent').addClass('hidden')
            $('.packageSwitchContent.'+_id).removeClass('hidden').addClass('block')
        }
    })



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


    // 
    $('.zoom').magnificPopup({type:'image'})


    // 
    $('.switch-from-retail').on('click',function(e){
        e.preventDefault()
        $('a.img-professional').hide()
        $('a.img-retail').show()
    })
    $('.switch-from-professional').on('click',function(e){
        e.preventDefault()
        $('a.img-professional').show()
        $('a.img-retail').hide()
    })




 

    // 
    // 
    // AI chat
    // 

    if($('div').hasClass('ai')===true){

        let controller = null;
        let count = 0;
        const aiIntro = $('.aiIntro');
        const aiEl = $('.ai');
        const responseEl = $('.ai > .responses');
        const rand = Math.round(Math.random() * (9000 - 1000) + 1000)



        function _cancel(){
            $('.aiCancel').on('click',function(){
                if (controller) {
                    controller.abort();
                    aiEl.removeClass('active');
                    responseEl.find('.aiCancel').remove();
                    return null;
                }
            })
        }


        /**
         * Returns a Dermalogica GPT Response
         */
        async function getGPTResponse(prompt) {
            controller = new AbortController();
            try {
                console.log("Request started...");
                const options = {
                    method: "GET",
                    headers: { "x-api-key": "81751cd9-d529-4087-85e4-04ae64e0d0b7" },
                    signal: controller.signal,
                };
            
                const response = await fetch(
                    "https://derm-api.jeti.ai:444/askai?" +
                    new URLSearchParams({
                        question: prompt,
                        session: rand, // Check impact keeping same session id on subsequent requests
                    }),
                    options
                );
            
                if (!response.ok) {
                    const message = `An error has occured: ${response.status}`;
                    console.log(`Fetch error: ${message}`);
                    return false
                }
            
                const answer = await response.json();
                return answer;
            } catch (error) {
                console.log(`Fetch error: ${error.name}`);
                return false
            }
        }


        function _scrollBottom(){
            setTimeout(function(){
                let height = 0
                responseEl.find('.item').map((x,y) => height += $(y).height())
                responseEl.animate(
                    { scrollTop: height },
                    300
                );
            },500)
        }


        function convertLinks(input) {
            let text = input;
            const linksFound = text.match(/(?:www|https?)[^\s]+/g);

            if(linksFound){
                return text.replace(/(?:www|https?)[^\s]+/g,'<a href="'+linksFound[0]+'" target="_blank">'+linksFound[0]+'</a>')
            }

            return text
        }



        $('form#aiForm').on('submit',function(e){

            e.preventDefault()
            const val = $('.aiQuestion').val();
            const width = $(window).width()
            if(val===''){
                return
            }
            count++;

            aiEl.addClass('active');
            responseEl.append('<div class="item" style="display:none;" id="q'+count+'"><div><p>'+val+'</p></div></div>')
            responseEl.find('#q'+count+'').slideDown()
            responseEl.append('<button type="button" class="aiCancel">stop generating</button>')
            if(width<992){
                aiIntro.slideUp()
            }
            $('.aiQuestion').val('');
            _cancel()
            _scrollBottom()
            $('.aiBottom').slideUp()


            // show bot message
            getGPTResponse(val)
            .then((answer) => {
                if (answer) {
                    responseEl.append('<div class="item response" style="" id="r'+count+'"><div><p>'+convertLinks(answer.response)+'</p></div></div>')
                    responseEl.find('.aiCancel').remove();
                    // responseEl.find('#r'+count+'').slideDown()
                    _scrollBottom()
                }else{
                    responseEl.append('<div class="item response" style="" id="r'+count+'"><div><p>Fetch error: An error has occured: 400</p></div></div>')
                    responseEl.find('.aiCancel').remove();
                }
            })
            .catch((error) => {
                responseEl.append('<div class="item response" style="" id="r'+count+'"><div><p>'+error.message+'</p></div></div>')
                responseEl.find('.aiCancel').remove();
                // responseEl.find('#r'+count+'').slideDown()
                _scrollBottom()
            })
            .finally(() => {
                aiEl.removeClass('active');
            });

        })



        

    }else{
        console.log('no ai form')
    }
  
  
  })(jQuery, this);
  