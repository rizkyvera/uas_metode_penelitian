<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Metode Biseksi</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<style>
  body {
    background-color: #f5f5f5;
    font-family: Open Sans, sans-serif;
  }
  #container {
    width: 80%;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
  }
  h2 {
    margin-top: 0;
    color: #337ab7;
  }
.f_isian {
    margin-bottom: 20px;
  }
.table {
    margin-bottom: 20px;
    border-collapse: collapse;
  }
.table th,.table td {
    text-align: center;
    padding: 10px;
    border: 1px solid #ddd;
  }
.table th {
    background-color: #337ab7;
    color: #fff;
  }
.table tr:nth-child(even) {
    background-color: #f9f9f9;
  }
.btn-primary {
    width: 100%;
    background-color: #337ab7;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }
.btn-primary:hover {
    background-color: #23527c;
  }
.logo {
    font-size: 24px;
    font-weight: bold;
    color: #337ab7;
    margin-bottom: 20px;
  }
</style>
</head>

<body>
<div id="container">
  <div class="logo">Metode Biseksi</div>
  <h2 align="center">Carilah akar persamaan <strong>f(x) = x<sup>2</sup> - 2x - 3</strong></h2>
  <div class="container">
    <p>
		<?php
		//----Fungsi menentukan persamaan
		function persamaan($x)
			{
				return pow($x, 2) - 2 * $x - 3;
			}
		$a		=isset($_GET['a'])?$_GET['a']*1:0;
		$b		=isset($_GET['b'])?$_GET['b']*1:0;
		$n		=isset($_GET['n'])?$_GET['n']*1:0;
		//----End fungsi persamaan
		?>
    </p>
    <form id="form1" name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <table class="f_isian">
		<tr>
			<td>Batas Bawah (a)</td>
			<td>:</td>
			<td><input type="text" class="form-control-sm" name="b" id="b" value="<?php echo $b;?>" /></td>
		</tr>
		<tr>
			<td>Batas Atas (b)</td>
			<td>:</td>
			<td><input type="text" class="form-control-sm" name="a" id="a" value="<?php echo $a;?>" /></td>
		</tr>
		<tr>
			<td>Jumlah Iterasi</td>
			<td>:</td>
			<td><input type="text" class="form-control-sm" name="n" id="n" value="<?php echo $n;?>" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
      </table>
      <button class="btn btn-primary" type="submit" name="button" id="button">Proses</button>
    </form>
    <?php
		$data_r="";	
		if($n>0)
			{
				$fa=persamaan($a);
				$fb=persamaan($b);
				if($fa*$fb>=0)
					{
						echo " f(a)xf(b)>0, proses dihentikan karena tidak ada akar!"; 
					}
				else
					{	
						if(abs($b-$a)<0.00001)
						{
							echo " f(a)f(b)<0, tetapi persamaan tidak memiliki akar di antara batas bawah dan batas atas";
						}
						else
						{
	?>
		<table class="table table-bordered table-hover table-sm">   
		<thead>
			<tr class="table-info" align="center">
		
				<th>Literasi</th>
				<th> a</th>
				<th>b</th>
				<th>c</th>
				<th>f(c)</th>
				<th>f(b)</th>
				<th>Action</th>
				<th>Eror</th>
				<th>Keterangan</th>
			</tr>  
			</thead>   
	<?php			
				for($k=1;$k<=$n;$k++)
					{
						$x=($a+$b)/2;
						$fx=persamaan($x);
						$data_r.="[".$x.",".$fx."]";	
						$action="";
						$error =$a - $b;
						if($fa*$fx<0)
							{
								$action="a = c";
								$ket="sama";	
							}
						else{
								$action="b = c";
								$ket="tanda berlawanan";
						}
	?>
			<tr bgcolor="#FFFFFF">
			<td align="center"><?php echo $k;?></td>
				<td align="center"><?php echo number_format($b,5,",",".");?></td>
				<td align="center"><?php echo number_format($a,5,",",".");?></td>
				<td align="center"><?php echo number_format($x,5,",",".");?></td>
				<td align="center"><?php echo number_format($fx,5,",",".");?></td>
				<td align="center"><?php echo number_format($fa,5,",",".");?></td>
				<td align="center"><?php echo $action; ?></td> <!-- Action -->
				<td align="center"><?php echo $error; ?></td> <!-- Error -->
				<td align="center"><?php echo $ket; ?></td> <!-- keterangan -->
			</tr>    
	<?php					
						if($fa*$fx<0)
							{
								$b=$x;	
								$fb=$fx;
							}
						else
							{
								$a=$x;	
								$fa=$fx;	
							}	
						if($k<$n)
							{
									$data_r.=",";
							}	
					}
	?>
	</table>
	<?php
						}
					}
			}
   ?>
  </div>
</div>
</body>
</html>