<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
$conn = mysqli_connect("localhost","root","","QLTT");
$massv=null;
$madt = null;
$NTT = null;
$KQ = null;
if(isset($_POST["txtmassv"]) && isset($_POST["txtmadt"]) && isset($_POST["txtNTT"]) && isset($_POST["txtKQ"]))
{
  $massv =  $_POST['txtmassv'];
  $madt = $_POST['txtmadt'];
  $NTT = $_POST['txtNTT'];
  $KQ = $_POST['txtKQ'];
}
if($massv != null && $madt != null && $NTT != null && $KQ != null)
{
    $str = "insert into THUCTAP(MSSV,MSDT,NoiTT,KetQua) values ('$massv','$madt','$NTT','$KQ')";
    $result = mysqli_query($conn,$str);
}

$str1 ='select * from THUCTAP';
$result1 = mysqli_query($conn, $str1);
echo '<div class="container">';
  echo '<h2>Bảng danh sách sinh viên</h2>';
  echo '<table class="table">';
    echo '<thead class="thead-dark">';
      echo '<tr>';
        echo '<th>Mã sinh viên</th>';
        echo '<th>Mã số đề tài</th>';
        echo '<th>Nơi thực tập</th>';
        echo '<th>Kết quả</th>';
      echo '</tr>';
    echo '</thead>';
while($row = mysqli_fetch_row($result1))
{ 
    echo '<tbody>';
    echo '<tr>';
      echo '<td>'.$row[0].'</td>';
      echo '<td>'.$row[1].'</td>';
      echo '<td>'.$row[2].'</td>';
      echo '<td>'.$row[3].'</td>';
    echo '</tr>';
  echo '</tbody>';
}
echo '</table>';
echo '</div>';
mysqli_close($conn);
?>
<div class="container" style ="margin-left:41%; margin-top:50px";>
  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal">
    Thêm sinh viên
  </button>
</div>

<form method="GET">
<div class="container" style="margin-top:50px">
    <div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Nhập nơi thực tập cần tìm" name="txttukhoa">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-outline-success" name="btnOK">Tìm kiếm</button>
        </div>
    </div>
</div>
</div>
</form>
<?php
error_reporting(0) ;
if (isset($_GET["btnOK"])!=null)
{$tukhoa = $_GET['txttukhoa'];
$conn = mysqli_connect("localhost","root","","QLTT");
$str ="select * from THUCTAP where NoiTT like N'%$tukhoa%'";
$result = mysqli_query($conn,$str);
echo '<div class="container">';
  echo '<h2>Kết quả tìm kiếm</h2>';
  echo '<table class="table">';
    echo '<thead class="thead-dark">';
      echo '<tr>';
        echo '<th>Mã sinh viên</th>';
        echo '<th>Mã số đề tài</th>';
        echo '<th>Nơi thực tập</th>';
        echo '<th>Kết quả</th>';
      echo '</tr>';
    echo '</thead>';
while($row = mysqli_fetch_row($result))
{ 
    echo '<tbody>';
    echo '<tr>';
      echo '<td>'.$row[0].'</td>';
      echo '<td>'.$row[1].'</td>';
      echo '<td>'.$row[2].'</td>';
      echo '<td>'.$row[3].'</td>';
    echo '</tr>';
  echo '</tbody>';
}
echo '</table>';
echo '</div>';
mysqli_close($conn);
}
?>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
      <div class = "container">
<form action="DesignHienThi.php" method="POST" enctype="multipart/form-data">
<div class="container p-3 my-3 bg-primary text-white" style = "text-align: center";>
		<h1 >Thêm sinh viên</h1>
</div>
<table>
	<div class="form-group">
    <label>Mã số sinh viên:</label>
    <input type="text" class="form-control" placeholder="Mã sinh viên" name="txtmassv">
  </div>
  <div class="form-group">
    <label>Mã đề tài:</label>
    <input type="text" class="form-control" placeholder="Mã số đề tài" name="txtmadt">
  </div>
  <div class="form-group">
    <label>Nơi thực tập:</label>
    <input type="text" class="form-control" placeholder="Nơi thực tập" name="txtNTT">
  </div>
  <div class="form-group">
    <label>Kết quả:</label>
    <input type="text" class="form-control" placeholder="Kết quả" name="txtKQ">
  </div>
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
  <button type="reset" class="btn btn-primary" style ="margin-left: 20px";>Reset</button>
  </div>
</table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

