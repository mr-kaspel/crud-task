function getHtml(inputData, field) {
    $.ajax({
        url: document.location.pathname,
        type: "GET",
        data: inputData,
        dataType: "html",
        success: function(d){
            console.log(d);
            if(field) {
                switch (field['action']) {
                    case 'add':
                        addElement(d.substr(0, d.length-1), $(field['elem']).last());
                        break;
                    case 'update':
                        updateElement(d.substr(0, d.length-1), $(field['elem']).last());
                        break;
                }
                return;
            }
            location.reload();
        }
    });
}

function addElement(html, elem) {
    $(elem).after(html);
}

function updateElement(html, elem) {
    $(elem).html(html);
}

$(document).ready(function() {

    var arrNumber = {
        'emai': 0,
        'telephone': 0
    };

    $(document).on('input', '.email input', function() {
        if($(this).val().length > 4 && $(this).closest('div.email').next('div.email').length == 0) {
            arrNumber['emai']++;
            getHtml(
                {
                    method:'getFieldEmail',
                    number: arrNumber['emai']
                },
                {
                     elem: '.email',
                     action: 'add'
                }
            );
            
        }
    });

    $(document).on('input', '.telephone input', function() {
        if($(this).val().length > 4 && $(this).closest('div.telephone').next('div.telephone').length == 0) {
            arrNumber['telephone']++;
            getHtml(
                {
                    method:'getFieldTelephone',
                    number: arrNumber['telephone']
                }, {
                    elem: '.telephone',
                    action: 'add'
                }
            );
        }
    });

    $(document).on('change', '[type="radio"]', function() {
        const attr = $(this).attr('name').replace(/[^a-z]/gi,'');
        $('[name^="' + attr + '"]').prop('checked', false);
        $(this).prop('checked', true);
    });

    $('form [type="submit"]').on('click', function(e) {
        e.preventDefault();
        getHtml($('form').serialize());
    });

    $('form [type="reset"]').on('click', function(e) {
        e.preventDefault();
        document.location.href = document.location.href;
    });

    $(document).on('click', '.update', function() {
        var id = $(this).attr('id-elem');

        getHtml(
            {
                method:'read',
                id: id
            },
            {
                elem: '.list_elem_form',
                action: 'update'
            }
        );

        $('form [name="method"]').val('update');
        if(!$('[name="id"]').length) $('[name="method"]').after('<input type="hidden" name="id" value="'+id+'">');
    });

    $(document).on('click', '.delet', function() {
        var id = $(this).attr('id-elem');
        getHtml(
            {
                method:'delet',
                id: id
            }
        );
        $(this).closest('.rounded').remove();
    });

    getHtml(
        {
            method:'getContactList'
        },
        {
            elem: '.contact_list',
            action: 'update'
        }
    );

});