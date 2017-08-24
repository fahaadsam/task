// var baseurl = "home/addform";
$( document ).on( 'click', '#btn', function ( e ) {
    e.preventDefault();
    //hide response if it's visible
    $( '#response' ).hide();
    //we grab all fields values to create our email
    var firstname = $( '#firstname' ).val();
    var lastname =$('#lastname').val();
    var email = $( '#email' ).val();
    var phone = $('#phone').val();
    var message = $( '#message' ).val();
    if ( firstname == '' || lastname=='' || email == '' || phone=='' || message == '' )
    {
        //all fields are rquired so if one of them is empty the function returns
        $( '#response' ).html( '<div class="w3-panel w3-red w3-round"><h3>Failed!</h3><h3>All fields are required.</h3></div>' ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
        return;
    }
    //if it's all right we proceed
    $.ajax( {
        type: 'post',
        //our baseurl variable in action will call a method in our default controller
        url: 'addform',
        data: { firstname: firstname, lastname: lastname, email: email, phone: phone, message: message },
        success: function ( result )
        {
            //Ajax call success and we can show the value returned by our controller function
            $( '#response' ).html( result ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
            $( '#firstname' ).val( '' );
            $('#lastname').val( '' );
            $( '#email' ).val( '' );
            $( '#phone' ).val( '' );
            $( '#message' ).val( '' );
        },
        error: function ( result )
        {
            //Ajax call failed, so we inform the user something went wrong
            $( '#response' ).html( 'Server unavailable now: please, retry later.' ).fadeIn( 'slow' ).delay( 3000 ).fadeOut( 'slow' );
           $( '#firstname' ).val( '' );
            $('#lastname').val( '' );
            $( '#email' ).val( '' );
            $( '#phone' ).val( '' );
            $( '#message' ).val( '' );
        }
    } );
} ); 