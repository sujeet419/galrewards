<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Invoice</title>
  
	
	<style>
	
	@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 18cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 1.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 5px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

/*table td {
  text-align: right;
}*/

table td h3{
  color: #4e5d53;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #4e5d53;
  width:50px;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #4e5d53;
  color: #FFFFFF;
  width:100px;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}
	
	
	
	
	</style>
	
	
	
	
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="http://103.159.183.18/galrewards/frontend/assets/images/logo.jpg">
      </div>
      <div id="company">
        <h2 class="name">Galrewards</h2>
        <div>Satguru Overseas</div>
        <div>(12) 519-0450</div>
        <div><a href="mailto:info@galrewards.com">info@galrewards.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Name: {{$orderdetail[0]->first_name}} {{$orderdetail[0]->last_name}}</div>
      
         <div class="name">PCC: {{$orderdetail[0]->pcc}}</div>
          <div class="email">Email: <a href="mailto:{{$email}}">{{$email}}</a></div>
        </div>
        <div id="invoice">
          <h1>{{$invoice_no}}</h1>
           <div class="date">Date of Invoice: {{$invoicedate}}</div>
        </div>
      </div>
	  
	   <h3>Order details</h3>
	   <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
	   <th class="no" scope="col">#</th>
      <th class="unit" scope="col">Product Name</th>
      <th class="unit" scope="col">Product Qty</th>
      <th class="unit" scope="col">Product Point</th>
      <th class="total" scope="col">Subtotal</th>
      
    
		  
          </tr>
        </thead>
        <tbody>
		
		 @php
  if(isset($orderdetail))
        $sno = 1;
    @endphp
                     
@foreach ($orderdetail as $item)

    <tr>
	
	<th class="no" scope="row">{{ $sno++ }}</th>
      <td class="qty">{{ $item->product_name_en ?? '' }}</td>
      <td class="qty">{{ $item->product_qty ?? '' }}</td>
      <td class="qty">{{ $item->points ?? '' }}</td>
      <td class="total">{{ $item->subtotal ?? '' }}</td>
    

     
    </tr>
    
    @endforeach

        
        </tbody>
		
		 <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>{{$points}}</td>
          </tr>
        
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>{{$points}}</td>
          </tr>
        </tfoot>
		
		
   
      </table>
	  
	  	
	 
	  
	 <div id="thanks">{{$narration}}</div> 
	 
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Invoice was created on a computer and is valid without the signature and seal.</div>
      </div>
    </main>
    <footer>
     Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>