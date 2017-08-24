<body>
<?php if(!empty($message)){ ?>
  <div class="w3-panel w3-green w3-round">
    <h3>Success!</h3>
    <p><?php echo $message ?></p>
  </div>
 <?php }?>
<form action="<?php echo base_url('home/editform/'.$users['id']); ?>" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post" id="editform">
<h2 class="w3-center">Contact Us</h2>
 
<div class="w3-row w3-section">
    <div class="w3-rest">
      <input class="w3-input w3-border" name="firstname" id="firstname" type="text" value="<?php echo $users['firstname']; ?>" >
    </div>
</div>

<div class="w3-row w3-section">
    <div class="w3-rest">
      <input class="w3-input w3-border" name="lastname" id="lastname" type="text" value="<?php echo $users['lastname']; ?>">
    </div>
</div>

<div class="w3-row w3-section">
    <div class="w3-rest">
      <input class="w3-input w3-border" name="email" id="email" type="text" value="<?php echo $users['email']; ?>">
    </div>
</div>

<div class="w3-row w3-section">
    <div class="w3-rest">
      <input class="w3-input w3-border" name="phone" id="phone" type="text" value="<?php echo $users['phone']; ?>">
    </div>
</div>

<div class="w3-row w3-section">
    <div class="w3-rest">
      <input class="w3-input w3-border" name="message" id="message" type="text" value="<?php echo $users['message']; ?>">
    </div>
</div>

<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>

</form>
</body>
</html>
 