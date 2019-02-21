$('form').submit(function () {
    console.log('validating')
    $(this).find('input[data-validate=yes]').each(function () {
        $(this).removeClass('invalid')

        let sDataType = $(this).attr('data-type')
        let iMin = $(this).attr('data-min')
        let iMax = $(this).attr('data-max')

        switch (sDataType) {
            case "string":

                if ($(this).val().length < iMin ||
                    $(this).val().length > iMax) {
                    $(this).addClass('invalid')
                }
                break

            case "integer":
                if (Number($(this).val().length < iMin ||
                    Number($(this).val().length > iMax)
                )) {
                    $(this).addClass('invalid')
                }
                break

            case "email":

                let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if ($(this).val().length < iMin ||
                    $(this).val().length > iMax ||
                    re.test(String($(this).val()).toLowerCase()) == false) {
                    $(this).addClass('invalid')
                }
                break

            default:
                console.log('no validation')
                break
        }

    })

    // if(bErrors==false){ return true }
    if ($(this).children().hasClass('invalid')) {
        return false
    }

})