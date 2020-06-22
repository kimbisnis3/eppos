
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
body, html {
  height: 100%;
  margin: 0;
  font: 400 15px/1.8 "Lato", sans-serif;
  /*color: #777;*/
  padding-left: -10% !important;
}

.bgimg-1 {
  position: relative;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("<?php echo base_url(); ?>assets/cert.jpg");
  height: 100%;
}

.caption {
  position: absolute;
  left: -12%;
  top: 50%;
  width: 100%;
  text-align: center;
  background: white;
  font-weight: bolder;
  transform: rotate(-90deg);
}

.caption span {
  color: black;
  font-size: 50px;
}

@page {
  size: A4;
  margin: 0;
}

</style>
</head>
<body>

<div class="bgimg-1">
  <div class="caption">
    <span>NAMA SIAPA</span>
  </div>
</div>

</body>
</html>