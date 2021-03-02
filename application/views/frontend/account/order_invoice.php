<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Invoice</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <style type="text/css">
  
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #000;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(<?= base_url('assets/frontend/images/dimension.png'); ?>);
}

#project {
  float: left;
  font-size: 18px;
}

#project span {
  color: #000000;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}                   
</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="<?= base_url('assets/frontend/images/logo.png'); ?>">
      </div>
      <h1>Your Order Number - <?php echo $order_data['invoice_id']; ?></h1>
      <?php
      // echo "<pre>"; p($order_data);
      // echo "<pre>"; p($users);
      // echo "<pre>"; p($order_details); die;
       ?>
      <div class="upper-details" style="position: relative;" >
        <div id="project" style="float: left;font-size: 18px;width:360px;white-space: nowrap;position: absolute;top: 116px;">
        <!-- <div><span>USER NAME</span> <?= ucfirst($users['name']) ?></div>
        <div><span>ADDRESS</span> <?= $order_data['address'] ?> </div>
        <div><span>CITY</span> <?= $order_data['city'] ?> </div>
        <div><span>STATE</span> <?= $order_data['state'] ?> </div>
        <div><span>POSTAL CODE</span> <?= $order_data['postcode'] ?> </div> -->
       <!--  <div><span>EMAIL: </span><a href="mailto:john@example.com"><?= $users['email']  ?></a></div>
        <div><span>DATE: </span><?php echo date('d-m-Y',strtotime($order_data['created_on'])); ?></div> -->
      </div>
      <div id="company" class="clearfix" style="float: right;text-align: right;">
        <!-- <div>Company Name</div> -->
        <div>N-Sign,<br /> Sign House, Maritime Road, Stockton-On-Tees, TS18 2EZ.</div>
        <div>01642 800222</div>
        <div><a href="mailto:enquiries@n-sign.co.uk demo@n-sign.co.uk">enquiries@n-sign.co.uk demo@n-sign.co.uk</a></div>
      </div>
      
    </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Plate</th>
            <th class="desc">Plate Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($order_details)){
            $i = 100;
            foreach($order_details as $row){
          ?>
          <tr>
            <?php 
                $file = IMAGEPATH.'assets/invoice/'.$order_data['invoice_id'].$i.'.png';
                // echo '<img src="base_url()">'; die;
                $svg = "<?xml version='1.0' encoding='UTF-8' standalone='no'?>".$row['desc'];
                $image = new IMagick();  
                $image->setBackgroundColor(new ImagickPixel('transparent'));  
                // $image->setFont("assets/frontend/fonts/Kindersley.ttf");
                // p($svg);
                $image->readImageBlob($svg);  
                $image->setImageFormat("png");
                $image->writeImage($file);
                $image->clear();
                $image->destroy();
             ?>
            <td class="service"><img src="<?= base_url('assets/invoice/'.$order_data['invoice_id'].$i.'.png'); ?>" width="120"></td>
            <td class="desc"><?= $row['name'] ?></td>
            <td class="unit">£<?= $row['subtotal'] ?></td>
            <td class="qty"><?= $row['qty'] ?></td>
            <td class="total">£<?= $row['subtotal'] ?></td>
          </tr>
          <?php  $i++; }} ?>
          <tr>
            <td colspan="4">Vat</td>
            <td class="total">£<?= $order_data['vat'] ?></td>
          </tr>
          <tr style="background: #F5F5F5;">
            <td colspan="4">Delivary</td>
            <td class="total">£<?= $order_data['delivery_charge'] ?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">£<?= $order_data['sub_total']+$order_data['delivery_charge']+$order_data['vat'] ?></td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>