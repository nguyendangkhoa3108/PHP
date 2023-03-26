<?php
	session_start();
	include('../../admincp/config/config.php');
	//them sl
	if(isset($_GET['cong'])){
		$id=$_GET['cong'];
		foreach ($_SESSION['cart'] as $cart_item) {
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$cart_item['soluong '],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong '] + 1;
				if($cart_item['soluong ']<=9){
					
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$tangsoluong,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
				}else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$cart_item['soluong '],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
		header('Location:../../index.php?quanly=giohang');
	}
	//tru sl
	if(isset($_GET['tru'])){
		$id=$_GET['tru'];
		foreach ($_SESSION['cart'] as $cart_item) {
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$cart_item['soluong '],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong '] - 1;
				if($cart_item['soluong ']>1){
					
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$tangsoluong,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
				}else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$cart_item['soluong '],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
		header('Location:../../index.php?quanly=giohang');
	}
	//xoa 1
	if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		foreach ($_SESSION['cart'] as $cart_item) {
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
			}
		$_SESSION['cart'] = $product;
		header('Location:../../index.php?quanly=giohang');

		}
	}
	//xoa tat ca
	if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
		unset($_SESSION['cart']);
		header('Location:../../index.php?quanly=giohang');
	}

	if(isset($_POST['themgiohang'])){
		$id = $_GET['idsanpham'];
		$soluong = 1 ;
		$sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='".$id."' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($query);
		if($row){
			$new_product=array( array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong '=>$soluong,'giasanpham'=>$row['giasanpham'],'hinhanh'=>$row['hinhanh'],'masanpham'=>$row['masanpham']));
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach ($_SESSION['cart'] as $cart_item) {
					// code...
					if($cart_item['id'] == $id){
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$soluong+1,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
						$found = true;
					}else{
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong '=>$cart_item['soluong '] ,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
					}
				}
				if($found == false){
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
			}
		}
		header('Location:../../index.php?quanly=giohang');
	}
?>