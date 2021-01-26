<div id="main">
  		<table>
  			<thead>
  				<th>ID</th>
  				<th>Image</th>
  				<th>Name</th>
  				<th>Price</th>
  				<th></th>
  				<th></th>
  			</thead>

  			<tbody>

  				<?php 
  					$query = "SELECT * FROM product";
  					$rs = mysqli_query( $conn, $query );
  					if( mysqli_num_rows( $rs ) > 0  ){
  						while( $row = mysqli_fetch_assoc( $rs ) ){
  				?>
  					<tr>
  						<td><?= $row['id'] ?></td>
  						<td><img class="anh-sp" src="../images/<?= $row['images']?>"/></td>
  						<td><?= $row['name']?></td>
  						<td><?= $row['price'] . "-USD"?> </td> 
              <!-- chu y ten phai match voi ten cot trong db -->
  						<td><a href="suasp.php?id=<?= $row['id']?>">Edit</a></td>
  						<td><a href="?iddelete=<?= $row['id']?>">Delete</a></td>
  					</tr>

  				<?php 

  					}
            }

  				?>
  					
  			</tbody>
  		</table>
  	</div><!-- #main -->
