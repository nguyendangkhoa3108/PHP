<?php 
	 $sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc = '$_GET[id]' ORDER BY id DESC";
     $query_bv = mysqli_query($mysqli,$sql_bv);
			//get ten danh muc 
     $sql_cate = "SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_baiviet = '$_GET[id]' LIMIT 1 ";
     $query_cate = mysqli_query($mysqli,$sql_cate);
     $row_title = mysqli_fetch_array($query_cate);
?>
<h3>Danh Mục Bài Viết :<span style="text-align:center; text-transform: uppercase;"> <?php echo $row_title['tendanhmuc_baiviet'] ?></span></h3>
			<ul class="product_list">
				<?php
					while ($row_bv = mysqli_fetch_array($query_bv)) {
				?>
				<li>
					<a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
						<img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
						<p class="title_product">Tên Bài Viết : <?php echo $row_bv['tenbaiviet'] ?></p>
						
					</a>
					<p class="title_product"><?php echo $row_bv['tomtat'] ?></p>
				</li>
				<?php
					}
				?>
				
			</ul>