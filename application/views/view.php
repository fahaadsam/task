<body>
<?php if(!empty($message)){ ?>
  <div class="w3-panel w3-green w3-round">
    <h3>Success!</h3>
    <p><?php echo $message ?></p>
  </div>
 <?php }?>
<div class="w3-container">

  <table class="w3-table-all w3-centered">
    <tr>
      <th>Sno</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Message</th>
      <th>Action</th>
    </tr>
<?php 
     $count=1;
     foreach ($users as $user): ?>    
    <tr>
      <td><?php echo $count;?></td>
      <td><?php echo $user['firstname']; ?></td>
      <td><?php echo $user['lastname']; ?></td>
      <td><?php echo $user['email']; ?></td>
      <td><?php echo $user['phone']; ?></td>
      <td><?php echo $user['message']; ?></td>
      <td>
      <a href="<?php echo site_url('home/edit/'.$user['id']); ?>">Edit</a> | 
      <a href="<?php echo site_url('home/delete/'.$user['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
    </tr>
<?php $count++;
      endforeach; ?>
  </table>
</div>

</body>
</html>