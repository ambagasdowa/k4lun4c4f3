(function (interact) {

    'use strict';

    var transformProp;

    interact.maxInteractions(Infinity);

    // setup draggable elements.
    interact('.js-drag')
        .draggable({ max: Infinity })
        .on('dragstart', function (event) {
            event.interaction.x = parseInt(event.target.getAttribute('data-x'), 10) || 0;
            event.interaction.y = parseInt(event.target.getAttribute('data-y'), 10) || 0;
        })
        .on('dragmove', function (event) {
            event.interaction.x += event.dx;
            event.interaction.y += event.dy;

            if (transformProp) {
                event.target.style[transformProp] =
                    'translate(' + event.interaction.x + 'px, ' + event.interaction.y + 'px)';
            }
            else {
                event.target.style.left = event.interaction.x + 'px';
                event.target.style.top  = event.interaction.y + 'px';
            }
        })
        .on('dragend', function (event) {
            event.target.setAttribute('data-x', event.interaction.x);
            event.target.setAttribute('data-y', event.interaction.y);
            
            addClass(event.target, 'on-list');
            
            
        });

    // setup drop areas.
    // dropzone #1 accepts draggable #1
    setupDropzone('#drop1',  '#drag1, #drag2, #drag3, #drag4, #drag5, #drag6, #drag7, #drag8, #drag9, #drag10, #drag11');
    //setupDropzone('#drop2',  '#drag1, #drag2, #drag3, #drag4, #drag5, #drag6, #drag7, #drag8, #drag9, #drag10, #drag11');
    

    /**
     * Setup a given element as a dropzone.
     *
     * @param {HTMLElement|String} el
     * @param {String} accept
     */
    function setupDropzone(el, accept) {
        interact(el)
            .dropzone({
                accept: accept,
                ondropactivate: function (event) {
                    addClass(event.relatedTarget, '-drop-possible');
                },
                ondropdeactivate: function (event) {
                    removeClass(event.relatedTarget, '-drop-possible');
                }
            })
            .on('dropactivate', function (event) {
                var active = event.target.getAttribute('active')|0;

                // change style if it was previously not active
                if (active === 0) {
                    addClass(event.target, '-drop-possible');
                    
                   // event.target.textContent = 'Drop me here!';
                   
                }

                event.target.setAttribute('active', active + 1);
            })
            .on('dropdeactivate', function (event) {
                var active = event.target.getAttribute('active')|0;
                                
                // change style if it was previously active
                // but will no longer be active
                if (active === 1) {
                    removeClass(event.target, '-drop-possible'); 
                    //event.target.textContent = 'Special\'s Dropzone';
                }

                event.target.setAttribute('active', active - 1);
            })
            .on('dragenter', function (event) {
                addClass(event.target, '-drop-over');
                //event.relatedTarget.textContent = 'I\'m in';
                 event.relatedTarget.setAttribute('save', 'yes');
                
                 updateKomanda(event.relatedTarget);
                  
            })
            .on('dragleave', function (event) {
                removeClass(event.target, '-drop-over');
                //event.relatedTarget.textContent = 'Drag me…';
                event.relatedTarget.setAttribute('save', 'no');
                updateKomanda(event.relatedTarget);
            })
            .on('drop', function (event) {
                removeClass(event.target, '-drop-over');
                //event.relatedTarget.textContent = 'Dropped';
            });
    }

    function addClass (element, className) {
        if (element.classList) {
            return element.classList.add(className);
        }
        else {
            element.className += ' ' + className;
        }
    }

    function removeClass (element, className) {
        if (element.classList) {
            return element.classList.remove(className);
        }
        else {
            element.className = element.className.replace(new RegExp(className + ' *', 'g'), '');
        }
    }

    interact(document).on('ready', function () {
        transformProp = 'transform' in document.body.style
            ? 'transform': 'webkitTransform' in document.body.style
            ? 'webkitTransform': 'mozTransform' in document.body.style
            ? 'mozTransform': 'oTransform' in document.body.style
            ? 'oTransform': 'msTransform' in document.body.style
            ? 'msTransform': null;
    });

}(window.interact));


function updateKomanda(obj)
{
    if($("#mesa").val() !== ''){
    var div = $(obj).attr('id');
    var save = $(obj).attr('save');
    $("#"+div+' input').each(function()
    {
        id_menu = $(this).attr('id_menu');
        precio  = $(this).attr('precio');
        mesa    = $("#mesa").val();
        id_input= $(this).attr('id');
        act     = id_input.split("-");
        action  = act[0];
        desc_user   = $(this).val();
        desc_ini = $(this).attr('desc_ini');
        
        
        description = ($(this).val().length === 0 ) ? desc_ini : desc_user;
        
    });
 
    $.ajax({
    type: "POST",
    dataType: "text",
    url: "app/webroot/ajax/komanda.php",
    async: true,
    data: {
            id_menu:    id_menu,
            precio:   precio,
            description:    description,
            action: action,
            mesa:mesa,
            save:   save
        },
    success:
        function(json)
        {
            var data = $.parseJSON(json);
            if (data.result === true)
            {
                $('#'+id_input).attr('id','add-'+act[1]);
               
                showSuccessToast(data.message);
            }
            else{
                        showWarningToast(data.message);
                    }
           
        }
    });
    }else{
        alert('Debe Ingresar la Mesa');
    }
}

