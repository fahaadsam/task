
<body>
 <div class="w3-panel w3-green w3-round" id="response">

  </div>
<form class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" id="form" method="post">
<h2 class="w3-center">Contact Us</h2>
 
<div class="w3-row w3-section">
    <div class="w3-rest">
      <input class="w3-input w3-border" name="firstname" id="firstname" type="text" placeholder="First Name">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-rest">
      <input class="w3-input w3-border" name="lastname" id="lastname" type="text" placeholder="Last Name">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-rest">
      <input class="w3-input w3-border" name="email" id="email" type="text" placeholder="Email">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-rest">
      <input class="w3-input w3-border" name="phone" id="phone" type="text" placeholder="Phone">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-rest">
      <input class="w3-input w3-border" name="message" id="message" type="text" placeholder="Message">
    </div>
</div>

<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" id="btn">Send</button>
</form>

</body>
</html>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
var baseurl = "<?php echo base_url(); ?>";
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
        url: baseurl + 'home/tform',
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
</script>