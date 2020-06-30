<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Invoice</title>
  <style>
    .invoice-box {
      max-width: 300px;
      padding: 1px;
      font-size: 9px;
      line-height: 9px;
      font-family: "Lucida Console", Courier, monospace;
      color: #000;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
    }

    .invoice-box table td {
      padding: 3px;
      vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }

    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
      font-size: 9px;
      line-height: 9px;
      color: #333;
    }

    .invoice-box table tr.heading td {
      background: #eee;
      border-top: 1px solid #000;
      border-bottom: 1px solid #000;
      font-weight: bold;
      padding-top: 2px !important;
      padding-bottom: 2px !important;
      margin-top: 5px !important;
      margin-bottom: 5px !important;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
      border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }

    @page {
         size: 2in 10in;
    }
  </style>
</head>
<body onload="window.print()">
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <div style="text-align: center !important; padding-top, padding-bottom : 10px !important">
        <p><?php echo compdata('nama') ?></p>
        <p><?php echo compdata('alamat') ?></p>
        <p><?php echo compdata('telp') ?></p>
      </div>
      <hr>
      <tr class="item">
        <td><?php echo date('d M Y', strtotime($ord['tgl'])) ?></td>
        <td><?php echo date('h:m', strtotime($ord['datei'])) ?></td>
      </tr>
      <tr class="item">
        <td>Order ID</td>
        <td><?php echo $ord['kode'] ?></td>
      </tr>
      <tr class="item">
        <td>Kasir</td>
        <td><?php echo $ord['kasir'] ?></td>
      </tr>
      <tr class="heading">
        <td>
          Item
        </td>
        <td>
          Price
        </td>
      </tr>
      <?php foreach ($ord_det as $i => $v): ?>
        <tr class="item">
          <td colspan="2">
            <?php echo $v['namaproduk']; ?>
          </td>
        </tr>
        <tr class="item">
          <td>
            <?php echo $v['qty']; ?>x @<?php echo number_format($v['harga']); ?>
          </td>
          <td>
            @<?php echo number_format($v['total']); ?>
          </td>
        </tr>
		  <?php endforeach; ?>
      <tr class="heading">
        <!-- <td></td> -->
        <td colspan="2" style="text-align : right; padding-top : 10px;">
          Total: @ <?php echo number_format($ord['total']) ?>
        </td>
      </tr>
    </table>
    <div style="text-align: center !important; padding-top, padding-bottom : 10px !important">
      <p>BARANG YANG SUDAH DIBELI TIDAK DAPAT DITUKAR ATAU DIKEMBALIKAN</p>
      <p>TERIMA KASIH</p>
    </div>
  </div>
</body>
</html>
