// AO CARREGAR A PÁGINA
$(function() {    

    
    // ICONS CLICK
    $('#removeIconSelectedDashboardAdd').click( function() {
        document.getElementById("selectImgEmotion").innerHTML=""
        $('#controlselectimgdashboard').css('display','none')
        $('#InfoDashSelectedEmotion').css('display','none')
    })
    
    // ADD DASHBOARD
    $('#btnModelCloseAddDashboard').click(function(){
        clearFieldsAddDash()
    })

    
})

var getUrlImg = function( obj ) {
       
    document.getElementById("selectImgEmotion").innerHTML=""
   
    var img = document.createElement('img')
    img.setAttribute('src', obj.src)
    img.setAttribute('class', 'emotionsdash-select')
    document.getElementById("selectImgEmotion").appendChild(img)
    
    $('#controlselectimgdashboard').css('display','block')
    $('#InfoDashSelectedEmotion').css('display','block')
    
}

var clearFieldsAddDash = function() {
    
    //SELECT AVATAR
    document.getElementById("selectImgEmotion").innerHTML=""
    $('#controlselectimgdashboard').css('display','none')
    $('#InfoDashSelectedEmotion').css('display','none')
    
    //FIELDS
    $('#fieldNameDashboard').val('')
    $('#fieldTimestampData').val('')
    $('#fieldTimestampTime').val('')
    
    
}











