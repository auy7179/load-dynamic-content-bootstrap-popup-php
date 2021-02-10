<?php 
include("db_config.php");	
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dynamically load content in Bootstrap Modal with AJAX, PHP MySQL - Clue Mediator</title>
  <!-- CSS -->
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' type='text/javascript'></script>
</head>

<body>
  <div class="container">
    <h5 class="mt-3 mb-3">Dynamically load content in Bootstrap Modal with AJAX, PHP MySQL - <a href="https://www.cluemediator.com" target="_blank">Clue Mediator</a></h5>
    <table class="table table-bordered table-sm">
      <thead class="thead-dark">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $query = "select * from customers";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)){
          $id = $row['customer_id'];
          $name = $row['customer_name'];
          $email = $row['customer_email'];

          echo "<tr>";
          echo "<td>".$name."</td>";
          echo "<td>".$email."</td>";
          echo "<td><button data-id='".$id."' class='btn btn-info btn-sm btn-popup'>Details</button></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="custModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Customer Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script type="text/javascript">
    $(document).ready(function () {

      $('.btn-popup').click(function () {
        var custId = $(this).data('id');
        $.ajax({
          url: 'get_data.php',
          type: 'post',
          data: { custId: custId },
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
      });

    });
  </script>

</body>

</html>