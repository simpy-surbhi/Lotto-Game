<?php  
$connect = mysqli_connect("localhost", "root", "", "lottogame");

if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   $sql = "TRUNCATE TABLE members";
mysqli_query($connect, $sql);
   while($data = fgetcsv($handle))
   {
    $item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $item3 = mysqli_real_escape_string($connect, $data[2]);  
                $item4 = mysqli_real_escape_string($connect, $data[3]);
                $item5 = mysqli_real_escape_string($connect, $data[4]); 
                $item6 = mysqli_real_escape_string($connect, $data[5]);
               
                $item7 = mysqli_real_escape_string($connect, date("Y/m/d")); 
                $item8 = mysqli_real_escape_string($connect, date("Y/m/d")); 
               
                $query = "INSERT into members(CustomerName, Email,PhoneNumber,LotteryNumber,LuckyNumber,GridNo,Created, Modified) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8')";
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Customer Details Successfully Uploaded');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  -->
</head>  
 <body>  
 <nav
      class="navbar navbar-light bg-light"
      style="background-color: cadetblue;"
    >
      <span class="navbar-brand mb-0 h1"
        ><h1 style="margin-top: -14px; margin-left: 466px;">
        Lottery Draw Engine </h1>

        <a
          class="btn btn-primary"
          style="float: right; margin-right: -51%; margin-top: -45px;"
          href="MainPage.html"
          >Back</a
        ></span
      >
    </nav>
 <br />
  <div style="border: 2px solid;
  padding: 85px;
  box-shadow: 5px 10px 8px 10px #888888;">
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label><h3>Import User Data in CSV File</h3>
    <input  class="btn btn-primary" type="file" name="file" />
    <br />
    <input type="submit"  name="submit" value="Import" class="btn btn-info" /></label>
   </div>
  </form></div>
 </body>  
</html>